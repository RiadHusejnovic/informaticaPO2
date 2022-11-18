<?php include 'includes/session.php'; ?>
<?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
		$output .= '
			<div class="alert alert-danger">
                <h4><i class="icon fa fa-warning"></i> Error!</h4>
                Probeer opnieuw.
            </div>
            <h4>Er is iets mis gegaan. Probeer opnieuw te <a href="signup.php">registreren</a>.</h4>
		'; 
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){
				$output .= '
					<div class="alert alert-danger">
		                <h4><i class="icon fa fa-warning"></i> Error!</h4>
		                Dit account is al geactiveerd.
		            </div>
		            <h4>Uw account is succesvol geactiveerd! U kunt nu <a href="login.php">inloggen</a>.</h4>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['id']]);
					$output .= '
						<div class="alert alert-success">
			                <h4><i class="icon fa fa-check"></i> Success!</h4>
			                Account geactiveerd en succesvol geverifieerd - E-mail: <b>'.$row['email'].'</b>.
			            </div>
			            <h4>Uw account is succesvol geactiveerd! U kunt nu <a href="login.php">inloggen</a>.</h4>
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
			                <h4><i class="icon fa fa-warning"></i> Error!</h4>
			                '.$e->getMessage().'
			            </div>
			            <h4>Er is iets mis gegaan. Probeer opnieuw te <a href="signup.php">registreren</a>.</h4>
					';
				}

			}
			
		}
		else{
			$output .= '
				<div class="alert alert-danger">
	                <h4><i class="icon fa fa-warning"></i> Error!</h4>
	                Verkeerde code.
	            </div>
	            <h4>Er is iets mis gegaan. Probeer opnieuw te <a href="signup.php">registreren</a>.</h4>
			';
		}

		$pdo->close();
	}
?>
<?php include 'includes/header.php'; ?>
<body>
<div class="container">
<div class="login-box">
  	<div class="modal-body">
    	<p class="modal-title">Activate Account</p>	 

	        		<?php echo $output; ?>
	     
</div>
</div>
	</div>
</body>
</html>