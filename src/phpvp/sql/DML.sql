INSERT INTO `php-prj`.`users` (`id`, `username`, `password`, `email`, `description`, `first_name`, `last_name`) VALUES (1, 'admin', 'admin', 'admin@none.com', 'description_1', 'admin', 'admin');
INSERT INTO `php-prj`.`users` (`id`, `username`, `password`, `email`, `description`, `first_name`, `last_name`) VALUES (2, 'test', 'test', 'test@none.com', 'description_2', 'test', 'test');
INSERT INTO `php-prj`.`users` (`id`, `username`, `password`, `email`, `description`, `first_name`, `last_name`) VALUES (3, 'test2', 'test2', 'test2@none.com', 'description_3', 'test2', 'test2');

INSERT INTO `php-prj`.`roles` (`id`, `name`, `description`) VALUES (1, 'ROLE_ADMIN', 'Admin');
INSERT INTO `php-prj`.`roles` (`id`, `name`, `description`) VALUES (2, 'ROLE_USER', 'User');
INSERT INTO `php-prj`.`roles` (`id`, `name`, `description`) VALUES (3, 'ROLE_USER', 'User');

INSERT INTO `php-prj`.`authorities` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `php-prj`.`authorities` (`user_id`, `role_id`) VALUES (2, 2);
INSERT INTO `php-prj`.`authorities` (`user_id`, `role_id`) VALUES (3, 2);

INSERT INTO `php-prj`.`accounts` (`id`, `acc_num`, `description`, `user_id`) VALUES (1, '9784543829216754', 'description_1', 2);
INSERT INTO `php-prj`.`accounts` (`id`, `acc_num`, `description`, `user_id`) VALUES (2, '1234534859203456', 'description_2', 2);
INSERT INTO `php-prj`.`accounts` (`id`, `acc_num`, `description`, `user_id`) VALUES (3, '5524550248496754', 'description_3', 3);
INSERT INTO `php-prj`.`accounts` (`id`, `acc_num`, `description`, `user_id`) VALUES (4, '1155744622468832', 'description_4', 3);

INSERT INTO `php-prj`.`payments` (from_acc, to_acc, payment_time, amount, description, status) VALUES ('9784543829216754', '5524550248496754', now(), 10000, 'description_1', 1);
INSERT INTO `php-prj`.`payments` (from_acc, to_acc, payment_time, amount, description, status) VALUES ('9784543829216754', '1155744622468832', now(), 20000, 'description_2', 1);
INSERT INTO `php-prj`.`payments` (from_acc, to_acc, payment_time, amount, description, status) VALUES ('1155744622468832', '1234534859203456', now(), 3000, 'description_3', 1);
INSERT INTO `php-prj`.`payments` (from_acc, to_acc, payment_time, amount, description, status) VALUES ('1155744622468832', '9784543829216754', now(), 4000, 'description_4', 1);