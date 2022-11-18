<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type']){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$_SESSION['user'] = $row['id'];
						}
					}
					else{
						$_SESSION['error'] = 'Wachtwoord onjuist';
					}
				}
				else{
					$_SESSION['error'] = 'Account is niet geactiveerd';
				}
			}
			else{
				$_SESSION['error'] = 'Dit e-mailadres is niet verbonden met een IZ-account';
			}
		}
		catch(PDOException $e){
			echo "Er is een probleempje: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Vul eerst alles in mogooltje';
	}

	$pdo->close();

	header('location: login.php');

?>