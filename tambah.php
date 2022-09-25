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
                    <form action="tambah.php" method="post" enctype="multipart/form-data">
                        <label for="Nama">Nama Tanaman</label>
                        <input type="text" name="nama" class="form-control"><br>
                        <label for="Deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="desc" class="form-control mb-3" rows="3"></textarea><br>
                        <label for="harga">Harga Pot Besar</label>
                        <input type="text" name="potbesar" class="form-control"><br>
                        <label for="stok">Stok Pot Besar</label>
                        <input type="text" name="stokbesar" class="form-control"><br>
                        <label for="harga">Harga Planter Bag</label>
                        <input type="text" name="planter" class="form-control"><br>
                        <label for="stok">Stok Planter Bag</label>
                        <input type="text" name="stokplanter" class="form-control"><br>
                        <label for="harga">Harga Pot Kecil</label>
                        <input type="text" name="potkecil" class="form-control"><br>
                        <label for="stok">Stok Pot Kecil</label>
                        <input type="text" name="stokkecil" class="form-control"><br>
                        <label for="image">Upload Gambar</label><br>
                        <input type="file" name="gambar"><br>
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
        $ptbesar = $_POST['potbesar'];
        $planter = $_POST['planter'];
        $ptkecil = $_POST['potkecil'];
        $stokbesar = $_POST['stokbesar'];
        $stokplanter = $_POST['stokplanter'];
        $stokkecil = $_POST['stokkecil'];
        
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.',$gambar);
        $ekstensi = strtolower(end($x));
        $gambar_baru = $nama.".jpg";
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'img/'.$gambar_baru)){
            $result = mysqli_query($mysqli,"INSERT INTO tanaman (nama_tanaman,deskripsi,pot_besar,planter_bag,pot_kecil,stok_besar,stok_planter,stok_kecil,gambar) VALUES ('$nama','$desc','$ptbesar','$planter','$ptkecil','$stokbesar','$stokplanter','$stokkecil','$gambar_baru')");
            if($result){
                // echo "
                // <script>
                //     alert('Berhasil Menambahkan')
                // </script>";
                header("Location:admin.php");
            }else{
                // echo "
                // <script>
                //     alert('Gagal Mengirim')
                // </script>";
                echo error_log($result);
            }
        }else{
            echo "Gagal Upload Gambar";
        }
    }
?>