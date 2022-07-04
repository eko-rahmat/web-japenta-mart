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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Disabled</a>
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
                        <h2>Detail</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/plant1.jpg" alt="plant1" class="img-fluid">
                    </div>
                    <div class="col">
                        <h4 class="text-center pb-3">Mangga Arumanis</h4>
                        <div class="total pt-2">
                            <p>Jumlah : <?=$jumlah ?> pohon</p>
                            <p>Total harga : Rp <?=$jumlah ?>,-</p>
                        </div>
                        <hr>
                        <form action="invoice.html" method="get">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="mt-2 mb-2 form-control">
                            <label for="nomor" class="form-label">Nomor Telepon</label>
                            <input type="text" name="telpon" class="mt-2 mb-2 form-control">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control mb-3" name="alamat" id="text-alamat" rows="3"></textarea>
                            <button type="submit" value="submit" class="btn btn-primary">Pesan</button>
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
                    <div class="col-4 mb-3">
                        <div class="card">
                            <img src="img/plant1.jpg" class="card-img-top" alt="plant1">
                            <div class="card-body">
                            <p class="card-text">Mangga Arumanis</p>
                            <p class="card-text text-secondary">Rp 150.000,-</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <img src="img/plant1.jpg" class="card-img-top" alt="plant1">
                            <div class="card-body">
                            <p class="card-text">Mangga Arumanis</p>
                            <p class="card-text text-secondary">Rp 150.000,-</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <img src="img/plant1.jpg" class="card-img-top" alt="plant1">
                            <div class="card-body">
                            <p class="card-text">Mangga Arumanis</p>
                            <p class="card-text text-secondary">Rp 150.000,-</p>
                            </div>
                        </div>
                    </div>
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Disabled</a>
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