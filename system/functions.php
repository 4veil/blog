<?php

include('config.php');

function getAllPosts() {

	try {
		$dbh = new PDO(DB_HOST, DB_USER, DB_PASS);
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

	$stmt = $dbh->prepare('SELECT id, title, content FROM posts ORDER BY
		created_at DESC');

	$stmt->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $results;
}

function getSinglePost($id) {

	try {
		$dbh = new PDO(DB_HOST, DB_USER, DB_PASS);
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

	$stmt = $dbh->prepare('SELECT title, content FROM posts WHERE id=?');

	$bindings = array($id);

	$stmt->execute($bindings);

	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result;
}

?>