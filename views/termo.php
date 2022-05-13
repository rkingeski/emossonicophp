<?php
session_start();
if(isset($_POST['aceito'])){
	if($_POST['aceito'] == 1 ){
		$_SESSION['termo']=1;
		header("Location: ./gravar.php");
	} elseif ($_POST['aceito'] == 0) {
		$_SESSION['termo']=NULL;
		header("Location: ./obrigado.php"); //redirection para pagina agradecendo?
	}
}


include('../includes/header.php');
?>


<body>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8" style='text-align: justify;'>
				<h2>Termo de Consentimento Livre e Esclarecido</h2>

				<p class='lead'>Para poder participar desta pesquisa você precisa concordar com o termo abaixo e ser <font color="#FF0000"><b>maior de 18 anos.</b></font></p>
				
				<p>O(a) senhor(a) está sendo convidado a participar de uma pesquisa de doutorado intitulada “Emossônico – um banco de dados de vozes colaborativo”, em que faremos a coleta de áudios e de um questionário respondido pelo usuário, tendo como objetivo primário a criação de uma base de dados de voz para estudo de reconhecimento de emoções. Além disso, outros objetivos secundários estariam relacionados ao uso pelo pesquisador coordenador das gravações efetuadas e dos dados de questionário para aprimoramento de algoritmos computacionais e aperfeiçoamento de interfaces humano-máquina.</p>
				<p>Esta pesquisa será desenvolvida em ambiente virtual em um site na internet. O participante não é obrigado a participar de todas as atividades propostas.</p>
				<p>Por isso, antes de participar das atividades disponibilizadas em ambiente não presencial ou virtual, será apresentado este Termo de Consentimento Livre e Esclarecido (TCLE) para a sua anuência. Este TCLE será reconhecido pelo endereço de protocolo de internet* (IP) em que você acessou e preencheu os dados da página do Emossônico.</p> 
				<p>As informações coletadas serão armazenadas e disponibilizadas, após aprovação do pesquisador coordenador, neste mesmo site.</p>
				<p>As informações registradas durante acesso ao site serão preenchidas por meio de um formulário a ser respondido pelo usuário, no qual ele identificará a emoção expressa na gravação e intensidade indicada na resposta do formulário. A gravação disponibilizada publicamente a outros usuários após aprovação do pesquisador coordenador respeitará o código de ética de pesquisa em seres humanos e as políticas do site. No caso, a política do site é a de não divulgar informações em gravações que possam identificar pessoas ou agredir de alguma forma a dignidade de qualquer pessoa.</p> 
				<p>Uma pesquisa aplicada será feita, sendo que ao final espera-se que os resultados possam ser utilizados em interface humano-computador auxiliando o melhoramento de suas estruturas e para auxílio à profissionais que lidam com avaliação de emoções, tais como psiquiatras, psicólogos, professores, pedagogos, entre outros. </p>
				<p>O(a) Senhor(a) não terá despesas e nem será remunerado(a) pela participação na pesquisa. Todas as despesas decorrentes de sua participação serão ressarcidas. Em caso de danos, decorrentes da pesquisa, será garantida a indenização.</p>
				<p>O risco do sujeito na pesquisa é baixo. Podendo ser um risco psíquico, que é considerado baixo, pois não há intervenção física no sujeito, dado que será feita remotamente e sua dignidade não será afetada. O projeto de pesquisa é baseado em estudos similares que demonstraram que induzir emoções da forma proposta possuí um baixo risco ao indivíduo, visto que as atividades propostas, são atividades cotidianas, como assistir à vídeos e jogar jogos eletrônicos. Além disso, o participante tem total liberdade para escolher se deseja realizar as atividades propostas e pode desistir a qualquer momento caso sofra algum incômodo. No caso da gravação de algum conteúdo considerado ofensivo pelos usuários um campo de mensagens foi disponibilizado no site para remoção, mesmo após triagem efetuada pelo coordenador do projeto, podendo também ser solicitada pelo e-mail: rafaelkingeski@gmail.com. Outra forma de diminuir quaisquer riscos é o anonimato, por isso ninguém deverá se identificar nesta pesquisa e dados pessoais nenhum serão coletados.</p>

				
				<p>NOME DO PESQUISADOR RESPONSÁVEL PARA CONTATO: Rafael Kingeski</br>
				NÚMERO DO TELEFONE: (47) 99640-5959</p>

				<p>Comitê de Ética em Pesquisa Envolvendo Seres Humanos – CEPSH/UDESC</br>
				Av. Madre Benvenuta, 2007 – Itacorubi – Florianópolis – SC - 88035-901</br>
				Fone/Fax: (48) 3664-8084 / (48) 3664-7881 - E-mail: cepsh.reitoria@udesc.br / cepsh.udesc@gmail.com </br>
				CONEP- Comissão Nacional de Ética em Pesquisa</br>
				SEPN 510, Norte, Bloco A, 3ºandar, Ed. Ex-INAN, Unidade II – Brasília – DF- CEP: 70750-521</br>
				Fone: (61) 3315-5878/ 5879 – E-mail: conep@saude.gov.</p>
				
				<p>Ao concordar com este termo você afirma ser maior de 18 anos.</p>
				
				<h3>Consentimento para gravações</h3>

				<p>Permito que sejam realizadas gravações de minha pessoa para fins da pesquisa científica intitulada Emossônico – Um Banco de Dados de Vozes Colaborativo”, e concordo que o material e informações obtidas relacionadas à minha pessoa possam ser publicados eventos científicos ou publicações científicas e ambientes virtuais. Porém, a minha pessoa não deve ser identificada por nome ou rosto em qualquer uma das vias de publicação ou uso.</p>
				<p>As gravações ficarão sob a propriedade do grupo de pesquisadores pertinentes ao estudo e, sob a guarda dos mesmos.</p>

				<p><small>*Endereço de Protocolo da Internet, do inglês Internet Protocol address, é um rótulo numérico atribuído a cada dispositivo conectado a uma rede de computadores que utiliza o Protocolo de Internet para comunicação.</small></p>
				
				<div class="mt-4 text-center">
					<a  href="../termos/Consentimento_gravacoes_maiores_18_anos.pdf" class='btn btn-secondary'>Termo de Consentimento Livre e Esclarecido em PDF <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
					  </svg></a>
				</div>

				<div class="mt-4 text-center">
					<a href="../termos/TCLE_maiores_ambientes_virtuais_emossonico.pdf" class='btn btn-secondary'>Termo de Consentimento de Gravação em PDF <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
					  </svg></a>
				</div>
				

				<div class="mt-4 text-center">
					<form action="" method="post">
						<button name='aceito' type="submit" class='btn btn-primary' value='1'>Li e concordo com os termos</button>
						<button name='aceito' type="submit" class='btn btn-secondary' value='0'>Não concordo</button>
					</form>
				</div>




		</div>
	</div>
</div>

</body>

<?php
include('../includes/footer.php');
?>