SELECT a.name AS "author", q.txt AS "quote", c.name AS "category"
FROM quote q
  JOIN author_quote aq ON aq.quote_id = q.id
  JOIN author a ON a.id = aq.author_id
  JOIN quote_category qc ON q.id = qc.quote_id
  JOIN category c ON c.id = qc.category_id;