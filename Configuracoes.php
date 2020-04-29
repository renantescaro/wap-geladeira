<?php

class Configuracoes{
    
    public function __construct(){
        //DIRETORIO
        define('DIRETORIO',dirname(dirname(__FILE__)));
        
        //BANCO DE DADOS
        define('USUARIO','root');
        define('SENHA','');
        define('BANCO','geladeira');
        define('SERVIDOR','localhost');
    }
}

$config = new Configuracoes();