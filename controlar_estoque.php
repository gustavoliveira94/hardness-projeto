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

    <title>Controle - Estoque</title>
</head>

<body>
    <?php
    require_once('./utils/nav_func.php');
    include './classes/produtos.class.php';
    include './classes/venda.class.php';
    if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
        header("Location: login_func.php");
    }
    ?>
    <div class="container func-painel">
        <div class="row justify-content-center align-items-center flex-column" style="padding: 0 15px;">
            <h2>Controle de Estoque</h2>
                <?php
                $e = $produto->getAllEstoque();
                ?>
                    <?php if ($e == 'Não encontrado!') { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $e;
                    ?>
                </div>
                <?php

            }
            $est = $produto->getEstoque0();
            ?>
        <div class="card col-md-8">
            <h5 class="card-header">Total de produtos sem estoque: <?php echo $est ?></h5>
            <a href="./relatorios/relatorio_estoque.php" target="_blank" style="width: 100%; text-align: center;">Gerar Relatório</a>
        </div>
            <table class="table table-striped table-light col-md-8">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Produto</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                  </tr>
                </thead>
                <?php
                foreach ($e as $index => $estoque) {
                    $p = $produto->getProdutosID($estoque[4]);
                    ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $index + 1 ?></th>
                    <td><?php echo $p[0] ?></td>
                    <td style="width: 280px;"><?php echo $p[2] ?></td>
                    <td><?php echo $estoque[1] ?></td>
                  </tr>
                </tbody>
                <?php

            }
            ?>
            </table>
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