        <header>
            <a href="" ><img class="img-responsive" src="img/easteregg.logo.png"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="/informatica/home">Home</a></li>
                    <li><a href="wiebenik">Wie ben ik</a></li>
					<li><a href="watwilik">Wat wil ik</a></li>
					<li><a href="watkanik">Wat kan ik</a></li>
					<li><a href="web3.0">Web 3.0</a></li>
                </ul>
            </nav>
			<?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? '/informatica/img/'.$user['photo'] : 'img/profile.jpg';
              echo '
                    <!-- User image -->
                      <div class="img-circle" ><a href="profile"><img title="Profilepicture"  src="'.$image.'" id="profilepicture" class="img-content" alt="User Image"></a></div>
              ';
            }
          ?>
            <?php
            if(isset($_SESSION['user'])){
              echo "
                <div class='dropdown'>
  <button class='dropbtn'><nomargin><ion-icon name='menu-outline'></ion-icon><nomargin></button>
  <div class='dropdown-content'>
  <a href='profile'>$user[username]</a>
    <a href='contact'>Contact</a>
	<a href='feedback.php'>Feedback</a>
	<a href='checklist'>Checklist</a>
	<a href='source-code'>Source Code</a>
	<hr class='hr-nomargin'>
    <b><a href='logout'>Uitloggen</a></b>
  </div>
</div>
              ";
            }
            else{
              echo '
			  <a class="cta" 
                <a href="login">LOG IN</a>
              ';
            }
          ?></a>
			<p class="menu cta"><ion-item><ion-icon name="menu"></ion-icon></ion-item></p>
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="/informatica/home">Home</a>
				<hr>
                <a href="wiebenik">Wie ben ik</a>
				<hr>
                <a href="watwilik">Wat wil ik</a>
				<hr>
				<a href="watkanik">Wat kan ik</a>
				<hr>
				<a href="web3.0">Web 3.0</a>
				<hr>
				<div class="align-center-startup">
				<?php
            if(isset($_SESSION['user'])){
              echo '
                    <!-- User image -->
                      <a href="profile"><img title="Profilepicture"  src="'.$image.'" class="img-circle" alt="User Image"></a>
              ';
            }
          ?>
            <?php
            if(isset($_SESSION['user'])){
              echo '
                <a href="logout"><button type="submit" class="btn" name="signup">Uitloggen</button></a>
              ';
            }
            else{
              echo '
                <a href="login"><button type="submit" class="btn" name="signup">Inloggen</button></a>
              ';
            }
          ?>
            </div>
				</div>
        </div>
        <script type="text/javascript" src="/informatica/includes/mobile.js"></script>
<?php include 'includes/footer.php'; ?>
    </body>