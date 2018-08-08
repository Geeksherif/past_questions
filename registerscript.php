<?php
session_start();
 require('config.php');
if (isset($_POST['name']) and isset($_POST['password'])){
$name = $_POST['name'];
$password =md5($_POST['password']);
$email = $_POST['email'];
$query = "SELECT * FROM `users` WHERE name='$name' and password='$password'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 0){
// $_SESSION['username'] = $username;
$query = "INSERT INTO `users`(`name`,`password`,`email`) VALUES('".$name."','".$password."','".$email."')";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($result){
    header('Content-type: application/json');  
    $array = array('result2' => "Registered",'data'=>$name);
    echo json_encode($array);
}

}else{
// echo "Invalid Login Credentials.";
header('Content-type: application/json');  
$array = array('error' => "user exists");
echo json_encode($array);
}
}
?>