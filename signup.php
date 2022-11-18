<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include 'includes/header2.php'; ?>
<body>
<div class="container">
  	<div class="modal-body">
    	<b><p class="login-title">Maak eenvoudig en snel een nieuw account aan</p></b>
				<p class="align-center-startup">Maak een account aan om toegang te krijgen tot het PO</p>

  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout-danger'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout-success'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
		<div class="login-box-body">
    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Voornaam" value="" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Achternaam" value=""  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
<! username !>
			<div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Gebruikersnaam" value=""  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="E-mail" value="" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Herhaal wachtwoord" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
<div class="form-action">
          			<button type="submit" class="cta" name="signup">Registreren</button>
    	</form>
      <br>
			<div class="links-modal">
      <a href="login.php">Heb je al een account?</a><br>
  	</div>
</div>	
</body>
</html>