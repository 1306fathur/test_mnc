/*
 Navicat Premium Data Transfer

 Source Server         : local gw
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : berita

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 07/10/2021 15:26:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for beritas
-- ----------------------------
DROP TABLE IF EXISTS `beritas`;
CREATE TABLE `beritas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publish_date` datetime NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beritas
-- ----------------------------
INSERT INTO `beritas` VALUES (2, 'Berita Kamis', 'Ini Berita Kamis', 'The theme of a news item text example can be various. We can read a news item text about economy, news item text about healthy, or news item text example about funny news.  After understanding the definition and the purpose of a news', '2021-10-07 02:50:47');
INSERT INTO `beritas` VALUES (3, 'Berita Jumat', 'Ini Berita Jumat', 'The news item can be very effective way in spreading news. Meanwhile for student it can helps a lot in understanding English text.', '2021-10-07 02:51:00');
INSERT INTO `beritas` VALUES (4, 'Berita Sabtu', 'Ini Berita Sabtu', 'The news item can be very effective way in spreading news. Meanwhile for student it can helps a lot in understanding English.', '2021-10-07 15:22:58');

SET FOREIGN_KEY_CHECKS = 1;
