<?php
include './classes/user.class.php';
?>
<div class="container-fluid menu">
    <div class="row justify-content-center align-items-center nav-top">
        <div class="col-md-3 text-center">
            <a href="index.php" id="logo">HARDNESS</a>
        </div>
        <div class="-col-md-6">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Jogos</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="produtos?produtocategoria=midiadigital">Mídia Digital</a>
                        <a class="dropdown-item" href="produtos?produtocategoria=midiafisica">Mídia Física</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Acessórios</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="produtos?produtocategoria=consoles">Consoles</a>
                        <a class="dropdown-item" href="produtos?produtocategoria=computadores">Computadores</a>
                        <a class="dropdown-item" href="produtos?produtocategoria=ovr">Óculos Realidade Virtual</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <?php
                    session_start();
                    ob_start();
                    if (isset($_SESSION['idcliente']) && !empty($_SESSION['idcliente'])) {
                        $id = $_SESSION['idcliente'];
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            <?php 
                            $cliente = $user->getClienteID($id);
                            $nomeCliente = explode(" ", $cliente[1]);
                            echo $nomeCliente[0];
                            ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="carrinho.php">Carrinho</a>
                            <a class="dropdown-item" href="profile.php">Meus Dados</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </li>
                    <?php 
                } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="carrinho.php">Carrinho</a>
                        </div>
                    </li>
                    <?php 
                } ?>
                </li>
            </ul>
        </div>
    </div>
</div>