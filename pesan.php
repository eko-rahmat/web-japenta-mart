<?php 
    require 'connect.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli,"SELECT * FROM tanaman WHERE id ='$id'");
    $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Pemesanan</title>
    </head>
    <body>
        <!-- Header -->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark shadow">
                <div class="container">
                <a class="navbar-brand" href="#">Japenta-Mart</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#produk">Tanaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#tentang">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
        </header>

        <section>
            <div class="container w-75 p-3 mt-5 mb-5" style="background-color: white;">
                <div class="row text-center pt-3 pb-3">
                    <div class="col">
                        <h2>Pesan</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/<?=$data['gambar']; ?>" alt="plant1" class="img-fluid">
                    </div>
                    <div class="col">
                        <h4 class="text-center pb-3"><?=$data['nama_tanaman']; ?></h4>
                        <!-- FORM -->
                        <form action="invoice.php" method="post">
                        <div class="total pt-2">
                            <p>Jumlah : <input type="number" min=1 name="jumlah" width="100px" class="form-control">pohon</p>
                            <p>Harga : Rp <?=$data['harga']; ?>,-</p>
                        </div>
                        <hr>
                            <input type="hidden" name="id" value="<?=$data['id']; ?>">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="mt-2 mb-2 form-control">
                            <label for="nomor" class="form-label">Nomor Telepon</label>
                            <input type="text" name="telpon" class="mt-2 mb-2 form-control">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control mb-3" name="alamat" id="text-alamat" rows="3"></textarea>
                            <input type="submit" name="submit" value="Pesan" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <hr>
                        <h4>Rekomendasi</h4>
                    </div>
                </div>
                <div class="row">
                <?php 
                        $rekom = mysqli_query($mysqli, "SELECT * FROM tanaman");
                        $num_rekom = 0;
                        while($row = mysqli_fetch_array($rekom)){
                            ?>
                                <div class="col-4 mb-3">
                                    <a href="detail.php?id=<?=$row['id']; ?>" style="text-decoration: none; color:black;">
                                        <div class="card">
                                            <img src="img/<?=$row['gambar']; ?>" class="card-img-top" alt="plant1">
                                            <div class="card-body">
                                                <p class="card-text"><?=$row['nama_tanaman']; ?></p>
                                                <p class="card-text text-secondary">Rp <?=$row['harga'];?>,-</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            if($num_rekom>3){
                                break;
                            }
                            $num_rekom++;
                        }

                    ?>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="row text-center pt-3">
                <div class="col">
                    <h3>japente-mart</h3>
                </div>
                <div class="col">
                <ul class="foot-bar">
                    <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#produk">Tanaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#tentang">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>@Copyright by Japenta - 2022</p>
                </div>
            </div>
        </footer>
        <script src="js/bootstrap.js"></script>
    </body>
</html>