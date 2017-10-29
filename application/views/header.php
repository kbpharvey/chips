<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $p_site_name; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
        <link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
        <style>
          
                    .navbar-brand 
            {
                float: left;
                height: 50px;
                padding: 15px 15px;
                font-size: 40px;
                line-height: 20px;
                width: 500px;
                color: red;
                
            }  
            .navbar-default .navbar-brand {
                color: blue;
            }
        </style>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<header id="site-header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand col-md-10" href="<?= base_url() ?>"><?php  echo $p_site_name?></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right col-md-2">
                                            
                                            <?php
//                                            echo "admin in header is" . $is_admin;
                                                switch ($is_admin)
                                                {
                                                    case 0:
							echo "<li>Logged in as " . $user_name . "<a href=" . base_url('/User/user_logout') . ">" . $p_logout . "</a></li>";
                                                        break;
                                                    case 1:
							echo "<li>Logged in as " . $user_name . "<a href=" . base_url('/User/user_logout') . ">" . $p_logout . "</a></li>";
                                                        break;
                                                    case 2:
                                                        echo "<li><a href=" . base_url('/User/') . ">" . $p_login_header . "</a></li>";
                                                        echo "<li><a href=" . base_url('/User/register/') . ">" . $p_register . "</a></li>";
                                                        break;
                                                    case 3:
                                                        echo "<li><a href=" . base_url('/User/user_logout') . ">" . $p_login_header . "</a></li>";
                                                        break;
                                                    default:
                                                        echo "<li><a href=" . base_url('/User/') . ">" . $p_login_header . "</a></li>";
                                                        echo "<li><a href=" . base_url('/User/register/') . ">" . $p_register . "</a></li>";                                                        
                                                        exit(1); // EXIT_ERROR
                                                } 
                                            
                                            
                                            ?>
 					</ul>
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<main id="site-content" role="main">
		
		<?php if (isset($_SESSION)) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php //    var_dump($_SESSION); ?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		<?php endif; ?>
		
