<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>

<div class="containertext">
	<span class="text-title">Source Code</span>
	<p>U kunt de source code vinden via <a href="https://github.com/RiadHusejnovic/informaticaPO2">Github</a>.</p>
        </div>

	<?php include 'includes/footer.php'; ?>

</body>
</html>