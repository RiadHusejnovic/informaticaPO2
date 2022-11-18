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
               <h2 class="razer-title">razer searchbar</h2><p>Sorry! The Razer Searchbar is for users only. <a href="login">Log in</a> to get access to Razer Searchbar.</p>
				</div>
              ';
            }
          ?> 
	        	</div>
</div>
</body>
</html>