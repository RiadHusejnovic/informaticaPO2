<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Populairste producten</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Meld u aan</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<p>Ontvang gratis een melding wanneer er een aanbieding is.</p>
	    	<form method="POST" action="">
		    	<div class="input-group">
	                <input placeholder="Uw E-mailadres" type="text" class="form-control">
	                <span class="input-group-btn">
	                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-envelope"></i> </button>
	                </span>
	            </div>
		    </form>
	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Volg ons</b></h3>
	  	</div>
	  	<div class='box-body'>
	    	<a href="https://instagram.com/izpcshop" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
	  	</div>
	</div>
</div>
