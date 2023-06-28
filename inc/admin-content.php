<section class="review">
<div class="section-header center">
<h1>Wellcome <?php  echo ucfirst($adminSesison); ?></h1>
</div>
<div class="container">
<div class="row">
    <div id ="unapproved-pics">
<?php get_unapproved_pics($con) ?> 
    </div> 

</div>
</div>
</section>