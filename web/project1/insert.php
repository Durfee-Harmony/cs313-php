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
	$page .= "<form method='post' action='data.php?i=q'><div>";
	$page .= "<p>Enter Quote Text: </p><input type='text' name='txt' id='txt' required>";
	$page .= "<p>Choose Quote Author: </p>";
	$a = authors($db);
	$page .= $a;
	$page .= "<p>Choose Quote Category: </p>";
	$c = categories($db);
	$page .= $c;
	$page .= "</div><br><input type='submit' class='button' name='submit' value='Add Quote'>";
	$page .= "<input type='hidden' name='i' value='q'></form>";
} else if ($x == 'a') {
	$page .= "author";
} else if ($x == 'c') {
	$page .= "category";
} else {
	$page .= "<a class='button' href='insert.php?x=q'>Add Quote</a>";
	// $page .= "<a class='button' href='insert.php?x=a'>Add Author</a>";
	// $page .= "<a class='button' href='insert.php?x=c'>Add Category</a>";
}

include "detail.php";