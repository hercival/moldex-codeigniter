<legend>Component Options</legend>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3" for="title">Component Title</label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" id="title" name="com_option[title]" placeholder="Required" data-parsley-required="true" value="<?php echo set_value('com_option[title]'); ?>" />
        <span class="form-help p-5 text-success" id="help-title"></span>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Description</label>
    <div class="col-md-6">
        <textarea class="form-control ckeditor" placeholder="Description" rows="3" name="com_option[desc]">
        <?php echo set_value('com_option[desc]')?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3" for="title">Show Title</label>
    <div class="col-md-6 col-sm-6">
        <select class="form-control" name="com_option[title_show]">
            <option value="1">Yes</option>
            <option value="0" selected="selected">No</option>
        </select>
    </div>
</div>