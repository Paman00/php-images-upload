<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['upload'])) {
        $fileName = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $fileActualExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'avif', 'webp');

        if (in_array($fileActualExt, $allowed)) {
            if ($_FILES['image']['error'] > 0) {
                header("Location: imagenes.php?error=uploaderror");
            } else if (file_exists('./img/' . $fileName)) {
                header("Location: imagenes.php?error=exists");
            }  else if ($fileSize >= 1000000) {
                header("Location: imagenes.php?error=bigfile");
            } else {
                move_uploaded_file($temp, './img/' . $fileName);
                header("Location: imagenes.php?upload=success");
            }
        } else {
            header("Location: imagenes.php?error=invalidtype");
        }
    }
?>
