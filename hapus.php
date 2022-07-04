<?php 
    require 'connect.php';
    $id = $_GET['id'];
    $get = mysqli_query($mysqli,"SELECT * FROM tanaman WHERE id = '$id'");
    $data = mysqli_fetch_array($get);
    $result = mysqli_query($mysqli,"DELETE FROM tanaman WHERE id = '$id'");
    if($result){
        unlink('img/'.$data['gambar']);
        header("Location:admin.php");
    }else{
        header("Location:admin.php");
    }
?>