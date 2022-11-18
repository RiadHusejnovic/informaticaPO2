<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>

	<?php include 'includes/navbar.php'; ?>
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="container">
		<div class="form-group">
    	<p class="modal-title">Developer Tools (simple)</p>
		<p><a href="advanced">Advanced</a></p>
		<?php
            if(isset($_SESSION['user'])){
              echo "
					<p>Developers zoals u kunnen heel veel betekenen voor ons. Wij zijn continu bezig met het verbeteren en innoveren van onze diensten. Wanneer wij alles af hebben, kunt u meedoen met het verbeteren van GSMUnity. Hieronder vindt u de release notes:</p>
					<h2>Release notes for GSMUnity</h2>
		<p>Here you can see the changes that we have made to our site. If you have any feedback, please let us know.</p>
		<h2>GSMUnity: V1.3.0</h2>
		<p>Not a long time ago, we have launched V1.2.0, but we quicly discovered some issues. In this version (V1.3.0) we have fixed those issues while adding some extra features such as the weather app. With the weather app, you can find the current weather of your location, as well as some extra details.</p>
		<p class='modal-title'>Fixed issues</p>
		<ul>
			<li>Better look and feel</li>
			<li>Added weather app (v1.0.0)</li>
		</ul>
		<p class='modal-title'>Known issues</p>
		<ul>
			<li>There is no support for Dark Mode</li>
			<li>Uploading profile picture doesn't look like expected</li>
			<li>No support for registered GSMUnity Developers</li>
			<li>No support for submitting feedback</li>
		</ul>
		
		
		<h2>GSMUnity: V1.2.0</h2>
		<p>After a while, we have released a new update on this site. We have improved the overall look and feel of the site as well as some mobile improvement. By optimizing the size of a mobile screen and the content, we can now say that content looks better on mobile than ever before.</p>
		<p class='modal-title'>Fixed issues</p>
		<ul>
			<li>Optimizing the overall performance</li>
			<li>Better look and feel on mobile</li>
			<li>Link buttons visually improved</li>
		</ul>
		<p class='modal-title'>Known issues</p>
		<ul>
			<li>There is no support for Dark Mode</li>
			<li>Uploading profile picture doesn't look like expected</li>
			<li>No support for registered GSMUnity Developers</li>
			<li>No support for submitting feedback</li>
		</ul>
		
		
		<h2>GSMUnity: V1.1.0</h2>
		<p>We have finally released our first version to the world wide web! We are so proud on what we have achieved. We have got feedback about optimizing the web for mobile, so we have now optimized and improved the overall performance on (lower end) mobile devices. We have also made the website to load faster across all devices. We did this by making the code sufficient and deleting unnecessary assets of the site.</p>
		<p class='modal-title'>Fixed issues</p>
		<ul>
			<li>Optimizing the overall performance</li>
			<li>Better support for mobile</li>
			<li>Access to exclusive items for registered users</li>
			<li>Adding more and more features to the site</li>
		</ul>
		<p class='modal-title'>Known issues</p>
		<ul>
			<li>There is no support for Dark Mode</li>
			<li>Uploading profile picture doesn't look like expected</li>
			<li>No support for registered GSMUnity Developers</li>
			<li>No support for submitting feedback</li>
		</ul>
		<h2>We do keep on improving</h2>
		<p>Thank you for reading our release notes! We love to keep on improving and innovating our service and web. Currently, there is no support on submitting feedback. If there is, we sure will love your feedback as it helps us improving our service for you.</p>
              ";
            }
            else{
              echo "
                <h2>Welkom! U bent nog niet ingelogd</h2><p><a href='signup.php'>Maak een IZ-account aan</a> of <a href='login.php'>log in</a>, om toegang te krijgen tot Developer Tools.</p>
              ";
            }
          ?>
  	</div>
</div>	
</body>
</html>