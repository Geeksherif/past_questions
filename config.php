<?php
$db = "past_question";
$conn = mysqli_connect('localhost','root','',$db);
if(!$conn){
    die("error in db ". mysqli_error($conn));
}else{
    // echo "succes";
}
?>