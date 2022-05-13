<?php
include('./includes/header.php');
?>

<body>
<main>

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class='fundo '>
		<div class="jumbotron rounded py-4">
			<div class="container-sm">
				<h1 class="display-4">Emossônico</h1>
				<p>Um Banco de Dados de vozes colaborativo</p>
			</div>
		</div>
	</div>

	<div class="container mt-4">
		<h2>Bem-Vindo!</h2>
		<p>Este site tem como objetivo coletar e compartilhar a forma como as pessoas falam, ou seja, as emoções que elas transmitem pela voz.</p>
		<p>Quando falamos não necessariamente estamos sentindo alguma emoção e mesmo quando sentimos podemos expressar isso em diferentes intesidades.</p>
		<p>Aqui você pode gravar a sua voz de duas formas:</p>
		<div class="row justify-content-around mt-4">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header"><h5>Emoções Espontaneas</h5></div>
					<div class="card-body">
						
						<p class="card-text">De forma livre, onde você pode gravar como se estivesse sentindo a emoção que escolher ou até mesmo gravar num momento em que você está sentindo alguma emoção e queira contribuir para nosso banco de dados.</p>
						<a href="views/gravar.php" class="btn btn-primary">Clique Aqui</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header"><h5>Emoções Induzidas</h5></div>
					<div class="card-body">
						<p class="card-text">De forma induzida, onde você escolhe ver imagens ou vídeos e registra sua voz e a emoção que você sentiu.</p>
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