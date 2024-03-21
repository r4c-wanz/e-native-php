<?php
include './config.php';
include './auth-check.php';

$pageTitle = 'Register | E-Ticketing';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $roles = $_POST['roles'];

    $query = mysqli_query($host, "INSERT INTO user (`username`,`nama_lengkap`,`password`,`roles`) VALUES ('$username','$nama_lengkap','$password','$roles')");

    if ($query) {
        $_SESSION['auth'] = array(
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'role' => $roles
        );

        if ($roles === 'Penumpang') {
            header('location: ./penumpang');
        } elseif ($roles === 'Petugas') {
            header('location: ./petugas');
        } elseif ($roles === 'Admin') {
            header('location: ./admin');
        } else {
            $_SESSION['validation'] = array(
                'text' => 'Register gagal.',
                'status' => 'warning'
            );

            header("Refresh:0");
        }
    } else {
        $_SESSION['validation'] = array(
            'text' => 'Register gagal.',
            'status' => 'warning'
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
                    Buat akun
                </h1>
                <form class="space-y-4 md:space-y-6" method="post">
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="username" required="">
                    </div>
                    <div>
                        <label for="nama_lengkap"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>
                    <div>
                        <label for="penumpang"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                        <ul
                            class="items-center w-full text-sm font-medium text-gray-900 bg-gray-50 border border-gray-300 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="penumpang" type="radio" value="Penumpang" name="roles"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                        required>
                                    <label for="penumpang"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penumpang</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="petugas" type="radio" value="Petugas" name="roles"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="petugas"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Petugas</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button type="submit" name="register"
                        class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                        an account</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Sudah punya akun? <a href="./login.php"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login di
                            sini.</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include './tata-letak/template.php';
?>