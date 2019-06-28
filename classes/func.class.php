<?php

class Funcionarios
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=hdness;host=localhost', 'root', 'root');
    }

    public function create($nome, $rg, $cpf, $senha, $email, $telefone, $endereco, $bairro, $cidade, $uf, $cep, $datanascimento, $funcao, $salario, $status)
    {
        $sql = "INSERT INTO funcionario (nome, rg, cpf, senha, email, telefone, endereco, bairro, cidade, uf, cep, datanascimento, funcao, salario, status) VALUES (:nome, :rg, :cpf, :senha, :email, :telefone, :endereco, :bairro, :cidade, :uf, :cep, :datanascimento, :funcao, :salario, :status)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':rg', $rg);
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':uf', $uf);
        $sql->bindValue(':cep', $cep);
        $sql->bindValue(':datanascimento', $datanascimento);
        $sql->bindValue(':funcao', $funcao);
        $sql->bindValue(':salario', $salario);
        $sql->bindValue(':status', $status);
        $sql->execute();
        header("Location: painel_func.php");
    }

    public function update($id, $nome, $email, $telefone, $senha)
    {
        $sql = "UPDATE cliente SET nome = '$nome', email = '$email', telefone = '$telefone', senha = '$senha' WHERE idcliente = '$id'";
        $sql = $this->pdo->query($sql);
        echo 'Atualizado com sucesso!';
    }

    public function login($email, $senha)
    {
        $sql = 'SELECT * FROM funcionario WHERE email = :email AND senha = :senha';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $func = $sql->fetch();
            $_SESSION['idfuncionario'] = $func['idfuncionario'];
            header("Location: painel_func.php");
        } else {
            echo 'Usuário não cadastrado ou a senha está incorreta!';
        }
    }

    public function getFuncionarioID($id)
    {
        $sql = 'SELECT * FROM funcionario WHERE idfuncionario = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetch();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getClienteEmail($email)
    {
        $sql = 'SELECT * FROM cliente WHERE email = :email';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetch();
        } else {
            return 'Não encontrado!';
        }
    }
}

$func = new Funcionarios();

?>