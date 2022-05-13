<?php

session_start();
if(!isset($_SESSION['token'])){
    header("HTTP/1.0 403 CSRF FAIL");
    die();
} else{
    if($_SESSION['token'] != $_POST['_token']){
        header("HTTP/1.0 403 CSRF FAIL");
        die();
    } else {
        unset($_POST['_token']);
    }
}




date_default_timezone_set('America/Sao_Paulo');

function gen_uid($l=15){
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
}
$name = gen_uid();

$filename = date("Y_m_d_H_i_s_") . $name;



function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip = getUserIpAddr();

$dados = $_POST;
//temporary name that PHP gave to the uploaded file
$input = $_FILES['audio_data']['tmp_name'];

//letting the client control the filename is a rather bad idea
// $output = __DIR__ . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . $_FILES['data2']['name'] . ".wav"; 
$output = "../uploads/" . "$filename" . $_POST['emocao'] . "_" . $dados['idade'] . $dados['outro'] . "_" . $dados['sam1'] . $dados['sam2'] . $dados['sam2'] . ".mp3"; 

$filenamedb = "$filename" . $_POST['emocao'] . "_" . $dados['idade'] . $dados['outro'] . "_" . $dados['sam1'] . $dados['sam2'] . $dados['sam2'] . ".mp3";

move_uploaded_file($input, $output);


//move the file from temp name to local folder using $output name
//if(move_uploaded_file($input, $output)){ //arquivo movido com sucesso

    
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