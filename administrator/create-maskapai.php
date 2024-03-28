<?php
$role = 'Administrator';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Tambah Data Maskapai';

if (isset($_POST['submit'])) {
    $nama_maskapai = $_POST['nama_maskapai'];
    $kapasitas = $_POST['kapasitas'];

    $ekstensi_diperbolehkan = array('svg', 'png', 'jpg', 'jpeg');
    $logo_maskapai = $_FILES['logo_maskapai']['name'];
    $x = explode('.', $logo_maskapai);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['logo_maskapai']['size'];
    $file_tmp = $_FILES['logo_maskapai']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 300000) {
            move_uploaded_file($file_tmp, '../gambar/unggah/' . $logo_maskapai);

            $query = mysqli_query($host, "INSERT INTO  maskapai (`logo_maskapai` ,`nama_maskapai` ,`kapasitas`) VALUES ('$logo_maskapai' ,'$nama_maskapai' ,'$kapasitas')");

            if ($query) {
                $_SESSION['message'] = array(
                    'text' => 'Data maskapai berhasil dibuat.',
                    'status' => 'success',
                    'timestamp' => time()
                );

                header('location: ./');
            } else {
                $_SESSION['message'] = array(
                    'text' => 'Data maskapai gagal dibuat.',
                    'status' => 'success',
                    'timestamp' => time()
                );

                header("Refresh:0");
            }
        } else {
            $_SESSION['message'] = array(
                'text' => 'File terlalu besar.',
                'status' => 'warning',
                'timestamp' => time()
            );

            header("Refresh:0");
        }
    } else {
        $_SESSION['message'] = array(
            'text' => 'Format file ini tidak diperbolehkan.',
            'status' => 'warning',
            'timestamp' => time()
        );

        header("Refresh:0");
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
                    Tambah Data Maskapai
                </h1>
                <form method="post" enctype="multipart/form-data" class="space-y-4 md:space-y-6">
                    <div>
                        <label for="logo_maskapai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo Maskapai</label>
                        <input type="file" name="logo_maskapai" id="logo_maskapai"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" accept=".svg, .png, .jpg, .gif" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                            JPEG (MAX. 300KB).</p>
                    </div>
                    <div>
                        <label for="nama_maskapai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Maskapai</label>
                        <input type="nama_maskapai" name="nama_maskapai" id="nama_maskapai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Maskapai" required>
                    </div>
                    <div>
                        <label for="kapasitas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                        <input type="text" name="kapasitas" id="kapasitas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="123" required>
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