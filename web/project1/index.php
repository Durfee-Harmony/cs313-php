<?php
require_once "dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT id, txt FROM quote");
$quotes->execute();

echo "<h1>Quotes:</h1>";

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $id = $row["id"];
  $quote = $row["txt"];
  echo "<a href='detail.php?id=$id'>\"$quote\"</a>";
}