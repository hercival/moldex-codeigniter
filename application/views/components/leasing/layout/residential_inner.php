<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url();?>leasing">Leasing</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url();?>leasing/residential">Residential</a></li>
  <li class="breadcrumb-item active"><?php echo $com_data->project_name; ?></li>
</ol>
<!-- Carousel -->
<?php $banners =json_decode($com_data->banners);?>
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
      <div class="col-sm-5 text-center">
        <img src="<?php echo base_url();?>includes/uploads/<?php echo $com_data->logo; ?>">
        <br>
        <a href="#" class="btn btn-primary btn-md margin-5px">Inquire Now</a>
      </div>
      <div class="col-sm-7">
        <h3><?php echo $com_data->project_name; ?></h3>
        <?php echo $com_data->desc; ?>
        <br>
        <p><span style="font-weight: bold; font-size: 12px;">Development Size</span> <?php echo $com_data->size; ?></p>
        <?php $location_add_data = project_location_data($com_data->location);?>
        <p><span style="font-weight: bold; font-size: 12px;">Address</span> <?php echo $location_add_data->location_add; ?></p>
        <p><span style="font-weight: bold; font-size: 12px;">LS Number</span> <?php echo $com_data->number; ?></p>
      </div>    
    </div>
  </div>  
</div>
<br>
<div class="container-fluid project-nav-tabs">
  <div class="row">
    <ul class="nav nav-pills nav-justified">
      <li class="active"><a data-toggle="tab" href="#location">LOCATION</a></li>
      <li><a data-toggle="tab" href="#amenities">AMENITIES AND FEATURES</a></li>
      <li><a data-toggle="tab" href="#listings">LISTINGS</a></li>
    </ul>
  </div>
</div>


<div class="container-fluid bg-models">
  <div class="container tab-content">
    <div class="row project-location tab-pane fade in active" id="location">
      <div class="col-md-12">
        <?php echo $com_data->location_desc; ?>
        <p>Go To <?php echo $com_data->project_name; ?></p>
        <div class="row">
          <div class="form-group col-md-4">
            <input type="text" class="form-control" id="starting-point" placeholder="Starting Point">
          </div>  
          <div class="col-md-1"><img src="<?php echo base_url();?>includes/img/circs.png"></div>   
          
          <div class="form-group col-md-4">
            <input type="text" class="form-control" id="end-point" placeholder="Location will be pinned here, for dev implementation" disabled value="<?php echo $com_data->project_name?>">
          </div>             
        </div>  
        <div class="row" style="margin-left: 1px;">
          <button type="button" class="btn btn-primary btn-md margin-5px">Search</button>
          <!--button type="button" class="btn btn-primary btn-md margin-5px">Send Directions to Mobile Phone</button-->
        </div>        
      </div>
    </div>
    
<?php $housemodels = housemodel_by_project_id($com_data->id); ?>
<?php $project_type_alias = project_type_id_to_alias($com_data->project_type); ?>
<div class="row project-listings tab-pane fade" id="listings">
    <div class="row text-center tile-marginBottom">
       <?php foreach($housemodels as $models){ ?>
            <div class="col-sm-12 col-md-4 project-tile margin-top10px-mobile">
                <div id="listing1" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $models->tile;?>);"></div>
                <!-- Determine if project is new -->
                <div id="<?php echo $models->status; ?>-tag"></div>
                <!-- Determine if project is new -->
                <div class="project-tile-details">
                    <h3><a href="<?php echo base_url();?>leasing/residential/<?php echo $com_data->alias.'/'.$models->alias;?>"><?php echo $models->name;?></a></h3>
                    <?php $html = strip_tags($models->desc);
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
                    <p><?php echo $new_html; ?>...</p>
                    <a href="<?php echo base_url();?>leasing/residential/<?php echo $com_data->alias.'/'.$models->alias;?>" class="btn btn-primary btn-md">View</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>      
    <div class="row project-amenities tab-pane fade" id="amenities">
      <div class="desc-amenities">
        <?php echo $com_data->amen_fea_desc; ?>
      </div>
      <div class="row amenity-imgs margin-top20px">
        <center>
            <?php $gallery =json_decode($com_data->gallery);?>
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
    $long_lat = $com_data->long_lat;
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
        var desti_place_address_formatted ='';
        var latlng = {lat: <?php echo $lat_value; ?>, lng: <?php echo $long_value; ?>};
        var geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: latlng,
          zoom: 16
        });
        
        
        var desti = geocoder.geocode({'location': latlng},function(results, status) {
            console.log(results[0].formatted_address);
            if (status === 'OK') {
                desti_place_id = results[0].place_id;
                desti_place_address_formatted = results[0].formatted_address;
            }
        });
          
        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          title: desti_place_address_formatted
        });
          
          
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);
        var origin_input = document.getElementById('starting-point');
        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        origin_autocomplete.bindTo('bounds', map);

        function expandViewportToFitPlace(map, place) {
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
        }

        origin_autocomplete.addListener('place_changed', function() {
          var place = origin_autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
          expandViewportToFitPlace(map, place);
          origin_place_id = place.place_id;
          route(origin_place_id, destination_place_id, travel_mode,
                directionsService, directionsDisplay);
        });


        function route(origin_place_id, destination_place_id, travel_mode, directionsService, directionsDisplay) {
            if (!origin_place_id ) {
                return;
            }
            
            directionsService.route({
                origin: {'placeId': origin_place_id},
                destination: {'placeId': desti_place_id},
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                }else{
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc9zWfCzIxzVLOmbLRDOgM3oXcVDjrD7I&libraries=places&callback=initMap"></script>