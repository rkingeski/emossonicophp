<?php

function novaConexao($banco = 'emossonico'){
    $servidor = '127.0.0.1:3306'; // apenas para portas dif 3306
    $usuario = 'root';
    $senha = 'root';


    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error){
        die('Erro: ' . $conexao->connect_error);
    }

    return $conexao;
}

?>