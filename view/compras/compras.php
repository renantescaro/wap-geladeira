<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/view/estiloGerais.css"></link>
    <title>Compras</title>
</head>
<body>
    <style>
        .lbl-quantidade{
            width: 49%;
            text-align: center;
            font-size: 25px
        }
    </style>
    <input id="txtItemAtual" type="hidden">
    <div id="modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <div style="text-align: center">
                    <h5 class="modal-title" style="color: coral">Quantidade</h5>
                </div>
                <div style="margin-left: 25%">
                    <div class="modal-body row">
                        <button onclick="diminuirQtd()" style="width: 60px">-</button>
                        <input id="txtQuantidade" value="1" class="form-control" style="width: 50px">
                        <button onclick="aumentarQtd()" style="width: 60px">+</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="confirmarQtd()" type="button" style="background-color: coral" class="btn">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <label id="lblUsuario" style="display: none"><?=$variaveis["usuario"]?></label>
    </div>

    <div style="margin-top: 200px; padding: 10px">
        <div style="text-align: center">
            <h4 style="color: coral">Selecione o local de compra</h4>
            <br>
        </div>
        <button onclick="abrirQuantidade('cesta')" class="btn" style="background-color: coral; width: 49%; height: 150px">
            <img src="/public/imagens/cesta.png" style="width: 60%">
        </button>
        <button onclick="abrirQuantidade('geladeira')" class="btn" style="background-color: coral; width: 49%; height: 150px">
            <img src="/public/imagens/geladeira.png" style="width: 60%">
        </button>
        <label id="lblQtdCesta" class="lbl-quantidade">0</label>
        <label id="lblQtdGeladeira" class="lbl-quantidade">0</label>
    </div>
    <div style="margin-top: 30px; text-align: center">
        <button onclick="finalizarCompra()" style="width: 40%; height: 80px; background-color: coral" class="btn">Confirmar</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="view/compras/script.js?v=3"></script>
</body>
</html>