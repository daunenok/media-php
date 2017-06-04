<?php
function item_html($id, $item) {
	$str = "<div class='item'>";
	$str .= "<a href='details.php?id=" . $id . "'>";
	$str .= "<img src='" . $item["img"] . "'>";
	$str .= "<p>View details</p>";
	$str .= "</a>";
	$str .= "</div>";

	return $str;
}

function array_cat($arr, $cat) {
	$result = [];
	foreach ($arr as $key => $value) {
		if ($value["category"] == $cat) $result[$key] = $value["title"];
	}
	asort($result);
	return array_keys($result);
}