<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['reset'])){
		$email = $_POST['email'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			//generate code
			$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code=substr(str_shuffle($set), 0, 15);
			try{
				$stmt = $conn->prepare("UPDATE users SET reset_code=:code WHERE id=:id");
				$stmt->execute(['code'=>$code, 'id'=>$row['id']]);
				
				$message = "
					<h2>Informatica PO wachtwoord reset</h2>
					<p>Wachtwoord vergeten? Geen stress! Je kunt eenvoudig toegang krijgen tot uw account met een nieuw vers wachtwoord.</p>
					<p>Het account:</p>
					<p>E-mail: ".$email."</p>
					<p>To reset your password, simply fill in a new password using the link below. Please safe and remember your password.</p>
					<p>Om het wachtwoord te veranderen, kun je een nieuw wachtwoord invullen via het linkje hieronder. Bewaar en onthoud uw nieuwe wachtwoord.</p>
					<a href='https://blogkruijsen.nl/informatica/password_reset.php?code=".$code."&user=".$row['id']."'>Verander je wachtwoord hier.</a>
					<p>Mocht je niet het wachtwoord willen veranderen, dan kan je dit negeren.<br>Fijne dag verder!<br><br><b>Riad Husejnovic<b></p>
				";

				//Load phpmailer
	    		require 'vendor/autoload.php';

	    		$mail = new PHPMailer(true);                             
			    try {
			        //Server settings
			        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.strato.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'password@blogkruijsen.nl';     
				        $mail->Password = 'resetpasswordBalkanac123';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('password@blogkruijsen.nl');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('password@blogkruijsen.nl');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Informatica - PO wachtwoord reset';
				        $mail->Body    = $message;

				        $mail->send();

			        $_SESSION['success'] = 'Email has been sent';
			     
			    } 
			    catch (Exception $e) {
			        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			    }
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}
		else{
			$_SESSION['error'] = 'Dit account bestaat niet';
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'yea i dont know';
	}

	header('location: password_forgot.php');

?>