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
                
                <form action="<?php echo site_url('locationsmanager/add')?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Address</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="location_add"  placeholder="Enter text" id="location_add" value="<?php echo set_value('location_add'); ?>"  />
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
                                <button type="submit" class="btn btn-primary pull-right">Save Location Address</button>
                            </div>
                        </fieldset>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>