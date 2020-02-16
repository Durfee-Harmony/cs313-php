<?php
require_once "dbConnect.php";
$db = get_db();
require_once "data.php";

$id = filter_input(INPUT_POST, 'id');
if ($id == NULL) {
  $id = filter_input(INPUT_GET, 'id');
}

$page = "<form method='post' action='data.php?i=d&id=$id'><div>";
$page .= "<p>Update Quote Text: </p><input type='text' name='txt' id='txt' required>";
$page .= "<p>Update Quote Author: </p>";
$a = authors($db);
$page .= $a;
$page .= "<p>Update Quote Category: </p>";
$c = categories($db);
$page .= $c;
$page .= "</div><br><input type='submit' class='button' name='submit' value='Update Quote'>";
$page .= "<input type='hidden' name='i' value='d'></form>";

include "detail.php";