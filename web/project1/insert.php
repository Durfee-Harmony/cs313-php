<?php
$txt = $_POST['txt'];
$src = $_POST['src'];
$img = $_POST['img'];
$author_id = $_POST['author_id'];

require("dbConnect.php");
$db = get_db();

try
{
	$query = "INSERT INTO quote (txt, src, img, author_id) VALUES (:txt, :src, :img, :author_id)";
	$statement = $db->prepare($query);
	$statement->bindValue(':txt', $txt);
	$statement->bindValue(':src', $src);
	$statement->bindValue(':img', $img);
  $statement->bindValue(':author_id', $author_id);
  $statement->execute();
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: display.php/?quote=$quote_id");

die();
