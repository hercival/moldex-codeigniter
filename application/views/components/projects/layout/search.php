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
<div class="container">
    <div class="row text-center tile-marginBottom">
        <?php foreach($com_data as $project){ 
            $project_type_alias = project_type_id_to_alias($project->project_type); 
            $location_data = project_location_id($project->location_id);?>
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
</div>