<?php 

// //setam id pe care il primim  de la functia aproved

$picid = $_POST['id'];
include 'inc/db.inc.php';
$approved = 1;

$query = "UPDATE pics SET approved='$approved' where pid='$picid'";

$query1 = "select * from users where username=(select username from pics where pid='$picid')";
$query_run = mysqli_query($con,$query);

if($query_run)
{
    echo 'approved<br>';
}
?>