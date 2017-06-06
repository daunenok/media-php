<?php 
$pageTitle = "Personal Media Library";
$category = "";
if (isset($_GET["cat"])) {
	$pageTitle = ucfirst($_GET["cat"]);
	$category = $_GET["cat"];
}
require_once "inc/data.php";
require_once "inc/functions.php";
require_once "inc/header.php";
?>

<h2><?php echo $pageTitle; ?></h2>

<?php
$output = $category !== "" ? 
          array_cat($catalog, $category) : 
          array_rand($catalog, 4);

foreach ($output as $id) { 
	echo item_html($id, $catalog[$id]);
}

require_once "inc/footer.php";
?>
