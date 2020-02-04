<!-- Page worked -->
<?php
require "dbConnect.php";
$db = get_db();

$scriptures = $db->prepare("SELECT * FROM w5_scriptures");
$scriptures->execute();

echo "<h1>Scripture Resources</h1>";

while ($fRow = $scriptures->fetch(PDO::FETCH_ASSOC)){
  $book = $fRow["book"];
  $chapter = $fRow["chapter"];
  $verse = $fRow["verse"];
  $content = $fRow["content"];

  echo '<p><strong>$book $chapter:$verse</strong> &ndash; "$content"</p>';
}