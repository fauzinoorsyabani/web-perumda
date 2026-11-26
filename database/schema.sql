-- ============================================================================
-- Database Schema: Portal Perumda Air Minum Tirta Sukapura
-- Engine: MySQL 8.0+ / MariaDB 10.6+ (InnoDB, utf8mb4_unicode_ci)
-- ============================================================================

CREATE DATABASE IF NOT EXISTS `perumda_tirtasukapura`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `perumda_tirtasukapura`;

-- 1. Pengguna / Admin Redaksi
CREATE TABLE IF NOT EXISTS `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `email` VARCHAR(160) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` ENUM('superadmin', 'editor', 'cs') NOT NULL DEFAULT 'editor',
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Kategori Berita & Panduan
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `slug` VARCHAR(90) NOT NULL,
  `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_news_categories_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Berita, Info Gangguan, & Panduan Pelanggan
CREATE TABLE IF NOT EXISTS `news` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` SMALLINT UNSIGNED NOT NULL,
  `author_id` BIGINT UNSIGNED NOT NULL,
  `slug` VARCHAR(180) NOT NULL,
  `title` VARCHAR(220) NOT NULL,
  `excerpt` TEXT NOT NULL,
  `key_points_json` JSON NULL,
  `sections_json` JSON NOT NULL,
  `image_url` VARCHAR(255) NOT NULL,
  `fallback_image` VARCHAR(255) NOT NULL DEFAULT 'assets/images/hero-water.jpg',
  `source_url` VARCHAR(255) NULL,
  `read_time` VARCHAR(30) NOT NULL DEFAULT '2 menit baca',
  `status` ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'published',
  `published_at` DATE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_news_slug` (`slug`),
  KEY `idx_news_status_published` (`status`, `published_at`),
  KEY `idx_news_category` (`category_id`),
  CONSTRAINT `fk_news_category`
    FOREIGN KEY (`category_id`) REFERENCES `news_categories` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT `fk_news_author`
    FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Cabang & Unit Pelayanan (17 Lokasi Resmi)
CREATE TABLE IF NOT EXISTS `branches` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `area` ENUM('Kota Tasikmalaya', 'Kab. Tasikmalaya') NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(40) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_branches_area` (`area`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Sumber Air Baku & Kapasitas Produksi (Total 513 L/dtk)
CREATE TABLE IF NOT EXISTS `water_sources` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(140) NOT NULL,
  `source_type` ENUM('Mata Air', 'Air Permukaan') NOT NULL,
  `built_year` SMALLINT UNSIGNED NOT NULL,
  `capacity_lps` SMALLINT UNSIGNED NOT NULL,
  `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_water_sources_type` (`source_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Statistik Cakupan Pelayanan Tahunan
CREATE TABLE IF NOT EXISTS `coverage_stats` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `stat_year` SMALLINT UNSIGNED NOT NULL,
  `kab_pct` DECIMAL(5,2) NOT NULL,
  `kota_pct` DECIMAL(5,2) NOT NULL,
  `total_pct` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_coverage_year` (`stat_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Pesan & Pertanyaan Pelanggan dari Halaman Kontak
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` SMALLINT UNSIGNED NULL,
  `customer_name` VARCHAR(120) NOT NULL,
  `customer_no` VARCHAR(40) NULL,
  `topic` VARCHAR(100) NOT NULL,
  `area` VARCHAR(120) NOT NULL,
  `message` TEXT NOT NULL,
  `status` ENUM('baru', 'diproses', 'selesai') NOT NULL DEFAULT 'baru',
  `ip_address` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_contact_status_created` (`status`, `created_at`),
  CONSTRAINT `fk_contact_branch`
    FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`)
    ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
