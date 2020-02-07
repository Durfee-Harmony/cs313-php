<?php 
require_once "../team/dbConnect.php";
$db = get_db();

$event = $db->prepare("SELECT * FROM w5_EVENT");
$event->execute();

echo "<h1>Events:</h1>";

while ($row = $event->fetch(PDO::FETCH_ASSOC)) {
  $name = $row["name"];
  $image = $row["image"];
  echo "<h3>$name</h3>";
  echo "<img src='$image' alt='picture of $name event'>";
}