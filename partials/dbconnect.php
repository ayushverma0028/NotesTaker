<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "MyNotes";

$conn = mysqli_connect($server, $user, $password, $db);
if($conn){
    // echo "Connection Successfull";
}
else{
    echo "Some Error Occured..!!";
}

?>