<?php

class Venda
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=hdness;host=localhost', 'root', 'root');
    }

    public function itemvenda($idvenda, $idproduto, $valorunitario, $quantidade)
    {
        $sql = "INSERT INTO itemvenda (idvenda, idproduto, valorunitario, quantidade) VALUES (:idvenda, :idproduto, :valorunitario, :quantidade)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idvenda', $idvenda);
        $sql->bindValue(':idproduto', $idproduto);
        $sql->bindValue(':valorunitario', $valorunitario);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->execute();
    }

    public function venda($datavenda, $idcliente, $valortotal)
    {
        $sql = "INSERT INTO venda (datavenda, idcliente, valortotal) VALUES (:datavenda, :idcliente, :valortotal)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':datavenda', $datavenda);
        $sql->bindValue(':idcliente', $idcliente);
        $sql->bindValue(':valortotal', $valortotal);
        $sql->execute();
    }

    public function formaPagamento($idcliente, $formapagamento)
    {
        $sql = "INSERT INTO formapagamento (idcliente, formapagamento) VALUES (:idcliente, :formapagamento)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':formapagamento', $formapagamento);
        $sql->bindValue(':idcliente', $idcliente);
        $sql->execute();
    }

    public function getFormaPagamento($idcliente)
    {
        $sql = 'SELECT * FROM formapagamento WHERE idcliente = :idcliente';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idcliente', $idcliente);
        $sql->execute();
        $formapagamento = $sql->fetchAll();

        if ($formapagamento > 1)
            return array_pop($formapagamento);
        else {
            return $formapagamento;
        }
    }

    public function pagamento($idvenda, $valorpago, $datapagamento)
    {
        $sql = "INSERT INTO pagamento (idvenda, valorpago, datapagamento) VALUES (:idvenda, :valorpago, :datapagamento)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idvenda', $idvenda);
        $sql->bindValue(':valorpago', $valorpago);
        $sql->bindValue(':datapagamento', $datapagamento);
        $sql->execute();
    }

    public function getPagamento($idvenda)
    {
        $sql = 'SELECT * FROM pagamento WHERE idvenda = :idvenda';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idvenda', $idvenda);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $pagamento = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getVenda($idcliente)
    {
        $sql = 'SELECT * FROM venda WHERE idcliente = :idcliente';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idcliente', $idcliente);
        $sql->execute();
        $venda = $sql->fetchAll();

        if ($venda > 1)
            return array_pop($venda);
        else {
            return $venda;
        }
    }

    public function getAllVenda()
    {
        $sql = 'SELECT * FROM venda ORDER BY idvenda DESC';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        $venda = $sql->fetchAll();

        if ($venda > 0)
            return $venda;
        else {
            'Nenhum resultado encontrado!';
        }
    }

    public function getVendaMes($mes)
    {
        $sql = 'SELECT * FROM venda WHERE month(datavenda) = :mes';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':mes', $mes);
        $sql->execute();
        $venda = $sql->fetchAll();

        if ($venda > 0)
            return $venda;
        else {
            'Nenhum resultado encontrado!';
        }
    }

    public function getVendaCliente($idcliente)
    {
        $sql = 'SELECT * FROM venda WHERE idcliente = :idcliente ORDER BY idvenda desc';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idcliente', $idcliente);
        $sql->execute();
        $venda = $sql->fetchAll();

        return $venda;
    }

    public function getItemVenda($idvenda)
    {
        $sql = 'SELECT * FROM itemvenda WHERE idvenda = :idvenda';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idvenda', $idvenda);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $itemvenda = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getItemVendaQtd()
    {
        $sql = 'SELECT idproduto, SUM(quantidade) total
        FROM  itemvenda
        GROUP BY idproduto
        ORDER BY total DESC';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $itemvenda = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }

    public function getItemVendaTop()
    {
        $sql = 'SELECT idproduto, SUM(quantidade) total
        FROM  itemvenda
        GROUP BY idproduto
        ORDER BY total DESC
        limit 0, 3';
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $itemvenda = $sql->fetchAll();
        } else {
            return 'Não encontrado!';
        }
    }
}

$venda = new Venda();

?>