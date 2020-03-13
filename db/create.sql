------------- Project 2 Database -------------
CREATE TABLE dragon
( id       SERIAL       NOT NULL PRIMARY KEY
, name     VARCHAR(50)  NOT NULL
, color    VARCHAR(50)  NOT NULL
, img      VARCHAR(100) NOT NULL
, strength INT          NOT NULL
, health   INT          NOT NULL
, power    INT          NOT NULL
);


------------- Project 1 Database -------------

-- CREATE TABLE author
-- ( id   SERIAL       NOT NULL PRIMARY KEY
-- , name VARCHAR(50)  NOT NULL
-- );

-- CREATE TABLE quote
-- ( id        SERIAL        NOT NULL PRIMARY KEY
-- , txt       VARCHAR(200)  NOT NULL
-- , src       VARCHAR(100)
-- , img       VARCHAR(50)
-- );

-- CREATE TABLE category
-- ( id   SERIAL       NOT NULL PRIMARY KEY
-- , cat VARCHAR(50)  NOT NULL
-- );

-- CREATE TABLE author_quote
-- ( author_id  INT NOT NULL REFERENCES author(id)
-- , quote_id   INT NOT NULL REFERENCES quote(id)
-- );

-- CREATE TABLE quote_category
-- ( category_id   INT NOT NULL REFERENCES category(id)
-- , quote_id      INT NOT NULL REFERENCES quote(id)
-- );