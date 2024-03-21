<?php
session_start();
include '../config.php';
if ($id = $_GET['id_user']) {
    $query = mysqli_query($host, "DELETE FROM user WHERE id_user = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data user berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data user gagal dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
} elseif ($id = $_GET['id_order_detail']) {
    $query = mysqli_query($host, "DELETE FROM order_detail WHERE id_order_detail = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data order detail berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data order detail gagal dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
} elseif ($id = $_GET['id_order_tiket']) {
    $query = mysqli_query($host, "DELETE FROM order_tiket WHERE id_order_tiket = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data order tiket berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data order tiket gagal dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
} elseif ($id = $_GET['id_jadwal']) {
    $query = mysqli_query($host, "DELETE FROM jadwal_penerbangan WHERE id_jadwal = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data jadwal penerbangan berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data jadwal gagal berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
} elseif ($id = $_GET['id_rute']) {
    $query = mysqli_query($host, "DELETE FROM rute WHERE id_rute = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data rute berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data rute gagal dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
} elseif ($id = $_GET['id_maskapai']) {
    $query = mysqli_query($host, "DELETE FROM maskapai WHERE id_maskapai = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data maskapai berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data maskapai gagal dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
} elseif ($id = $_GET['id_kota']) {
    $query = mysqli_query($host, "DELETE FROM kota WHERE id_kota = '$id'");

    if ($query) {
        $toast = array(
            'message' => 'Data kota berhasil dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    } else {
        $toast = array(
            'message' => 'Data kota gagal dihapus.',
            'status' => 'danger',
            'timestamp' => time()
        );

        if (!isset($_SESSION['toast'])) {
            $_SESSION['toast'] = array();
        }

        $_SESSION['toast'][] = $toast;
    }

    header('location: ./');
}