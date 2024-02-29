<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    }

    if (isset($_POST['upload'])) {
        $fileName = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $fileActualExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'avif', 'webp');

        $params = '';
        $maxSizeInBytes = 1000000;
        if (in_array($fileActualExt, $allowed)) {
            if ($_FILES['image']['error'] > 0) {
                $params = '?error=uploaderror';
            } else if (file_exists('../img/' . $fileName)) {
                $params = '?error=exists';
            }  else if ($fileSize >= $maxSizeInBytes) { 
                $params = '?error=bigfile';
            } else {
                move_uploaded_file($temp, '../img/' . $fileName);
                $params = '?upload=success';
            }
        } else {
            $params = '?error=invalidtype';
        }

        header("Location: ../imagenes.php$params");
    }
?>
