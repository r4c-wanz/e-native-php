<?php
session_start();

function addAlert ($title, $message, $type) {
    $_SESSION['alert'] = array(
        'title' => $title,
        'message' => $message,
        'type' => $type,
        'timestamp' => time()
    );
}

if (!isset($_SESSION['auth'])) {
    addAlert('Belum login!', 'Anda belum melakukan login, silahkan login terlebih dahulu.', 'warning');

    header('location: ../');
} else {
    if ($_SESSION['auth']['role'] !== $role) {
        addAlert('Dilarang masuk!', 'Maaf, Anda tidak memiliki akses ke halaman ini.', 'danger');

        header('location: ../');
    } else {
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
    }
}
?>