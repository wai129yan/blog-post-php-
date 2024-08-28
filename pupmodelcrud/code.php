<?php
session_start();
$connection = mysqli_connect("localhost","root","","aprogram");

if(isset($_POST['save_data']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $insert_query = "Insert INTO pop(name,email,phone) VALUES ('$name','$email','$phone')";

    $insert_query_run = mysqli_query($connection,$insert_query);

    if($insert_query_run)
    {
        $_SESSION ['status'] = "Connected !";
        header('Location:index.php');
    }else{
        $_SESSION ['status'] = "Insertation of data failed";
        header('Location:index.php');
    }
}