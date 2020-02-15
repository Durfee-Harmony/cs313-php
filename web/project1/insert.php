<?php
require_once "dbConnect.php";
$db = get_db();
require_once "data.php";

$x = filter_input(INPUT_POST, 'x');
if ($x == NULL) {
	$x = filter_input(INPUT_GET, 'x');
}
echo "<link rel='stylesheet' type='text/css' href='../styles.css'/>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'/>";

if ($x == 'q') {
	echo "<form method='post' action='data.php?i=q'><div>";
	echo "<p>Enter Quote Text: </p><input type='text' name='txt' id='txt' required>";
	echo "<p>Choose Quote Author: </p>";
	$a = authors($db);
	echo $a;
	echo "<p>Choose Quote Category: </p>";
	$c = categories($db);
	echo $c;
	echo "</div><br><input type='submit' class='button' name='submit' value='Add Quote'>";
	echo "<input type='hidden' name='i' value='q'></form>";
	echo "quote";
} else if ($x == 'a') {
	echo "author";
} else if ($x == 'c') {
	echo "category";
} else {
	echo "<a class='button' href='insert.php?x=q'>Add Quote</a>";
	echo "<a class='button' href='insert.php?x=a'>Add Author</a>";
	echo "<a class='button' href='insert.php?x=c'>Add Category</a>";
}
