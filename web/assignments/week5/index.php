<?php
require_once "team/dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT a.name AS \"author\", q.txt AS \"quote\", c.name AS \"category\"
FROM quote q
  JOIN author_quote aq ON aq.quote_id = q.id
  JOIN author a ON a.id = aq.author_id
  JOIN quote_category qc ON q.id = qc.quote_id
  JOIN category c ON c.id = qc.category_id;");
$quotes->execute();

echo "<h1>Quotes:</h1>";
$q = $quotes->fetch(PDO::FETCH_ASSOC);
$a = $q['author.name'];
var_dump($a);
exit;

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["author.name"];
  $quote = $row["quote.txt"];
  $cat = $row["category.name"];
  echo "<h3>$author</h3>";
  echo "<p>\"$quote\"</p>";
  echo "<p>$cat</p>";
  echo "$q";
}
