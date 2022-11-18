<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>
<div class="container">
<div class="login-box">
  	<div class="modal-body">
    	<p class="modal-title">Password Recovery</p>
		<p>Vul je e-mail adres dat bij het account hoort. U ontvangt een mail met een linkje om het wachtwoord te veranderen.</p>

    	<form action="reset.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="E-mail" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout-danger text-center'>
            ".$_SESSION['error']." 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout-success text-center'>
            ".$_SESSION['success']."
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
      		</div>
			<div class="form-group has-feedback">
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="cta" name="reset">Volgende</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a onclick="goBack()" >Terug</a>
  	</div>
</div>
</div>
</body>
<script>
function goBack() {
  window.history.back();
}
</script>
</html>