<?php
$role = 'Admin';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Halaman Admin';

$data_petugas = mysqli_query($host, "SELECT * FROM user WHERE roles = 'Petugas'");

$data_users = mysqli_query($host, "SELECT * FROM user");

$data_maskapai = mysqli_query($host, "SELECT * FROM maskapai");

$data_kota = mysqli_query($host, "SELECT * FROM kota");

$data_rute = mysqli_query($host, "SELECT rute.*, maskapai.nama_maskapai FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");

$jadwal_penerbangan = mysqli_query($host, "SELECT * FROM jadwal_penerbangan");

ob_start();

include './tata-letak/navbar.php';
?>
<section class="h-screen pt-24">
    <div class="max-w-[1248px] mx-auto p-4 shadow sm:rounded-lg">
        <h1 class="text-xl font-bold">Halo Admin
            <?= $nama_lengkap ?>, selamat datang!
        </h1>
    </div>

    <div class="mt-5 mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <h1 class="text-xl font-bold">Data Petugas</h1>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_petugas as $data):
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $data['username'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['nama_lengkap'] ?>
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <a href="edit.php?id_user=<?= $data['id_user'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                            <a href="delete.php?id_user=<?= $data['id_user'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<section id="data-user" class="h-screen pt-24">
    <div class="mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold">Data User</h1>
            <a href="create-user.php"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                Data</a>
        </div>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_users as $data):
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $data['username'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['nama_lengkap'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['roles'] ?>
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <a href="edit.php?id_user=<?= $data['id_user'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                            <a href="delete.php?id_user=<?= $data['id_user'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<section id="data-maskapai" class="h-screen pt-24">
    <div class="mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold">Data Maskapai</h1>
            <a href="create-maskapai.php"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                Data</a>
        </div>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Logo Maskapai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Maskapai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kapasitas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_maskapai as $data):
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <img src="/lsp-tiket/gambar/unggah/<?= $data['logo_maskapai'] ?>" alt="Logo Maskapai"
                                width="200">
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['nama_maskapai'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['kapasitas'] ?>
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <a href="edit.php?id_maskapai=<?= $data['id_maskapai'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                            <a href="delete.php?id_maskapai=<?= $data['id_maskapai'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<section id="data-kota" class="h-screen pt-24">
    <div class="mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold">Data Kota</h1>
            <a href="create-kota.php"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                Data</a>
        </div>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Kota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_kota as $data):
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $data['nama_kota'] ?>
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <a href="edit.php?id_kota=<?= $data['id_kota'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                            <a href="delete.php?id_kota=<?= $data['id_kota'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<section id="data-rute" class="h-screen pt-24">
    <div class="mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold">Data Rute</h1>
            <a href="create-rute.php"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                Data</a>
        </div>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Maskapai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rute Asal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rute Tujuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pergi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_rute as $data):
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $data['nama_maskapai'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['rute_asal'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['rute_tujuan'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $data['tanggal_pergi'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="edit.php?id_rute=<?= $data['id_rute'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                            <a href="delete.php?id_rute=<?= $data['id_rute'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<section id="data-jadwal-penerbangan" class="h-screen pt-24">
    <div class="mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold">Data Jadwal Penerbangan</h1>
            <a href="create-jadwal-penerbangan.php"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                Data</a>
        </div>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id Rute
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Berangkat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Tiba
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jadwal_penerbangan as $data):
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $data['id_rute'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= date('H.i', strtotime($data['waktu_berangkat'])) ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= date('H.i', strtotime($data['waktu_tiba'])) ?>
                        </td>
                        <td class="px-6 py-4">
                            Rp <?= number_format($data['harga'], 2, ",", ".") ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="edit.php?id_jadwal=<?= $data['id_jadwal'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                            <a href="delete.php?id_jadwal=<?= $data['id_jadwal'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?php
include '../komponen/toast.php';
include '../komponen/alert.php';
$content = ob_get_clean();
include '../tata-letak/template.php';
?>