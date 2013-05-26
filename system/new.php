<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['title'])
	&& !empty($_POST['content']) ){

		include('config.php');

		try{
			$dbh = new PDO(DB_HOST, DB_USER, DB_PASS);
		}catch(PDOException $e) {
			echo $e->getMessage();
		}

		$title = $_POST['title'];
		$content = $_POST['content'];

		$stmt = $dbh->prepare('INSERT INTO posts (title, content, created_at, updated_at) VALUE 
			(?, ?, now(), now()) ');

		$bindings = array( $title, $content);

		$stmt->execute($bindings);


		header('Location: ../success.php' );
		exit();


	} else {

		header('Location: ../admin.php' );
		exit();
	}

?>