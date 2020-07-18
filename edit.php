<?php
//MulaiSession
session_start();

include("koneksi.php");

    if($_SESSION['akses'] == ""){
        header("location:index.php?pesan=belumLogin");
    }

    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM pemesanan  WHERE id='$id'");

    if(isset($_POST['save'])){
        $jenis = htmlspecialchars($_POST['jenis']);
        $nama = htmlspecialchars($_POST['nama']);
        $harga = htmlspecialchars($_POST['harga']);
        $user = htmlspecialchars($_POST['user']);
        $nohp = htmlspecialchars($_POST['nohp']);
        $email = htmlspecialchars($_POST['email']);
        
        $result = mysqli_query($con, "UPDATE pemesanan SET jenis='$jenis', makanan='$nama', harga='$harga', nama_lengkap='$user', no_hp='$nohp', email='$email' WHERE id='$id'");
            
        echo "<script>alert('Data berhasil diubah');window.location.href = 'dashboard.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>
<body>
<?php include("header2.php");?>
    <div class="container pt-2">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                    <h1>Edit Data Anggota</h1>
                    <hr>
                    <form action="" method="POST">
                    <?php
                    while($data = mysqli_fetch_assoc($result)){
				    ?>
                        <div class="form-group">
                            <label for="nomer">Jenis Restoran</label>
                            <select class="form-control" id="jenis" name="jenis" onchange="check()">
                                <option value="Warteg Kharisma" <?php if($data['jenis'] == "Warteg Kharisma") echo 'selected' ?>>Warteg Kharisma</option>
                                <option value="Restoran Padang Sederhana" <?php if($data['jenis'] == "Restoran Padang Sederhana") echo 'selected' ?>>Restoran Padang Sederhana</option>
                                <option value="Soto Ayam Ndelik" <?php if($data['jenis'] == "Soto Ayam Ndelik") echo 'selected' ?>>Soto Ayam Ndelik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Makanan</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['makanan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="user">Nama Lengkap</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?= $data['nama_lengkap'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor HP</label>
                            <input type="number" class="form-control" id="nohp" name="nohp" value="<?= $data['no_hp'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>">
                        </div>
                        <button class="btn btn-success" type="submit" name="save">Simpan</button>
                        <a href="dashboard.php" class="btn btn-danger">Kembali</a>
                        <?php
                        }
				        ?>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted text-center mt-5">
        Build By Mila Marlia &copy;2020 | Universitas Pamulang
    </div>
    <script src="https://kit.fontawesome.com/a8f1b19f2c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
</body>
</html>