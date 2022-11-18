<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: /informatica/home');
  }
?>
<?php include 'includes/header2.php'; ?>
<body>
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
<div class="container">
<div class="modal-body">
	<b><p class="login-title">Veilig en snel inloggen</p></b>
		<p class="align-center-startup">Om toegang te krijgen tot het PO, moet je ingelogd zijn. Je kunt makkelijk en snel een account aanmaken.</p>
  	<div class="login-box-body">
    	
    	<form action="verify" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="E-mail" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="form-action">
    			<div class="col-xs-4">
          			<button type="submit" class="cta" name="login">Log in</button>
        		</div>
      		
    	</form>
      <a href="password_forgot.php">Ik ben mijn wachtwoord vergeten</a><br>
      <a href="signup.php">Maak een account aan</a><br>
  	</div>
			</div>
</div>
	</div>
</body>
</html>