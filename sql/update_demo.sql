INSERT INTO `users` (`user_id`, `email`, `password`, `remember_token`, `name`, `type`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'thitd@bulk.com', '$2y$10$/MpueH.lyBAIfz.ABwn1iuj5/ltDoO9LDdyxz.jk9InYe4XV2pvEq', 'dbVHTZGisINxWkcMvzMZc43sA1iJLr5vz6bixb3JgEUDBFoODqpwQgRV1eIe', 'Administrator', 'admin', NULL, '2018-07-11 14:23:22', '2018-07-13 08:44:50', 0, 0),
(2, 'admin@bulk.com', '$2y$10$grPPgzNO7YRax7K3jtzzY.WiPLW/A2A5hsPw295lrY2yMv7Mxkefu', 'dbVHTZGisINxWkcMvzMZc43sA1iJLr5vz6bixb3JgEUDBFoODqpwQgRV1eIe', 'Administrator', 'admin', NULL, '2018-07-11 14:23:22', '2018-07-13 08:44:50', 0, 0);

INSERT INTO `categories` (`category_id`, `parent_id`, `path`, `name`, `slug`, `description`, `order`, `status`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Go green', 'go-green', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(2, 0, NULL, 'Agricultural', 'agricultural', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(3, 0, NULL, 'Tea', 'tea', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(4, 0, NULL, 'Dairy products', 'dairy-products', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(5, 0, NULL, 'Seafoods', 'seafoods', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(6, 0, NULL, 'Meal & Poultry', 'meal-poultry', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL);
