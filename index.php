<?php
session_start();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth']['role'] === 'Administrator') {
        header('location: ./administrator');
    } elseif ($_SESSION['auth']['role'] === 'Maskapai') {
        header('location: ./maskapai');
    }
}

$path = $_SERVER['SCRIPT_FILENAME'];

$folder_name = '/' . explode('/', $path)[3];

include './config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($host, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);

        if ($data['roles'] === 'Pelanggan') {
            $_SESSION['auth'] = array(
                'username' => $data['username'],
                'nama_lengkap' => $data['nama_lengkap'],
                'role' => $data['roles']
            );

            function takeFirstLetter($nama_lengkap)
            {
                $words = explode(" ", $nama_lengkap);
                $inisial_nama = "";

                foreach ($words as $word) {
                    $inisial_nama .= substr($word, 0, 1);
                }

                return $inisial_nama;
            }

            $nama_lengkap = $_SESSION['auth']['nama_lengkap'];
            $inisial_nama = takeFirstLetter($nama_lengkap);
            $username = $_SESSION['auth']['username'];
        } elseif ($data['roles'] === 'Maskapai') {
            $_SESSION['auth'] = array(
                'username' => $data['username'],
                'nama_lengkap' => $data['nama_lengkap'],
                'role' => $data['roles']
            );

            header('location: ./maskapai');
        } elseif ($data['roles'] === 'Administrator') {
            $_SESSION['auth'] = array(
                'username' => $data['username'],
                'nama_lengkap' => $data['nama_lengkap'],
                'role' => $data['roles']
            );

            header('location: ./administrator');
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
<nav class="fixed left-0 top-0 right-0 z-40 bg-white border-gray-200 dark:bg-gray-900 shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="<?= $folder_name ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">E-Ticketing</span>
        </a>
        <?php if (!isset($_SESSION['auth'])): ?>
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="border border-gray-700 hover:border-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:border-gray-600 dark:hover:border-gray-700 dark:focus:ring-gray-800"
                type="button">
                Login
            </button>
        <?php else: ?>
            <?php if ($_SESSION['auth']['role'] === 'Pelanggan'): ?>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm font-semibold rounded md:me-0 p-1" id="user-menu-button"
                        aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <div class="relative">
                            <div
                                class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">
                                    <?= $inisial_nama ?>
                                </span>
                            </div>
                            <span
                                class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                        </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="min-w-32 z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>
                                <?= $nama_lengkap ?>
                            </div>
                            <div class="font-medium truncate">@
                                <?= $username ?>
                            </div>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="./"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <!-- <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                    </li> -->
                            <li>
                                <a href="./logout.php"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="page">Data Petugas</a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?= $_SESSION['auth']['role'] === 'Administrator' ? 'administrator' : 'maskapai' ?>"
                    class="border border-gray-700 hover:border-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:border-gray-600 dark:hover:border-gray-700 dark:focus:ring-gray-800">Dashboard</a>
            <?php endif ?>
        <?php endif ?>
    </div>
</nav>

<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Sign in to our platform
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form method="post" class="space-y-4">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            username</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="username" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <button type="submit" name="login"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                        to your account</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include './komponen/alert.php';
$content = ob_get_clean();
include './tata-letak/template.php';
?>