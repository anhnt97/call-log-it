/*
Navicat MySQL Data Transfer

Source Server         : PHP_1706
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : call_log_it

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-01 20:34:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `change` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_12_12_214834_create_teams_table', '1');
INSERT INTO `migrations` VALUES ('4', '2017_12_12_215028_create_parts_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_01_01_032035_create_comments_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_01_01_032354_create_status_table', '1');
INSERT INTO `migrations` VALUES ('7', '2018_01_01_032524_create_tickets_table', '1');

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `idTicket` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for parts
-- ----------------------------
DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of parts
-- ----------------------------
INSERT INTO `parts` VALUES ('1', 'Bộ phận IT Hà Nội', 'Hà Nội', 'bo-phan-it-ha-noi');
INSERT INTO `parts` VALUES ('2', 'Bộ phận IT Đà Nẵng', 'Đà Nẵng', 'bo-phan-it-da-nang');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('1', 'Mới nhất', 'moi-nhat');
INSERT INTO `status` VALUES ('2', 'Đang xử lý', 'dang-xu-ly');
INSERT INTO `status` VALUES ('3', 'Hoàn thành', 'hoan-thanh');
INSERT INTO `status` VALUES ('4', 'Phản hồi', 'phan-hoi');
INSERT INTO `status` VALUES ('5', 'Đã đóng', 'da-dong');
INSERT INTO `status` VALUES ('6', 'Hủy bỏ', 'huy-bo');
INSERT INTO `status` VALUES ('7', 'Quá hạn', 'qua-han');

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_part` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES ('1', 'Nhóm 1', null, null, null, 'nhom-1', '1');
INSERT INTO `teams` VALUES ('2', 'Nhóm H2ATeam', null, null, null, 'nhom-h2ateam', '1');
INSERT INTO `teams` VALUES ('3', 'Nhóm 2', null, null, null, 'nhom-2', '2');
INSERT INTO `teams` VALUES ('4', 'Nhóm 3', null, null, null, 'nhom-3', '1');
INSERT INTO `teams` VALUES ('5', 'Nhóm 4', null, null, null, 'nhom-4', '2');

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deadline` datetime NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `id_assign` int(11) DEFAULT NULL,
  `id_related` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `url_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `rate` int(11) DEFAULT NULL,
  `reasonrate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tickets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `id_team` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '100',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'admin@gmail.com', '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.', 'uploads/avatar/avatar.png', null, null, null, null, null, null, '500', 'GeZOuqyQuYnCQX63hbZZUgzfer2oWoIuhutfGRFWL6uPmc8ddxVCGT8HFOjd', '2018-01-01 11:07:48', '2018-01-01 11:07:48');
INSERT INTO `users` VALUES ('2', 'Trần Sách Hải', 'transachhai97@gmail.com', '$2y$10$OnN9yCPbweSFrvDLn2vKt.qhLCLAfQpBlhXCd.Lprsg/HfpHXH7x.', 'uploads/avatar/avatar.png', null, null, null, null, null, '2', '400', 'v7XJm0wLCpCNlymgaRt0wV8UebE2wV2HagihnnbuwWbyJgpZRYCZ9ypZ6xbd', '2018-01-01 11:30:50', '2018-01-01 11:30:50');
INSERT INTO `users` VALUES ('3', 'Nguyễn Tuấn Anh', 'tuananh05031997@gmail.com', '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.', 'uploads/avatar/avatar.png', null, null, null, null, null, '2', '300', null, null, null);
INSERT INTO `users` VALUES ('4', 'Vũ Gia Hùng', 'vugiahung.uet@gmail.com', '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.', 'uploads/avatar/avatar.png', null, null, null, null, null, '2', '200', null, null, null);
INSERT INTO `users` VALUES ('5', 'Member', 'member@gmail.com', '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.', 'uploads/avatar/avatar.png', null, null, null, null, null, null, '100', 'X1cKDmnGYn5x6cDQFSyfI6YDtbVQJl4XhmM1jGZBoXnKKNCqeBLUFvF3wgct', '2018-01-01 20:05:17', '2018-01-01 20:05:17');
INSERT INTO `users` VALUES ('6', 'Member1', 'member1@gmail.com', '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.', 'uploads/avatar/avatar.png', null, null, null, null, null, '5', '100', null, '2018-01-01 11:49:16', '2018-01-01 11:49:16');
INSERT INTO `users` VALUES ('7', 'Member2', 'member2@gmail.com', '$2y$10$2B6GlmxxRRGIAsDoA6SKEej2NWIxyvhSb380Q510NTu83vxnAPC3.', 'uploads/avatar/avatar.png', null, null, null, null, null, '5', '100', null, null, null);
