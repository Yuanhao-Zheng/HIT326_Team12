use peer_assessment;

-- Create reviews
INSERT INTO `reviews` (`join_id`, `criterion_1`, `criterion_2`, `criterion_3`, `criterion_4`, `submit_id`) VALUES
(21, 35, 35, 35, 35, 's135246');

-- Read reviews
SELECT * FROM reviews WHERE join_id=21 AND submit_id='s135246';

-- Update reviews
UPDATE reviews
SET criterion_1 = 36, criterion_2=34
WHERE join_id=21 AND submit_id='s135246';

-- Delete reviews
DELETE FROM reviews WHERE join_id=21 AND submit_id='s135246';