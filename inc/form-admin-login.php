<section class="admin-login">
	<div class="section-header center">
		<h1>Login</h1>
		<h6><a href="index.php">Home </a> &gt; <span> Admin Login</span></h6>
	</div>
	<div class="container">
		<div class="row">
			<form method="post" id="admin-login-form" action="admin.php">
				
				<input type="text" name="username" id="username" placeholder="Choose a Username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>"/>
				<input type="password" name="password" id="password" placeholder="Enter your Password here"/>
				<input type="submit" id="submit" name="submit" value="Login" class="primary-bg white">
			</form>
			<div id="error">
				
			</div>
			<div id="success">
				
			</div>
		</div>
	</div>
</section>

<?php
include 'db.inc.php';
	
	$username="";
	$password="";
	
	$error = array();

	function login($username,$password,$con)
	{
		//$newpwd = md5($password);
		$query = "select * from admin where username='$username' and password='$password'";

		$queryrun = mysqli_query($con,$query);

		if(mysqli_num_rows($queryrun)>0)
		{
            //aici setatam sesiunea de admin
			$_SESSION['admin'] = $username;
		//asa specificam sa ne redirectioneze catre index
			header('Location:admin.php');
            ?>
            <script type="text/javascript">
                $(".error").append("merge");
            </script>
            <?php
		}else{
            ?>
            <script type="text/javascript">
                $(".error").append("nu merge");
            </script>
            <?php
        }

	}

	function sanitize($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);

		return $data;
	}

	if(isset($_POST['submit']))
	{

		$username = sanitize($_POST['username']);
		$password = sanitize($_POST['password']);

		if(empty($username))
		{
			?>
				<script type="text/javascript">
				$('#error').append("Enter Username");
				</script>
			<?php
		}

		elseif(empty($password))
		{
			?>
				<script type="text/javascript">
				$('#error').append("Enter Password");
				</script>
			<?php
		}

		else
		{
			login($username,$password,$con);
		}
	}
?>