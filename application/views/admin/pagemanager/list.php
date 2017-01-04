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
                <h4 class="panel-title"><?php echo $title;?></h4>
            </div>
            <div class="panel-body">
                <div  class="table-responsive">
                    <table class="table table-striped table-bordered" data-tbname="page">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Template</th>
                                <th>Date Created</th>
                                <th>Publish</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($results)){
                                    foreach ($results as $row): ?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->title; ?></td>
                                        <td><?php echo $row->template; ?></td>
                                        <td><?php echo $row->date; ?></td>
                                        <td><?php echo ($row->publish == 1 ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>pagemanager/delete/<?php echo $row->id; ?>" class="btn btn-icon btn-circle btn-danger delete-link" title="Delete"><i class="fa fa-times"></i></a>
                                            <a href="<?php echo base_url(); ?>pagemanager/edit/<?php echo $row->id; ?>" class="btn btn-icon btn-circle btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; 
                                }else{ ?>
                                    <tr>
                                        <td>No Page</td>
                                        <td>No Page</td>
                                        <td>No Page</td>
                                        <td>No Page</td>
                                        <td>No Page</td>
                                        <td>No Page</td>
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