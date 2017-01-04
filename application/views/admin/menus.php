<!--begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-4">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Menu List</h4>
            </div>
            <div class="panel-body">
                <?php if(validation_errors()): ?>
                        <div class="alert alert-danger">
                        <span class="close">x</span>
                        <?php echo validation_errors();?>
                    </div>
                <?php endif; ?>
                <div  class="table-responsive">
                    <table class="table table-striped table-bordered" data-tbname="page">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Alias</th>
                                <th>Type</th>
                                <th>Order</th>
                                <th>Group</th>
                                <th>Publish</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($results)){ ?>
                                    <?php foreach ($results as $row): ?>
                                       <?php $level_sign = ""; 
                                            for($x = 0; $x < $row['level'] ;$x++){ 
                                                $level_sign = $level_sign.'| - ';
                                            } ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $level_sign.$row['title']; ?></td>
                                            <td><?php echo $row['alias']; ?></td>
                                            <td><?php echo $row['type']; ?></td>
                                            <td><?php echo $row['parent'].' - '.$row['menu_order']; ?></td>
                                            <td><?php echo $row['group_id']; ?></td>
                                             <td><?php echo ($row['publish'] == 1 ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'); ?></td>
                                            <td><?php echo $row['date_created']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>administrator/delete_menu/<?php echo $row['id']; ?>" class="btn  btn-icon btn-circle btn-danger delete-link" title="Delete"><i class="fa fa-times"></i></a>
                                                <a href="<?php echo base_url(); ?>administrator/edit_menu/<?php echo $row['id']; ?>" class="btn btn-icon btn-circle btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; //foreach result ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                        <td>No Menu</td>
                                    </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

                <?php if (isset($pagination)): ?>
                    <div class="dataTables_paginate paging_simple_numbers"><?php echo $pagination; ?></div>
                <?php endif ?>
            </div>
        </div><!-- end panel -->
    </div><!-- end col-12 -->
</div><!-- end row-->