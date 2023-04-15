


-- configs definition

CREATE TABLE `configs` (
  `config_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=	utf8mb4_general_ci;

INSERT INTO configs
(name, content, active, created, modified, removed)
VALUES('benchmarck', 'douggonsouza\\gentelela\\benchmarck', 'yes', '2023-03-30 17:16:00', '2023-03-30 17:16:00', 0);
INSERT INTO configs
(name, content, active, created, modified, removed)
VALUES('routings', '/home/douglas/www/imwvg/src/routing.php', 'yes', '2023-03-31 07:49:29', '2023-03-31 07:49:29', 0);
INSERT INTO configs
(name, content, active, created, modified, removed)
VALUES('DEFAULT_LANGUAGE', '/home/douglas/www/imwvg/vendor/douggonsouza/gentelela/src/languages/pt-br.php', 'yes', '2023-04-07 14:35:03', '2023-04-07 14:35:03', 0);
INSERT INTO configs
(name, content, active, created, modified, removed)
VALUES('DEFAULT_CONFIGS_BENCHMARCK', '/home/douglas/www/imwvg/home/douglas/www/imwvg/vendor/douggonsouza/gentelela/src/configs.php', 'yes', '2023-04-07 14:37:17', '2023-04-07 14:37:17', 0);
INSERT INTO configs
(name, content, active, created, modified, removed)
VALUES('DEFAULT_TEMPLATES_BENCHMARCK', '/home/douglas/www/imwvg/vendor/douggonsouza/gentelela/src/templates.php', 'yes', '2023-04-07 14:38:50', '2023-04-07 14:38:50', 0);
INSERT INTO configs
(name, content, active, created, modified, removed)
VALUES('DEFAULT_TEMPLATE', '/home/douglas/www/imwvg/src/templates.php', 'yes', '2023-04-07 14:45:09', '2023-04-07 14:45:09', 0);

-- menus definition

CREATE TABLE `menus` (
  `menu_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sequence_id` int DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- papers definition

CREATE TABLE `papers` (
  `paper_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`paper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- permissions definition

CREATE TABLE `permissions` (
  `permission_id` int unsigned NOT NULL AUTO_INCREMENT,
  `permission_type_id` int unsigned NOT NULL DEFAULT '1',
  `paper_id` int unsigned NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `menu_id` bigint unsigned NOT NULL,
  `url` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- permissions_types definition

CREATE TABLE `permissions_types` (
  `permission_type_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`permission_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- users definition

CREATE TABLE `users` (
  `user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `paper_id` bigint unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `document` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `genre` enum('male','famale') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'male',
  `school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `office` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

