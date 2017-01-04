<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo $title; ?></h4>
            </div>
            <?php $this->load->view('admin/media_modal'); ?>
            <div class="panel-body">
               <?php if($this->session->flashdata('saved')): ?>
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert"></button>
                        <span><?=$this->session->flashdata('saved')?></span>
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" name="demo-form" action="<?php echo site_url('pagemanager/add')?>" method="post">
                    <fieldset>
                        <legend>Page Info</legend>
                        <?php if(validation_errors()): ?>
                            <div class="alert alert-danger">
                                <span class="close">x</span>
                                <?php echo validation_errors();?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Title</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="title" name="title" placeholder="Required" data-parsley-required="true" value="<?php echo set_value('title'); ?>" />
                                <span class="form-help p-5 text-success" id="help-title"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Template</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="template" data-parsley-required="true" >
                                    <option value="default" selected="selected">Deafult (Home)</option>
                                    <option value="inner">Inner</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Page Type</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="page_type" id="component_list"></select>
                            </div>
                        </div>
                        
                        <div class="form-group" id="com_layout_container" style="display:none;">
                            <label class="control-label col-md-3 col-sm-3" for="title">Component Layout</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="com_layout" id="com_layout"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="publish">
                                    <option value="1">Yes</option>
                                    <option value="0" selected="selected">No</option>
                                </select>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Page SEO</legend>

                        <div class="form-group">
                            <label class="control-label col-md-3">Meta Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control col-md-6" id="meta-title" placeholder="Enter Meta Title" name="meta_title" value="<?=set_value('meta_title')?>" data-parsley-required="false" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Meta Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control ckeditor" placeholder="Enter meta description" rows="3" name="meta_description" >
                                <?php echo set_value('meta_description')?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Meta Keywords</label>
                            <div class="col-md-6">
                                <textarea class="form-control ckeditor" placeholder="Enter meta keywords separated by comma" rows="3" name="meta_keywords">
                                <?php echo set_value('meta_keywords')?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Meta Image</label>
                            <div class="col-md-6">
                                <?php $this->load->view('admin/media_btn', array('image_type' => 'image')); ?>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset id="com-option-wrap">
                        
                    </fieldset>

                    <fieldset>
                        <div class="col-md-3 col-sm-3 col-md-offset-6">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>


<script>
    $(document).ready(function(){
        var base_url = <?php echo "'".base_url()."'"; ?>;
        var list_com = $.ajax({ url: base_url+"ajaxreturn/component_list", method: "GET",dataType: "html"});
        list_com.done(function(list){
            $('#component_list').empty();
            $('#component_list').prepend(list);
        });
        
        $('#component_list').change(function(){
            var com_name = $(this).val();
            var layout_com = $.ajax({ url: base_url+"ajaxreturn/component_layout/"+com_name, method: "GET", dataType: "html" });
           
            layout_com.done(function(list){
                $('#com_layout_container').fadeIn();
                $('#com_layout').empty();
                $('#com_layout').prepend(list);
                
            });
        });
        
        $('#com_layout').change(function(){
            var com_name = $('#component_list').val();
            var com_layout = $(this).val();
            var option = $.ajax({ url: base_url+"ajaxreturn/component_option/"+com_name+"/"+com_layout, method: "GET", dataType: "html" });
            option.done(function(option_view){
                $('#com-option-wrap').empty();
                $('#com-option-wrap').prepend(option_view);
            });
        });
        
    });
</script>