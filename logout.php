<?php
include './classes/user.class.php';
session_start();
if (isset($_SESSION['idcliente'])) {
    unset($_SESSION['idcliente']);
    header("Location:index.php");
}
?>