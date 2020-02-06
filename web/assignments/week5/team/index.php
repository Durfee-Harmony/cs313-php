<?php
require "dbConnect.php";
$db = get_db();

$scriptures = $db->prepare("SELECT * FROM w5_scriptures");
$scriptures->execute();

echo "<h1>Scripture Resources</h1>";

while ($row = $scriptures->fetch(PDO::FETCH_ASSOC)){
  $book = $row["book"];
  $chapter = $row["chapter"];
  $verse = $row["verse"];
  $content = $row["content"];
  $id = $row["id"];

  echo "this worked";
  echo "<p><a href='detail.php?id=$id'><strong>$book $chapter:$verse</strong></a></p>";
}