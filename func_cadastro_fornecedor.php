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

    <title>Fornecedor</title>
</head>

<body>
    <?php
    require_once('./utils/nav_func.php');
    include './classes/produtos.class.php';
    if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
        header("Location: login_func.php");
    }
    ?>
    <div class="container func-painel">
        <div class="row justify-content-center align-items-center flex-column">
            <h2>Cadastrar Fornecedor</h2>
            <form class="col-md-5 bg-light pb-2 pt-2" method="post">
                <?php
                if (!empty($_POST['nome']) && !empty($_POST['ie'])) {

                    $nome = addslashes($_POST['nome']);
                    $ie = addslashes($_POST['ie']);
                    $cnpj = addslashes($_POST['cnpj']);
                    $email = addslashes($_POST['email']);
                    $telefone = addslashes($_POST['telefone']);
                    $endereco = addslashes($_POST['endereco']);
                    $bairro = addslashes($_POST['bairro']);
                    $cep = addslashes($_POST['cep']);
                    $cidade = addslashes($_POST['cidade']);
                    $uf = addslashes($_POST['uf']);
                    ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    $produto->createFornecedor($nome, $ie, $cnpj, $email, $telefone, $endereco, $bairro, $cep, $cidade, $uf);
                    ?>
                </div>
                <?php

            } ?>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" required name="nome" class="form-control" placeholder="Digite o nome do fornecedor">
                    </div>
                    <div class="form-group">
                        <label for="ie">IE</label>
                        <input type="text" required name="ie" class="form-control" placeholder="Digite o ie">
                    </div>
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" required id="cnpj" name="cnpj" class="form-control" placeholder="Digite o cnpj">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" required name="email" class="form-control" placeholder="Digite o e-mail">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="telefone" required name="telefone" class="form-control" placeholder="Digite o telefone">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" required name="endereco" class="form-control" placeholder="Digite o endereço">
                        </div>
                        <div class="form-group">
                            <label for="fabricante">Bairro</label>
                            <input type="text" required name="bairro" class="form-control" placeholder="Digite o bairro">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="endereco">CEP</label>
                            <input type="text" required id="cep" name="cep" class="form-control" placeholder="Digite o CEP">
                        </div>
                        <div class="form-group">
                            <label for="fabricante">Cidade</label>
                            <input type="text" required name="cidade" class="form-control" placeholder="Digite o cidade">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="uf">Estado</label>
                        <select class="form-control" required name="uf" placeholder="Escolha uma cidade">
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
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            </div>
</body>

<!-- Javascript -->
<script>
    $("#cnpj").mask('00.000.000/0000-00', {reverse: true});
    $("#cep").mask('00000-000');
    $("#telefone").mask('(00)00000-0000');
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>