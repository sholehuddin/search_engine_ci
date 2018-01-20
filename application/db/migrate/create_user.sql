CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `role` int DEFAULT 0,
  `state` int DEFAULT 1,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;