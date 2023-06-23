<?php 
session_start();

$pic=0;
$fileToDelete="";
//asa obtineme filename pe care il aflam cu functia avatarloadhandler 
$fileName= $_FILES['avatar']['name'];
//echo $fileName;

$tempName= $_FILES["avatar"]["temp_name"];

$session = $_SESSION["user"]; 

$avatar_image_folder= "uploads/".$session."/avatar";
//aci specificam o destinatie dinamica

$destination = "uploads/".$session."/avatar".$fileName;

move_uploaded_file($tempName,$destination);


//utilizam if pentru a sterge orice alta imagine
if($handle = opendir($avatar_image_folder)){

    while(false!==($entry=readdir($handle))){
        if(($entry !=".")and ($entry!="..") and $entry != $fileName){
            $pic=1;
           $fileToDelete=$entry;
        }
    }
    closedir($handle);
}
if($pic==1){
    if(unlink($avatar_image_folder."/".$fileToDelete)){
        
    }
}
?>