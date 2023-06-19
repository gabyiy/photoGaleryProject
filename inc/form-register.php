<section class="registration">
    <div class="section-header center">
        <h1>Registration</h1>
        <h6><a href="index.php">Home</a>&gt;<span>Register</span></h6>
        <div class="container">
            <div class="row">
    <form method="post" id="register-form" action="register.php">
        <input type="text" name="fName" id="fName" placeholder="Enter first name"/>
        <input type="text" name="LName" id="LName" placeholder="Enter Last name"/>
        <input type="text" name="username" id="username" placeholder="Enter username"/>
        <input type="email" name="email" id="email" placeholder="Enter email"/>
        <input type="password" name="password" id="password" placeholder="Enter password"/>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password"/>
        <textarea type="text" name="bio" id="bio" placeholder="Enter your bio "></textarea>
        <input type="submit" name="submit" id="submit" value="Register" class=" primary-bg white"/>
    </form>
    </div>
    </div>
    </div>
</section>
<?php 
$fName= "";
$lName="";
$username="";
$email="";
$password="";
$uploads=0;
$bio="";
$id="";
$error= array();

function sanitize ($data){
    $data = trim($data);
    $data =stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;

};

//checking if the submit have been push
if(isset($_POST["submit"])){

    //checking fname
    if(empty($_POST["fName"])){
        $error[]="You have to enter a Firs Name";
    }
    else if(strlen( $_POST["fName"])>25){
        $error[]= "You r name have to be lower then 25";
    }else{
        $fName=sanitize( $_POST["fName"]);
    }

    //checking lastname
    if(empty($_POST["lastName"])){
        $error[]="Please enter a last name";
    }else if(strlen($_POST["lastName"])>25){
        $erorr[]="Last name should not have more then 25 characters";
    }else{
        $lastName=sanitize( $_POST["lastName"]);
    }
    //checking username
    if(empty($_POST["username"])){
        $error[]="You have to enter a username";
    }else if(strlen($_POST["username"])>25){
        $error[]="Username should not have more then 25 characters";

      
    }  else{
        $username=sanitize( $_POST["username"]);
    }

    //checking email

    if(empty($_POST["email"])){
        $error[]="You have to enter a email";
    }else if(strlen($_POST["email"])>25){
        $error[]="Email should not have more then 25 characters";
    }
       else if(!(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))){
        $error[]= "This isnot a valid email";
        $query = "select * from users where email=$_POST[email]";
        $query_result= mysqli_query($db,$query);
        if($query_result){
            $error[]="Email allready exist";
        }
        else{
            $email=sanitize( $_POST["email"]);
        }
    }
    //checking password

    if(empty($_POST["password"])){
        $error[]="Please enter a password";
    }else if (strlen($_POST["password"])>25){
        $error[]="Please enter a password that have less the 25 chars";
    }else{
        $password =sanitize( $_POST["password"]);
        if(!empty($_POST["confirm-passord"])){
            if($_POST["confirm-passord"]!= $_POST["confirm-password"]){
            $error[]="You r password don match";
            }else{
                $error[]="Confirm you r password";
            }
        }
    }
if(!$_POST["bio"]){
    $bio=sanitize( $_POST["bio"]);
}
if ($error){
    
}
}
?>