<?php

class Render{

    public static function pagina(string $pagina, array $variaveisPagina = null, bool $converterJson = false){

        $variaveis = $variaveisPagina;
        
        if($converterJson == true && $variaveisPagina != null){
            $variaveis = json_encode($variaveisPagina, true);
        }

        require_once($pagina);
    }
}