<?php

class Produtos
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=hdness;host=localhost', 'root', 'root');
    }

    public function create($fornecedor, $nome, $categoria, $descricao, $imagem, $valorvenda, $valorcompra, $fabricante, $status = 1)
    {
        $sql = "INSERT INTO produto (idfornecedor, nomeproduto, produtocategoria, descricao, imagem, valorvenda, valorcompra, fabricante, status) VALUES (:idfornecedor, :nomeproduto, :produtocategoria, :descricao, :imagem, :valorvenda, :valorcompra, :fabricante, :status)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idfornecedor', $fornecedor);
        $sql->bindValue(':nomeproduto', $nome);
        $sql->bindValue(':produtocategoria', $categoria);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':imagem', $imagem);
        $sql->bindValue(':valorvenda', $valorvenda);
        $sql->bindValue(':valorcompra', $valorcompra);
        $sql->bindValue(':fabricante', $fabricante);
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

    public function getProdutos()
    {
        $sql = 'SELECT * FROM produto';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getProdutosID($id)
    {
        $sql = 'SELECT * FROM produto WHERE idproduto = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetch();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getProdutosCategoria($categoria)
    {
        $sql = 'SELECT * FROM produto WHERE produtocategoria = :produtocategoria';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':produtocategoria', $categoria);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $cliente = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }

    public function createFornecedor($nome, $ie, $cnpj, $email, $telefone, $endereco, $bairro, $cep, $cidade, $uf, $status = 1)
    {
        $sql = "INSERT INTO fornecedor (nome, ie, cnpj, email, telefone, endereco, bairro, cep, cidade, uf, status) VALUES (:nome, :ie, :cnpj, :email, :telefone, :endereco, :bairro, :cep, :cidade, :uf, :status)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':ie', $ie);
        $sql->bindValue(':cnpj', $cnpj);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cep', $cep);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':uf', $uf);
        $sql->bindValue(':status', $status);
        $sql->execute();
        header("Location: painel_func.php");
    }

    public function getFornecedor()
    {
        $sql = 'SELECT * FROM fornecedor';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $fornecedor = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }
}

$produto = new Produtos();

?>