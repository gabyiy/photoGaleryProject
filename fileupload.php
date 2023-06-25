<?php 
// session_start();


// $pic=0;
// //specificam ca dorim numele
// $fileName= $_FILES['file1']['name'];
// //echo $fileName;


// $tempName= $_FILES["file1"]["tmp_name"];

// $session = $_SESSION["user"]; 



// $destination = "uploads/".$session."/".$fileName;

// ;
// $id="";
// $approved=0;

// $query ="insert into pics values('$id','$session','$fileName','$approved')";

// $query_run= mysqli_query($con,$query);

// if($query_run){
//     //daca queryul a functionat  trimitem  imaginea la destinatia respectiva

//     if ( move_uploaded_file($tempName,$destination)){

//         echo $destination;
//         }
//  } 

session_start();
	
	$filename = $_FILES['file1']['name'];
	//echo $filename;

	$tmpname = $_FILES['file1']['tmp_name'];
	$session = $_SESSION['user'];
	
	$destination = 'uploads/'.$session.'/'.$filename;

	$id = '';
	$approved = 0;

	include 'inc/db.inc.php';

	$query = "insert into pics values('$id','$session','$filename','$approved')";
	$query_run = mysqli_query($con,$query);

	if($query_run)
	{
		if(move_uploaded_file($tmpname, $destination))
		{
			echo $destination;
		}
	}
?>