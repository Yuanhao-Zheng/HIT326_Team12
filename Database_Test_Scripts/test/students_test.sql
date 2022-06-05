use peer_assessment;

-- Create students
INSERT INTO `students` (`student_id`, `student_firstname`, `student_lastname`, `status`, `created_at`) VALUES
('s520233', 'Test', 'MZTESTER', 1, '2022-05-29 11:19:31');

-- Read students
SELECT * FROM students WHERE student_id='s520233';

-- Update students
UPDATE students
SET student_firstname = 'Hail', student_lastname= 'Hydra'
WHERE student_id='s520233';

-- Delete students
DELETE FROM students WHERE student_id='s520233';