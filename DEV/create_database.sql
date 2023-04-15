
-- create_database


CREATE DATABASE `discovery` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

-- discovery.accesses definition

CREATE TABLE `accesses` (
  `access_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- discovery.accessesPages definition

CREATE TABLE `accessesPages` (
  `accessPage_id` int unsigned NOT NULL AUTO_INCREMENT,
  `access_id` bigint unsigned NOT NULL,
  `page_id` bigint unsigned NOT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`accessPage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- discovery.pages definition

CREATE TABLE `pages` (
  `page_id` int unsigned NOT NULL AUTO_INCREMENT,
  `showName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `router` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stepOne_id` bigint unsigned NOT NULL,
  `url` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- discovery.stepsOne definition

CREATE TABLE `stepsOne` (
  `stepOne_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `showName` varchar(25) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`stepOne_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- discovery.users definition

CREATE TABLE `users` (
  `user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `access_id` bigint unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `document` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `genre` enum('male','famale') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'male',
  `school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `office` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `removed` bigint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
