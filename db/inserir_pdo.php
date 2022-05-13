<?php
    require_once "conexaopdo.php";

    $date_a = date("Y_m_d_H_i_s");

    $sql = "INSERT INTO audios 
    (emotion, filename, age, emo_description, sam1, sam2, sam3, data_a, IP)
    VALUES  (
            'medo',
            '12391823hesdsajfb.wav',
            22,
            'vazio',
            -2,
            3,
            5,
            '$date_a',
            '192.168.2.412',
            'natural'
            )";

$conexao = novaConexao();

//print_r(get_class_methods($conexao));

if($conexao->exec($sql)){
    $id = $conexao->lastInsertId();
    echo "Novo cadastro com id $id.";
} else {
    echo $conexao->errorCode() . "<br>";
    print_r($conexao->errorInfo());
}

?>