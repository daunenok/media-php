<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
	$title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
	$cat = trim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING));
	$genre = trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING));
	$year = trim(filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING));
	$format = trim(filter_input(INPUT_POST, "format", FILTER_SANITIZE_STRING));
	$message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING));

	$email_body = "Name: " . $name . "\n";
	$email_body .= "Email: " . $email . "\n\n";
	$email_body .= "Suggested Item: \n\n";
	$email_body .= "Title: " . $title . "\n";
	$email_body .= "Category: " . $cat . "\n";
	$email_body .= "Genre: " . $genre . "\n";
	$email_body .= "Year: " . $year . "\n";
	$email_body .= "Format: " . $format . "\n";
	$email_body .= "Additional Details: " . $message . "\n";

	if ($name == "" || $email == "" || $title == "" || $cat == "") {
		$error_message = "Fill in required fields: Name, Email, Title, Category.";
	}


	require_once "inc/phpmailer/class.phpmailer.php";

	$mail = new PHPMailer;
	if (!isset($error_message)) {
		if ($mail->ValidateAddress($email)) {
			$mail = new PHPMailer;
			$mail->setFrom($email);
			$mail->addAddress('daunenok@list.ru');     
			$mail->isHTML(false);                                  
			$mail->Subject = 'Media Item Suggestion from ' . $name;
			$mail->Body    = $email_body;

			if(!$mail->send()) {
			    $error_message = 'Message could not be sent.';
			    $error_message .= ' Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    header("Location: suggest.php?status=thanks");
				exit;
			}	
		} else {
			$error_message = "Invalid Email";
		}
	}
}

$pageTitle = "Suggest a Media Item";
$category = "suggest";
require_once "inc/header.php";

if ($_GET["status"] == "thanks") {
	echo "<h2>Thank you for your suggestion!</h2>";
} else {
?>

<h2><?php echo $pageTitle; ?></h2>

<form method="post" action="suggest.php">
	<div class="form-suggest">
		<?php
		if (isset($error_message)) {
			echo "<p class='errors'>" . $error_message . "</p>";
		}
		?>
		<label for="name">Name: </label><!--
		--><input type="text" id="name" name="name" value="<?=$name?>">
		<label for="email">Email: </label><!--
		--><input type="email" id="email" name="email"  value="<?=$email?>">
		<label for="title">Title: </label><!--
		--><input type="text" id="title" name="title"  value="<?=$title?>">
		<label for="category">Category: </label><!--
		--><select id="category" name="category">
			<option value="books"
			<?php if ($cat == "books") echo " selected";?>
			>Books</option>
			<option value="movies"
			<?php if ($cat == "movies") echo " selected";?>
			>Movies</option>
			<option value="music"
			<?php if ($cat == "music") echo " selected";?>
			>Music</option>
		</select>
		<label for="genre">Genre: </label><!--
		--><input type="text" id="genre" name="genre" value="<?=$genre?>">
		<label for="year">Year: </label><!--
		--><input type="text" id="year" name="year" value="<?=$year?>">
		<label for="format">Format: </label><!--
		--><select id="format" name="format">
			<optgroup label="Books">
				<option value="paperback"
				<?php if ($format == "paperback") echo " selected";?> 
				>paperback</option>
				<option value="pdf"
				<?php if ($format == "pdf") echo " selected";?>
				>pdf</option>
			</optgroup>
			<optgroup label="Movies">
				<option value="mp4"
				<?php if ($format == "mp4") echo " selected";?>
				>mp4</option>
				<option value="dvd"
				<?php if ($format == "dvd") echo " selected";?>
				>dvd</option>
			</optgroup>
			<optgroup label="Music">
				<option value="mp3"
				<?php if ($format == "mp3") echo " selected";?>
				>mp3</option>
				<option value="cd"
				<?php if ($format == "cd") echo " selected";?>
				>cd</option>
			</optgroup>
		</select>
		<label class="add" for="message">Additional Details: </label><!--
		--><textarea name="message" id="message"><?=$message?></textarea>
		<input type="submit" name="submit" value="Send">
	</div>
</form>

<?php 
}
require_once "inc/footer.php";
?>