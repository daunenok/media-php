<?php 
require_once "inc/data.php";
require_once "inc/functions.php";
$id = $_GET["id"];
$item = $catalog[$id];
$pageTitle = $item["title"];
$category = $item["category"];
require_once "inc/header.php";
?>

<div class="bred">
	<a href="index.php?cat=<?=$category?>"><?=ucfirst($category)?></a>
	&gt;
	<?=$item["title"]?>
</div>
<div class="left">
	<img src="<?=$item["img"]?>">
</div>
<div class="right">
	<table>
		<tr>
			<th colspan="2"><?=$item["title"]?></th>
		</tr>
		<tr>
			<th>Genre:</th>
			<td><?=$item["genre"]?></td>
		</tr>
		<tr>
			<th>Format:</th>
			<td><?=$item["format"]?></td>
		</tr>
		<tr>
			<th>Year:</th>
			<td><?=$item["year"]?></td>
		</tr>

		<?php if ($category == "books"): ?>
		<tr>
			<th>Author:</th>
			<td><?=$item["author"]?></td>
		</tr>
		<?php endif; ?>

		<?php if ($category == "movies"): ?>
		<tr>
			<th>Stars:</th>
			<td><?=implode(", ", $item["stars"])?></td>
		</tr>
		<?php endif; ?>

		<?php if ($category == "music"): ?>
		<tr>
			<th>Artist:</th>
			<td><?=$item["artist"]?></td>
		</tr>
		<?php endif; ?>
		</table>
	</table>
</div>

<?php
require_once "inc/footer.php";
?>