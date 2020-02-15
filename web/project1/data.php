<?php
require("dbConnect.php");
$db = get_db();

function authors($db)
{
  $authors = $db->prepare("SELECT * FROM author");
  $authors->execute();
  $a = "<select id=author_select>";
  while ($row = $authors->fetch(PDO::FETCH_ASSOC)) {
    $name = $row["name"];
    $id = $row["id"];
    $a .= "<option id='$id'>$name</option>";
  }
  $a .= "</select>";
  return $a;
}

function categories($db)
{
  $categories = $db->prepare("SELECT * FROM category");
  $categories->execute();
  $a = "<select id=category_select>";
  while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
    $cat = $row["cat"];
    $id = $row["id"];
    $a .= "<option id='$id'>$cat</option>";
  }
  $a .= "</select>";
  return $a;
}

function addQuote($db)
{
  $txt = $_POST['txt'];
  $src = $_POST['src'];
  $img = $_POST['img'];
  $author_id = $_POST['author_id'];

  try {
    $query = "INSERT INTO quote (txt, src, img, author_id) VALUES (:txt, :src, :img, :author_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':txt', $txt);
    $statement->bindValue(':src', $src);
    $statement->bindValue(':img', $img);
    $statement->bindValue(':author_id', $author_id);
    $statement->execute();
  } catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    return false;
  }
  return true;
}


$i = filter_input(INPUT_POST, 'i');
if ($i == NULL) {
  $i = filter_input(INPUT_GET, 'i');
}
if ($i == 'q') {
  $q = addQuote($db);
  if ($q) {
    $quote = $db->prepare("SELECT MAX(id) FROM quote");
    $quote->execute();
    while ($row = $quote->fetch(PDO::FETCH_ASSOC)) {
      $quote_id = $row["id"];
      header("Location: quote.php/?id=$quote_id");
    }
  }
}
