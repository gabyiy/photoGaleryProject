<?php
$host="localhost";
$username="root";
$password = "";
$db= "photogallery";

$con= @mysqli_connect($host,$username,$password);

if (@$con){
  //  echo "conected";
    if(@mysqli_select_db($con,$db));
}else{
   // echo"not connected2";
}
?>