<?php
require_once "dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT id, txt, img FROM quote");
$quotes->execute();
$page = "<header><h1>All Quotes:</h1>";
$page .= "<a class='button' href='insert.php?x=q'>Add Quote</a>";
// $page .= "<a class='button' href='insert.php?x=a'>Add Author</a>";
// $page .= "<a class='button' href='insert.php?x=c'>Add Category</a>";
$page .= "</header><div id='quote-div'>";
while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $id = $row["id"];
  $txt = $row["txt"];
  $img = $row["img"];
  if(isset($img)){
    $page .= "<img src='$img' alt='quote'>";
  }
  $page .= "<a class='quote' href='quote.php?id=$id'>$id: \"$txt\"</a>";
}
$page .= "</div>";
include "detail.php";


$x = filter_input(INPUT_POST, 'x');
if ($x == NULL) {
  $x = filter_input(INPUT_GET, 'x');
}
function detail($page)
{
  include "detail.php";
}