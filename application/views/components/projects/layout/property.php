<?php //var_dump($com_data);?>
   <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>projects">Projects</a></li>
    <li class="breadcrumb-item active"><?php echo $location_data->title; ?></li>
</ol>
<div class="container-fluid">
    <div class="row project-banner" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $location_data->proj_banner;?>)">
        <h1 class="text-center"><?php echo $location_data->title; ?></h1> </div>
</div>
<div class="container">
    <nav class="project-nav">
        <ul>
            <li><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias; ?>/all">All</a></li>
            <li><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias; ?>/new">New</a></li>
            <li><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias; ?>/featured">Featured</a></li>
            <li><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias; ?>/complete">Completed</a></li>
        </ul>
    </nav>
    <div class="row text-center tile-marginBottom">
        <?php foreach($com_data as $project){ 
           $project_type_alias = project_type_id_to_alias($project->project_type); ?>
            <div class="col-sm-12 col-md-4 project-tile margin-top10px-mobile">
                <div id="project-tile1" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $project->tile;?>)"></div>
                <!-- Determine if project is featured -->
                <div id="<?php echo $project->status;?>-tag"></div>
                <!-- Determine if project is featured -->
                <div class="project-tile-details">
                    <h3><a href="<?php echo base_url();?>projects/<?php echo $location_data->alias.'/'.$project->status.'/'.$project_type_alias->alias.'/'.$project->alias;?>"><?php echo $project->project_name;?></a></h3>
                    <?php $html = strip_tags($project->desc);
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
                    <a href="<?php echo base_url();?>projects/<?php echo $location_data->alias.'/'.$project->status.'/'.$project_type_alias->alias.'/'.$project->alias;?>" class="btn btn-primary btn-md">View Project</a>
                </div>
            </div>
        <?php } ?>
    </div>
    
    <!-- Completed Projects -->
    <div class="col-sm-12 completed-projects-tab">
        <div class="col-sm-10">
            <h3>Completed Projects</h3> </div>
        <!-- Controls -->
        <div class="col-sm-2 controls pull-right text-right controls-mobile">
            <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a>
            <a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
        </div>
    </div>
    <div class="row completed-carousel">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                  <?php $project_complete = project_by_status('all',$location_data->id);?>
                   <?php $item_counter = 0; foreach($project_complete as $complete){ 
                        $project_type_alias = project_type_id_to_alias($complete->project_type); ?>
                       <?php if($item_counter == 3 ){ echo '</div><div class="item">'; $item_counter = 0;}?>
                        <div class="col-sm-4 project-tile margin-top10px-mobile">
                            <div id="project-comp1" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $complete->tile;?>)"></div>
                            <div class="project-tile-details">
                                <h3><a href=""><?php echo $complete->project_name;?></a></h3>
                                <?php $html = strip_tags($complete->desc);
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
                                <a href="<?php echo base_url();?>projects/<?php echo $location_data->alias.'/'.$complete->status.'/'.$project_type_alias->alias.'/'.$complete->alias;?>" class="btn btn-primary btn-md">View Project</a>
                            </div>
                        </div>
                        <?php $item_counter++;?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>