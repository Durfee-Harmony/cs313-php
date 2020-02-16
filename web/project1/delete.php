<?php
require_once "dbConnect.php";
$db = get_db();
require_once "data.php";

$quotes = $db->prepare("SELECT *
FROM quote q
  JOIN author_quote aq ON aq.quote_id = q.id
  JOIN author a ON a.id = aq.author_id
  JOIN quote_category qc ON q.id = qc.quote_id
  JOIN category c ON c.id = qc.category_id
WHERE q.id = :id");
$quotes->bindValue(':id', $id);
$quotes->execute();

$page = "";
while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["name"];
  $quote = $row["txt"];
  $cat = $row["cat"];

  $page .= "<br><h3>Author: $author</h3>";
  $page .= "<p>\"$quote\"</p>";
  $page .= "<p><strong>Category: $cat</strong></p>";
  $page .= "<a class='button' href='update.php?id=$id'>Update</a>";
}

include "detail.php";