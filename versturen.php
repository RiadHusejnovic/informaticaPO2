<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>IZ PC Shop - Feedback</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h3 style="color: #90df25" class="card-title text-center">Feedback</h3>
					<h6 style="color: #2d2d2d" class="card-title text-center">Door uw feedback kunnen we groeien!</h6>
                    <form action="e-mail-script3.php" method="post" class="form-signin">
                        <div class="form-label-group">
                            <label for="inputEmail">Voornaam en achternaam <span style="color: #FF0000">*</span></label>
                            <input type="text" name="fromName" id="fromName" class="form-control" placeholder="Voor- en achternaam">
                        </div><br>
                        <div class="form-label-group">
                            <label for="inputEmail">E-mail adres <span style="color: #FF0000">*</span></label>
                            <input type="email" name="fromEmail" id="fromEmail" class="form-control" placeholder="voorbeeld@domein.nl">
                        </div><br>
						<div class="form-label-group">
                            <label for="inputEmail">Uw feedback <span style="color: #FF0000">*</span></label>
                            <input type="text" name="fromFeedback" id="fromFeedback" class="form-control" placeholder="Wat kan beter?">
                        </div>
                        <div style="display: none;" class="form-label-group">
                            <label for="inputEmail">Naar </label>
                            <input type="text" name="toEmail" id="toEmail" class="form-control" value="info@blogkruijsen.nl" readonly required autofocus>
                        </div>
                        <br/>
                        <button type="submit" name="sendMailBtn" class="btn btn-lg btn-primary btn-block text-uppercase" style="background-color: #90df25; border-color: #90df25">Feedback verzenden</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>