<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Tanaman</title>
</head>
<body>
    <header>
        <nav class="navbar bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">Japenta-Mart</a>
            </div>
        </nav>
    </header>
    
    <section>
        <div class="container w-75 p-3 mt-5 mb-5" style="background-color: white;">
            <div class="row">
                <div class="col">
                    <h3 class="text-center" >Tambah Tanaman</h3>
                    <form action="tambah.php" method="post">
                        <label for="Nama">Nama Tanaman</label>
                        <input type="text" name="nama" class="form-control"><br>
                        <label for="Deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="desc" class="form-control mb-3" rows="3"></textarea><br>
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control"><br>
                        <label for="stok">Stok</label>
                        <input type="text" name="stok" class="form-control"><br>
                        <label for="image">Upload Gambar</label><br>
                        <!-- <input type="file" name="gambar"><br> -->
                        <input type="submit" name="submit" id="submit" value="Tambah" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p class="text-center">@Copyright by Japenta - 2022</p>
    </footer>
</body>
</html>

<?php 
    require 'connect.php';

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $desc = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        // $gambar = $_FILES['gambar']['name'];

        $result = mysqli_query($mysqli,"INSERT INTO tanaman (nama_tanaman,deskripsi,harga,stok) VALUES ('$nama','$desc','$harga','$stok')");
        if($result){
            echo "
            <script>
                alert('Berhasil Menambahkan')
            </script>";
        }else{
            // echo "
            // <script>
            //     alert('Gagal Mengirim')
            // </script>";
            echo error_log($result);
        }
    }
?>