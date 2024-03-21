<?php
$role = 'Admin';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Tambah Data Jadwal Penerbangan';

$data_rute = mysqli_query($host, "SELECT * FROM rute");

if (isset ($_POST['submit'])) {
    $id_rute = $_POST['id_rute'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $harga = $_POST['harga'];

    $query = mysqli_query($host, "INSERT INTO  jadwal_penerbangan (`id_rute` ,`waktu_berangkat` ,`waktu_tiba` ,`harga`) VALUES ('$id_rute' ,'$waktu_berangkat' ,'$waktu_tiba' ,'$harga')");

    if ($query) {
        $_SESSION['message'] = 'Data jadwal penerbangan berhasil dibuat! silahkan periksa kembali untuk memastikan';

        header('location: ./index.php');
    } else {
        $_SESSION['message'] = 'Data jadwal penerbangan gagal dibuat! silahkan periksa kembali data yang anda masukan';
    }
}

ob_start();
?>
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="./" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <!-- <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo"> -->
            E-Ticketing
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Tambah Data Kota
                </h1>
                <form method="post" class="space-y-4 md:space-y-6">
                    <div>
                        <label for="id_rute" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id
                            Rute</label>
                        <select name="id_rute" id="id_rute"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" selected>Pilih id rute</option>
                            <?php foreach ($data_rute as $data): ?>
                                <option value="<?= $data['id_rute'] ?>">
                                    <?= $data['id_rute'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="waktu_berangkat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Berangkat</label>
                        <input type="time" name="waktu_berangkat" id="waktu_berangkat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div>
                        <label for="waktu_tiba"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Tiba</label>
                        <input type="time" name="waktu_tiba" id="waktu_tiba"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div>
                        <label for="harga"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input type="number" name="harga" id="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <button type="submit" name="submit"
                        class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Tambah
                        Data</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include '../komponen/toast.php';
$content = ob_get_clean();
include '../tata-letak/template.php';
?>