<script src='https://www.google.com/recaptcha/api.js'></script>
 <div class="row intro-tab-marquetta">
  <h2>Moldex Marquetta </h2>
  <p>The neighborhood commercial center that is anchored in each and every Moldex development.</p>
</div>

<div class="container marquetta-tab">
  <div class="row">
       <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
       <?php echo $message;?>
    <form method="post" action="<?php echo base_url()?>leasing/marquetta" class="row">
    <div class="col-sm-12">
      <h3 >Fill up this form for your inquiry.</h3>    
    </div>

      <div class="form-group col-xs-12 col-sm-6">
        <input type="text" class="form-control" id="bname" name="bname" placeholder="Name Of Business *" required value="<?php echo set_value('bname'); ?>">
      </div>  
      <div class="form-group col-xs-12 col-sm-6">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email *" required value="<?php echo set_value('email'); ?>">
      </div>
      <div class="form-group col-xs-12 col-sm-6">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name *" required value="<?php echo set_value('name'); ?>">
      </div>       
      <div class="form-group col-xs-12 col-sm-6">
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number *" required value="<?php echo set_value('phone'); ?>">
      </div>      
      <div class="form-group col-xs-12">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo set_value('address'); ?>">
      </div>         
      <div class="form-group col-xs-12 has-danger">
        <textarea class="form-control" id="textArea" rows="10" name="message" placeholder="Description of Business & Message *" required><?php echo set_value('message'); ?></textarea>
      </div>
       <div class="g-recaptcha form-group col-xs-12" data-sitekey="6LdKiQ4UAAAAAKhrmsD2CQQSaNCZJKIQnORoWV9e"></div>
        <div class="col-xs-12">
            <input type="hidden" name="security" value="1">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>      
    </form>
  </div>
</div>