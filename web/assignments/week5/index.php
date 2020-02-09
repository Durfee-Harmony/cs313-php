<?php
require_once "team/dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT * FROM author");
$quotes->execute();

echo "<h1>Quotes:</h1>";
$q = $quotes->fetch(PDO::FETCH_ASSOC);
$a = $q['name'];
var_dump($a);
exit;

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["author.name"];
  $quote = $row["quote.txt"];
  $cat = $row["category.name"];
  echo "<h3>$author</h3>";
  echo "<p>\"$quote\"</p>";
  echo "<p>$cat</p>";
  echo "$q";
}
