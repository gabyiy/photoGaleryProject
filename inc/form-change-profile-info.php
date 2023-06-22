
<section>

<form method="post" id="form" action="change-profile-info">
<input type="text" name="fName" id="fName" placeholder="Change you r first name"/>
<input type="text" name="lName" id="lName" placeholder="Change you r lName"/>
<input type="text" name="username" id="username" placeholder="Change you r username"/>
<input type="email" name="email" id="email" placeholder="Change you r email"/>
<input type="password" name="password" id="password" placeholder="Change you r password"/>
<input type="text" name="bio" id="bio" placeholder="Change you r bio"/>
<input type="submit" name="submit"id="submit" value="Submit"/>
</form>

<div class="error"></div>
</section>


<?php 
$fName="";
$lName="";
$username="";
$email="";
$password="";
$bio="";
$error= array();

 function sanitize ($data){
    $data= trim($data);
    $data = stripslashes($data);
    $data= htmlspecialchars($data);
 }


 function changeProfileInfo($fName,$lName,$username,$email,$password,$bio){

 }
if(isset($_POST['submit'])){

    if(strlen($_POST['fName'])>25){
        $error[]= "You r first name must not have more then 25 chars";
    }else{

        $fName= sanitize($_POST['fName']);
    }
if(strlen($_POST['lName'])>25){
    $error[]="You r last name must not  have more then 25 chars";
}else{
    $lName= sanitize($_POST['lName']);
}
if(strlen($_POST['username'])>25){

    $error[]= "You r username must not pass 25 chars";
}else{
    $username= sanitize($_POST['username']);
}
if(strlen($_POST['email'])>25){
$error[]="You r email must no pass 25 chars";
}else{
    $email=sanitize($_POST['email']);
}

if(strlen($_POST['password'])>15){
    $error[]= "You r password must not pass 15 chars";
}else{
    $password= sanitize($_POST['password']);
}
if (strlen($_POST['bio'])>100){
    $error[]="You r bio should not pass 100 chars";
}else{
    $bio = sanitize($POST['bio']);
}
if(count($error)==0){
    changeProfileInfo($fName,$lName,$username,$email,$password,$bio);
}else{

    foreach($error as $key =>$value){

        ?>
        <script type="text/javascript">
            $(".error").append("<?php echo $value ."<br>" ;?>");
        </script>
        <?php
    }
}

}

?>