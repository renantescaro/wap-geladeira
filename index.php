<?php

error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
require_once('include.php');

session_start();

//ROTA PARA PAGINA INICIAL
Rota::run('/');