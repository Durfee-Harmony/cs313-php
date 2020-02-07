---- php page queries ----




-- \echo '2a. How many events are there?'
-- SELECT COUNT(id) FROM w5_EVENT;

-- \echo '2b. How many participants are there?'
-- SELECT COUNT(id) FROM w5_PARTICIPANT;

-- \echo '3a. What is the third event when sorted alphabetically (by name)? '
-- SELECT name FROM w5_EVENT ORDER BY name LIMIT (1) OFFSET (2);

-- \echo '3b. What is the third event when sorted by ID? '
-- SELECT id, name FROM w5_EVENT ORDER BY id LIMIT (1) OFFSET (2);

-- \echo '4a. List the names alphabetically of all the participants in the ''Toughman Utah'' competition'
-- SELECT ep.participant_id, p.id, p.name
--   FROM w5_EVENT_PARTICIPANT ep
--     JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
--   WHERE ep.event_id = 5
-- ORDER BY p.name;

-- \echo '4b. List the names (sorted by id) of all the participants in the ''Kauai Marathon'' competition'
-- SELECT ep.participant_id, p.id, p.name
--   FROM w5_EVENT_PARTICIPANT ep
--     JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
--   WHERE ep.event_id = 11
-- ORDER BY p.id;

-- \echo '5a. How many competitions has ''Black Panther'' competed in?'
-- SELECT COUNT(event_id) FROM w5_EVENT_PARTICIPANT WHERE participant_id = 32;

-- \echo '5b. How can you verify that your count is correct?'
-- SELECT id, name FROM w5_PARTICIPANT WHERE name = 'Black Panther';
-- SELECT id, event_id, participant_id FROM w5_EVENT_PARTICIPANT WHERE participant_id = 32;

-- \echo '5c. Who has competed in the most competitions? How many have they competed in?'
-- SELECT p.name, COUNT(ep.participant_id)
--   FROM w5_EVENT_PARTICIPANT ep
-- JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
--   GROUP BY p.name
-- HAVING COUNT (ep.participant_id)=( 
--   SELECT MAX(mycount)
--     FROM (SELECT ep.participant_id, COUNT(ep.participant_id) mycount
--       FROM w5_EVENT_PARTICIPANT ep
--       GROUP BY ep.participant_id) AS max);

-- \echo '5d. Who has competed in the least competitions? How many have they competed in?'
-- SELECT p.name, COUNT(ep.participant_id)
--   FROM w5_EVENT_PARTICIPANT ep
-- JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
--   GROUP BY p.name
-- HAVING COUNT (ep.participant_id)=( 
--   SELECT MIN(mycount)
--     FROM (SELECT ep.participant_id, COUNT(ep.participant_id) mycount
--       FROM w5_EVENT_PARTICIPANT ep
--       GROUP BY ep.participant_id) AS min);

-- \echo '5d. people who have competed in 1 or more'
-- SELECT p.name, COUNT(ep.event_id) AS 'number of competitions'
--   FROM w5_EVENT_PARTICIPANT ep
--   JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
--   GROUP BY p.name;

-- \echo '5d. - people that didn''t compete in any'
-- SELECT name
--   FROM w5_PARTICIPANT
--   WHERE id NOT IN (SELECT participant_id FROM w5_EVENT_PARTICIPANT);

-- \echo '6a. Is there anyone who has competed in the same competition twice? '
-- SELECT p.name, event_id, COUNT(event_id)
--   FROM w5_EVENT_PARTICIPANT ep
--   JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
-- GROUP BY p.name, event_id
--   HAVING COUNT(event_id)>1;

-- \echo '6b. Which event had the most competitors? '
-- SELECT e.name, COUNT(ep.event_id)
--   FROM w5_EVENT_PARTICIPANT ep
-- JOIN w5_EVENT e ON e.id = ep.event_id
--   GROUP BY e.name
-- HAVING COUNT (ep.event_id)=( 
--   SELECT MAX(mycount)
--     FROM (SELECT ep.event_id, COUNT(ep.event_id) mycount
--       FROM w5_EVENT_PARTICIPANT ep
--       GROUP BY ep.event_id) AS max);

-- \echo '6c. Which event had the least competitors? '
-- SELECT e.name, COUNT(ep.event_id)
--   FROM w5_EVENT_PARTICIPANT ep
-- JOIN w5_EVENT e ON e.id = ep.event_id
--   GROUP BY e.name
-- HAVING COUNT (ep.event_id)=( 
--   SELECT MIN(mycount)
--     FROM (SELECT ep.event_id, COUNT(ep.event_id) mycount
--       FROM w5_EVENT_PARTICIPANT ep
--       GROUP BY ep.event_id) AS min);

-- \echo '6d. List all competitors that competed in the same event at least once '
-- SELECT p.name, event_id, COUNT(event_id)
--   FROM w5_EVENT_PARTICIPANT ep
--   JOIN w5_PARTICIPANT p ON p.id = ep.participant_id
-- GROUP BY p.name, event_id
--   HAVING COUNT(event_id)>1;

-------------------misinterpreted directions-------------------
-- SELECT p1.name, ep1.event_id, COUNT(*)
--   FROM w5_EVENT_PARTICIPANT ep1
--   JOIN w5_PARTICIPANT p1 ON p1.id = ep1.participant_id
--   GROUP BY p1.name, ep1.event_id
--   HAVING COUNT(*)=(SELECT p2.name, ep2.event_id
--                       FROM w5_EVENT_PARTICIPANT ep2
--                       JOIN w5_PARTICIPANT p2 ON p2.id = ep2.participant_id
--                       GROUP BY p2.name, ep2.event_id);

-- SELECT p1.id, p1.name, COUNT(p1.id) FROM w5_PARTICIPANT p1
-- JOIN w5_EVENT_PARTICIPANT ep1 ON p1.id = ep1.participant_id
--   HAVING COUNT(p1.id)=(SELECT p2.id, p2.name, COUNT(p2.id) FROM w5_PARTICIPANT p2
--             JOIN w5_EVENT_PARTICIPANT ep2 ON p2.id = ep2.participant_id
--             GROUP BY p2.id
--           HAVING COUNT(p2.id)=(SELECT COUNT(*) FROM w5_EVENT_PARTICIPANT ep1
--                   JOIN w5_EVENT_PARTICIPANT ep2 ON ep2.id = ep1.id
--                   GROUP BY ep1.id, ep2.id
--                   HAVING ep1.id = ep2.id))
-- ORDER BY p1.id;

-- SELECT p1.id, p1.name, (SELECT COUNT(e.id) FROM w5_EVENT e
--                           JOIN w5_EVENT_PARTICIPANT ep1 ON p1.id = ep1.participant_id
--                           JOIN w5_EVENT_PARTICIPANT ep2 ON ep2.event_id = ep1.event_id
--                           JOIN w5_PARTICIPANT p2 ON p2.id = ep2.participant_id
--                           WHERE e.id = ep1.event_id)
--   FROM w5_PARTICIPANT p1
-- ORDER BY p1.id;


-- \echo '6e. How many people competed in swim competitions?'
-- SELECT COUNT(ep.participant_id)
--   FROM w5_EVENT_TYPE et
--     JOIN w5_EVENT e ON et.id = e.type
--     JOIN w5_EVENT_PARTICIPANT ep ON ep.event_id = e.id
--   WHERE et.name = 'Swim Competition';

-- \echo '6f. What type of competition has the most overall competitors?'
-- SELECT et.name, COUNT(ep.participant_id)
--   FROM w5_EVENT_TYPE et
--     JOIN w5_EVENT e ON et.id = e.type
--     JOIN w5_EVENT_PARTICIPANT ep ON ep.event_id = e.id
--   WHERE et.name = 'Swim Competition'
--   GROUP BY et.name;

-------------------misinterpreted directions-------------------
-- SELECT et.name, COUNT(ep.participant_id)
--   FROM w5_EVENT_TYPE et
--     JOIN w5_EVENT e ON et.id = e.type
--     JOIN w5_EVENT_PARTICIPANT ep ON ep.event_id = e.id
--   WHERE et.id = 1
--   GROUP BY et.name;

-- SELECT et.name, MAX(p)
--   FROM w5_EVENT_TYPE et, (SELECT COUNT(ep.participant_id) p
--           FROM w5_EVENT_TYPE et
--           JOIN w5_EVENT e ON et.id = e.type
--           JOIN w5_EVENT_PARTICIPANT ep ON ep.event_id = e.id
--           WHERE et.id = 1) AS max
-- GROUP BY et.name;

-- SELECT et.name, e.name, COUNT(ep.event_id)
--   FROM w5_EVENT_PARTICIPANT ep
-- JOIN w5_EVENT e ON e.id = ep.event_id
-- JOIN w5_EVENT_TYPE et ON et.id = e.type
--   GROUP BY et.name, e.name
-- HAVING COUNT(ep.event_id)=( 
--   SELECT MAX(mycount)
--     FROM (SELECT ep.event_id, COUNT(ep.event_id) mycount
--       FROM w5_EVENT_PARTICIPANT ep
--       GROUP BY ep.event_id) AS max);

-- SELECT e.name, COUNT(ep.event_id)
--   FROM w5_EVENT_PARTICIPANT ep
-- JOIN w5_EVENT e ON e.id = ep.event_id
--   GROUP BY e.name
-- HAVING COUNT (ep.event_id)=( 
--   SELECT MAX(mycount)
--     FROM (SELECT ep.event_id, COUNT(ep.event_id) mycount
--       FROM w5_EVENT_PARTICIPANT ep
--       GROUP BY ep.event_id) AS max);