/*
 Navicat Premium Data Transfer

 Source Server         : Darren
 Source Server Type    : MySQL
 Source Server Version : 100424 (10.4.24-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : sistembkk

 Target Server Type    : MySQL
 Target Server Version : 100424 (10.4.24-MariaDB)
 File Encoding         : 65001

 Date: 22/09/2024 01:36:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lamaran
-- ----------------------------
DROP TABLE IF EXISTS `lamaran`;
CREATE TABLE `lamaran`  (
  `id_lamaran` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NULL DEFAULT NULL,
  `id_lowongan` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `status` enum('Diterima','Ditolak','Sedang Diproses') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lamaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pengalaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_perusahaan` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_lamaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of lamaran
-- ----------------------------
INSERT INTO `lamaran` VALUES (3, 5, 3, '2024-09-14', 'Sedang Diproses', '089522747300', 'Email@gmail.com', 'p, lamar kerja', 'jago angkat barang', '11 tahun', 2);
INSERT INTO `lamaran` VALUES (6, 5, 1, '2024-09-14', 'Ditolak', '089522747300', 'Email@gmail.com', 'p', 'p', '12 tahun', 1);
INSERT INTO `lamaran` VALUES (7, 5, 2, '2024-09-14', 'Sedang Diproses', '089522747300', 'Email@gmail.com', 'a', 'a', '111 tahun', 1);
INSERT INTO `lamaran` VALUES (8, 6, 7, '2024-09-17', 'Ditolak', '082834972393', 'robin@gmail.com', 'p, lamar kerja', 'jago koding dan desain', '3 tahun', 6);
INSERT INTO `lamaran` VALUES (9, 7, 7, '2024-09-17', 'Ditolak', '0891381293192', 'robin@gmail.com', 'p, info loker', 'jago koding', '10 tahun', 6);
INSERT INTO `lamaran` VALUES (11, 6, 7, '2024-09-19', 'Sedang Diproses', '089522747300', 'Email@gmail.com', 'DARREN & YOGA.docx', 'DARREN & YOGA.docx', '4 tahun', 6);

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'Admin');
INSERT INTO `level` VALUES (2, 'Perusahaan');
INSERT INTO `level` VALUES (3, 'Siswa');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 290 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (1, 1, 'Login', '2024-09-10 13:08:42');
INSERT INTO `log` VALUES (2, 1, 'Logout', '2024-09-10 13:32:55');
INSERT INTO `log` VALUES (3, 1, 'Login', '2024-09-10 13:33:13');
INSERT INTO `log` VALUES (4, 1, 'Login', '2024-09-10 13:34:43');
INSERT INTO `log` VALUES (5, 1, 'Login', '2024-09-10 13:35:20');
INSERT INTO `log` VALUES (6, 1, 'Login', '2024-09-10 20:31:56');
INSERT INTO `log` VALUES (7, 1, 'Login', '2024-09-10 21:48:59');
INSERT INTO `log` VALUES (8, 1, 'Login', '2024-09-11 20:22:24');
INSERT INTO `log` VALUES (9, 1, 'Login', '2024-09-12 10:30:23');
INSERT INTO `log` VALUES (10, 1, 'Login', '2024-09-13 17:59:30');
INSERT INTO `log` VALUES (11, 1, 'Logout', '2024-09-13 19:43:05');
INSERT INTO `log` VALUES (12, 3, 'Login', '2024-09-13 19:59:14');
INSERT INTO `log` VALUES (13, 3, 'Login', '2024-09-13 20:05:30');
INSERT INTO `log` VALUES (14, 3, 'Login', '2024-09-13 20:07:24');
INSERT INTO `log` VALUES (15, 3, 'Login', '2024-09-13 20:08:24');
INSERT INTO `log` VALUES (16, 3, 'Login', '2024-09-13 20:10:54');
INSERT INTO `log` VALUES (17, 3, 'Login', '2024-09-13 20:11:41');
INSERT INTO `log` VALUES (18, 3, 'Login', '2024-09-13 20:13:26');
INSERT INTO `log` VALUES (19, 3, 'Logout', '2024-09-13 20:55:49');
INSERT INTO `log` VALUES (20, 3, 'Login', '2024-09-13 20:56:05');
INSERT INTO `log` VALUES (21, 3, 'Login', '2024-09-13 23:09:14');
INSERT INTO `log` VALUES (22, 3, 'Login', '2024-09-14 16:41:33');
INSERT INTO `log` VALUES (23, 3, 'Logout', '2024-09-14 16:44:17');
INSERT INTO `log` VALUES (24, 3, 'Login', '2024-09-14 16:45:36');
INSERT INTO `log` VALUES (25, 1, 'Login', '2024-09-14 19:13:29');
INSERT INTO `log` VALUES (26, 1, 'Masuk Menu Setting', '2024-09-14 19:13:35');
INSERT INTO `log` VALUES (27, 1, 'Masuk Menu Setting', '2024-09-14 19:27:49');
INSERT INTO `log` VALUES (28, 1, 'Masuk Menu Setting', '2024-09-14 19:29:51');
INSERT INTO `log` VALUES (29, 1, 'Masuk Menu Setting', '2024-09-14 19:30:03');
INSERT INTO `log` VALUES (30, 1, 'Masuk Menu Setting', '2024-09-14 19:30:12');
INSERT INTO `log` VALUES (31, 1, 'Masuk Menu Setting', '2024-09-14 19:35:06');
INSERT INTO `log` VALUES (32, 1, 'Masuk Menu Setting', '2024-09-14 19:35:18');
INSERT INTO `log` VALUES (33, 1, 'Masuk Menu Setting', '2024-09-14 19:36:12');
INSERT INTO `log` VALUES (34, 1, 'Masuk Menu Setting', '2024-09-14 19:36:30');
INSERT INTO `log` VALUES (35, 1, 'Masuk Menu Setting', '2024-09-14 19:37:02');
INSERT INTO `log` VALUES (36, 1, 'Masuk Menu Setting', '2024-09-14 19:37:40');
INSERT INTO `log` VALUES (37, 1, 'Masuk Menu Setting', '2024-09-14 19:38:18');
INSERT INTO `log` VALUES (38, 1, 'Masuk Menu Setting', '2024-09-14 19:38:29');
INSERT INTO `log` VALUES (39, 1, 'Masuk Menu Setting', '2024-09-14 19:39:13');
INSERT INTO `log` VALUES (40, 1, 'Masuk Menu Setting', '2024-09-14 19:39:20');
INSERT INTO `log` VALUES (41, 1, 'Masuk Menu Setting', '2024-09-14 19:39:31');
INSERT INTO `log` VALUES (42, 1, 'Masuk Menu Setting', '2024-09-14 19:40:52');
INSERT INTO `log` VALUES (43, 1, 'Masuk Menu Setting', '2024-09-14 19:41:15');
INSERT INTO `log` VALUES (44, 1, 'Masuk Menu Setting', '2024-09-14 19:42:12');
INSERT INTO `log` VALUES (45, 1, 'Masuk Menu Setting', '2024-09-14 19:42:20');
INSERT INTO `log` VALUES (46, 1, 'Masuk Menu Setting', '2024-09-14 19:42:48');
INSERT INTO `log` VALUES (47, 1, 'Masuk Menu Setting', '2024-09-14 19:43:59');
INSERT INTO `log` VALUES (48, 1, 'Masuk Menu Setting', '2024-09-14 19:44:35');
INSERT INTO `log` VALUES (49, 1, 'Masuk Menu Setting', '2024-09-14 19:44:49');
INSERT INTO `log` VALUES (50, 1, 'Masuk Menu Setting', '2024-09-14 19:45:10');
INSERT INTO `log` VALUES (51, 1, 'Masuk Menu Setting', '2024-09-14 19:46:20');
INSERT INTO `log` VALUES (52, 1, 'Masuk Menu Setting', '2024-09-14 19:47:51');
INSERT INTO `log` VALUES (53, 1, 'Masuk Menu Setting', '2024-09-14 19:48:32');
INSERT INTO `log` VALUES (54, 1, 'Masuk Menu Setting', '2024-09-14 19:49:08');
INSERT INTO `log` VALUES (55, 1, 'Masuk Menu Setting', '2024-09-14 19:49:45');
INSERT INTO `log` VALUES (56, 1, 'Logout', '2024-09-14 19:55:19');
INSERT INTO `log` VALUES (57, NULL, 'Logout', '2024-09-14 20:00:23');
INSERT INTO `log` VALUES (58, 1, 'Login', '2024-09-14 20:00:46');
INSERT INTO `log` VALUES (59, 1, 'Masuk Menu Setting', '2024-09-14 20:01:02');
INSERT INTO `log` VALUES (60, 1, 'Masuk Menu Setting', '2024-09-14 20:02:54');
INSERT INTO `log` VALUES (61, 1, 'Masuk Menu Setting', '2024-09-14 20:03:40');
INSERT INTO `log` VALUES (62, 1, 'Masuk Menu Setting', '2024-09-14 20:04:24');
INSERT INTO `log` VALUES (63, 1, 'Masuk Menu Setting', '2024-09-14 20:05:05');
INSERT INTO `log` VALUES (64, 1, 'Masuk Menu Setting', '2024-09-14 20:05:17');
INSERT INTO `log` VALUES (65, 1, 'Masuk Menu Setting', '2024-09-14 20:05:34');
INSERT INTO `log` VALUES (66, 1, 'Masuk Menu Setting', '2024-09-14 20:06:26');
INSERT INTO `log` VALUES (67, 1, 'Masuk Menu Setting', '2024-09-14 20:06:53');
INSERT INTO `log` VALUES (68, 1, 'Masuk Menu Setting', '2024-09-14 20:08:15');
INSERT INTO `log` VALUES (69, 1, 'Masuk Menu Setting', '2024-09-14 20:09:07');
INSERT INTO `log` VALUES (70, 1, 'Masuk Menu Setting', '2024-09-14 20:09:30');
INSERT INTO `log` VALUES (71, 1, 'Masuk Menu Setting', '2024-09-14 20:10:46');
INSERT INTO `log` VALUES (72, 1, 'Masuk Menu Setting', '2024-09-14 20:11:00');
INSERT INTO `log` VALUES (73, 1, 'Masuk Menu Setting', '2024-09-14 20:11:15');
INSERT INTO `log` VALUES (74, 1, 'Masuk Menu Setting', '2024-09-14 20:11:35');
INSERT INTO `log` VALUES (75, 1, 'Masuk Menu Setting', '2024-09-14 20:12:09');
INSERT INTO `log` VALUES (76, 1, 'Masuk Menu Setting', '2024-09-14 20:12:58');
INSERT INTO `log` VALUES (77, 1, 'Masuk Menu Setting', '2024-09-14 20:13:29');
INSERT INTO `log` VALUES (78, 1, 'Masuk Menu Setting', '2024-09-14 20:13:48');
INSERT INTO `log` VALUES (79, 1, 'Masuk Menu Setting', '2024-09-14 20:14:09');
INSERT INTO `log` VALUES (80, 1, 'Masuk Menu Setting', '2024-09-14 20:14:34');
INSERT INTO `log` VALUES (81, 1, 'Masuk Menu Setting', '2024-09-14 20:14:57');
INSERT INTO `log` VALUES (82, 1, 'Masuk Menu Setting', '2024-09-14 20:15:08');
INSERT INTO `log` VALUES (83, 1, 'Masuk Menu Setting', '2024-09-14 20:15:49');
INSERT INTO `log` VALUES (84, 1, 'Masuk Menu Setting', '2024-09-14 20:16:09');
INSERT INTO `log` VALUES (85, 1, 'Masuk Menu Setting', '2024-09-14 20:17:14');
INSERT INTO `log` VALUES (86, 1, 'Masuk Menu Setting', '2024-09-14 20:18:14');
INSERT INTO `log` VALUES (87, 1, 'Masuk Menu Setting', '2024-09-14 20:19:29');
INSERT INTO `log` VALUES (88, 1, 'Masuk Menu Setting', '2024-09-14 20:22:40');
INSERT INTO `log` VALUES (89, 1, 'Masuk Menu Setting', '2024-09-14 20:22:52');
INSERT INTO `log` VALUES (90, 1, 'Logout', '2024-09-14 20:23:09');
INSERT INTO `log` VALUES (91, 1, 'Login', '2024-09-14 20:24:51');
INSERT INTO `log` VALUES (92, 1, 'Masuk Log Activity', '2024-09-14 20:39:25');
INSERT INTO `log` VALUES (93, 1, 'Masuk Log Activity', '2024-09-14 20:48:35');
INSERT INTO `log` VALUES (94, 1, 'Masuk Log Activity', '2024-09-14 20:49:08');
INSERT INTO `log` VALUES (95, 1, 'Masuk Log Activity', '2024-09-14 20:51:23');
INSERT INTO `log` VALUES (96, 1, 'Masuk Log Activity', '2024-09-14 20:51:33');
INSERT INTO `log` VALUES (97, 1, 'Masuk Log Activity', '2024-09-14 20:51:58');
INSERT INTO `log` VALUES (98, 1, 'Masuk Log Activity', '2024-09-14 20:52:08');
INSERT INTO `log` VALUES (99, 1, 'Masuk Log Activity', '2024-09-14 20:52:20');
INSERT INTO `log` VALUES (100, 1, 'Login', '2024-09-15 00:15:59');
INSERT INTO `log` VALUES (101, 1, 'Login', '2024-09-15 15:09:34');
INSERT INTO `log` VALUES (102, 1, 'Logout', '2024-09-15 15:09:56');
INSERT INTO `log` VALUES (103, 2, 'Login', '2024-09-15 15:10:04');
INSERT INTO `log` VALUES (104, 2, 'Login', '2024-09-15 15:19:02');
INSERT INTO `log` VALUES (105, 2, 'Logout', '2024-09-15 15:29:08');
INSERT INTO `log` VALUES (106, 2, 'Login', '2024-09-15 15:29:20');
INSERT INTO `log` VALUES (107, 2, 'Logout', '2024-09-15 15:29:48');
INSERT INTO `log` VALUES (108, 2, 'Logout', '2024-09-15 15:47:28');
INSERT INTO `log` VALUES (109, 1, 'Login', '2024-09-15 20:26:25');
INSERT INTO `log` VALUES (110, 1, 'Logout', '2024-09-15 20:29:00');
INSERT INTO `log` VALUES (111, 2, 'Logout', '2024-09-15 20:31:46');
INSERT INTO `log` VALUES (112, 1, 'Login', '2024-09-15 20:32:11');
INSERT INTO `log` VALUES (113, 1, 'Logout', '2024-09-15 20:32:36');
INSERT INTO `log` VALUES (114, NULL, 'Logout', '2024-09-16 19:20:02');
INSERT INTO `log` VALUES (115, 2, 'Logout', '2024-09-16 19:25:38');
INSERT INTO `log` VALUES (116, 2, 'Logout', '2024-09-16 19:40:37');
INSERT INTO `log` VALUES (117, 2, 'Edit Profile', '2024-09-16 19:47:13');
INSERT INTO `log` VALUES (118, 2, 'Updated Profile Photo', '2024-09-16 19:47:58');
INSERT INTO `log` VALUES (119, 2, 'Updated Profile Photo', '2024-09-16 19:49:14');
INSERT INTO `log` VALUES (120, 2, 'Updated Profile Photo', '2024-09-16 19:49:32');
INSERT INTO `log` VALUES (121, 2, 'Edit Profile', '2024-09-16 19:49:54');
INSERT INTO `log` VALUES (122, 2, 'Edit Profile', '2024-09-16 19:56:07');
INSERT INTO `log` VALUES (123, 2, 'Edit Profile', '2024-09-16 19:56:09');
INSERT INTO `log` VALUES (124, 1, 'Login', '2024-09-17 12:49:51');
INSERT INTO `log` VALUES (125, 6, 'Login', '2024-09-17 12:53:14');
INSERT INTO `log` VALUES (126, 6, 'Logout', '2024-09-17 12:56:38');
INSERT INTO `log` VALUES (127, 5, 'Logout', '2024-09-17 13:21:46');
INSERT INTO `log` VALUES (128, 5, 'Logout', '2024-09-17 13:21:46');
INSERT INTO `log` VALUES (129, 5, 'Logout', '2024-09-17 13:30:40');
INSERT INTO `log` VALUES (130, 7, 'Login', '2024-09-17 13:31:24');
INSERT INTO `log` VALUES (131, 7, 'Logout', '2024-09-17 13:35:48');
INSERT INTO `log` VALUES (132, 2, 'Update Password', '2024-09-17 13:36:53');
INSERT INTO `log` VALUES (133, 3, 'Login', '2024-09-19 08:26:53');
INSERT INTO `log` VALUES (134, 3, 'Updated Profile Photo', '2024-09-19 08:27:54');
INSERT INTO `log` VALUES (135, 3, 'Updated Profile Photo', '2024-09-19 08:36:13');
INSERT INTO `log` VALUES (136, 3, 'Updated Profile Photo', '2024-09-19 08:36:22');
INSERT INTO `log` VALUES (137, 3, 'Edit Profile', '2024-09-19 08:37:53');
INSERT INTO `log` VALUES (138, 3, 'Edit Profile', '2024-09-19 08:38:09');
INSERT INTO `log` VALUES (139, 3, 'Edit Profile', '2024-09-19 08:38:27');
INSERT INTO `log` VALUES (140, 3, 'Edit Profile', '2024-09-19 08:38:39');
INSERT INTO `log` VALUES (141, 3, 'Update Password', '2024-09-19 08:39:19');
INSERT INTO `log` VALUES (142, 3, 'Login', '2024-09-19 08:39:30');
INSERT INTO `log` VALUES (143, 3, 'Logout', '2024-09-19 08:40:01');
INSERT INTO `log` VALUES (144, 5, 'Logout', '2024-09-19 08:59:30');
INSERT INTO `log` VALUES (145, NULL, 'Logout', '2024-09-19 20:15:25');
INSERT INTO `log` VALUES (146, 5, 'Logout', '2024-09-19 20:25:25');
INSERT INTO `log` VALUES (147, 6, 'Login', '2024-09-19 20:25:58');
INSERT INTO `log` VALUES (148, 6, 'Logout', '2024-09-19 20:42:25');
INSERT INTO `log` VALUES (149, 6, 'Login', '2024-09-19 20:46:28');
INSERT INTO `log` VALUES (150, 6, 'Logout', '2024-09-19 20:48:42');
INSERT INTO `log` VALUES (151, NULL, 'Logout', '2024-09-19 20:48:52');
INSERT INTO `log` VALUES (152, 5, 'Logout', '2024-09-19 21:12:25');
INSERT INTO `log` VALUES (153, NULL, 'Logout', '2024-09-19 21:18:27');
INSERT INTO `log` VALUES (154, NULL, 'Logout', '2024-09-19 21:27:26');
INSERT INTO `log` VALUES (155, NULL, 'Logout', '2024-09-19 21:33:25');
INSERT INTO `log` VALUES (156, NULL, 'Logout', '2024-09-19 21:42:25');
INSERT INTO `log` VALUES (157, NULL, 'Logout', '2024-09-19 21:52:25');
INSERT INTO `log` VALUES (158, NULL, 'Logout', '2024-09-19 21:58:25');
INSERT INTO `log` VALUES (159, NULL, 'Logout', '2024-09-19 22:04:25');
INSERT INTO `log` VALUES (160, NULL, 'Logout', '2024-09-19 22:50:24');
INSERT INTO `log` VALUES (161, NULL, 'Logout', '2024-09-19 22:56:24');
INSERT INTO `log` VALUES (162, NULL, 'Logout', '2024-09-19 23:02:24');
INSERT INTO `log` VALUES (163, NULL, 'Logout', '2024-09-19 23:08:24');
INSERT INTO `log` VALUES (164, NULL, 'Logout', '2024-09-19 23:14:24');
INSERT INTO `log` VALUES (165, NULL, 'Logout', '2024-09-20 20:43:12');
INSERT INTO `log` VALUES (166, NULL, 'Logout', '2024-09-20 20:43:13');
INSERT INTO `log` VALUES (167, 5, 'Logout', '2024-09-20 21:06:25');
INSERT INTO `log` VALUES (168, NULL, 'Logout', '2024-09-20 21:11:53');
INSERT INTO `log` VALUES (169, NULL, 'Logout', '2024-09-20 21:32:11');
INSERT INTO `log` VALUES (170, NULL, 'Logout', '2024-09-20 21:37:20');
INSERT INTO `log` VALUES (171, NULL, 'Logout', '2024-09-20 21:43:21');
INSERT INTO `log` VALUES (172, NULL, 'Logout', '2024-09-20 21:49:20');
INSERT INTO `log` VALUES (173, NULL, 'Logout', '2024-09-20 21:55:20');
INSERT INTO `log` VALUES (174, NULL, 'Logout', '2024-09-20 22:04:20');
INSERT INTO `log` VALUES (175, 7, 'Login', '2024-09-20 22:08:49');
INSERT INTO `log` VALUES (176, 7, 'Login', '2024-09-20 23:13:46');
INSERT INTO `log` VALUES (177, 7, 'Login', '2024-09-20 23:15:14');
INSERT INTO `log` VALUES (178, 7, 'Login', '2024-09-20 23:16:43');
INSERT INTO `log` VALUES (179, 7, 'Login', '2024-09-20 23:19:21');
INSERT INTO `log` VALUES (180, 7, 'Logout', '2024-09-20 23:46:20');
INSERT INTO `log` VALUES (181, 7, 'Login', '2024-09-20 23:50:09');
INSERT INTO `log` VALUES (182, 7, 'Login', '2024-09-20 23:52:03');
INSERT INTO `log` VALUES (183, 7, 'Logout', '2024-09-20 23:57:07');
INSERT INTO `log` VALUES (184, 7, 'Login', '2024-09-21 00:00:47');
INSERT INTO `log` VALUES (185, 7, 'Logout', '2024-09-21 00:08:03');
INSERT INTO `log` VALUES (186, 7, 'Login', '2024-09-21 00:08:14');
INSERT INTO `log` VALUES (187, 1, 'Login', '2024-09-21 11:58:47');
INSERT INTO `log` VALUES (188, 1, 'Logout', '2024-09-21 11:59:22');
INSERT INTO `log` VALUES (189, 7, 'Login', '2024-09-21 11:59:33');
INSERT INTO `log` VALUES (190, 7, 'Logout', '2024-09-21 12:04:48');
INSERT INTO `log` VALUES (191, NULL, 'Logout', '2024-09-21 12:10:49');
INSERT INTO `log` VALUES (192, NULL, 'Logout', '2024-09-21 12:16:49');
INSERT INTO `log` VALUES (193, NULL, 'Logout', '2024-09-21 12:22:49');
INSERT INTO `log` VALUES (194, NULL, 'Logout', '2024-09-21 12:28:49');
INSERT INTO `log` VALUES (195, NULL, 'Logout', '2024-09-21 15:40:51');
INSERT INTO `log` VALUES (196, NULL, 'Logout', '2024-09-21 15:40:57');
INSERT INTO `log` VALUES (197, 7, 'Login', '2024-09-21 15:41:26');
INSERT INTO `log` VALUES (198, 7, 'Login', '2024-09-21 15:42:21');
INSERT INTO `log` VALUES (199, 7, 'Logout', '2024-09-21 15:49:41');
INSERT INTO `log` VALUES (200, NULL, 'Logout', '2024-09-21 15:55:43');
INSERT INTO `log` VALUES (201, NULL, 'Logout', '2024-09-21 16:01:44');
INSERT INTO `log` VALUES (202, NULL, 'Logout', '2024-09-21 16:07:40');
INSERT INTO `log` VALUES (203, NULL, 'Logout', '2024-09-21 16:13:42');
INSERT INTO `log` VALUES (204, 7, 'Login', '2024-09-21 16:20:12');
INSERT INTO `log` VALUES (205, 7, 'Logout', '2024-09-21 16:33:40');
INSERT INTO `log` VALUES (206, NULL, 'Logout', '2024-09-21 16:39:42');
INSERT INTO `log` VALUES (207, 2, 'Logout', '2024-09-21 17:02:40');
INSERT INTO `log` VALUES (208, NULL, 'Logout', '2024-09-21 17:08:40');
INSERT INTO `log` VALUES (209, NULL, 'Logout', '2024-09-21 17:14:39');
INSERT INTO `log` VALUES (210, 3, 'Login', '2024-09-21 17:17:39');
INSERT INTO `log` VALUES (211, 3, 'Logout', '2024-09-21 17:18:57');
INSERT INTO `log` VALUES (212, 1, 'Login', '2024-09-21 17:19:06');
INSERT INTO `log` VALUES (213, 1, 'Logout', '2024-09-21 17:24:39');
INSERT INTO `log` VALUES (214, NULL, 'Logout', '2024-09-21 17:30:36');
INSERT INTO `log` VALUES (215, NULL, 'Logout', '2024-09-21 17:36:36');
INSERT INTO `log` VALUES (216, NULL, 'Logout', '2024-09-21 17:42:36');
INSERT INTO `log` VALUES (217, NULL, 'Logout', '2024-09-21 17:48:36');
INSERT INTO `log` VALUES (218, NULL, 'Logout', '2024-09-21 17:54:36');
INSERT INTO `log` VALUES (219, NULL, 'Logout', '2024-09-21 18:00:36');
INSERT INTO `log` VALUES (220, NULL, 'Logout', '2024-09-21 18:06:37');
INSERT INTO `log` VALUES (221, NULL, 'Logout', '2024-09-21 18:12:36');
INSERT INTO `log` VALUES (222, NULL, 'Logout', '2024-09-21 18:18:36');
INSERT INTO `log` VALUES (223, NULL, 'Logout', '2024-09-21 18:24:36');
INSERT INTO `log` VALUES (224, NULL, 'Logout', '2024-09-21 18:48:36');
INSERT INTO `log` VALUES (225, NULL, 'Logout', '2024-09-21 18:54:36');
INSERT INTO `log` VALUES (226, NULL, 'Logout', '2024-09-21 19:00:36');
INSERT INTO `log` VALUES (227, 1, 'Login', '2024-09-21 19:04:21');
INSERT INTO `log` VALUES (228, 1, 'Logout', '2024-09-21 19:09:36');
INSERT INTO `log` VALUES (229, 1, 'Login', '2024-09-21 19:13:07');
INSERT INTO `log` VALUES (230, 1, 'Updated Profile Photo', '2024-09-21 19:22:10');
INSERT INTO `log` VALUES (231, 1, 'Updated Profile Photo', '2024-09-21 19:24:07');
INSERT INTO `log` VALUES (232, 1, 'Updated Profile Photo', '2024-09-21 19:27:04');
INSERT INTO `log` VALUES (233, 1, 'Logout', '2024-09-21 19:38:37');
INSERT INTO `log` VALUES (234, NULL, 'Logout', '2024-09-21 20:12:26');
INSERT INTO `log` VALUES (235, 1, 'Login', '2024-09-21 20:12:38');
INSERT INTO `log` VALUES (236, 1, 'Updated Profile Photo', '2024-09-21 20:17:22');
INSERT INTO `log` VALUES (237, 1, 'Edit Profile of User ID: 7', '2024-09-21 20:30:48');
INSERT INTO `log` VALUES (238, 1, 'Updated Profile Photo', '2024-09-21 20:30:59');
INSERT INTO `log` VALUES (239, 1, 'Logout', '2024-09-21 20:36:37');
INSERT INTO `log` VALUES (240, 1, 'Login', '2024-09-21 20:37:53');
INSERT INTO `log` VALUES (241, 1, 'Edit Profile', '2024-09-21 20:38:12');
INSERT INTO `log` VALUES (242, 1, 'Edit Profile', '2024-09-21 20:38:13');
INSERT INTO `log` VALUES (243, 1, 'Edit Profile', '2024-09-21 20:38:13');
INSERT INTO `log` VALUES (244, 1, 'Edit Profile of User ID: 6', '2024-09-21 20:39:17');
INSERT INTO `log` VALUES (245, 1, 'Updated Profile Photo', '2024-09-21 20:39:27');
INSERT INTO `log` VALUES (246, 1, 'Logout', '2024-09-21 20:46:27');
INSERT INTO `log` VALUES (247, 1, 'Login', '2024-09-21 20:46:39');
INSERT INTO `log` VALUES (248, 1, 'Logout', '2024-09-21 20:58:36');
INSERT INTO `log` VALUES (249, 1, 'Login', '2024-09-21 21:01:49');
INSERT INTO `log` VALUES (250, 1, 'Logout', '2024-09-21 21:14:37');
INSERT INTO `log` VALUES (251, 1, 'Login', '2024-09-21 21:16:30');
INSERT INTO `log` VALUES (252, 1, 'Tambah User', '2024-09-21 21:21:45');
INSERT INTO `log` VALUES (253, 1, 'Tambah User', '2024-09-21 21:25:55');
INSERT INTO `log` VALUES (254, 1, 'Tambah User', '2024-09-21 21:28:06');
INSERT INTO `log` VALUES (255, 1, 'Logout', '2024-09-21 21:33:18');
INSERT INTO `log` VALUES (256, 1, 'Login', '2024-09-21 21:33:33');
INSERT INTO `log` VALUES (257, 1, 'Edit User', '2024-09-21 21:34:34');
INSERT INTO `log` VALUES (258, 1, 'Edit User', '2024-09-21 21:36:49');
INSERT INTO `log` VALUES (259, 1, 'Edit User', '2024-09-21 21:38:12');
INSERT INTO `log` VALUES (260, 1, 'Edit User', '2024-09-21 21:42:31');
INSERT INTO `log` VALUES (261, 1, 'Logout', '2024-09-21 21:48:36');
INSERT INTO `log` VALUES (262, 1, 'Login', '2024-09-21 21:51:44');
INSERT INTO `log` VALUES (263, 1, 'Hapus User', '2024-09-21 21:52:19');
INSERT INTO `log` VALUES (264, 1, 'Hapus User', '2024-09-21 22:04:45');
INSERT INTO `log` VALUES (265, 1, 'Hapus User', '2024-09-21 22:07:16');
INSERT INTO `log` VALUES (266, 1, 'Logout', '2024-09-21 22:34:37');
INSERT INTO `log` VALUES (267, NULL, 'Logout', '2024-09-21 22:39:42');
INSERT INTO `log` VALUES (268, 1, 'Login', '2024-09-21 22:41:18');
INSERT INTO `log` VALUES (269, 1, 'Masuk Menu Setting', '2024-09-21 22:45:55');
INSERT INTO `log` VALUES (270, 1, 'Edit User', '2024-09-21 22:51:27');
INSERT INTO `log` VALUES (271, 1, 'Logout', '2024-09-21 22:51:36');
INSERT INTO `log` VALUES (272, 1, 'Login', '2024-09-21 22:51:45');
INSERT INTO `log` VALUES (273, 1, 'Edit User', '2024-09-21 22:52:00');
INSERT INTO `log` VALUES (274, 1, 'Edit User', '2024-09-21 22:52:13');
INSERT INTO `log` VALUES (275, 1, 'Edit User', '2024-09-21 22:52:25');
INSERT INTO `log` VALUES (276, 1, 'Logout', '2024-09-21 22:54:46');
INSERT INTO `log` VALUES (277, 1, 'Login', '2024-09-21 22:54:54');
INSERT INTO `log` VALUES (278, 1, 'Logout', '2024-09-21 22:58:47');
INSERT INTO `log` VALUES (279, 1, 'Login', '2024-09-21 22:58:59');
INSERT INTO `log` VALUES (280, 1, 'Updated Profile Photo', '2024-09-21 22:59:46');
INSERT INTO `log` VALUES (281, 1, 'Updated Profile Photo', '2024-09-21 23:00:20');
INSERT INTO `log` VALUES (282, 1, 'Logout', '2024-09-21 23:02:42');
INSERT INTO `log` VALUES (283, 10, 'Login', '2024-09-21 23:19:10');
INSERT INTO `log` VALUES (284, NULL, 'Logout', '2024-09-22 01:20:08');
INSERT INTO `log` VALUES (285, NULL, 'Logout', '2024-09-22 01:25:46');
INSERT INTO `log` VALUES (286, 1, 'Login', '2024-09-22 01:31:10');
INSERT INTO `log` VALUES (287, 1, 'Masuk Dashboard', '2024-09-22 01:31:13');
INSERT INTO `log` VALUES (288, 1, 'Masuk Log Activity', '2024-09-22 01:31:51');
INSERT INTO `log` VALUES (289, 1, 'Logout', '2024-09-22 01:31:54');

-- ----------------------------
-- Table structure for lowongan
-- ----------------------------
DROP TABLE IF EXISTS `lowongan`;
CREATE TABLE `lowongan`  (
  `id_lowongan` int NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int NULL DEFAULT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `persyaratan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deadline` date NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `kategori` enum('Full-time','Part-time','Internship') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_lowongan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of lowongan
-- ----------------------------
INSERT INTO `lowongan` VALUES (1, 1, 'Office ', 'Bertugas mengurus dokumen dan data perusahaan', 'Wajib menguasai Excel', '2024-09-30', NULL, NULL, NULL, NULL, NULL, NULL, 'Part-time');
INSERT INTO `lowongan` VALUES (2, 1, 'Guru RPL', 'Mengajar RPL', 'Wajib menguasai PHP', '2024-09-30', NULL, NULL, NULL, NULL, NULL, NULL, 'Full-time');
INSERT INTO `lowongan` VALUES (3, 2, 'Kasir', 'Angkat Barang', 'Wajib menguasai coding', '2024-09-13', NULL, NULL, NULL, NULL, NULL, NULL, 'Internship');
INSERT INTO `lowongan` VALUES (6, 1, 'Guru MTK', 'Mengajar mtk untuk kelas 11 dan 12 di SMK Permata Harapan Batu Batam', 'Wajib menguasai MTK ', '2024-09-29', '2024-09-15 15:46:30', NULL, NULL, NULL, NULL, NULL, 'Full-time');
INSERT INTO `lowongan` VALUES (7, 6, 'Siswa PRAKERIND', 'Menyediakan fasilitas dan tugas untuk siswa PRAKERIND dari sekolah Permata Harapan', 'Menguasai VB .Net dan React JS', '2024-09-30', '2024-09-15 16:16:37', NULL, NULL, NULL, NULL, NULL, 'Internship');

-- ----------------------------
-- Table structure for notifikasi
-- ----------------------------
DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE `notifikasi`  (
  `id_notifikasi` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NULL DEFAULT NULL,
  `id_perusahaan` int NULL DEFAULT NULL,
  `id_lamaran` int NULL DEFAULT NULL,
  `status` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_lowongan` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_notifikasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifikasi
-- ----------------------------
INSERT INTO `notifikasi` VALUES (1, 5, 1, 6, 'Ditolak', 1);

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `id_perusahaan` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES (1, 2, 'Sekolah Permata Harapan', 'Baloi', '082280297788', NULL, NULL, NULL, NULL, NULL, NULL, 'sekolah bagus', 'logo_sph.png');
INSERT INTO `perusahaan` VALUES (2, 4, 'Ciptapuri SanDona', 'SanDona', '000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 'punya leo', 'g3.jpg');
INSERT INTO `perusahaan` VALUES (5, 1, 'Institut Teknologi Batam', 'Tiban sana jauh kali coy', '142834348342', NULL, NULL, NULL, NULL, NULL, NULL, 'Institusi Teknologi Batam (ITEBA) merupakan perusahaan di bidang konstruksi yang menyediakan rental kendaraan di Batam', NULL);
INSERT INTO `perusahaan` VALUES (6, 5, 'PT MEGA HOMAN INDONESIA', 'Sungai Panas', '0128938491489', NULL, NULL, NULL, NULL, NULL, NULL, 'PT MEGA HOMAN INDONESIA', '1726390441_e1b80da99cd79b125421.jpg');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `namawebsite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icontab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iconlogin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iconmenu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'Sistem BKK', 'koboi.jpeg', 'logo_sph_1.png', 'logo_sph.png');

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jurusan` enum('AKL','BDP','RPL') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterampilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (5, 3, 'Van Darren', '2006-12-29', 'RPL', 'Jago koding', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `siswa` VALUES (6, 6, 'Robin Wongso', '2006-12-07', 'RPL', 'Desain Grafis', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `siswa` VALUES (7, 7, 'Yoga Gautama', '2007-02-17', 'BDP', 'Mampu melelehkan hati wanita', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_level` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1, NULL, NULL, '2024-09-21 22:51:27', 1, NULL, NULL, '1726934420_7d2ac5238523380a9fc2.jpeg');
INSERT INTO `user` VALUES (2, 'der', '202cb962ac59075b964b07152d234b70', 'SPH@GMAIL.COM', 2, NULL, NULL, '2024-09-21 22:52:00', 1, NULL, NULL, '1726490971_fec1ef228f37e733a77e.jpeg');
INSERT INTO `user` VALUES (3, 'Darren', '202cb962ac59075b964b07152d234b70', 'VanDarren@gmail.com', 3, NULL, NULL, '2024-09-21 22:52:13', 1, NULL, NULL, '1726709782_c3d1040b486d53b9e228.jpeg');
INSERT INTO `user` VALUES (4, 'Leonardo', '0f759dd1ea6c4c76cedc299039ca4f23', NULL, 2, NULL, NULL, '2024-09-21 22:52:25', 1, NULL, NULL, NULL);
INSERT INTO `user` VALUES (5, 'PT2', 'PT2', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `user` VALUES (6, 'robin', '123', 'robinhitam@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, '1726925967_02758ed3ae9063f8d321.png');
INSERT INTO `user` VALUES (7, 'yoga', '1', 'yoga@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, '1726925459_ace383f7909f9ce011a6.png');
INSERT INTO `user` VALUES (8, 'DUMMY1', '3651c40ccc4450f2fc89fa3139dedd5a', NULL, 3, '2024-09-21 21:28:06', 1, NULL, NULL, NULL, NULL, 'user.png');
INSERT INTO `user` VALUES (10, 'DUMMY5', 'c4ca4238a0b923820dcc509a6f75849b', 'SPH@GMAIL.COM', 3, '2024-09-21 23:18:59', NULL, NULL, NULL, NULL, NULL, 'user.png');

-- ----------------------------
-- Table structure for user_backup
-- ----------------------------
DROP TABLE IF EXISTS `user_backup`;
CREATE TABLE `user_backup`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_level` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_backup
-- ----------------------------
INSERT INTO `user_backup` VALUES (1, 'Admin', 'admin', 'admin@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1726924642_f4126bcb81b31ec4d516.png');
INSERT INTO `user_backup` VALUES (2, 'der', '123', 'SPH@GMAIL.COM', 2, NULL, NULL, NULL, NULL, NULL, NULL, '1726490971_fec1ef228f37e733a77e.jpeg');
INSERT INTO `user_backup` VALUES (3, 'Darren', '123', 'VanDarren@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, '1726709782_c3d1040b486d53b9e228.jpeg');
INSERT INTO `user_backup` VALUES (4, 'Leonardo', 'leo', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
