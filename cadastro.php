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

    <title>Cadastro</title>
</head>

<body>
    <?php
    require_once('./utils/nav.php');
    ?>
    <div class="container login">
        <div class="row justify-content-center align-items-center flex-column">
            <h2>Cadastra-se</h2>
            <form class="col-md-5 bg-light pb-2 pt-2" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" aria-describedby="emailHelp" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <?php
                    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
                        $nome = addslashes($_POST['nome']);
                        $email = addslashes($_POST['email']);
                        $senha = md5(addslashes($_POST['senha']));
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                $user->create($nome, $email, $senha);
                                ?>
                            </div>
                <?php 
            } ?>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha" required>
                </div>
                <button type="submit" class="btn btn-purple">Cadastrar</button>
            </form>
        </div>
    </div>
    <?php
    require_once('./utils/footer.php');
    ?>
</body>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>