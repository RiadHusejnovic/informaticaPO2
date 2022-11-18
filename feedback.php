<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>

<div class="containertext">
		<span class="text-title">Feedback</span><p>Hier kunt u ons feedback geven!</p>

                <div class="modal-body">

                    <form action="e-mail-script.php" method="post" class="form-signin">
                        <div class="form-group">
                            <label class="label" for="inputEmail">Voornaam en achternaam <span style="color: #FF0000">*</span></label>
                            <input required type="text" name="fromName" id="fromName" class="form-control" placeholder="Voor- en achternaam">
                        </div><br>
                        <div class="form-group">
                            <label class="label" for="inputEmail">E-mail adres <span style="color: #FF0000">*</span></label>
                            <input required type="email" name="fromEmail" id="fromEmail" class="form-control" placeholder="voorbeeld@domein.nl">
                        </div><br>
						<div class="form-group">
                            <label class="label" for="inputEmail">Uw feedback <span style="color: #FF0000">*</span></label>
                            <input required type="text" name="fromFeedback" id="fromFeedback" class="form-control" placeholder="Wat kan beter?">
                        </div>
                        <div style="display: none;" class="form-group">
                            <label class="label" for="inputEmail">Naar </label>
                            <input type="text" name="toEmail" id="toEmail" class="form-control" value="info@blogkruijsen.nl" readonly required autofocus>
                        </div>
						<div style="display: none;" class="form-group">
                            <label class="label" for="inputEmail">Onderwerp </label>
                            <input type="text" name="subject" id="subject" class="form-control" value="Feedback" readonly required autofocus>
                        </div>
						<br>
						<p>Vragen met een <span style="color: #FF0000">*</span> zijn verplicht</p>
                        <button type="submit" name="sendMailBtn" class="cta">Feedback verzenden</button>
                    </form>
					<img class="image-responsive" src="img/feedback.png">
                </div>
        </div>

	<?php include 'includes/footer.php'; ?>

</body>
</html>