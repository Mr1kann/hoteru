<?php 

session_start();
error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "root", "", "hotel");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($post) {
    global $conn;
    $nama = $post["nama"];
    $nomortlp = $post["nomortlp"];
    $email = $post["email_reg"];
    $password = $post["password_reg"];
    $level = $post["level"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($result)) {
        echo "<script>
                alert('Email sudah terdaftar, gunakan email lain!');
                document.location.href = 'register.php';
            </script>";
            return false;
    }

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama', '$nomortlp', '$email', '$password', '$level')");
    if (mysqli_affected_rows($conn) == 1) {
        echo "
                <script>
                    alert('Regristrasi Berhasil');
                    document.location.href = 'login.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Regristrasi gagal');
                    document.location.href = 'register.php';
                </script>
            ";
    }
}

function login($post){
    global $conn;
    $email = $post['email'];
    $password = $post['password'];
    
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND pass='$password'");
    // $cek = mysqli_num_rows($query);
    
    $rows = mysqli_fetch_assoc($query);
    $pass = $rows["pass"];
    $level = $rows["level"];
    $id_user = $rows["id_user"];

    if ($pass == $password) {
        $_SESSION["level"] = $level;
        $_SESSION["login"] = $id_user;

        if($level == "user") {
            echo "
                <script>
                    alert('login telah berhasil');
                    document.location.href = 'index.php';
                </script>
            ";
        }elseif ($level == "admin"){
            echo "
                <script>
                    alert('login telah berhasil');
                    document.location.href = 'admin.php';
                </script>
            ";
        }elseif($level == "resepsionis") {
            echo "
                <script>
                    alert('login telah berhasil');
                    document.location.href = 'resepsionis.php';
                </script>
            ";
        }
    }else {
        echo "
                <script>
                    alert('login telah gagal!');
                    document.location.href = 'login.php';
                </script>
            ";
    }
}

function addKamar($post){
    global $conn;
    $nomor_kamar = $post["no-kam"];
    $tipe_kamar = $post["tipe-kamar"];
    $tipe_ranjang = $post["tipe-ranjang"];
    $harga = $post["harga"];
    $fasilitas = faskam();
    $status = $post["status"];
    $gambar = upload()[0];
    $gambar2 = upload()[1];
    if(!$gambar && !$gambar2) {
        return false;
    }

    
    $query = "INSERT INTO rooms VALUES ('', '$nomor_kamar', '$tipe_kamar', '$tipe_ranjang', '$harga', '$fasilitas', '$gambar', '$gambar2', '$status')";
    mysqli_query($conn, $query);


    if ($query > 0) {
        echo "
                <script>
                    alert('Kamar Berhasil Di Tambahkan!');
                    document.location.href = 'admin.php';
                </script>
            ";
    }
}

function faskam(){
    $fasili = $_POST['fasilitas'];
    $hasil = implode(", " , $fasili);
    return $hasil;
}

function booking($post){
    global $conn;
    $id_user = $post["id_user"];
    $pemesan = $post["pemesan"];
    $nomor_telp = $post["no-telp"];
    $email = $post["email"];
    $tamu = $post["tamu"];
    $cek_in = $post["cek-in"];
    $cek_out = $post["cek-out"];
    $jumlah_kamar = $post["jumlah-kamar"];
    $tipe_kamar = $post["tipe-kamar"];
    $kode_booking = kode();

    // var_dump($id_user);
    // var_dump($pemesan);
    // var_dump($nomor_telp);
    // var_dump($email);
    // var_dump($tamu);
    // var_dump($cek_in);
    // var_dump($cek_out);
    // var_dump($jumlah_kamar);
    // var_dump($tipe_kamar);
    // var_dump($kode_booking);
    // die;



    mysqli_query($conn, "INSERT INTO booking VALUES('', '$id_user', '$pemesan', '$nomor_telp', '$email', '$tamu', '$cek_in', '$cek_out', '$jumlah_kamar', '$tipe_kamar', '$kode_booking')");
    if (mysqli_affected_rows($conn) == 1) {
        echo "
                <script>
                    alert('Book Berhasil');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Book gagal');
                    document.location.href = 'index.php';
                </script>
            ";
    }

}

function upload(){
    $namaFile = $_FILES['gambar1']['name'];
    $ukuranFile = $_FILES['gambar1']['size'];
    $error = $_FILES['gambar1']['error'];
    $tempName = $_FILES['gambar1']['tmp_name'];
    $namaFile2 = $_FILES['gambar2']['name'];
    $ukuranFile2 = $_FILES['gambar2']['size'];
    $error2 = $_FILES['gambar2']['error'];
    $tempName2 = $_FILES['gambar2']['tmp_name'];

    //cek ada gambar atau tidak
    if($error === 4 && $error2 === 4){
        echo "<script>
                alert('Masukan Gambar');
            </script>";
        return false;
    }

    //cek file yg di upload gambar atau tdk
    $validGambar = ['jpg', 'jpeg', 'png'];
    // memecah nama file untuk mengambil ekstensi nama file menjadi sebuah array
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar2 = explode('.', $namaFile2);
    //memastikan mengambil nama extensi gambar
    //dan mengubah ekstensi nama file menjadi lower case
    $extensiGambar = strtolower(end($extensiGambar));
    $extensiGambar2 = strtolower(end($extensiGambar2));
    //cek apakah ekstensi file gambar tersedia
    if(!in_array($extensiGambar, $validGambar) && in_array($extensiGambar2, $validGambar)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
            </script>";
        return false;
    }

    //membatasi ukuran gambar yang di upload
    if($ukuranFile > 5000000 && $ukuranFile2 > 5000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    //lolos cek, gambar di upload
    move_uploaded_file($tempName, 'img/room2/' . $namaFile);
    move_uploaded_file($tempName2, 'img/room2/' . $namaFile2);
    return array($namaFile, $namaFile2);

}

function addFasilitas($post){
    global $conn;
    $nama_fasilitas = $post["namafas"];
    $desk = $post["deskripsi"];

    $query = "INSERT INTO fasilitas VALUES ('', '$nama_fasilitas', '$desk')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

    if ($query > 0) {
        echo "
                <script>
                    alert('Berhasil!');
                    document.location.href = 'admin.php';
                </script>
            ";
    }
}

function rubahKamar($post){
    global $conn;
    $id = $post["id_kamar"];
    $nomor_kamar = $post["no-kam"];
    $tipe_kamar = $post["tipe-kamar"];
    $tipe_ranjang = $post["tipe-ranjang"];
    $harga = $post["harga"];
    $fasilitas = $post["fasilitas"];
    $status = $post["status"];

    $query = "UPDATE rooms SET nomor_kamar='$nomor_kamar', tipe_kamar='$tipe_kamar', tipe_ranjang='$tipe_ranjang', harga='$harga', fasilitas='$fasilitas', status='$status' WHERE id_kamar = $id";
    mysqli_query($conn, $query);

    if ($query > 0) {
        echo "
                <script>
                    alert('Berhasil!');
                    document.location.href = 'admin.php';
                </script>
            ";
    }
}

function rubahFasilitas($post){
    global $conn;
    $id = $post["id_fas"];
    $nama_fasilitas = $post["namafas"];
    $desk = $post["deskripsi"];

    $query = "UPDATE fasilitas SET nama_fasilitas = '$nama_fasilitas', deskripsi = '$desk' WHERE id_fas = '$id'";
    mysqli_query($conn, $query);

    if ($query > 0) {
        echo "
                <script>
                    alert('Berhasil!');
                    document.location.href = 'admin.php';
                </script>
            ";
    }
}

function kode($numDigits = 6)
{
    $digits = '';

    for (
        $i = 0;
        $i < $numDigits;
        ++$i
    ) {
        $digits .= mt_rand(0, 9);
    }

    return $digits;
}

function findrow($query, $row)
{
    global $conn;
    $table = mysqli_query($conn, $query);
    $colom = mysqli_fetch_assoc($table);
    if(mysqli_num_rows($table) == 1) {
        $rows = $colom[$row];
    } else {
        $rows = false;
    }
    return $rows;
}


?>