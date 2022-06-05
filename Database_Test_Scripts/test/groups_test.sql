use peer_assessment;

-- Create groups
INSERT INTO `groups` (`assignment_id`, `group_number`, `navbar_status`, `status`, `created_at`) VALUES
(45, 1, 0, 1, '2022-05-29 11:13:03');

-- Read groups
SELECT * FROM groups WHERE assignment_id=45 AND group_number=1;

-- Update groups
UPDATE groups
SET group_number = 2
WHERE assignment_id=45 AND group_number=1;

-- Delete groups
DELETE FROM groups WHERE assignment_id=45 AND group_number=2;