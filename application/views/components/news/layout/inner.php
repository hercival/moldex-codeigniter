<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url();?>news">News, Announcements & Events</a></li>
  <li class="breadcrumb-item active"><?php echo $news_details->title;?></li>
</ol>

<div class="container-fluid bg-white">
  <div class="container news-articles">
    <div class="title-author">
      <h2><?php echo $news_details->title;?></h2>
      <p>By Author | <?php echo date('F d, Y',strtotime($news_details->date_published));?></p>
    </div>
    <div class="article-img-txt">
      <img src="<?php echo base_url();?>includes/uploads/<?php echo $news_details->image;?>" class="img-responsive">
      <?php echo $news_details->content;?>
    </div>
    <div class="row social-btns">
      <div class="col-md-2">
        <a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.example.com&p[images][0]=&p[title]=Title%20Goes%20Here&p[summary]=Description%20goes%20here!" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><button style="width:100%; margin-top:10px;" type="button" class="btn btn-facebook btn-md"><i class="fa fa-facebook fa-2"></i> Share on Facebook</button></a>
        </div>
      <div class="col-md-2">
        <a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.example.com&p[images][0]=&p[title]=Title%20Goes%20Here&p[summary]=Description%20goes%20here!" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><button style="width:100%; margin-top:10px;" type="button" class="btn btn-twitter btn-md"><i class="fa fa-twitter fa-2"></i> Share on Twitter</button></a>
        </div>        
    </div>
  </div>  
</div>