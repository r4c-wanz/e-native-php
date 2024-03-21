<?php
$role = 'Admin';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Tambah Data Rute';

$additionalScripts = [dirname(dirname($_SERVER['PHP_SELF'])) . '/node_modules/flowbite/dist/datepicker.min.js'];

$data_maskapai = mysqli_query($host, "SELECT * FROM maskapai");

$data_kota = mysqli_query($host, "SELECT * FROM kota");

if (isset ($_POST['submit'])) {
    $id_maskapai = $_POST['id_maskapai'];
    $rute_asal = $_POST['rute_asal'];
    $rute_tujuan = $_POST['rute_tujuan'];
    $tanggal_pergi = $_POST['tanggal_pergi'];

    $query = mysqli_query($host, "INSERT INTO rute (`id_maskapai` ,`rute_asal` ,`rute_tujuan` ,`tanggal_pergi`) VALUES ('$id_maskapai' ,'$rute_asal' ,'$rute_tujuan' ,STR_TO_DATE('$tanggal_pergi','%m/%d/%Y'))");

    if ($query) {
        $_SESSION['message'] = 'Data rute berhasil dibuat! silahkan periksa kembali untuk memastikan';

        header('location: ./index.php');
    } else {
        $_SESSION['message'] = 'Data rute gagal dibuat! silahkan periksa kembali data yang anda masukan';
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
                    Tambah Data Rute
                </h1>
                <form class="space-y-4 md:space-y-6" method="post">
                    <div>
                        <label for="id_maskapai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Maskapai</label>
                        <select name="id_maskapai" id="id_maskapai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" selected>Pilih maskapai</option>
                            <?php foreach ($data_maskapai as $data): ?>
                                <option value="<?= $data['id_maskapai'] ?>">
                                    <?= $data['nama_maskapai'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="rute_asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rute
                            Asal</label>
                        <select name="rute_asal" id="rute_asal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" selected>Pilih kota</option>
                            <?php foreach ($data_kota as $data): ?>
                                <option value="<?= $data['nama_kota'] ?>">
                                    <?= $data['nama_kota'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="rute_tujuan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rute Tujuan</label>
                        <select name="rute_tujuan" id="rute_tujuan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" selected>Pilih kota</option>
                            <?php foreach ($data_kota as $data): ?>
                                <option value="<?= $data['nama_kota'] ?>">
                                    <?= $data['nama_kota'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal_pergi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pergi</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-buttons datepicker-autoselect-today type="text"
                                name="tanggal_pergi" id="tanggal_pergi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>
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
$content = ob_get_clean();
include '../tata-letak/template.php';
?>