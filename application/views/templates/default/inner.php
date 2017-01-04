<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <?php meta_generator($page_details);?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>favicon.ico">

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>includes/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="<?php echo base_url(); ?>includes/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>includes/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>includes/css/jquery.carousel.fullscreen.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/js/fancybox/jquery.fancybox.css" media="screen" />
        <!-- Add on all pages -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css"rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Add on all pages -->
        
        <!-- JS -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/jquery-1.10.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/jquery.carousel.fullscreen.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/bootstrap-select.min.js"></script>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/jquery.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url();?>includes/js/fancybox/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>includes/js/fancybox/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>includes/js/fancybox/helpers/jquery.fancybox-media.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>includes/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>

    </head>
    
    <body>
        <nav id="mainNav" class="navbar navbar-default navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>includes/img/logo.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <?php //echo module_menu(1,'topmenu');?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden"><a href="<?php echo base_url(); ?>"></a></li>
                        <li><a href="<?php echo base_url(); ?>about-us">About</a></li>
                        <li><a href="<?php echo base_url(); ?>projects">Projects</a></li>
                        <li><a href="<?php echo base_url(); ?>leasing">Leasing</a></li>
                        <li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
                        <li><a href="<?php echo base_url(); ?>news">News</a></li>      
                        <li><a href="<?php echo base_url(); ?>inquiry">Schedule a Visit</a></li>                                   
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <?php $this->load->view('components/'.$page_details->page_type.'/layout/'.$page_details->com_layout, $page_details); ?>


        <div class="container-fluid footer-tab">
            <div class="row footer-links">
                <div class="visible-md visible-lg">
                    <ul>
                        <a href="<?php echo base_url(); ?>about-us">About</a> |
                        <a href="<?php echo base_url(); ?>projects">Projects</a> | 
                        <a href="<?php echo base_url(); ?>leasing">Leasing</a> | 
                        <a href="<?php echo base_url(); ?>careers">Careers</a> | 
                        <a href="<?php echo base_url(); ?>news">News</a> | 
                        <a href="<?php echo base_url(); ?>inquiry">Schedule a Visit</a>
                    </ul>
                </div>  
                <div class="footer-nav-block hidden-md hidden-lg">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>about-us">About</a></li>
                        <li><a href="<?php echo base_url(); ?>projects">Projects</a> </li>
                        <li><a href="<?php echo base_url(); ?>leasing">Leasing</a></li>
                        <li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
                        <li><a href="<?php echo base_url(); ?>news">News</a></li>
                        <li><a href="<?php echo base_url(); ?>inquiry">Schedule a Visit</a></li>
                    </ul>
                </div>      
            </div>
            <div class="row disclaimer">
                <div class="col-md-8 text-left">
                    <p>© 2016 Moldex Realty Inc.</p>
                    <a href="#">Privacy Policy</a>   
                </div> 
                <div class="col-md-4 text-right">
                    <a href="#"><img class="icons-padding" src="<?php echo base_url(); ?>includes/img/fb.png"></a>
                    <a href="#"><img class="icons-padding" src="<?php echo base_url(); ?>includes/img/tw.png"></a>
                    <a href="#"><img class="icons-padding" src="<?php echo base_url(); ?>includes/img/ig.png"></a>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $(".fancybox").fancybox({prevEffect: 'fade',nextEffect: 'fade',helpers: {overlay: {locked: false}}});
        });
    </script>
</html>
