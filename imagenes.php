<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir imágenes</title>
    <link rel="stylesheet" href="./main.css">
    <script type="module" src="./index.js" defer></script>
</head>
<body>
    <div id="alert" class="alert"></div>
    <h1>Upload imágenes</h1>
    <header>
        <section>
            <h4>Bienvenido, <?php echo $_SESSION['username']; ?></h4>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <button type="submit" name="upload" class="button">Subir</button>
            </form>
        </section>

        <a href="logout.php" class="button">Salir</a>
    </header>

    <div class="imgsContainer">
        <?php
            $dir = "./img";
            $images = scandir($dir);
            foreach ($images as $file) {
                if ($file != '@eaDir' && $file != '.' && $file != '..') {
                    echo "
                    <div class='imgDiv'>
                        <figure>
                            <img src='$dir/$file' alt='image'>
                        </figure>
                        <a class='imgName' href='$dir/$file'>$file</a>
                        <a href='./delete.php?file=$dir/$file' class='button deleteButton'>Eliminar</a>
                    </div>
                    ";
                }
            }
        ?>
    </div>

</body>
</html>
