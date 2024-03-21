<?php
function addToast($message, $type)
{
    $_SESSION['toast'] = array(
        'message' => $message,
        'type' => $type,
        'time' => time()
    );
}
