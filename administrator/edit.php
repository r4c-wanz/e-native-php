<?php
$role = 'Administrator';
include '../auth-role-check.php';
include '../config.php';

function addToast($message, $type)
{
    $_SESSION['toast'] = array(
        'message' => $message,
        'type' => $type,
        'time' => time()
    );
}


if (isset($_GET['id_user'])):
    $pageTitle = 'Edit Data User';

    $id = $_GET['id_user'];

    $data = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM user WHERE id_user = '$id'"));

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $password = $_POST['password'];
        $roles = $_POST['roles'];

        $query = mysqli_query($host, "UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap', password = '$password', roles = '$roles' WHERE id_user = '$id'");

        if ($query) {
            addToast("Akun berhasil diedit.", "success");

            header('location: ./');

            exit();
        } else {
            addToast("Akun gagal diedit.", "warning");
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
                        Edit Data User
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="username" value="<?= $data['username'] ?>" required>
                        </div>
                        <div>
                            <label for="nama_lengkap"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Lengkap" value="<?= $data['nama_lengkap'] ?>" required>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••" value="<?= $data['password'] ?>" required>
                        </div>
                        <div>
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <select name="roles" id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option disabled>Pilih role</option>
                                <option value="Penumpang" <?= $data['roles'] === 'Penumpang' ? ' selected' : '' ?>>Penumpang
                                </option>
                                <option value="Petugas" <?= $data['roles'] === 'Petugas' ? ' selected' : '' ?>>Petugas</option>
                                <option value="Admin" <?= $data['roles'] === 'Admin' ? ' selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                        <button type="submit" name="submit"
                            class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include '../komponen/toast.php';
    $content = ob_get_clean();
elseif (isset($_GET['id_maskapai'])):
    $pageTitle = 'Edit Data Maskapai';

    $id = $_GET['id_maskapai'];

    $data = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM maskapai WHERE id_maskapai = '$id'"));

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

                $query = mysqli_query($host, "UPDATE maskapai SET logo_maskapai = '$logo_maskapai', nama_maskapai = '$nama_maskapai', kapasitas = '$kapasitas' WHERE id_maskapai = '$id'");

                if ($query) {
                    $_SESSION['toast'] = array(
                        'message' => 'Data maskapai berhasil diedit.',
                        'status' => 'success',
                        'timestamp' => time()
                    );

                    header('location: ./');
                } else {
                    $_SESSION['toast'] = array(
                        'message' => 'Data maskapai gagal diedit.',
                        'status' => 'success',
                        'timestamp' => time()
                    );

                    header("Refresh:0");
                }
            } else {
                $_SESSION['toast'] = array(
                    'message' => 'File terlalu besar.',
                    'status' => 'warning',
                    'timestamp' => time()
                );

                header("Refresh:0");
            }
        } else {
            $_SESSION['toast'] = array(
                'message' => 'Format file ini tidak diperbolehkan.',
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
                        Edit Data Maskapai
                    </h1>
                    <form method="post" enctype="multipart/form-data" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="logo_maskapai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo Maskapai</label>
                            <input type="file" name="logo_maskapai" id="logo_maskapai"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" accept=".svg, .png, .jpg, .gif">
                            <?php if (!empty($data['logo_maskapai'])): ?>
                                <img src="/lsp-rachel/gambar/unggah/<?= $data['logo_maskapai'] ?>" alt=""
                                    class="mx-auto mt-1 max-w-80 border-2 rounded-lg">
                            <?php endif; ?>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                                JPEG (MAX. 300KB).</p>
                        </div>
                        <div>
                            <label for="nama_maskapai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Maskapai</label>
                            <input type="nama_maskapai" name="nama_maskapai" id="nama_maskapai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Maskapai" value="<?= $data['nama_maskapai'] ?>" required>
                        </div>
                        <div>
                            <label for="kapasitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                            <input type="text" name="kapasitas" id="kapasitas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="123" value="<?= $data['kapasitas'] ?>" required>
                        </div>
                        <button type="submit" name="submit"
                            class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include '../komponen/toast.php';
    $content = ob_get_clean();
elseif (isset($_GET['id_kota'])):
    $pageTitle = 'Edit Data Kota';

    $id = $_GET['id_kota'];

    $data = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM kota WHERE id_kota = '$id'"));

    if (isset($_POST['submit'])) {
        $nama_kota = $_POST['nama_kota'];

        $query = mysqli_query($host, "UPDATE kota SET nama_kota = '$nama_kota' WHERE id_kota = '$id'");

        if ($query) {
            $_SESSION['toast'] = array(
                'message' => 'Data kota berhasil diedit.',
                'status' => 'success',
                'timestamp' => time()
            );

            header('location: ./');
        } else {
            $_SESSION['toast'] = array(
                'message' => 'Data kota gagal diedit.',
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
                        Edit Data Kota
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="nama_kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Kota</label>
                            <input type="text" name="nama_kota" id="nama_kota"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jakarta" value="<?= $data['nama_kota'] ?>" required>
                        </div>
                        <button type="submit" name="submit"
                            class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include '../komponen/toast.php';
    $content = ob_get_clean();
elseif (isset($_GET['id_jadwal'])):
    $pageTitle = 'Edit Data Kota';

    $id = $_GET['id_jadwal'];

    $data = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM jadwal_penerbangan WHERE id_jadwal = '$id'"));

    if (isset($_POST['submit'])) {
        $nama_kota = $_POST['nama_kota'];

        $query = mysqli_query($host, "UPDATE kota SET nama_kota = '$nama_kota' WHERE id_kota = '$id'");

        if ($query) {
            addToast('Data jadwal penerbangan berhasil diedit.', 'success');

            header('location: ./');
        } else {
            addToast('Data jadwal penerbangan gagal diedit.', 'warning');
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
                        Edit Data Kota
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="nama_kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Kota</label>
                            <input type="text" name="nama_kota" id="nama_kota"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jakarta" value="<?= $data['nama_kota'] ?>" required>
                        </div>
                        <button type="submit" name="submit"
                            class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include '../komponen/toast.php';
    $content = ob_get_clean();
endif;
include '../tata-letak/template.php';
?>