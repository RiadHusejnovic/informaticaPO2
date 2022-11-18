<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<body>
<div class="startpage">
	 
	      <!-- Main content -->
	        <div class="row">
	        	<div class="align-center-startup">
		            <h2 class="razer-title">Razer <?php echo $cat['name']; ?></h2>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? '/ecommerce/images/'.$row['photo'] : 'img/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<a href='product.php?product=".$row['slug']."'>
								<div class='product-row-bg'>
		       									<img src='".$image."'class='responsive'>
		       									<h2 class='product-title'><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h2>
								</div></a>
	       						";
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        </div>
	       
</div>

</body>
</html>

