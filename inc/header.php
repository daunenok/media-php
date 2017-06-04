<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<header>
	<div>
		<h1><a href="index.php">Media Library</a></h1>
		<a href="index.php"><img src="images/media.png"></a>
	</div>
	<ul>
		<li><a href="index.php?cat=books" 
		<?php if ($category == "books") echo " class='active'"; ?>
		>BOOKS</a></li>
		<li><a href="index.php?cat=movies"
		<?php if ($category == "movies") echo " class='active'"; ?>
		>MOVIES</a></li>
		<li><a href="index.php?cat=music"
		<?php if ($category == "music") echo " class='active'"; ?>
		>MUSIC</a></li>
		<li><a href="suggest.php"
		<?php if ($category == "suggest") echo " class='active'"; ?>
		>SUGGEST</a></li>
	</ul>	
</header>

<div class="container">
