<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "1234") {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../imagenes.php");
            exit();
        } else {
            header("Location: ../index.php");
        }
    }
?>
