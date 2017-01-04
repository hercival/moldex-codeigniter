<fieldset id="gallery-<?php echo $input_id;?>">
   <legend>Gallery</legend>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3" for="title">Image Select</label>

        <div class="col-md-3 img-preview <?=$image_type?>">
            <?php if (isset($current_image) && $current_image['filename'] !== ''): ?>
                <div class="product-img">
                    <input type="hidden" name="<?=$image_type?>" value="<?=$current_image['filename']?>" id="<?php echo $input_id;?>">
                    <img src="<?=base_url().config_item('uploads_loc').$current_image['filename']?>" class="img-thumbnail help-img" width="200">
                    <a href="#" class="btn btn-xs btn-danger remove">
                    <span class="glyphicon glyphicon-remove-sign"></span></a>
                </div>
            <?php else: ?>
                <img src="<?=base_url()?>includes/img/img-placeholder.png" class="img-thumbnail help-img " width="200">
            <?php endif; ?>
        </div>
        <div class="col-md-3 col-sm-3">
            <button type="button" data-toggle="modal" data-target="#media-modal" data-image-type="<?=$image_type?>" class="btn btn-sm btn-danger media-modal-toggle">
                <i class="fa fa-plus"></i>
                    <span>Browse Image</span>
                    <div class="preview-image-f"></div>
            </button>
            <button class="btn btn-sm btn-info" id="add-to-list" type="button"><i class="fa fa-plus"></i> Add to Gallery List</button>
        </div>
    </div>
    
</fieldset>
<fieldset>
    <h4>Gallery List</h4>
    <table class="table table-bordered" id="table-tile-list-<?php echo $input_id;?>">
        <thead>
            <tr>
                <td>Image</td>
                <td>Image Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody id="tile-list-wrap-<?php echo $input_id;?>">
            <?php if(isset($gallery)){ ?>
                <?php if(count($gallery->item)){foreach($gallery->item as $image){ ?>
                    <tr class="removable-wrap">
                        <td><img class="media-object" src="<?php echo base_url();?>includes/uploads/<?php echo $image;?>"></td>
                        <td><?php echo $image;?><input type="hidden" name="<?php echo $gallery_name;?>[]" value="<?php echo $image;?>"></td>
                        <td><button class="btn btn-danger remove-to-list" type="button"><i class="fa fa-times"></i> Remove</button></td></tr>
                    </tr>
                <?php } } ?>
            <?php } ?>
        </tbody>
    </table>
</fieldset>
<script>
    $(document).ready(function(){
        $('<?php echo "#gallery-".$input_id." #add-to-list";?>').click(function(){
            var title = $("#caption-text").val();
            var link = $("#link-text").val();
            var inputname= <?php echo "'".$gallery_name."'";?>;
            var image_name = $('<?php echo "#gallery-".$input_id." #current-image";?>').val();
            var tmp =   '<tr class="removable-wrap">' +
                        '<td><img class="media-object" src="<?php echo base_url();?>includes/uploads/'+image_name+'"></td>' +
                        '<td>'+image_name+'<input type="hidden" name="'+inputname+'[]" value="'+image_name+'"></td>'+
                        '<td><button class="btn btn-danger remove-to-list" type="button"><i class="fa fa-times"></i> Remove</button></td></tr>';
            $('<?php echo "#tile-list-wrap-".$input_id;?>').append(tmp);
        });

        $('<?php echo "#table-tile-list-".$input_id;?>').delegate( ".remove-to-list", "click", function() {
            $(this).closest('.removable-wrap').remove();
        });
    });
</script>