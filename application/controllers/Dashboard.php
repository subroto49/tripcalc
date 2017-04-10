<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('user_check');
        $this->settings = fetch_site_settings();
    }

    public function index() {
        $user_details = validate_user_status();
        if($user_details['success']){
            echo "Hi!!!! ". $user_details['username']; 
        }else{
            redirect('logout');
        }
    }

    public function register() {
        $data['settings'] = $this->settings;
        $username = (isset($session_details['username'])) ? $session_details['username'] : '';
        $data['page'] = 'register';
        $pstdata = $this->input->post();
        if (count($pstdata)) {
            $registerdata['username'] = $pstdata['inputUser'];
            $registerdata['password'] = $pstdata['inputPass'];
            $registerdata['emailaddress'] = $pstdata['inputEmail'];

            $data['register_success'] = $this->login->registerUser($registerdata);
        }
        $this->load->view('register', $data);
    }

    public function check_availability() {
        $username = $this->input->post('inputUser');
        $available = $this->login->checkAvailability($username);
        switch ($available) {
            case 0:
                $response = array(
                    'valid' => false,
                    'message' => 'Username Not Available'
                );
                break;
            case 1:
                $response = array(
                    'valid' => true,
                    'message' => 'Username is Available'
                );
                break;
            default:
                $response = array(
                    'valid' => false,
                    'message' => 'Username is empty'
                );
                break;
        }
        echo json_encode($response);
    }

    function logout() {
        $saved_data = $this->session->userdata('saved');
        $userid = $this->session->userdata('userid');
        delete_cookie('rememberme');
        $this->login->remove_cookie_data($userid, $saved_data);
        $this->session->sess_destroy();
        header("location: /");
    }
	
	public function save_download($filetype='')
	{ 	
		$typearr = array('open','student','corporate','ngo');
		$this->load->library('m_pdf');
		$filetype = (in_array($filetype,$typearr)) ? $filetype : '';
		$imgarr['open'] = 'http://upload.em360send.com/uploads/43/YIAC-Participant-Certificate-Open.png';
		$imgarr['ngo']  = 'http://upload.em360send.com/uploads/43/YIAC-Participant-Certificate-NGO.png';
		$imgarr['student'] = 'images/YIAC-Participant-Certificate-Student.png';
		$imgarr['corporate'] = 'http://upload.em360send.com/uploads/43/YIAC-Participant-Certificate-Corporate.png';

		if($filetype == ''){
			echo "Invalid File Type";
			exit;
		}
		$logfile = "logs/".$filetype.".log";
		$filename = 'uploads/'.$filetype.'.csv';
		$fp = fopen($filename,"r+");
		$i = 1;
		while(!feof($fp)){
			$ln = fgets($fp);
			file_put_contents($logfile,"\n".date('Y-m-d H:i:s'). " :: ".$ln,FILE_APPEND);
			if($ln != ''){
				$tmp = explode(",",$ln);
				file_put_contents($logfile,"\n".date('Y-m-d H:i:s'). " :: ".json_encode($tmp),FILE_APPEND);
				if(count($tmp) > 1){
					$firstname = trim($tmp['0']);
					$lastname = trim($tmp['1']);
					$emailaddress = trim($tmp['2']);
				
					//now pass the data//
					 $this->data['firstname']= $firstname;
					 $this->data['lastname'] = $lastname;
					 $this->data['imgname'] = $imgarr[$filetype];
					 //now pass the data //
		 
				
					$html=$this->load->view('pdf_output',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
					
					//this the the PDF filename that user will get to download
					$pdfFilePath =$filetype."-".$i."-download.pdf";
					file_put_contents($logfile,"\n".date('Y-m-d H:i:s'). " :: PDF Filename  => ".$pdfFilePath,FILE_APPEND);
					
					//actually, you can pass mPDF parameter on this load() function
					$pdf = $this->m_pdf->load();
					//generate the PDF!
					$pdf->WriteHTML($html,2);
					//offer it to user via browser download! (The PDF won't be saved on your server HDD)
					$pdf->Output('downloads/'.$pdfFilePath, "F");
					file_put_contents($logfile,"\n".date('Y-m-d H:i:s'). " :: PDF File written",FILE_APPEND);
					$json_data = $this->get_json_data($emailaddress,$firstname." ".$lastname,'downloads/'.$pdfFilePath);
					
					$URL = "http://api.emsender.in/campaign_api/campaign/format/json"; 
					$ch = curl_init($URL);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
					curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$response = curl_exec($ch);
					curl_close($ch);
					file_put_contents($logfile,"\n".date('Y-m-d H:i:s'). " :: Email Response  => ".$response,FILE_APPEND);
					
					$i++;
				}
			}
		}
	}
	
	function get_json_data($emailaddress,$name,$filepath){
		$json_array = array();
		if(trim($emailaddress) != '' && trim($name) != '' && trim($filepath) != '' ){
			$body = "<html><head><title> Yes Certificate</title></head><body><span>Dear ".$name.",</span><p>Congratulations on your successful participation in <b>YES! i am the CHANGE Social Filmmaking Challenge 2016, the World’s Largest Social Film Movement</b></p>
    <p>We truly value your participation in the challenge which aims to connect youth to social causes.</p><p>Kindly find attached your participation e-certificate.</p><p>Thanking you.</p><p>Warm Regards,<br><img src='http://upload.em360send.com/uploads/43/yes.jpg'/></p></body></html>";
			$json_array['username'] = "yesfoundation";
			$json_array['password'] = "yEsFound@t!on";
			$json_array['from']     = "ask@yesfoundation.in";
			$json_array['fromName'] = "YES FOUNDATION";
			$json_array['to']       = array($emailaddress);
			$json_array['subject']  = "YES! i am the CHANGE 2016 e-certificate";
			$json_array['replyTo']  = "ask@yesfoundation.in";
			$json_array['campaignName'] = "Yes Foundation Certificate";
			$json_array['htmlBody'] = base64_encode($body);
			$json_array['textBody'] = "Congratulations on your successful participation in YES! i am the CHANGE Social Filmmaking Challenge 2016, the World’s Largest Social Film Movement.We truly value your participation in the challenge which aims to connect youth to social causes. Kindly find attached your participation e-certificate.";
			$json_array['listName'] = 'Yes Foundation List';
			$json_array["attachments"] = array(
							"name" => 'Participation Certificate.pdf',
							"content" => base64_encode(file_get_contents($filepath)),
							"contentType" => 'application/pdf'
					);
			#file_put_contents($logfile, "\n[".date('Y-m-d H:i:s')." ::  JSON Data :: ".json_encode($json_array)." ]");
		}
        return json_encode($json_array);
	}
}
