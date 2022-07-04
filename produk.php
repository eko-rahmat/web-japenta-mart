<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Produk</title>
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
            <div class="container w-75 mt-5 mb-5" style="background-color: white;">
                <div class="row text-center pt-3 pb-3">
                    <div class="col">
                        <h1>Tanaman</h1>
                    </div>
                </div>
                <div class="row g-2">
                    <!-- Looping Content -->
                    <?php 
                        require 'connect.php';
                        $result = mysqli_query($mysqli, "SELECT * FROM tanaman");
                        while($row = mysqli_fetch_array($result)){
                            ?>
                                <div class="col-sm-4 mb-3">
                                    <a href="detail.php?id=<?=$row['id']; ?>" style="text-decoration: none;">
                                        <div class="card">
                                            <img src="img/<?=$row['gambar']; ?>" class="card-img-top" alt="<?=$row['gambar']; ?>">
                                            <div class="card-body">
                                            <p class="card-text text-dark"><?=$row['nama_tanaman']; ?></p>
                                            <p class="card-text text-secondary">Rp <?=$row['harga']; ?>,-</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
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