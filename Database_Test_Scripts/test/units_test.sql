use peer_assessment;

-- Create units
INSERT INTO `units` (`unit_code`, `unit_name`, `unit_year`, `unit_semester`, `navbar_status`, `status`, `created_at`) VALUES
('HIT220', 'Algorithms and Complexity', 2021, 0, 0, 1, '2022-05-29 11:05:09');

-- Read units
SELECT * FROM units WHERE unit_code='HIT220';

-- Update units
UPDATE units
SET unit_year = 2022, unit_semester= 1
WHERE unit_code = 'HIT220';

-- Delete units
DELETE FROM units WHERE unit_code = 'HIT220';