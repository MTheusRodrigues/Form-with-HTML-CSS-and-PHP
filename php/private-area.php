<?php
    session_start();
    if (!isset($_SESSION['id__User'])) {
        header("location: ../index.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf8mb4">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/index.css">
        <title>Site</title>
    </head>
    <body>
    <!--Project Site-->
    <a href="exit.php" class="btnExit">Exit</a>

    </body>


