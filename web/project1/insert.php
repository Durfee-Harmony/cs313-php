<?php
require("dbConnect.php");
$db = get_db();

$x = filter_input(INPUT_POST, 'x');
if ($x == NULL) {
	$x = filter_input(INPUT_GET, 'x');
}
echo "<link rel='stylesheet' type='text/css' href='../styles.css'/>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'/>";

if ($x == 'q') {
	$txt = $_POST['txt'];
	$src = $_POST['src'];
	$img = $_POST['img'];
	$author_id = $_POST['author_id'];

	try {
		$query = "INSERT INTO quote (txt, src, img, author_id) VALUES (:txt, :src, :img, :author_id)";
		$statement = $db->prepare($query);
		$statement->bindValue(':txt', $txt);
		$statement->bindValue(':src', $src);
		$statement->bindValue(':img', $img);
		$statement->bindValue(':author_id', $author_id);
		$statement->execute();
	} catch (Exception $ex) {
		echo "Error with DB. Details: $ex";
		die();
	}
	header("Location: display.php/?quote=$quote_id");

	die();
} else if ($x == 'a') {
	echo "author";
} else if ($x == 'c') {
	echo "category";
} else {
	echo "<a class='button' href='insert.php?x=q'>Add Quote</a>";
	echo "<a class='button' href='insert.php?x=a'>Add Author</a>";
	echo "<a class='button' href='insert.php?x=c'>Add Category</a>";
}
