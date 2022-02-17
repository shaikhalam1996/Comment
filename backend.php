<?php
session_start();
include 'dbcon.php';

$email = $_POST['Email'];
$password = $_POST['Password'];

if(!empty($email) && !empty($password)){
    $select = "select * from blog where email='$email'";
    $query=mysqli_query($con,$select);
    if($query){
        $row = mysqli_fetch_assoc($query);
        if($row['password'] === $password){
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header('location:index.php');

        }else{
            echo "Password Are Not Matching";
        }
    }else{
        echo "Please Enter Valid Email And Password";
    }
}else{
    echo "Please Filled All The Input";
}

?>