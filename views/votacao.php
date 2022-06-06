<?php

session_start();

require_once "../db/conexao.php";

$idaudio = $_COOKIE['id'];


$sql = "SELECT votoc, votod FROM audiosaprovados WHERE id=$idaudio";  
$conexao = novaConexao();
$resultado = $conexao->query($sql);
$row = $resultado->fetch_assoc();

if($_COOKIE['voto'] == 'concordo'){
    $votoca = $row['votoc']+1;
}else{
    $votoca = $row['votoc'];
}


if($_COOKIE['voto']== 'discordo'){
    $votoda = $row['votod']+1;
} else{
    $votoda = $row['votod'];
}


$sql ="UPDATE audiosaprovados SET votoc='$votoca', votod='$votoda' WHERE id=$idaudio";

$conexao = novaConexao();
$resultadocon= $conexao->query($sql);

?>
