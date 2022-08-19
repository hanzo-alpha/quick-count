/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MariaDB
 Source Server Version : 100504
 Source Host           : localhost:3306
 Source Schema         : quick_count

 Target Server Type    : MariaDB
 Target Server Version : 100504
 File Encoding         : 65001

 Date: 07/12/2020 11:23:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for qc_calon
-- ----------------------------
DROP TABLE IF EXISTS `qc_calon`;
CREATE TABLE `qc_calon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_calon` int(11) NOT NULL DEFAULT 1,
  `nama_calon_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `nama_calon_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT current_timestamp,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_calon
-- ----------------------------
INSERT INTO `qc_calon` VALUES (1, 3, 'H. A. KASWADI RAZAK', 'IR. LUTFI HALIDE', '2020-10-05 00:16:44', '2020-10-05 00:16:44', 1);
INSERT INTO `qc_calon` VALUES (2, 4, 'KOLOM', 'KOSONG', '2020-10-10 20:38:53', '2020-11-15 23:47:12', 1);

-- ----------------------------
-- Table structure for qc_config
-- ----------------------------
DROP TABLE IF EXISTS `qc_config`;
CREATE TABLE `qc_config`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cfg_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cfg_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `config_cfg_key_index`(`cfg_key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_config
-- ----------------------------

-- ----------------------------
-- Table structure for qc_dpt
-- ----------------------------
DROP TABLE IF EXISTS `qc_dpt`;
CREATE TABLE `qc_dpt`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `tps_id` int(11) NOT NULL,
  `no_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kawin` tinyint(4) NOT NULL,
  `jenis_kel` tinyint(4) NOT NULL,
  `disabilitas` tinyint(4) NOT NULL,
  `status_rekam_ktp` tinyint(4) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_dpt
-- ----------------------------

-- ----------------------------
-- Table structure for qc_failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `qc_failed_jobs`;
CREATE TABLE `qc_failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for qc_hitung_suara
-- ----------------------------
DROP TABLE IF EXISTS `qc_hitung_suara`;
CREATE TABLE `qc_hitung_suara`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `desa` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `calon1_id` int(11) NOT NULL,
  `calon2_id` int(11) NOT NULL DEFAULT 0,
  `nama_calon1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_calon2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `suara1` int(11) NOT NULL DEFAULT 0,
  `suara2` int(11) NOT NULL DEFAULT 0,
  `suara_tidak_sah` int(11) NOT NULL DEFAULT 0,
  `no_tps` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_SUARA_CALON`(`id`, `calon1_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_hitung_suara
-- ----------------------------
INSERT INTO `qc_hitung_suara` VALUES (1, '7312010', '7312010001', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 5000, 1000, 9, 1, '2020-11-22 19:06:16', '2020-11-25 14:31:45');
INSERT INTO `qc_hitung_suara` VALUES (2, '7312010', '7312010001', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 2000, 1000, 0, 2, '2020-11-22 20:00:24', '2020-11-25 14:31:46');
INSERT INTO `qc_hitung_suara` VALUES (3, '7312010', '7312010001', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 4000, 2000, 50, 3, '2020-11-25 14:13:34', '2020-11-25 14:31:50');
INSERT INTO `qc_hitung_suara` VALUES (4, '7312020', '7312020001', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 200, 100, 0, 1, '2020-12-03 19:51:29', '2020-12-03 19:51:29');
INSERT INTO `qc_hitung_suara` VALUES (5, '7312030', '7312030002', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 500, 300, 0, 4, '2020-12-03 22:34:40', '2020-12-03 22:34:40');
INSERT INTO `qc_hitung_suara` VALUES (6, '7312020', '7312020004', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 1000, 200, 10, 5, '2020-12-04 19:03:54', '2020-12-04 19:03:54');
INSERT INTO `qc_hitung_suara` VALUES (7, '7312032', '7312032002', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 3000, 1500, 50, 1, '2020-12-04 20:50:07', '2020-12-04 20:50:07');
INSERT INTO `qc_hitung_suara` VALUES (8, '7312040', '7312040001', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 4000, 1000, 0, 1, '2020-12-04 20:50:24', '2020-12-04 20:50:24');
INSERT INTO `qc_hitung_suara` VALUES (9, '7312060', '7312060001', 1, 2, '1. H. A. KASWADI RAZAK - IR. LUTFI HALIDE', '2. KOLOM - KOSONG', 5000, 1500, 50, 1, '2020-12-04 20:51:59', '2020-12-04 20:51:59');

-- ----------------------------
-- Table structure for qc_migrations
-- ----------------------------
DROP TABLE IF EXISTS `qc_migrations`;
CREATE TABLE `qc_migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_migrations
-- ----------------------------
INSERT INTO `qc_migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `qc_migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `qc_migrations` VALUES (3, '2016_06_01_000001_create_oauth_auth_codes_table', 1);
INSERT INTO `qc_migrations` VALUES (4, '2016_06_01_000002_create_oauth_access_tokens_table', 1);
INSERT INTO `qc_migrations` VALUES (5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1);
INSERT INTO `qc_migrations` VALUES (6, '2016_06_01_000004_create_oauth_clients_table', 1);
INSERT INTO `qc_migrations` VALUES (7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);
INSERT INTO `qc_migrations` VALUES (8, '2017_08_24_000000_create_settings_table', 1);
INSERT INTO `qc_migrations` VALUES (9, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `qc_migrations` VALUES (10, '2020_02_12_065902_create_permission_tables', 1);
INSERT INTO `qc_migrations` VALUES (11, '2020_07_04_004503_create_websockets_statistics_entries_table', 1);
INSERT INTO `qc_migrations` VALUES (16, '2020_10_20_182005_create_relawan_table', 3);
INSERT INTO `qc_migrations` VALUES (17, '2020_10_20_182552_create_dpt_table', 4);

-- ----------------------------
-- Table structure for qc_model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `qc_model_has_permissions`;
CREATE TABLE `qc_model_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `qc_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for qc_model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `qc_model_has_roles`;
CREATE TABLE `qc_model_has_roles`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `qc_roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_model_has_roles
-- ----------------------------

-- ----------------------------
-- Table structure for qc_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `qc_password_resets`;
CREATE TABLE `qc_password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for qc_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `qc_pengguna`;
CREATE TABLE `qc_pengguna`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(6) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_pengguna
-- ----------------------------

-- ----------------------------
-- Table structure for qc_permissions
-- ----------------------------
DROP TABLE IF EXISTS `qc_permissions`;
CREATE TABLE `qc_permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for qc_profil_calon
-- ----------------------------
DROP TABLE IF EXISTS `qc_profil_calon`;
CREATE TABLE `qc_profil_calon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_saat_ini` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mencalonkan_sebagai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL DEFAULT 0,
  `tgl_lahir` date NULL DEFAULT CURRENT_DATE,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_profil_calon
-- ----------------------------

-- ----------------------------
-- Table structure for qc_ref_jenis_calon
-- ----------------------------
DROP TABLE IF EXISTS `qc_ref_jenis_calon`;
CREATE TABLE `qc_ref_jenis_calon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_calon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_ref_jenis_calon
-- ----------------------------
INSERT INTO `qc_ref_jenis_calon` VALUES (1, 'Gubernur / Wakil Gubernur');
INSERT INTO `qc_ref_jenis_calon` VALUES (2, 'Walikota / Wakil Walikota');
INSERT INTO `qc_ref_jenis_calon` VALUES (3, 'Bupati / Wakil Bupati');
INSERT INTO `qc_ref_jenis_calon` VALUES (4, 'Kotak Kosong');

-- ----------------------------
-- Table structure for qc_ref_tps
-- ----------------------------
DROP TABLE IF EXISTS `qc_ref_tps`;
CREATE TABLE `qc_ref_tps`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tps` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_ref_tps
-- ----------------------------

-- ----------------------------
-- Table structure for qc_relawan
-- ----------------------------
DROP TABLE IF EXISTS `qc_relawan`;
CREATE TABLE `qc_relawan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kel` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `no_tps` int(11) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_relawan
-- ----------------------------

-- ----------------------------
-- Table structure for qc_role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `qc_role_has_permissions`;
CREATE TABLE `qc_role_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `qc_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `qc_roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for qc_roles
-- ----------------------------
DROP TABLE IF EXISTS `qc_roles`;
CREATE TABLE `qc_roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_roles
-- ----------------------------

-- ----------------------------
-- Table structure for qc_suara_calon
-- ----------------------------
DROP TABLE IF EXISTS `qc_suara_calon`;
CREATE TABLE `qc_suara_calon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tps_id` int(11) NOT NULL,
  `calon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `jumlah_suara` bigint(30) NOT NULL DEFAULT 0,
  `no_tps` int(11) NULL DEFAULT NULL,
  `total_suara` bigint(30) NOT NULL DEFAULT 0,
  `persentase_suara` float(10, 2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_SUARA_CALON`(`id`, `tps_id`, `calon_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_suara_calon
-- ----------------------------
INSERT INTO `qc_suara_calon` VALUES (1, 2, 2, 0, 700, NULL, 0, 0.00, '2020-10-10 20:48:28', '2020-10-11 19:57:19');
INSERT INTO `qc_suara_calon` VALUES (2, 1, 1, 0, 500, NULL, 0, 0.00, '2020-10-10 21:34:58', '2020-10-11 19:57:19');
INSERT INTO `qc_suara_calon` VALUES (3, 2, 2, 0, 300, NULL, 0, 0.00, '2020-10-10 21:35:11', '2020-10-11 19:57:19');
INSERT INTO `qc_suara_calon` VALUES (4, 8, 2, 0, 200, NULL, 0, 0.00, '2020-10-10 21:35:34', '2020-10-11 19:57:19');
INSERT INTO `qc_suara_calon` VALUES (5, 5, 1, 0, 250, NULL, 0, 0.00, '2020-10-11 19:55:38', '2020-10-14 03:26:46');

-- ----------------------------
-- Table structure for qc_tps
-- ----------------------------
DROP TABLE IF EXISTS `qc_tps`;
CREATE TABLE `qc_tps`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prov_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kel_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_tps` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_tps` int(11) NOT NULL DEFAULT 0,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp,
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_tps
-- ----------------------------
INSERT INTO `qc_tps` VALUES (1, '73', '7312', '7312020', '7312020002', 2, 'TPS 1', 0, NULL, 1, '2020-10-02 21:02:35', '2020-10-02 21:02:35');
INSERT INTO `qc_tps` VALUES (2, '73', '7312', '7312020', '7312020002', 3, 'TPS 2', 0, NULL, 1, '2020-10-02 22:46:00', '2020-10-02 22:46:00');
INSERT INTO `qc_tps` VALUES (3, '73', '7312', '7312020', '7312020006', 4, 'TPS 1', 0, NULL, 1, '2020-10-02 22:52:37', '2020-10-02 22:52:37');
INSERT INTO `qc_tps` VALUES (4, '73', '7312', '7312030', '7312030001', 5, 'TPS 1', 0, NULL, 1, '2020-10-02 23:08:52', '2020-10-02 23:08:52');
INSERT INTO `qc_tps` VALUES (5, '73', '7312', '7312031', '7312031002', 6, 'TPS 1', 0, NULL, 1, '2020-10-02 23:11:57', '2020-10-02 23:11:57');
INSERT INTO `qc_tps` VALUES (6, '73', '7312', '7312032', '7312032002', 7, 'TPS 1', 0, NULL, 1, '2020-10-02 23:14:35', '2020-10-02 23:14:35');
INSERT INTO `qc_tps` VALUES (7, '73', '7312', '7312060', '7312060003', 8, 'TPS 1', 0, NULL, 1, '2020-10-02 23:17:20', '2020-10-02 23:17:20');
INSERT INTO `qc_tps` VALUES (8, '73', '7312', '7312040', '7312040002', 9, 'TPS 1', 0, NULL, 1, '2020-10-04 03:05:58', '2020-10-04 03:05:58');
INSERT INTO `qc_tps` VALUES (9, '73', '7312', '7312031', '7312031002', 0, 'TPS 2', 4, NULL, 1, '2020-10-29 23:55:30', '2020-10-29 23:56:09');

-- ----------------------------
-- Table structure for qc_users
-- ----------------------------
DROP TABLE IF EXISTS `qc_users`;
CREATE TABLE `qc_users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(6) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_superadmin` tinyint(1) NULL DEFAULT 0,
  `last_login` datetime(6) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `abs_users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qc_users
-- ----------------------------
INSERT INTO `qc_users` VALUES (1, 'Hansen', 'hansen', 'admin@admin.com', NULL, '$2y$10$qeay4qXtGUJy0QnGCyBFgei8AZ448IXM28HP5ZHt1EaX07dQJ25GK', NULL, 1, '2020-12-07 00:17:50.000000', 1, '2020-07-08 01:37:13.000000', '2020-12-07 00:17:50.000000');
INSERT INTO `qc_users` VALUES (2, 'Lalabata Rilau', 'lalabata rilau', 'lalabata_tps1@admin.com', NULL, '$2y$10$8jf.izBKGezlqRu0PdcbWeAfnl9VR90QiECf0BBMICY2EWSG/zxaW', NULL, 0, '2020-10-04 23:37:56.000000', 1, '2020-10-02 21:02:35.000000', '2020-10-19 02:05:25.588768');
INSERT INTO `qc_users` VALUES (3, 'Lalabata Rilau', 'lalabata rilau', 'lalabata_tps2@admin.com', NULL, '$2y$10$5RVEV0zz1oCGuAEPiQHjfuTVRByYzmcVJ2EWehLBwPE5ZmqqiJwV2', NULL, 0, NULL, 1, '2020-10-02 22:46:00.000000', '2020-10-19 02:05:30.509843');
INSERT INTO `qc_users` VALUES (4, 'Mattabulu', 'mattabulu', 'mattabulu_tps1@admin.com', NULL, '$2y$10$f8YcUeaRAPZ2Gz4TnKe3RO/r/RaRJe3xEqtiHaHzk5QyAssSPhs2.', NULL, 0, NULL, 1, '2020-10-02 22:52:37.000000', '2020-10-19 02:05:33.499283');
INSERT INTO `qc_users` VALUES (5, 'Timusu', 'timusu', 'liliriaja_tps1@admin.com', NULL, '$2y$10$a2nhFqipM31OFKt3t9nXR.sVqNPZ2cblvb0EejplB9HiBqBLhkzee', NULL, 0, NULL, 1, '2020-10-02 23:08:52.000000', '2020-10-19 02:05:36.244617');
INSERT INTO `qc_users` VALUES (6, 'Ganra', 'ganra', 'ganra_tps1@admin.com', NULL, '$2y$10$HtrhRj/6ruwIPsCBqO0BGum/LEoMbvO1azoByEvGjUW5FHLkzs51K', NULL, 0, NULL, 1, '2020-10-02 23:11:57.000000', '2020-10-19 02:05:37.913332');
INSERT INTO `qc_users` VALUES (7, 'Citta', 'citta', 'citta_tps1@admin.com', NULL, '$2y$10$4dNl1bhMRKkpQCGgIEUHIuRhkNcJZpKMaZuIcimsW1Uj4diBZKdza', NULL, 0, NULL, 1, '2020-10-02 23:14:35.000000', '2020-10-19 02:05:40.444848');
INSERT INTO `qc_users` VALUES (8, 'Tellulimpoe', 'tellulimpoe', 'tellulimpoe_tps1@admin.com', NULL, '$2y$10$UG5OooTCrqVf20RvjIEpH.kcTzPQraLh9jWFl9by3roMY9yqkZ6My', NULL, 0, NULL, 1, '2020-10-02 23:17:20.000000', '2020-10-19 02:05:44.176727');
INSERT INTO `qc_users` VALUES (9, 'Cabenge', 'cabenge', 'cabenge_tps1@admin.com', NULL, '$2y$10$2qeN8o8crTaEPk6W3IA6CuMcoe6O2nvnTI5QzvtDw.BfWwv8e7KRq', NULL, 0, NULL, 0, '2020-10-04 03:05:58.000000', '2020-10-19 02:05:47.441992');

SET FOREIGN_KEY_CHECKS = 1;
