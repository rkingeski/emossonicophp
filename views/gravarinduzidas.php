<?php
session_start();
if(!isset($_SESSION['termo'])) //verifica se termo foi assinado
	header("Location: ./termoinduzidas.php");

//proteção CSRF
if (empty($_SESSION['token']))
	$_SESSION['token'] = base64_encode(random_bytes(32));

include('../includes/header.php');


?>

<style>
.visibility {
	visibility: hidden;
}

canvas{
  /*prevent interaction with the canvas*/
  pointer-events:none;
}


button[type="record"] {
	width: 35px;
	height: 35px;
	font-size: 0;
	background-color: red;
	border: 0;
	border-radius: 35px;
	margin: 18px;
	outline: none;
	text-align:'center';
}

button[type="stop"] {
	width: 35px;
	height: 35px;
	font-size: 0;
	background-color: black;
	border: 0;
	margin: 18px;
	outline: none;
}



.notRec{
	background-color: darkred;
}

.Rec{
	animation-name: pulse;
	animation-duration: 1.5s;
	animation-iteration-count: infinite;
	animation-timing-function: linear;
}

p[type="center"]{
	text-align: center;
	margin-top: -0.9em;  
}

@keyframes pulse{
	0%{
		box-shadow: 0px 0px 5px 0px rgba(173,0,0,.3);
	}
	65%{
		box-shadow: 0px 0px 5px 13px rgba(173,0,0,.3);
	}
	90%{
		box-shadow: 0px 0px 5px 13px rgba(173,0,0,0);
	}
}




</style>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>

<body onload="createCaptcha()">

    <div class="container mt-4 px-4 col-md-8">
        <h3>Gravador de Áudio</h3>

        <p>Ao gravar, você está concordando com os <a href="termo">Termos</a>.</p>

		<p>Abaixo você pode escolher dois tipos de atividades, assistir vídeos ou jogar. Selecione o que preferir em seguida selecione a emoção, clique nas setas para passar os videos.</p>


		<div class="accordion" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					Vídeos
				</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">



							

								<div class="accordion" id="accordionVideos">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTristeza" aria-expanded="false" aria-controls="collapseTristeza">
										Tristeza
									</button>
									</h2>
									<div id="collapseTristeza" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionVideos">
									<div class="accordion-body">
										
									
									<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000000000" data-bs-ride="false">
										<div class="carousel-indicators">
											<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
											<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
											<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
										</div>
										<div class="carousel-inner">
											<div class="carousel-item active">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/iz7PAJGdlqU" title="YouTube video player"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/1OynFyRO6xk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/naU6im1d4bU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
									</div>



									</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFelicidade" aria-expanded="false" aria-controls="collapseFelicidade">
										Felicidade
									</button>
									</h2>
									<div id="collapseFelicidade" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionVideos">
									<div class="accordion-body">
										
									
									<div id="carouselFelicidade" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000000000" data-bs-ride="false">
										<div class="carousel-indicators">
											<button type="button" data-bs-target="#carouselFelicidade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
											<button type="button" data-bs-target="#carouselFelicidade" data-bs-slide-to="1" aria-label="Slide 2"></button>
											<button type="button" data-bs-target="#carouselFelicidade" data-bs-slide-to="2" aria-label="Slide 3"></button>
										</div>
										<div class="carousel-inner">
											<div class="carousel-item active">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/eX2qFMC8cFo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/3a7BPfcev50" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/D3oq9T0_VCo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselFelicidade" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselFelicidade" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
									</div>



									</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSurpresa" aria-expanded="false" aria-controls="collapseSurpresa">
										Surpresa
									</button>
									</h2>
									<div id="collapseSurpresa" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionVideos">
									<div class="accordion-body">
										
									

									<div id="carouselSurpresa" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000000000" data-bs-ride="false">
										<div class="carousel-indicators">
											<button type="button" data-bs-target="#carouselSurpresa" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
											<button type="button" data-bs-target="#carouselSurpresa" data-bs-slide-to="1" aria-label="Slide 2"></button>
											<button type="button" data-bs-target="#carouselSurpresa" data-bs-slide-to="2" aria-label="Slide 3"></button>
										</div>
										<div class="carousel-inner">
											<div class="carousel-item active">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/dvp3dbphnPo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/R8n_teZji7A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/6x0mKnxLMTk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselSurpresa" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselSurpresa" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
									</div>








									</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNojo" aria-expanded="false" aria-controls="collapseNojo">
										Nojo
									</button>
									</h2>
									<div id="collapseNojo" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionVideos">
									<div class="accordion-body">


									<div id="carouselNojo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000000000000" data-bs-ride="false">
										<div class="carousel-indicators">
											<button type="button" data-bs-target="#carouselNojo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
											<button type="button" data-bs-target="#carouselNojo" data-bs-slide-to="1" aria-label="Slide 2"></button>
											<button type="button" data-bs-target="#carouselNojo" data-bs-slide-to="2" aria-label="Slide 3"></button>
										</div>
										<div class="carousel-inner">
											<div class="carousel-item active">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/dvp3dbphnPo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/R8n_teZji7A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="carousel-item">
											<iframe class="d-block w-100" width="560" height="380" src="https://www.youtube.com/embed/6x0mKnxLMTk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselNojo" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselNojo" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
									</div>


									
									</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedo" aria-expanded="false" aria-controls="collapseMedo">
										Medo
									</button>
									</h2>
									<div id="collapseMedo" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionVideos">
									<div class="accordion-body">
										<strong>VAZIO</strong> 
									</div>
									</div>
								</div>
								</div>







							</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					Jogos
				</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						
						

						<div class="accordion" id="accordionJogo">

							<div class="accordion-item">
								<h2 class="accordion-header" id="headingThreeJogo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedoJogo" aria-expanded="false" aria-controls="collapseMedoJogo">
								Medo
								</button>
								</h2>
								<div id="collapseMedoJogo" class="accordion-collapse collapse" aria-labelledby="headingThreeJogo" data-bs-parent="#accordionJogo">
									<div class="accordion-body">
										
									<div class="jogo2">
									<iframe src="https://www.crazygames.com.br/embed/celestina-chapter-two" style="width: 100%; height: 700px;" frameborder="0"></iframe>
									</div>

									</div>
								</div>	
							</div>
						
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingFourJogo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRaivaJogo" aria-expanded="false" aria-controls="collapseRaivaJogo">
									Raiva
								</button>
								</h2>
								<div id="collapseRaivaJogo" class="accordion-collapse collapse" aria-labelledby="headingFourJogo" data-bs-parent="#accordionJogo">
									<div class="accordion-body">
										<h5> I wanna Be The Guy </h5>
										

										<p>Controles do jogo:
											<ul class="list-group list-group-horizontal">
												<li class="list-group-item">Mover-se: setas</li>
												<li class="list-group-item">Saltar: Espaço</li>
												<li class="list-group-item">Atirar: Z</li>
											</ul>	
										
											
											
										</p>
										<div class="jogo">
										<iframe src='https://www.minijuegos.com/embed/i-wanna-be-the-guy' style='width:100%;height: 700px;' frameborder='0' allowfullscreen></iframe>
										</div>
								
									</div>
									

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>



				<!-- </div>
				</div>
			</div> -->


			<!-- <div class="jogo">
				<iframe src='https://www.minijuegos.com/embed/i-wanna-be-the-guy' style='width:100%;height: 700px;' frameborder='0' allowfullscreen></iframe>
				</div>

			<div class="jogo2">
				<iframe src="https://www.crazygames.com.br/embed/celestina-chapter-two" style="width: 100%; height: 700px;" frameborder="0"></iframe>
				</div> -->







		<div class="container mt-4 px-2 col-md-8 m-2">

			<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
				<div><button id="recButton" type="record" class="notRec">Gravar</button> <p type="center">Gravar</p> </div>
				<div><button id="parar" type="stop" class="btn btn-secondary" disabled>Parar</button>  <p type="center">Parar</p> </div>
			</div>

			<div id='audiofiles' class="container mt-2 px-2 col-md-8 m-2 mb-2"></div>

			<button id="excluir" class='btn btn-secondary'><span class='bi bi-trash'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
				<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
				<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
			  </svg></span>Excluir</button>

        
        <form id='form' action="upload.php" method='post' name='formu' enctype="multipart/form-data" onsubmit="validateCaptcha()">
			<input type="hidden" name="_token" value="<?php echo $_SESSION['token'] ?>"> 
			<input type="hidden" name="forma" value="induzida"> 
			<div class="form-row">
                <div class="col-sm-3 mt-2">
					<input id="idade" name="idade" type="number" min="18" max="100" placeholder="Idade" class='form-control form-control-sm' required>
					
                </div>
                <div class="col-sm-4 mt-2">
                    <select id="sexo" name="sexo" class='form-control form-control-sm' required>
                        <option value="" disabled selected hidden>Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
				<div class="col-sm mt-2">
					<select name="emocao" id='emocao' class='form-control form-control-sm' onchange='checkvalue(this.value)'>
						<option value="" disabled selected hidden>Emoção</option>
						<option value="Felicidade">Felicidade</option>
						<option value="Tristeza">Tristeza</option>
						<option value="Nojo">Nojo</option>
						<option value="Medo">Medo</option>
						<option value="Raiva">Raiva</option>
						<option value="Surpresa">Surpresa</option>
						<option value="Neutro">Neutro</option>
						<option value="Outra">Outra</option>
					</select>
				</div>

            </div>

			<div class="row">
				<div class="col-sm mt-2">
					<input class="form-control form-control-sm" type="text" id='outra' name='outra' style='display:none' placeholder="Descreva">
				</div>
			</div>




			
		</div>

		<div class="mt-5 px-2 col-md-8 m-1"><h5>Escala de auto avaliação</h5>
		<p>
			Deslize o ponteiro na direção que corresponde a forma como você está se sentindo na gravação, as figuras serão alteradas conforme o nível selecionado.
		</p>
		</div>

		<div class="container mt-4 px-2 col-md-8 m-1">
			
			<div class="row">
				<div id="SAM" class='d-flex justify-content-center'>
					<img src="/images/SAM/SAM 11-5.png" alt="" class="img-thumbnail" width="200" height="250">
				</div>

				<div class="slider">
					<div class="row">
						<div class="d-flex">
							<div class="p-2"><b>Triste</b></div>
							<div class="ml-auto p-2"><b>Feliz</b></div>
						</div>
					<div class="mdc-slider mdc-slider--discrete mdc-slider--tick-marks"></div>
					<input id="slide" name="sam1" class="form-range" list="tickmarks" type="range" min="-4" max="4"/> 		
					</div>

				</div>
			</div>
		</div>



			<div class="container mt-4 px-2 col-md-8 m-1">
				
				<div class="row">
					<div id="SAM2" class='d-flex justify-content-center'>
						<img id="samimage" src="/images/SAM/SAM 12-3.png" alt="" class="img-thumbnail" width="200" height="250">
					</div>
	
					<div class="slider">
						<div class="row">
							<div class="d-flex">
								<div class="p-2"><b>Agitado</b></div>
								<div class="ml-auto p-2"><b>Calmo</b></div>
							</div>
							<div class="mdc-slider mdc-slider--discrete mdc-slider--tick-marks"></div>
							<input id="slide2" name="sam2" class="form-range" list="tickmarks" type="range" min="-4" max="4"/> 
							
						</div>
					</div>

				</div>
			</div>



				<div class="container mt-4 px-2 col-md-8 m-1">
					
					<div class="row">
						<div id="SAM3" class='d-flex justify-content-center'>
							<img id="samimage" src="/images/SAM/SAM 13-3.png" alt="" class="img-thumbnail" width="200" height="250">
						</div>
		
						<div class="slider">
							<div class="row">
								<div class="d-flex">
									<div class="p-2"><b>Controlado</b></div>
									<div class="ml-auto p-2"><b>Controlando</b></div>
								</div>
							<div class="mdc-slider mdc-slider--discrete mdc-slider--tick-marks"></div>
								<input id="slide3" name="sam3" class="form-range" list="tickmarks" type="range" min="-4" max="4"/> 
								
							</div>
			
						</div>
					</div>
				</div>
				
				<div class="container mt-4">
					Digite os caracteres que você vê na imagem abaixo:
					<div id="captcha"> 
					</div>
					<input type="text" placeholder="Captcha" id="cpatchaTextBox"/>
				</div>



		        <div class="container mt-4">
					<button id='btn' class="btn btn-primary" value="Submit" type="submit">Enviar</button>
				</div>


	</div>






    </form>

    <br>

	<link rel="preload" href="/images/SAM/SAM 11-1.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-2.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-3.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-4.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-5.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-6.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-7.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-8.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 11-9.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-1.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-2.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-3.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-4.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-5.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-6.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-7.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-8.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 12-9.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-1.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-2.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-3.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-4.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-5.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-6.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-7.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-8.png" as="image">
	<link rel="preload" href="/images/SAM/SAM 13-9.png" as="image">


</body>

<?php
include('../includes/footer.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

function checkvalue(val){
if(val == 'Outra'){
	document.getElementById('Outra').style.display='block'
}
}






let i = document.getElementById('slide')


i.addEventListener('input', function () {
switch(i.value){
	case '-4':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-1.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-3':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-2.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-2':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-3.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-1':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-4.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '0': 
	$('#SAM').html(`<img src="/images/SAM/SAM 11-5.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '1':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-6.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '2':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-7.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '3':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-8.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '4':  
	$('#SAM').html(`<img src="/images/SAM/SAM 11-9.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
}
}, false);




let i2 = document.getElementById('slide2')

i2.addEventListener('input', function () {
switch(i2.value){
	case '-4':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-1.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-3':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-2.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-2':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-3.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-1':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-4.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '0': 
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-5.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '1':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-6.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '2':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-7.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '3':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-8.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '4':  
	$('#SAM2').html(`<img src="/images/SAM/SAM 12-9.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
}
}, false);

let i3 = document.getElementById('slide3')

i3.addEventListener('input', function () {
switch(i3.value){
	case '-4':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-1.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-3':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-2.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-2':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-3.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '-1':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-4.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '0': 
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-5.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '1':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-6.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '2':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-7.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '3':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-8.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
	case '4':  
	$('#SAM3').html(`<img src="/images/SAM/SAM 13-9.png" alt="" class="img-thumbnail" width="200" height="250">`)
	break
}
}, false);




    var audio_url
	$('#recButton').addClass("notRec");

    recButton.onclick = () =>{
		
	
	if($('#recButton').hasClass('notRec')){
		$('#recButton').removeClass("notRec");
		$('#recButton').addClass("Rec");
	}
	else{
		$('#recButton').removeClass("Rec");
		$('#recButton').addClass("notRec");
	}
		
		
		//$("#recButton").attr("disabled", true);
		$("#parar").attr("disabled", false);
            navigator.mediaDevices.getUserMedia({audio:true})  
            .then(stream =>{
                mediaRecorder = new MediaRecorder(stream)
                mediaRecorder.start()
                chunck = []

                mediaRecorder.addEventListener('dataavailable', e =>{
                    chunck.push(e.data)
                })
                mediaRecorder.addEventListener('stop', e=>{
                    ablob = new Blob(chunck, {type : "audio/mpeg-3"})
                    audio_url = URL.createObjectURL(ablob)
                    audio = new Audio(audio_url)
                    audio.setAttribute("controls",1)
                    audiofiles.appendChild(audio)
                    
                    
                    
                })
            })
			
        }


    parar.onclick = () =>{
		$('#recButton').removeClass("Rec");
		$('#recButton').addClass("notRec");
		$("#recButton").attr("disabled", true);
        mediaRecorder.stop()
		
        //console.log(this.audio_url)

    }


	excluir.onclick = () =>{
		$("#recButton").attr("disabled", false);
		$("#audiofiles").html('')
	}

	var filename = new Date().toISOString();

    form.onsubmit = async e =>{
        e.preventDefault()
		form = e.target
        var data2 = new FormData(form);
        var request = new XMLHttpRequest();
        data2.append('audio_data',this.ablob);
        request.open('POST','upload.php', true);
		if(this.ablob==undefined){
			alert("Áudio Vazio")
		}else{
		if(this.ablob.size>=20000000){
			alert("Áudio Muito Grande! Favor regravar com tempo menor. O ideal é que não ultrapasse de três minutos, você pode enviar quantos você desejar. ")
		} else {
		//alert("Enviado")
		validateCaptcha()
		request.send(data2)
		}
		}	
	}

	var code;
	function createCaptcha() {
	//clear the contents of captcha div first 
	document.getElementById('captcha').innerHTML = "";
	var charsArray =
	"0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var lengthOtp = 6;
	var captcha = [];
	for (var i = 0; i < lengthOtp; i++) {
		//below code will not allow Repetition of Characters
		var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
		if (captcha.indexOf(charsArray[index]) == -1)
		captcha.push(charsArray[index]);
		else i--;
	}
	var canv = document.createElement("canvas");
	canv.id = "captcha";
	canv.width = 100;
	canv.height = 50;
	var ctx = canv.getContext("2d");
	ctx.font = "25px Georgia";
	ctx.strokeText(captcha.join(""), 0, 30);
	//storing captcha so that can validate you can save it somewhere else according to your specific requirements
	code = captcha.join("");
	document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
	}
	function validateCaptcha() {
	event.preventDefault();
	debugger
	if (document.getElementById("cpatchaTextBox").value == code) {
		alert("Enviado!")
		document.location.reload()
	}else{
		alert("Invalid Captcha. try Again");
		createCaptcha();
	}
	}

	


</script>

