<?php

class ComprasCtrl{

    public static function index(){

        $variaveis = [];
        $variaveis['usuario'] = $_SESSION['usuario'];

        Render::pagina('view/compras/compras.php', $variaveis);
    }

    public static function confirmarCompra($usuario, $qtdCesta, $qtdGeladeira){
        echo('ok');
    }

    public static function finalizar(){
        Render::pagina('view/compras/finalizacao.php');
    }
}