<?php

require("../controller/ProdutoController.php");

use controller\ProdutoController;

// instancia da classe ProdutoController
$produtoController = new ProdutoController();

// carrega tabela de pesquisa com base nesses campos
$pesq_produto = isset($_POST['pesq_produto']) ? $_POST['pesq_produto'] : '';
$pesq_cor = isset($_POST['pesq_cor']) ? $_POST['pesq_cor'] : '';
$pesq_preco = isset($_POST['pesq_preco']) ? $_POST['pesq_preco'] : '';
$res = $produtoController->selectAll($pesq_produto, $pesq_cor, $pesq_preco);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Listagem</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../_assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <!-- formulario de informações -->
        <h3 class="text-center pt-4">Formulário</h3>

        <p id="msgErro" class="text-danger" role="alert"></p>

        <form action="../controller/produtoController.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="produto">Produto (<sapan class="text-danger">*</sapan>) </label>
                    <input type="text" class="form-control" name="produto" id="produto" autocomplete="off">
                </div>

                <div class="form-group col-md-6">
                    <label for="preco">Preço (<sapan class="text-danger">*</sapan>) - <strong> Ex: 0.00</strong></label>
                    <input type="text" class="form-control" name="preco" id="preco" autocomplete="off">
                </div>

                <div class="form-group col-md-6">
                    <label for="cor">Cor</label>
                    <select class="form-control" name="cor" id="cor">
                        <option value="AZUL">AZUL</option>
                        <option value="VERMELHO">VERMELHO</option>
                        <option value="AMARELO">AMARELO</option>
                    </select>
                </div>

                <div class="form-group col-md-12 text-center">
                    <input id="insert" type="submit" name="insert" value="Inserir" class="btn btn-success">
                </div>
            </div>
        </form>

        <!-- listgaem de produtos -->
        <h3 class="text-center pt-4 pb-4">Listagem</h3>


        <form action="produto.php" method="post">
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="">Produto</label>
                    <input type="text" class="form-control" name="pesq_produto" id="pesq_produto" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Cor</label>
                    <input type="text" class="form-control" name="pesq_cor" id="pesq_cor" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Preco - <strong>Ex: 0.00</strong> </label>
                    <input type="text" class="form-control" name="pesq_preco" id="pesq_preco" autocomplete="off">
                </div>

                <div class="form-group col-md-12 text-center">
                    <input type="submit" name="pesquisar" value="Pesquisar" class="btn btn-info">
                </div>
            </div>
        </form>

        <table class="table table-hover">
            <thead>
                <tr class="bg-primary text-light">
                    <th>Cor</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($res as $value) : //res- -> resultado do selectAll  
                ?>
                    <tr>
                        <td><?= $value['cor'] ?></td>
                        <td><?= $value['nome'] ?></td>
                        <td>R$ <?= number_format($value['preco'], 2, ",", ".") ?></td>
                        <td>
                            <a href="detalhes.php?id=<?= $value['idproduto'] ?>" class="btn btn-warning btn-sm">Detalhes</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <script src="../_assets/myjs/valida_produto.js"></script>
</body>

</html>