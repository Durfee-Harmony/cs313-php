<?php
require_once "dbConnect.php";
$db = get_db();
require_once "data.php";

$x = filter_input(INPUT_POST, 'x');
if ($x == NULL) {
	$x = filter_input(INPUT_GET, 'x');
}

$page = "";
if ($x == 'q') {
	$page .= "<form method='post' action='data.php?i=q' id='quote-form'><div>";
	$page .= "<p class='q'>Enter Quote Text: </p><input type='text' name='txt' id='txt' required>";
	$page .= "<p class='q'>Choose Quote Author: </p>";
	$a = authors($db, null);
	$page .= $a;
	$page .= "<p class='q'>Choose Quote Category: </p>";
	$c = categories($db, null);
	$page .= $c;
	$page .= "</div><br><input type='submit' class='button q' name='submit' value='Add Quote'>";
	$page .= "<input type='hidden' name='i' value='q'></form>";
} else if ($x == 'a') {
	$page .= "author";
} else if ($x == 'c') {
	$page .= "category";
} else {
	$page .= "<a class='button q' href='insert.php?x=q'>Add Quote</a>";
	// $page .= "<a class='button' href='insert.php?x=a'>Add Author</a>";
	// $page .= "<a class='button' href='insert.php?x=c'>Add Category</a>";
}

function detail($page)
{
	$page;
	include "detail.php";
}

detail($page);