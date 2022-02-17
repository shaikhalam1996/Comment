<?php

session_start();
include 'dbcon.php';

if(isset($_POST['read'])){
    $select =  "select * from comment";
    $run = mysqli_query($con,$select);
$row = mysqli_fetch_assoc($run);
$comment = $row['comment'];
echo $comment;
}


$comment = $_POST['comment'];
$user_id = $_SESSION['id'];

$insert = "INSERT INTO `comment`(`user_id`, `comment_on`, `comment`) VALUES ('$user_id','Paragraph','$comment')";

$query = mysqli_query($con,$insert);

if($query){
    echo "Comment Added";
}



?>