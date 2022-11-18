<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_GET['code']) OR !isset($_GET['user'])){
    header('location: /informatica');
    exit(); 
  }
?>
<?php include 'includes/header.php'; ?>
<body>
<div class="container">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
  	<div class="modal-body">
		<div class="login-box-body">
    	<p class="modal-title">Password Recovery Tool</p>

    	<form action="password_new.php?code=<?php echo $_GET['code']; ?>&usenPST">
      		<div class="form-group has-feedback">
        		<input type="password" class="form-control" name="password" placeholder="Nieuw wachtwoord" required>
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Herhalen" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
      		<div class="form-action">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="reset"><i class="fa fa-check-square-o"></i>Reset</button>
        		</div>
      		</div>
    	</form>
  	</div>
		</div>
</div>
</body>
</html>