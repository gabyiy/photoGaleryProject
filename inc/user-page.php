<?php 
include "functions.php";
include "inc/db.inc.php";
?>

<section class="user-profile">
<div class="section-header">
 <!-- cu ucfirst specificam ca prima litera o sa fie in upperCase -->
<h1>Welcome <?php echo ucfirst($session) ;?></h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 avatar"></div>
        <h2>Avatar</h2>
        <div class="col-md-8 profile">
            <h2>Profile Info</h2>
            <!-- folosim functia asta pentru a scoate datele userului -->
            <div class="profile-information" style="display:flex"> 
            <?php get_profile_info($con,$session) ;?>
            <p><a href="change-profile-info.php">Change profile information</a></p>

            </div>
        </div>
    </div>
</div>
</section>
<section class="upload-image">

</section>
<section class="user-galery">

</section>