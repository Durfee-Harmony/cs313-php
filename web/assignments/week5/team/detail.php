<?php
require "dbConnect.php";

$id = $_GET['id'];
if (isset($id)) {
  $db = get_db();
  $scriptures = $db->prepare("SELECT * FROM w5_scriptures WHERE id = $id");
  $scriptures->execute();

  while ($row = $scriptures->fetch(PDO::FETCH_ASSOC)) {
    $book = $row["book"];
    $chapter = $row["chapter"];
    $verse = $row["verse"];
    $content = $row["content"];

    echo "<h2>$book $chapter:$verse</h2>";
    echo "<p>\"$content\"</p>";
  }
}
else {
  require "index.php";
}