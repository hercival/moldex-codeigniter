<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="ortigas, ortigas and company, maven, capitol commons, imperium, royalton, viridian, greenhills, pasig, condo, condominiums, residences, residential, estate, estates, malls, estancia, careers, silver city, ortigas center, transcom, ortigas building, circulo verde, industria, valle verde, frontera verde, luntala valle verde, unimart, vmall, news, events, 85 years">
        <meta name="subject" content="ortigas, ortigas and company, maven, capitol commons, imperium, royalton, viridian, greenhills, pasig, condo, condominiums, residences, residential, estate, estates, malls, estancia, careers, silver city, ortigas center, transcom, ortigas building, circulo verde, industria, valle verde, frontera verde, luntala valle verde, unimart, vmall, news, events, 85 years">
        <meta name="copyright" content="Ortigas and Company">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Ortigas & Company</title>
    
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>includes/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="<?php echo base_url(); ?>includes/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>includes/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>includes/css/jquery.carousel.fullscreen.css" />
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        
        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>includes/js/bootstrap.min.js"></script>
<!--        <script src="<?php echo base_url(); ?>includes/js/jquery-1.10.0.min.js"></script>-->
        

<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
<!--        <script src="<?php echo base_url(); ?>includes/js/jquery.js"></script>-->
        <script src="<?php echo base_url(); ?>includes/js/scripts.js"></script>
    </head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Navigation -->

<div class="navbar navbar-static-top">
    <div class="container" style="margin-top: 10px;">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo base_url(); ?>includes/img/ocLogo.png" alt="Ortigas">
            </a>
        </div>

        <div class="navbar-collapse collapse">
           <?php echo module_menu(1,'topmenu');?>
            <div class="input-group stylish-input-group">
                <a class="icon-margin" href="#">
                    <img src="<?php echo base_url(); ?>includes/img/fb.png" alt="ortigasfb">
                </a>       
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>     
              <input type="text" class="form-control" placeholder="Search">
            </div>        
        </div>
    </div>
</div>

<!-- Body Starts Here -->
    <section class="container">
        <div class="row col-md-12">
            <div class="jumbotron">
                <center><h1>Page not found</h1></center>
              <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers Back button to navigate to the page you have prevously come from.</p>
              <p><a href="<?php echo base_url();?>" class="btn btn-primary btn-lg" href="#" role="button">Take Home</a></p>
            </div>
        </div>
    </section>

    <center><div class="border-last"></div></center>     

    <section class="container year-tab defaultMarginTop defaultMarginBottom">
        <div class="row">
            <div class="col-xs-12 col-sm-4"><center><img class="img-responsive" src="<?php echo base_url(); ?>includes/img/85years.png"></center></div>
            <div class="col-xs-12 col-sm-7 defaultMarginTop">
                <p class="align-center-mobile">
                    <span><img src="<?php echo base_url(); ?>includes/img/q1.png"></span>
                    For almost 85 years, we have brought to life some of the nation's most iconic places for living, shopping, business, and entertainment. We have been building traditions, creating indelible experiences, and developing new inspirations for living. 
                    <span><img src="<?php echo base_url(); ?>includes/img/q2.png"></span>
                </p>    
            </div>
        </div>
    </section>

<!-- Maps -->
        <section class="map-section">
            <div class="col-lg-3 overlay-tab-maps">
                <h2>CONTACT US</h2>
                <br>
                <p>9th Floor, Ortigas Building</p>
                <p>Ortigas Avenue, Pasig City</p>
                <p>1600 Philippines</p>
                <br>
                <p>Phone : (632) 631.1231</p>
                <p>Telefax : (632) 631.6517</p>
                <br>
                <p>info@ortigas.com.ph</p>
            </div>

            <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC_yJ9-3IJsfDaxaBGxmPI7lJWPpWoHMZw'></script>
            <div style='overflow:hidden;height:300px;width:100%;'>
                <div id='gmap_canvas' style='height:300px;width:100%;'></div>
                <div><small><a href="http://embedgooglemaps.com">embed google maps</a></small></div>
                <div><small><a href="https://privacypolicygenerator.info">privacy policy generator</a></small></div>
                <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
            </div>
            <script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(14.589741,121.07722280000007),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(14.589741,121.07722280000007)});infowindow = new google.maps.InfoWindow({content:'<strong>Ortigas & Company</strong><br>9th Floor, Ortigas Building Ortigas Avenue, Pasig City 1600 Philippines<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
            </script>
            </div>
        </section>  

        <footer class="container-fluid">
            <div class="row col-md-12" style="margin-top: 10px;">
                <div class="col-md-9 footer-links">
                   <?php echo module_menu(2,'footer');?>
                </div>
                <div class="col-md-3 footer-disclaimer center-element">
                    <img class="img-responsive" style="margin-bottom: 5px;" src="<?php echo base_url(); ?>includes/img/ocLogo-small.png">
                    <p style="font-size: 10px;">© Copyright 2016. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <script type="text/javascript">
        // jQuery(document).ready(function(){
        //     $(".dropdown").hover(
        //         function() { $('.dropdown-menu', this).stop().fadeIn("fast");
        //         },
        //         function() { $('.dropdown-menu', this).stop().fadeOut("fast");
        //     });
        // });
        </script>
    </body>
</html>
