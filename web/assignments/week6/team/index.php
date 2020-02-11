<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php

require("../tuesday/dbConnect.php");
$db = get_db();

$statement = $db->prepare("SELECT * FROM w6_scriptures");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $id = $row['id'];
  $book = $row['book'];
  $chapter = $row['chapter'];
  $verse = $row['verse'];
  $content = $row['content'];
  echo "<h2>$book</h2>";
  echo "<p>$chapter:$verse</p>";
  echo "<textarea>$content</textarea>";
  $statecheck = $db->prepare("SELECT * FROM w6_topic");
  $statecheck->execute();
  while ($row = $statecheck->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $name = $row['name'];
    echo "<input type='checkbox' value='$name' name='$id'>";
  }
  echo "<div class='col'><button class='btn btn-primary' type='submit'>Save me some food</button></div>";
}
