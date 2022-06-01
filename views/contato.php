<?php
include('../includes/header.php');
?>

<body>
    <div class="container-sm">
    <form class="contact-form" action="" method="post" enctype = "multipart/form-data">
        <div class="card p-2" >
            <div class="card-header p-2">
                <div class="bg-secondary text-white text-center py-2">
                    <h3><i class="fa fa-envelope"></i> Contato</h3>
                </div>
                <div type="text" class="d-flex justify-content-center p-2">
                    <h5>
                        Se você tem sugestões, reclamações ou quer remover algum áudio do nosso banco, mande sua mensagem!
                    </h5>
                </div>
            </div>
            <div class="card-body p-3">
    
                <!--Body-->
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-primary"></i></div>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope text-primary"></i></div>
                        </div>
                        <input id="email" name="email" type="email" class="form-control"  placeholder="exemplo@gmail.com" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-comment text-primary"></i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Assunto" id="subject" name="subject" required></textarea>
                    </div>
                </div>



                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-comment text-primary"></i></div>
                        </div>
                        <textarea class="form-control" placeholder="Sua mensagem" id="msg" name="msg" required></textarea>
                    </div>
                </div>
    
                <div class="text-center">
                    <input id="enviar" name="enviar" type="submit" value="Enviar" class="btn btn-primary">
                    <?php if ($responses): ?>
                    <p class="responses"><?php echo implode('<br>', $responses); ?></p>
                    <?php endif; ?>
                </div>
            </div>
    
        </div>
    </form>
</div>

</body>

<?php
include('./includes/footer.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php
// Output messages
$responses = [];
// Check if the form was submitted
if (isset($_POST['email'], $_POST['subject'], $_POST['name'], $_POST['msg'])) {
	// Validate email adress
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Email is not valid!';
	}
	// Make sure the form fields are not empty
	if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['msg'])) {
		$responses[] = 'Please complete all fields!';
	} 
	// If there are no errors
	if (!$responses) {
		// Where to send the mail? It should be your email address
		$to      = 'rafaelkingeski@gmail.com';
		// Send mail from which email address?
		$from = 'contact@emossonico.com';
		// Mail subject
		$subject = $_POST['subject'];
		// Mail message
		$message = $_POST['msg'];
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		// Try to send the mail
		if (mail($to, $subject, $message, $headers)) {
			// Success
			echo('<div class="container-sm"> <p>Mensagem Enviada!</p> </div>');		
		} else {
			// Fail
			echo('<div class="container-sm"> <p>Erro! Mensagem não Enviada! Entre em contato com rafaelkingeski@gmail.com</p> </div>');
		}
	}
}
?>