<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <h4 class="panel-title">Add Menu</h4>
            </div>
            <?php $this->load->view('admin/media_modal'); ?>
            <div class="panel-body">
               <?php if($this->session->flashdata('saved')): ?>
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert"></button>
                        <span><?=$this->session->flashdata('saved')?></span>
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('administrator/add_menu')?>" method="post">
                    <fieldset>
                        <?php if(validation_errors()): ?>
                            <div class="alert alert-danger">
                                <span class="close">x</span>
                                <?php echo validation_errors();?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Title</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="title" name="title" placeholder="Required" value="<?php echo set_value('title'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Type</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="menutype" id="menu-type">
                                    <option value="">Select Menu Type</option>
                                    <option value="page">Page</option>
                                    <option value="link">Url Link</option>
                                    <option value="heading">Menu Heading</option>
                                    <option value="hidden">Hidden Menu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group type-selection" id="page-selection" style="display:none;">
                            <label class="control-label col-md-3 col-sm-3" for="level">Select Page</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="page_id">
                                    <?php foreach($pages_result as $page){ ?>
                                        <option value="<?php echo $page->id; ?>"><?php echo $page->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group type-selection" id="link-selection" style="display:none;">
                            <label class="control-label col-md-3 col-sm-3" for="title">Url Link</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="url_link" name="url_link" placeholder="Required" value="<?php echo set_value('url_link'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="alias" name="alias" placeholder="Required"  value="<?php echo set_value('alias'); ?>" />
                            </div>
                        </div>
                        <!--div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Menu Level</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="level">
                                    <option value="0" selected="selected">No Parent</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                </select>
                            </div>
                        </div-->
                        <div class="form-group type-selection">
                            <label class="control-label col-md-3 col-sm-3" for="level">Group Menu</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="group_id">
                                    <?php foreach($group_menus as $group){ ?>
                                        <option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Parent Menu</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="parent">
                                    <option value="0" selected="selected">No Parent</option>
                                    <?php foreach($parent_menu as $menu){ ?>
                                       <?php $level_sign = ""; 
                                            for($x = 0; $x < $menu['level'] ;$x++){ 
                                                $level_sign = $level_sign.'| - ';
                                            } ?>
                                            <option value="<?php echo $menu['id']; ?>"><?php echo $level_sign.$menu['title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Ordering</label>
                            <div class="col-md-6 col-sm-6">
                                <p>Ordering will be available after saving</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="publish">
                                    <option value="0" selected="selected">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
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
        $('#menu-type').change(function(){
            var menutype = $(this).val();
            $('.type-selection').fadeOut();
            if(menutype == 'page' || menutype == 'hidden'){
                $('#page-selection').fadeIn();
            }else if(menutype == 'link'){
                $('#link-selection').fadeIn();
            }
        });
    });
</script>