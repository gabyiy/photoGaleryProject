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
?>