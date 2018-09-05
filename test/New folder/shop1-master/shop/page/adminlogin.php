<div class="container">
		<div id="content">
			
			<form action="index.php?page=admin" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<h4>Log in for Admin</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-group">
							<label for="username">Username*</label>
							<input type="text" class="form-control" name="username" required>
						</div>
						<div class="form-group">
							<label for="password">Password*</label>
							<input type="password" class="form-control" name="password" required>
						</div>
						<?php
						if(isset($_POST['adminlogin']) && !isset($_SESSION['admin'])) {
						?>
						<p style=" text-decoration: red;"><span class="error">Incorrect username or password</span></p>
						<?php } ?>


						<div class="form-group">
							<button type="submit" name="adminlogin" class="btn btn-primary">Log in</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->