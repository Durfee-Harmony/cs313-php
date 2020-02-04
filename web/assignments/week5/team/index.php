<?php
require "dbConnect.php";
require "detail.php";
$db = get_db();

$scriptures = $db->prepare("SELECT * FROM w5_scriptures");
$scriptures->execute();

echo "<h1>Scripture Resources</h1>";

while ($fRow = $scriptures->fetch(PDO::FETCH_ASSOC)){
  $book = $fRow["book"];
  $chapter = $fRow["chapter"];
  $verse = $fRow["verse"];
  $content = $fRow["content"];
  //$id = $fRow["id"];

  echo "this worked";
  //echo '<p onclick="detail('. $id .')"><strong>' . $book . ' ' . $chapter . ':' . $verse . '</strong></p>';
}