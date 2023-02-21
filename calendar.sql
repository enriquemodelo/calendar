/*
 Navicat Premium Data Transfer

 Source Server         : MySQL57
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : calendar

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 20/02/2023 22:45:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for calendario
-- ----------------------------
DROP TABLE IF EXISTS `calendario`;
CREATE TABLE `calendario`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `hora_inicio` datetime(0) NULL DEFAULT NULL,
  `hora_final` datetime(0) NULL DEFAULT NULL,
  `color_texto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `color_caja` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estatus` bit(1) NULL DEFAULT b'1',
  `fecha_creacion` datetime(0) NULL DEFAULT NULL,
  `fecha_update` datetime(0) NULL DEFAULT NULL,
  `fecha_delete` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calendario
-- ----------------------------
INSERT INTO `calendario` VALUES (1, 'test 1', 'test test tetgst dsw sd fsdfsdfsdfsdf  wewerew rwerw', '2023-02-20 12:45:06', '2023-02-20 13:45:11', '#000', '#28A745', b'1', '2023-02-20 12:45:16', NULL, NULL);
INSERT INTO `calendario` VALUES (2, 'test 2', 'test test tetgst dsw sd fsdfsdfsdfsdf  wewerew rwerw', '2023-02-21 12:45:06', '2023-02-21 13:45:11', '#000', '#DC3545', b'0', '2023-02-20 12:45:16', NULL, NULL);
INSERT INTO `calendario` VALUES (3, 'test 1', 'test test tetgst dsw sd fsdfsdfsdfsdf  wewerew rwerw', '2023-02-22 12:45:06', '2023-02-22 13:45:11', '#000', '#DC3545', b'0', '2023-02-20 12:45:16', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
