<?php
    session_start();
    unset($_SESSION['id__User']);
    header("location: ../index.php");
?>