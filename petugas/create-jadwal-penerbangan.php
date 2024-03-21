<?php
session_start();
include '../config.php';
if (isset($_POST['submit'])) {
    $id_rute = $_POST['id_rute'];
    $waktu_berangakat = $_POST['waktu_berangakat'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $harga = $_POST['harga'];

    $query = mysqli_query($host, "INSERT INTO  jadwal_penerbangan (`id_rute` ,`waktu_berangakat` ,`waktu_tiba` ,`harga`) VALUES ('$id_rute' ,'$waktu_berangakat' ,'$waktu_tiba' ,'$harga')");

    if ($query) {
        $_SESSION['message'] = 'Data jadwal penerbangan berhasil dibuat! silahkan periksa kembali untuk memastikan';

        header('location: ./index.php');
    } else {
        $_SESSION['message'] = 'Data jadwal penerbangan gagal dibuat! silahkan periksa kembali data yang anda masukan';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jadwal Penerbangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1>Tambah Data Jadwal Penerbangan</h1>
    <form method="post">
        <div>
            <label for="id_rute">Id Rute</label>
            <input type="number" name="id_rute" id="id_rute" required>
        </div>
        <div>
            <label for="waktu_berangakat">Waktu Berangkat</label>
            <input type="text" name="waktu_berangakat" id="waktu_berangakat" required>
        </div>
        <div>
            <label for="waktu_tiba">Waktu Tiba</label>
            <input type="text" name="waktu_tiba" id="waktu_tiba" required>
        </div>
        <div>
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Tambah Data">
        </div>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>