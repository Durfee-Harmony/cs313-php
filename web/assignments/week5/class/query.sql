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
-- SELECT COUNT(ep.event_id) FROM w5_EVENT_PARTICIPANT ep
--   JOIN w5_PARTICIPANT p ON p.id = ep.participant_id;

-- \echo '5d. Who has competed in the least competitions? How many have they competed in?'
---------------- Your code here ----------------

-- \echo '5d. people who have competed in 1 or more'
---------------- Your code here ----------------

-- \echo '5d. - people that didn''t compete in any'
---------------- Your code here ----------------

-- \echo '6a. Is there anyone who has competed in the same competition twice? '
---------------- Your code here ----------------

-- \echo '6b. Which event had the most competitors? '
---------------- Your code here ----------------

-- \echo '6c. Which event had the least competitors? '
---------------- Your code here ----------------

-- \echo '6d. List all competitors that competed in the same event at least once '
---------------- Your code here ----------------
