<?php

session_start();

/*
Check the username, password and token have been sent
 */

if(!isset($_POST['username'], $_POST['password'], $_POST['form_token']) ) {
	$message = "Please enter a valid username and password";
}

/*
Check if the form token is valid
 */

elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}

/*
Check the username is the correct length
 */

elseif(strlen($_POST['username']) > 20 || strlen($_POST['username']) < 4) {
	$message = "Username is an incorrect length";
}

/*
Check the password is the correct length
 */

elseif(strlen($_POST['password']) > 20 || strlen($_POST['password']) < 4) {
	$message = "Password is an incorrect length";
}

/*
Check the username has only alpha numeric characters 
 */

elseif (ctype_alnum($_POST['username']) != true)
{
    $message = "Username must be alpha numeric";
}

/*
Check the password has only alpha numeric characters
 */

elseif (ctype_alnum($_POST['password']) != true)
{
        $message = "Password must be alpha numeric";
}

else {
	/* if we are here the data is valid and we can insert it into database */
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*
    We can now encrpyt the password
     */
    
    $password = sha1($password);

    include_once('config.php');

    try {
    	$dbh = new PDO(DB_HOST, DB_USER, DB_PASS);

    	/*
    	Set error mode
    	 */
    	
    	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	 $stmt = $dbh->prepare
    	 ("INSERT INTO users (username, password ) VALUES (:username, :password )");

    	/*
    	Bind the params
    	 */
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        /*
        Execute the statement
         */
        
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        $message = 'New user added';
    } catch(Exception $e) {
    	if ($e->getCode() == 23000) {
    		$message = 'Username already exists';
    	} else {
    		$message = 'We\'re unable to process your request';
    	}
    }
}

?>

<html>
<head>
	<title>PHPRO Login</title>
</head>
<body>
	<p><?php echo $message; ?>
</body>
</html>
