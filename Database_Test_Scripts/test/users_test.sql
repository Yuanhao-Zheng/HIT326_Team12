use peer_assessment;

-- Create users
INSERT INTO `users` (`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`, `status`, `created_at`) VALUES
('', '$2y$12$vJkVkPn9CQw4lxytR71e/O4VrwovBL/v2f94mAqMZ/3ih5ZGyYzf2', 'User6', 'Test', 'user6@test.com', 0, 0, '2022-05-29 05:56:23');

-- Read users
SELECT * FROM users WHERE user_email='user6@test.com';

-- Update users
UPDATE users
SET user_firstname = 'Update', user_lastname= 'Test'
WHERE user_email = 'user6@test.com';

-- Delete users
DELETE FROM users WHERE user_email = 'user6@test.com';