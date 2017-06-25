<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header/css.html'); ?>
    </head>
    <body>
        <?php include 'header/header.php' ?>
        <div class="container-fluid">
            <div class="col-lg-offset-2 data well">
                <form class="form-horizontal" method="POST" action="#" name='addFriend' id= 'addFriend'>
                    <fieldset>
                        <div class="col-lg-offset-2 panel panel-default">
                            <div class="panel-heading">CREATE A NEW TRIP</div>
                            <div class="panel-body">
                                <legend class="new_trip_leg">SOME BASIC DETAILS</legend>
                                <div>
                                    <div class='row-action-primary'>
                                        <input type='text' name='inputTripName' id='inputTripName' value="" class="form-control" placeholder="Trip Name" data-validation="required" data-validation-error-msg-required="Trip Name Required">
                                    </div>
                                    <div class='row-action-primary'>
                                        <input type='text' name='inputTripLocation' id='inputTripLocation' value="" class="form-control" placeholder="Trip Location">
                                    </div>
                                </div>
                                <legend class="new_trip_leg">SELECT YOUR TRIP BUDDIES</legend>
                                <div>
                                    <div class='row-action-primary'>
                                        <div class='col-lg-10 col-md-10 col-sm-10 col-xs-10'>
                                            <input type="text" name='inputFriends[]' class='form-control' placeholder="Friends Name" onfocus="javascript:call_autosuggest(this);"></div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-maintain">
                                            <a href="#"><i class="fa fa-2x fa-check-circle" aria-hidden="true"></i></a> &nbsp;&nbsp;
                                            <a href="#"><i class='fa fa-2x fa-times-circle'></i></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="list_contacts col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <?php
                                    if (count($contact_list_me)) {
                                        foreach ($contact_list_me as $tmp) {
                                            ?>
                                            <span class='contact_tab'> <?php echo $tmp['contactname']; ?> &nbsp;&nbsp;&nbsp;<a href="#" class='clear_span'><span class='fa fa-close fa-lg'></span></a></span>
                                        <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-offset-2 panel panel-default">
                            <input type="submit" class="btn btn-raised btn-primary col-md-12 col-xs-12 col-lg-3" value="Save">
                        </div>
                    </fieldset>
                    <input type='hidden' name='old_contact' value=''>
                    <input type='hidden' name='new_contact' value=''>
                </form>
            </div>
        </div>
        <input type="hidden" id='save_success_flag' value='<?php echo (isset($success)) ? $success : ''; ?>'>
        <div class="hide">
            <div class='row-action-primary' id="hidden-clone">
                <input type="text" name='inputFriends[]' class='form-control' placeholder="Friends Name" onfocus="javascript:call_autosuggest(this);">
            </div>
        </div>
        <div class="modal custom fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="result_modal">
                        <p id='p_succ_mess'><?php echo (isset($save_message)) ? $save_message : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hide">
            <div class="row" id="hidden-clone">
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <input class="form-control" name="inputName[]" placeholder="Name" type="text" data-validation="required" data-validation-error-msg-required="Required">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <input class="form-control" name="inputEmail[]" placeholder="Email" type="text" data-validation="email" data-validation-error-msg-email="Invalid Email Address" data-validation-optional="true">
                </div>
            </div>
        </div>
<?php include('header/js.html'); ?>
    </body>
</html>