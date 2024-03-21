<?php
session_start();
include '../config.php';
if (isset($_POST['submit'])) {
    $id_maskapai = $_POST['id_maskapai'];
    $rute_asal = $_POST['rute_asal'];
    $rute_tujuan = $_POST['rute_tujuan'];
    $tanggal_pergi = $_POST['tanggal_pergi'];

    $query = mysqli_query($host, "INSERT INTO  rute (`id_maskapai` ,`rute_asal` ,`rute_tujuan` ,`tanggal_pergi`) VALUES ('$id_maskapai' ,'$rute_asal' ,'$rute_tujuan' ,'$tanggal_pergi')");

    if ($query) {
        $_SESSION['message'] = 'Data rute berhasil dibuat! silahkan periksa kembali untuk memastikan';

        header('location: ./index.php');
    } else {
        $_SESSION['message'] = 'Data rute gagal dibuat! silahkan periksa kembali data yang anda masukan';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Rute</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1>Tambah Data Rute</h1>
    <form method="post">
        <div>
            <label for="id_maskapai">Id Maskapai</label>
            <input type="number" name="id_maskapai" id="id_maskapai" required>
        </div>
        <div>
            <label for="rute_asal">Rute Asal</label>
            <input type="text" name="rute_asal" id="rute_asal" required>
        </div>
        <div>
            <label for="rute_tujuan">Rute Tujuan</label>
            <input type="text" name="rute_tujuan" id="rute_tujuan" required>
        </div>
        <div>
            <label for="tanggal_pergi">Tanggal Pergi</label>
            <input type="date" name="tanggal_pergi" id="tanggal_pergi" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Tambah Data">
        </div>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>