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
            </div>
            <h4 class="panel-title"><?php echo $title;?></h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                        <span class="close">x</span>
                        <?php echo validation_errors();?>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-bordered" data-tbname="news">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Model Name</th>
                            <th>Alias</th>
                            <th>Price</th>
                            <th>Model Type</th>
                            <th>Project</th>
                            <th>Enable</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($results)){ foreach ($results as $row){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->alias; ?></td>
                            <td><?php echo $row->price; ?></td>
                            <td><?php echo $row->model_type; ?></td>
                            <td><?php echo get_projectname_by_project_id($row->project_id); ?></td>
                            <td><?php echo ($row->enable == 1 ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'); ?></td>
                            <td><?php echo '<span class="label label-warning">'.$row->status.'</span>'; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>houseunitmanager/delete/<?php echo $row->id?>" class="btn btn-icon btn-circle btn-danger" title="Delete"><i class="fa fa-times"></i></a>
                                    <a href="<?php echo base_url(); ?>houseunitmanager/edit/<?php echo $row->id?>" class="btn btn-icon btn-circle btn-success" title="Edit News" rel="<?php echo $row->id?>"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>

                <div class="dataTables_info" id="data-table_info" role="status" aria-live="polite">Total of <?php echo count($results);?> entries</div>
                <?php if (isset($pagination)): ?>
                    <div class="dataTables_paginate paging_simple_numbers"><?=$pagination?></div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!-- end panel -->

    </div>
    <!-- end col-12 -->
</div>
<!-- end row