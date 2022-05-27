<?php

require_once "conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS audios(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL, 
    emocao VARCHAR(100) NOT NULL,
    idade INT,
    sexo VARCHAR(20) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    sam1 INT,
    sam2 INT,
    sam3 INT,
    data VARCHAR(40),
    IP TEXT,
    forma VARCHAR(20) NOT NULL,
    votoc INT,
    votod INT
)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

?>