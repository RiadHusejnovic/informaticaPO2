<?php
if (isset($_POST['sendMailBtn'])) {
    $fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];
    $fromFeedback = $_POST['fromFeedback'];
    $fromName = $_POST['fromName'];

    $to = $toEmail;
    $subject = $fromName;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    $message = '<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https:/blogkruijsen.nl/test/e-mail/style/style.css">
<meta charset="utf-8">
<title>Nieuwe Bestelling!</title>
</head>
<body>
	<h2 class="nametitle">Hallo Riad Husejnovic,</h2>
	<div class="container">
	<h2>'.$fromName.' heeft een feedback verstuurd!</h2>
	<div class="containertext">
	<a class="naam">Naam: </a><a class="naamnext">'.$fromName.'</a>
	<br><a class="naam">E-mail: </a><a class="naamnext">'.$fromEmail.'</a>
	<br><a class="naam">Feedback: </a><a class="naamnext">'.$fromFeedback.'</a>
	</div>
	</div>
</body>
</html>';
    $result = @mail($to, $subject, $message, $headers);

    echo '<script>window.location.href="/informatica/contact";</script>';
}
if (isset($_POST['sendMailBtn'])) {
    $fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];
    $fromFeedback = $_POST['fromFeedback'];
    $message = $_POST['message'];
    $artikelnummer = $_POST['artikelnummer'];
    $fromName = $_POST['fromName'];

    $to = $fromEmail;
    $subject = "$fromName, bedankt voor uw feedback!";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    $message = '<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https:/blogkruijsen.nl/test/e-mail/style/style.css">
<meta charset="utf-8">
<title>Nieuwe Bestelling!</title>
</head>
<body>
	<h2 class="nametitle">Hallo '.$fromName.',</h2>
	<div class="container">
	<h2>Bedankt voor uw feedback voor IZ PC Shop!</h2>
	<div class="containertext">
	<p>U heeft feedback verstuurd naar ons. Wij zijn u erg dankbaar, want door uw feedback kunnen wij onszelf verbeteren en daardoor meer mensen helpen! Wij zullen naar uw feedback luisteren en kijken of we onze diensten kunnen verbeteren.</p>
	<p>Nogmaals, bedankt voor uw feedback!</p>
	<p>Dit is uw feedback:<br>'.$fromFeedback.'</p>
	<p>Klopt dit niet? Stuur dan onmiddelijk een mailtje naar: info@blogkruijsen.nl<br><br>Met vriendelijke groeten,<br><br>Riad Husejnovic</p>
	</div>
	</div>
</body>
</html>';
    $result = @mail($to, $subject, $message, $headers);

    echo '<script>window.location.href="/informatica/contact";</script>';
}