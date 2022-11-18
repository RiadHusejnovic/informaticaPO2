<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>

	<?php include 'includes/navbar.php'; ?>
	 
	    <div class="container">

	      <!-- Main content -->
	            <?php
	       			
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<h1 class="modal-title">No results found for: '.$_POST['keyword'].'</h1>';
	       			}
	       			else{
	       				echo '<h1 class="modal-title">Search results for: '.$_POST['keyword'].'</h1>';
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='modal-body'>
	       								<div class='box'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."'class='thumbnail'>
		       									<h2><a href='product.php?product=".$row['slug']."'>".$highlighted."</a></h2>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
							
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}
					}

					$pdo->close();

	       		?> 
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
</div>

</body>
</html>