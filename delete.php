<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

    if (isset($_GET['file'])) {
        $file = $_GET['file'];
        unlink($file);
    }

    header("Location: imagenes.php");
?>
