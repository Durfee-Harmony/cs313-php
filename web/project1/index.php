<?php
require_once "dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT id, txt, img FROM quote");
$quotes->execute();

echo "<link rel='stylesheet' type='text/css' href='../styles.css'/>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'/>";
echo "<h1>Quotes:</h1>";

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $id = $row["id"];
  $txt = $row["txt"];
  $img = $row["img"];
  if(isset($img)){
    echo "<img src='$img' alt='quote'>";
  }
  echo "<a class='quote' href='detail.php?id=$id'>\"$txt\"</a><br>";
}