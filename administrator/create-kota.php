<?php
$role = 'Administrator';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Tambah Data Kota';

if (isset($_POST['submit'])) {
    $nama_kota = $_POST['nama_kota'];

    $query = mysqli_query($host, "INSERT INTO  kota (`nama_kota`) VALUES ('$nama_kota')");

    if ($query) {
        $_SESSION['message'] = 'Data kota berhasil dibuat! silahkan periksa kembali untuk memastikan';

        header('location: ./index.php');
    } else {
        $_SESSION['message'] = 'Data kota gagal dibuat! silahkan periksa kembali data yang anda masukan';
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
                        <label for="nama_kota"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kota</label>
                        <input type="text" name="nama_kota" id="nama_kota"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Jakarta" required>
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