<?php

class Carrinho
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=hdness;host=localhost', 'root', 'root');
    }

    public function addCarrinho($id)
    {
        $sql = 'SELECT * FROM produto WHERE idproduto = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $produto = $sql->fetch();

            if (sizeof(@$_SESSION['carrinho']) < 1) {
                $_SESSION['carrinho'] = array();
            }

            header("Location: carrinho.php");
        } else {
            return 'Não encontrado!';
        }
    }

    public function removeCarrinho($index)
    {
        unset($_SESSION['carrinho'][$index]);
        header("Location: carrinho.php");
    }
}

$carrinho = new Carrinho();

?>