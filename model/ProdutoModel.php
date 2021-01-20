<?php


namespace model;

require("../data/Conexao.php");

use PDO;
use data\Conexao;
use entities\Preco;
use entities\Produto;

class ProdutoModel
{

    //insere na tabela produo e na tabela preço
    public function insert(Produto $produto, Preco $preco)
    {
        $conexao = new Conexao();

        $stmt = $conexao->acessa()->prepare("INSERT INTO produtos (nome, cor) VALUES (:nome, :cor)");
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":cor", $produto->getCor());
        $stmt->execute();

        $stmt = $conexao->acessa()->prepare("INSERT INTO preco (preco) VALUES (:preco)");
        $stmt->bindValue(":preco", $preco->getPreco());
        $stmt->execute();
    }

    //filtro os campos de pesquisa por nome, cor e preço
    public function selectAll($nome, $cor, $preco)
    {
        $conexao = new Conexao();

        // $sql = "SELECT * FROM produtos AS pro JOIN preco AS pre ON pro.idproduto = pre.idpreco";
        $sql = "SELECT * FROM produtos AS pro JOIN preco AS pre ON pro.idproduto = pre.idpreco
        WHERE ((pro.nome LIKE ?) AND (pro.cor LIKE ?) AND (pre.preco LIKE ?))";

        $stmt = $conexao->acessa()->prepare($sql);
        $stmt->bindValue(1, "%$nome%");
        $stmt->bindValue(2, "%$cor%");
        $stmt->bindValue(3, "%$preco%");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //busca por id do produto
    public function getId($id)
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM produtos AS pro JOIN preco AS pre 
        ON pro.idproduto = pre.idpreco WHERE pro.idproduto = :id";

        $stmt = $conexao->acessa()->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    //atualiza os campos da tabela produto e preço
    public function update(Produto $produto, Preco $preco)
    {
        $conexao = new Conexao();

        $sql = "UPDATE produtos AS pro
        JOIN preco AS pre
        ON pro.idproduto = pre.idpreco
        SET pro.cor = :cor, pro.nome = :nome, pre.preco = :preco
        WHERE pro.idproduto = :idproduto";

        $stmt = $conexao->acessa()->prepare($sql);
        $stmt->bindValue(":cor", $produto->getCor());
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":preco", $preco->getPreco());
        $stmt->bindValue(":idproduto", $produto->getId());
        $stmt->execute();
    }

    //excluir o produto e preço nas duas tabela ao mesmo tempo
    public function delete($id){
        $conexao = new Conexao();

        $sql_produto = "DELETE FROM produtos WHERE idproduto = :idproduto";
        
        $stmt = $conexao->acessa()->prepare($sql_produto);
        $stmt->bindValue(":idproduto", $id);
        $stmt->execute();
        
        $sql_preco = "DELETE FROM preco WHERE idpreco = :idpreco";
        
        $stmt = $conexao->acessa()->prepare($sql_preco);
        $stmt->bindValue(":idpreco", $id);
        $stmt->execute();
    }
}
