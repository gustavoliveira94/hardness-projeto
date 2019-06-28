<?php
include './classes/func.class.php';
session_start();
ob_start();
require_once('./utils/nav_func.php');
if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
    header("Location: login_func.php");
}
?>
<div class="container-fluid menu">
    <div class="row justify-content-center align-items-center nav-top">
        <div class="col-md-3 text-center">
            <a href="painel_func.php" id="logo">HARDNESS</a>
        </div>
        <div class="-col-md-6">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Produtos
                        </a>
                        <div class="dropdown-menu">
                        <a class="nav-link" href="func_cadastro_produtos.php">Cadastrar Produtos</a>
                            <a class="dropdown-item" href="editar_produtos.php">Editar Produtos</a>
                        </div>
                    </li>
                </li>
                <?php 
                $id = $_SESSION['idfuncionario'];
                $funcionario = $func->getFuncionarioID($id);
                if ($funcionario[15] == 1) {
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="func_cadastro_func.php">Funcionário</a>
                </li>
                <?php 
            } ?>
                <li class="nav-item">
                    <a class="nav-link" href="func_cadastro_fornecedor.php">Fornecedor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="func_cadastro_estoque.php">Estoque</a>
                </li>
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Relatórios
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="controlar_produtos.php">Produtos Vendidos</a>
                            <a class="dropdown-item" href="controlar_estoque.php">Controle de Estoque</a>
                            <a class="dropdown-item" href="controlar_vendas.php">Controle de Vendas</a>
                        </div>
                    </li>
                </li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            <?php
                            if (isset($_SESSION['idfuncionario']) && !empty($_SESSION['idfuncionario'])) {
                                $id = $_SESSION['idfuncionario'];
                                $funcionario = $func->getFuncionarioID($id);
                                $nomeFuncionario = explode(" ", $funcionario[1]);
                                echo $nomeFuncionario[0];
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="logout_func.php">Sair</a>
                        </div>
                    </li>
                </li>
            </ul>
        </div>
    </div>
</div>