<?php
require("../controller/ProdutoController.php");

use controller\ProdutoController;

// instancia da classe ProdutoController
$produtoController = new ProdutoController();

//captura o id do produto pela url da página
if (isset($_GET['id'])) {
    $produto = $produtoController->getId($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../_assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <!-- formulario de informações -->
        <h3 class="text-center pt-4">Detalhes do Produto</h3>

        <p id="msgErro" class="text-danger" role="alert"></p>

        <form action="../controller/produtoController.php" method="post">

            <input type="hidden" name="id" value="<?= $produto['idproduto'] ?>">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Produto (<sapan class="text-danger">*</sapan>)</label>
                    <input type="text" class="form-control" value="<?= $produto['nome'] ?>" name="produto" id="produto" autocomplete="off">
                </div>

                <div class="form-group col-md-6">
                    <label for="">Preço (<sapan class="text-danger">*</sapan>) - <strong>Ex: 1.99</strong></label>
                    <input type="text" class="form-control" value="<?= $produto['preco'] ?>" name="preco" id="preco" autocomplete="off">
                </div>

                <div class="form-group col-md-6">
                    <label for="">Cor</label>
                    <input readonly type="text" class='form-control' value="<?= $produto['cor'] ?>" name="cor" id="cor">
                </div>

                <div class="form-group col-md-12 text-center">
                    <input id="atualizar" type="submit" name="atualizar" value="Atualizar" class="btn btn-success">
                    <input id="excluir" type="submit" name="excluir" value="excluir" class="btn btn-danger">
                    <input type="submit" name="cancelar" value="Cancelar" class="btn btn-warning">
                </div>
            </div>
        </form>
    </div>

    <script src="../_assets/myjs/valida_detalhes.js"></script>
</body>

</html>