<?php
session_start();

if (!isset($_SESSION['auth'])) {
    $_SESSION['alert'] = array(
        'title' => 'Belum login!',
        'message' => 'Anda belum melakukan login, silahkan login terlebih dahulu.',
        'type' => 'warning',
        'timestamp' => time()
    );

    header('location: ../');
} else {
    if ($_SESSION['auth']['role'] !== $role) {
        $_SESSION['alert'] = array(
            'title' => 'Dilarang masuk!',
            'message' => "Maaf, Anda tidak memiliki akses ke halaman ini.",
            'type' => 'danger',
            'timestamp' => time()
        );

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