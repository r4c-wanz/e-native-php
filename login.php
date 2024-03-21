<?php
include './config.php';
include './auth-check.php';

$pageTitle = 'Login | E-Ticketing';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($host, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);

        if ($data['roles'] === 'Penumpang') {
            $_SESSION['auth'] = array(
                'username' => $data['username'],
                'nama_lengkap' => $data['nama_lengkap'],
                'role' => $data['roles']
            );

            header('location: ./penumpang');
        } elseif ($data['roles'] === 'Petugas') {
            $_SESSION['auth'] = array(
                'username' => $data['username'],
                'nama_lengkap' => $data['nama_lengkap'],
                'role' => $data['roles']
            );

            header('location: ./petugas');
        } elseif ($data['roles'] === 'Admin') {
            $_SESSION['auth'] = array(
                'username' => $data['username'],
                'nama_lengkap' => $data['nama_lengkap'],
                'role' => $data['roles']
            );

            header('location: ./admin');
        } else {
            $_SESSION['validation'] = array(
                'text' => 'Login gagal.',
                'status' => 'warning'
            );
        }
    } else {
        $_SESSION['validation'] = array(
            'text' => 'Akun tidak dapat ditemukan.',
            'status' => 'danger'
        );
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
                    Masuk ke akun Anda
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
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>
                    <button type="submit" name="login"
                        class="w-full text-white !bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                        in</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Belum punya akun? <a href="register.php"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Daftar di
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