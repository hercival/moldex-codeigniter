<!-- Start of Project -->
<div id="carousel-example-generic" class="carousel slide carousel-fade inner-carousel" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators project-carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url(<?php echo base_url();?>includes/img/project-banner1.jpg)"> </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url(<?php echo base_url();?>includes/img/project-banner1.jpg)"> </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>

<div class="container findYourHome-tab">
    <form action="<?php echo base_url();?>projects/search" method="post">
        <p>Find Your Dream Home</p>
        <div class="row">
            <div class="col-md-6">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Type <span class="caret pull-right"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="type-search" alt="1">Condominium - Studio</a></li>
                        <li><a href="#" class="type-search" alt="1">Condominium - 1 BR</a></li>
                        <li><a href="#" class="type-search" alt="1">Condominium - 2 BR</a></li>
                        <li><a href="#" class="type-search" alt="1">Condominium - 3 BR</a></li>
                        <li><a href="#" class="type-search" alt="1">Condominium - 4 BR</a></li>
                        <li><a href="#" class="type-search" alt="2">Houes & Lot</a></li>
                        <li><a href="#" class="type-search" alt="2">Lot Only</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Location <span class="caret pull-right"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="location-search" alt="1">Baguio</a></li>
                        <li><a href="#" class="location-search" alt="2">Bulacan</a></li>
                        <li><a href="#" class="location-search" alt="3">Cavite</a></li>
                        <li><a href="#" class="location-search" alt="4">Gil Puyat Ave., Pasay</a></li>
                        <li><a href="#" class="location-search" alt="5">Laguna</a></li>
                        <li><a href="#" class="location-search" alt="6">Pampanga</a></li>
                        <li><a href="#" class="location-search" alt="7">Roxas Boulevard, Manila</a></li>
                        <li><a href="#" class="location-search" alt="8">Tagaytay</a></li>
                        <li><a href="#" class="location-search" alt="9">Valenzuela</a></li>
                        <li><a href="#" class="location-search" alt="10">Vito Cruz, Manila</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center">
           <input type="hidden" value="0" name="typesearch" id="typesearch">
           <input type="hidden" value="0" name="locationsearch" id="locationsearch">
            <button type="submit" class="btn btn-primary btn-md btn-view">Search</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('.type-search').click(function(){
            var thevalue = $(this).attr('alt');
            $('#typesearch').val(thevalue);
        });
        $('.location-search').click(function(){
            var thevalue = $(this).attr('alt');
            $('#locationsearch').val(thevalue);
        });
    });
</script>


<div class="intro-projects-tab">
    <h3>Projects</h3>
    <p>Committed to upholding quality, integrity, and excellence.</p>
</div>

<br>

<div class="container-fluid project-nav-tabs">
    <div class="row">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="tab" href="#northofmnl">NORTH OF MANILA</a></li>
            <li><a data-toggle="tab" href="#heartofmnl">HEART OF MANILA</a></li>
            <li><a data-toggle="tab" href="#southofmnl">SOUTH OF MANILA</a></li>
        </ul>
    </div>
</div>
<div class="container tab-content">
    <div class="north-tab tab-pane fade in active" id="northofmnl">
        <div class="intro-projects-txt col-md-5">
            <p>Find your nook.</p>
            <h2>Comfort and convenience located in the North of Manila.</h2>
            <br>
            <a href="<?php echo base_url();?>projects/north-of-manila" class="btn btn-primary btn-md">Explore All Projects</a>
        </div>
        <div class="intro-projects-img col-md-7">
            <div id="carousel-north" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-north" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-north" data-slide-to="1"></li>
                    <li data-target="#carousel-north" data-slide-to="2"></li>
                    <li data-target="#carousel-north" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active"> <img src="<?php echo base_url();?>includes/img/north-1.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/north-2.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/north-3.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/north-4.jpg" alt="..."> </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-north" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                <a class="right carousel-control" href="#carousel-north" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
            </div>
        </div>
    </div>
    <div class="heart-tab tab-pane fade" id="heartofmnl">
        <div class="intro-projects-txt col-md-5">
            <p>Find your nook. (Change copy)</p>
            <h2>Comfort and convenience located in the Heart of Manila.(Change copy)</h2>
            <br>
            <a href="<?php echo base_url();?>projects/heart-of-manila" class="btn btn-primary btn-md">Explore All Projects</a>
        </div>
        <div class="intro-projects-img col-md-7">
            <div id="carousel-heart" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-heart" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-heart" data-slide-to="1"></li>
                    <li data-target="#carousel-heart" data-slide-to="2"></li>
                    <li data-target="#carousel-heart" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active"> <img src="<?php echo base_url();?>includes/img/heart-1.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/heart-2.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/heart-3.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/heart-4.jpg" alt="..."> </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-heart" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                <a class="right carousel-control" href="#carousel-heart" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
            </div>
        </div>
    </div>
    <div class="south-tab tab-pane fade" id="southofmnl">
        <div class="intro-projects-txt col-md-5">
            <p>Find your nook. (Change copy)</p>
            <h2>Comfort and convenience located in the South of Manila.(Change copy)</h2>
            <br>
            <a href="<?php echo base_url();?>projects/south-of-manila" class="btn btn-primary btn-md">Explore All Projects</a>
        </div>
        <div class="intro-projects-img col-md-7">
            <div id="carousel-south" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-south" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-south" data-slide-to="1"></li>
                    <li data-target="#carousel-south" data-slide-to="2"></li>
                    <li data-target="#carousel-south" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active"> <img src="<?php echo base_url();?>includes/img/south-1.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/south-2.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/south-3.jpg" alt="..."> </div>
                    <div class="item"> <img src="<?php echo base_url();?>includes/img/south-4.jpg" alt="..."> </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-south" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                <a class="right carousel-control" href="#carousel-south" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
            </div>
        </div>
    </div>
</div>