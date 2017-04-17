<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $settings['site_title']; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Material Design fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Bootstrap -->
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Material Design -->
        <link href="/css/bootstrap-material-design.css" rel="stylesheet">
        <link href="/css/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include 'header/header.php' ?>
        <div class="container-fluid">
            <div class="row well login-wrap">
                <div class="login-block">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend>Log In</legend>
                            <?php if (isset($login_failed) && $login_failed == 1) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> Invalid username or password
                                </div>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-xs-12 sign-in-htm">
                                <div class="row">
                                    <input id="inputUser" name='inputUser' type="text" class="form-control" placeholder="Username" data-validation="emptycheck">
                                </div>
                                <div class="row">
                                    <input id="inputPass" name='inputPass' type="password" class="form-control" placeholder="Password" data-validation="emptycheck">
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-lg-6">
                                        <div class="checkbox checkbox-inline checkbox-styled">
                                            <input id="CheckBox1" name="CheckBox1" text=" " tooltip="You will be signed in until you logout" tabindex="4" type="checkbox">
<span>Remember me</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-lg-6 signin-butt">
                                        <input type="submit" class="btn btn-raised btn-primary col-md-12 col-xs-12 col-lg-6" value="Sign In">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/material.min.js" type="text/javascript"></script>
        <script src="js/ripples.min.js"></script>
        <!--<script src="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>-->
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script src="js/common.js"></script>
    </body>
</html>