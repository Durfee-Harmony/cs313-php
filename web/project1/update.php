<?php
require_once "dbConnect.php";
$db = get_db();

$id = filter_input(INPUT_POST, 'id');
if ($id == NULL) {
  $id = filter_input(INPUT_GET, 'id');
}

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

$page .= "<form method='post' action='data.php?i=q&id=$id'><div>";
$page .= "<p>Update Quote Text: </p><input type='text' name='txt' id='txt' required>";
$page .= "<p>Update Quote Author: </p>";
$a = authors($db);
$page .= $a;
$page .= "<p>Update Quote Category: </p>";
$c = categories($db);
$page .= $c;
$page .= "</div><br><input type='submit' class='button' name='submit' value='Update Quote'>";
$page .= "<input type='hidden' name='i' value='q'></form>";

include "detail.php";