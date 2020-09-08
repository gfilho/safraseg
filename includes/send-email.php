<?php
    if(isset($_POST['contact-form'])){

        

        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div id='contact-alert' class='error'><b>Opa. Erro no envio.</b><br>O e-mail está incorreto.</div>";
        }elseif(empty($_POST['nome']) || empty($_POST['texto'])){
            echo "<div id='contact-alert' class='alert'><b>Opa. Erro no envio.</b><br>Preencha todos os campos com asterisco <b>*</b></div>";
        }else{
            
            $nome  = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $telefone  = $_POST['telefone'];
            $mensagem  = nl2br(filter_var($_POST['texto'], FILTER_SANITIZE_STRING));

            $mailText = "
            <html>
            <head>
            <title>[Site] Contato SafraSeg</title>
            </head>
            <body>
                <div style='width:100%; border-bottom:3px solid #428C3F; padding:0;'>
                    <h1 style='color:#30343F'>[Site] Contato SafraSeg</h1>
                </div>
                <ul>
                    <li><b>Nome:</b> {$nome}</li>
                    <li><b>Email:</b> {$email}</li>
                    <li><b>Telefone:</b> {$telefone}</li>
                    <li><b>Mensagem:</b> {$mensagem}</li>
                    <li>Enviado no dia ". date('d/m/y \à\s H:i:s') ." pelo formulário 'Falar com especialista - Head'</li>
                </ul>
            </body>
            </html>
            ";
            
            // DISPARAR E-MAIL DE CONFIRMAÇÃO
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: <'.$email.'>' . "\r\n";

            mail('safraseg@gmail.com', '[Site] Contato SafraSeg', $mailText, $headers);


            echo "<div id='contact-alert' class='success'><b>Enviado com sucesso!</b><br>Em breve entraremos em contato.</div>";
        }
    }
?>