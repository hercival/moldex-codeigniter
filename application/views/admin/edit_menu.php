<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Menu</h4>
            </div>
            <?php $this->load->view('admin/media_modal'); ?>
            <div class="panel-body">
               <?php if($this->session->flashdata('saved')): ?>
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert"></button>
                        <span><?php echo $this->session->flashdata('saved')?></span>
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('administrator/edit_menu/'.$results->id)?>" method="post">
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
                                <input class="form-control" type="text" id="title" name="title" placeholder="Required" value="<?php echo $results->title ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Type</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="menutype" id="menu-type">
                                    <option value="">Select Menu Type</option>
                                    <option value="page" <?php echo ($results->type == 'page' ? 'selected="selected"' : '');?>>Page</option>
                                    <option value="link" <?php echo ($results->type == 'link' ? 'selected="selected"' : '');?>>Url Link</option>
                                    <option value="heading" <?php echo ($results->type == 'heading' ? 'selected="selected"' : '');?>>Menu Heading</option>
                                     <option value="hidden"  <?php echo ($results->type == 'hidden' ? 'selected="selected"' : '');?>>Hidden Menu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group type-selection" id="page-selection" <?php echo ($results->type == 'page' ? '':'style="display:none;"')?>>
                            <label class="control-label col-md-3 col-sm-3" for="level">Select Page</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="page_id">
                                    <?php foreach($pages_result as $page){ ?>
                                        <option value="<?php echo $page->id; ?>" <?php echo ($results->page_id == $page->id ? 'selected="selected"' : '');?>><?php echo $page->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group type-selection" id="link-selection" <?php echo ($results->type == 'link' ? '':'style="display:none;"')?>>
                            <label class="control-label col-md-3 col-sm-3" for="title">Url Link</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="url_link" name="url_link" placeholder="Required" value="<?php echo $results->url_link ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="title">Alias</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="alias" name="alias" placeholder="Required"  value="<?php echo $results->alias ?>" />
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
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Group Menu</label>
                            <div class="col-md-6 col-sm-6">
                               <?php foreach($group_menus as $group){ ?>
                                   <?php if($group->id == $results->group_id ){ ?>
                                        <h4><?php echo $group->name; ?></h4>
                                   <?php } ?>
                               <?php } ?>
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
                                            <?php if($menu['id'] != $results->id){ ?>
                                                <option value="<?php echo $menu['id']; ?>" <?php echo ($results->parent == $menu['id'] ? 'selected="selected"' : '');?>>
                                                    <?php echo $level_sign.$menu['title']; ?>
                                                </option>
                                            <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Ordering</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="menu_order">
                                    <option value="0">- first -</option>
                                    <?php $last_order = count($ordering); 
                                        foreach($ordering as $order){ ?>
                                        <option value="<?php echo $order->menu_order; ?>" <?php echo ($order->menu_order == $results->menu_order ? 'selected="selected"' : '');?>><?php echo $order->menu_order.' - '.$order->title;?></option>
                                    <?php } ?>
                                    <option value="<?php echo $last_order;?>">- last -</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="level">Publish</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="publish">
                                    <option value="0" <?php echo ($results->publish == 0 ? 'selected="selected"' : '');?>>No</option>
                                    <option value="1" <?php echo ($results->publish == 1 ? 'selected="selected"' : '');?>>Yes</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-3 col-sm-3 col-md-offset-6">
                            <input type="hidden" name="id" value="<?php echo $results->id;?>">
                            <input type="hidden" name="group_id" value="<?php echo $results->group_id;?>">
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