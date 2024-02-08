<?php

require_once('phpmailer/class.phpmailer.php');

//require_once('recaptchalib.php');

$mail = new PHPMailer();

    
    if( $_POST['nombre'] != '' AND $_POST['email'] != '' AND $_POST['mensaje'] != '' ) {
        
        $privatekey = "6Ld3gd0SAAAAAJaj51saFHEXWapNLG74dKxPSgwS";
       /* $resp_recaptcha = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);*/
        
		$name = $_POST['nombre'];
        
        $email = $_POST['email'];
        
        //$subject = $_POST['asunto'];
        
        $message = $_POST['mensaje'];
        
        $toemail = 'consultas@rabbit.com.uy'; // Your Email Address
        
        $toname = 'Rabbit'; // Your Name
        
		$body = "Nombre: ".$name."<br/>Email: ".$email."<br/>Mensaje: ".$message;
        
        
        
            $mail->SetFrom( $email , $name );
			$mail->IsHTML(true);
    
            $mail->AddReplyTo( $email , $name );
            
            $mail->AddAddress( $toemail , $toname );
            
            $mail->Subject = "Consulta Web";
            
            $mail->MsgHTML( $body );
            
            $sendEmail = $mail->Send();
            
            if( $sendEmail == true ):
            
                echo '<script>alert("Se ha enviado su mensaje correctamente");window.history.back(); </script>';
            
            else:
                
               echo '<script>alert("Error al enviar su mensaje");window.history.back(); </script>';
            
            endif;
        
        }
        
   
    


?>
                    
		