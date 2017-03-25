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