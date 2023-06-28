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
    <div class="">
        <div class="col-md-4 avatar"></div>
        <h2>Avatar</h2>
        <?php  get_avatar_image( $session);?>
        <div class="upload-avatar">
            <input type="file" name="user-avatar-upload" id="user-avatar-upload"/>
        </div>
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
<div class="section-header center">
    <h2>
        Upload new image
    </h2>
</div>
<form method="post" enctype="multipart/form-data" name="upload-image" >
    <input type="file" name="new-image" id="new-image"/>
</form>
</section>
<section class="user-galery">
    <div class="section-headet">
<h2>You r uploaded images</h2>
    </div>
    <div class="">
        <div>
            <div class="user_uploaded_pic center">
<?php  get_user_uploaded_pics($con,$session)?>
</div>
</div>
</div>
</section>