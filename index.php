
<?php

	if( $_SERVER['REQUEST_METHOD'] == 'POST'){	

		$user_name = filter_var($_POST['user_name'],FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
		$msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);;
		$user_name_error = NULL;
		$password_error = NULL;
		$msg_error = NULL;
		$form_errors = array(
			'user_error' => true,
			'password_error' => true,
			'msg_error' => true
 		);

		if ( strlen($user_name) < 5 ) {
			$user_name_error = '<strong>User name</strong> must be at least 5 character';
		} else {
			$form_errors['user_error'] = false;
		}

		if ( strlen($password) < 7 ) {
			$password_error = '<strong>Password</strong> must be at least 7 characters';
		} else {
			$form_errors['password_error'] = false;
		}

		if ( strlen($msg) <20 ) {
			$msg_error = '<strong>Message</strong> must be at least 20 characters';
		} else {
			$form_errors['msg_error'] = false;
		}

		if ( $form_errors['user_error'] == false && $form_errors['password_error'] == false && $form_errors['msg_error'] == false) {
			$headers = 'From ' . $mail . '\n';
			mail('hassanalhalabi1997@outlook.com','Contact Form', $msg,$headers);

		}
		
	}

?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<title>Contact Form</title>
		<meta name="description" content="A Simple Contact Form">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
 	<body>
 		<div class="container">
 				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
 					<div>
 						<h2 class="text-center">Contact Us</h2>
 					</div>
 					<div class="row">
		 				<div class="col-xs-6 col-md form-group">
		 					<label for="user_name">User Name:</label>
		 					<div class="input-container">
		 						<i class="fas fa-user fa-lg fa-fw"></i>
		 						<input 
		 							class="form-control user_name" 
		 							type="text" 
		 							name="user_name" 
		 							required 
		 							autocomplete="off"
		 							<?php if (isset($user_name)) { echo "value='" . $user_name . "'" ; } ?>
		 							>
		 					</div>
		 					<!-- Server Side Check -->
		 					<?php 
		 						if( isset($user_name_error) ){
		 							echo "<div class='alert alert-danger alert-dismissible fade show'>";
		 							echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		 								<span aria-hidden='true'>&times;</span>
  									</button>";
		 							echo $user_name_error;
		 							echo "</div>";
		 						}
		 					?>
		 					<!-- ----------------- -->
		 					<!-- Client Side Check -->
		 					<div class="alert alert-warning custom_alert" role="alert">
  								<strong>User name</strong> must be at least 5 characters
							</div>
							<!-- ------------------- -->
		 					<label for="email">E-mail:</label>
		 					<div class="input-container">
		 						<i class="fas fa-envelope fa-lg fa-fw"></i>
		 						<input  
		 							class="form-control" 
		 							type="email" 
		 							name="email" 
		 							required
		 							autocomplete='off' 
		 							<?php if (isset($email)) { echo "value='" . $email . "'" ; } ?>>
		 					</div>
		 					<label for="password">Password:</label>
		 					<div class="input-container">
		 						<i class="fas fa-key fa-lg fa-fw"></i>
		 						<input 
		 							class="form-control" 
		 							type="password" 
		 							name="password" 
		 							required >
		 					</div>
		 					<?php 
		 						if( isset($password_error) ){
		 							echo "<div class='alert alert-danger alert-dismissible fade show'>";
		 							echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		 								<span aria-hidden='true'>&times;</span>
  									</button>";
		 							echo $password_error;
		 							echo "</div>";
		 						}
		 					?>
		 					<div class="alert alert-warning custom_alert" role="alert">
  								<strong>Password</strong> must be at least 7 characters
							</div>
		 				</div>
		 				<div class="col-xs-6 col-md form-group">
		 					<label for="message">Your Message:</label>
		 				 	<textarea class="form-control" name="message"><?php if (isset($msg)) { echo $msg ; } ?></textarea>
		 				 	<?php 
		 						if( isset($msg_error) ){
		 							echo "<div class='alert alert-danger alert-dismissible fade show'>";
		 							echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		 								<span aria-hidden='true'>&times;</span>
  									</button>";
		 							echo $msg_error;
		 							echo "</div>";
		 						}
		 					?>
		 					<!-- Client Side Check -->
		 					<div class="alert alert-warning custom_alert" role="alert">
  								<strong>Message</strong> must be at least 20 characters
							</div>
		 				 	<div id="submit" class="input-container">
		 				 		<i class="fas fa-paper-plane fa-lg fa-fw"></i>
		 				 		<button class="btn btn-primary" type="submit" disabled="">Send Message</button>	
		 				 	</div>
		 				</div>
		 			</div>	
	 			</form>	
 		</div>

 		
 		<script src="js/jquery-1.12.4.min.js"></script>
 		<script src="js/popper.js"></script>
 		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>