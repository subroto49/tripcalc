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
            <div class="col-lg-offset-2 data well">
                <form class="form-horizontal" method="POST" action="">
                    <fieldset>
                        <div class="col-lg-offset-2 panel panel-default">
                            <div class="panel-heading">ADD MEMBERS</div>
                            <div class="panel-body">
                                <div class="form-group" id="permanant_div">
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <input class="form-control" name="inputName" id="test1" placeholder="Name" type="text" data-validation="emptycheck">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <input class="form-control" name="inputEmail" placeholder="Email" type="email" data-validation="email">
                                    </div>
                                </div>
                                <div class="test">

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
        <?php include('header/js.html');?>
    </body>
</html>