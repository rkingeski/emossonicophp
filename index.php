<?php

// if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
//     $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     header('HTTP/1.1 301 Moved Permanently');
//     header('Location: ' . $location);
//     exit;
// }


include('./includes/header.php');
?>

<body>
<main>

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class='fundo '>
		<div class="jumbotron rounded py-4">
			<div class="container-sm">
				<h1 class="display-4">Emossônico</h1>
				<p>Um Banco de Gravações de Voz Colaborativo</p>
			</div>
		</div>
	</div>

	<div class="container mt-4">
		<h2>Bem-Vindo!</h2>
		<p>Este site tem como objetivo coletar e compartilhar a forma como as pessoas falam, ou seja, as emoções que elas transmitem pela voz.</p>
		<p>Quando falamos não necessariamente estamos sentindo alguma emoção e mesmo quando sentimos podemos expressar a emoção em diferentes intesidades.</p>
		<p class="fs-5">Colabore com este projeto, clicando abaixo para escolher como gravará sua voz expressando emoção.</p>
		<div class="row justify-content-around mt-4">
			<div class="container-fluid col-md-6 mt-2">
				<div class="card">
					<div class="card-header"><h5>Emoções Espontaneas</h5></div>
					<div class="card-body">
						
						<p class="card-text">Clicando no botão abaixo, onde você pode gravar simulando a emoção que escolher ou você pode gravar num momento em que você está sentindo alguma emoção e queira contribuir para a contrução da nossa base de dados.</p>
						<a href="views/gravar.php" class="btn btn-primary">Clique Aqui</a>
					</div>
				</div>
			</div>
			<div class="container-fluid col-md-6 mt-2">
				<div class="card">
					<div class="card-header"><h5>Emoções Induzidas</h5></div>
					<div class="card-body">
						<p class="card-text">Clicando no botão abaixo, você acessa a página para resgitrar sua voz após escolher imagens, vídeos ou jogos para induzir emoções.</p>
						<a href="views/gravarinduzidas.php" class="btn btn-primary">Clique Aqui</a>
					</div>
				</div>
			</div>
		</div>

	</div>

</main>

</body>

<?php
include('./includes/footer.php');
?>