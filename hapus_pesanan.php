<?php

    require 'connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $result = mysqli_query($mysqli,"DELETE FROM pemesanan WHERE id_pesan = '$id'");
        if($result){
            header("Location:admin.php");
        }else{
            header("Location:admin.php");
        }
    }else{
        header("Location:admin.php");
    }

