<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use Illuminate\View\Middleware\ShareErrorsFromSession;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailController extends Controller
{

    
    function mail(Request $request){

        $request->validate([
            'email' => 'required|email',
            'nombre' => 'required',
        ]);

        
       
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   =  env('MAIL_USERNAME');                     // SMTP username
            $mail->Password   =  env('MAIL_PASSWORD');                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
            $mail->setFrom($_POST['email'], $_POST['nombre']);
            $mail->addAddress('', 'Soso Sushi Web');     // Add a recipient
            $mail->addReplyTo($_POST['email'], $_POST['nombre']);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Soso Web Consultas';
            $mail->Body    = $_POST['mensaje'];
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
                );
            $mail->send();
             
            $_SESSION['result']='El mensaje ha sido enviado correctamente';
        
        }catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
            $_SESSION['result']='Error al enviar el mensaje';
        }
      
       return redirect(route('contacto'));
        }
        
        
        
        //echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    




    }

