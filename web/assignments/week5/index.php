<?php
require_once "team/dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT name, txt, cat
FROM quote q
  JOIN author_quote aq ON aq.quote_id = q.id
  JOIN author a ON a.id = aq.author_id
  JOIN quote_category qc ON q.id = qc.quote_id
  JOIN category c ON c.id = qc.category_id");
$quotes->execute();

echo "<h1>Quotes:</h1>";

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["name"];
  $quote = $row["txt"];
  $cat = $row["cat"];
  echo "<h3>$author</h3>";
  echo "<p>\"$quote\"</p>";
  echo "<p>$cat</p>";
}
