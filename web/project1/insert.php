<?php
require("dbConnect.php");
$db = get_db();
require_once "functions.php";

$x = filter_input(INPUT_POST, 'x');
if ($x == NULL) {
	$x = filter_input(INPUT_GET, 'x');
}
echo "<link rel='stylesheet' type='text/css' href='../styles.css'/>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'/>";

if ($x == 'q') {
	echo "quote";
	$q = addQuote($db);
	if($q){
		$quote = $db->prepare("SELECT MAX(id) FROM quote");
		$quote->execute();
		while ($row = $quote->fetch(PDO::FETCH_ASSOC)) {
			$quote_id = $row["id"];
			header("Location: quote.php/?id=$quote_id");
		}
	}
} else if ($x == 'a') {
	echo "author";
} else if ($x == 'c') {
	echo "category";
} else {
	echo "<a class='button' href='insert.php?x=q'>Add Quote</a>";
	echo "<a class='button' href='insert.php?x=a'>Add Author</a>";
	echo "<a class='button' href='insert.php?x=c'>Add Category</a>";
}
