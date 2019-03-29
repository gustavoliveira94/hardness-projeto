<?php
include './classes/user.class.php';
session_start();
if (isset($_SESSION['idcliente'])) {
    session_destroy();
    header("Location:index.php");
}
?>