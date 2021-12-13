/*
 Navicat Premium Data Transfer

 Source Server         : local-mysql
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : productionreport

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 10/12/2019 16:55:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cutting
-- ----------------------------
DROP TABLE IF EXISTS `cutting`;
CREATE TABLE `cutting`  (
  `id_cutting` int(11) NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint(1) NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `boxes` int(11) NULL DEFAULT NULL,
  `prepare_on` date NULL DEFAULT NULL,
  `date_created` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_cutting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cutting_detail
-- ----------------------------
DROP TABLE IF EXISTS `cutting_detail`;
CREATE TABLE `cutting_detail`  (
  `id_cutting_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_cutting` int(11) NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grup_size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `cutting_sam` decimal(4, 3) NULL DEFAULT NULL,
  `sam_result` decimal(4, 3) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cutting_date` date NULL DEFAULT NULL,
  `outermold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `printed_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_cutting_detail`) USING BTREE,
  INDEX `fk_cutting`(`id_cutting`) USING BTREE,
  CONSTRAINT `fk_cutting` FOREIGN KEY (`id_cutting`) REFERENCES `cutting` (`id_cutting`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for input_cutting
-- ----------------------------
DROP TABLE IF EXISTS `input_cutting`;
CREATE TABLE `input_cutting`  (
  `id_input_cutting` int(11) NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_cutting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for input_molding
-- ----------------------------
DROP TABLE IF EXISTS `input_molding`;
CREATE TABLE `input_molding`  (
  `id_input_molding` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for input_sewing
-- ----------------------------
DROP TABLE IF EXISTS `input_sewing`;
CREATE TABLE `input_sewing`  (
  `id_input_sewing` int(11) NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_sewing`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for line
-- ----------------------------
DROP TABLE IF EXISTS `line`;
CREATE TABLE `line`  (
  `id_line` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shift` smallint(2) NULL DEFAULT NULL,
  `operators` int(11) NULL DEFAULT NULL,
  `head` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_spv` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_line`) USING BTREE,
  INDEX `fk_spv`(`id_spv`) USING BTREE,
  CONSTRAINT `line_ibfk_1` FOREIGN KEY (`id_spv`) REFERENCES `spv` (`id_spv`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of line
-- ----------------------------
INSERT INTO `line` VALUES (1, 'BROMO', NULL, 1, 35, '', 1);
INSERT INTO `line` VALUES (2, 'WAKATOBI', NULL, 1, 35, '-', 2);
INSERT INTO `line` VALUES (3, 'BUNAKEN', NULL, 1, 34, '', 3);
INSERT INTO `line` VALUES (4, 'PRAMBANAN', NULL, 1, 40, '', 4);
INSERT INTO `line` VALUES (5, 'BEDUGUL', NULL, 1, 30, '', 5);
INSERT INTO `line` VALUES (6, 'KARIMUN', NULL, 1, 37, '', 6);
INSERT INTO `line` VALUES (7, 'KAWAH PUTIH', NULL, 1, 34, '', 7);
INSERT INTO `line` VALUES (8, 'PULAU SAMOSIR', NULL, 1, 32, '', 8);
INSERT INTO `line` VALUES (9, 'UMBUL PONGGOK', NULL, 1, 34, '', 1);
INSERT INTO `line` VALUES (10, 'LABOAN BAJO', NULL, 1, 0, '', 14);
INSERT INTO `line` VALUES (11, 'PULAU SERIBU', NULL, 1, 35, '', 11);
INSERT INTO `line` VALUES (12, 'NUSA DUA', NULL, 1, 27, '', 12);
INSERT INTO `line` VALUES (13, 'BESAKIH', NULL, 1, 30, '', 13);
INSERT INTO `line` VALUES (14, 'RAJA AMPAT', NULL, 1, 0, NULL, 14);
INSERT INTO `line` VALUES (15, 'DIENG', NULL, 1, 0, NULL, 15);
INSERT INTO `line` VALUES (16, 'MERBABU', NULL, 1, 28, '', 16);
INSERT INTO `line` VALUES (17, 'GILI TRAWANGAN', NULL, 1, 31, '', 17);
INSERT INTO `line` VALUES (18, 'TANAH TORAJA', NULL, 1, 27, '', 18);
INSERT INTO `line` VALUES (19, 'TANAH LOT', NULL, 1, 39, '', 19);
INSERT INTO `line` VALUES (20, 'UBUD', NULL, 1, 41, '', 1);
INSERT INTO `line` VALUES (21, 'PULAU KOMODO', NULL, 1, 25, '', 10);
INSERT INTO `line` VALUES (22, 'KINTAMANI', NULL, 2, 0, '', 22);
INSERT INTO `line` VALUES (23, 'JIMBARAN', NULL, 2, 0, '', 23);
INSERT INTO `line` VALUES (24, 'SANUR', NULL, 2, 0, '', 24);
INSERT INTO `line` VALUES (25, 'RINJANI', NULL, 2, 0, '', 25);
INSERT INTO `line` VALUES (26, 'BOROBUDUR', NULL, 2, 0, '', 26);
INSERT INTO `line` VALUES (27, 'UMBUL MANTEN', NULL, 2, 0, '', 27);
INSERT INTO `line` VALUES (28, 'DANAU TOBA', NULL, 2, 0, '', 28);
INSERT INTO `line` VALUES (29, 'TAMAN AYUN', NULL, 2, 0, '', 29);
INSERT INTO `line` VALUES (30, 'ULU WATU', NULL, 2, 0, '', 30);
INSERT INTO `line` VALUES (31, 'PARANGTRITIS', NULL, 2, 32, '', 31);
INSERT INTO `line` VALUES (32, 'TAMPAK SIRING', NULL, 2, 0, '', 32);
INSERT INTO `line` VALUES (33, 'RAJA AMPAT,DIENG,SANUR,RINJANI', NULL, 1, 112, '-', 1);
INSERT INTO `line` VALUES (34, 'LABOAN BAJO,NUSA DUA', NULL, 1, 113, '-', 3);
INSERT INTO `line` VALUES (35, 'BUNAKEN,KINTAMANI', NULL, 1, 73, '-', 12);
INSERT INTO `line` VALUES (36, 'PULAU KOMODO,TAMAN AYUN', NULL, 1, 0, '-', 19);
INSERT INTO `line` VALUES (37, 'KAWAH PUTIH,TAMAN AYUN', NULL, 1, 0, '-', 16);
INSERT INTO `line` VALUES (38, 'TANAH TORAJA,UMBUL MANTEN', NULL, 1, 55, '-', 27);
INSERT INTO `line` VALUES (39, 'KAWAH PUTIH,TAMAN AYUN', NULL, 1, 69, '-', 5);
INSERT INTO `line` VALUES (40, 'MERBABU,JIMBARAN', NULL, 1, 55, '-', 16);
INSERT INTO `line` VALUES (41, 'BESAKIH, BOROBUDUR', NULL, 1, 67, '-', 26);

-- ----------------------------
-- Table structure for linningmold_input_molding
-- ----------------------------
DROP TABLE IF EXISTS `linningmold_input_molding`;
CREATE TABLE `linningmold_input_molding`  (
  `id_lining_input_molding` int(11) NOT NULL AUTO_INCREMENT,
  `id_input_molding` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_lining_input_molding`) USING BTREE,
  INDEX `fk_input_molding_linning`(`id_input_molding`) USING BTREE,
  CONSTRAINT `fk_input_molding_linning` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for linningmold_output_molding
-- ----------------------------
DROP TABLE IF EXISTS `linningmold_output_molding`;
CREATE TABLE `linningmold_output_molding`  (
  `id_linning_output_molding` int(11) NOT NULL AUTO_INCREMENT,
  `id_output_molding` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_linning_output_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_output_molding`) USING BTREE,
  CONSTRAINT `fk_output_mold_3` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for master_color
-- ----------------------------
DROP TABLE IF EXISTS `master_color`;
CREATE TABLE `master_color`  (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `group_color` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_color`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for master_mesin_molding
-- ----------------------------
DROP TABLE IF EXISTS `master_mesin_molding`;
CREATE TABLE `master_mesin_molding`  (
  `id_mesin_molding` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mesin_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of master_mesin_molding
-- ----------------------------
INSERT INTO `master_mesin_molding` VALUES (1, 'MOLD01', '0301729001');
INSERT INTO `master_mesin_molding` VALUES (2, 'MOLD02', '0301729002');
INSERT INTO `master_mesin_molding` VALUES (3, 'MOLD03', '0301729003');
INSERT INTO `master_mesin_molding` VALUES (4, 'MOLD04', '0301729004');
INSERT INTO `master_mesin_molding` VALUES (5, 'MOLD05', '0301729005');
INSERT INTO `master_mesin_molding` VALUES (6, 'MOLD06', '0301729006');
INSERT INTO `master_mesin_molding` VALUES (7, 'MOLD07', '0301729007');
INSERT INTO `master_mesin_molding` VALUES (8, 'MOLD08', '0301829008');
INSERT INTO `master_mesin_molding` VALUES (9, 'MOLD09', '0301829009');
INSERT INTO `master_mesin_molding` VALUES (10, 'MOLD10', '0301829010');
INSERT INTO `master_mesin_molding` VALUES (11, 'MOLD11', '0301829011');
INSERT INTO `master_mesin_molding` VALUES (12, 'MOLD12', '0301829012');
INSERT INTO `master_mesin_molding` VALUES (13, 'MOLD13', '0301829013');
INSERT INTO `master_mesin_molding` VALUES (14, 'MOLD14', '0301929014');
INSERT INTO `master_mesin_molding` VALUES (15, 'MOLD15', '0301829015');
INSERT INTO `master_mesin_molding` VALUES (16, 'MOLD16', '0301829016');
INSERT INTO `master_mesin_molding` VALUES (17, 'MOLD17', '0301829017');
INSERT INTO `master_mesin_molding` VALUES (18, 'MOLD18', '0301729018');
INSERT INTO `master_mesin_molding` VALUES (19, 'MOLD19', '0301729019');
INSERT INTO `master_mesin_molding` VALUES (20, 'MOLD20', '0301729020');
INSERT INTO `master_mesin_molding` VALUES (21, 'MOLD21', '0301729021');
INSERT INTO `master_mesin_molding` VALUES (22, 'MOLD22', '0301729022');
INSERT INTO `master_mesin_molding` VALUES (23, 'MOLD23', '0301729023');
INSERT INTO `master_mesin_molding` VALUES (24, 'MOLD24', '0301729024');
INSERT INTO `master_mesin_molding` VALUES (25, 'MOLD25', '0301729026');
INSERT INTO `master_mesin_molding` VALUES (26, 'MOLD26', '0301729027');
INSERT INTO `master_mesin_molding` VALUES (27, 'MOLD27', '0301729028');
INSERT INTO `master_mesin_molding` VALUES (28, 'MOLD28', '0302029029');
INSERT INTO `master_mesin_molding` VALUES (29, 'MOLD29', '0302029030');
INSERT INTO `master_mesin_molding` VALUES (30, 'MOLD30', '0302029031');
INSERT INTO `master_mesin_molding` VALUES (31, 'MOLD31', '0302129032');
INSERT INTO `master_mesin_molding` VALUES (32, 'MOLD32', '0302129033');
INSERT INTO `master_mesin_molding` VALUES (33, 'MOLD33', '0302129034');
INSERT INTO `master_mesin_molding` VALUES (34, 'MOLD34', '0302129035');
INSERT INTO `master_mesin_molding` VALUES (35, 'MOLD35', '0302129036');
INSERT INTO `master_mesin_molding` VALUES (36, 'MOLD36', '0302129037');
INSERT INTO `master_mesin_molding` VALUES (37, 'MOLD37', '0302129038');
INSERT INTO `master_mesin_molding` VALUES (38, 'MOLD38', '0302129039');
INSERT INTO `master_mesin_molding` VALUES (39, 'MOLD39', '0302129040');
INSERT INTO `master_mesin_molding` VALUES (40, 'MOLD40', '0302129041');
INSERT INTO `master_mesin_molding` VALUES (41, 'MOLD41', '0302129042');
INSERT INTO `master_mesin_molding` VALUES (42, 'MOLD42', '0302129043');
INSERT INTO `master_mesin_molding` VALUES (43, 'MOLD43', '0302129044');
INSERT INTO `master_mesin_molding` VALUES (44, 'MOLD44', '0302129045');
INSERT INTO `master_mesin_molding` VALUES (45, 'MOLD45', '0302129046');
INSERT INTO `master_mesin_molding` VALUES (46, 'MOLD46', '0302129047');
INSERT INTO `master_mesin_molding` VALUES (47, 'MOLD47', '0302129048');
INSERT INTO `master_mesin_molding` VALUES (48, 'MOLD48', '0302129049');

-- ----------------------------
-- Table structure for master_sam
-- ----------------------------
DROP TABLE IF EXISTS `master_sam`;
CREATE TABLE `master_sam`  (
  `id_master_sam` int(11) NOT NULL AUTO_INCREMENT,
  `style` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grup_size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sam_cutting` decimal(4, 3) NULL DEFAULT NULL,
  `linning_sam` decimal(4, 3) NULL DEFAULT NULL,
  `mid_sam` decimal(4, 3) NULL DEFAULT NULL,
  `outer_sam` decimal(4, 3) NULL DEFAULT NULL,
  `total_mold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `center_panel_sam` decimal(4, 3) NULL DEFAULT NULL,
  `back_wings_sam` decimal(4, 3) NULL DEFAULT NULL,
  `cups_sam` decimal(4, 3) NULL DEFAULT NULL,
  `assembly_sam` decimal(4, 3) NULL DEFAULT NULL,
  `total_sewing_sam` decimal(5, 3) NULL DEFAULT NULL,
  `packing_sam` decimal(4, 3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_sam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 165 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of master_sam
-- ----------------------------
INSERT INTO `master_sam` VALUES (1, '71380', 'White', 'reguler', 0.961, 0.000, 0.343, 1.066, 1.408, 3.021, 1.392, 4.940, 3.056, 14.890, 1.281);
INSERT INTO `master_sam` VALUES (2, '71380', 'White', 'big', 0.961, 0.000, 0.343, 1.122, 1.464, 3.159, 1.473, 5.199, 3.211, 15.650, 1.296);
INSERT INTO `master_sam` VALUES (3, '71380', 'White', 'extra large', 0.961, 0.000, 0.343, 1.184, 1.527, 3.571, 1.764, 5.810, 3.541, 17.624, 1.304);
INSERT INTO `master_sam` VALUES (4, '71380', 'color', 'reguler', 1.060, 0.000, 0.000, 1.092, 1.092, 3.021, 1.392, 2.929, 2.967, 12.371, 1.281);
INSERT INTO `master_sam` VALUES (5, '71380', 'color', 'big', 1.060, 0.000, 0.000, 1.149, 1.149, 3.159, 1.473, 3.097, 3.211, 13.127, 1.296);
INSERT INTO `master_sam` VALUES (6, '71380', 'color', 'extra large', 1.060, 0.000, 0.000, 1.213, 1.213, 3.571, 1.764, 3.515, 3.523, 14.847, 1.304);
INSERT INTO `master_sam` VALUES (7, '71380', 'Black', 'reguler', 1.060, 0.000, 0.000, 1.118, 1.118, 3.021, 1.392, 2.929, 2.967, 12.371, 1.281);
INSERT INTO `master_sam` VALUES (8, '71380', 'Black', 'big', 1.060, 0.000, 0.000, 1.177, 1.177, 3.159, 1.473, 3.097, 3.211, 13.127, 1.296);
INSERT INTO `master_sam` VALUES (9, '71380', 'Black', 'extra large', 1.060, 0.000, 0.000, 1.242, 1.242, 3.571, 1.764, 3.515, 3.523, 14.847, 1.304);
INSERT INTO `master_sam` VALUES (10, '72335', 'White', 'reguler', 0.455, 0.000, 0.786, 0.942, 1.728, 3.283, 0.710, 5.925, 3.633, 16.262, 1.250);
INSERT INTO `master_sam` VALUES (11, '72335', 'White', 'big', 0.455, 0.000, 0.827, 0.992, 1.819, 3.365, 0.742, 6.053, 3.751, 16.693, 1.252);
INSERT INTO `master_sam` VALUES (12, '72335', 'White', 'extra large', 0.455, 0.000, 0.873, 1.047, 1.920, 3.692, 0.782, 6.713, 4.336, 18.627, 1.261);
INSERT INTO `master_sam` VALUES (13, '72335', 'color', 'reguler', 1.116, 0.000, 0.000, 0.968, 0.968, 3.230, 0.689, 4.699, 3.576, 14.633, 1.250);
INSERT INTO `master_sam` VALUES (14, '72335', 'color', 'big', 1.116, 0.000, 0.000, 1.019, 1.019, 3.230, 0.689, 4.740, 3.647, 14.767, 1.252);
INSERT INTO `master_sam` VALUES (15, '72335', 'color', 'extra large', 1.116, 0.000, 0.000, 1.076, 1.076, 3.617, 0.733, 5.455, 4.152, 16.750, 1.261);
INSERT INTO `master_sam` VALUES (16, '72335', 'Black', 'reguler', 1.116, 0.000, 0.000, 1.307, 1.307, 3.230, 0.689, 4.699, 3.576, 14.633, 1.250);
INSERT INTO `master_sam` VALUES (17, '72335', 'Black', 'big', 1.116, 0.000, 0.000, 1.376, 1.376, 3.230, 0.689, 4.740, 3.647, 14.767, 1.252);
INSERT INTO `master_sam` VALUES (18, '72335', 'Black', 'extra large', 1.116, 0.000, 0.000, 1.452, 1.452, 3.617, 0.733, 5.455, 4.152, 16.750, 1.261);
INSERT INTO `master_sam` VALUES (19, '76080', 'White', 'reguler', 1.370, 1.332, 0.758, 0.758, 2.848, 0.655, 2.750, 2.775, 3.543, 11.668, 1.388);
INSERT INTO `master_sam` VALUES (20, '76080', 'White', 'big', 1.370, 1.402, 0.798, 0.798, 2.998, 0.658, 2.764, 2.789, 3.583, 11.753, 1.388);
INSERT INTO `master_sam` VALUES (21, '76080', 'White', 'extra large', 1.370, 1.480, 0.843, 0.843, 3.166, 0.767, 2.939, 3.158, 3.871, 12.882, 1.388);
INSERT INTO `master_sam` VALUES (22, '76080', 'color', 'reguler', 1.370, 1.332, 0.758, 0.758, 2.848, 0.655, 2.750, 2.775, 3.543, 11.668, 1.388);
INSERT INTO `master_sam` VALUES (23, '76080', 'color', 'big', 1.370, 1.402, 0.798, 0.798, 2.998, 0.658, 2.764, 2.789, 3.583, 11.753, 1.388);
INSERT INTO `master_sam` VALUES (24, '76080', 'color', 'extra large', 1.370, 1.480, 0.843, 0.843, 3.166, 0.767, 2.939, 3.158, 3.871, 12.882, 1.388);
INSERT INTO `master_sam` VALUES (25, '76080', 'Black', 'reguler', 1.370, 1.540, 1.149, 1.149, 3.838, 0.655, 2.750, 2.775, 3.543, 11.668, 1.388);
INSERT INTO `master_sam` VALUES (26, '76080', 'Black', 'big', 1.370, 1.621, 1.210, 1.210, 4.041, 0.658, 2.764, 2.789, 3.583, 11.753, 1.388);
INSERT INTO `master_sam` VALUES (27, '76080', 'Black', 'extra large', 1.370, 1.712, 1.277, 1.277, 4.266, 0.767, 2.939, 3.158, 3.871, 12.882, 1.388);
INSERT INTO `master_sam` VALUES (28, '3476571 Lace', 'White', 'reguler', 1.137, 0.710, 0.000, 0.949, 1.659, 0.607, 3.357, 2.964, 3.542, 12.565, 1.210);
INSERT INTO `master_sam` VALUES (29, '3476571 Lace', 'White', 'big', 1.137, 0.747, 0.000, 0.999, 1.746, 0.607, 3.382, 2.972, 3.562, 12.628, 1.210);
INSERT INTO `master_sam` VALUES (30, '3476571 Lace', 'White', 'extra large', 1.137, 0.789, 0.000, 1.054, 1.843, 0.671, 3.608, 3.217, 3.804, 13.560, 1.210);
INSERT INTO `master_sam` VALUES (31, '3476571 Lace', 'Color', 'reguler', 1.137, 0.710, 0.000, 0.949, 1.659, 0.607, 3.357, 2.964, 3.542, 12.565, 1.210);
INSERT INTO `master_sam` VALUES (32, '3476571 Lace', 'Color', 'big', 1.137, 0.747, 0.000, 0.999, 1.746, 0.607, 3.382, 2.972, 3.562, 12.628, 1.210);
INSERT INTO `master_sam` VALUES (33, '3476571 Lace', 'Color', 'extra large', 1.137, 0.789, 0.000, 1.054, 1.843, 0.671, 3.608, 3.217, 3.804, 13.560, 1.210);
INSERT INTO `master_sam` VALUES (34, '3476571 Lace', 'Black', 'reguler', 1.137, 0.711, 0.000, 0.949, 1.660, 0.607, 3.357, 2.964, 3.542, 12.565, 1.210);
INSERT INTO `master_sam` VALUES (35, '3476571 Lace', 'Black', 'big', 1.137, 0.748, 0.000, 0.999, 1.747, 0.607, 3.382, 2.972, 3.562, 12.628, 1.210);
INSERT INTO `master_sam` VALUES (36, '3476571 Lace', 'Black', 'extra large', 1.137, 0.789, 0.000, 1.055, 1.844, 0.671, 3.608, 3.217, 3.804, 13.560, 1.210);
INSERT INTO `master_sam` VALUES (37, '3476571 Solid', 'White', 'reguler', 0.924, 0.708, 0.000, 0.775, 1.483, 0.607, 3.357, 2.964, 3.542, 12.565, 1.210);
INSERT INTO `master_sam` VALUES (38, '3476571 Solid', 'White', 'big', 0.924, 0.746, 0.000, 0.816, 1.562, 0.607, 3.382, 2.972, 3.562, 12.628, 1.210);
INSERT INTO `master_sam` VALUES (39, '3476571 Solid', 'White', 'extra large', 0.924, 0.787, 0.000, 0.861, 1.648, 0.671, 3.608, 3.217, 3.804, 13.560, 1.210);
INSERT INTO `master_sam` VALUES (40, '3476571 Solid', 'Color', 'reguler', 0.924, 0.708, 0.000, 0.775, 1.483, 0.607, 3.357, 2.964, 3.542, 12.565, 1.210);
INSERT INTO `master_sam` VALUES (41, '3476571 Solid', 'Color', 'big', 0.924, 0.746, 0.000, 0.816, 1.562, 0.607, 3.382, 2.972, 3.562, 12.628, 1.210);
INSERT INTO `master_sam` VALUES (42, '3476571 Solid', 'Color', 'extra large', 0.924, 0.787, 0.000, 0.861, 1.648, 0.671, 3.608, 3.217, 3.804, 13.560, 1.210);
INSERT INTO `master_sam` VALUES (43, '3476571 Solid', 'Black', 'reguler', 0.924, 0.709, 0.000, 1.166, 1.875, 0.607, 3.357, 2.964, 3.542, 12.565, 1.210);
INSERT INTO `master_sam` VALUES (44, '3476571 Solid', 'Black', 'big', 0.924, 0.746, 0.000, 1.227, 1.973, 0.607, 3.382, 2.972, 3.562, 12.628, 1.210);
INSERT INTO `master_sam` VALUES (45, '3476571 Solid', 'Black', 'extra large', 0.924, 0.788, 0.000, 1.296, 2.084, 0.671, 3.608, 3.217, 3.804, 13.560, 1.210);
INSERT INTO `master_sam` VALUES (46, '3476528', 'White', 'reguler', 0.643, 0.000, 0.403, 1.063, 1.466, 0.710, 2.864, 7.580, 3.212, 17.239, 1.125);
INSERT INTO `master_sam` VALUES (47, '3476528', 'White', 'big', 0.643, 0.000, 0.403, 1.119, 1.522, 0.728, 2.908, 7.780, 3.389, 17.766, 1.127);
INSERT INTO `master_sam` VALUES (48, '3476528', 'White', 'extra large', 0.643, 0.000, 0.403, 1.181, 1.584, 0.795, 3.073, 8.339, 3.662, 19.043, 1.130);
INSERT INTO `master_sam` VALUES (49, '3476528', 'Color', 'reguler', 0.592, 0.000, 0.000, 1.069, 1.069, 0.710, 2.864, 5.296, 3.212, 14.498, 1.125);
INSERT INTO `master_sam` VALUES (50, '3476528', 'Color', 'big', 0.592, 0.000, 0.000, 1.125, 1.125, 0.728, 2.908, 5.478, 3.389, 15.004, 1.127);
INSERT INTO `master_sam` VALUES (51, '3476528', 'Color', 'extra large', 0.592, 0.000, 0.000, 1.188, 1.188, 0.795, 3.073, 6.055, 3.662, 16.302, 1.130);
INSERT INTO `master_sam` VALUES (52, '3476528', 'Black', 'reguler', 0.592, 0.000, 0.000, 1.117, 1.117, 0.710, 2.864, 5.296, 3.212, 14.498, 1.125);
INSERT INTO `master_sam` VALUES (53, '3476528', 'Black', 'big', 0.592, 0.000, 0.000, 1.176, 1.176, 0.728, 2.908, 5.478, 3.389, 15.004, 1.127);
INSERT INTO `master_sam` VALUES (54, '3476528', 'Black', 'extra large', 0.592, 0.000, 0.000, 1.241, 1.241, 0.795, 3.073, 6.055, 3.662, 16.302, 1.130);
INSERT INTO `master_sam` VALUES (55, '3476528 (Non Lace)', 'White', 'reguler', 0.334, 0.000, 0.403, 1.063, 1.466, 0.710, 2.864, 6.494, 3.212, 15.935, 1.125);
INSERT INTO `master_sam` VALUES (56, '3476528 (Non Lace)', 'White', 'big', 0.334, 0.000, 0.403, 1.119, 1.522, 0.728, 2.908, 6.484, 3.390, 16.212, 1.127);
INSERT INTO `master_sam` VALUES (57, '3476528 (Non Lace)', 'White', 'extra large', 0.334, 0.000, 0.403, 1.181, 1.584, 0.795, 3.073, 7.179, 3.662, 17.651, 1.130);
INSERT INTO `master_sam` VALUES (58, '3476528 (Non Lace)', 'Color', 'reguler', 0.283, 0.000, 0.000, 1.069, 1.069, 0.710, 2.864, 4.215, 3.212, 13.201, 1.125);
INSERT INTO `master_sam` VALUES (59, '3476528 (Non Lace)', 'Color', 'big', 0.283, 0.000, 0.000, 1.125, 1.125, 0.728, 2.908, 4.402, 3.385, 13.709, 1.127);
INSERT INTO `master_sam` VALUES (60, '3476528 (Non Lace)', 'Color', 'extra large', 0.283, 0.000, 0.000, 1.188, 1.188, 0.795, 3.073, 4.895, 3.662, 14.910, 1.130);
INSERT INTO `master_sam` VALUES (61, '3476528 (Non Lace)', 'Black', 'reguler', 0.283, 0.000, 0.000, 1.117, 1.117, 0.710, 2.864, 4.215, 3.212, 13.201, 1.125);
INSERT INTO `master_sam` VALUES (62, '3476528 (Non Lace)', 'Black', 'big', 0.283, 0.000, 0.000, 1.176, 1.176, 0.728, 2.908, 4.402, 3.385, 13.709, 1.127);
INSERT INTO `master_sam` VALUES (63, '3476528 (Non Lace)', 'Black', 'extra large', 0.283, 0.000, 0.000, 1.241, 1.241, 0.795, 3.073, 4.895, 3.662, 14.910, 1.130);
INSERT INTO `master_sam` VALUES (64, '2131101 Jacquard', 'White', 'reguler', 0.204, 0.000, 0.200, 0.788, 0.988, 0.550, 3.209, 6.351, 2.552, 15.194, 1.290);
INSERT INTO `master_sam` VALUES (65, '2131101 Jacquard', 'White', 'big', 0.204, 0.000, 0.200, 0.830, 1.030, 0.592, 3.372, 6.757, 2.749, 16.164, 1.293);
INSERT INTO `master_sam` VALUES (66, '2131101 Jacquard', 'Color', 'reguler', 0.208, 0.000, 0.000, 0.788, 0.788, 0.550, 3.214, 5.559, 2.552, 14.250, 1.290);
INSERT INTO `master_sam` VALUES (67, '2131101 Jacquard', 'Color', 'big', 0.208, 0.000, 0.000, 0.830, 0.830, 0.592, 3.372, 5.815, 2.749, 15.033, 1.293);
INSERT INTO `master_sam` VALUES (68, '2131101 Jacquard', 'Color', 'reguler', 0.169, 0.000, 0.000, 0.788, 0.788, 0.550, 3.214, 5.559, 2.552, 14.250, 1.290);
INSERT INTO `master_sam` VALUES (69, '2131101 Jacquard', 'Color', 'reguler', 0.169, 0.000, 0.000, 0.830, 0.830, 0.592, 3.372, 5.815, 2.749, 15.033, 1.293);
INSERT INTO `master_sam` VALUES (70, '2131101 Jacquard', 'Black', 'reguler', 0.169, 0.000, 0.000, 0.840, 0.840, 0.550, 3.214, 5.559, 2.552, 14.250, 1.290);
INSERT INTO `master_sam` VALUES (71, '2131101 Jacquard', 'Black', 'reguler', 0.169, 0.000, 0.000, 0.884, 0.884, 0.592, 3.372, 5.815, 2.749, 15.033, 1.293);
INSERT INTO `master_sam` VALUES (72, '2175295', 'White', 'reguler', 0.209, 0.000, 0.159, 0.758, 0.917, 1.710, 3.740, 4.414, 3.320, 15.821, 1.377);
INSERT INTO `master_sam` VALUES (73, '2175295', 'White', 'extra large', 0.209, 0.000, 0.202, 0.798, 1.000, 1.871, 4.051, 4.630, 3.482, 16.840, 1.385);
INSERT INTO `master_sam` VALUES (74, '2175295', 'White', 'extra large', 0.209, 0.000, 0.376, 0.843, 1.219, 2.150, 4.680, 5.418, 3.920, 19.403, 1.395);
INSERT INTO `master_sam` VALUES (75, '2175295', 'Color', 'reguler', 0.257, 0.000, 0.000, 0.784, 0.784, 1.710, 3.740, 3.008, 3.116, 13.889, 1.377);
INSERT INTO `master_sam` VALUES (76, '2175295', 'Color', 'big', 0.257, 0.000, 0.000, 0.826, 0.826, 1.871, 4.051, 3.234, 3.355, 15.013, 1.385);
INSERT INTO `master_sam` VALUES (77, '2175295', 'Color', 'extra large', 0.257, 0.000, 0.000, 0.872, 0.872, 2.150, 4.637, 3.820, 3.737, 17.212, 1.395);
INSERT INTO `master_sam` VALUES (78, '2175295', 'Black', 'reguler', 0.257, 0.000, 0.000, 0.869, 0.869, 1.710, 3.740, 3.008, 3.116, 13.889, 1.377);
INSERT INTO `master_sam` VALUES (79, '2175295', 'Black', 'big', 0.257, 0.000, 0.000, 0.915, 0.915, 1.871, 4.051, 3.234, 3.355, 15.013, 1.385);
INSERT INTO `master_sam` VALUES (80, '2175295', 'Black', 'extra large', 0.257, 0.000, 0.000, 0.966, 0.966, 2.150, 4.637, 3.820, 3.737, 17.212, 1.395);
INSERT INTO `master_sam` VALUES (81, '2175295 (6770)', 'White', 'reguler', 0.893, 0.000, 0.202, 0.758, 0.960, 1.239, 2.776, 5.207, 5.225, 17.336, 1.377);
INSERT INTO `master_sam` VALUES (82, '2175295 (6770)', 'White', 'big', 0.893, 0.000, 0.376, 0.798, 1.174, 1.301, 2.876, 5.482, 5.553, 18.254, 1.385);
INSERT INTO `master_sam` VALUES (83, '2175295 (6770)', 'Color', 'extra large', 0.893, 0.000, 0.376, 0.843, 1.219, 1.422, 3.134, 6.230, 6.104, 20.268, 1.395);
INSERT INTO `master_sam` VALUES (84, '2175295 (6770)', 'Color', 'reguler', 0.853, 0.000, 0.000, 0.765, 0.765, 1.239, 2.776, 4.340, 5.225, 16.295, 1.377);
INSERT INTO `master_sam` VALUES (85, '2175295 (6770)', 'Color', 'big', 0.853, 0.000, 0.000, 0.806, 0.806, 1.301, 2.876, 4.512, 5.553, 17.091, 1.385);
INSERT INTO `master_sam` VALUES (86, '2175295 (6770)', 'Color', 'extra large', 0.853, 0.000, 0.000, 0.850, 0.850, 1.422, 3.134, 5.195, 6.104, 19.026, 1.395);
INSERT INTO `master_sam` VALUES (87, '2175295 (6770)', 'Black', 'reguler', 0.853, 0.000, 0.000, 0.872, 0.872, 1.239, 2.776, 4.340, 5.225, 16.295, 1.377);
INSERT INTO `master_sam` VALUES (88, '2175295 (6770)', 'Black', 'big', 0.853, 0.000, 0.000, 0.917, 0.917, 1.301, 2.876, 4.512, 5.553, 17.091, 1.385);
INSERT INTO `master_sam` VALUES (89, '2175295 (6770)', 'Black', 'extra large', 0.853, 0.000, 0.000, 0.968, 0.968, 1.422, 3.134, 5.195, 5.821, 18.687, 1.395);
INSERT INTO `master_sam` VALUES (90, '75335', 'White', 'reguler', 0.700, 0.000, 0.782, 0.918, 1.700, 0.676, 1.882, 6.150, 3.098, 14.167, 1.278);
INSERT INTO `master_sam` VALUES (91, '75335', 'White', 'big', 0.700, 0.000, 0.823, 0.967, 1.790, 0.703, 1.993, 6.317, 3.208, 14.666, 1.287);
INSERT INTO `master_sam` VALUES (92, '75335', 'White', 'extra large', 0.700, 0.000, 0.869, 1.020, 1.889, 0.770, 2.212, 6.994, 3.600, 16.292, 1.297);
INSERT INTO `master_sam` VALUES (93, '75335', 'Color', 'reguler', 1.122, 0.000, 0.000, 0.918, 0.918, 0.959, 1.882, 5.141, 3.098, 13.297, 1.278);
INSERT INTO `master_sam` VALUES (94, '75335', 'Color', 'big', 1.122, 0.000, 0.000, 0.967, 0.967, 0.987, 1.993, 5.277, 3.208, 13.757, 1.287);
INSERT INTO `master_sam` VALUES (95, '75335', 'Color', 'extra large', 1.122, 0.000, 0.000, 1.020, 1.020, 1.053, 2.212, 5.826, 3.600, 15.229, 1.297);
INSERT INTO `master_sam` VALUES (96, '75335', 'Black', 'reguler', 1.122, 0.000, 0.000, 1.049, 1.049, 0.959, 1.882, 5.141, 3.098, 13.297, 1.278);
INSERT INTO `master_sam` VALUES (97, '75335', 'Black', 'big', 1.122, 0.000, 0.000, 1.104, 1.104, 0.987, 1.993, 5.277, 3.208, 13.757, 1.287);
INSERT INTO `master_sam` VALUES (98, '75335', 'Black', 'extra large', 1.122, 0.000, 0.000, 1.165, 1.165, 1.053, 2.212, 5.826, 3.600, 15.229, 1.297);
INSERT INTO `master_sam` VALUES (99, '75298 (17592)', 'White', 'reguler', 0.699, 0.000, 0.374, 0.788, 1.162, 0.970, 3.859, 6.594, 3.131, 17.465, 1.251);
INSERT INTO `master_sam` VALUES (100, '75298 (17592)', 'White', 'big', 0.699, 0.000, 0.376, 0.830, 1.206, 0.980, 3.972, 6.594, 3.295, 17.808, 1.254);
INSERT INTO `master_sam` VALUES (101, '75298 (17592)', 'White', 'extra large', 0.699, 0.000, 0.379, 0.876, 1.255, 1.042, 4.332, 7.667, 3.639, 20.017, 1.263);
INSERT INTO `master_sam` VALUES (102, '75298 (17592)', 'Color', 'reguler', 0.842, 0.000, 0.000, 0.788, 0.788, 0.970, 3.859, 5.712, 3.131, 16.407, 1.251);
INSERT INTO `master_sam` VALUES (103, '75298 (17592)', 'Color', 'big', 0.842, 0.000, 0.000, 0.830, 0.830, 0.980, 3.972, 5.955, 3.295, 17.042, 1.254);
INSERT INTO `master_sam` VALUES (104, '75298 (17592)', 'Color', 'extra large', 0.842, 0.000, 0.000, 0.876, 0.876, 1.042, 4.332, 6.506, 3.551, 18.518, 1.263);
INSERT INTO `master_sam` VALUES (105, '75298 (17592)', 'Black', 'reguler', 0.842, 0.000, 0.000, 0.866, 0.866, 0.970, 3.859, 5.712, 3.131, 16.407, 1.251);
INSERT INTO `master_sam` VALUES (106, '75298 (17592)', 'Black', 'big', 0.842, 0.000, 0.000, 0.912, 0.912, 0.980, 3.972, 5.955, 3.295, 17.042, 1.254);
INSERT INTO `master_sam` VALUES (107, '75298 (17592)', 'Black', 'extra large', 0.842, 0.000, 0.000, 0.962, 0.962, 1.042, 4.332, 6.506, 3.551, 18.518, 1.263);
INSERT INTO `master_sam` VALUES (108, '71265 (22065)', 'White', 'reguler', 0.949, 0.000, 0.411, 1.071, 1.482, 0.267, 5.418, 7.166, 2.633, 18.579, 1.269);
INSERT INTO `master_sam` VALUES (109, '71265 (22065)', 'White', 'big', 0.949, 0.000, 0.599, 1.127, 1.726, 0.280, 5.649, 7.533, 2.818, 19.537, 1.278);
INSERT INTO `master_sam` VALUES (110, '71265 (22065)', 'White', 'extra large', 0.949, 0.000, 0.599, 1.190, 1.789, 0.339, 6.222, 8.173, 3.312, 21.655, 1.283);
INSERT INTO `master_sam` VALUES (111, '71265 (22065)', 'Color', 'reguler', 0.700, 0.000, 0.000, 1.097, 1.097, 0.267, 5.418, 5.089, 2.585, 16.030, 1.269);
INSERT INTO `master_sam` VALUES (112, '71265 (22065)', 'Color', 'big', 0.700, 0.000, 0.000, 1.155, 1.155, 0.280, 5.649, 5.257, 2.714, 16.680, 1.278);
INSERT INTO `master_sam` VALUES (113, '71265 (22065)', 'Color', 'extra large', 0.700, 0.000, 0.000, 1.219, 1.219, 0.339, 6.204, 5.760, 3.108, 18.494, 1.283);
INSERT INTO `master_sam` VALUES (114, '71265 (22065)', 'Black', 'reguler', 0.700, 0.000, 0.000, 1.123, 1.123, 0.267, 5.418, 5.089, 2.585, 16.030, 1.269);
INSERT INTO `master_sam` VALUES (115, '71265 (22065)', 'Black', 'big', 0.700, 0.000, 0.000, 1.182, 1.182, 0.280, 5.649, 5.257, 2.714, 16.680, 1.278);
INSERT INTO `master_sam` VALUES (116, '71265 (22065)', 'Black', 'extra large', 0.700, 0.000, 0.000, 1.248, 1.248, 0.339, 6.204, 5.760, 3.108, 18.494, 1.283);
INSERT INTO `master_sam` VALUES (117, '2172205 Lace (17585)', 'White', 'reguler', 0.779, 0.000, 0.205, 0.758, 0.963, 0.439, 7.380, 4.589, 2.673, 18.097, 1.275);
INSERT INTO `master_sam` VALUES (118, '2172205 Lace (17585)', 'White', 'big', 0.779, 0.000, 0.205, 0.798, 1.003, 0.450, 7.628, 5.011, 2.807, 19.076, 1.278);
INSERT INTO `master_sam` VALUES (119, '2172205 Lace (17585)', 'White', 'extra large', 0.779, 0.000, 0.205, 0.843, 1.048, 0.475, 7.942, 5.425, 3.016, 20.229, 1.285);
INSERT INTO `master_sam` VALUES (120, '2172205 Lace (17585)', 'Color', 'reguler', 0.746, 0.000, 0.000, 0.758, 0.758, 0.439, 7.380, 3.868, 2.654, 17.209, 1.275);
INSERT INTO `master_sam` VALUES (121, '2172205 Lace (17585)', 'Color', 'big', 0.746, 0.000, 0.000, 0.798, 0.798, 0.450, 7.628, 4.200, 2.807, 18.103, 1.278);
INSERT INTO `master_sam` VALUES (122, '2172205 Lace (17585)', 'Color', 'extra large', 0.746, 0.000, 0.000, 0.843, 0.843, 0.475, 7.942, 4.545, 3.016, 19.174, 1.285);
INSERT INTO `master_sam` VALUES (123, '2172205 Lace (17585)', 'Black', 'reguler', 0.746, 0.000, 0.000, 0.863, 0.863, 0.439, 7.380, 3.868, 2.654, 17.209, 1.275);
INSERT INTO `master_sam` VALUES (124, '2172205 Lace (17585)', 'Black', 'big', 0.746, 0.000, 0.000, 0.908, 0.908, 0.450, 7.628, 4.200, 2.807, 18.103, 1.278);
INSERT INTO `master_sam` VALUES (125, '2172205 Lace (17585)', 'Black', 'extra large', 0.746, 0.000, 0.000, 0.958, 0.958, 0.475, 7.942, 4.545, 3.016, 19.174, 1.285);
INSERT INTO `master_sam` VALUES (126, '71380 (22068)', 'White', 'reguler', 1.015, 0.000, 0.408, 1.008, 1.416, 1.381, 3.633, 5.418, 3.155, 16.304, 1.281);
INSERT INTO `master_sam` VALUES (127, '71380 (22068)', 'White', 'big', 1.015, 0.000, 0.408, 1.061, 1.469, 1.404, 3.728, 5.872, 3.292, 17.154, 1.296);
INSERT INTO `master_sam` VALUES (128, '71380 (22068)', 'White', 'extra large', 1.015, 0.000, 0.408, 1.120, 1.528, 1.458, 4.069, 6.667, 3.644, 19.006, 1.304);
INSERT INTO `master_sam` VALUES (129, '71380 (22068)', 'Color', 'reguler', 1.068, 0.000, 0.000, 1.008, 1.008, 1.381, 3.633, 3.592, 3.103, 14.051, 1.281);
INSERT INTO `master_sam` VALUES (130, '71380 (22068)', 'Color', 'big', 1.068, 0.000, 0.000, 1.061, 1.061, 1.404, 3.684, 3.723, 3.155, 14.360, 1.296);
INSERT INTO `master_sam` VALUES (131, '71380 (22068)', 'Color', 'extra large', 1.068, 0.000, 0.000, 1.120, 1.120, 1.446, 4.035, 4.292, 3.432, 15.847, 1.304);
INSERT INTO `master_sam` VALUES (132, '71380 (22068)', 'Black', 'reguler', 1.068, 0.000, 0.000, 1.008, 1.008, 1.381, 3.633, 3.592, 3.103, 14.051, 1.281);
INSERT INTO `master_sam` VALUES (133, '71380 (22068)', 'Black', 'big', 1.068, 0.000, 0.000, 1.061, 1.061, 1.404, 3.684, 3.723, 3.155, 14.360, 1.296);
INSERT INTO `master_sam` VALUES (134, '71380 (22068)', 'Black', 'extra large', 1.068, 0.000, 0.000, 1.120, 1.120, 1.446, 4.035, 4.292, 3.432, 15.847, 1.304);
INSERT INTO `master_sam` VALUES (135, '72298 Lining', 'White', 'reguler', 0.792, 0.000, 1.460, 0.785, 2.245, 0.750, 4.503, 5.755, 2.670, 16.413, 1.278);
INSERT INTO `master_sam` VALUES (136, '72298 Lining', 'White', 'big', 0.792, 0.000, 1.537, 0.826, 2.363, 0.765, 4.733, 6.073, 2.712, 17.140, 1.283);
INSERT INTO `master_sam` VALUES (137, '72298 Lining', 'White', 'extra large', 0.792, 0.000, 1.622, 0.872, 2.494, 0.847, 5.285, 6.843, 2.917, 19.071, 1.287);
INSERT INTO `master_sam` VALUES (138, '72298 Lining', 'White', 'reguler', 0.858, 0.000, 0.863, 0.785, 1.648, 0.750, 4.503, 6.408, 2.670, 17.198, 1.278);
INSERT INTO `master_sam` VALUES (139, '72298 Lining', 'White', 'big', 0.858, 0.000, 0.909, 0.826, 1.735, 0.765, 4.733, 6.872, 2.712, 18.099, 1.283);
INSERT INTO `master_sam` VALUES (140, '72298 Lining', 'White', 'extra large', 0.858, 0.000, 0.959, 0.872, 1.831, 0.847, 5.285, 7.673, 2.917, 20.067, 1.287);
INSERT INTO `master_sam` VALUES (141, '72298 Lace', 'Color', 'reguler', 0.858, 0.000, 0.000, 0.863, 0.863, 0.750, 4.503, 4.305, 5.034, 17.511, 1.278);
INSERT INTO `master_sam` VALUES (142, '72298 Lace', 'Color', 'big', 0.858, 0.000, 0.000, 0.909, 0.909, 0.765, 4.733, 4.483, 2.712, 15.232, 1.283);
INSERT INTO `master_sam` VALUES (143, '72298 Lace', 'Color', 'extra large', 0.858, 0.000, 0.000, 0.959, 0.959, 0.847, 5.285, 5.034, 2.917, 16.900, 1.287);
INSERT INTO `master_sam` VALUES (144, '72298 Lace', 'Black', 'reguler', 0.858, 0.000, 0.000, 0.863, 0.863, 0.750, 4.503, 4.305, 5.034, 17.511, 1.278);
INSERT INTO `master_sam` VALUES (145, '72298 Lace', 'Black', 'big', 0.858, 0.000, 0.000, 0.909, 0.909, 0.765, 4.733, 4.483, 2.712, 15.232, 1.283);
INSERT INTO `master_sam` VALUES (146, '72298 Lace', 'Black', 'extra large', 0.858, 0.000, 0.000, 0.959, 0.959, 0.847, 5.285, 5.034, 2.917, 16.900, 1.287);
INSERT INTO `master_sam` VALUES (147, '76081', 'White', 'reguler', 1.124, 1.439, 0.000, 0.854, 2.293, 0.821, 2.816, 3.410, 3.174, 12.266, 1.388);
INSERT INTO `master_sam` VALUES (148, '76081', 'White', 'big', 1.124, 1.515, 0.000, 0.899, 2.414, 0.876, 2.914, 3.650, 3.301, 12.889, 1.388);
INSERT INTO `master_sam` VALUES (149, '76081', 'White', 'extra large', 1.124, 1.599, 0.000, 0.949, 2.548, 0.938, 3.096, 3.834, 3.462, 13.595, 1.388);
INSERT INTO `master_sam` VALUES (150, '76081', 'Color', 'reguler', 1.124, 0.000, 0.000, 0.854, 0.854, 0.821, 2.816, 3.410, 3.174, 12.266, 1.388);
INSERT INTO `master_sam` VALUES (151, '76081', 'Color', 'big', 1.124, 0.000, 0.000, 0.899, 0.899, 0.876, 2.914, 3.650, 3.301, 12.889, 1.388);
INSERT INTO `master_sam` VALUES (152, '76081', 'Color', 'extra large', 1.124, 0.000, 0.000, 0.949, 0.949, 0.938, 3.096, 3.834, 3.462, 13.595, 1.388);
INSERT INTO `master_sam` VALUES (153, '76081', 'Black', 'reguler', 1.124, 0.000, 0.000, 1.439, 1.439, 0.821, 2.816, 3.410, 3.174, 12.266, 1.388);
INSERT INTO `master_sam` VALUES (154, '76081', 'Black', 'big', 1.124, 0.000, 0.000, 1.515, 1.515, 0.876, 2.914, 3.650, 3.301, 12.889, 1.388);
INSERT INTO `master_sam` VALUES (155, '76081', 'Black', 'extra large', 1.124, 0.000, 0.000, 1.599, 1.599, 0.938, 3.096, 3.834, 3.462, 13.595, 1.388);
INSERT INTO `master_sam` VALUES (156, '72267', 'White', 'reguler', 0.677, 0.000, 0.793, 0.871, 1.664, 1.109, 3.239, 5.896, 6.849, 20.511, 1.254);
INSERT INTO `master_sam` VALUES (157, '72267', 'White', 'big', 0.677, 0.000, 0.834, 0.917, 1.751, 1.150, 3.307, 6.104, 6.948, 21.011, 1.258);
INSERT INTO `master_sam` VALUES (158, '72267', 'White', 'extra large', 0.677, 0.000, 0.881, 0.968, 1.849, 1.217, 3.609, 6.740, 7.615, 23.017, 1.266);
INSERT INTO `master_sam` VALUES (159, '72267', 'Color', 'reguler', 0.476, 0.000, 0.000, 0.871, 0.871, 1.109, 3.239, 4.544, 6.740, 18.758, 1.254);
INSERT INTO `master_sam` VALUES (160, '72267', 'Color', 'big', 0.476, 0.000, 0.000, 0.917, 0.917, 1.150, 3.307, 4.605, 6.829, 19.069, 1.258);
INSERT INTO `master_sam` VALUES (161, '72267', 'Color', 'extra large', 0.476, 0.000, 0.000, 0.968, 0.968, 1.217, 3.588, 5.202, 7.533, 21.048, 1.266);
INSERT INTO `master_sam` VALUES (162, '72267', 'Black', 'reguler', 0.476, 0.000, 0.000, 1.079, 1.079, 1.109, 3.239, 4.544, 6.740, 18.758, 1.254);
INSERT INTO `master_sam` VALUES (163, '72267', 'Black', 'big', 0.476, 0.000, 0.000, 1.136, 1.136, 1.150, 3.588, 4.605, 6.829, 19.069, 1.258);
INSERT INTO `master_sam` VALUES (164, '72267', 'Black', 'extra large', 0.476, 0.000, 0.000, 1.199, 1.199, 1.217, 3.588, 5.202, 7.533, 21.048, 1.266);

-- ----------------------------
-- Table structure for master_size
-- ----------------------------
DROP TABLE IF EXISTS `master_size`;
CREATE TABLE `master_size`  (
  `id_mastersize` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mastersize`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 136 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of master_size
-- ----------------------------
INSERT INTO `master_size` VALUES (1, 'reguler', '30A');
INSERT INTO `master_size` VALUES (2, 'reguler', '30B');
INSERT INTO `master_size` VALUES (3, 'reguler', '30C');
INSERT INTO `master_size` VALUES (4, 'reguler', '30D');
INSERT INTO `master_size` VALUES (5, 'reguler', '30DD');
INSERT INTO `master_size` VALUES (6, 'reguler', '30DDD');
INSERT INTO `master_size` VALUES (7, 'reguler', '30G');
INSERT INTO `master_size` VALUES (8, 'reguler', '30H');
INSERT INTO `master_size` VALUES (9, 'reguler', '32A');
INSERT INTO `master_size` VALUES (10, 'reguler', '32B');
INSERT INTO `master_size` VALUES (11, 'reguler', '32C');
INSERT INTO `master_size` VALUES (12, 'reguler', '32D');
INSERT INTO `master_size` VALUES (13, 'reguler', '32DD');
INSERT INTO `master_size` VALUES (14, 'reguler', '32DDD');
INSERT INTO `master_size` VALUES (15, 'reguler', '32G');
INSERT INTO `master_size` VALUES (16, 'reguler', '32H');
INSERT INTO `master_size` VALUES (17, 'reguler', '34A');
INSERT INTO `master_size` VALUES (18, 'reguler', '34B');
INSERT INTO `master_size` VALUES (19, 'reguler', '34C');
INSERT INTO `master_size` VALUES (20, 'reguler', '34D');
INSERT INTO `master_size` VALUES (21, 'reguler', '34DD');
INSERT INTO `master_size` VALUES (22, 'reguler', '34DDD');
INSERT INTO `master_size` VALUES (23, 'reguler', '34G');
INSERT INTO `master_size` VALUES (24, 'reguler', '34H');
INSERT INTO `master_size` VALUES (25, 'reguler', '36A');
INSERT INTO `master_size` VALUES (26, 'reguler', '36B');
INSERT INTO `master_size` VALUES (27, 'reguler', '36C');
INSERT INTO `master_size` VALUES (28, 'reguler', '36D');
INSERT INTO `master_size` VALUES (29, 'reguler', '36DD');
INSERT INTO `master_size` VALUES (30, 'reguler', '36DDD');
INSERT INTO `master_size` VALUES (31, 'big', '36G');
INSERT INTO `master_size` VALUES (32, 'big', '36H');
INSERT INTO `master_size` VALUES (33, 'reguler', '38A');
INSERT INTO `master_size` VALUES (34, 'reguler', '38B');
INSERT INTO `master_size` VALUES (35, 'reguler', '38C');
INSERT INTO `master_size` VALUES (36, 'reguler', '38D');
INSERT INTO `master_size` VALUES (37, 'reguler', '38DD');
INSERT INTO `master_size` VALUES (38, 'big', '38DDD');
INSERT INTO `master_size` VALUES (39, 'big', '38G');
INSERT INTO `master_size` VALUES (40, 'big', '38H');
INSERT INTO `master_size` VALUES (41, 'reguler', '40A');
INSERT INTO `master_size` VALUES (42, 'reguler', '40B');
INSERT INTO `master_size` VALUES (43, 'reguler', '40C');
INSERT INTO `master_size` VALUES (44, 'reguler', '40D');
INSERT INTO `master_size` VALUES (45, 'big', '40DD');
INSERT INTO `master_size` VALUES (46, 'big', '40DDD');
INSERT INTO `master_size` VALUES (47, 'big', '40G');
INSERT INTO `master_size` VALUES (48, 'extra large', '40H');
INSERT INTO `master_size` VALUES (49, 'reguler', '42A');
INSERT INTO `master_size` VALUES (50, 'reguler', '42B');
INSERT INTO `master_size` VALUES (51, 'reguler', '42C');
INSERT INTO `master_size` VALUES (52, 'big', '42D');
INSERT INTO `master_size` VALUES (53, 'big', '42DD');
INSERT INTO `master_size` VALUES (54, 'big', '42DDD');
INSERT INTO `master_size` VALUES (55, 'extra large', '42G');
INSERT INTO `master_size` VALUES (56, 'extra large', '42H');
INSERT INTO `master_size` VALUES (57, 'reguler', '44A');
INSERT INTO `master_size` VALUES (58, 'reguler', '44B');
INSERT INTO `master_size` VALUES (59, 'big', '44C');
INSERT INTO `master_size` VALUES (60, 'big', '44D');
INSERT INTO `master_size` VALUES (61, 'big', '44DD');
INSERT INTO `master_size` VALUES (62, 'extra large', '44DDD');
INSERT INTO `master_size` VALUES (63, 'extra large', '44G');
INSERT INTO `master_size` VALUES (64, 'extra large', '44H');
INSERT INTO `master_size` VALUES (65, 'big', '48A');
INSERT INTO `master_size` VALUES (66, 'big', '48B');
INSERT INTO `master_size` VALUES (67, 'extra large', '48C');
INSERT INTO `master_size` VALUES (68, 'extra large', '48D');
INSERT INTO `master_size` VALUES (69, 'extra large', '48DD');
INSERT INTO `master_size` VALUES (70, 'extra large', '48DDD');
INSERT INTO `master_size` VALUES (71, 'extra large', '48G');
INSERT INTO `master_size` VALUES (72, 'extra large', '48H');
INSERT INTO `master_size` VALUES (73, 'big', '50A');
INSERT INTO `master_size` VALUES (74, 'extra large', '50B');
INSERT INTO `master_size` VALUES (75, 'extra large', '50C');
INSERT INTO `master_size` VALUES (76, 'extra large', '50D');
INSERT INTO `master_size` VALUES (77, 'extra large', '50DD');
INSERT INTO `master_size` VALUES (78, 'extra large', '50DDD');
INSERT INTO `master_size` VALUES (79, 'extra large', '50G');
INSERT INTO `master_size` VALUES (80, 'extra large', '50H');
INSERT INTO `master_size` VALUES (81, 'extra large', '52A');
INSERT INTO `master_size` VALUES (82, 'extra large', '52B');
INSERT INTO `master_size` VALUES (83, 'extra large', '52C');
INSERT INTO `master_size` VALUES (84, 'extra large', '52D');
INSERT INTO `master_size` VALUES (85, 'extra large', '52DD');
INSERT INTO `master_size` VALUES (86, 'extra large', '52DDD');
INSERT INTO `master_size` VALUES (87, 'extra large', '52G');
INSERT INTO `master_size` VALUES (88, 'extra large', '52H');
INSERT INTO `master_size` VALUES (89, NULL, '70A');
INSERT INTO `master_size` VALUES (90, NULL, '70B');
INSERT INTO `master_size` VALUES (91, NULL, '70C');
INSERT INTO `master_size` VALUES (92, NULL, '70D');
INSERT INTO `master_size` VALUES (93, NULL, '70DD');
INSERT INTO `master_size` VALUES (94, NULL, '70DDD');
INSERT INTO `master_size` VALUES (95, NULL, '70G');
INSERT INTO `master_size` VALUES (96, NULL, '70H');
INSERT INTO `master_size` VALUES (97, NULL, '75A');
INSERT INTO `master_size` VALUES (98, NULL, '75B');
INSERT INTO `master_size` VALUES (99, NULL, '75C');
INSERT INTO `master_size` VALUES (100, NULL, '75D');
INSERT INTO `master_size` VALUES (101, NULL, '75DD');
INSERT INTO `master_size` VALUES (102, NULL, '75DDD');
INSERT INTO `master_size` VALUES (103, NULL, '75G');
INSERT INTO `master_size` VALUES (104, NULL, '75H');
INSERT INTO `master_size` VALUES (105, NULL, '80A');
INSERT INTO `master_size` VALUES (106, NULL, '80B');
INSERT INTO `master_size` VALUES (107, NULL, '80C');
INSERT INTO `master_size` VALUES (108, NULL, '80D');
INSERT INTO `master_size` VALUES (109, NULL, '80DD');
INSERT INTO `master_size` VALUES (110, NULL, '80DDD');
INSERT INTO `master_size` VALUES (111, NULL, '80G');
INSERT INTO `master_size` VALUES (112, NULL, '80H');
INSERT INTO `master_size` VALUES (113, NULL, '85A');
INSERT INTO `master_size` VALUES (114, NULL, '85B');
INSERT INTO `master_size` VALUES (115, NULL, '85C');
INSERT INTO `master_size` VALUES (116, NULL, '85D');
INSERT INTO `master_size` VALUES (117, NULL, '85DD');
INSERT INTO `master_size` VALUES (118, NULL, '85DDD');
INSERT INTO `master_size` VALUES (119, NULL, '85G');
INSERT INTO `master_size` VALUES (120, NULL, '85H');
INSERT INTO `master_size` VALUES (121, NULL, '90A');
INSERT INTO `master_size` VALUES (122, NULL, '90B');
INSERT INTO `master_size` VALUES (123, NULL, '90C');
INSERT INTO `master_size` VALUES (124, NULL, '90D');
INSERT INTO `master_size` VALUES (125, NULL, '90DD');
INSERT INTO `master_size` VALUES (126, NULL, '90DDD');
INSERT INTO `master_size` VALUES (127, NULL, '90G');
INSERT INTO `master_size` VALUES (128, NULL, '90H');
INSERT INTO `master_size` VALUES (129, NULL, 'XS');
INSERT INTO `master_size` VALUES (130, NULL, 'S');
INSERT INTO `master_size` VALUES (131, NULL, 'M');
INSERT INTO `master_size` VALUES (132, NULL, 'L');
INSERT INTO `master_size` VALUES (133, NULL, 'XL');
INSERT INTO `master_size` VALUES (134, NULL, 'XXL');
INSERT INTO `master_size` VALUES (135, NULL, 'XXXL');

-- ----------------------------
-- Table structure for midmold_input_molding
-- ----------------------------
DROP TABLE IF EXISTS `midmold_input_molding`;
CREATE TABLE `midmold_input_molding`  (
  `id_mid_input_molding` int(11) NOT NULL AUTO_INCREMENT,
  `id_input_molding` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) UNSIGNED NULL DEFAULT NULL,
  `kode_barcode` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mid_input_molding`) USING BTREE,
  INDEX `fk_input_molding_mid`(`id_input_molding`) USING BTREE,
  CONSTRAINT `fk_input_molding_mid` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for midmold_output_molding
-- ----------------------------
DROP TABLE IF EXISTS `midmold_output_molding`;
CREATE TABLE `midmold_output_molding`  (
  `id_mid_output_molding` int(11) NOT NULL AUTO_INCREMENT,
  `id_output_molding` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mid_output_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_output_molding`) USING BTREE,
  CONSTRAINT `fk_output_mold_2` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 348 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (1, '22045 (71380)', 'G3-19J032-1', 'STAR WHITE', 7968, '2019-10-10', b'1', '2019-11-18');
INSERT INTO `order` VALUES (2, '22045 (71380)', 'G3-19J032-2', 'STAR WHITE', 312, '2019-10-10', b'1', '2019-11-19');
INSERT INTO `order` VALUES (3, '22045 (71380)', 'G3-19J033-1', 'STAR WHITE', 7968, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (4, '22045 (71380)', 'G3-19J033-2', 'STAR WHITE', 312, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (5, '22045 (71380)', 'G3-19J034-1', 'STAR WHITE', 7968, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (6, '22045 (71380)', 'G3-19J034-2', 'STAR WHITE', 312, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (7, '22045 (71380)', 'G3-19J040-1', 'SHEER QUARTZ', 8064, '2019-10-10', b'1', '2019-11-26');
INSERT INTO `order` VALUES (8, '22045 (71380)', 'G3-19J008-1', 'DUSTY MAUVE', 14213, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (9, '22045 (71380)', 'G3-19J009-1', 'DUSTY MAUVE', 14210, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (10, '22045 (71380)', 'G3-19K009-1', 'WHITE ICE/STAR WHITE', 19836, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (11, '22045 (71380)', 'G3-19K009-2', 'WHITE ICE/STAR WHITE', 936, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (12, '22045 (71380)', 'G3-19K009-3', 'WHITE ICE/STAR WHITE', 2, '2019-11-14', b'1', '2019-11-27');
INSERT INTO `order` VALUES (13, '22045 (71380)', 'G3-19K009-4', 'WHITE ICE/STAR WHITE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (14, '22045 (71380)', 'G3-19L008K-1', 'STAR WHITE', 34884, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (15, '22045 (71380)', 'G3-19L008K-2', 'STAR WHITE', 2268, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (16, '22045 (71380)', 'G3-20A003L-1', 'STAR WHITE', 460, '2020-01-09', b'1', '2019-11-28');
INSERT INTO `order` VALUES (17, '22045 (71380)', 'G3-20A003L-2', 'STAR WHITE', 540, '2020-01-09', b'1', '2019-11-28');
INSERT INTO `order` VALUES (18, '22045 (71380)', 'PSBR 319', 'TOTALLY TAN', 11673, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (19, '22045 (71380)', 'G3-20A005L', 'SHEER QUARTZ', 11868, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (20, '22045 (71380)', 'G3-20A058L', 'GHOST NAVY', 14088, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (21, '22045 (71380)', 'G3-20A059L', 'TOASTED COCONUT', 800, '2020-01-09', b'1', '2019-11-28');
INSERT INTO `order` VALUES (22, '22045 (71380)', 'G3-20A060A', 'TOASTED COCONUT', 12580, '2020-01-16', NULL, NULL);
INSERT INTO `order` VALUES (23, '22045 (71380)', 'G3-19J039-2', 'DAMASK NEUTRAL', 984, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (24, '22045 (71380)', 'G3-19J038-1', 'DAMASK NEUTRAL', 9336, '2019-10-10', b'1', '2019-11-18');
INSERT INTO `order` VALUES (25, '22045 (71380)', 'G3-19J038-2', 'DAMASK NEUTRAL', 984, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (26, '22045 (71380)', 'G3-19J037-1', 'DAMASK NEUTRAL', 9336, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (27, '22045 (71380)', 'G3-19J037-2', 'DAMASK NEUTRAL', 984, '2019-10-10', b'1', '2019-11-18');
INSERT INTO `order` VALUES (28, '22045 (71380)', 'G3-19J035-1', 'WALNUT', 7308, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (29, '22045 (71380)', 'G3-19J010-1', 'DUSTY MAUVE', 14206, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (30, '22045 (71380)', 'G3-19K010-1', 'DAMASK NEUTRAL (1736)', 10008, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (31, '22045 (71380)', 'G3-19K010-2', 'DAMASK NEUTRAL (1736)', 4, '2019-11-14', b'1', '2019-11-18');
INSERT INTO `order` VALUES (32, '22045 (71380)', 'G3-19K008-1', 'MID BLACK', 11484, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (33, '22045 (71380)', 'G3-19K008-2', 'MID BLACK (0500)', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (34, '22045 (71380)', 'G3-19L007K', 'TIMES SQUARE NAVY', 7524, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (35, '22045 (71380)', 'G3-19L006K-1', 'MID BLACK', 16236, '2019-12-12', b'1', '2019-11-18');
INSERT INTO `order` VALUES (36, '22045 (71380)', 'G3-19L006K-2', 'MID BLACK', 396, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (37, '22045 (71380)', 'G3-19L009K', 'WALNUT', 9468, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (38, '22045 (71380)', 'G3-19L011K', 'SHEER QUARTZ', 7896, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (39, '22045 (71380)', 'G3-19L010K', 'DAMASK NEUTRAL', 48780, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (40, '22045 (71380)', '??', 'CLEAR WATERS', 29674, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (41, '22045 (71380)', 'G3-20A002L-1', 'MID BLACK', 300, '2020-01-09', b'1', '2019-12-09');
INSERT INTO `order` VALUES (42, '22045 (71380)', 'G3-20A002L-2', 'MID BLACK', 300, '2020-01-09', b'1', '2019-12-09');
INSERT INTO `order` VALUES (43, '9271380 (22045)', 'G3-20A021A', 'MID BLACK', 828, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (44, '9271380 (22045)', 'G3-20A020A', 'DAMASK NEUTRAL', 720, '2020-01-24', b'1', '2019-11-28');
INSERT INTO `order` VALUES (45, '22045 (71380)', 'G3-20A034L', 'WALNUT', 4536, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (46, '72335', 'G3-19J045-1', 'DAMASK NEUTRAL', 14921, '2019-10-10', b'1', '2019-11-18');
INSERT INTO `order` VALUES (47, '72335', 'G3-19J043-1', 'MID BLACK', 7164, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (48, '9272335', 'G3-19J057-1', 'CLEAR WATERS', 1188, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (49, '72335', 'G3-19J011-1', 'CLEAR WATERS ', 10905, '2019-10-31', b'1', '2019-11-18');
INSERT INTO `order` VALUES (50, '72335', 'G3-19J012-1', 'CLEAR WATERS ', 10905, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (51, '72335', 'G3-19J013-1', 'CLEAR WATERS ', 10895, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (52, '72335', 'G3-19K017-1', 'DAMASK NEUTRAL', 15372, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (53, '72335', 'G3-19K017-2', 'DAMASK NEUTRAL', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (54, '72335', 'G3-19K016-1', 'WHITE ICE/STAR WHITE', 15180, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (55, '72335', 'G3-19K016-2', 'WHITE ICE/STAR WHITE', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (56, '72334 (72335)', 'G3-19K035K-1', 'SHEER QUARTZ', 300, '2019-11-28', b'1', '2019-12-09');
INSERT INTO `order` VALUES (57, '72334 (72335)', 'G3-19K035K-2', 'SHEER QUARTZ', 300, '2019-11-28', b'1', '2019-11-18');
INSERT INTO `order` VALUES (58, '72334 (72335)', 'G3-19K035K-3', 'SHEER QUARTZ', 608, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (59, '72334 (72335)', 'G3-19K035K-4', 'SHEER QUARTZ', 592, '2019-11-28', b'1', '2019-11-18');
INSERT INTO `order` VALUES (60, '72334 (72335)', 'G3-19K035K-5', 'SHEER QUARTZ', 608, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (61, '72334 (72335)', 'G3-19K035K-6', 'SHEER QUARTZ', 592, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (62, '72335', 'G3-19L018K', 'MID BLACK', 12252, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (63, '72335', 'G3-19L019K', 'STAR WHITE', 16044, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (64, '72335', 'G3-19L021K', 'SHEER QUARTZ', 5292, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (65, '72335', 'G3-19L017K', 'IVORY', 14712, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (66, '72335', 'G3-20A006L', 'IVORY', 3960, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (67, '72335', 'G3-20A007L', 'MID BLACK', 5460, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (68, '72335', 'G3-20A008L', 'STAR WHITE', 18852, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (69, '9272335', 'G3-20A024A', 'DAMASK NEUTRAL', 1728, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (70, '9272335', 'G3-20A025A', 'MID BLACK', 1116, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (71, '1801365 (72267)', 'G3-19K032J', 'DAMASK NEUTRAL', 16896, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (72, '1801365 (72267)', 'G3-19K029J', 'EARTHY GREY', 9120, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (73, '1801365 (72267)', 'G3-19K033J', 'MIDNIGHT BLACK', 13836, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (74, '1801365 (72267)', 'G3-19K028J', 'STAR WHITE', 13826, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (75, '1801365 (72267)', 'G3-19L039K', 'MIDNIGHT BLACK', 3600, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (76, '1801365 (72267)', 'G3-19L040K', 'DAMASK NEUTRAL', 3600, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (77, '1801365 (72267)', 'G3-19L041K', 'SHEER QUARTZ', 3600, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (78, '1801365 (72267)', 'G3-19L042K', 'STAR WHITE', 3600, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (79, '1801365 (9272267) BLI CANADA', 'G3-20A026L', 'SHEER QUARTZ', 3204, '2020-01-04', NULL, NULL);
INSERT INTO `order` VALUES (80, '1801365 (9272267) BLI CANADA', 'G3-20A027L', 'MID BLACK', 3204, '2020-01-04', NULL, NULL);
INSERT INTO `order` VALUES (81, '1801365 (72267)', 'G3-20A028L', 'MID BLACK', 5280, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (82, '1801365 (72267)', 'G3-20A029L', 'STAR WHITE', 4824, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (83, '1801365 (72267)', 'G3-20A030L', 'DAMASK NEUTRAL', 4848, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (84, '1801365 (72267)', 'G3-20A031L', 'SHEER QUARTZ', 5040, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (85, '22047 (76080)', 'G3-19J006-1', 'CLEAR WATERS ', 11378, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (86, '22047 (76080)', 'G3-19J006-2', 'CLEAR WATERS ', 2917, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (87, '22047 (76080)', 'G3-19J054-1', 'STAR WHITE', 2052, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (88, '22047 (76080)', 'G3-19J054-2', 'STAR WHITE', 1548, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (89, '22047 (76080)', 'G3-19J053-1', 'MID BLACK', 2172, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (90, '22047 (76080)', 'G3-19J053-2', 'MID BLACK', 1428, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (91, '76080 (03681)', 'G3-19J051-1', 'COCONUT WHITE LACE', 15996, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (92, '76080 (03681)', 'G3-19J051-2', 'COCONUT WHITE LACE', 2856, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (93, '76080 (03681)', 'G3-19J052-1', 'DAMASK NEUTRAL LACE', 16692, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (94, '76080 (03681)', 'G3-19J052-2', 'DAMASK NEUTRAL LACE', 2892, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (95, '76080 (03681)', 'G3-19K021-1', 'DAMASK NEUTRAL LACE', 4164, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (96, '76080 (03681)', 'G3-19K021-2', 'DAMASK NEUTRAL LACE', 720, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (97, '76080 (03681)', 'G3-19K020-1', 'COCONUT WHITE LACE', 3876, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (98, '76080 (03681)', 'G3-19K020-2', 'COCONUT WHITE LACE', 672, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (99, '22047 (76080)', 'G3-19K018-1', 'STAR WHITE', 3252, '2019-11-14', b'1', '2019-11-16');
INSERT INTO `order` VALUES (100, '22047 (76080)', 'G3-19K018-2', 'STAR WHITE', 732, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (101, '22047 (76080)', 'G3-19K018-3', 'STAR WHITE', 144, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (102, '22047 (76080)', 'G3-19K019-1', 'DAMASK NEUTRAL', 3804, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (103, '22047 (76080)', 'G3-19K019-2', 'DAMASK NEUTRAL', 2676, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (104, '76080 (03681)', 'G3-19L032K-1', 'DAMASK NEUTRAL LACE', 3816, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (105, '76080 (03681)', 'G3-19L032K-2', 'DAMASK NEUTRAL LACE', 612, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (106, '76080 (03681)', 'G3-19L031K-1', 'COCONUT WHITE LACE', 3600, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (107, '76080 (03681)', 'G3-19L031K-2', 'COCONUT WHITE LACE', 612, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (108, '22047 (76080)', 'G3-19L028K-2', 'STAR WHITE', 5940, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (109, '22047 (76080)', 'G3-19L028K-3', 'STAR WHITE', 396, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (110, '22047 (76080)', 'G3-19L028K-1', 'STAR WHITE', 14964, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (111, '22047 (76080)', 'G3-19L030K-1', 'SHEER QUARTZ', 8220, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (112, '22047 (76080)', 'G3-19L030K-2', 'SHEER QUARTZ', 4260, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (113, '22047 (76080)', 'G3-19L027K-1', 'MID BLACK', 10608, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (114, '22047 (76080)', 'G3-19L027K-2', 'MID BLACK', 3636, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (115, '22047 (76080)', 'G3-19L029K-1', 'DAMASK NEUTRAL', 16512, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (116, '22047 (76080)', 'G3-19L029K-2', 'DAMASK NEUTRAL', 6516, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (117, '22047 (76080)', 'G3-19L029K-3', 'DAMASK NEUTRAL', 312, '2019-12-18', NULL, NULL);
INSERT INTO `order` VALUES (118, '22047 (76080)', 'G3-20A018L-1', 'CLEAR WATERS ', 3984, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (119, '22047 (76080)', 'G3-20A018L-2', 'CLEAR WATERS ', 1068, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (120, '22047 (76080)', 'G3-20A011L-1', 'MID BLACK', 4620, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (121, '22047 (76080)', 'G3-20A011L-2', 'MID BLACK', 720, '2020-01-09', b'1', '2019-11-18');
INSERT INTO `order` VALUES (122, '22047 (76080)', 'G3-20A012L-1', 'STAR WHITE', 5892, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (123, '22047 (76080)', 'G3-20A012L-2', 'STAR WHITE', 600, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (124, '22047 (76080)', 'G3-20A013L-1', 'DAMASK NEUTRAL', 17976, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (125, '22047 (76080)', 'G3-20A013L-2', 'DAMASK NEUTRAL', 3648, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (126, '22047 (76080)', 'G3-20A013L-3', 'DAMASK NEUTRAL', 180, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (127, '22047 (76080)', 'G3-20A014L-1', 'SHEER QUARTZ', 4584, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (128, '22047 (76080)', 'G3-20A014L-2', 'SHEER QUARTZ', 1800, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (129, '22997 (3476528) CF & CUP LACE', 'G3-19J017-1', 'SHEER QUARTZ LACE', 14472, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (130, '22997 (3476528) CF LACE', 'G3-19J019-1', 'MIDNIGHT BLACK LACE', 12744, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (131, '3476528 CF LACE – PREPACK', 'G3-19K026-1', 'MIDNIGHT BLACK LACE', 2360, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (132, '3476528 CF LACE – PREPACK', 'G3-19K026-2', 'MIDNIGHT BLACK LACE', 472, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (133, '3476528 CF LACE – PREPACK', 'G3-19K026-3', 'MIDNIGHT BLACK LACE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (134, '3476528 CF LACE – PREPACK', 'G3-19K026-4', 'MIDNIGHT BLACK LACE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (135, '22997 (3476528) CF LACE', 'G3-19K023-1', 'STAR WHITE LACE', 3996, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (136, '22997 (3476528) CF LACE', 'G3-19K023-2', 'STAR WHITE LACE', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (137, '3476528 CF LACE – PREPACK', 'G3-19K025-1', 'STAR WHITE LACE', 2360, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (138, '3476528 CF LACE – PREPACK', 'G3-19K025-2', 'STAR WHITE LACE', 472, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (139, '3476528 CF LACE – PREPACK', 'G3-19K025-3', 'STAR WHITE LACE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (140, '3476528 CF LACE – PREPACK', 'G3-19K025-4', 'STAR WHITE LACE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (141, '22997 (3476528) CF & CUP LACE', 'G3-19K022-1', 'SHEER QUARTZ LACE', 9504, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (142, '22997 (3476528) CF & CUP LACE', 'G3-19K022-2', 'SHEER QUARTZ LACE', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (143, '22997 (3476528) CF LACE', 'G3-19K024-1', 'SHEER QUARTZ LACE', 2360, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (144, '22997 (3476528) CF LACE', 'G3-19K024-2', 'SHEER QUARTZ LACE', 472, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (145, '22997 (3476528) CF LACE', 'G3-19K024-3', 'SHEER QUARTZ LACE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (146, '22997 (3476528) CF LACE', 'G3-19K024-4', 'SHEER QUARTZ LACE', 2, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (147, '93476528 (3476528) CF & CUP LACE', 'G3-19L038K -1', 'SHEER QUARTZ LACE', 11736, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (148, '93476528 (3476528) CF & CUP LACE', 'G3-19L038K -2', 'SHEER QUARTZ LACE', 1944, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (149, '93476528 (3476528) CF & CUP LACE', 'G3-19L038K -3-4', 'SHEER QUARTZ LACE', 14, NULL, NULL, NULL);
INSERT INTO `order` VALUES (150, '93476528 (3476528) CF LACE', 'G3-19L036K -1', 'STAR WHITE LACE', 14544, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (151, '93476528 (3476528) CF LACE', 'G3-19L036K -2', 'STAR WHITE LACE', 2376, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (152, '93476528 (3476528) CF LACE', 'G3-19L036K -3-4', 'STAR WHITE LACE', 21, NULL, NULL, NULL);
INSERT INTO `order` VALUES (153, '93476528 (3476528) CF LACE', 'G3-19L037K -1', 'MIDNIGHT BLACK LACE', 10584, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (154, '93476528 (3476528) CF LACE', 'G3-19L037K -2', 'MIDNIGHT BLACK LACE', 1728, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (155, '93476528 (3476528) CF LACE', 'G3-19L037K -2', 'MIDNIGHT BLACK LACE', 14, NULL, NULL, NULL);
INSERT INTO `order` VALUES (156, '22045 (71380)', 'G3-20A001L', 'IVORY', 6876, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (157, '22045 (71380)', 'G3-20A033L', 'TIMES SQUARE NAVY', 4500, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (158, '72335', 'G3-19J044-1', 'STAR WHITE', 13320, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (159, '72335', 'G3-19J046-1', 'SHEER QUARTZ', 3588, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (160, '72335', 'G3-19K014-1', 'IVORY (0392)', 8568, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (161, '72335', 'G3-19K014-2', 'IVORY (0392)', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (162, '72335', 'G3-19K015-1', 'MID BLACK/BRILLIANT BLACK', 3696, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (163, '72335', 'G3-19K015-2', 'MID BLACK/BRILLIANT BLACK', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (164, '72334 (72335)', 'G3-19K034K-1', 'MID BLACK', 608, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (165, '72334 (72335)', 'G3-19K034K-2', 'MID BLACK', 592, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (166, '72334 (72335)', 'G3-19K034K-3', 'MID BLACK', 608, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (167, '72334 (72335)', 'G3-19K034K-4', 'MID BLACK', 592, '2019-11-28', b'1', '2019-11-18');
INSERT INTO `order` VALUES (168, '72334 (72335)', 'G3-19K034K-5', 'MID BLACK', 608, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (169, '72334 (72335)', 'G3-19K034K-6', 'MID BLACK', 592, '2019-11-28', NULL, NULL);
INSERT INTO `order` VALUES (170, '3472389', 'G3-19L033K-1', 'STAR WHITE ', 16488, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (171, '3472389', 'G3-19L033K-2', 'STAR WHITE ', 3564, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (172, '3472389', 'G3-20A032L-1', 'STAR WHITE ', 6948, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (173, '3472389', 'G3-20A032L-2', 'STAR WHITE ', 2052, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (174, '3472389', 'psbr 319', 'MID BLACK', 14904, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (175, '3472389', 'psbr 319', 'MID BLACK', 5112, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (176, '22045 (71380)', 'G3-19J031-1', 'TIMES SQUARE NAVY', 5724, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (177, '22045 (71380)', 'G3-19J029-1', 'IVORY', 7668, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (178, '9271380 (22045)', 'G3-19J056-1', 'DUSTY MAUVE', 1152, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (179, '2131101 (JACQUARD)', 'G3-19K003-1', 'SOFT BLUE JACQUARD', 11982, '2019-11-17', NULL, NULL);
INSERT INTO `order` VALUES (180, '2131101 (JACQUARD)', 'G3-19L003-1', 'CHAMPAGNE', 3888, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (181, '2131101 (JACQUARD)', 'G3-19L002-1', 'BLACK', 4320, '2019-11-20', NULL, NULL);
INSERT INTO `order` VALUES (182, '2131101 (JACQUARD)', 'G3-19L002-2', 'BLACK', 72, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (183, '2131101 (JACQUARD)', 'G3-19L001-1', 'WHITE', 6228, '2019-12-12', b'1', '2019-11-18');
INSERT INTO `order` VALUES (184, '2131101 (JACQUARD)', 'G3-19L004-1', 'BARELY BEIGE', 5004, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (185, '2131101 (JACQUARD)', 'G3-19L004-2', 'BARELY BEIGE', 180, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (186, '2131101 (JACQUARD)', 'G3-19L034K', 'BARELY BEIGE', 3744, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (187, '2131101 (JACQUARD)', 'G3-19L035K', 'WHITE', 5004, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (188, '2131101 (JACQUARD)', 'psbr 319', 'DUSTY MAUVE', 11973, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (189, '2131101 (JACQUARD)', 'G3-20A037L', 'BLACK', 4176, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (190, '2131101 (JACQUARD)', 'G3-20A038L', 'SWEET CREAM', 3960, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (191, '75335 (08899)', 'G3-19J049-1', 'STAR WHITE', 7008, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (192, '75335 (08899)', 'G3-19J049-2', 'STAR WHITE', 5232, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (193, '75335 (08899)', 'G3-19J050-1', 'DAMASK NEUTRAL', 8544, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (194, '75335 (08899)', 'G3-19J050-2', 'DAMASK NEUTRAL', 8304, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (195, '75335 (08899)', 'G3-19J048-1', 'MID BLACK ', 5676, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (196, '75335 (08899)', 'G3-19J048-2', 'MID BLACK ', 7140, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (197, '75335 (08899)', 'G3-19J047-1', 'IVORY', 2304, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (198, '75335 (08899)', 'G3-19J047-2', 'IVORY', 1800, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (199, '75335 (08899)', 'G3-19J007-1', 'ROSY GLOW', 12431, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (200, '75335 (08899)', 'G3-19J007-2', 'ROSY GLOW', 6869, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (201, '75335 (08899)', 'G3-19K004-1', 'IVORY', 1944, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (202, '75335 (08899)', 'G3-19K004-2', 'IVORY', 1656, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (203, '75335 (08899)', 'G3-19K007-1', 'DAMASK NEUTRAL', 3600, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (204, '75335 (08899)', 'G3-19K007-2', 'DAMASK NEUTRAL', 6384, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (205, '75335 (08899)', 'G3-19K005-1', 'MID BLACK', 7608, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (206, '75335 (08899)', 'G3-19K005-2', 'MID BLACK', 7584, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (207, '75335 (08899)', 'G3-19K006-1', 'STAR WHITE', 7068, '2019-11-21', NULL, NULL);
INSERT INTO `order` VALUES (208, '75335 (08899)', 'G3-19K006-2', 'STAR WHITE', 10176, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (209, '72335', 'G3-19L020K', 'DAMASK NEUTRAL', 15900, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (210, '72335', 'G3-20A009L', 'DAMASK NEUTRAL', 12896, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (211, '75335 (08899)', NULL, 'SHEER QUARTZ ', 8004, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (212, '75335 (08899)', NULL, 'SHEER QUARTZ ', 6048, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (213, '75335 (08899)', 'G3-20A039L-1', 'STAR WHITE', 3120, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (214, '75335 (08899)', 'G3-20A039L-2', 'STAR WHITE', 2544, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (215, '75335 (08899)', 'G3-20A040L-1', 'DAMASK NEUTRAL', 5904, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (216, '75335 (08899)', 'G3-20A040L-2', 'DAMASK NEUTRAL', 4632, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (217, '9275335 (08899)', 'G3-20A022A-1', 'DAMASK NEUTRAL', 720, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (218, '9275335 (08899)', 'G3-20A022A-2', 'DAMASK NEUTRAL', 864, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (219, '9275335 (08899)', 'G3-20A023A-1', 'MID BLACK', 324, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (220, '9275335 (08899)', 'G3-20A023A-2', 'MID BLACK', 792, '2020-01-24', NULL, NULL);
INSERT INTO `order` VALUES (221, '22045 (71380)', 'G3-19J039-1', 'DAMASK NEUTRAL', 9336, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (222, '1801365 (72267)', 'G3-19K030J', 'SHEER QUARTZ', 14556, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (223, '1801365 (72267)', 'G3-19K031J', 'CLEAR WATERS', 9540, '2019-10-14', NULL, NULL);
INSERT INTO `order` VALUES (224, '75345 SOLID', 'PSBR 320', 'MID BLACK', 10812, '2019-12-19', NULL, NULL);
INSERT INTO `order` VALUES (225, '75345 SOLID', 'PSBR 320', 'MID BLACK', 4356, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (226, '75345 SOLID', 'PSBR 320', 'STAR WHITE', 3660, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (227, '75345 SOLID', 'PSBR 320', 'DAMASK NEUTRAL', 4932, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (228, '75345 SOLID', 'PSBR 320', 'CHAMPAGNE', 5868, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (229, '75345 SOLID', 'PSBR 320', 'STEELE VIOLET', 3768, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (230, '3476571 (23002)/5304570', 'G3-19J028-1', 'HONEY BEIGE', 6444, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (231, '3476571 (23002)/5304570', 'G3-19J028-2', 'HONEY BEIGE', 11124, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (232, '3476571 (23002)/5304570', 'G3-19J028-3', 'HONEY BEIGE', 468, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (233, '3476571 (23002)/5304570', 'G3-19J022-1', 'MID BLACK', 5616, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (234, '3476571 (23002)/5304570', 'G3-19J022-2', 'MID BLACK', 13968, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (235, '3476571 (23002)/5304570', 'G3-19J022-3', 'MID BLACK', 1908, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (236, '3476571 (23002)/5304570', 'G3-19J023-1', 'MID BLACK', 5616, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (237, '3476571 (23002)/5304570', 'G3-19J023-2', 'MID BLACK', 13968, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (238, '3476571 (23002)/5304570', 'G3-19J023-3', 'MID BLACK', 1980, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (239, '3476571 (23002 LACE) – PREPACK', 'G3-19K027-1', 'HUSH LACE', 31224, '2019-11-17', NULL, NULL);
INSERT INTO `order` VALUES (240, '3476571 (23002 LACE) – PREPACK', 'G3-19K027-2', 'HUSH LACE', 70254, '2019-11-17', NULL, NULL);
INSERT INTO `order` VALUES (241, '3476571 (23002 LACE) – PREPACK', 'G3-19K027-3', 'HUSH LACE', 23418, '2019-11-17', NULL, NULL);
INSERT INTO `order` VALUES (242, '3476571 LACE (5304570 LACE)', 'G3-19L026K-1', 'HUSH LACE', 10548, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (243, '3476571 LACE (5304570 LACE)', 'G3-19L026K-2', 'HUSH LACE', 23328, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (244, '3476571 LACE (5304570 LACE)', 'G3-19L026K-3', 'HUSH LACE', 8136, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (245, '3476571 (5304570)', 'G3-19L016K-1', 'white', 14184, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (246, '3476571 (5304570)', 'G3-19L016K-2', 'white', 31824, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (247, '3476571 (5304570)', 'G3-20A015L-1', 'STAR WHITE ', 10152, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (248, '3476571 (5304570)', 'G3-20A015L-2', 'STAR WHITE ', 17388, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (249, '3476571 (5304570)', 'G3-20A015L-3', 'STAR WHITE ', 504, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (250, '3476571 (5304570)', 'G3-20A016L-1', 'HONEY BEIGE', 4464, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (251, '3476571 (5304570)', 'G3-20A016L-2', 'HONEY BEIGE', 10692, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (252, '3476571 (5304570)', 'G3-20A016L-3', 'HONEY BEIGE', 720, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (253, '3476571 LACE (5304570 LACE)', 'G3-20A017L-1', 'HUSH LACE', 6192, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (254, '3476571 LACE (5304570 LACE)', 'G3-20A017L-2', 'HUSH LACE', 15768, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (255, '3476571 LACE (5304570 LACE)', 'G3-20A017L-3', 'HUSH LACE', 5436, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (256, '22065 (71265)', 'G3-19J055-1', 'BEACHSIDE AQUA', 13572, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (257, '72298', 'G3-19J014-1', 'BEACHSIDE AQUA JACQUARD', 8861, '2019-11-08', NULL, NULL);
INSERT INTO `order` VALUES (258, '75298 (15773)', 'G3-19J004-1', 'CLEAR WATERS JACQUARD', 8606, '2019-11-16', NULL, NULL);
INSERT INTO `order` VALUES (259, '22065 (71265)', 'G3-19L014K', 'COCONUT WHITE', 7872, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (260, '22065 (71265)', 'G3-19L012K', 'MID BLACK', 3600, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (261, '22065 (71265)', 'G3-19L013K-1', 'HONEY BEIGE', 4704, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (262, '22065 (71265)', 'G3-19L013K-2', 'HONEY BEIGE', 216, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (263, '22065 (71265)', 'G3-19L015K-1', 'SHEER QUARTZ', 2628, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (264, '22065 (71265)', 'G3-19L015K-2', 'SHEER QUARTZ', 972, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (265, '22045 (71380)', 'G3-19L005K', 'IVORY', 4788, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (266, '22045 (71380)', 'G3-19L010K', 'DAMASK NEUTRAL', 48780, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (267, '22045 (71380)', 'PSBR 319', 'CAPPUCCINO', 11673, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (268, '22045 (71380)', 'G3-20A004L-1', 'DAMASK NEUTRAL', 15468, '2020-01-16', NULL, NULL);
INSERT INTO `order` VALUES (269, '22045 (71380)', 'G3-20A004L-2', 'DAMASK NEUTRAL', 468, '2020-01-16', NULL, NULL);
INSERT INTO `order` VALUES (270, '2172205', 'G3-19J020-1', 'WHITE', 3636, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (271, '2172205 (17585)', 'G3-19J021-1', 'LC COCONUT WHITE', 3636, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (272, '22068 (71380)', 'G3-19J041-1', 'COCONUT WHITE LACE', 3600, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (273, '22068 (71380)', 'G3-19K011-1', 'MIDNIGHT BLACK LACE (2442)', 150, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (274, '22068 (71380)', 'G3-19K011-2', 'MIDNIGHT BLACK LACE (2442)', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (275, '22068 (71380)', 'G3-19K012-1', 'HONEY BEIGE LACE (2467)', 1164, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (276, '22068 (71380)', 'G3-19K012-2', 'HONEY BEIGE LACE (2467)', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (277, '22068 (71380)', 'G3-19K013-1', 'COCONUT WHITE LACE (3748)', 624, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (278, '22068 (71380)', 'G3-19K013-2', 'COCONUT WHITE LACE (3748)', 4, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (279, '2172205 (17585)', 'G3-19K002-1', 'LC BLUSHING ROSE', 7689, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (280, '2172205 (17585)', 'G3-19K001-1', 'TWINKLE BLUE MARL', 7375, '2019-11-14', NULL, NULL);
INSERT INTO `order` VALUES (281, '2172205 (17585)', 'psbr 319', 'LC CLEAR WATERS', 7689, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (282, '22068 (71380)', 'G3-20A035L', 'HONEY BEIGE LACE', 5904, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (283, '22068 (71380)', 'G3-20A036L', 'COCONUT WHITE LACE', 3780, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (284, '17592 (75298)', 'G3-19J002-1', 'SHEER QUARTZ', 3552, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (285, '17592 (75298)', 'G3-19J001-1', 'DAMASK NEUTRAL ', 18384, '2019-10-10', NULL, NULL);
INSERT INTO `order` VALUES (286, '75298', 'G3-19J005-1', 'DUSTY MAUVE', 16984, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (287, '9275298 (17592)', 'G3-19J058-1', 'DUSTY MAUVE', 756, '2019-10-31', NULL, NULL);
INSERT INTO `order` VALUES (288, '17592 (75298)', 'G3-19L025K', 'SHEER QUARTZ ', 6744, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (289, '17592 (75298)', 'G3-19L022K', 'MID BLACK', 4476, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (290, '17592 (75298)', 'G3-19L024K-1', 'HONEY BEIGE', 1981, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (291, '17592 (75298)', 'G3-19L024K-2', 'HONEY BEIGE', 5243, '2019-12-12', NULL, NULL);
INSERT INTO `order` VALUES (292, '17592 (75298)', 'G3-19L023K', 'STAR WHITE', 3672, '2019-12-18', NULL, NULL);
INSERT INTO `order` VALUES (293, '17592 (75298)', NULL, 'SWEET NECTAR', 10747, '2020-01-02', NULL, NULL);
INSERT INTO `order` VALUES (294, '17592 (75298)', 'G3-20A045L', 'STAR WHITE', 5064, '2019-01-09', NULL, NULL);
INSERT INTO `order` VALUES (295, '17592 (75298)', 'G3-20A046L', 'DAMASK NEUTRAL ', 6060, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (296, '17592 (75298)', 'G3-20A047L', 'HONEY BEIGE', 5292, '2020-01-09', NULL, NULL);
INSERT INTO `order` VALUES (297, '17592 (75298)', 'G3-20A048L-1', 'SHEER QUARTZ ', 486, '2020-01-16', NULL, NULL);
INSERT INTO `order` VALUES (298, '17592 (75298)', 'G3-20A048L-2', 'SHEER QUARTZ ', 4806, '2020-01-17', NULL, NULL);
INSERT INTO `order` VALUES (299, '61564', 'G1-19J028', 'BLACK', 2010, '2019-10-18', NULL, NULL);
INSERT INTO `order` VALUES (300, '61564', 'G1-19J027', 'WHITE', 7050, '2019-10-18', b'1', '2019-11-18');
INSERT INTO `order` VALUES (301, '61564', 'G1-19J022-1', 'AMPARO BLUE', 6075, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (302, '61564', 'G1-19J081-J', 'AMPARO BLUE', 1350, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (303, '61564', 'G1-19J022-2', 'AMPARO BLUE', 15, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (304, '61564', 'G1-19J021-1', 'CONFETTI', 18051, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (305, '61564', 'G1-19J021-2', 'CONFETTI', 15, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (306, '61564', 'G1-19J080-J', 'CONFETTI', 894, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (307, '61564', 'G1-19J084J', 'BLACK', 584, '2019-10-30', NULL, NULL);
INSERT INTO `order` VALUES (308, '61564', 'G1-19J083J', 'WHITE', 2976, '2019-10-30', NULL, NULL);
INSERT INTO `order` VALUES (309, '61564', 'G1-19K030-1', 'WHITE', 1530, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (310, '61564', 'G1-19L055K', 'WHITE', 15000, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (311, '61564', 'G1-19L056K', 'BLACK', 8010, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (312, '619210', 'G1-20B015A -1', 'WHITE/LILAC', 9, '2019-02-14', NULL, NULL);
INSERT INTO `order` VALUES (313, '66564', 'G1-19J025', 'BLACK ', 1920, '2019-10-18', NULL, NULL);
INSERT INTO `order` VALUES (314, '66564', 'G1-19J026', 'WHITE', 4020, '2019-10-18', NULL, NULL);
INSERT INTO `order` VALUES (315, '66564', 'G1-19K027-1', 'BLACK', 2490, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (316, '66564', 'G1-19K028-1', 'WHITE', 3510, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (317, '66564', 'G1-19K029-1', 'SKIN', 1500, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (318, '61564', 'G1-19K031-1', 'BLACK', 4020, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (319, '61564', 'G1-19K032-1', 'SKIN', 4020, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (320, '61564', 'G1-19J085J', 'SKIN', 871, '2019-10-30', NULL, NULL);
INSERT INTO `order` VALUES (321, '31564', 'G1-19K033-1', 'WHITE', 1710, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (322, '31564', 'G1-19L058K', 'WHITE', 1500, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (323, '31564', 'G1-19L059K', 'BLACK', 1500, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (324, '66564', 'G1-19L052K', 'BLACK', 5040, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (325, '66564', 'G1-19L053K', 'WHITE', 4020, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (326, '66564', 'G1-19L054K', 'SKIN', 3000, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (327, '61564', 'G1-19L057K', 'SKIN', 7050, '2019-12-13', NULL, NULL);
INSERT INTO `order` VALUES (328, '66564', 'G1-20A019A', 'White', 5010, '2020-01-10', NULL, NULL);
INSERT INTO `order` VALUES (329, '66564', 'G1-20A018A', 'Black', 7020, '2020-01-10', NULL, NULL);
INSERT INTO `order` VALUES (330, '669210', 'G1-20B014A -1', 'WHITE/LILAC', 7, '2019-02-14', NULL, NULL);
INSERT INTO `order` VALUES (331, '70564', 'G1-19J024', 'WHITE', 14430, '2019-10-18', NULL, NULL);
INSERT INTO `order` VALUES (332, '70564', 'G1-19J020-1', 'amparo blue', 6075, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (333, '70564', 'G1-19J079J', 'amparo blue', 1350, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (334, '70564', 'G1-19J019-1', 'CONFETTI', 18945, '2019-10-25', NULL, NULL);
INSERT INTO `order` VALUES (335, '70564', 'G1-19K025-1', 'WHITE', 8010, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (336, '70564', 'G1-19K025-2', 'WHITE', 12, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (337, '70564', 'G1-19K026-1', 'SKIN', 9360, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (338, '70564', 'G1-19K026-2', 'SKIN', 12, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (339, '70564', 'G1-19L051K', 'SKIN', 13260, '2019-12-13', NULL, NULL);
INSERT INTO `order` VALUES (340, '70564', 'G1-19L050K', 'WHITE', 27270, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (341, '70564', 'G1-19L049K', 'BLACK', 25230, '2019-12-06', NULL, NULL);
INSERT INTO `order` VALUES (342, '70564', 'G1-20A017A', 'White', 28410, '2020-01-10', NULL, NULL);
INSERT INTO `order` VALUES (343, '709210', 'G1-20B013A -1', 'WHITE/LILAC', 20, '2019-02-14', NULL, NULL);
INSERT INTO `order` VALUES (344, '70564', 'G1-19J023', 'BLACK', 16950, '2019-10-18', NULL, NULL);
INSERT INTO `order` VALUES (345, '70564', 'G1-19K024-1', 'BLACK', 16320, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (346, '70564', 'G1-19K024-2', 'BLACK', 12, '2019-11-22', NULL, NULL);
INSERT INTO `order` VALUES (347, '70564', 'G1-20A016A', 'Black', 19140, '2020-01-10', NULL, NULL);

-- ----------------------------
-- Table structure for outermold_input_molding
-- ----------------------------
DROP TABLE IF EXISTS `outermold_input_molding`;
CREATE TABLE `outermold_input_molding`  (
  `id_outer_input_molding` int(11) NOT NULL AUTO_INCREMENT,
  `id_input_molding` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_outer_input_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_input_molding`) USING BTREE,
  CONSTRAINT `fk_input_molding_outer` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for outermold_output_molding
-- ----------------------------
DROP TABLE IF EXISTS `outermold_output_molding`;
CREATE TABLE `outermold_output_molding`  (
  `id_outer_input_molding` int(11) NOT NULL AUTO_INCREMENT,
  `id_output_molding` int(11) NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_outer_input_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_output_molding`) USING BTREE,
  CONSTRAINT `fk_output_mold_1` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for output_cutting
-- ----------------------------
DROP TABLE IF EXISTS `output_cutting`;
CREATE TABLE `output_cutting`  (
  `id_output_cutting` int(11) NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `id_cutting` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_cutting`) USING BTREE,
  INDEX `fk_cutting_output`(`id_cutting`) USING BTREE,
  CONSTRAINT `fk_cutting_output` FOREIGN KEY (`id_cutting`) REFERENCES `cutting` (`id_cutting`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for output_cutting_detail
-- ----------------------------
DROP TABLE IF EXISTS `output_cutting_detail`;
CREATE TABLE `output_cutting_detail`  (
  `id_output_cutting_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_output_cutting` int(11) NULL DEFAULT NULL,
  `id_cutting_detail` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_cutting_detail`) USING BTREE,
  INDEX `fk_output_cutting`(`id_output_cutting`) USING BTREE,
  INDEX `fk_cutting_detail`(`id_cutting_detail`) USING BTREE,
  CONSTRAINT `fk_cutting_detail` FOREIGN KEY (`id_cutting_detail`) REFERENCES `cutting_detail` (`id_cutting_detail`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_output_cutting` FOREIGN KEY (`id_output_cutting`) REFERENCES `output_cutting` (`id_output_cutting`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for output_molding
-- ----------------------------
DROP TABLE IF EXISTS `output_molding`;
CREATE TABLE `output_molding`  (
  `id_output_molding` int(11) NOT NULL AUTO_INCREMENT,
  `shift` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_mesin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for output_packing
-- ----------------------------
DROP TABLE IF EXISTS `output_packing`;
CREATE TABLE `output_packing`  (
  `id_packing` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `karton` smallint(5) NULL DEFAULT NULL,
  `pcs` smallint(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id_packing`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for output_sewing
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing`;
CREATE TABLE `output_sewing`  (
  `id_output_sewing` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `center_panel_op` int(11) NULL DEFAULT NULL,
  `back_wings_op` int(11) NULL DEFAULT NULL,
  `cups_op` int(10) NULL DEFAULT NULL,
  `assembly_op` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for output_sewing_detail
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing_detail`;
CREATE TABLE `output_sewing_detail`  (
  `id_output_sewing_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_output_sewing` int(11) NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `center_panel` time(0) NULL DEFAULT NULL,
  `back_wings` time(0) NULL DEFAULT NULL,
  `cups` time(0) NULL DEFAULT NULL,
  `assembly` time(0) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing_detail`) USING BTREE,
  INDEX `fk_output_sewing`(`id_output_sewing`) USING BTREE,
  CONSTRAINT `fk_output_sewing` FOREIGN KEY (`id_output_sewing`) REFERENCES `output_sewing` (`id_output_sewing`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for shift_molding
-- ----------------------------
DROP TABLE IF EXISTS `shift_molding`;
CREATE TABLE `shift_molding`  (
  `id_shift_molding` int(11) NOT NULL AUTO_INCREMENT,
  `day` smallint(1) NULL DEFAULT NULL,
  `shift` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start` time(0) NULL DEFAULT NULL,
  `end` time(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_shift_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of shift_molding
-- ----------------------------
INSERT INTO `shift_molding` VALUES (1, 1, 'pertama', '07:00:00', '14:30:00');
INSERT INTO `shift_molding` VALUES (2, 1, 'kedua', '14:31:00', '22:30:00');
INSERT INTO `shift_molding` VALUES (3, 1, 'ketiga', '22:31:00', '06:30:00');
INSERT INTO `shift_molding` VALUES (4, 2, 'pertama', '07:00:00', '14:30:00');
INSERT INTO `shift_molding` VALUES (5, 2, 'kedua', '14:31:00', '22:30:00');
INSERT INTO `shift_molding` VALUES (6, 2, 'ketiga', '22:31:00', '06:30:00');
INSERT INTO `shift_molding` VALUES (7, 3, 'pertama', '07:00:00', '14:30:00');
INSERT INTO `shift_molding` VALUES (8, 3, 'kedua', '14:31:00', '22:30:00');
INSERT INTO `shift_molding` VALUES (9, 3, 'ketiga', '22:31:00', '06:30:00');
INSERT INTO `shift_molding` VALUES (10, 4, 'pertama', '07:00:00', '14:30:00');
INSERT INTO `shift_molding` VALUES (11, 4, 'kedua', '14:31:00', '22:30:00');
INSERT INTO `shift_molding` VALUES (12, 4, 'ketiga', '22:31:00', '06:30:00');
INSERT INTO `shift_molding` VALUES (13, 5, 'pertama', '07:00:00', '14:30:00');
INSERT INTO `shift_molding` VALUES (14, 5, 'kedua', '14:31:00', '22:30:00');
INSERT INTO `shift_molding` VALUES (15, 5, 'ketiga', '22:31:00', '06:30:00');
INSERT INTO `shift_molding` VALUES (16, 6, 'pertama', '07:00:00', '12:00:00');
INSERT INTO `shift_molding` VALUES (17, 6, 'kedua', '12:01:00', '17:15:00');
INSERT INTO `shift_molding` VALUES (18, 6, 'ketiga', '17:16:00', '22:30:00');

-- ----------------------------
-- Table structure for spv
-- ----------------------------
DROP TABLE IF EXISTS `spv`;
CREATE TABLE `spv`  (
  `id_spv` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_spv`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of spv
-- ----------------------------
INSERT INTO `spv` VALUES (1, 'WURI');
INSERT INTO `spv` VALUES (2, 'TATIK');
INSERT INTO `spv` VALUES (3, 'ASRI');
INSERT INTO `spv` VALUES (4, 'AYUK');
INSERT INTO `spv` VALUES (5, 'MURNI');
INSERT INTO `spv` VALUES (6, 'AYU');
INSERT INTO `spv` VALUES (7, 'TRI. R');
INSERT INTO `spv` VALUES (8, 'YATI');
INSERT INTO `spv` VALUES (9, 'ERNA');
INSERT INTO `spv` VALUES (10, 'YULI');
INSERT INTO `spv` VALUES (11, 'INDI');
INSERT INTO `spv` VALUES (12, 'MULYATI');
INSERT INTO `spv` VALUES (13, 'FERRY');
INSERT INTO `spv` VALUES (14, 'ETIK');
INSERT INTO `spv` VALUES (15, 'NURUL');
INSERT INTO `spv` VALUES (16, 'DWI K');
INSERT INTO `spv` VALUES (17, 'ENI K');
INSERT INTO `spv` VALUES (18, 'WARINI');
INSERT INTO `spv` VALUES (19, 'SRI P');
INSERT INTO `spv` VALUES (20, 'NANIK');
INSERT INTO `spv` VALUES (21, 'SRI S');
INSERT INTO `spv` VALUES (22, 'ZURIA 1');
INSERT INTO `spv` VALUES (23, 'ZURIA 2');
INSERT INTO `spv` VALUES (24, 'TRIKA 1');
INSERT INTO `spv` VALUES (25, 'TRIKA 2');
INSERT INTO `spv` VALUES (26, 'JUNITA');
INSERT INTO `spv` VALUES (27, 'ITA SARI');
INSERT INTO `spv` VALUES (28, 'TIMUR');
INSERT INTO `spv` VALUES (29, 'DESI');
INSERT INTO `spv` VALUES (30, 'LILIS');
INSERT INTO `spv` VALUES (31, 'EGI');
INSERT INTO `spv` VALUES (32, 'WAHYU');
INSERT INTO `spv` VALUES (33, 'WAHINI');

-- ----------------------------
-- Table structure for style_for_sam
-- ----------------------------
DROP TABLE IF EXISTS `style_for_sam`;
CREATE TABLE `style_for_sam`  (
  `id_style_sam` int(11) NOT NULL AUTO_INCREMENT,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_style_sam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (6, 'Super Admin', '60dca54e080f4f492d95172aeb07d0c1', 0);
INSERT INTO `user` VALUES (7, 'Admin Cutting', 'f5791d0ce873774376b342d0ee9dc36d', 0);
INSERT INTO `user` VALUES (8, 'Admin Molding', '1c1cfe2eca4b047dae167ee72f37a0e0', 0);
INSERT INTO `user` VALUES (9, 'Admin Packing', '4f482f4824cad6def3899a972f415ab8', 0);
INSERT INTO `user` VALUES (10, 'KARIMUN', 'f6de9c621ee4d0fe8ac7b355e538910c', 0);
INSERT INTO `user` VALUES (11, 'BROMO', '09f5af66f58af7892b3f23d4f9d3d2c2', 0);
INSERT INTO `user` VALUES (12, 'Admin Packing', '4f482f4824cad6def3899a972f415ab8', 0);
INSERT INTO `user` VALUES (13, 'DIENG', '389aabfc901ee75911e232ccfc5da994', 0);
INSERT INTO `user` VALUES (14, 'Admin PPIC', '9e296299502e0f037960a0065f761999', 1);

-- ----------------------------
-- View structure for viewcutting
-- ----------------------------
DROP VIEW IF EXISTS `viewcutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcutting` AS SELECT
cutting.id_cutting,
cutting.orc,
cutting.style,
cutting.color,
cutting.comm,
cutting.qty,
cutting_detail.id_cutting_detail,
cutting_detail.size,
cutting_detail.qty_pcs,
cutting_detail.no_bundle,
cutting_detail.kode_barcode,
cutting_detail.outermold_barcode,
cutting_detail.midmold_barcode,
cutting_detail.linningmold_barcode
FROM
cutting
INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting ;

-- ----------------------------
-- View structure for viewcuttingdone
-- ----------------------------
DROP VIEW IF EXISTS `viewcuttingdone`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcuttingdone` AS SELECT
cutting.id_cutting,
cutting.orc,
cutting.style,
cutting.color,
cutting.buyer,
cutting.comm,
cutting.so,
cutting.qty,
cutting.boxes,
cutting.prepare_on,
cutting_detail.id_cutting_detail,
cutting_detail.size,
cutting_detail.qty AS qty_detail,
cutting_detail.no_bundle,
cutting_detail.kode_barcode,
cutting_detail.cutting_date,
cutting_detail.printed_date,
cutting_detail.qty_pcs
FROM
cutting
INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting ;

-- ----------------------------
-- View structure for viewcuttingwithmold
-- ----------------------------
DROP VIEW IF EXISTS `viewcuttingwithmold`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcuttingwithmold` AS SELECT
cutting.id_cutting,
cutting.orc,
cutting.style,
cutting.color,
cutting.buyer,
cutting_detail.size,
cutting_detail.no_bundle,
cutting_detail.outermold_barcode,
cutting_detail.midmold_barcode,
cutting_detail.linningmold_barcode,
cutting_detail.qty_pcs
FROM
cutting
INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
WHERE
cutting_detail.outermold_barcode != "" OR
cutting_detail.midmold_barcode != "" OR
cutting_detail.linningmold_barcode != "" ;

-- ----------------------------
-- View structure for viewinputmolding
-- ----------------------------
DROP VIEW IF EXISTS `viewinputmolding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewinputmolding` AS SELECT
input_molding.id_input_molding,
input_molding.tgl,
input_molding.orc,
input_molding.style,
input_molding.color,
outermold_input_molding.no_bundle AS no_bundle_outer,
outermold_input_molding.size AS size_outer,
outermold_input_molding.qty_pcs AS qty_outer,
midmold_input_molding.no_bundle AS no_bundle_mid,
midmold_input_molding.size AS size_mid,
midmold_input_molding.qty_pcs AS qty_mid,
linningmold_input_molding.no_bundle AS no_bundle_linning,
linningmold_input_molding.size AS size_linning,
linningmold_input_molding.qty_pcs AS qty_linning
FROM
input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
order by id_input_molding ;

-- ----------------------------
-- View structure for viewoutputmolding
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputmolding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputmolding` AS SELECT
output_molding.id_output_molding,
output_molding.shift,
output_molding.no_mesin,
output_molding.tgl,
output_molding.orc,
output_molding.style,
output_molding.color,
outermold_output_molding.no_bundle AS no_bundle_outer,
outermold_output_molding.size AS size_outer,
outermold_output_molding.qty_pcs AS qty_outer,
midmold_output_molding.no_bundle AS no_bundle_mid,
midmold_output_molding.size AS size_mid,
midmold_output_molding.qty_pcs AS qty_mid,
linningmold_output_molding.no_bundle AS no_bundle_linning,
linningmold_output_molding.size AS size_linning,
linningmold_output_molding.qty_pcs AS qty_linning
FROM
output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding ;

-- ----------------------------
-- View structure for viewoutputsewing
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputsewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputsewing` AS SELECT
output_sewing_detail.id_output_sewing_detail,
output_sewing.line,
output_sewing.tgl,
output_sewing_detail.orc,
output_sewing_detail.no_bundle,
output_sewing_detail.center_panel,
output_sewing_detail.back_wings,
output_sewing_detail.cups,
output_sewing_detail.assembly,
output_sewing_detail.qty
FROM
output_sewing
INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing ;

-- ----------------------------
-- View structure for view_cutting
-- ----------------------------
DROP VIEW IF EXISTS `view_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_cutting` AS SELECT
`order`.orc,
`order`.style,
`order`.color,
`order`.qty AS `order`,
Sum(input_cutting.qty_pcs) AS cutting,
cutting.qty
FROM
cutting
INNER JOIN `order` ON cutting.orc = `order`.orc
INNER JOIN input_cutting ON input_cutting.orc = `order`.orc
GROUP BY
`order`.orc ;

-- ----------------------------
-- View structure for view_daily2
-- ----------------------------
DROP VIEW IF EXISTS `view_daily2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_daily2` AS SELECT
Sum(input_cutting.qty_pcs) AS result,
Sum(input_sewing.qty_pcs) AS send_to_sewing,
v_cutting_wip.WIP,
input_cutting.tgl
FROM
input_cutting
INNER JOIN input_sewing ON input_sewing.kode_barcode = input_cutting.kode_barcode AND input_sewing.orc = input_cutting.orc
INNER JOIN v_cutting_wip ON v_cutting_wip.orc = input_cutting.orc
WHERE
input_cutting.tgl = CURDATE() - 1
GROUP BY
input_cutting.tgl ;

-- ----------------------------
-- View structure for v_bar_cutting
-- ----------------------------
DROP VIEW IF EXISTS `v_bar_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_bar_cutting` AS SELECT
input_cutting.tgl,
Sum(input_cutting.qty_pcs) AS qty
FROM
input_cutting
WHERE
input_cutting.tgl = CURDATE() - 1
GROUP BY
input_cutting.tgl ;

-- ----------------------------
-- View structure for v_bar_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_bar_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_bar_molding` AS SELECT
input_molding.tgl,

COALESCE(Sum(linningmold_input_molding.qty_pcs),0) + COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS qty
FROM
input_molding
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
GROUP BY
input_molding.tgl DESC
LIMIT 6 ;

-- ----------------------------
-- View structure for v_bar_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_bar_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_bar_sewing` AS SELECT
input_sewing.tgl,
Sum(input_sewing.qty_pcs) AS qty
FROM
input_sewing
GROUP BY
input_sewing.tgl DESC
LIMIT 6 ;

-- ----------------------------
-- View structure for v_coba_bar
-- ----------------------------
DROP VIEW IF EXISTS `v_coba_bar`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_coba_bar` AS SELECT
input_cutting.tgl,
Sum(input_cutting.qty_pcs) AS qty
FROM
input_cutting

GROUP BY
input_cutting.tgl DESC
LIMIT 6 ;

-- ----------------------------
-- View structure for v_cutting
-- ----------------------------
DROP VIEW IF EXISTS `v_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cutting` AS SELECT
input_cutting.kode_barcode AS Barcode,
input_cutting.orc,
input_cutting.style,
master_color.group_color,
input_cutting.color,
master_size.`group` AS group_size,
input_cutting.size,
input_cutting.tgl AS cut_date,
input_cutting.qty_pcs AS cut_qty,
input_sewing.tgl AS sew_date,
input_sewing.qty_pcs AS sew_qty,
input_cutting.qty_pcs - input_sewing.qty_pcs AS WIP
FROM
input_cutting
LEFT JOIN input_sewing ON input_cutting.kode_barcode = input_sewing.kode_barcode
LEFT JOIN master_size ON master_size.`name` = input_cutting.size
LEFT JOIN master_color ON master_color.color = input_cutting.color ;

-- ----------------------------
-- View structure for v_cutting_in
-- ----------------------------
DROP VIEW IF EXISTS `v_cutting_in`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cutting_in` AS select cutting_date, size, sum(qty_pcs) as date_qty from cutting_detail
GROUP BY cutting_date, qty_pcs
ORDER BY cutting_date ;

-- ----------------------------
-- View structure for v_cutting_report1
-- ----------------------------
DROP VIEW IF EXISTS `v_cutting_report1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cutting_report1` AS SELECT
input_cutting.orc,
input_cutting.style,
input_cutting.color,
input_cutting.no_bundle,
input_cutting.size,
input_cutting.qty_pcs AS cut_qty,
input_cutting.tgl AS cut_date,
input_sewing.tgl AS sewing_date,
input_sewing.qty_pcs AS sewing_qty,
input_sewing.kode_barcode
FROM
input_cutting
JOIN input_sewing ON input_sewing.kode_barcode = input_cutting.kode_barcode ;

-- ----------------------------
-- View structure for v_cutting_to_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_cutting_to_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cutting_to_sewing` AS SELECT
input_sewing.orc,
input_sewing.style,
input_sewing.color,
Sum(input_sewing.qty_pcs) AS qty,
input_sewing.tgl
FROM
input_sewing
GROUP BY
input_sewing.orc ;

-- ----------------------------
-- View structure for v_cutting_wip
-- ----------------------------
DROP VIEW IF EXISTS `v_cutting_wip`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cutting_wip` AS SELECT
input_cutting.orc,
input_cutting.style,
input_cutting.color,
Sum(input_cutting.qty_pcs) AS qty_cutting,
Sum(input_sewing.qty_pcs) AS qty_sewing,
Sum(input_cutting.qty_pcs) - Sum(input_sewing.qty_pcs) AS WIP
FROM
input_cutting
INNER JOIN input_sewing ON input_cutting.kode_barcode = input_sewing.kode_barcode
GROUP BY
input_cutting.orc,
input_cutting.style,
input_cutting.color ;

-- ----------------------------
-- View structure for v_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_detail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_detail` AS SELECT
cutting.id_cutting,
cutting.orc,
cutting.style,
cutting.color,
cutting_detail.size,
cutting_detail.outermold_barcode,
cutting_detail.midmold_barcode,
cutting_detail.linningmold_barcode,
Sum(cutting_detail.qty_pcs)
FROM
cutting
INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
WHERE
cutting_detail.outermold_barcode <> "" OR
cutting_detail.midmold_barcode <> "" OR
cutting_detail.linningmold_barcode <> ""
GROUP BY
cutting_detail.size,
cutting.orc ;

-- ----------------------------
-- View structure for v_detail_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_detail_molding` AS SELECT
cutting.id_cutting,
cutting_detail.id_cutting_detail,
cutting.orc,
cutting.style,
cutting.color,
cutting_detail.size,
cutting_detail.outermold_barcode,
cutting_detail.midmold_barcode,
cutting_detail.linningmold_barcode,
cutting_detail.qty
FROM
cutting
RIGHT JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting
WHERE
cutting_detail.outermold_barcode != "" OR
cutting_detail.midmold_barcode != "" OR
cutting_detail.linningmold_barcode != ""
ORDER BY
cutting.id_cutting ASC ;

-- ----------------------------
-- View structure for v_input_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_input_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_input_molding` AS SELECT
input_molding.tgl,
input_molding.orc,
input_molding.style,
input_molding.color,
Sum(linningmold_input_molding.qty_pcs) AS qty_linning,
midmold_input_molding.size AS sz_midmold,
Sum(midmold_input_molding.qty_pcs) AS qty_midmold,
outermold_input_molding.size AS sz_outer,
Sum(outermold_input_molding.qty_pcs) AS qty_outer,
v_size.size
FROM
input_molding
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
INNER JOIN v_size ON input_molding.orc = v_size.orc
GROUP BY
v_size.size ;

-- ----------------------------
-- View structure for v_in_mold
-- ----------------------------
DROP VIEW IF EXISTS `v_in_mold`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_in_mold` AS SELECT
input_molding.id_input_molding,
input_molding.orc,
input_molding.style,
input_molding.color,
linningmold_input_molding.size AS sz_lin,
linningmold_input_molding.qty_pcs AS lin_qty,
linningmold_input_molding.kode_barcode AS lin_kode,
midmold_input_molding.size AS sz_mid,
midmold_input_molding.qty_pcs AS mid_qty,
midmold_input_molding.kode_barcode AS mid_kode,
outermold_input_molding.size AS szout,
outermold_input_molding.qty_pcs AS out_qty,
outermold_input_molding.kode_barcode AS out_kode
FROM
input_molding
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding ;

-- ----------------------------
-- View structure for v_molding_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_molding_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_molding_molding` AS SELECT
output_molding.tgl,
output_molding.orc,
output_molding.style,
output_molding.color,
Sum(linningmold_output_molding.qty_pcs) AS qty_linning,
linningmold_output_molding.size AS sz_linning,
Sum(midmold_output_molding.qty_pcs) AS qty_midmold,
midmold_output_molding.size AS sz_midmold,
Sum(outermold_output_molding.qty_pcs) AS qty_outer,
outermold_output_molding.size AS sz_outer
FROM
output_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
linningmold_output_molding.size,
midmold_output_molding.size,
outermold_output_molding.size ;

-- ----------------------------
-- View structure for v_molding_orc
-- ----------------------------
DROP VIEW IF EXISTS `v_molding_orc`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_molding_orc` AS SELECT
input_molding.tgl,
input_molding.orc,
COALESCE ( Sum( linningmold_input_molding.qty_pcs ), 0 ) AS in_linning,
COALESCE ( Sum( midmold_input_molding.qty_pcs ), 0 ) AS in_midmold,
COALESCE ( Sum( outermold_input_molding.qty_pcs ), 0 ) AS in_outer,
COALESCE ( Sum( linningmold_input_molding.qty_pcs ), 0 ) + COALESCE ( Sum( midmold_input_molding.qty_pcs ), 0 ) + COALESCE ( Sum( outermold_input_molding.qty_pcs ), 0 ) AS total_input,
COALESCE ( Sum( linningmold_output_molding.qty_pcs ), 0 ) AS out_linning,
COALESCE ( Sum( midmold_output_molding.qty_pcs ), 0 ) AS out_midmold,
COALESCE ( Sum( outermold_output_molding.qty_pcs ), 0 ) AS out_outermold,
COALESCE ( Sum( linningmold_output_molding.qty_pcs ), 0 ) + COALESCE ( Sum( midmold_output_molding.qty_pcs ), 0 ) + COALESCE ( Sum( outermold_output_molding.qty_pcs ), 0 ) AS total_output,
COALESCE ( Sum( linningmold_input_molding.qty_pcs ), 0 ) + COALESCE ( Sum( midmold_input_molding.qty_pcs ), 0 ) + COALESCE ( Sum( outermold_input_molding.qty_pcs ), 0 ) - COALESCE ( Sum( linningmold_output_molding.qty_pcs ), 0 ) + COALESCE ( Sum( midmold_output_molding.qty_pcs ), 0 ) + COALESCE ( Sum( outermold_output_molding.qty_pcs ), 0 ) AS balance,
input_molding.id_input_molding
FROM
input_molding
LEFT JOIN output_molding ON input_molding.orc = output_molding.orc
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
input_molding.orc ;

-- ----------------------------
-- View structure for v_molding_single_orc
-- ----------------------------
DROP VIEW IF EXISTS `v_molding_single_orc`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_molding_single_orc` AS SELECT
DAYNAME(input_molding.tgl) AS day,
input_molding.tgl,
input_molding.orc,
input_molding.style,
input_molding.color,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) AS in_linning,
COALESCE(Sum(midmold_input_molding.qty_pcs),0) AS in_midmold,
COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS in_outer,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) + COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS total_input,
COALESCE(Sum(linningmold_output_molding.qty_pcs),0) AS out_linning,
COALESCE(Sum(midmold_output_molding.qty_pcs),0) AS out_midmold,
COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS out_outermold,
COALESCE(Sum(linningmold_output_molding.qty_pcs),0) + COALESCE(Sum(midmold_output_molding.qty_pcs),0) + COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS total_output, 
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) + COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(outermold_input_molding.qty_pcs),0) - COALESCE(Sum(linningmold_output_molding.qty_pcs),0) + COALESCE(Sum(midmold_output_molding.qty_pcs),0) + COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS total_molding
FROM
input_molding
LEFT JOIN output_molding ON input_molding.orc = output_molding.orc
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
input_molding.tgl ;

-- ----------------------------
-- View structure for v_molding_to_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_molding_to_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_molding_to_sewing` AS SELECT
output_molding.id_output_molding,
output_molding.tgl,
output_molding.orc,
output_molding.style,
output_molding.color,
Sum(linningmold_output_molding.qty_pcs) AS linning,
Sum(midmold_output_molding.qty_pcs) AS midmold,
Sum(outermold_output_molding.qty_pcs) AS outermold,
Sum(linningmold_output_molding.qty_pcs) + Sum(midmold_output_molding.qty_pcs) + Sum(outermold_output_molding.qty_pcs) AS total_output
FROM
output_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
output_molding.orc ;

-- ----------------------------
-- View structure for v_orc_cutting
-- ----------------------------
DROP VIEW IF EXISTS `v_orc_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_orc_cutting` AS SELECT
input_cutting.tgl,
cutting.orc,
cutting.style,
cutting.color,
cutting.qty AS qty_order,
Sum(input_cutting.qty_pcs) AS qty_cutting,
cutting.qty - Sum( input_cutting.qty_pcs ) AS balance
FROM
input_cutting
INNER JOIN cutting ON cutting.orc = input_cutting.orc
GROUP BY
cutting.orc
ORDER BY
input_cutting.orc ASC,
input_cutting.tgl ASC ;

-- ----------------------------
-- View structure for v_orc_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_orc_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_orc_molding` AS SELECT
input_molding.tgl,
input_molding.orc,
COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS `outer`,
COALESCE(Sum(midmold_input_molding.qty_pcs),0) AS mid,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) AS lin,
COALESCE(Sum(outermold_input_molding.qty_pcs),0) + COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(linningmold_input_molding.qty_pcs),0) AS total
FROM
input_molding
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
GROUP BY
input_molding.orc ;

-- ----------------------------
-- View structure for v_orc_packing
-- ----------------------------
DROP VIEW IF EXISTS `v_orc_packing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_orc_packing` AS SELECT
output_packing.tgl,
output_packing.orc,
output_packing.karton,
Sum(output_packing.pcs) AS qty_packing,
cutting.qty AS `order`,
cutting.qty - Sum(output_packing.pcs) AS balance
FROM
output_packing
INNER JOIN cutting ON output_packing.orc = cutting.orc
GROUP BY
output_packing.orc ;

-- ----------------------------
-- View structure for v_orc_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_orc_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_orc_sewing` AS SELECT
input_sewing.tgl,
input_sewing.orc,
cutting.qty AS qty_order,
Sum(input_sewing.qty_pcs) AS qty_sewing,
cutting.qty - Sum(input_sewing.qty_pcs) AS balance
FROM
input_sewing
INNER JOIN cutting ON cutting.orc = input_sewing.orc
GROUP BY
input_sewing.orc ;

-- ----------------------------
-- View structure for v_outmold
-- ----------------------------
DROP VIEW IF EXISTS `v_outmold`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_outmold` AS SELECT
output_molding.id_output_molding,
output_molding.shift,
output_molding.no_mesin,
output_molding.orc,
output_molding.style,
output_molding.color,
output_molding.tgl,
linningmold_output_molding.size AS sz_lin,
linningmold_output_molding.qty_pcs AS lin_qty,
linningmold_output_molding.kode_barcode AS lin_kode,
midmold_output_molding.size AS sz_mid,
midmold_output_molding.qty_pcs AS mid_qty,
midmold_output_molding.kode_barcode AS mid_kode,
outermold_output_molding.size AS sz_out,
outermold_output_molding.qty_pcs AS out_qty,
outermold_output_molding.kode_barcode AS out_kode
FROM
output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding ;

-- ----------------------------
-- View structure for v_output_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_output_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_output_molding` AS SELECT
output_molding.id_output_molding,
output_molding.tgl,
output_molding.style,
Sum(midmold_output_molding.qty_pcs) AS out_midmold,
Sum(outermold_output_molding.qty_pcs) AS out_outer,
Sum(linningmold_output_molding.qty_pcs) AS out_linning,
Sum(midmold_output_molding.qty_pcs) + Sum(outermold_output_molding.qty_pcs) + Sum(linningmold_output_molding.qty_pcs) AS total_qty
FROM
output_molding
INNER JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
output_molding.style ;

-- ----------------------------
-- View structure for v_single_bundle_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_single_bundle_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_single_bundle_sewing` AS SELECT
input_sewing.no_bundle,
input_cutting.qty_pcs AS qty_cutting,
input_sewing.qty_pcs AS qty_sewing,
input_cutting.qty_pcs - input_sewing.qty_pcs as balance1,
v_single_orc_sewing.qty_cutting AS total_cutting,
v_single_orc_sewing.`order`,
v_single_orc_sewing.orc,
v_single_orc_sewing.color,
v_single_orc_sewing.style,
v_single_orc_sewing.balance
FROM
input_cutting
INNER JOIN input_sewing ON input_sewing.no_bundle = input_cutting.no_bundle AND input_sewing.kode_barcode = input_cutting.kode_barcode
INNER JOIN v_single_orc_sewing ON input_cutting.orc = v_single_orc_sewing.orc AND input_sewing.orc = v_single_orc_sewing.orc ;

-- ----------------------------
-- View structure for v_single_coba
-- ----------------------------
DROP VIEW IF EXISTS `v_single_coba`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_single_coba` AS SELECT
input_molding.orc,
output_molding.tgl,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) AS in_linning,
COALESCE(Sum(midmold_input_molding.qty_pcs),0) AS in_midmold,
COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS in_outer,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) + COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS total_input,
COALESCE(Sum(linningmold_output_molding.qty_pcs),0) AS out_linning,
COALESCE(Sum(midmold_output_molding.qty_pcs),0) AS out_midmold,
COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS out_outermold,
COALESCE(Sum(linningmold_output_molding.qty_pcs),0) + COALESCE(Sum(midmold_output_molding.qty_pcs),0) + COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS total_output,
input_molding.size
FROM
input_molding
LEFT JOIN output_molding ON input_molding.orc = output_molding.orc
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding AND linningmold_input_molding.size = input_molding.size
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding AND midmold_input_molding.size = input_molding.size
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_outer_input_molding = input_molding.id_input_molding AND outermold_input_molding.size = input_molding.size
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
midmold_input_molding.size,
linningmold_input_molding.size,
outermold_input_molding.size ;

-- ----------------------------
-- View structure for v_single_orc2
-- ----------------------------
DROP VIEW IF EXISTS `v_single_orc2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_single_orc2` AS SELECT
linningmold_input_molding.size AS szl,
midmold_input_molding.size AS szm,
outermold_input_molding.size AS szo,
input_molding.orc,
output_molding.tgl,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) AS in_linning,
COALESCE(Sum(midmold_input_molding.qty_pcs),0) AS in_midmold,
COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS in_outer,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) + COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS total_input,
COALESCE(Sum(linningmold_output_molding.qty_pcs),0) AS out_linning,
COALESCE(Sum(midmold_output_molding.qty_pcs),0) AS out_midmold,
COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS out_outermold,
COALESCE(Sum(linningmold_output_molding.qty_pcs),0) + COALESCE(Sum(midmold_output_molding.qty_pcs),0) + COALESCE(Sum(outermold_output_molding.qty_pcs),0) AS total_output
FROM
input_molding
LEFT JOIN output_molding ON input_molding.orc = output_molding.orc
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_outer_input_molding = input_molding.id_input_molding
LEFT JOIN linningmold_output_molding ON linningmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN midmold_output_molding ON midmold_output_molding.id_output_molding = output_molding.id_output_molding
LEFT JOIN outermold_output_molding ON outermold_output_molding.id_output_molding = output_molding.id_output_molding
GROUP BY
midmold_input_molding.size,
linningmold_input_molding.size,
outermold_input_molding.size ;

-- ----------------------------
-- View structure for v_single_orc_cutting
-- ----------------------------
DROP VIEW IF EXISTS `v_single_orc_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_single_orc_cutting` AS SELECT
`order`.orc,
`order`.qty AS qty_order,
input_cutting.style,
input_cutting.color,
DAYNAME(input_cutting.tgl) AS `day`,
input_cutting.tgl AS cut_date,
Sum(input_cutting.qty_pcs) AS cut_qty,
`order`.etd
FROM
input_cutting
INNER JOIN `order` ON input_cutting.orc = `order`.orc
GROUP BY
input_cutting.orc,
input_cutting.tgl ;

-- ----------------------------
-- View structure for v_single_orc_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_single_orc_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_single_orc_sewing` AS SELECT
DAYNAME(v_orc_sewing.tgl) AS `day`,
v_orc_sewing.tgl,
v_orc_cutting.style,
v_orc_cutting.color,
v_orc_sewing.orc,
v_orc_cutting.qty_order AS `order`,
v_orc_cutting.qty_cutting,
v_orc_cutting.balance,
v_orc_sewing.qty_sewing
FROM
v_orc_sewing
INNER JOIN v_orc_cutting ON v_orc_cutting.orc = v_orc_sewing.orc
GROUP BY
v_orc_sewing.tgl,
v_orc_sewing.orc ;

-- ----------------------------
-- View structure for v_single_packing
-- ----------------------------
DROP VIEW IF EXISTS `v_single_packing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_single_packing` AS SELECT
output_packing.tgl,
`order`.orc,
`order`.color,
`order`.qty AS `order`,
`order`.style,
Sum(output_packing.pcs) AS qty,
`order`.etd 
FROM
output_packing
INNER JOIN `order` ON output_packing.orc = `order`.orc
GROUP BY
output_packing.tgl,
`order`.orc ;

-- ----------------------------
-- View structure for v_size
-- ----------------------------
DROP VIEW IF EXISTS `v_size`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_size` AS SELECT
cutting_detail.size,
cutting.orc
FROM
cutting
INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
GROUP BY
cutting_detail.size ;

-- ----------------------------
-- View structure for v_style_cutting
-- ----------------------------
DROP VIEW IF EXISTS `v_style_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_style_cutting` AS SELECT
input_cutting.tgl AS tgl,
input_cutting.style,
Sum(input_cutting.qty_pcs) AS qty,
input_cutting.id_input_cutting AS id
FROM
input_cutting
GROUP BY
input_cutting.style
ORDER BY
id ASC,
input_cutting.style ASC ;

-- ----------------------------
-- View structure for v_style_molding
-- ----------------------------
DROP VIEW IF EXISTS `v_style_molding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_style_molding` AS SELECT
input_molding.tgl,
input_molding.style,
input_molding.orc,
COALESCE(Sum(midmold_input_molding.qty_pcs),0) AS mid,
COALESCE(Sum(linningmold_input_molding.qty_pcs),0) AS lin,
COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS `outer`,
COALESCE(Sum(midmold_input_molding.qty_pcs),0) + COALESCE(Sum(linningmold_input_molding.qty_pcs),0) + COALESCE(Sum(outermold_input_molding.qty_pcs),0) AS total_qty
FROM
input_molding
LEFT JOIN linningmold_input_molding ON linningmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN midmold_input_molding ON midmold_input_molding.id_input_molding = input_molding.id_input_molding
LEFT JOIN outermold_input_molding ON outermold_input_molding.id_input_molding = input_molding.id_input_molding
GROUP BY
input_molding.style ;

-- ----------------------------
-- View structure for v_style_packing
-- ----------------------------
DROP VIEW IF EXISTS `v_style_packing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_style_packing` AS SELECT
output_packing.tgl,
cutting.style,
output_packing.orc,
Sum(output_packing.pcs) AS qty_packing
FROM
output_packing
INNER JOIN cutting ON output_packing.orc = cutting.orc
GROUP BY
cutting.style,
output_packing.tgl,
output_packing.orc,
cutting.qty ;

-- ----------------------------
-- View structure for v_style_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_style_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_style_sewing` AS SELECT
input_sewing.tgl,
input_sewing.style,
Sum(input_sewing.qty_pcs) AS qty
FROM
input_sewing
GROUP BY
input_sewing.style,
input_sewing.tgl ;

-- ----------------------------
-- View structure for v_wip_cutting
-- ----------------------------
DROP VIEW IF EXISTS `v_wip_cutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_wip_cutting` AS SELECT
Sum(input_cutting.qty_pcs) AS cut_out,
Sum(input_sewing.qty_pcs) AS sew_out,
input_cutting.style,
input_cutting.orc
FROM
input_cutting
INNER JOIN input_sewing ON input_cutting.kode_barcode = input_sewing.kode_barcode ;

-- ----------------------------
-- View structure for v_wip_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_wip_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_wip_sewing` AS SELECT
input_sewing.orc,
input_sewing.style,
input_sewing.color,
output_sewing_detail.qty AS sewing,
Sum(input_sewing.qty_pcs) AS input_sewing,
output_sewing_detail.qty  - Sum(input_sewing.qty_pcs) AS balance
FROM
output_sewing
INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing
INNER JOIN input_sewing ON output_sewing_detail.orc = input_sewing.orc
GROUP BY
input_sewing.orc ;

-- ----------------------------
-- View structure for x
-- ----------------------------
DROP VIEW IF EXISTS `x`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `x` AS SELECT
input_cutting.tgl,
input_cutting.kode_barcode,
input_cutting.orc,
input_cutting.qty_pcs
FROM
input_cutting ;

SET FOREIGN_KEY_CHECKS = 1;
