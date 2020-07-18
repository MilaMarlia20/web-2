<?php
//MulaiSession
    session_start();
    include("koneksi.php");
    if($_SESSION['akses'] == ""){
        header("location:index.php?pesan=belumLogin");
    }

    $result = mysqli_query($con, "SELECT * FROM pemesanan ORDER BY id ASC");
	$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemesanan Makanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
</head>
<body>
<?php include("header.php");?>
    <div class="container pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="display-4">Dashboard Pemesanan Makanan</h1>
                    <p class="lead">Selamat datang <strong><?= $_SESSION['username']; ?></strong> pada halaman dashboard pemesanan makanan, ini merupakan aplikasi UAS universitas pamulang.</p>
                </div>
            </div>
        </div>
        <a href="tambah.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
        <div class="row pl-5">
        <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Restoran</th>
                        <th>Makanan</th>
                        <th>Harga</th>
                        <th>Nama</th>
                        <th>Nomer HP</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?= $data['jenis']; ?></td>
                        <td><?= $data['makanan']; ?></td>
                        <td><?= $data['harga']; ?></td>
                        <td><?= $data['nama_lengkap']; ?></td>
                        <td><?= $data['no_hp']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <?php
                            if($_SESSION['akses'] == 'superadmin'){
                        ?>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="edit.php?id=<?= $data['id'] ?>" class="dropdown-item" ><i class="fas fa-edit"></i> Edit</a>
                                <a href="delete.php?id=<?= $data['id'] ?>"
                                onclick="return confirm('Yakin hapus data?')" class="dropdown-item" ><i class="fas fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'pdf'
                ]
            } );
        } );
    </script>
</body>
</html>