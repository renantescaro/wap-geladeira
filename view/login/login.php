<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/view/estiloGerais.css"></link>
</head>
<body>
    <div class="form-group" style="padding-left: 5px; padding-right: 5px; margin-top:100px">
        <form action="/verificar-login" method="post">
            <div style="text-align: center">
                <img src="/public/imagens/logo.png" style="width: 90%">
            </div>
            <div style="text-align: center">
                <p><?=$variaveis['mensagem']?></p>
            </div>
            <div class="input-group col-md-12">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input name="email" class='form-control' type="email" placeholder="Email">
            </div>
            <div class="col-md-12" style="margin-top: 10px">
                <button class="btn btn-primary" style="background-color: coral;width: 100%">
                    Fazer Login
                </button>
            </div>
            <div class="form-check" style="margin-top: 10px; margin-left: 15px">
                <input id="check" type="checkbox" class="form-check-input">
                <label class="form-check-label" for="check">Manter Conectado</label>
                <input type="hidden" name="manterConectado">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/view/login/script.js?v=4"></script>
</body>
</html>