CREATE TABLE IF NOT EXISTS `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `parent` int,
  `state` int DEFAULT 1,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;