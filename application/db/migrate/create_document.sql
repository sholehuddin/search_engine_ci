CREATE TABLE IF NOT EXISTS `document` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `document_title` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `description` text,
  `category_id` int NOT NULL,
  `state` int DEFAULT 1,
  `uploaded_by` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;