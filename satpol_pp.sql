/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : satpol_pp

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 29/11/2024 10:32:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lokasi
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
BEGIN;
INSERT INTO `lokasi` (`id`, `nama`, `kelurahan`, `kecamatan`, `created_at`, `updated_at`) VALUES (1, 'cafe mendung', 'basirih', 'banjarmasin selatan', '2024-11-28 15:32:38', '2024-11-28 15:32:38');
COMMIT;

-- ----------------------------
-- Table structure for pelapor
-- ----------------------------
DROP TABLE IF EXISTS `pelapor`;
CREATE TABLE `pelapor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelapor
-- ----------------------------
BEGIN;
INSERT INTO `pelapor` (`id`, `nama`, `agama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (1, 'andi law', 'ISLAM', 'jl pramuka', '0987656789', '2024-11-28 15:25:27', '2024-11-28 15:27:01');
COMMIT;

-- ----------------------------
-- Table structure for pengaduan
-- ----------------------------
DROP TABLE IF EXISTS `pengaduan`;
CREATE TABLE `pengaduan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pelapor_id` int(11) unsigned DEFAULT NULL,
  `lokasi_id` int(11) unsigned DEFAULT NULL,
  `petugas_id` int(11) unsigned DEFAULT NULL,
  `isi` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pengaduan
-- ----------------------------
BEGIN;
INSERT INTO `pengaduan` (`id`, `pelapor_id`, `lokasi_id`, `petugas_id`, `isi`, `keterangan`, `created_at`, `updated_at`, `nomor`, `jenis`) VALUES (3, 1, 1, 2, 'hgf', 'fgh', '2024-11-28 15:57:58', '2024-11-28 19:14:58', 'P00231', '-');
COMMIT;

-- ----------------------------
-- Table structure for perda
-- ----------------------------
DROP TABLE IF EXISTS `perda`;
CREATE TABLE `perda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` text,
  `tahun` varchar(255) DEFAULT NULL,
  `sanksi` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perda
-- ----------------------------
BEGIN;
INSERT INTO `perda` (`id`, `nama`, `tahun`, `sanksi`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'jhjgj', '2004', '4 tahun', 'dfg', '2024-11-28 15:18:13', '2024-11-28 15:18:13');
COMMIT;

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of petugas
-- ----------------------------
BEGIN;
INSERT INTO `petugas` (`id`, `nip`, `nama`, `satuan`, `jabatan`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (2, '2345654', 'adi', 'gj', 'gj', 'gkj', 'gk', '2024-11-28 14:50:36', '2024-11-28 15:11:26');
INSERT INTO `petugas` (`id`, `nip`, `nama`, `satuan`, `jabatan`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES (3, 'kl', 'hkh', 'lkh', 'lk', 'jlk', 'jlk', '2024-11-28 14:52:03', '2024-11-28 14:52:03');
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1165, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'user', '2023-05-15 16:36:37', '2023-05-15 16:36:37');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (3, 'petugas', '2024-11-10 17:28:18', '2024-11-10 17:28:18');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (4, 'saksi', '2024-11-20 22:51:33', '2024-11-20 22:51:33');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (5, 'kelurahan', '2024-11-21 03:07:06', '2024-11-21 03:07:06');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (6, 'kecamatan', '2024-11-21 03:07:11', '2024-11-21 03:07:11');
COMMIT;

-- ----------------------------
-- Table structure for tindakan
-- ----------------------------
DROP TABLE IF EXISTS `tindakan`;
CREATE TABLE `tindakan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `pengaduan_id` int(11) DEFAULT NULL,
  `perda_id` int(11) DEFAULT NULL,
  `hukuman` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tindakan
-- ----------------------------
BEGIN;
INSERT INTO `tindakan` (`id`, `nomor`, `pengaduan_id`, `perda_id`, `hukuman`, `keterangan`, `created_at`, `updated_at`) VALUES (1, NULL, 3, 2, 'ds', 'dfs', '2024-11-28 16:18:58', '2024-11-28 16:18:58');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  `pendaftar_id` char(36) DEFAULT NULL,
  `pengumpul_id` int(11) DEFAULT NULL,
  `suara_id` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `nama_kec` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1167 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`, `pendaftar_id`, `pengumpul_id`, `suara_id`, `kelurahan_id`, `kecamatan_id`, `nama_kec`) VALUES (1, 'admin', NULL, 'admin', '2024-11-28 20:02:39', '$2y$10$E9xG1OtIFvBRbHqlwHCC3u48vO5eBf2OQ9wFNpi.qKOAzVqNDUdW2', NULL, 'mhvHm5RkQXzPINo3gNn1xW7snkIQ8oqIeOyeoyCgvBmFkC8vjQut0K3B8abp', '2024-11-28 20:02:39', '2024-11-28 20:02:39', '$2y$10$tjMANlV25IUwvKuPxEODW.3qE3zPSKjwhmgTcZUgsPDZRGcpgGAN.', NULL, 0, NULL, 5, NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`, `pendaftar_id`, `pengumpul_id`, `suara_id`, `kelurahan_id`, `kecamatan_id`, `nama_kec`) VALUES (1165, 'adi', NULL, 'adi', '2024-11-28 14:35:27', '$2y$10$B49oNaeKw32LxhKgD1EhHOvfg8/adjmZs1cAVxrNZt1pvqw53i39e', NULL, NULL, '2024-11-28 14:35:27', '2024-11-28 14:35:27', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
