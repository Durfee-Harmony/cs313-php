<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php

require("../tuesday/dbConnect.php");
$db = get_db();

$statement = $db->prepare("SELECT * FROM w6_scriptures");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $scripture_id = $row['id'];
  $book = $row['book'];
  $chapter = $row['chapter'];
  $verse = $row['verse'];
  $content = $row['content'];
  echo "<h3>$book</h3>";
  echo "<p>$chapter:$verse</p>";
  echo "<textarea>$content</textarea>";
  $state = $db->prepare("SELECT * FROM w6_topic");
  $state->execute();
  while ($row = $state->fetch(PDO::FETCH_ASSOC)) {
    $topic_id = $row['id'];
    $name = $row['name'];
    echo "<br>$name <input type='checkbox' value='chk[ ]' name='$topic_id'>";
  }
  echo "<br><div class='col'><button class='btn btn-primary' type='submit'>Save the Topic</button></div>";
}
