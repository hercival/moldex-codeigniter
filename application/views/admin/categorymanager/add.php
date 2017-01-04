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
                
                <form action="<?php echo site_url('categorymanager/add')?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Single Banner</label>
                            <div class="col-md-6 col-sm-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'proj_banner', 'current_image' => array('filename' => set_value('proj_banner')))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Category Name</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="title"  placeholder="Enter text" id="title" value="<?php echo set_value('title'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="alias"  placeholder="Enter Alias" id="alias" value="<?php echo set_value('alias'); ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Order</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="orderby"  placeholder="Enter order" id="orderby" value="<?php echo set_value('orderby'); ?>"  />
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
                        <fieldset>
                            <div class="col-md-3 col-sm-3 col-md-offset-6">
                                <button type="submit" class="btn btn-primary pull-right">Save Location Category</button>
                            </div>
                        </fieldset>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>