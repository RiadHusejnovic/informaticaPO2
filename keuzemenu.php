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
              echo "
			  <div class='align-center-startup'>
                    <h2 class='razer-title'>Welcome, $user[firstname].</h2><p>This is RazerGadget, the best place for Razer fans. Find reviews, manuals and fixes for your Razer product <a href='razersearch'>here</a>.</p>
				  </div>
              ";
            }
            else{
              echo "
			  <div class='align-center-startup'>
                <h2 class='razer-title'>Welcome to RazerGadget</h2><p>This is RazerGadget, the best place for Razer fans. Find reviews, manuals and fixes for your Razer product <a href='razersearch'>here</a>.</p>
				</div>
              ";
            }
          ?>
	        	</div>
</div>
</body>
</html>