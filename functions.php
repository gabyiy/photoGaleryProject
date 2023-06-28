<?php 
include "inc/db.inc.php";


function get_profile_info($con,$username){

    $fName ="";
$lName="";
$email="";
$bio="";

    $query ="select * from users where username='$username'";
    $runQuery= mysqli_query($con, $query);

    if(mysqli_num_rows($runQuery)>0){
        echo "<div class='col-md-2'>
          First  Name: <br>
            Last Name : <br>
            Email: <br>
        </div>";
    }
    while ($row= mysqli_fetch_assoc($runQuery)){

        echo "<div class='col-md-4'>";
       echo $fName=$row['fName']."<br>";
       echo  $lName=$row['lName']."<br>";
      echo  $email=$row['email']."<br>";

        if($row['bio']==""){
            echo "You dont have a bio";
        }
        else {
            $bio=$row['bio'];
        }
        echo "</div>";
    }

}


function get_avatar_image( $user){

    $pic=0;

    //aici cream folderu mai si dupa folderu userului
$upload_folder = "uploads";

$user_folder = $upload_folder."/".$user;

$avatar_image_folder = $user_folder."/"."avatar";

//asa verificam daca sunt create folderurile, daca nu sa le cream
if(is_dir($upload_folder)){

    if (is_dir($user_folder)){

       
    }else{
        mkdir($user_folder);

    }
}else{
    mkdir($upload_folder);
    
}
if(is_dir($avatar_image_folder)){

}else{
    mkdir($avatar_image_folder);
}

//si aici verificam daca avem vrun fisier in avatar in image folder, il deschidem si apoi il citim

if($handle = opendir($avatar_image_folder)){

    while(false!==($entry=readdir($handle))){
        if(($entry !=".")and ($entry!="..")){
            $pic=1;
            $avatar_image_path= $avatar_image_folder."/".$entry;
            echo "<img src=$avatar_image_path alt=$entry id=avatar-image-id width='300px'/>";
        }
    }
    closedir($handle);
}
//si asa specificam ca in caz ca useru nu are nici o imagine sa folosesca default image
if($pic==0){
    echo "<img src='img/user-default.jpg' id=avatar-image-id height='200px' width='300px'/>";
}
}


function get_user_uploaded_pics($con,$username){
    //cu order by specificam ca dorim sa vedem imaginile in functie de cum au fost uploadate
    $query ="select * from pics where username = '$username' order by pid desc";
    $query_run = mysqli_query($con, $query); 
    if(mysqli_num_rows($query_run)>0){

        while($row = mysqli_fetch_assoc($query_run)){
            $pId= $row["pid"];
            $img= $row["picname"];
            $path = "uploads/".$username."/".$img;

            ?>
            <div class=" col-md-4"><img src="<?php echo $path ; ?>"/></div>
<?php

        }
    }
}

function get_unapproved_pics($con){
    $approved = 0;
    $query = "select * from pics where approved='$approved'";

$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run)>0){
while($row=mysqli_fetch_assoc($query_run)){
	$pid = $row['pid'];
				$picname = $row['picname'];
				$uname = $row['username'];
				$src = 'uploads/'.$uname.'/'.$picname;
				?>
				<div id="row-<?php echo $pid;?>">
					<div class="col-md-4">
						<img src="<?php echo $src;?>" id="<?php echo $pid;?>"/>
					</div>
					<div class="col-md-4">
						<?php echo $picname; ?>
					</div>
</div>
<div class="col-md-4">
						<button id="yes-<?php echo $pid;?>" onclick=lol()>Yes</button>
						<button id="no-<?php echo $pid;?>" onclick=deleteimage(<?php echo $pid;?>)>No</button>
					</div>
</div>
<div class="clearfix"></div>
<?php
}
}

}

?>