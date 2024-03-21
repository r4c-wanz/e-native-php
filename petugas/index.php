<?php
$role = 'Petugas';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Halaman Petugas';

$data_rute = mysqli_query($host, "SELECT * FROM rute");

$jadwal_penerbangan = mysqli_query($host, "SELECT * FROM jadwal_penerbangan");

ob_start();

include './tata-letak/navbar.php';
?>
<section class="h-screen pt-24">
    <div class="max-w-[1248px] mx-auto p-4 shadow sm:rounded-lg">
        <h1 class="text-xl font-bold">Halo Petugas
            <?= $nama_lengkap ?>, selamat datang!
        </h1>
    </div>
</section>
<?php
$content = ob_get_clean();
include '../tata-letak/template.php';
?>