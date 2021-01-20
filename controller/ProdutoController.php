<?php

namespace controller;

require('../model/ProdutoModel.php');
require('../entities/Preco.php');
require('../entities/Produto.php');
require("../_helpers/teste.php");

use entities\Preco;
use entities\Produto;
use model\ProdutoModel;

class ProdutoController
{

    //recupera a submissão dos botões quando solicitados
    public function __construct()
    {
        if (isset($_POST['insert']) && $_POST['insert']) {
            $this->insert();
        }

        //esses boões são da pagina detalhes
        if (isset($_POST['atualizar']) && $_POST['atualizar']) {
            $this->update();
        }

        if (isset($_POST['excluir']) && $_POST['excluir']) {
            $this->delete();
        }

        if (isset($_POST['cancelar']) && $_POST['cancelar']) {
            header('Location: ../view/produto.php');
        }
    }

    //regra de negóico para inserir com acesso a classe ProdutoModel
    public function insert()
    {
        $produtoModel = new ProdutoModel();

        $cor = isset($_POST['cor']) ? $_POST['cor'] : '';
        $produto = new Produto();
        $preco = new Preco();

        if ($cor == "VERMELHO" && $_POST['preco'] > 50) {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.05));
            // echo "maior que cinquenta e vermlho = -5%";
        } else if ($cor == "VERMELHO") {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.20));
            // echo "vermelho = -20%";
        }

        if ($cor == "AZUL") {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.20));
            // echo "azul = -20%";
        }

        if ($cor == "AMARELO") {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.10));
            // echo "amareco = -10%";
        }

        $produto->setNome($_POST['produto']);
        $produto->setCor($_POST['cor']);

        //insere no banco, após respeitar as regras de cores e valor
        $produtoModel->insert($produto, $preco);

        echo "<script>alert('Sucesso!');document.location='../view/produto.php'</script>";
    }

    //lista todos os produtos que contem o nome do produto, cor ou preço
    public function selectAll($pesq_produto, $pesq_cor, $pesq_preco)
    {
        $produtoModel = new ProdutoModel();

        $produto = new Produto();
        $preco = new Preco();

        $produto->setNome($pesq_produto);
        $produto->setCor($pesq_cor);
        $preco->setPreco($pesq_preco);

        return $produtoModel->selectAll($pesq_produto, $pesq_cor, $pesq_preco);
    }

    //busca por codigo do produto;
    public function getId($id)
    {
        $produtoModel = new ProdutoModel();
        return $produtoModel->getId($id);
    }

    //atualiza a tabela produto nome e tabela preço o preço (menos a cor)
    public function update()
    {
        $produtoModel = new ProdutoModel();

        $cor = isset($_POST['cor']) ? $_POST['cor'] : '';
        $produto = new Produto();
        $preco = new Preco();

        if ($cor == "VERMELHO" && $_POST['preco'] > 50) {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.05));
            // echo "maior que cinquenta e vermlho = -5%";
        } else if ($cor == "VERMELHO") {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.20));
            // echo "vermelho = -20%";
        }

        if ($cor == "AZUL") {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.20));
            // echo "azul = -20%";
        }

        if ($cor == "AMARELO") {
            $preco->setPreco(($_POST['preco'] - ($_POST['preco']) * 0.10));
            // echo "amareco = -10%";
        }

        $produto->setId($_POST['id']);
        $produto->setCor($_POST['cor']);
        $produto->setNome($_POST['produto']);

        $produtoModel->update($produto, $preco);

        echo "<script>alert('Produto Atualizado!');document.location='../view/produto.php'</script>";
    }

    //exclui o produto e preço corrente
    public function delete()
    {
        $produtoModel = new ProdutoModel();

        $produtoModel->delete($_POST['id']);

        echo "<script>alert('Produto Excluído!');document.location='../view/produto.php'</script>";
    }
}

new ProdutoController();
