<?php
include('../includes/header.php');
?>

<body>
    <div class="container-sm">
    <form class="contact-form" action="send" method="post" enctype = "multipart/form-data">
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
                        <textarea class="form-control" placeholder="Sua mensagem" id="message" name="message" required></textarea>
                    </div>
                </div>
    
                <div class="text-center">
                    <input id="enviar" name="enviar" type="submit" value="Enviar" class="btn btn-primary">
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


<script>

const contactForm = document.querySelector('.contact-form');
let name = document.getElementById('name');
let email = document.getElementById('email');
let message = document.getElementById('message');

contactForm.addEventListener('submit', (e)=>{
    e.preventDefault();

    let formData = {
        name: name.value,
        email: email.value,
        message: message.value
    }

    let xhr =new XMLHttpRequest();
    xhr.open('POST', '/send')
    xhr.setRequestHeader('content-type', 'application/json');
    xhr.onload = function() {
        console.log(xhr.responseText);
        if(xhr.responseText == 'success'){
            alert('Email Enviado');
            name.value = '';
            email.value = '';
            message.value ='';
        }
        else{
            alert('Algo deu errado! Tente Novamente')
        }
    }

    xhr.send(JSON.stringify(formData))
})

</script>

<?php
  
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
    $email_body = "<div>";
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
      
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span>
                        </div>";
    }
      
    if(isset($_POST['concerned_department'])) {
        $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Concerned Department:</b></label>&nbsp;<span>".$concerned_department."</span>
                        </div>";
    }
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      
    if($concerned_department == "billing") {
        $recipient = "billing@domain.com";
    }
    else if($concerned_department == "marketing") {
        $recipient = "marketing@domain.com";
    }
    else if($concerned_department == "technical support") {
        $recipient = "tech.support@domain.com";
    }
    else {
        $recipient = "contact@domain.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>