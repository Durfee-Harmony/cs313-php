<?php
require "dbConnect.php";
$db = get_db();

$scriptures = $db->prepare("SELECT * FROM w5_scriptures");
$scriptures->execute();

echo "<h1>Scripture Resources</h1>";

while ($row = $scriptures->fetch(PDO::FETCH_ASSOC)) {
  $book = $row["book"];
  $chapter = $row["chapter"];
  $verse = $row["verse"];
  $content = $row["content"];
  $id = $row["id"];
  echo "<p><a href='detail.php?id=$id'><strong>$book $chapter:$verse</strong></a></p>";
}

echo "<br><br><h3>Search for Scripture by Book:</h3>";
echo "<form method='post' action=''><input type='text' name='scriptureSearch'>";
echo "<button type='submit' name='search' value='Search'>Search</button></form>";

if (isset($_POST['search'])) {
  $searchString = $_POST['scriptureSearch'];
  var_dump($searchString);
  strtolower($searchString);
  var_dump($searchString);
  ucfirst($searchString);
  var_dump($searchString);
  $scriptureData = $db->prepare("SELECT * FROM w5_scriptures WHERE book = '$searchString'");
  $scriptureData->execute();
  while ($row = $scriptureData->fetch(PDO::FETCH_ASSOC)) {
    $book = $row['book'];
    $chapter = $row['chapter'];
    $verse = $row['verse'];
    $content = $row['content'];
    echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
  }
}
