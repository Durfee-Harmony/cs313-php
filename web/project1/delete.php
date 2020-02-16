<?php
require_once "dbConnect.php";
$db = get_db();
require_once "data.php";

$id = filter_input(INPUT_POST, 'id');
if ($id == NULL) {
  $id = filter_input(INPUT_GET, 'id');
}

$statement = $db->prepare("SELECT category_id FROM quote_category WHERE quote_id = $id");
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$c = $row["category_id"];
$state = $db->prepare("SELECT author_id FROM author_quote WHERE quote_id = $id");
$state->execute();
$row = $state->fetch(PDO::FETCH_ASSOC);
$a = $row["author_id"];
$s = $db->prepare("SELECT txt FROM quote WHERE id = $id");
$s->execute();
$row = $s->fetch(PDO::FETCH_ASSOC);
$txt = $row["txt"];

$page = "<form method='post' action='data.php?i=d&id=$id'><div>";
$page .= "<p>Update Quote Text: </p><input type='text' name='txt' id='txt' value='$txt' readonly>";
$page .= "<p>Update Quote Author: </p>";
$a = authors($db, $a);
$page .= $a;
$page .= "<p>Update Quote Category: </p>";
$c = categories($db, $c);
$page .= $c;
$page .= "</div><br><input type='submit' class='button' name='submit' value='Delete Quote'>";
$page .= "<input type='hidden' name='i' value='d'></form>";

include "detail.php";