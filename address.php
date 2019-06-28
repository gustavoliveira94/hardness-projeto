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

    <title>Endereço</title>
</head>

<body>
    <?php
    require_once('./utils/nav_user.php');
    if (!isset($_SESSION['idcliente']) && empty($_SESSION['idcliente'])) {
        header("Location: login.php");
    }
    ?>
    <div class="container login">
        <div class="row justify-content-center align-items-center flex-column">
            <h2>
                <?php 
                $address = $user->getAddressID($id);
                if (sizeof($address) > 0) {
                    echo 'Atualizar endereço';
                } else {
                    echo 'Adicionar endereço';
                }
                ?>
            </h2>
            <form class="col-md-5 bg-light pb-2 pt-2" method="POST">
                <?php
                if (isset($_POST['idcliente'])) {
                    $id = addslashes($_POST['idcliente']);
                    $endereco = utf8_decode(addslashes($_POST['endereco']));
                    $bairro = utf8_decode(addslashes($_POST['bairro']));
                    $cep = utf8_decode(addslashes($_POST['cep']));
                    $cidade = utf8_decode(addslashes($_POST['cidade']));
                    $uf = utf8_decode(addslashes($_POST['uf']));

                    if (sizeof($address) > 0) {
                        ?>
                        <div class="alert alert-success" role="alert">
                        <?php
                        $user->updateAddress($id, $endereco, $bairro, $cep, $cidade, $uf);
                        ?>
                        </div>
                        <?php

                    } else {
                        $user->addAddress($id, $endereco, $bairro, $cep, $cidade, $uf);
                    }
                }
                ?>
                <?php 
                $u = $user->getClienteID($id);
                $e = $user->getAddressID($id);
                ?>
                <div class="form-group">
                    <input type="hidden" name="idcliente" class="form-control" value="<?php echo $u[0]; ?>">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" required name="endereco" class="form-control" placeholder="Digite seu Endereço" value="<?php echo sizeof($e) > 0 ? utf8_encode($e[2]) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" required name="bairro" class="form-control" placeholder="Digite seu bairro" value="<?php echo sizeof($e) > 0 ? utf8_encode($e[3]) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" required name="cep" class="form-control" placeholder="Digite seu CEP" value="<?php echo sizeof($e) > 0 ? utf8_encode($e[4]) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="cidade">Estado</label>
                    <input type="text" required name="cidade" class="form-control" placeholder="Digite sua cidade" value="<?php echo sizeof($e) > 0 ? utf8_encode($e[5]) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="uf">Cidade</label>
                    <select required class="form-control" name="uf" placeholder="Escolha uma cidade">
                        <option <?php echo sizeof($e) > 0 ? utf8_encode($e[6]) : '' ?>><?php echo sizeof($e) > 0 ? utf8_encode($e[6]) : 'Selecione uma UF' ?></option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-purple">
                <?php 
                if (sizeof($address) > 0) {
                    echo 'Atualizar';
                } else {
                    echo 'Adicionar';
                }
                ?>
            </button>
            </form>
        </div>
    </div>
    <?php
    require_once('./utils/footer.php');
    ?>
</body>

<!-- Javascript -->
<script>
    $("#cep").mask('00000-000');
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>