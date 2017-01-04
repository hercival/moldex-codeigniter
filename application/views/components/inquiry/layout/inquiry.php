<div><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:350px;width:100%;"><div id="gmap_canvas" style="height:350px;width:100%;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.embedgooglemap.net" id="get-map-data"></a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:18,center:new google.maps.LatLng(14.6760413,121.04370029999995),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(14.6760413, 121.04370029999995)});infowindow = new google.maps.InfoWindow({content:"<b></b><br/>Moldex Realty Incorporated, Ligaya, Quezon City, NCR<br/> Quezon City" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script></div>


<!-- Form -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container book-tab">
    <div class="row">
        <div class="col-md-7" id="book-form">
            <h3>Fill up this form for your inquiry.</h3>
            <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?php echo $message;?>
            <form class="row" method="post" action="<?php echo base_url(); ?>inquiry">
                <div class="form-group col-xs-12 col-sm-6">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Name *" required value="<?php echo set_value('name'); ?>"> </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email *" required value="<?php echo set_value('email'); ?>"> </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Contact Number *" required value="<?php echo set_value('phone'); ?>"> </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <input type="address" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo set_value('address'); ?>"> </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <select class="selectpicker" name="subject" multiple data-max-options="1" data-style="btn-default" multiple title="Subject *" >
                        <optgroup label="Subject *" required>
                            <option value="Inquiry">Inquiry</option>
                            <option value="Sellers Accreditation">Sellers Accreditation</option>
                            <option value="After Sales Support">After Sales Support</option>
                            <option value="Careers">Careers</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <select class="selectpicker" name="project" multiple data-max-options="1" data-style="btn-default" multiple title="Choose a Project">
                        <optgroup label="Project Location">
                            <?php foreach($projects as $location){ ?>
                                <option value="<?php echo $location->project_name; ?>"><?php echo $location->project_name; ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group col-xs-12">
                    <select class="selectpicker" name="findus" multiple data-max-options="2" data-style="btn-default" multiple title="Where did you find us?">
                        <optgroup label="Search Engine">
                            <option value="Inquiry">Google</option>
                            <option value="Inquiry">Yahoo</option>
                            <option value="Inquiry">Bing</option>
                        </optgroup>
                        <optgroup label="Social Media">
                            <option value="Inquiry">Facebook</option>
                            <option value="Inquiry">Instagram</option>
                        </optgroup>
                        <optgroup label="Print Ad">
                            <option value="Inquiry">Newspaper</option>
                            <option value="Inquiry">Magazine</option>
                        </optgroup>
                        <optgroup label="Transit Ad">
                            <option value="Inquiry">Bus Ad</option>
                            <option value="Inquiry">Roving Billboard</option>
                        </optgroup>
                        <optgroup label="Outdoor Ad">
                            <option value="Inquiry">Billboard</option>
                            <option value="Inquiry">Streamers</option>
                        </optgroup>
                        <optgroup label="Sales Materials">
                            <option value="Inquiry">Flier</option>
                            <option value="Inquiry">Brochure</option>
                        </optgroup>
                        <optgroup label="Others">
                            <option value="Inquiry">Newsletter</option>
                            <option value="Inquiry">Direct Mail</option>
                            <option value="Inquiry">Project / Sit</option>
                            <option value="Inquiry">Showroom</option>
                            <option value="Inquiry">Mall Exhibit</option>
                        </optgroup>
                        <optgroup label="Specify Name on Message">
                            <option value="Inquiry">Moldex Personnel</option>
                            <option value="Inquiry">Moldex Homeowner</option>
                            <option value="Inquiry"Moldex Sales Agent</option>
                            <option value="Inquiry">Broker</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group col-xs-12 has-danger">
                    <textarea class="form-control" name="message" id="textArea" rows="10" placeholder="Message *" required><?php echo set_value('message'); ?></textarea>
                </div>
                <div class="g-recaptcha form-group col-xs-12" data-sitekey="6LdKiQ4UAAAAAKhrmsD2CQQSaNCZJKIQnORoWV9e"></div>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-5 address">
            <h3>Address</h3>
            <p>Moldex Building, Ligaya Street</p>
            <p>Corner West Avenue,</p>
            <p>Quezon City, Philippines</p>
            <p>Trunk Line:</p>
            <p>+63 2 373 8888</p>
            <br>
            <h3>Sales Office</h3> <strong>The Grand Towers Manila Office</strong>
            <p>2nd Floor, The Grand Towers Manila,</p>
            <p>790 P. Ocampo St., (formerly Vito Cruz,</p>
            <p>near corner Taft Avenue Manila,</p>
            <p>Philippines 1004)</p>
            <br> <strong>Sales</strong>
            <p>+63 917 717 8880</p>
            <p>+63 2 717 8880</p>
            <p>Trunk Line:</p>
            <p>+63 2 717 8888</p>
            <br> <strong>International Sales:</strong>
            <p>+63 2 708-7888 loc 401, 311</p>
            <p>Email: InternationalSales@moldex.com.ph</p>
        </div>
    </div>
</div>