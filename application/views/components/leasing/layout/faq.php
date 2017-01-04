<div class="row faq-tab">
    <div class="col-md-12">
        <h2>FREQUENTLY ASKED QUESTIONS</h2>
        <input type="search" class="form-control" id="search" placeholder="Type keyword(s) here" required>
        <p>Still have questions? Send us your inquiries <a href="<?php echo base_url();?>leasing/marquetta">here.</a></p>
    </div>
</div>
<div class="container-fluid bg-white">
    <div class="container faq-accordion">
        <div class="row">
            <h3>Getting Started</h3>
            <br>
            <p><a data-toggle="collapse" href="#faq1" aria-expanded="false" aria-controls="collapseExample" href="#" class="faq-title">What are the requirements to reserve a property for an individual?</a></p>
            <div class="collapse in" id="faq1">
                <div class="card card-block"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. </div>
            </div>
            <p><a data-toggle="collapse" href="#faq2" aria-expanded="false" aria-controls="collapseExample" href="#" class="faq-title">What are the requirements to reserve for a corporate account?</a></p>
            <div class="collapse" id="faq2">
                <div class="card card-block"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. </div>
            </div>
            <p><a data-toggle="collapse" href="#faq3" aria-expanded="false" aria-controls="collapseExample" href="#" class="faq-title">Are foreigners allowed to purchase a property? What are the requirements?</a></p>
            <div class="collapse" id="faq3">
                <div class="card card-block"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. </div>
            </div>
            <br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#search").keyup(function(){
            var keywords = $(this).val();
            $('a.faq-title').css('color','#364d9b');
            $("a.faq-title:contains('"+keywords+"')", document.body).each(function(){
                $(this).css('color', '#f46839');
            });
        });
    });
</script>