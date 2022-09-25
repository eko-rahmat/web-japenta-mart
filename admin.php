<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location : login.php");
        exit;
    }
    require 'connect.php';
    $tanaman = mysqli_query($mysqli,"SELECT * FROM tanaman");
    $pemesanan = mysqli_query($mysqli,"SELECT * FROM pemesanan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow">
            <div class="container">
              <a class="navbar-brand" href="#">Japenta-Mart</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="#tanaman">Tanaman</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#pesanan">Pesanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    
    <section id="#tanaman">
        <div class="container p-3 mt-5 mb-5" style="background-color: white;">
            <div class="row">
                <div class="col text-center">
                    <h3>Manage Tanaman</h3>
                </div>
            </div>
            
            <div class="row">
                <a href="tambah.php" class="btn btn-secondary mb-3 ms-3" style="width: 12rem;"> + Tambah Tanaman</a>
            </div>

            <div class="row">
                <div class="col">
                    <table class="border table table-sm">
                        <tr>
                            <td>No</td>
                            <td>Gambar</td>
                            <td>Nama</td>
                            <td>Deskripsi</td>
                            <td>Pot Besar</td>
                            <td>Planter Bag</td>
                            <td>Pot Kecil</td>
                            <td>Stok Pot Besar</td>
                            <td>Stok Pot Planter</td>
                            <td>Stok Pot Kecil</td>
                            <td>Action</td>
                        </tr>

                        <?php 
                            $num = 1;
                            while($data_tanam = mysqli_fetch_array($tanaman)){
                                ?>
                                    <tr>
                                        <td><?=$num; ?></td>
                                        <td><img src='img/<?=$data_tanam['gambar']; ?>' width="100px"></td>
                                        <td><?=$data_tanam['nama_tanaman']; ?></td>
                                        <td class="w-25"><?=$data_tanam['deskripsi']; ?></td>
                                        <td><?=$data_tanam['pot_besar']; ?></td>
                                        <td><?=$data_tanam['planter_bag']; ?></td>
                                        <td><?=$data_tanam['pot_kecil']; ?></td>
                                        <td><?=$data_tanam['stok_besar']; ?></td>
                                        <td><?=$data_tanam['stok_planter']; ?></td>
                                        <td><?=$data_tanam['stok_kecil']; ?></td>
                                        <td><a style="text-decoration: none; color:red;" href="hapus.php?id=<?=$data_tanam['id']; ?>">Hapus</a></td>
                                    </tr>
                                <?php
                                $num++;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="#pesanan">
        <div class="container p-3 mt-5 mb-5" style="background-color: white;">
            <div class="row">
                <div class="col text-center">
                    <h3>Manage Pesanan</h3>
                </div>
            </div>
        
            <div class="row">
                <div class="col">
                    <table class="border table table-sm">
                        <tr>
                            <td>No</td>
                            <td>Tanggal Pesan</td>
                            <td>Nama</td>
                            <td>Nomor Telepon</td>
                            <td>Alamat</td>
                            <td>Pesanan</td>
                            <td>Jenis Pot</td>
                            <td>Jumlah Pesanan</td>
                            <td>Total Harga</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        <?php 
                            $num = 1;
                            while($data_pesan = mysqli_fetch_array($pemesanan)){
                                ?>
                                    <tr>
                                        <td><?=$num; ?></td>
                                        <td><?=$data_pesan['tanggal']; ?></td>
                                        <td><?=$data_pesan['nama']; ?></td>
                                        <td><?=$data_pesan['no_telpon']; ?></td>
                                        <td><?=$data_pesan['alamat']; ?></td>
                                        <td><?=$data_pesan['pesanan']; ?></td>
                                        <td><?=$data_pesan['pot']; ?></td>
                                        <td><?=$data_pesan['jumlah']; ?></td>
                                        <td><?=$data_pesan['total']; ?></td>
                                        <td><a style="text-decoration: none; color:green;" href="update_pesanan.php?id=<?=$data_pesan['id_pesan'];?>"><?=$data_pesan['proses']; ?></a></td>
                                        <td><a style="text-decoration: none; color:red;" href="hapus_pesanan.php?id=<?=$data_pesan['id_pesan'];?>">Hapus</a></td>
                                    </tr>
                                <?php
                                $num++;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p class="text-center">@Copyright by Japenta - 2022</p>
    </footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>