<!-- Edit Profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Account instellingen</b> <naam style="font-weight: lighter; font-size: 1.5rem; color: #c874b2"><?php echo $user['username']; ?></naam></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
				<div class="form-group">
                    <div class="col-sm-9">
						<div  class="label"><label for="username">Gebruikersnaam</label></div>
                      <input value="<?php echo $user['username']; ?>" class="form-control" id="username" name="username"></input>
                    </div>
				  </div>
                <div>
					<div class="form-group">
                    <div class="col-sm-9">
						<div><label for="address" class="label">Voornaam</label></div>
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>
                <div>
					<div class="form-group">
                    <div class="col-sm-9">
					<label for="address" class="label">Achternaam</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>
                <div>
					<div class="form-group">
                    <div class="col-sm-9">
					<label for="address" class="label">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
				<div>
                <div class="form-group">
                    <label for="photo" class="label">Profiel foto</label>

                    <div class="col-sm-9">
                      <input accept="image/*" type="file" id="file" name="photo">
                    </div>
                </div>
                <hr style="background-color: #222">
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">We hebben je huidige wachtwoord nodig om je veranderingen op te slaan</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="current password" required>
						<br><a href="/informatica/password_forgot">Wachtwoord vergeten/veranderen?</a>
                    </div>
                </div>
				<div class="modal-footer">
					<div class="form-group">
              <button type="submit" class="cta" name="edit"><i class="fa fa-check-square-o"></i>Update</button>
              </form>
            </div>
            </div>
        </div>
    </div>
</div>