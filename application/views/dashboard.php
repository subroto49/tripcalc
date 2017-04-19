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
            <div class="col-lg-offset-2 data well">
                Hi!!! Welcome Again            
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