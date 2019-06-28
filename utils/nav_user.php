<?php
include './classes/user.class.php';
session_start();
ob_start();
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
                    <a class="nav-link" href="profile.php">Meus dados</a>
                </li>
                <li class="nav-item">
                <?php
                if (isset($_SESSION['idcliente']) && !empty($_SESSION['idcliente'])) {
                    $id = $_SESSION['idcliente'];
                    $cliente = $user->getClienteID($id);
                }
                ?>
                    <a class="nav-link" href="compras.php?email=<?php echo $cliente[3]; ?>">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="address.php">Meu endereço</a>
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
                            if (isset($_SESSION['idcliente']) && !empty($_SESSION['idcliente'])) {
                                $id = $_SESSION['idcliente'];
                                $cliente = $user->getClienteID($id);
                                $nomeCliente = explode(" ", $cliente[1]);
                                echo $nomeCliente[0];
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="carrinho.php">Carrinho</a>
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </li>
                </li>
            </ul>
        </div>
    </div>
</div>