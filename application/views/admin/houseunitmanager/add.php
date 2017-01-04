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
                
                <form action="<?php echo site_url('houseunitmanager/add')?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Model/Unit Name</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="name"  placeholder="Enter text" id="name" value="<?php echo set_value('name'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="alias"  placeholder="Enter Alias" id="alias" value="<?php echo set_value('alias'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="price">Price</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="price"  placeholder="Enter Price" id="price" value="<?php echo set_value('price'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="floor_area">Floor Area</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="floor_area"  placeholder="Enter Floor Area" id="floor_area" value="<?php echo set_value('floor_area'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="lot_area">Lot Area</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="lot_area"  placeholder="Enter Lot Area" id="lot_area" value="<?php echo set_value('lot_area'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="lot_area">Model Type</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="model_type"  placeholder="Enter Model Type" id="model_type" value="<?php echo set_value('model_type'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="lot_area">Youtube/Video Link</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="video_link"  placeholder="Video Url" id="video_link" value="<?php echo set_value('video_link'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="desc"><?php echo set_value('desc')?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Interior Details</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" rows="5" name="interior_details"><?php echo set_value('interior_details')?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Floor Plan Image</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'floor_plan', 'current_image' => array('filename' => set_value('floor_plan')))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Featured Tile Image</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'tile', 'current_image' => array('filename' => set_value('tile')))); ?>
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
                            <label class="control-label col-md-3 col-sm-3" for="level">Unter Project</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="project_id">
                                     <?php echo select_project(); ?>
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
                            <label class="control-label col-md-3 col-sm-3" for="featured_leasing">Leasing</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="featured_leasing">
                                     <option value="0" >No</option>
                                    <option value="1" >Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-12 col-sm-12" for="level">Interior Gallery Slider</label></div>
                       <?php $this->load->view('admin/media_btn_gallery', array('gallery_name' => 'interior_gallery','image_type' => 'interior_gallery','input_id' => 'interior', 'current_image' => array('filename' => 'img-placeholder.png'))); ?> <br><br>
                        <div class="form-group"><label class="control-label col-md-12 col-sm-12" for="level">Banners Slider</label></div>
                        
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