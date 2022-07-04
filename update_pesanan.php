<?php

    require 'connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $cek = mysqli_query($mysqli,"SELECT * FROM pemesanan WHERE id_pesan = '$id'");
        $data = mysqli_fetch_array($cek);
        if($data['proses']=='belum diproses'){
            $result = mysqli_query($mysqli,"UPDATE pemesanan SET proses='barang dikirim' WHERE id_pesan = '$id'");
            if($result){
                header("Location:admin.php");
            }else{
                header("Location:admin.php");
            }
        }else{
            header("Location:admin.php");
        }
    }else{
        header("Location:admin.php");
    }

