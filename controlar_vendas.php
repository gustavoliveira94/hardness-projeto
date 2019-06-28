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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>Controle - Vendas</title>
</head>

<body>
    <?php
    require_once('./utils/nav_func.php');
    include './classes/produtos.class.php';
    include './classes/venda.class.php';
    include './classes/user.class.php';
    if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
        header("Location: login_func.php");
    }
    ?>
    <div class="container func-painel">
        <div class="row justify-content-center align-items-center flex-column" style="padding: 0 15px;">
            <h2>Controle de Vendas</h2>
            <?php
            $v = $venda->getAllVenda();
            $mes = $venda->getVendaMes(@$_GET['mes']);
            ?>
            <?php if ($v == 'Não encontrado!') { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                echo $v;
                ?>
            </div>
            <?php

        } ?>
            <?php
            if (!@$_GET['mes']) {
                foreach ($v as $index => $valor) {
                    @$total = $valor[3] + $total;
                }
            } else {
                foreach ($mes as $index => $valor) {
                    @$total = $valor[3] + $total;
                }
            }
            ?>
            <div class="card col-md-8">
                <div style="display: flex;">
                    <h5 class="card-header col-md-6" style="display: flex; align-items: center; font-size: 16px;">Valor Total das Vendas: R$
                    <small style="color: #000; font-size: 16px; margin-left: 5px" class="valortotal">
                    <?php 
                            if($v) {
                                 echo @$total ? @$total : '0';
                            } else {
                                echo $total ? @$total : '0';
                            }
                        ?>
                    </small>
                    </h5>
                    <div class="card-header col-md-6" style="display: flex; align-items: center;">
                        <p style="margin: 0">Filtrar:</p>
                        <form method="get" style="display: flex; align-items: center;">
                            <select name="mes" class="form-control" style="margin-left: 10px; width: auto;">
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                            <button class="btn btn-success" type="submit">Filtrar</button>
                        </form>
                        <a href="controlar_vendas.php">Limpar</a>
                    </div>
                </div>
                <?php 
                if (!@$_GET['mes']) {
                    ?>
                <a href="./relatorios/relatorio_vendas.php" target="_blank" style="width: 100%; text-align: center;">Gerar Relatório</a>
                <?php 
            } else {
                ?>
            <a href="./relatorios/relatorio_vendas.php?mes=<?php echo @$_GET['mes'] ?>" target="_blank" style="width: 100%; text-align: center;">Gerar Relatório</a>
            <?php

        }
        ?>
            </div>
            <table class="table table-striped table-light col-md-8">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Venda</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col">ID Cliente</th>
                        <th scope="col">Valor Total</th>
                    </tr>
                </thead>
                <?php
                if (!@$_GET['mes']) {
                    foreach ($v as $index => $vendas) {
                        $u = $user->getClienteID($vendas[1]);
                        ?>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo $index + 1 ?>
                        </th>
                        <td>
                            <?php echo $vendas[0] ?>
                        </td>
                        <td>
                            <?php echo implode('/', array_reverse(explode('-', $vendas[1]))) ?>
                        </td>
                        <td>
                            <?php echo $vendas[2] ?> -
                            <a href="clientes.php?email=<?php echo $u[3] ?>&item=<?php echo $vendas[0] ?>">Detalhes</a>
                        </td>
                        <td>R$
                            <?php echo $vendas[3] ?>
                        </td>
                    </tr>
                </tbody>
                <?php 
            }
        } else if (@$_GET['mes']) {
            foreach ($mes as $index => $vendas) {
                $u = $user->getClienteID($vendas[2]);
                ?>
            <tbody>
                <tr>
                    <th scope="row">
                        <?php echo $index + 1 ?>
                    </th>
                    <td>
                        <?php echo $vendas[0] ?>
                    </td>
                    <td>
                        <?php echo implode('/', array_reverse(explode('-', $vendas[1]))) ?>
                    </td>
                    <td>
                        <?php echo $vendas[2] ?> -
                        <a href="clientes.php?email=<?php echo $u[3] ?>&item=<?php echo $vendas[0] ?>">Detalhes</a>
                    </td>
                    <td id="valor">
                        <p><?php echo $vendas[3] ?></p>
                    </td>
                </tr>
            </tbody>
            <?php

        }
    }
    ?>
            </table>
        </div>
    </div>
    </div>
    </div>
</body>

<!-- Javascript -->
<script>
    $(".valortotal").mask('000.000.000.000.000,00', {reverse: true});
    $("td:nth-of-type(4)").mask('000.000.000.000.000,00', {reverse: true});
    $("td:nth-of-type(8)").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>