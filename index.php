<?php require_once 'controllers/index.php'; ?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>CPI-TS</title>
			<link rel="stylesheet" href="css/style.css">
		</head>
	<body>
    	<div class="wrapper">
			<div class="container">
				<h1>Welcome</h1>
				<form class="form" action="index.php" method="post">
					<input type="text" name="username" value="<?php echo escape(Input::get('username')); ?>" placeholder="Username" autocomplete="off">
					<input type="password" name="password" placeholder="Password">
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
					<button type="submit" id="login-button">Login</button>
				</form>
				<?php if(Session::exists('error')) echo Session::flash('error'); ?>
			</div>
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<script src="js/jquery-2.1.4.min"></script>
	</body>
</html>
