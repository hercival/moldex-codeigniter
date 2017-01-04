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
                
                <form action="<?php echo site_url('projectmanager/edit/'.$results->id)?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Site Development plan</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'site_dev_plan', 'current_image' => array('filename' => $results->site_dev_plan))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Floor Development plan</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'floor_dev_plan', 'current_image' => array('filename' => $results->floor_dev_plan))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Project Logo</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'logo', 'current_image' => array('filename' => $results->logo))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Featured Tile Image</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'tile', 'current_image' => array('filename' => $results->tile))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Project name</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="project_name"  placeholder="Enter text" id="project_name" value="<?php echo $results->project_name; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="alias"  placeholder="Enter Alias" id="alias" value="<?php echo $results->alias; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Development Size</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="size"  placeholder="Development Size" id="size" value="<?php echo $results->size; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">LS Number</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="number"  placeholder="LS Number" id="number" value="<?php echo $results->number; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Map Location (Long, Lat)</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="long_lat"  placeholder="14.8419199, 121.0367397" id="long_lat" value="<?php echo $results->long_lat; ?>"  />
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="desc"><?php echo $results->desc;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Featured and Amenities Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="amen_fea_desc"><?php echo $results->amen_fea_desc;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Location Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="location_desc"><?php echo $results->location_desc;?></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Category Location</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="location_id">
                                     <?php echo select_location_category($results->location_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Address Location</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="location">
                                      <?php echo select_location_address($results->location) ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Project Type</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="project_type">
                                     <?php echo select_project_type($results->project_type); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Status</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="status">
                                     <option value="featured" <?php echo ($results->status == 'featured' ? 'selected="selected"' : '');?>>featured</option>
                                    <option value="new" <?php echo ($results->status == 'new' ? 'selected="selected"' : '');?>>New</option>
                                    <option value="complete" <?php echo ($results->status == 'complete' ? 'selected="selected"' : '');?>>complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="enable">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="enable">
                                    <option value="0" <?php echo ($results->enable == 0 ? 'selected="selected"' : '');?>>No</option>
                                    <option value="1" <?php echo ($results->enable == 1 ? 'selected="selected"' : '');?>>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Leasing</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="leasing">
                                     <option value="0" <?php echo ($results->leasing == 0 ? 'selected="selected"' : '');?>>No</option>
                                    <option value="1" <?php echo ($results->leasing == 1 ? 'selected="selected"' : '');?>>Yes</option>
                                </select>
                            </div>
                        </div>

                      <?php $banners = json_decode($results->banners); ?>
                       <?php $this->load->view('admin/media_btn_gallery', array('gallery'=> $banners, 'gallery_name' => 'banners','image_type' => 'banners','input_id' => 'gallery_banners_dummy', 'current_image' => array('filename' => 'img-placeholder.png'))); ?>

                        <fieldset>
                            <div class="col-md-3 col-sm-3 col-md-offset-6">
                               <input type="hidden" name="id" value="<?php echo $results->id;?>">
                                <button type="submit" class="btn btn-primary pull-right">Update Project</button>
                            </div>
                        </fieldset>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>