<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;


		if($password != $repassword){
			$_SESSION['error'] = 'Wachtwoorden komen niet overeen';
			header('location: signup');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Dit e-mailadres is al in gebruik';
				header('location: signup');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, username, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :username, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'username'=>$username, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Beste ".$firstname.",</h2>
						<p>Er is zojuist een PO-account aangemaakt met dit e-mailadres.</p>
						<p>Dit is uw e-mail adres:</p>
						<p>E-mail: ".$email."</p>
						<p>Om uw account te activeren, vragen wij u vriendelijk op het volgende linkje te klikken.</p>
						<a href='https://blogkruijsen.nl/informatica/activate.php?code=".$code."&user=".$userid."'>Activeer PO-account</a>
						<p>Wij wensen u een fijne dag!</p>
						<p>Heeft u dit niet gedaan? Dan kan het zo zijn dat iemand een account met uw e-mail adres wil maken.
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
				        header('location: signup');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Er is iet mis gegaan: '.$mail->ErrorInfo;
				        header('location: signup');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Sorry';
		header('location: signup');
	}

?>