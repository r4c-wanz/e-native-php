<?php
$role = 'Admin';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Tambah Data User';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $roles = $_POST['roles'];

    $query = mysqli_query($host, "INSERT INTO  user (`username` ,`nama_lengkap` ,`password` ,`roles`) VALUES ('$username' ,'$nama_lengkap' ,'$password' ,'$roles')");

    if ($query) {
        $toast = array(
            'message' => 'Akun berhasil didaftarkan.',
            'status' => 'success',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;

        header('location:'.$_SERVER['HTTP_REFERER']);
    } else {
        $toast = array(
            'message' => 'Akun gagal didaftarkan.',
            'status' => 'warning',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
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
                    Tambah Data User
                </h1>
                <form method="post" class="space-y-4 md:space-y-6">
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="username" required>
                    </div>
                    <div>
                        <label for="nama_lengkap"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div>
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select name="roles" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" selected>Pilih role</option>
                            <option value="Penumpang">Penumpang</option>
                            <option value="Petugas">Petugas</option>
                            <option value="Admin">Admin</option>
                        </select>
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
$top = '5'; // rem
include '../komponen/toast.php';
$content = ob_get_clean();
include '../tata-letak/template.php';
?>