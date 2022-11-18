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
                    <h2 class="razer-title">Welkom, ' .$user["firstname"]. '.</h2><p>Dit is het keuzemenu</p>
				  </div>
				      <div class="container">
        <div class="cardbox">
            <div class="contentbox">
                <h3 id="angular">Wie ben ik</h3>
                <p>Hier vindt je informatie over wie ik ben, waar ik geboren ben, waar ik woon en wat mijn favoriete vakken en docenten zijn...
                </p>
                <a href="wiebenik">Lees verder</a>
            </div>
        </div>


        <div class="cardbox">
            <div class="contentbox">
                <h3 id="react">Wat kan ik</h3>
                <p>Waar ben ik goed in en wat zijn mijn dagelijkse bezigheden? Kom meer te weten over wat ik kan en graag doe in mijn vrije tijd...
                </p>
                <a href="watkanik">Lees verder</a>
            </div>
        </div>

        <div class="cardbox">
            <div class="contentbox">
                <h3 id="vuejs">Wat wil ik</h3>
                <p>
                    Mijn toekomst is helder: een beter leven voor iedereen op deze aardbol. Geen armoede en al helemaal geen honger...
                </p>
                <a href="watwilik">Lees verder</a>
            </div>
        </div>
    </div>
				  ';
            }
            else{
              echo "
			  <div class='align-center-startup'>
                <h2 class='razer-title'>Welkom bij het PO</h2><p>Om toegang te krijgen moet je ingelogd zijn. Dat kan <a href='login'>hier.</a></p>
				</div>
              ";
            }
          ?>
	        
		 </div>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>