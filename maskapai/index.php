<?php
$role = 'Maskapai';
include '../auth-role-check.php';
include '../config.php';

$path = $_SERVER['SCRIPT_FILENAME'];

$folder_name = '/' . explode('/', $path)[3];

$pageTitle = 'Halaman Admin';

$data_petugas_maskapai = mysqli_query($host, "SELECT * FROM user WHERE roles = 'maskapai' AND maskapai_id = 1");

ob_start();

include './tata-letak/navbar.php';
?>
<section class="h-screen pt-24">
    <div class="max-w-[1248px] mx-auto p-4 shadow sm:rounded-lg">
        <h1 class="text-xl font-bold">Halo Maskapai
            <?= $nama_lengkap ?>, selamat datang!
        </h1>
    </div>

    <div class="mt-5 mx-auto max-w-[1248px] p-4 shadow sm:rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold">Data Petugas Maskapai</h1>
            <a href="create-petugas.php"
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
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($data_petugas_maskapai) > 0):
                    foreach ($data_petugas_maskapai as $data):
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
                                <a href="edit.php?id_petugas_maskapai=<?= $data['id_user'] ?>"
                                class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit</a>
                                <a href="delete.php?id_petugas_maskapai=<?= $data['id_user'] ?>"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                else:
                    ?>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th colspan="4" scope="row"
                            class="px-6 py-4 font-medium text-gray-100 whitespace-nowrap dark:text-white text-center">
                            Data kosong
                        </th>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</section>

<?php if (isset($_SESSION['toast']) && (time() - $_SESSION['toast']['time'] < 5)): ?>
    <div id="toast" class="fixed top-24 right-5 translate-x-[calc(100%+5rem)] z-50 w-80 shadow duration-700 ease-in-out">
        <?php include '../komponen/toast.php' ?>
    </div>
    <?php
endif;
$content = ob_get_clean();
include '../tata-letak/template.php';
?>