<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		
		<title>Emossônico</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Um Banco de Dados de vozes colaborativo onde qualquer pessoa pode acessar e gravar seus áudios." />
		<meta name="keywords" content="emossônico, emossonico, voz, emoções, banco de dados de voz, banco de dados, banco de dados em portuguÊs, banco de dados de voz com emoções, banco de dados de vozes, banco de dados de vozes com emoções" />
		<meta name="robots" content="index, follow">

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	</head>
	<style>
		
            .fundo{
                background-image: url("./images/waves.png");
                background-position: center;
                background-size: cover;
            }
            .jumbotron{
                background-color: rgba(169, 169, 169, 0.5);
            }
				input::-webkit-outer-spin-button,
				input::-webkit-inner-spin-button {
					/* display: none; <- Crashes Chrome on hover */
					-webkit-appearance: none;
					margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
				}

				input[type=number] {
					-moz-appearance:textfield; /* Firefox */
				}
				
        </style>

<header>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">Emossônico</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
					  <li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/">Página Inicial</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="../views/gravar.php">Gravar</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="../views/banco.php?page=1">Banco</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="../views/sobre.php">Sobre</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="../views/contato.php">Contato</a>
					  </li>
				</div>
		</div>
			  </nav>
		</header>

