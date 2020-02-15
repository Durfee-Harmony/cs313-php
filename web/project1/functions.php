<?php

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
    die();
  }
  return TRUE;
}
