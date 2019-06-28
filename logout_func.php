<?php
include './classes/user.class.php';
session_start();
if ($_SESSION['idfuncionario']) {
    unset($_SESSION['idfuncionario']);
    header("Location:login_func.php");
}
?>