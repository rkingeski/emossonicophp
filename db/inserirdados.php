<?php

require_once "conexao.php";

$date_a = date("Y_m_d_H_i_s");

$sql = "INSERT INTO audios
        (emocao, filename, idade, sexo, descricao, sam1, sam2, sam3, data, IP, forma)
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
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso!!!";
} else {
    echo "Erro: " . $conexao->error;
}

?>