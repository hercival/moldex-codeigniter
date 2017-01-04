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
                            <th>Title</th>
                            <th>Alias</th>
                            <th>Publish</th>
                            <th>Category</th>
                            <th>Date Publish</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($results)): $i = $this->uri->segment(3); foreach ($results as $row): $i++; ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->title; ?></td>
                            <td><?php echo $row->alias; ?></td>
                            <td><?php echo ($row->published == 1 ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'); ?></td>
                            <td><?php echo $row->category; ?></td>
                            <td><?php echo $row->date_publish; ?></td>
                            <td><?php echo $row->date_created; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>careersmanager/delete/<?php echo $row->id?>" class="btn btn-icon btn-circle btn-danger delete-link" title="Delete"><i class="fa fa-times"></i></a>
                                <a href="<?php echo base_url(); ?>careersmanager/edit/<?php echo $row->id?>" class="btn btn-icon btn-circle btn-success" title="Edit News" rel="<?php echo $row->id?>"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; endif; ?>
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