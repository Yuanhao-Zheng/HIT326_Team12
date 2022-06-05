use peer_assessment;

-- Create joins
INSERT INTO `joins` (`student_id`, `group_id`) VALUES
('s335628', 36);

-- Read joins
SELECT * FROM joins WHERE student_id='s335628' AND group_id=36;

-- Update joins
UPDATE joins
SET group_id = 37
WHERE student_id='s335628' AND group_id=36;

-- Delete joins
DELETE FROM joins WHERE student_id='s335628' AND group_id=37;