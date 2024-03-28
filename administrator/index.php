<?php
$role = 'Administrator';
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
                            <!-- <a href="edit.php?id_user=<?= $data['id_user'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a> -->
                            <!-- <a href="delete.php?id_user=<?= $data['id_user'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a> -->
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600"
                                type="button">
                                Edit
                            </button>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                Delete
                            </button>
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
                            <?= date("d-m-Y", strtotime($data['tanggal_pergi'])) ?>
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
                            Rp
                            <?= number_format($data['harga'], 2, ",", ".") ?>
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

<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full duration-700 ease-in-out">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                    this product?</h3>
                <button data-modal-hide="popup-modal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>

<?php if (isset ($_SESSION['toast']) && (time() - $_SESSION['toast']['time'] < 5)): ?>
    <div id="toast" class="fixed top-24 right-5 translate-x-[calc(100%+5rem)] z-50 w-80 shadow duration-700 ease-in-out">
        <?php include '../komponen/toast.php' ?>
    </div>
    <?php
endif;
$content = ob_get_clean();
include '../tata-letak/template.php';
?>