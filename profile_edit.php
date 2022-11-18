<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){
		$curr_password = $_POST['curr_password'];
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact = $_POST['contact'];
		$username = $_POST['username'];
		$photo = $_FILES['photo']['name'];
		if(password_verify($curr_password, $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			try{
				$stmt = $conn->prepare("UPDATE users SET email=:email, firstname=:firstname, lastname=:lastname, contact_info=:contact, username=:username, photo=:photo WHERE id=:id");
				$stmt->execute(['email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'username'=>$username, 'photo'=>$filename, 'id'=>$user['id']]);

				$_SESON['success'] = 'Account geupdate';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] = 'Wachtwoord is onjuist';
		}
	}
	else{
		$_SESSION['error'] = 'Geen idee';
	}

	$pdo->close();

	header('location: profile');

?>