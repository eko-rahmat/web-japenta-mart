<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $nama = htmlspecialchars($_POST['nama']);
        $telpon = htmlspecialchars($_POST['telpon']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $jumlah = $_POST['jumlah'];
        $pot = $_POST['pot'];
        $id = htmlspecialchars($_POST['id']); 
    }
    
    $result = mysqli_query($mysqli,"SELECT * FROM tanaman WHERE id='$id'");
    $data = mysqli_fetch_array($result);
    
    $tanggal = date('d-m-Y');
    $pesanan = $data['nama_tanaman'];
    if($pot == 'pot_besar'){
        $total = $data['pot_besar']*$jumlah;
        $kurang = $data['stok_besar']-$jumlah;
        $sisa_stok= mysqli_query($mysqli, "UPDATE tanaman SET stok_besar='$kurang' WHERE id='$id'");
        $proses = "belum diproses";
        $pesan = mysqli_query($mysqli,"INSERT INTO pemesanan (tanggal,nama,no_telpon,alamat,pesanan,pot,jumlah,total,proses) VALUES ('$tanggal','$nama','$telpon','$alamat','$pesanan','$pot', '$jumlah', '$total','$proses')");    
    }elseif($pot == 'planter_bag'){
        $total = $data['planter_bag']*$jumlah;
        $kurang = $data['stok_planter']-$jumlah;
        $sisa_stok= mysqli_query($mysqli, "UPDATE tanaman SET stok_planter='$kurang' WHERE id='$id'");
        $proses = "belum diproses";
        $pesan = mysqli_query($mysqli,"INSERT INTO pemesanan (tanggal,nama,no_telpon,alamat,pesanan,pot,jumlah,total,proses) VALUES ('$tanggal','$nama','$telpon','$alamat','$pesanan','$pot', '$jumlah', '$total','$proses')");
    }elseif ($pot == 'pot_kecil') {
        $total = $data['pot_kecil']*$jumlah;
        $kurang = $data['stok_kecil']-$jumlah;
        $sisa_stok= mysqli_query($mysqli, "UPDATE tanaman SET stok_kecil='$kurang' WHERE id='$id'");
        $proses = "belum diproses";
        $pesan = mysqli_query($mysqli,"INSERT INTO pemesanan (tanggal,nama,no_telpon,alamat,pesanan,pot,jumlah,total,proses) VALUES ('$tanggal','$nama','$telpon','$alamat','$pesanan','$pot', '$jumlah', '$total','$proses')");
    }
    if($pesan == false && $sisa_stok == false){
        echo "Error Guys";
    }
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
        <title>Invoice</title>
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
                        <h2>Invoice</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/<?=$data['gambar'];?>" alt="plant1" class="img-fluid">
                    </div>
                    <div class="col">
                        <hr>
                        <table class="border borderless">
                            <tr>
                                <td>Tanggal</td>
                                <td><?=$tanggal;?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?=$nama; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td><?=$telpon; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?=$alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Pesanan</td>
                                <td><?=$pesanan; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Pot</td>
                                <td><?=$pot;?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Pesanan</td>
                                <td><?=$jumlah; ?> Pohon</td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>Rp <?=$total; ?>,-</td>
                            </tr>
                        </table>
                        <hr>
                        <h4>Cara Bayar</h4>
                        <p>Pembayaran dilakukan melalui transaksi ATM, ebanking, atau mbanking ke nomor rekening ini:</p>
                        <h4 class="text-center text-success">146 0802 2922</h4>
                        <p>Setelah transaksi, silahkan Centang telah bayar dan kirim bukti pembayaran ke Whatsapp kami melalui tombol dibawah:</p>
                        <a href="https://wa.me/+6282253502695?text=Japenta-Mart%20Pesanan%0aNama%3a%20<?=$nama;?>%0aNoTelpon%3a%20<?=$telpon;?>%0aAlamat%3a%20<?=$alamat;?>%0aPesanan%3a%20<?=$data['nama_tanaman'];?>%0apot%3a%20<?=$pot?>%0aJumlah%3a%20<?=$jumlah;?>%0aTotal%3a%20Rp%20<?=$total;?>%2c-"><button class="btn btn-primary" type="button">Kirim Nota</button></a>
                        <p>Atau bisa kirim Bukti Pembayaran ke nomor ini <a href="https://wa.me/+6282253502695">0822 5350 2695</a></p>
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