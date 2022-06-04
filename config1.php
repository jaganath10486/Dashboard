<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'applicant';
$conn = mysqli_connect($server,$username,$password,$database);
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
echo"";





?>

