<?php 
    require 'connect.php';
    $id = $_GET['id'];

    $result = mysqli_query($mysqli,"DELETE FROM tanaman WHERE id = '$id'");
    if($result){
        header("Location:admin.php");
    }else{
        header("Location:admin.php");
    }
?>