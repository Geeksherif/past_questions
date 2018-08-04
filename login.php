<?php
session_start();
 require('config.php');
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
header('Content-type: application/json');  
$array = array('result2' => "logged in",'gotoPage'=>"dashboard.php");
echo json_encode($array);
}else{
// echo "Invalid Login Credentials.";
header('Content-type: application/json');  
$array = array('result' => "not logged in",'gotoPage'=>"login.php");
echo json_encode($array);
}
}
?>
