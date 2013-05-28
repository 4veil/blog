<?php

/**
 * Begin our session
 */

session_start();

/*
Set the form token
 */

$form_token = md5(uniqid('auth', true));

/*
Set the session form token
 */

$_SESSION['form_token'] = $form_token;

?>


<html>

<head>
	<title>Register | Our Little blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="wrapper">
		<div class="header"><p>DANISHERE</p></div>
		<div class="navigation">
			<ul>
				<li><a href="/blog/">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="loginForm.php">Login</a></li>
				<li><a href="adduser.php">Register</a></li>
			</ul>

	</div>

	<div class="content">
		<h2>Add user</h2>

		<form action="system/adduser_submit.php" method="post">
			<fieldset>
				<p>
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" maxlength="20" />
				</p>
				<p>
					<label for="password">Password</label>
					<input type="text" id="password" name="password" value="" maxlength="20" />
				</p>
				<p>
					<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
					<input type="submit" value="&rarr; Login" />
				</p>
			</fieldset>
		</form>
		

	</div>

	<div class="sidebar">

	</div>
	<div class="footer">
		<p>This is foot, hello.</p>
	</div>

</body>

</html>

