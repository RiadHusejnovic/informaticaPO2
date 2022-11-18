<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="startpage">
	    <div>
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
					<?php
            if(isset($_SESSION['user'])){
              echo '
			  <div class="align-center-startup">
                    <h2 class="razer-title">razer searchbar</h2><p>Find your Razer product here.</p>
				  					<form method="POST" class="navbar-form navbar-left" action="razersearchbar">
              <input class="search-form-control" type="text" id="navbar-search-input" name="keyword" placeholder="Search" required><button class="search-btn" type="submit"><ion-icon class="search-icon" name="search"></ion-icon></button>
          </div>
		  <div>
        </form>
              ';
            }
			else{
              echo '
			  <div class="align-center-startup">
               <h2 class="razer-title">razer searchbar</h2><p>Sorry! The Razer Searchbar is for users only. Create an account here.</p>
				</div>
              ';
            }
          ?> 
	            <?php
	       			
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<div class="align-center-startup">
						<h1 class="modal-title">No results found for '.$_POST['keyword'].'</h1><p>If we miss a Razer product, please submit it <a>here</a>.</p></div>';
	       			}
	       			else{
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
						    	$image = (!empty($row['photo'])) ? '/ecommerce/images/'.$row['photo'] : 'img/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='column'>";
	       						echo "
								<a href='product.php?product=".$row['slug']."'>
								<div class='product-row-bg'>
		       									<img src='".$image."'class='responsive'>
		       									<h2 class='product-title'><a href='product.php?product=".$row['slug']."'>".$highlighted."</a></h2>
								</div></a>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
							
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