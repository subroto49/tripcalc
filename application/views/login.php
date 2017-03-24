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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Material Design -->
        <link href="/css/bootstrap-material-design.css" rel="stylesheet">
        <link href="/css/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <!--Navbar-->
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="javascript:void(0)">Active</a></li>
                        <li><a href="javascript:void(0)">Link</a></li>
                        <li class="dropdown">
                            <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Action</a></li>
                                <li><a href="javascript:void(0)">Another action</a></li>
                                <li><a href="javascript:void(0)">Something else here</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Dropdown header</li>
                                <li><a href="javascript:void(0)">Separated link</a></li>
                                <li><a href="javascript:void(0)">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control col-md-8" placeholder="Search">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:void(0)">Link</a></li>
                        <li class="dropdown">
                            <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Action</a></li>
                                <li><a href="javascript:void(0)">Another action</a></li>
                                <li><a href="javascript:void(0)">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row login-wrap card">
                <div class="card-block">
                    <form class="form-horizontal" method="post">
                        <div class="col-lg-12 col-md-12 col-xs-12 sign-in-htm">
                            <div class="row">
                                <input id="inputUser" name='inputUser' type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="row">
                                <input id="pass" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="row">
                                <input id="check" type="checkbox" class="" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="row">
                                <input type="button" class="btn btn-primary" value="Sign In">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/material.min.js" type="text/javascript"></script>
        <script src="js/ripples.min.js"></script>
        <script src="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
        <script src="js/common.js"></script>
    </body>
</html>