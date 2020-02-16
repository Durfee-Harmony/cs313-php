<?php
require_once "dbConnect.php";
$db = get_db();

function authors($db, $author_id)
{
  $authors = $db->prepare("SELECT * FROM author");
  $authors->execute();
  $a = "<select name='author_select' id='author_select'>";
  while ($row = $authors->fetch(PDO::FETCH_ASSOC)) {
    $name = $row["name"];
    $id = $row["id"];
    $a .= "<option id='$id' ";
    if($author_id == $id){
      $a .= "selected";
    }
    $a .= ">$name</option>";
  }
  $a .= "</select>";
  return $a;
}

function categories($db, $cat_id)
{
  $categories = $db->prepare("SELECT * FROM category");
  $categories->execute();
  $c = "<select name='category_select' id='category_select'>";
  while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
    $cat = $row["cat"];
    $id = $row["id"];
    $c .= "<option id='$id' ";
    if ($cat_id == $id) {
      $c .= "selected";
    }
    $c .= ">$cat</option>";
  }
  $c .= "</select>";
  return $c;
}

function addQuote($txt, $author, $cat)
{
  $db = get_db();
  $s = $db->prepare("SELECT id FROM author WHERE name = '$author'");
  $s->execute();
  $a = $s->fetch(PDO::FETCH_ASSOC);
  $author_id = $a["id"];
  $s = $db->prepare("SELECT id FROM category WHERE cat = '$cat'");
  $s->execute();
  $c = $s->fetch(PDO::FETCH_ASSOC);
  $cat_id = $c["id"];
  try {
    $query = "INSERT INTO quote (txt) VALUES ('$txt')";
    $statement = $db->prepare($query);
    $statement->execute();
    $quote = $db->prepare("SELECT MAX(id) FROM quote");
    $quote->execute();
    while ($row = $quote->fetch(PDO::FETCH_ASSOC)) {
      $quote_id = $row["max"];
      $add = $db->prepare("INSERT INTO author_quote (author_id, quote_id) VALUES ($author_id, $quote_id);");
      $add->execute();
      $state = $db->prepare("INSERT INTO quote_category (category_id, quote_id) VALUES ($cat_id, $quote_id);");
      $state->execute();
      header("Location: quote.php/?id=$quote_id");
    }
  } catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
  }
}

function update($id, $txt, $author, $cat)
{
  $db = get_db();
  $s = $db->prepare("SELECT id FROM author WHERE name = '$author'");
  $s->execute();
  $a = $s->fetch(PDO::FETCH_ASSOC);
  $author_id = $a["id"];
  $s = $db->prepare("SELECT id FROM category WHERE cat = '$cat'");
  $s->execute();
  $c = $s->fetch(PDO::FETCH_ASSOC);
  $cat_id = $c["id"];
  try {
    $query = "UPDATE quote SET txt = '$txt' WHERE id = $id";
    $statement = $db->prepare($query);
    $statement->execute();
    $quote = $db->prepare("SELECT * FROM quote WHERE id = $id");
    $quote->execute();
    while ($row = $quote->fetch(PDO::FETCH_ASSOC)) {
      $quote_id = $row["id"];
      $txt = $row["txt"];
      $add = $db->prepare("UPDATE author_quote SET author_id = $author_id WHERE quote_id = $quote_id");
      $add->execute();
      $state = $db->prepare("UPDATE quote_category SET category_id = $cat_id WHERE quote_id = $quote_id");
      $state->execute();
      header("Location: quote.php?id=$quote_id");
    }
  } catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
  }
}

function delete($id)
{
  $db = get_db();
  try {
    $statement = $db->prepare("DELETE FROM quote_category WHERE quote_id = $id");
    $statement->execute();
    $state = $db->prepare("DELETE FROM author_quote WHERE quote_id = $id");
    $state->execute();
    $s = $db->prepare("DELETE FROM quote WHERE id = $id");
    $s->execute();
    header('Location: index.php');
  } catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
  }
}

$i = filter_input(INPUT_POST, 'i');
if ($i == NULL) {
  $i = filter_input(INPUT_GET, 'i');
}

if ($i == 'q') {
  $txt = filter_input(INPUT_POST, 'txt');
  $author = filter_input(INPUT_POST, 'author_select');
  $cat = filter_input(INPUT_POST, 'category_select');
  addQuote($txt, $author, $cat);
} else if ($i == 'u') {
  echo " update ";
  $id = filter_input(INPUT_GET, 'id');
  $txt = filter_input(INPUT_POST, 'txt');
  $author = filter_input(INPUT_POST, 'author_select');
  $cat = filter_input(INPUT_POST, 'category_select');
  update($id, $txt, $author, $cat);
} else if ($i == 'd') {
  echo " delete ";
  $id = filter_input(INPUT_GET, 'id');
  delete($id);
}