<?php

include 'config.php';

if (isset($_POST['edit'])) {
    rubahFasilitas($_POST);
}

$id = $_GET["idfas"];
$fas = query("SELECT * FROM fasilitas WHERE id_fas = $id")[0];
// var_dump($fasilitas)



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fasilitas</title>
</head>

<body>
    <!-- edit fasilitas start -->
    <form action="" method="POST">
        <h1>edit fasilitas</h1>
        <ul>
            <input type="text" name="id_fas" value="<?= $fas["id_fas"]; ?>">
            <li>
                <label for='namafas'>nama fasilitas</label>
                <input type='text' class='namafas' name='namafas' value="<?= $fas["nama_fasilitas"]; ?>">
            </li>
            <li>
                <label for='deskripsi'>deskripsi</label>
                <!-- <input type='text' class='deskripsi' name='deskripsi'> -->
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $fas["deskripsi"]; ?></textarea>
            </li>
            <button type="submit" name="edit">Update Fasilitas</button>
        </ul>
        <a href="admin.php">kembali ke halaman admin</a>
    </form>
    <!-- edit fasilitas end  -->
</body>

</html>