DROP TABLE IF EXISTS w6_scriptures;

CREATE TABLE w6_scriptures
( id       SERIAL       NOT NULL PRIMARY KEY
, book     VARCHAR(50)  NOT NULL
, chapter  INT          NOT NULL
, verse    INT          NOT NULL
, content  VARCHAR(2000) NOT NULL);

CREATE TABLE w6_topic
( id   SERIAL      NOT NULL PRIMARY KEY
, name VARCHAR(50) NOT NULL);

CREATE TABLE w6_topic_scripture
( topic_id     INT NOT NULL REFERENCES w6_topic(id)
, scripture_id INT NOT NULL REFERENCES w6_scriptures(id));

INSERT INTO w6_scriptures
  ( book  , chapter, verse, content)
VALUES
  ( 'John', 1      , 5    , 'And the light shineth in darkness; and the darkness comprehended it not.');
  INSERT INTO w6_scriptures
  ( book , chapter, verse, content)
VALUES
  ( 'D&C', 88     , 49   , 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');
INSERT INTO w6_scriptures
  ( book , chapter, verse, content)
VALUES
  ( 'D&C', 93     , 28   , 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
INSERT INTO w6_scriptures
  ( book    , chapter, verse, content)
VALUES
  ( 'Mosiah', 16     , 9    , 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

SELECT *
FROM w6_scriptures;

INSERT INTO w6_topic (name) VALUES ('Faith');
INSERT INTO w6_topic (name) VALUES ('Sacrifice');
INSERT INTO w6_topic (name) VALUES ('Charity');
INSERT INTO w6_topic (name) VALUES ('Harmony');