<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body>
	<?php include 'includes/navbar.php'; ?>
<div class="containermodal">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div>
            <p class='callout-danger'>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
            <p class='callout-success'>".$_SESSION['success']."</p> 
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<?php include 'includes/profile_modal.php'; ?>
	</div>
</body>
</html>