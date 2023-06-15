
<?php
@session_start();
 $_SESSION["user"]="Me";
//aici facem o verificare sa vedem daca este useru logat ()
if(isset($_SESSION["user"])){
    $session= $_SESSION["user"];
}else{
    $session = NULL;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" >
        window.jQuery || document.write('<script src="js/jquery.js">\x3c/script>');
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/6230d4baa3.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/reset.css">

	<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>Document</title>
</head>
<body>
    <header>
       <div class="container">
        <div class="">
            <a href="#" class="logofloat-left">Photo Gallery </a>
            <nav class="">

                <!-- folosoim butonu pentru a sesisune -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    
                <i class="fa fa-navicon"></i>
        </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Gallery</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <?php
                        if($session==null){
                        ?>
                        <li><a href="">Login</a></li>
                        <li><a href="">Register</a></li>
                        <?php
                        }
                        else{
                          ?>  
                        <li><a href="">Logout</a></li>
                       <?php
                        }
                       ?>













                    </ul>
                </div>
            </nav>
        </div>
       </div>
    </header>