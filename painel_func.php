<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <!-- Icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/app.css">

    <title>Painel Funcionário</title>
</head>

<body>
    <?php
    require_once('./utils/nav_func.php');
    include './classes/produtos.class.php';
    include './classes/user.class.php';
    if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
        header("Location: login_func.php");
    }
    $p = $produto->getProdutos();
    $u = $user->getCliente();
    ?>
    <div class="container login" style="margin-top: -60px;">
        <div class="row justify-content-center align-items-center">
            <h2>Informações da Loja</h2>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="card col-md-8">
                <div class="card-header">
                    Produtos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nossa loja tem: </h5>
                    <p class="card-text"><?php echo sizeof($p) ?> produtos cadastrados!</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="card col-md-8">
                <div class="card-header">
                    Clientes
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nossa loja tem: </h5>
                    <p class="card-text"><?php echo sizeof($u) ?> usuários cadastrados!</p>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>