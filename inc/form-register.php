<section class="registration">
    <div class="section-header center">
        <h1>Registration</h1>
        <h6><a href="index.php">Home</a>&gt;<span>Register</span></h6>
        <div class="container">
            <div class="row">
    <form method="post" id="register-form" action="register.php">
        <input type="text" name="fName" id="fName" placeholder="Enter first name" value="<?php if(isset($_POST['fName'])){echo $_POST['fName'];}?>"/>
        <input type="text" name="lName" id="lName" placeholder="Enter Last name" value="<?php if(isset($_POST['lName'])){echo $_POST['lName'];}?>;"/>
        <input type="text" name="username" id="username" placeholder="Enter username" value="<?php if(isset($_POST['username'])) {echo $_POST['username'];}?>"/>
        <input type="email" name="email" id="email" placeholder="Enter email" value="<?php if(isset($_POST["email"])){ echo $_POST['email'];}?>"/>
        <input type="password" name="password" id="password" placeholder="Enter password"/>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password"/>
        <textarea type="text" name="bio" id="bio" placeholder="Enter your bio " value="<?php if(isset($_POST['bio'])){echo $_POST['bio'];}?>"></textarea>
        <input type="submit" name="submit" id="submit" value="Register" class=" primary-bg white"/>
    </form>
    <div class="error" style="color: red;"></div>
    <div class="success"></div>
    <div class="go-to-login"></div>
    </div>
    </div>
    </div>
</section>
<?php 
 
$id="";
$fName= "";
$lName="";
$username="";
$email="";
$password="";
$bio="";
$uploads=0;

$error= array();

function sanitize ($data){
    $data = trim($data);
    $data =stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;

};

function register($id,$fName,$lastName,$username,$email,$password,$bio,$uploads,$con){
    $encryptPassword = md5($password);
    $query = "insert into users values('$id','$fName','$lastName','$username','$email','$encryptPassword','$bio','$uploads')";

    $mysqliRun= mysqli_query($con,$query);

    if ($mysqliRun){
        ?>
        <script type="text/javascript">
            $(".success").append("You register succesufuly <a href='login.php'>Click here to login</a>");
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            $(".error").append("You dident register");
        </script>
        <?php 
    }
}
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
    if(empty($_POST["lName"])){
        $error[]="Please enter a last name";
    }else if(strlen($_POST["lName"])>25){
        $erorr[]="Last name should not have more then 25 characters";
    }else{
        $lastName=sanitize( $_POST["lName"]);
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
       
      
    }  else{
        $email=sanitize( $_POST["email"]);
    }
    //checking password

    if(empty($_POST["password"])){
        $error[]="Please enter a password";
    }else if (strlen($_POST["password"])>25){
        $error[]="Please enter a password that have less the 25 chars";
    }else{
        $password =sanitize($_POST["password"]);
        if(!empty($_POST["confirm-passord"])){
            if($_POST["confirm-passord"]!= $password){
            $error[]="You r password don match";
            }else{
                $error[]="Confirm you r password";
            }
        }
    }
if(count($error)==0){
    $checkEmail= "select * from users where email='$email'";
    $runEmailQuery= mysqli_query($con,$checkEmail);
    $checkUsernameQuery ="select * from users where username='$username'" ;
$runUsernameQuery =  mysqli_query($con , $checkUsernameQuery);

    if(mysqli_num_rows($runEmailQuery)>0){
        
        ?>
        <script type="text/javascript">
            $(".erorr").append("<?php echo 'Email exist'?>;");
        </script>
        <?php
        
    }
    elseif(mysqli_num_rows($runUsernameQuery)>0){
       ?>
       <script type="text/javascript">
        $(".error").append("<?php echo 'Username exist'?>;");
       </script>
       <?php 
    }else{
        register($id,$fName,$lastName,$username,$email,$password,$bio,$uploads,$con);
    }

}else{
    foreach($error as $key =>$value){
    ?>
    <script type="text/javascript">
        $(".error").append("<?php echo $value.'<br>';?>");
    </script>
    <?php
    }
}
}
?>