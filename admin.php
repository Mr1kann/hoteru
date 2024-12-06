    <?php

include 'config.php';

// if (isset($_POST['submit'])) {
//     addKamar($_POST);
// }

$result = query("SELECT * FROM rooms");
$fasilitas = query("SELECT * FROM fasilitas");
// var_dump($fasilitas["id_fas"]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/admin.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/admin.css" rel="stylesheet">
    <title>admin page</title>
</head>

<body>

    
    <!-- list kamar start -->
    <h1>Hotel - Admin</h1>
    
    <h3>aksi</h3>
    <ul>
        <li><a href="#fasilitas">fasilitas</a></li>
        <li><a href="tambah.php">tambah kamar/fasilitas</a></li>
    </ul>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">list ruang kamar hotel hebat</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>nomor kamar</th>
                            <th>tipe kamar</th>
                            <th>tipe ranjang</th>
                            <th>harga</th>
                            <th>fasilitas</th>
                            <th>gambar 1</th>
                            <th>gambar 2</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $key) : ?>
                            <tr>
                                <th><?php echo $key["nomor_kamar"]; ?></th>
                                <th><?php echo $key["tipe_kamar"]; ?></th>
                                <th><?php echo $key["tipe_ranjang"]; ?></th>
                                <th><?php echo $key["harga"]; ?></th>
                                <th><?php echo $key["fasilitas"]; ?></th>
                                <th><img src="img/room2/<?php echo $key["gambar1"] ?>" alt="<?php echo $key["gambar1"] ?>" width="150"></th>
                                <th><img src="img/room2/<?php echo $key["gambar2"] ?>" alt="<?php echo $key["gambar2"] ?>" width="150"></th>
                                <th><a href="edit.php?id=<?= $key["id_kamar"]; ?>">edit kamar</a></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="tambah.php">tambah kamar</a>
            </div>
        </div>
    </div>
    <!-- list kamar end -->


    <!-- list fasilitas start -->
    <h1>Hotel - Fasilitas</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3" id="fasilitas">
            <h6 class="m-0 font-weight-bold text-primary">Fasilitas hotel hebat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fasilitas as $fas) : ?>
                            <tr>
                                <th><?= $fas["nama_fasilitas"]; ?></th>
                                <th><?= $fas["deskripsi"]; ?></th>
                                <th><a href="editFas.php?idfas=<?= $fas["id_fas"]; ?>">edit Fasilitas</a></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="tambah.php">tambah Fasilitas</a>
            </div>
        </div>
    </div>
    <!-- list fasilitas end -->

</body>

</html>