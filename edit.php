<?php

include 'config.php';


$id = $_GET["id"];
// $id_fas = $_GET["id_fas"];

$kamar = query("SELECT * FROM rooms WHERE id_kamar = $id")[0];

if (isset($_POST['Kamar'])) {
    rubahKamar($_POST);
}


$result = query("SELECT * FROM rooms");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar</title>
</head>

<body>
    <!-- edit kamar start -->
    <form action="" method="POST">
        <h1>Edit Kamar</h1>
        <input type="hidden" name="id_kamar" value="<?= $kamar["id_kamar"]; ?>">
        <ul>
            <li>
                <label for='gambar'>gambar kamar</label>
                <input type='file' class='gambar' name='gambar'>
            </li>
            <li>
                <label for="">Tipe kamar</label>
                <select name="tipe-kamar" id="">
                    <?php if ($kamar["tipe_kamar"] === "Delux") : ?>
                        <option value="Delux" selected>Delux</option>
                        <option value="Suite">Suite</option>
                        <option value="Kings Room">Kings Room</option>
                    <?php elseif ($kamar["tipe_kamar"] === "Suite") : ?>
                        <option value="Delux">Delux</option>
                        <option value="Suite" selected>Suite</option>
                        <option value="Kings Room">Kings Room</option>
                    <?php elseif ($kamar["tipe_kamar"] === "Kings Room") : ?>
                        <option value="Delux">Delux</option>
                        <option value="Suite">Suite</option>
                        <option value="Kings Room" selected>Kings Room</option>
                    <?php endif; ?>
                </select>
            </li>
            <li>
                <label for="tipe-ranjang">Tipe-ranjang</label>
                <select name="tipe-ranjang" id="tipe-ranjang">
                    <?php if ($kamar["tipe_ranjang"] === "double bed") : ?>
                        <option value="double bed" selected>double bed</option>
                        <option value="single bed">single bed</option>
                        <option value="king bed">king bed</option>
                    <?php elseif ($kamar["tipe_ranjang"] === "single bed") : ?>
                        <option value="double bed">double bed</option>
                        <option value="single bed" selected>single bed</option>
                        <option value="king bed">king bed</option>
                    <?php elseif ($kamar["tipe_ranjang"] === "king bed") : ?>
                        <option value="double bed">double bed</option>
                        <option value="single bed">single bed</option>
                        <option value="king bed" selected>king bed</option>
                    <?php endif; ?>
                </select>
            </li>
            <li>
                <label for='no-kam'>nomor kamar</label>
                <input type='number' class='no-kam' name='no-kam' value="<?= $kamar["nomor_kamar"]; ?>">
            </li>
            <li>
                <label for='harga'>Harga</label>
                <input type='text' class='harga' name='harga' value="<?= $kamar["harga"]; ?>">
            </li>
            <li>
                <label for="fasilitas">Fasilitas</label>
                <textarea name="fasilitas" id="fasilitas" cols="30" rows="10"><?= $kamar["fasilitas"]; ?></textarea>
            </li>
            <li>
                <label for='status'>Status</label>
                <select name="status" id="status">
                    <?php if ($kamar['status'] === "TIDAKISI") : ?>
                        <option value="TIDAKISI" selected>TIDAKISI</option>
                        <option value="ISI">ISI</option>
                    <?php elseif ($kamar["status"] === "ISI") : ?>
                        <option value="TIDAKISI">TIDAKISI</option>
                        <option value="ISI" selected>ISI</option>
                    <?php endif; ?>
                </select>
            </li>
            <button type="submit" name="Kamar">masukan</button>
        </ul>
        <a href="admin.php">kembali ke halaman admin</a>
    </form>
    <!-- edit kamar end -->

</body>

</html>