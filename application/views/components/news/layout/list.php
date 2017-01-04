<div class="container-fluid">
  <div class="row news-tab">
    <div class="absolute-center">  
      <h1>NEWS, ANNOUNCEMENTS, & EVENTS</h1>
    </div>    
  </div>
</div>

<div class="container news-articles">
    <div class="row text-center tile-marginBottom" >
       <?php foreach($news_details as $news){?>
        <div class="col-sm-12 col-md-4 project-tile margin-top10px-mobile">
          <div id="project-tile1b" style="background-image:url(<?php echo base_url();?>includes/uploads/<?php echo $news->image;?>);"></div>    
          <!-- Tag will show if this one is a construction update -->
          <div id="<?php echo $news->category;?>-tag"></div>
          <!-- Tag will show if this one is a construction update -->          
          <div class="project-tile-details">
            <h3><a href="<?php echo base_url();?>news/<?php echo $news->alias;?>"><?php echo $news->title;?></a></h3>
            <h6><?php echo date('F d, Y',strtotime($news->date_published));?></h6>
            <br>
            <?php $html = strip_tags($news->content);
                        $html_explode = explode(' ',$html);
                        $new_html = '';
                        $counter = 0;
                        foreach($html_explode as $str){
                            if($counter <= 15){
                                $new_html .= $str.' ';
                            }
                            $counter ++;
                        }
				    ?>
            <p><?php echo $new_html;?>...</p>
            <a href="<?php echo base_url();?>news/<?php echo $news->alias;?>" class="btn btn-primary btn-md">Read Now</a>
          </div>        
        </div>  
        <?php } ?>               
    </div>
</div>