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
                <div class="clearfix"></div>
                
                <form action="<?php echo site_url('careersmanager/edit/'.$results->id);?>" method="POST" class="form-horizontal" id="add-block-form">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Job Title</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="title"  placeholder="Enter text" id="title" value="<?php echo $results->title; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="alias">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="alias"  placeholder="Enter Alias" id="alias" value="<?php echo $results->alias; ?>"  />
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Job Description</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control ckeditor" placeholder="Enter Job Description" rows="5" name="desc"><?php echo $results->desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Date Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control date-picker" name="date_publish"  placeholder="Select Date" value="<?php echo $results->date_publish; ?>"  />
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="published">
                                     <option value="0" <?php echo ($results->published == 0 ? 'selected="selected"' : '');?>>No</option>
                                    <option value="1" <?php echo ($results->published == 1 ? 'selected="selected"' : '');?>>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Job Category</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="category">
                                    <option value="corporate" <?php echo ($results->category == 'corporate' ? 'selected="selected"' : '');?>>Corporate</option>
                                    <option value="in-house-sales" <?php echo ($results->category == 'in-house-sales' ? 'selected="selected"' : '');?>>In-House Sales</option>
                                    <option value="brokers" <?php echo ($results->category == 'brokers' ? 'selected="selected"' : '');?>>Brokers</option>
                                </select>
                            </div>
                        </div>
                        
                        <fieldset>
                        <div class="col-md-3 col-sm-3 col-md-offset-6">
                           <input type="hidden" name="id" value="<?php echo $results->id;?>">
                            <button type="submit" class="btn btn-primary pull-right">Upldate Job</button>
                        </div>
                    </fieldset>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>