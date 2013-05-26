<html>
<head>
	<title>Create a New Post | Our Little blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="form">
		<h2>Create a New Post</h2>

		<fieldset>
			<form action="system/new.php" method="POST">
				<label for="title">Post Title: </label>
				<input type="text" name="title" placeholder="Post Title">
				<br />
				<label for="title">Post Content: </label>
				<textarea name="content" cols="49" rows="5"></textarea>
				<hr>
				<input type="submit" name="submit" value="Create Post">
			</form>
		</fieldset>
	</div>


</body>
</html>

