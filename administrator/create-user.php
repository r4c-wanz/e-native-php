<?php
$role = 'Administrator';
include '../auth-role-check.php';
include '../config.php';

$pageTitle = 'Tambah Data User';

function addToast($message, $type)
{
    $_SESSION['toast'] = array(
        'message' => $message,
        'type' => $type,
        'time' => time()
    );
}

include '../data-user/create.php';

include '../tata-letak/template.php';
?>