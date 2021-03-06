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
                        <?php echo validation_errors()?>
                    </div>
                <?php endif; ?>
                <?php //$this->load->view('admin/media_modal'); ?>
                <div class="clearfix"></div>
                
                <form action="<?php echo site_url('careersmanager/add')?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                        <?php //$this->load->view('admin/media_btn', array('image_type' => 'image', 'current_image' => array('filename' =>set_value('image')))); ?>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Job Title</label>
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
                            <label class="control-label col-md-3 col-sm-3">Job Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" placeholder="Enter Job Description" rows="5" name="desc"><?php echo set_value('desc'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Date Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control date-picker" name="date_publish"  placeholder="Select Date" value="<?php echo set_value('date_publish'); ?>"  />
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="published">
                                     <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Job Category</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="category">
                                    <option value="corporate">Corporate</option>
                                    <option value="in-house-sales">In-House Sales</option>
                                    <option value="brokers">Brokers</option>
                                </select>
                            </div>
                        </div>
                        
                        <fieldset>
                        <div class="col-md-3 col-sm-3 col-md-offset-6">
                            <button type="submit" class="btn btn-primary pull-right">Save Job</button>
                        </div>
                    </fieldset>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>