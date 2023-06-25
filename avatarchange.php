<?php 
session_start();
$pic=0;
$fileToDelete="";
//asa obtineme filename pe care il aflam cu functia avatarloadhandler  din main.js si de acolo
//specificam ca dorim numele
$fileName= $_FILES['avatar']['name'];
//echo $fileName;


$tempName= $_FILES["avatar"]["tmp_name"];

$session = $_SESSION["user"]; 

$avatar_image_folder= "uploads/".$session."/avatar";
//aci specificam o destinatie dinamica 

$destination = "uploads/".$session."/avatar/".$fileName;

//cu ajutoru functie uploadam imaginea ,adaugam ca parametri numele temporar si destinatia
move_uploaded_file($tempName,$destination);


//utilizam if pentru a sterge orice alta imagine
if($handle = opendir($avatar_image_folder)){

    while(false!==($entry=readdir($handle))){
        if(($entry !=".")and ($entry!="..") and ($entry != $fileName)){
            $pic=1;
            //aici ii facem un assign imaginei pe  care vrem sa o stergem
           $fileToDelete=$entry;
        }
    }
    closedir($handle);
}
if($pic==1){
    //si aici in caz ca avem imaginea o putem sterge automat cu unlink
    if(unlink($avatar_image_folder."/".$fileToDelete)){
        
    }
}
//redeschidem directorul
if($handle = opendir($avatar_image_folder)){

    while(false!==($entry=readdir($handle))){
        if(($entry !=".")and ($entry!="..")){

         echo   $avatar_image_path= $avatar_image_folder."/".$entry;
        }
    }
    closedir($handle);
}

?>