<?php
require_once "team/dbConnect.php";
$db = get_db();

$quote = $db->prepare("SELECT * FROM quote");
$quote->execute();

echo "<h1>Quotes:</h1>";

while ($row = $quote->fetch(PDO::FETCH_ASSOC)) {
  $name = $row["name"];
  echo "<h3>$name</h3>";
  echo "<img src='$image' alt='picture of $name quote' width='25%'>";
}
