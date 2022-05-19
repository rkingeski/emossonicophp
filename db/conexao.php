<?php

function novaConexao($banco = 'emossonico'){
    $envPath = realpath(dirname(__FILE__) . '/../src/env.ini');
    $env = parse_ini_file($envPath);
    $servidor = $env['host']; // apenas para portas dif 3306
    $usuario = $env['username'];
    $senha = $env['password'];
    $banco = $env['database'];


    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error){
        die('Erro: ' . $conexao->connect_error);
    }

    return $conexao;
}

?>