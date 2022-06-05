use peer_assessment;

-- Create assignments
INSERT INTO `assignments` (`unit_id`, `assignment_title`, `navbar_status`, `status`, `created_at`) VALUES
(17, 'Assignment 1', 0, 1, '2022-05-29 11:10:23');

-- Read assignments
SELECT * FROM assignments WHERE unit_id=17 AND assignment_title='Assignment 1';

-- Update assignments
UPDATE assignments
SET assignment_title = 'Project 1'
WHERE unit_id=17 AND assignment_title='Assignment 1';

-- Delete assignments
DELETE FROM assignments WHERE unit_id=17 AND assignment_title='Project 1';