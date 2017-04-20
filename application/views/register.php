<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header/css.html');?>
    </head>
    <body>
        <?php include 'header/header.php' ?>
        <div class="container-fluid">
            <div class="row login-wrap well infobox">
                <div class="login-block">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend>Register</legend>
                            <?php
                            if (isset($register_success)) {
                                switch ($register_success) {
                                    case 1:
                                        ?>
                                        <div class="alert alert-dismissible alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Well Done!</strong> You have been registered successfully.
                                        </div>
                                        <?php
                                        break;
                                    case 0:
                                        ?>
                                        <div class="alert alert-dismissible alert-danger">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Oh snap!</strong> Registration Failed. Please try again.
                                        </div>
                                        <?php
                                        break;
                                }
                            }
                            ?>
                            <div class="col-lg-12 col-md-12 col-xs-12 sign-in-htm">
                                <div class="row">
                                    <input id="inputUser" name='inputUser' type="text" class="form-control" placeholder="Username" data-validation="length alphanumeric server" data-validation-length="min4" data-validation-allowing="-_" data-validation-url="check_availability">
                                </div>
                                <div class="row">
                                    <input id="inputEmail" name='inputEmail' type="text" class="form-control" placeholder="Email Address" data-validation="email">
                                </div>
                                <div class="row">
                                    <input id="inputPass" name='inputPass' type="password" class="form-control" placeholder="Password" data-validation="length" data-validation-length="min8">
                                </div>
                                <div class="row">
                                    <input id="inputConfPass" type="password" name="inputConfPass" class="form-control" placeholder="Confirm Password" data-validation="confirmation"  data-validation-confirm="inputPass">
                                </div>
                                <div class="row">
                                    <input type="submit" class="btn btn-raised btn-primary col-md-12 col-xs-12 col-lg-4" value="Register">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php include('header/js.html');?>
    </body>
</html>