<?php 
include "inc/db.inc.php";

$approved =0;

$picId= $_POST["id"];

echo $picId;

$query = "delete from pics  where pid='$picId'";

$query_run = mysqli_query($con,$query);

if($query_run){


    echo "Picture not approved";
}

?>