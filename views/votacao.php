<?php

session_start();
if(!isset($_SESSION['token2'])){
    header("HTTP/1.0 403 CSRF FAIL");
    die();
} else{
    if($_SESSION['token2'] != $_POST['_token2']){
        header("HTTP/1.0 403 CSRF FAIL");
        die();
    } else {
        unset($_POST['_token2']);
    }
}

require_once "../db/conexao.php";


$sql = "INSERT INTO audios
        (emocao, filename, idade, sexo, descricao, sam1, sam2, sam3, data, IP, forma)
        VALUES  (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            
        )";

$conexao = novaConexao();
$stmt = $conexao->prepare($sql);

$date_a = date("d-m-Y");
    $params = [
        $dados['emocao'],
        $filenamedb,
        $dados['idade'],
        $dados['sexo'],
        $dados['outra'],
        $dados['sam1'],
        $dados['sam2'],
        $dados['sam3'],
        $date_a,
        $ip,
        $dados['forma']
    ];

    $stmt->bind_param("ssissiiisss", ...$params);

    if($stmt->execute()) {
        unset($dados);
    }

    ?>
