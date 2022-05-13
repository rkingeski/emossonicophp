<?php

function novaConexao($banco = 'emossonico'){
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = 'root';


    try{
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco",
            $usuario, $senha);
        return $conexao;
    } catch (PDOException $e){
        die('Erro ' . $e->getMessage());
    }
}

novaConexao();
echo "FIM!"

?>