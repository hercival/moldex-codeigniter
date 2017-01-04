<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>leasing">Leasing</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>leasing/residential">Residential</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>leasing/residential/<?php echo $project_data->alias; ?>"><?php echo $project_data->project_name; ?></a></li>
    <li class="breadcrumb-item active"><?php echo $com_data->name; ?></li>
</ol>
<div class="container-fluid bg-white">
    <div class="container">
        <div class="row project-details">
            <div class="col-sm-5 text-center">
               <img src="<?php echo base_url();?>includes/uploads/<?php echo $project_data->logo; ?>">
                <br>
                <button type="button" class="btn btn-primary btn-md margin-5px">Inquire Now</button>
            </div>
            <div class="col-sm-7">
                <h3><?php echo $project_data->project_name; ?></h3>
                <?php echo $project_data->desc; ?>
                <br>
                <p><span style="font-weight: bold; font-size: 12px;">Development Size</span> <?php echo $project_data->size; ?></p>
                <?php $location_add_data = project_location_data($project_data->location);?>
                <p><span style="font-weight: bold; font-size: 12px;">Address</span> <?php echo $location_add_data->location_add; ?></p>
                <p><span style="font-weight: bold; font-size: 12px;">LS Number</span> <?php echo $project_data->number; ?></p>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid project-nav-tabs">
    <div class="row">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="tab" href="#location"><?php echo $project_data->project_name; ?> - <?php echo $com_data->name; ?></a></li>
        </ul>
    </div>
</div>
<div class="container-fluid bg-models">
    <div class="container tab-content">
        <div class="row project-amenities tab-pane fade in active" id="amenities">
            <div class="desc-amenities">
                <?php echo $com_data->interior_details; ?>
            </div>
            <div class="row amenity-imgs margin-top20px">
                <center>
                    <?php $gallery =json_decode($com_data->interior_gallery);?>
                       <?php if(count($gallery) > 0){ foreach($gallery->item as $image){ ?>
                        <div class="col-md-3 margin-thumb-mobile">
                            <a href="<?php echo base_url();?>includes/uploads/<?php echo $image;?>" class="fancybox"><img src="<?php echo base_url();?>includes/uploads/<?php echo $image;?>" class="img-responsive"></a>
                        </div>
                    <?php } }?>
                </center>
            </div>
        </div>
    </div>
</div>


<?php 
    $long_lat = $project_data->long_lat;
    $longlat = explode(',', $long_lat);
    $long_value = $longlat[1];
    $lat_value = $longlat[0];
?>
<div id="map" style="height:350px;width:100%;"></div>
<script>
      function initMap() {
        var origin_place_id = null;
        var destination_place_id = null;
        var travel_mode = 'WALKING';
        var desti_place_id ='';
        var desti_place_address_formatted ='-=<?php echo $project_data->project_name;?>=-';
        var latlng = {lat: <?php echo $lat_value; ?>, lng: <?php echo $long_value; ?>};
        var geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: true,
          center: latlng,
          zoom: 17,
            title: desti_place_address_formatted
        });
          
        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          title: desti_place_address_formatted
        });
          
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc9zWfCzIxzVLOmbLRDOgM3oXcVDjrD7I&libraries=places&callback=initMap"></script>