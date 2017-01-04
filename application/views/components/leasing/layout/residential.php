<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>leasing">Leasing</a></li>
    <li class="breadcrumb-item active">Residential</li>
</ol>
<div id="carousel-example-generic" class="carousel slide carousel-fade inner-carousel" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators leasing-carousel-indicators">
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
<div class="container">
    <div class="col-sm-12 listing-projects-tab">
        <div class="col-sm-10">
            <h3>Property Listing</h3> </div>
    </div>
    <div class="row text-center tile-marginBottom">
       <?php foreach($com_data as $leasing){ ?>
        <div class="col-sm-12 col-md-4 project-tile margin-top10px-mobile">
            <div id="listing-main1" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $leasing->tile;?>)"></div>
            <div class="project-tile-details">
                <h3><a href=""><?php echo $leasing->project_name;?></a></h3>
                <?php $html = strip_tags($leasing->desc);
                        $html_explode = explode(' ',$html);
                        $new_html = '';
                        $counter = 0;
                        foreach($html_explode as $str){
                            if($counter <= 20){
                                $new_html .= $str.' ';
                            }
                            $counter ++;
                        }
				    ?>
                <p><?php echo $new_html;?>...</p>
                <a href="<?php echo base_url(); ?>leasing/residential/<?php echo $leasing->alias;?>" class="btn btn-primary btn-md">View Project</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- Completed Projects -->
    <div class="col-sm-12 listing-projects-tab">
        <div class="col-sm-10">
            <h3>Featured Listings</h3> </div>
        <!-- Controls -->
        <div class="col-sm-2 controls pull-right text-right controls-mobile">
            <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a>
            <a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
        </div>
    </div>
    <div class="row featlisting-carousel">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
               <?php $featured = featured_leasing();?>
                   <?php $item_counter = 0; foreach($featured as $leasing){ 
                        $this_project = get_leasing_property_alias($leasing->project_id); ?>
                       <?php if($item_counter == 4 ){ echo '</div><div class="item">'; $item_counter = 0;}?>
                        <div class="col-sm-3 project-tile margin-top10px-mobile">
                            <div id="feat-listings1" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $leasing->tile;?>)"></div>
                            <div class="project-tile-details">
                                <h3><a href=""><?php echo $leasing->name;?></a></h3>
                                <p><?php echo $leasing->model_type;?> - <?php echo $this_project->project_name;?></p>
                                <a href="<?php echo base_url();?>leasing/residential/<?php echo $this_project->alias;?>/<?php echo $leasing->alias;?>" class="btn btn-primary btn-md">View Listing</a>
                            </div>
                        </div>
                        <?php $item_counter++;?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF CONTAINER -->