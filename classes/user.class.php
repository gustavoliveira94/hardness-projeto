<?php

class Users
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=hdness;host=localhost', 'root', 'root');
    }

    public function create($nome, $email, $senha, $telefone = null, $status = 1)
    {
        if ($this->validateEmail($email) == false) {
            $sql = "INSERT INTO cliente (nome, senha, email, telefone, status) VALUES (:nome, :senha, :email, :telefone, :status)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':status', $status);
            $sql->execute();
            header("Location: login.php");
        } else {
            echo 'E-mail já cadastrado!';
        }
    }

    public function validateEmail($email)
    {
        $sql = 'SELECT * FROM cliente WHERE email = :email';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $nome, $email, $telefone, $senha)
    {
        $sql = "UPDATE cliente SET nome = '$nome', email = '$email', telefone = '$telefone', senha = '$senha' WHERE idcliente = '$id'";
        $sql = $this->pdo->query($sql);
        echo 'Atualizado com sucesso!';
    }

    public function login($email, $senha)
    {
        $sql = 'SELECT * FROM cliente WHERE email = :email AND senha = :senha';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $cliente = $sql->fetch();
            $_SESSION['idcliente'] = $cliente['idcliente'];
            header("Location: index.php");
        } else {
            echo 'Usuário não cadastrado ou a senha está incorreta!';
        }
    }

    public function getClienteID($id)
    {
        $sql = 'SELECT * FROM cliente WHERE idcliente = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetch();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getCliente()
    {
        $sql = 'SELECT * FROM cliente';
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function addAddress($id, $endereco, $bairro, $cep, $cidade, $uf)
    {
        $sql = "INSERT INTO enderecos (idcliente, endereco, bairro, cep, cidade, uf) VALUES (:idcliente, :endereco, :bairro, :cep, :cidade, :uf)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idcliente', $id);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cep', $cep);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':uf', $uf);
        $sql->execute();
        header("Location: address.php");
        echo 'Adicionado com sucesso!';
    }

    public function updateAddress($id, $endereco, $bairro, $cep, $cidade, $uf)
    {
        $sql = "UPDATE enderecos SET endereco = '$endereco', bairro = '$bairro', cep = '$cep', cidade = '$cidade', uf = '$uf' WHERE idcliente = '$id'";
        $sql = $this->pdo->query($sql);
        echo 'Atualizado com sucesso!';
    }

    public function getAddressID($id)
    {
        $sql = 'SELECT * FROM enderecos WHERE idcliente = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetch();
        }
    }

    public function validateEmailPromocoes($email)
    {
        $sql = 'SELECT * FROM promocoes WHERE email = :email';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function promocoes($email)
    {
        if ($this->validateEmailPromocoes($email) == false) {
            $sql = "INSERT INTO promocoes (email) VALUES (:email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();
        }
    }
}

$user = new Users();

?>