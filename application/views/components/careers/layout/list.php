<div class="container-fluid">
    <div class="row careers-tab">
        <div class="absolute-center">
            <h1>CAREERS AT MOLDEX</h1>
        </div>
    </div>
</div>
<div class="container">
    <nav class="project-nav">
        <ul>
            <li><a href="<?php echo base_url();?>careers/all">All</a></li>
            <li><a href="<?php echo base_url();?>careers/corporate">Corporate</a></li>
            <li><a href="<?php echo base_url();?>careers/in-house-sales">In-House Sales</a></li>
            <li><a href="<?php echo base_url();?>careers/brokers">Brokers</a></li>
        </ul>
    </nav>
    <?php if($careers_details){ foreach($careers_details as $careers){ ?>
        <div class="job-list">
            <h2><?php echo $careers->title; ?></h2>
            <?php echo $careers->desc; ?>
            <br>
            <button type="button" class="btn btn-primary btn-md">Apply Now</button>
        </div>
    <?php } }?>
</div>