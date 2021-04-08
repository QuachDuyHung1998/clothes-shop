/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : clothes_shop

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 21/03/2021 15:38:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `is_children` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categories_category_id_foreign`(`category_id`) USING BTREE,
  CONSTRAINT `categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Nữ', 'nu', NULL, 0, 1, '2021-03-14 21:57:38', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (2, 'Nam', 'nam', NULL, 0, 1, '2021-03-14 21:57:38', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (3, 'Trẻ em', 'tre-em', NULL, 0, 1, '2021-03-14 21:57:38', '2021-03-15 08:45:16');
INSERT INTO `categories` VALUES (4, 'Đầm tơ thêu tay bồng', 'dam-to-theu-tay-bong', 1, 0, 1, '2021-03-14 22:04:14', '2021-03-15 08:44:59');
INSERT INTO `categories` VALUES (6, 'Áo khoác nữ', 'ao-khoac-nu', 1, 0, 1, '2021-03-14 22:24:48', '2021-03-15 08:45:14');
INSERT INTO `categories` VALUES (7, 'Áo khoác cho bé', 'ao-khoac-cho-be', 3, 1, 1, '2021-03-14 22:24:49', '2021-03-15 08:45:12');
INSERT INTO `categories` VALUES (8, 'Áo khoác nam', 'ao-khoac-nam', 2, 0, 1, '2021-03-14 22:24:50', '2021-03-15 08:45:17');
INSERT INTO `categories` VALUES (9, 'Áo polo nam', 'ao-polo-nam', 2, 0, 1, '2021-03-14 22:24:50', '2021-03-15 08:45:13');
INSERT INTO `categories` VALUES (10, 'Áo phông nam', 'ao-phong-nam', 2, 0, 1, '2021-03-14 22:24:51', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (11, 'Áo phao nữ', 'ao-phao-nu', 1, 0, 1, '2021-03-14 22:24:53', '2021-03-15 08:45:07');
INSERT INTO `categories` VALUES (12, 'Áo phao nam', 'ao-phao-nam', 2, 0, 1, '2021-03-14 22:24:53', '2021-03-15 08:45:07');
INSERT INTO `categories` VALUES (13, 'Quần jean nữ suông', 'quan-jean-nu-suong', 1, 0, 1, '2021-03-14 22:24:53', '2021-03-15 08:45:17');
INSERT INTO `categories` VALUES (14, 'Áo phông nữ', 'ao-phong-nu', 1, 0, 1, '2021-03-14 22:24:55', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (15, 'Áo polo nữ', 'ao-polo-nu', 1, 0, 1, '2021-03-14 22:24:56', '2021-03-15 08:45:13');
INSERT INTO `categories` VALUES (16, 'Quần âu nam', 'quan-au-nam', 2, 0, 1, '2021-03-14 22:24:56', '2021-03-15 08:45:14');
INSERT INTO `categories` VALUES (17, 'Áo sơ mi nam', 'ao-so-mi-nam', 2, 0, 1, '2021-03-14 22:24:56', '2021-03-15 08:45:03');
INSERT INTO `categories` VALUES (18, 'Áo sơ mi nữ', 'ao-so-mi-nu', 1, 0, 1, '2021-03-14 22:24:57', '2021-03-15 08:45:01');
INSERT INTO `categories` VALUES (19, 'Quần âu nữ suông', 'quan-au-nu-suong', 1, 0, 1, '2021-03-14 22:24:57', '2021-03-15 08:45:01');
INSERT INTO `categories` VALUES (20, 'Chân váy xòe', 'chan-vay-xoe', 1, 0, 1, '2021-03-14 22:24:57', '2021-03-15 08:45:05');
INSERT INTO `categories` VALUES (21, 'Váy nữ A', 'vay-nu-a', 1, 0, 1, '2021-03-14 22:24:57', '2021-03-15 08:45:17');
INSERT INTO `categories` VALUES (22, 'Áo thun nữ dài tay', 'ao-thun-nu-dai-tay', 1, 0, 1, '2021-03-14 22:24:58', '2021-03-15 08:45:15');
INSERT INTO `categories` VALUES (23, 'Áo polo nam', 'ao-polo-nam', 1, 0, 1, '2021-03-14 22:24:58', '2021-03-15 08:45:02');
INSERT INTO `categories` VALUES (24, 'Jean nữ baggy', 'jean-nu-baggy', 1, 0, 1, '2021-03-14 22:24:59', '2021-03-15 08:45:02');
INSERT INTO `categories` VALUES (25, 'Kid', 'kid', 3, 1, 1, '2021-03-14 22:24:59', '2021-03-15 08:45:14');
INSERT INTO `categories` VALUES (26, 'Áo phông nữ', 'ao-phong-nu', 2, 0, 1, '2021-03-14 22:25:01', '2021-03-15 08:45:03');
INSERT INTO `categories` VALUES (27, 'Quần âu nữ baggy', 'quan-au-nu-baggy', 1, 0, 1, '2021-03-14 22:25:03', '2021-03-15 08:45:03');
INSERT INTO `categories` VALUES (28, 'Áo phông nam', 'ao-phong-nam', 1, 0, 1, '2021-03-14 22:25:04', '2021-03-15 08:45:03');
INSERT INTO `categories` VALUES (29, 'Áo sơ mi nữ dài tay', 'ao-so-mi-nu-dai-tay', 1, 0, 1, '2021-03-14 22:25:12', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (30, 'Áo măng tô nữ dáng dài', 'ao-mang-to-nu-dang-dai', 1, 0, 1, '2021-03-14 22:25:12', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (31, 'Chân váy A', 'chan-vay-a', 1, 0, 1, '2021-03-14 22:25:13', '2021-03-15 08:45:12');
INSERT INTO `categories` VALUES (32, 'Bộ quần áo nam suông trơn', 'bo-quan-ao-nam-suong-tron', 2, 0, 1, '2021-03-14 22:25:14', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (33, 'Bộ quần áo nữ', 'bo-quan-ao-nu', 1, 0, 1, '2021-03-14 22:25:15', '2021-03-15 08:45:16');
INSERT INTO `categories` VALUES (34, 'Váy nữ', 'vay-nu', 1, 0, 1, '2021-03-14 22:25:19', '2021-03-15 08:45:09');
INSERT INTO `categories` VALUES (35, 'Áo sơ mi nam dài tay', 'ao-so-mi-nam-dai-tay', 2, 0, 1, '2021-03-14 22:25:20', '2021-03-15 08:45:14');
INSERT INTO `categories` VALUES (36, 'Áo vest nữ suông trơn', 'ao-vest-nu-suong-tron', 1, 0, 1, '2021-03-14 22:25:21', '2021-03-15 08:45:17');
INSERT INTO `categories` VALUES (37, 'Chân váy ôm', 'chan-vay-om', 1, 0, 1, '2021-03-14 22:30:29', '2021-03-15 08:45:06');
INSERT INTO `categories` VALUES (38, 'Quần jean nam', 'quan-jean-nam', 2, 0, 1, '2021-03-14 22:30:29', '2021-03-15 08:45:17');
INSERT INTO `categories` VALUES (39, 'Áo khoác gió nam', 'ao-khoac-gio-nam', 2, 0, 1, '2021-03-14 22:30:50', '2021-03-15 08:45:10');
INSERT INTO `categories` VALUES (40, 'Áo khoác gió nữ', 'ao-khoac-gio-nu', 1, 0, 1, '2021-03-14 22:30:54', '2021-03-15 08:45:10');
INSERT INTO `categories` VALUES (41, 'Áo phông cho bé', 'ao-phong-cho-be', 3, 1, 1, '2021-03-14 22:31:05', '2021-03-15 08:45:16');
INSERT INTO `categories` VALUES (42, 'Áo jean nam (ajm)', 'ao-jean-nam-ajm', 2, 0, 1, '2021-03-14 22:31:21', '2021-03-15 08:45:14');
INSERT INTO `categories` VALUES (43, 'Váy nữ suông', 'vay-nu-suong', 1, 0, 1, '2021-03-14 22:31:23', '2021-03-15 08:45:18');
INSERT INTO `categories` VALUES (44, 'Quần nam khác (QKM)', 'quan-nam-khac-qkm', 2, 0, 1, '2021-03-14 22:31:36', '2021-03-15 08:45:15');
INSERT INTO `categories` VALUES (45, 'Áo sơ mi nữ cộc tay', 'ao-so-mi-nu-coc-tay', 1, 0, 1, '2021-03-14 22:31:36', '2021-03-15 08:45:15');
INSERT INTO `categories` VALUES (46, 'Váy nữ xòe', 'vay-nu-xoe', 1, 0, 1, '2021-03-14 22:31:39', '2021-03-15 08:45:16');
INSERT INTO `categories` VALUES (47, 'Áo khoác jean nữ', 'ao-khoac-jean-nu', 1, 0, 1, '2021-03-14 22:31:40', '2021-03-15 08:45:16');
INSERT INTO `categories` VALUES (48, 'Chân váy jean', 'chan-vay-jean', 1, 0, 1, '2021-03-14 22:31:40', '2021-03-15 08:45:16');
INSERT INTO `categories` VALUES (49, 'Áo vest nữ ôm trơn', 'ao-vest-nu-om-tron', 1, 0, 1, '2021-03-14 22:31:45', '2021-03-15 08:45:17');
INSERT INTO `categories` VALUES (50, 'Bộ quần áo nam', 'bo-quan-ao-nam', 2, 0, 1, '2021-03-14 22:31:56', '2021-03-15 08:32:03');
INSERT INTO `categories` VALUES (51, 'Áo măng tô nữ', 'ao-mang-to-nu', 1, 0, 1, '2021-03-14 22:32:09', '2021-03-15 08:33:07');
INSERT INTO `categories` VALUES (52, 'Quần legging nữ', 'quan-legging-nu', 1, 0, 1, '2021-03-14 22:32:25', '2021-03-15 08:33:12');
INSERT INTO `categories` VALUES (53, 'Áo vest nam', 'ao-vest-nam', 2, 0, 1, '2021-03-14 22:32:26', '2021-03-15 08:33:08');
INSERT INTO `categories` VALUES (54, 'Bộ đồ cho bé', 'bo-do-cho-be', 3, 1, 1, '2021-03-14 22:32:27', '2021-03-15 08:32:12');
INSERT INTO `categories` VALUES (55, 'Váy nữ ôm', 'vay-nu-om', 1, 0, 1, '2021-03-14 22:32:32', '2021-03-15 08:33:15');
INSERT INTO `categories` VALUES (56, 'Áo len nữ', 'ao-len-nu', 1, 0, 1, '2021-03-14 22:32:52', '2021-03-15 08:33:08');
INSERT INTO `categories` VALUES (57, 'Áo len nam', 'ao-len-nam', 2, 0, 1, '2021-03-14 22:33:02', '2021-03-15 08:32:37');
INSERT INTO `categories` VALUES (58, 'Chân váy', 'chan-vay', 1, 0, 1, '2021-03-14 22:33:14', '2021-03-15 08:33:10');
INSERT INTO `categories` VALUES (59, 'Váy thun nữ', 'vay-thun-nu', 1, 0, 1, '2021-03-14 22:33:14', '2021-03-15 08:32:55');
INSERT INTO `categories` VALUES (60, 'Quần sooc nữ', 'quan-sooc-nu', 1, 0, 1, '2021-03-14 22:33:21', '2021-03-15 08:32:53');
INSERT INTO `categories` VALUES (61, 'Quần short jean nam', 'quan-short-jean-nam', 2, 0, 1, '2021-03-14 22:33:23', '2021-03-15 08:32:53');
INSERT INTO `categories` VALUES (62, 'Quần short nam', 'quan-short-nam', 2, 0, 1, '2021-03-14 22:33:40', '2021-03-15 08:32:57');
INSERT INTO `categories` VALUES (63, 'Áo ba lỗ nam', 'ao-ba-lo-nam', 2, 0, 1, '2021-03-14 22:33:46', '2021-03-15 08:32:27');
INSERT INTO `categories` VALUES (64, 'Ưu đãi HOT - Mua 2 còn 119K/chiếc', 'uu-dai-hot-mua-2-con-119k-chiec', 2, 0, 1, '2021-03-14 22:33:48', '2021-03-15 08:32:54');
INSERT INTO `categories` VALUES (65, 'Quần âu nữ', 'quan-au-nu', 1, 0, 1, '2021-03-14 22:33:59', '2021-03-15 08:33:10');
INSERT INTO `categories` VALUES (66, 'Ưu đãi HOT - Mua 2 còn 119K/chiếc', 'uu-dai-hot-mua-2-con-119k-chiec', 1, 0, 1, '2021-03-14 22:34:04', '2021-03-15 08:32:34');
INSERT INTO `categories` VALUES (67, 'Set len nữ', 'set-len-nu', 1, 0, 1, '2021-03-14 22:34:18', '2021-03-15 08:32:35');
INSERT INTO `categories` VALUES (68, 'Jumpsuit xòe họa tiết (BJN).Trend', 'jumpsuit-xoe-hoa-tiet-bjntrend', 1, 0, 1, '2021-03-14 22:34:20', '2021-03-15 08:32:36');
INSERT INTO `categories` VALUES (69, 'Đầm bé gái', 'dam-be-gai', 1, 0, 1, '2021-03-14 22:34:32', '2021-03-15 08:33:02');
INSERT INTO `categories` VALUES (70, 'Áo vest nữ', 'ao-vest-nu', 1, 0, 1, '2021-03-14 22:34:33', '2021-03-15 08:33:07');
INSERT INTO `categories` VALUES (71, 'Quần jean nữ', 'quan-jean-nu', 1, 0, 1, '2021-03-14 22:34:35', '2021-03-15 08:32:53');
INSERT INTO `categories` VALUES (72, 'Áo ba lỗ -2 dây (BLN)', 'ao-ba-lo-2-day-bln', 1, 0, 1, '2021-03-14 22:34:48', '2021-03-15 08:32:48');
INSERT INTO `categories` VALUES (73, 'Áo sơ mi nam cộc tay', 'ao-so-mi-nam-coc-tay', 2, 0, 1, '2021-03-14 22:34:51', '2021-03-15 08:32:56');
INSERT INTO `categories` VALUES (74, 'Áo vest nam dáng suông', 'ao-vest-nam-dang-suong', 2, 0, 1, '2021-03-14 22:35:38', '2021-03-15 08:33:00');
INSERT INTO `categories` VALUES (75, 'Áo ghi lê nam', 'ao-ghi-le-nam', 2, 0, 1, '2021-03-14 22:36:01', '2021-03-15 08:33:12');
INSERT INTO `categories` VALUES (76, 'Duy Phát ký gửi', 'duy-phat-ky-gui', 1, 0, 1, '2021-03-14 22:36:05', '2021-03-15 08:33:11');
INSERT INTO `categories` VALUES (77, 'Áo vest nam dáng ôm', 'ao-vest-nam-dang-om', 2, 0, 1, '2021-03-14 22:36:07', '2021-03-15 08:33:13');
INSERT INTO `categories` VALUES (78, 'Giầy/ Dép nam', 'giay-dep-nam', 2, 0, 1, '2021-03-14 22:36:07', '2021-03-15 08:33:12');

SET FOREIGN_KEY_CHECKS = 1;
