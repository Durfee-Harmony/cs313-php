<?php
require_once "dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT id, txt, img FROM quote");
$quotes->execute();

echo "<link rel='stylesheet' type='text/css' href='../styles.css'/>";
echo "<link rel='stylesheet' type='text/css' href='styles.css'/>";
echo "<header><h1>All Quotes:</h1>";
echo "<a class='button' href='insert.php?x=q'>Add Quote</a>";
echo "<a class='button' href='insert.php?x=a'>Add Author</a>";
echo "<a class='button' href='insert.php?x=c'>Add Category</a>";
echo "<header><div id='quote-div'>";

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $id = $row["id"];
  $txt = $row["txt"];
  $img = $row["img"];
  if(isset($img)){
    echo "<img src='$img' alt='quote'>";
  }
  echo "<a class='quote' href='quote.php?id=$id'>\"$txt\"</a>";
}

echo "</div>";