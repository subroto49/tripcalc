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
                <form class="form-horizontal" method="POST" action="friends/save_member_data" name='addFriend' id= 'addFriend'>
                    <fieldset>
                        <div class="col-lg-offset-2 panel panel-default">
                            <div class="panel-heading">ADD FRIENDS</div>
                            <div class="panel-body">
                                <div class="row" id="contact_div">
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <input class="form-control" name="inputName[]" placeholder="Name" type="text" data-validation="required" data-validation-error-msg-required="Required">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <input class="form-control" name="inputEmail[]" placeholder="Email" type="text" data-validation="email" data-validation-error-msg-email="Invalid Email Address" data-validation-optional="true">
                                    </div>
                                </div>
                                <div class="add-more">

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-xs-12 right">
                                        <a id="add_more"><span class="fa fa-lg fa-plus-square" aria-hidden="true"></span> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-offset-2 panel panel-default">
                            <input type="submit" class="btn btn-raised btn-primary col-md-12 col-xs-12 col-lg-3" value="Save">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <input type="hidden" id='save_success_flag' value='<?php echo (isset($success)) ? $success : ''; ?>'>
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
        <div class="modal custom fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="result_modal">
                        <p id='p_succ_mess'><?php echo (isset($save_message)) ? $save_message : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php include('header/js.html'); ?>
    </body>
</html>