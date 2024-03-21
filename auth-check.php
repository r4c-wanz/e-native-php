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

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth']['role'] === 'Penumpang') {
        addAlert('Sudah login!', 'Anda sudah melakukan login, tidak dapat mengakses halaman autentikasi kembali.', 'warning');

        header('location: ./penumpang');
    } elseif ($_SESSION['auth']['role'] === 'Petugas') {
        addAlert('Sudah login!', 'Anda sudah melakukan login, tidak dapat mengakses halaman autentikasi kembali.', 'warning');

        header('location: ./petugas');
    } elseif ($_SESSION['auth']['role'] === 'Admin') {
        addAlert('Sudah login!', 'Anda sudah melakukan login, tidak dapat mengakses halaman autentikasi kembali.', 'warning');

        header('location: ./admin');
    }
}
?>