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

    public function update($produto, $fornecedor, $nome, $categoria, $descricao, $imagem, $valorvenda, $valorcompra, $fabricante)
    {
        $sql = "UPDATE produto SET idfornecedor = '$fornecedor', nomeproduto = '$nome', produtocategoria = '$categoria', descricao = '$descricao', imagem = '$imagem', valorvenda = '$valorvenda', valorcompra = '$valorcompra', fabricante = '$fabricante' WHERE idproduto = '$produto'";
        $sql = $this->pdo->query($sql);
        echo 'Atualizado com sucesso!';
    }

    public function getProdutos()
    {
        $sql = 'SELECT * FROM produto';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $produto = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getProdutosRecentes()
    {
        $sql = 'SELECT * FROM produto ORDER BY idproduto DESC limit 0, 3';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        return $produto = $sql->fetchAll();
    }

    public function getProdutosID($id)
    {
        $sql = 'SELECT * FROM produto WHERE idproduto = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $produto = $sql->fetch();
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
            return $produto = $sql->fetchAll();
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

    public function createEstoque($quantidade, $ucompra, $ucusto, $idproduto)
    {
        $sql = 'SELECT * FROM estoque WHERE idproduto = :idproduto';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idproduto', $idproduto);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sqlupdate = "UPDATE estoque SET quantidade = quantidade + :quantidade, ultimacompra = :ultimacompra, ultimocusto = :ultimocusto WHERE idproduto = :idproduto";
            $sqlupdate = $this->pdo->prepare($sqlupdate);
            $sqlupdate->bindValue(':quantidade', $quantidade);
            $sqlupdate->bindValue(':ultimacompra', $ucompra);
            $sqlupdate->bindValue(':ultimocusto', $ucusto);
            $sqlupdate->bindValue(':idproduto', $idproduto);
            $sqlupdate->execute();
            header("Location: painel_func.php");
        } else {
            $sqlinsert = "INSERT INTO estoque (quantidade, ultimacompra, ultimocusto, idproduto) VALUES (:quantidade, :ultimacompra, :ultimocusto, :idproduto)";
            $sqlinsert = $this->pdo->prepare($sqlinsert);
            $sqlinsert->bindValue(':quantidade', $quantidade);
            $sqlinsert->bindValue(':ultimacompra', $ucompra);
            $sqlinsert->bindValue(':ultimocusto', $ucusto);
            $sqlinsert->bindValue(':idproduto', $idproduto);
            $sqlinsert->execute();
            header("Location: painel_func.php");
        }
    }

    public function decremetarEstoque($quantidade, $idproduto)
    {
        $sql = "UPDATE estoque SET quantidade = quantidade - :quantidade WHERE idproduto = :idproduto";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':idproduto', $idproduto);
        $sql->execute();
    }

    public function getAllEstoque()
    {
        $sqlestoque = 'SELECT * FROM estoque ORDER BY quantidade ASC';
        $sqlestoque = $this->pdo->prepare($sqlestoque);
        $sqlestoque->execute();
        $estoque = $sqlestoque->fetchAll();

        return $estoque;
    }

    public function getEstoque0()
    {
        $sqlestoque = 'SELECT * FROM estoque WHERE quantidade = 0';
        $sqlestoque = $this->pdo->prepare($sqlestoque);
        $sqlestoque->execute();
        $estoque = $sqlestoque->fetchAll();

        return sizeof($estoque);
    }

    public function getEstoque($idproduto, $quantidade)
    {
        $sqlestoque = 'SELECT * FROM estoque WHERE idproduto = :idproduto';
        $sqlestoque = $this->pdo->prepare($sqlestoque);
        $sqlestoque->bindValue(':idproduto', $idproduto);
        $sqlestoque->execute();
        $estoque = $sqlestoque->fetch();

        $sqlproduto = 'SELECT * FROM produto WHERE idproduto = :idproduto';
        $sqlproduto = $this->pdo->prepare($sqlproduto);
        $sqlproduto->bindValue(':idproduto', $idproduto);
        $sqlproduto->execute();
        $produto = $sqlproduto->fetch();

        if ($estoque[1] < $quantidade) {
            echo 'Quantidade do produto ' . $produto[2] . ' disponível no estoque é de ' . $estoque[1];
        }
    }

    public function getEstoque2($idproduto, $quantidade)
    {
        $sql = 'SELECT * FROM estoque WHERE idproduto = :idproduto';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idproduto', $idproduto);
        $sql->execute();
        $estoque = $sql->fetch();

        if ($estoque[1] <= $quantidade) {
            return true;
        } else {
            return false;
        }
    }
}

$produto = new Produtos();

?>