<div class="clearfix"></div>
<div class="row">
    <div class="col-md-6">
        <button type="button" data-toggle="modal" data-target="#media-modal" data-image-type="<?=$image_type?>" class="btn btn-sm btn-danger media-modal-toggle pull-right">
            <i class="fa fa-plus"></i>
                <span>Browse Image</span>
                <div class="preview-image-f"></div>

        </button>
    </div>
    <div class="col-md-6 img-preview <?=$image_type?> pull-left">
       <?php if(!isset($input_class)){$input_class = ''; }?>
        <?php if (isset($current_image) && $current_image['filename'] !== ''): ?>
            <div class="product-img">
                <input type="hidden" name="<?=$image_type?>" value="<?=$current_image['filename']?>" id="current-image" class="<?php echo $input_class;?>">
                <img src="<?=base_url().config_item('uploads_loc').$current_image['filename']?>" class="img-thumbnail help-img" width="200">
                <a href="#" class="btn btn-xs btn-danger remove">
                <span class="glyphicon glyphicon-remove-sign"></span></a>
            </div>
        <?php else: ?>
            <img src="<?=base_url()?>includes/img/img-placeholder.png" class="img-thumbnail help-img" width="200">
        <?php endif; ?>
    </div>
</div><!-- end .form-group -->
<div class="clearfix"></div>