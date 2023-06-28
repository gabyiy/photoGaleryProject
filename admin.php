<?php 
session_start();

$adminSesison =null;
//aici delogam userul in caz ca este logat
if(isset($_SESSION['user'])){
    unset($_SESSION["user"]);
}
if (isset($_SESSION["admin"])){
    $adminSesison = $_SESSION["admin"];
    include "functions.php";
}
include "inc/header.php";
include "inc/slider.php";
if($adminSesison==null){
include "inc/form-admin-login.php";
}else{
include "inc/admin-content.php";
}
include "inc/footer.php";

?>