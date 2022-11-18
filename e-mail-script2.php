<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['sendMailBtn'])){
	$fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];
    $fromFeedback = $_POST['fromFeedback'];
    $fromName = $_POST['fromName'];


				try{
					

					$message = "
						<h2>Beste ".$fromName.",</h2>
						<p>Er is zojuist een EST-account aangemaakt met dit e-mailadres. Helaas kunnen wij uw account waarschijnlijk tijdelijk niet activeren.</p>
						<p>Dit is uw e-mail adres:</p>
						<p>E-mail: ".$fromEmail."</p>
						<p>Om uw account te activeren, vragen wij u vriendelijk op het volgende linkje te klikken.</p>
						<p>Wij wensen u een fijne dag!</p>
						<p>Heeft u dit niet gedaan? Dan kan het zo zijn dat iemand een account met uw e-mail adres wil maken. Klik <a>hier</a> om met ons in contact te komen.
					";

					//Load phpmailer
	    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.strato.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'signup@blogkruijsen.nl';     
				        $mail->Password = 'Balkanac123';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('signup@blogkruijsen.nl');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('signup@blogkruijsen.nl');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Account activeren';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Check uw mail om uw account te activeren.';
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Er is iet mis gegaan: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		

	else{
		$_SESSION['error'] = 'Je bent echt een grote staatsmongool';
		header('location: signup.php');
	}

?>