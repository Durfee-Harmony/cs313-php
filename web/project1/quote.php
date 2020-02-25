<?php
require_once "dbConnect.php";
$db = get_db();

$id = filter_input(INPUT_POST, 'id');
if ($id == NULL) {
  $id = filter_input(INPUT_GET, 'id');
}

$quotes = $db->prepare("SELECT *
FROM quote q
  JOIN author_quote aq ON aq.quote_id = q.id
  JOIN author a ON a.id = aq.author_id
  JOIN quote_category qc ON q.id = qc.quote_id
  JOIN category c ON c.id = qc.category_id
WHERE q.id = :id");
$quotes->bindValue(':id', $id);
$quotes->execute();

$page = "<div id='quote'>";
while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["name"];
  $quote = $row["txt"];
  $cat = $row["cat"];
  $page .= "<br><h3 class='q'>Author: $author</h3>";
  $page .= "<p class='q'>\"$quote\"</p>";
  $page .= "<p class='q'><strong>Category: $cat</strong></p>";
  $page .= "<a class='button q' href='update.php?id=$id'>Update</a>";
  $page .= "<a class='button q' href='delete.php?id=$id'>Delete</a>";
  $page .= "<a class='button q' href='index.php'>Home</a>";
}
$page .= "</div>";

function detail($page)
{
  $page;
  include "detail.php";
}

detail($page);