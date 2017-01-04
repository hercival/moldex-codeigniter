<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-3">
        <div class="panel-heading">
                <h4 class="panel-title"><?php echo $title;?></h4>
            </div>
            <div class="panel-body">
                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                        <span class="close">x</span>
                        <?=validation_errors()?>
                    </div>
                <?php endif; ?>
                <?php $this->load->view('admin/media_modal'); ?>
                <div class="clearfix"></div>
                
                <form action="<?php echo site_url('projectmanager/add')?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Site Development plan</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'site_dev_plan', 'current_image' => array('filename' => set_value('site_dev_plan')))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Floor Development plan</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'floor_dev_plan', 'current_image' => array('filename' => set_value('floor_dev_plan')))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Project Logo</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'logo', 'current_image' => array('filename' => set_value('logo')))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Featured Tile Image</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'tile', 'current_image' => array('filename' => set_value('tile')))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Project name</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="project_name"  placeholder="Enter text" id="project_name" value="<?php echo set_value('project_name'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="alias"  placeholder="Enter Alias" id="alias" value="<?php echo set_value('alias'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Development Size</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="size"  placeholder="Development Size" id="size" value="<?php echo set_value('size'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">LS Number</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="number"  placeholder="LS Number" id="number" value="<?php echo set_value('number'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Map Location (Long, Lat)</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="long_lat"  placeholder="14.8419199, 121.0367397" id="long_lat" value="<?php echo set_value('long_lat'); ?>"  />
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="desc"><?php echo set_value('desc')?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Featured and Amenities Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="amen_fea_desc"><?php echo set_value('amen_fea_desc')?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Location Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="location_desc"><?php echo set_value('location_desc')?></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Category Location</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="location_id">
                                     <?php echo select_location_category() ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Address Location</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="location">
                                      <?php echo select_location_address() ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Project Type</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="project_type">
                                     <?php echo select_project_type() ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Status</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="status">
                                     <option value="featured" >featured</option>
                                    <option value="new" >New</option>
                                    <option value="complete" >complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="enable">
                                    <option value="0" selected="selected">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Leasing</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="leasing">
                                     <option value="0" >No</option>
                                    <option value="1" >Yes</option>
                                </select>
                            </div>
                        </div>
                       <?php $this->load->view('admin/media_btn_gallery', array('gallery_name' => 'banners','image_type' => 'banners','input_id' => 'gallery_banners_dummy', 'current_image' => array('filename' => 'img-placeholder.png'))); ?>
                        <fieldset>
                            <div class="col-md-3 col-sm-3 col-md-offset-6">
                                <button type="submit" class="btn btn-primary pull-right">Save Project</button>
                            </div>
                        </fieldset>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>