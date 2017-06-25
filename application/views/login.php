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
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 login_container">
                <div class="col-lg-offset-3 well well-lg login-wrap">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend>Log In</legend>
                            <?php if (isset($login_failed) && $login_failed == 1) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> Invalid username or password
                                </div>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="row">
                                    <input id="inputUser" name='inputUser' type="text" class="form-control" placeholder="Username" data-validation="required" data-validation-error-msg-required="Input your Username">
                                </div>
                                <div class="row">
                                    <input id="inputPass" name='inputPass' type="password" class="form-control" placeholder="Password" data-validation="required" data-validation-error-msg-required="Input your Password">
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-6">
                                        <div class="checkbox checkbox-inline checkbox-styled">
                                            <input id="CheckBox1" name="CheckBox1" text=" " tooltip="You will be signed in until you logout" tabindex="4" type="checkbox">
                                            <span>Remember me</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-6 signin-butt">
                                        <input type="submit" class="btn btn-raised btn-primary col-md-12 col-xs-12" value="Sign In">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php include('header/js.html'); ?>
    </body>
</html>