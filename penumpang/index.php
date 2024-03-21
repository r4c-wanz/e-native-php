<?php
$role = 'Penumpang';
include '../auth-role-check.php';
include '../config.php';
$pageTitle = 'Halaman Penumpang';
ob_start();
?>
<h1>Halo Penumpang <?= $nama_lengkap ?>, selamat datang!</h1>
<a href="../logout.php">Logout</a>
<?php
$content = ob_get_clean();
include '../tata-letak/template.php';
?>