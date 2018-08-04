<?php
session_start();
 require('config.php');
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password =md5($_POST['password']);
$email = $_POST['email'];
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 0){
// $_SESSION['username'] = $username;
$query = "INSERT INTO `user`(`username`,`password`,`email`) VALUES('".$username."','".$password."','".$email."')";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($result){
    header('Content-type: application/json');  
    $array = array('result2' => "Registered",'data'=>$username);
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