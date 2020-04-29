<?php

class LoginCtrl{

    public static function index(){

        //SE NÂO TIVER LOGADO
        if (!isset($_SESSION['usuario'])) {
            return Render::pagina('view/login/login.php');
        }
        return Header('Location: /compras');
    }

    public static function verificarLogin($email, $manterConectado){
        if($email == 'renan.tescaro@wapstore.com.br'){
            self::logar($email);
            Header('Location: /compras');
        }else{
            $variaveis = [];
            $variaveis['mensagem'] = 'Email incorreto!';

            Render::pagina('view/login/login.php',$variaveis);
        }
    }

    public static function logar($email){
        $_SESSION['usuario'] = $email;
    }

    public static function deslogar(){
        unset($_SESSION['usuario']);
    }

    public static function sair(){
        self::deslogar();
        Render::pagina('view/login/login.php');
    }
}