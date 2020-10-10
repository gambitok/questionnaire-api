DROP TABLE IF EXISTS `questionnaire`;

CREATE TABLE `questionnaire` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `questionnaire` (name) VALUES ('question 1'), ('question 2'), ('question 3');