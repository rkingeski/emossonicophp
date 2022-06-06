<?php
include('../includes/header.php');
if (empty($_SESSION['token2'])){
	$_SESSION['token2'] = base64_encode(random_bytes(32));
}
if (isset($_GET["page"])) {
	$page  = $_GET["page"];
} else {
	$page=1;
};

require_once "../db/conexao.php";
$start = 1 + 2 * ($page - 1);
$rows = 2 ;
// 
$results_per_page = 2;  
$page_first_result = ($page-1) * $results_per_page;

$sql = "SELECT id, emocao, filename, idade, sexo, descricao, sam1, sam2, sam3, data, forma FROM audiosaprovados";  
$conexao = novaConexao();
$resultado = $conexao->query($sql);
$number_of_result = mysqli_num_rows($resultado);  
  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

$sql = "SELECT id, emocao, filename, idade, sexo, descricao, sam1, sam2, sam3, data, forma, votoc, votod FROM audiosaprovados LIMIT $page_first_result , $results_per_page";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

$registros = [];

if($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif($conexao->error) {
    echo "Erro: " . $conexao->error;
}


$number_of_results = mysqli_num_rows($resultado);
$results_per_page = 50;
$number_of_pages = ceil($number_of_results/$results_per_page);




$conexao->close();
?>

<body>

<div class="container mt-4 px-4 col-lg-10">
	<ul class="list-group">
		<li class="list-group-item list-group-item-dark text-center"><b>Banco de Voz</b></li>
		<li class="list-group-item">
			<form action="" method="post" name='filtro'>
				<div class="row">
					<div class="col-sm">
						<select name='sexo' class='form-control form-control-sm'>
							<option value="" disabled selected hidden>Sexo</option>
							<option value="1">Masculino</option>
							<option value="2">Feminino</option>
						</select>
					</div>
					<div class="col-sm">
						<select name="idade" class='form-control form-control-sm'>
							<option value="" disabled selected hidden>Faixa Etária</option>
							<option value='1'> &lt;18 </option>
							<option value='2'>18-29</option>
							<option value='3'>30-39</option>
							<option value='4'>40-49</option>
							<option value='5'>50-59</option>
							<option value='6'> 60+</option>
						</select>
					</div>
					<div class="col-sm">
						<select name="emocao" class='form-control form-control-sm'>
							<option value="" disabled selected hidden>Emoção</option>
							<option value="1">Felicidade</option>
							<option value="2">Tristeza</option>
							<option value="3">Nojo</option>
							<option value="4">Medo</option>
							<option value="5">Raiva</option>
							<option value="6">Surpresa</option>
							<option value="7">Neutro</option>
							<option value="8">Outro</option>
						</select>
					</div>

					<div class="col-md-auto">
						<div class="btn-group">
							<input type="submit" value="Filtrar" class='btn btn-sm btn-primary'>
							<input type="reset" value="Limpar" class='btn btn-sm btn-secondary'>
						</div>
					</div>
				</div>
			</form>
		</li>
		
	</ul>

<table class="table table-striped">
    <thead>
        <th scope="col">Cod.</th>
        <th scope="col">Idade</th>
        <th scope="col">Emoção</th>
		<th scope="col">Sexo</th>
		<th scope="col">Áudio</th>
        <th scope="col">Data</th>
	</thead>
    <tbody>
	<?php
	 foreach($registros as $registro):
	?>
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['idade'] ?></td>
				<td><?= $registro['emocao'] ?></td>
				<td><?= $registro['sexo'] ?></td>
				<td>
				<audio controls>
         		<source src = "/../uploads/<?= $registro['filename'] ?>" type = "audio/mpeg">
      			</audio>
				</td>
				<td><?= $registro['data'] ?> </td>		
            </tr>
			<tr></tr>
			<tr>
				<td>
					Escala Pictográfica:
				</td>
				<td>
				<img id="samimage" src="/images/SAM/SAM 11-<?= $registro['sam1']+5?>.png" alt="" class="img-thumbnail" width="70" height="100">
				</td>
				<td>
				<img id="samimage" src="/images/SAM/SAM 12-<?= $registro['sam2']+5?>.png" alt="" class="img-thumbnail" width="70" height="100">
				</td>
				<td>
				<img id="samimage" src="/images/SAM/SAM 13-<?= $registro['sam3']+5?>.png" alt="" class="img-thumbnail" width="70" height="100">
				</td>
				
				<td>
				</td>

				<td>
				<form id='form' class="mt-3" action="votacao.php" method='post' name='formu' enctype="multipart/form-data">

					<div class="btn-group" role="group" aria-label="Basic mixed styles example">
					<button id="concordo<?= $registro['id'] ?>" class='btn btn-primary' onclick="vote1(<?= $registro['id'] ?>)"><span class=''><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
					<path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
					</svg>
					</svg></span>Concordo <br> <?php $votoc = $registro['votoc'];
													 $votod = $registro['votod'];
													 $votocp = ($votoc/($votoc+$votod))*100;
													 $votodp = ($votod/($votoc+$votod))*100; 
													 echo(number_format($votocp,1,",",".") . "%");
													 //echo($votocp); ?> </button>	

					<button id="discordo<?= $registro['id'] ?>" class='btn btn-secondary' onclick="vote2(<?= $registro['id'] ?>)"><span class=''><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
					<path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z"/>
					</svg>
					</svg></span>Discordo <br> <?php echo(number_format($votodp,1,",",".") . "%"); ?>
					</button>
					</div>
				</form>
				<br>



				</td>

				
			</tr>
	<?php
	endforeach
	?>
    </tbody>

</table>
<?php for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "/views/banco.php?page=' . $page . '">' . $page . ' </a>';  
    }
	?>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
	
	let votoc = 'concordo';
	let votod = 'discordo';

	function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
	}


	function vote1(id) {
		console.log(id)
		$(`#concordo`+id).attr("disabled", true);
		$(`#discordo`+id).attr("disabled", true);


		//$(`#concordo`+id).text("Concordo <br>" + `${votocp.toFixed(2)}%`);
		//$(`#discordo`+id).text("Discordo <br>" + `${votodp.toFixed(2)}%`);
		setCookie("voto", "concordo", "1");
		setCookie("id", id, "1");
		var request = new XMLHttpRequest();
		var dataf = "1";
		request.open('POST','votacao.php', true);
		request.send(dataf);
	}



	function vote2(id) {
	console.log(id)
	$(`#concordo`+id).attr("disabled", true);
	$(`#discordo`+id).attr("disabled", true);
	setCookie("voto", "discordo", "1");
	setCookie("id", id, "1");
	var request = new XMLHttpRequest();
	request.open('POST','votacao.php', true);
	request.send(votod);
	}

</script>


<?php




include('../includes/footer.php');
?>
