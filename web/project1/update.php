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

$page = "<div id='quote'>";
$page .= "<form method='post' action='data.php?i=u&id=$id' id='quote-form'><div>";
$page .= "<p class='q'>Update Quote Text: </p><input type='text' name='txt' id='txt' value='$txt' required>";
$page .= "<p class='q'>Update Quote Author: </p>";
$a = authors($db, $a);
$page .= $a;
$page .= "<p class='q'>Update Quote Category: </p>";
$c = categories($db, $c);
$page .= $c;
$page .= "</div><br><input type='submit' class='button q' name='submit' value='Update Quote'>";
$page .= "<input type='hidden' name='i' value='u'></form></div>";

function detail($page)
{
  $page;
  include "detail.php";
}

detail($page);


// $quotes = $db->prepare("SELECT * FROM quote q
//   JOIN author_quote aq ON aq.quote_id = q.id
//   JOIN author a ON a.id = aq.author_id
//   JOIN quote_category qc ON q.id = qc.quote_id
//   JOIN category c ON c.id = qc.category_id
// WHERE q.id = :id");
// $quotes->bindValue(':id', $id);
// $quotes->execute();

// $page = "";
// while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
//   $author = $row["name"];
//   $quote = $row["txt"];
//   $cat = $row["cat"];

//   $page .= "<br><h3>Author: $author</h3>";
//   $page .= "<p>\"$quote\"</p>";
//   $page .= "<p><strong>Category: $cat</strong></p>";
//   $page .= "<a class='button' href='update.php?id=$id'>Update</a>";
// }