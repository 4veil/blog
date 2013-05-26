<?php include('system/functions.php'); ?>
<html>
<head>
	<title>Home Page | Our Little blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="form">
		<?php if(isset($_GET['id'])) { ?>
		<h2>Single Post</h2>

		<?php $post = getSinglePost($_GET['id']); ?>
			<fieldset>
				<h2><?php echo $post['title']; ?> </h2>
				<p><?php echo $post['content']; ?></p>
			</fieldset>

			<a href="index.php">Back to posts</a>
		<?php } else { ?>
		
		<h2>All Posts</h2>
		<?php $posts = getAllPosts(); ?>

		<?php 
			foreach ($posts as $name => $post) {
				echo "<h2>" . $post['title'] . "</h2>";
				echo "<p>" . $post['content'] . "</p>";

				echo '<a href="index.php?id=' . $post['id'] . '" style="text-align:right;">View Post</a>';
				echo "<hr>";
			}


		?>

		<?php } ?>
	</div>


</body>
</html>

