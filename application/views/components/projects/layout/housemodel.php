<?php $project_type_alias = project_type_id_to_alias($com_data->project_type); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>projects">Projects</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias; ?>"><?php echo $location_data->title; ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias.'/'.$com_data->status.'/'.$project_type_alias->alias.'/'.$com_data->alias; ?>"><?php echo $com_data->project_name; ?></a></li>
    <li class="breadcrumb-item active">Camille</li>
</ol>
<!-- Carousel -->
<?php $banners =json_decode($housemodel_data->banners);?>
<div id="carousel-example-generic" class="carousel slide carousel-fade inner-carousel" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
       <?php if(count($banners) > 0){ $active = 'active';$counter=0; foreach($banners->item as $image){ ?>
           <li data-target="#carousel-example-generic" data-slide-to="<?php echo $counter;?>" class="<?php echo $active;?>"></li>
       <?php $active='';$counter++;} }?>
    </ol>
    <!-- Wrapper for slides -->

    <div class="carousel-inner">
        
           <?php if(count($banners) > 0){ $active = 'active'; foreach($banners->item as $image){ ?>
            <div class="item <?php echo $active;?>">
                <div class="fill" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $image;?>)"> </div>
            </div>
        <?php $active='';} }?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>
<!-- end Carousel -->
<div class="container-fluid bg-white">
    <div class="container">
        <div class="row project-details">
            <div class="col-sm-5 text-center"> <img src="<?php echo base_url();?>includes/img/heritagespringhomes-logo.png">
                <br>
                <button type="button" class="btn btn-primary btn-md margin-5px">Inquire Now</button>
                <br>
                <button type="button" class="btn btn-primary btn-md margin-5px">View AVP</button>
            </div>
            <div class="col-sm-7">
                <h3><?php echo $com_data->project_name; ?> - <?php echo $housemodel_data->name; ?></h3>
                <?php echo $com_data->desc; ?>
                <br>
                <p><span style="font-weight: bold; font-size: 12px;">Development Size</span> <?php echo $com_data->size; ?></p>
                <?php $location_add_data = project_location_data($com_data->location);?>
                <p><span style="font-weight: bold; font-size: 12px;">Address</span> <?php echo $location_add_data->location_add; ?></p>
                <p><span style="font-weight: bold; font-size: 12px;">LS Number</span> <?php echo $com_data->number; ?></p>
                <p><span style="font-weight: bold; font-size: 12px;">House & Lot Price Range</span> <?php echo $housemodel_data->price; ?></p>
                <br> </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid project-nav-tabs">
    <div class="row">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="tab" href="#floorplan">FLOOR PLAN</a></li>
            <li><a data-toggle="tab" href="#interior">INTERIOR PERSPECTIVES</a></li>
            <li><a data-toggle="tab" href="#videos">WATCH VIDEOS</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid bg-models">
    <div class="container tab-content">
        <div class="row project-floorplan tab-pane fade in active" id="floorplan">
           <img src="<?php echo base_url();?>includes/uploads/<?php echo $housemodel_data->floor_plan; ?>" id="floorplan-large-image" class="img-responsive">
            <div class="row margin-thumbnails">
                <!--div class="col-xs-3">
                    <a href="#" class="click-thumb" alt="<?php //echo $housemodel_data->floor_plan; ?>"><img src="<?php //echo base_url();?>includes/uploads/<?php //echo $housemodel_data->floor_plan; ?>" class="img-responsive"></a>
                </div-->
            </div>
        </div>
        <div class="row project-interior tab-pane fade" id="interior">
            <div class="desc-interior">
                <?php echo $housemodel_data->interior_details; ?>
            </div>
            <div class="row amenity-imgs margin-top20px">
                <center>
                   <?php $interior_gallery =json_decode($housemodel_data->interior_gallery);?>
                    <?php if(count($interior_gallery) > 0){foreach($interior_gallery->item as $image){ ?>
                    <div class="col-sm-3 margin-thumb-mobile">
                        <a href="<?php echo base_url();?>includes/uploads/<?php echo $image; ?>" class="fancybox"><img src="<?php echo base_url();?>includes/uploads/<?php echo $image; ?>" class="img-responsive"></a>
                    </div>
                    <?php } }?>
                </center>
            </div>
        </div>
        <div class="row project-videos tab-pane fade" id="videos">
            <div class="row text-center tile-marginBottom">
                <div class="col-sm-12 tile-marginBottom">
                    <h2>Video</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo $housemodel_data->video_link;?>"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var base_url = <?php echo  "'".base_url()."'";?>;
        $('.click-thumb').click(function(){
            var image_name = $(this).attr('alt');
            $('#floorplan-large-image').attr('src',base_url+'includes/uploads/'+image_name);
            return false;
        });
    });
</script>