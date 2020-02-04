<?php
require "index.php";

function detail($id)
{
  $db = get_db();
  $scriptures = $db->prepare("SELECT * FROM w5_scriptures WHERE id = $id");
  $scriptures->execute();

  while ($fRow = $scriptures->fetch(PDO::FETCH_ASSOC)) {
    $book = $fRow["book"];
    $chapter = $fRow["chapter"];
    $verse = $fRow["verse"];
    $content = $fRow["content"];

    echo "<h2>$book $chapter:$verse</h2>";
    echo '<p>"' . $content . '"</p>';
  }
}