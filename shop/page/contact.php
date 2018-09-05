<?php
if(isset($_POST['name'])) { $name = $_POST['name']; }


if(isset($_POST['email'])) { $email = $_POST['email'];
$email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

if(!preg_match($email_pattern, $email)) {
	$_SESSION['message'] = "Email must be of valid email format";
}
}

if(isset($_POST['message'])) { $message = $_POST['message']; }

if(!isset($_SESSION['message'])) {
	if(isset($_POST['contact'])){
		$sql_contact = "INSERT INTO contact (id, name, email, message)
		VALUES ('', '$name', '$email', '$message')";

		if (mysqli_query($db, $sql_contact)) {
			?>  <script type="text/javascript"> alert("your message is delivered"); </script>    <?php   }
			else {
				echo "Error: " . $sql_contact . "<br>" . mysqli_error($db);
			}
		}

	}

	?>




	<div id="content" class="space-top-none">

		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-md-8">
				<h2>Contact Form</h2>
				<div class="space20">&nbsp;</div>
				<h4>please input your name and email and send message. We will reply soon.</h4>
				<div class="space20">&nbsp;</div>
				<form action="index.php?page=contact" method="post" class="contact-form">	
					<div id="form-group">
						<span id="icon"><i id="fa fa-search"></i></span>

						<input name="name" class="form-control" type="text" placeholder="Your Name (required)" required>
					</div>
					<div id="form-group">
						<span id="icon"><i id="fa fa-search"></i></span>

						<input name="email" type="email" class="form-control" placeholder="Your Email (required)" required>
					</div>

					<div id="form-group">
						<span id="icon"><i id="fa fa-search"></i></span>

						<textarea name="message" class="form-control" placeholder="message" required></textarea>
					</div>
					<div id="form-block">
						<?php
						if (isset($_SESSION['message'])) {
							echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
							unset($_SESSION['message']);
						} ?>
						<button type="submit" class="beta-btn primary" name="contact">Send Message <i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<h2>Contact Information</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title">Address</h6>
				<p>
					HaNoi university,<br>
					Nguyen Trai, Thanh Xuan <br>
					Ha Noi
				</p>

			</div>
		</div> <!-- #content -->
	</div> 