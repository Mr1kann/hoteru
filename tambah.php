<?php

include 'config.php';

if (isset($_POST['submit'])) {
    addKamar($_POST);
}

if (isset($_POST['tambah'])) {
    addFasilitas($_POST);
}



$result = query("SELECT * FROM rooms")

//how to redirect page php?


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar</title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- rambah kamar form start -->
        <h1>Tambah Kamar </h1>
        <div>
            <ul>
                <li>
                    <label for="">Tipe kamar</label>
                    <select name="tipe-kamar" id="">
                        <option value="Delux">Delux</option>
                        <option value="Suite">Suite</option>
                        <option value="kings Room">kings Room</option>
                    </select>
                </li>
                <li>
                    <label for="tipe-ranjang">Tipe-ranjang</label>
                    <select name="tipe-ranjang" id="tipe-ranjang">
                        <option value="double bed">double bed</option>
                        <option value="single bed">single bed</option>
                        <option value="king bed">king bed</option>
                    </select>
                </li>
                <li>
                    <label for='no-kam'>nomor kamar</label>
                    <input type='number' class='no-kam' name='no-kam'>
                </li>
                <li>
                    <label for='harga'>Harga</label>
                    <input type='text' class='harga' name='harga'>
                </li>
                <li>
                    <!-- <label for="fasilitas">Fasilitas</label>
                    <textarea name="fasilitas" id="fasilitas" cols="30" rows="10"></textarea> -->
                    <label for='fasilitas'>Fasilitas</label>
                    <input type='checkbox' class='fasilitas' name='fasilitas[]' id="fasilitas" value="tv">Tv
                    <input type='checkbox' class='fasilitas' name='fasilitas[]' id="fasilitas" value="free wifi">FREE Wifi
                    <input type='checkbox' class='fasilitas' name='fasilitas[]' id="fasilitas" value="bathtub">Bathtub
                    <input type='checkbox' class='fasilitas' name='fasilitas[]' id="fasilitas" value="shower">Shower
                    <input type='checkbox' class='fasilitas' name='fasilitas[]' id="fasilitas" value="kitchen">Kitchen
                </li>
                <li>
                    <label for='status'>Status</label>
                    <select name="status" id="status">
                        <option value="TIDAKISI">TIDAKISI</option>
                        <option value="ISI">ISI</option>
                    </select>
                </li>
                <li>
                    <label for='gambar'>gambar 1</label>
                    <input type='file' class='gambar' name='gambar1'>
                </li>
                <li>
                    <label for='gambar'>gambar 2</label>
                    <input type='file' class='gambar' name='gambar2'>
                </li>
                <button type="submit" name="submit">masukan</button>
            </ul>
        </div>
        <!-- tambah kamar form end -->

        <a href="admin.php">kembali ke halaman admin</a>



        <!-- tambah fasilitas start -->
        <h1>Tambah Fasilitas Baru</h1>
        <div>
            <ul>
                <li>
                    <label for='namafas'>nama fasilitas</label>
                    <input type='text' class='namafas' name='namafas'>
                </li>
                <li>
                    <label for='deskripsi'>deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                </li>
                <button type="submit" name="tambah">Tambah Fasilitas</button>
            </ul>
        </div>
        <!-- tambah fasilitas end -->

        <a href="admin.php">kembali ke halaman admin</a>
    </form>

</body>

</html>