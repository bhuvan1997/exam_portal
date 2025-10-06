-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2025 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-captcha_011c12e1ac17157dfb5a7296b7db32d3', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"u\";i:2;s:1:\"z\";i:3;s:1:\"p\";i:4;s:1:\"d\";i:5;s:1:\"2\";i:6;s:1:\"z\";i:7;s:1:\"b\";i:8;s:1:\"c\";}', 1754487489),
('laravel-cache-captcha_01657370b18acde22f16be0367901406', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"f\";i:2;s:1:\"z\";i:3;s:1:\"h\";i:4;s:1:\"4\";i:5;s:1:\"6\";i:6;s:1:\"y\";i:7;s:1:\"a\";i:8;s:1:\"d\";}', 1753632166),
('laravel-cache-captcha_08513690523dae1598eb267f84a2eccc', 'a:9:{i:0;s:1:\"3\";i:1;s:1:\"c\";i:2;s:1:\"q\";i:3;s:1:\"u\";i:4;s:1:\"c\";i:5;s:1:\"m\";i:6;s:1:\"y\";i:7;s:1:\"b\";i:8;s:1:\"n\";}', 1753431417),
('laravel-cache-captcha_0a1647c070802304ecf7026a1c3f4f30', 'a:9:{i:0;s:1:\"c\";i:1;s:1:\"3\";i:2;s:1:\"p\";i:3;s:1:\"2\";i:4;s:1:\"n\";i:5;s:1:\"h\";i:6;s:1:\"9\";i:7;s:1:\"r\";i:8;s:1:\"d\";}', 1753439137),
('laravel-cache-captcha_0c2f302c422f328dd56db4bb6b2bf255', 'a:9:{i:0;s:1:\"y\";i:1;s:1:\"n\";i:2;s:1:\"d\";i:3;s:1:\"y\";i:4;s:1:\"e\";i:5;s:1:\"y\";i:6;s:1:\"t\";i:7;s:1:\"e\";i:8;s:1:\"8\";}', 1753430852),
('laravel-cache-captcha_0fd54d04789099e6e3351cbe3eab70e3', 'a:9:{i:0;s:1:\"q\";i:1;s:1:\"b\";i:2;s:1:\"b\";i:3;s:1:\"f\";i:4;s:1:\"g\";i:5;s:1:\"8\";i:6;s:1:\"z\";i:7;s:1:\"7\";i:8;s:1:\"c\";}', 1753435466),
('laravel-cache-captcha_10af2eac1b6bf3fac855da870be14ccd', 'a:9:{i:0;s:1:\"e\";i:1;s:1:\"t\";i:2;s:1:\"q\";i:3;s:1:\"x\";i:4;s:1:\"r\";i:5;s:1:\"h\";i:6;s:1:\"8\";i:7;s:1:\"g\";i:8;s:1:\"f\";}', 1753439855),
('laravel-cache-captcha_112877457fc312697ae9e77f66e9d54c', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"z\";i:2;s:1:\"t\";i:3;s:1:\"x\";i:4;s:1:\"b\";i:5;s:1:\"d\";i:6;s:1:\"c\";i:7;s:1:\"b\";i:8;s:1:\"g\";}', 1753439156),
('laravel-cache-captcha_1596d49e09fcec391fdb2172cba6f013', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"x\";i:2;s:1:\"g\";i:3;s:1:\"u\";i:4;s:1:\"n\";i:5;s:1:\"d\";i:6;s:1:\"8\";i:7;s:1:\"9\";i:8;s:1:\"d\";}', 1753439815),
('laravel-cache-captcha_1742421b6063908abaa5f2812dd20799', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"c\";i:2;s:1:\"r\";i:3;s:1:\"c\";i:4;s:1:\"e\";i:5;s:1:\"2\";i:6;s:1:\"x\";i:7;s:1:\"p\";i:8;s:1:\"e\";}', 1753448157),
('laravel-cache-captcha_18516bf3f57eab24eee0961bd796eb66', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"u\";i:2;s:1:\"b\";i:3;s:1:\"8\";i:4;s:1:\"r\";i:5;s:1:\"g\";i:6;s:1:\"c\";i:7;s:1:\"e\";i:8;s:1:\"d\";}', 1753632056),
('laravel-cache-captcha_18fde93e82e39e686bb5cde833c179a9', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"h\";i:2;s:1:\"7\";i:3;s:1:\"n\";i:4;s:1:\"c\";i:5;s:1:\"a\";i:6;s:1:\"q\";i:7;s:1:\"c\";i:8;s:1:\"z\";}', 1753439835),
('laravel-cache-captcha_1b9eea2f01d20fcfb9cfd767a8543239', 'a:9:{i:0;s:1:\"y\";i:1;s:1:\"8\";i:2;s:1:\"f\";i:3;s:1:\"2\";i:4;s:1:\"x\";i:5;s:1:\"d\";i:6;s:1:\"c\";i:7;s:1:\"c\";i:8;s:1:\"j\";}', 1753432420),
('laravel-cache-captcha_1d25ef489755e0ded4c8f50a17ed0747', 'a:9:{i:0;s:1:\"8\";i:1;s:1:\"h\";i:2;s:1:\"r\";i:3;s:1:\"c\";i:4;s:1:\"b\";i:5;s:1:\"t\";i:6;s:1:\"d\";i:7;s:1:\"x\";i:8;s:1:\"a\";}', 1753431125),
('laravel-cache-captcha_1d7c72ac863eea12cfca688ab8749fbd', 'a:9:{i:0;s:1:\"n\";i:1;s:1:\"z\";i:2;s:1:\"g\";i:3;s:1:\"m\";i:4;s:1:\"8\";i:5;s:1:\"e\";i:6;s:1:\"q\";i:7;s:1:\"6\";i:8;s:1:\"g\";}', 1753430867),
('laravel-cache-captcha_1ec95dd53465bc78330acc3b0df2225c', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"c\";i:2;s:1:\"4\";i:3;s:1:\"u\";i:4;s:1:\"9\";i:5;s:1:\"n\";i:6;s:1:\"x\";i:7;s:1:\"n\";i:8;s:1:\"h\";}', 1753432077),
('laravel-cache-captcha_21762876173801adffe1583e15276539', 'a:9:{i:0;s:1:\"y\";i:1;s:1:\"m\";i:2;s:1:\"b\";i:3;s:1:\"u\";i:4;s:1:\"x\";i:5;s:1:\"7\";i:6;s:1:\"p\";i:7;s:1:\"9\";i:8;s:1:\"p\";}', 1754461993),
('laravel-cache-captcha_2552955dc9f9ecf2981873db42fcb9b7', 'a:9:{i:0;s:1:\"h\";i:1;s:1:\"p\";i:2;s:1:\"q\";i:3;s:1:\"u\";i:4;s:1:\"j\";i:5;s:1:\"e\";i:6;s:1:\"4\";i:7;s:1:\"a\";i:8;s:1:\"e\";}', 1753435122),
('laravel-cache-captcha_257f839fb6234179cc1dc185d87a90a9', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"9\";i:2;s:1:\"p\";i:3;s:1:\"p\";i:4;s:1:\"p\";i:5;s:1:\"p\";i:6;s:1:\"b\";i:7;s:1:\"r\";i:8;s:1:\"b\";}', 1753439139),
('laravel-cache-captcha_2dff361ebb017f20439a71146fa0a9cf', 'a:9:{i:0;s:1:\"f\";i:1;s:1:\"4\";i:2;s:1:\"e\";i:3;s:1:\"j\";i:4;s:1:\"f\";i:5;s:1:\"r\";i:6;s:1:\"c\";i:7;s:1:\"z\";i:8;s:1:\"q\";}', 1753439140),
('laravel-cache-captcha_33e6d851a4adb08006f4889c01f4ad1a', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"3\";i:2;s:1:\"t\";i:3;s:1:\"b\";i:4;s:1:\"d\";i:5;s:1:\"f\";i:6;s:1:\"7\";i:7;s:1:\"y\";i:8;s:1:\"e\";}', 1753432083),
('laravel-cache-captcha_3503f2a0a6b69f24d33e032828fa7c12', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"x\";i:2;s:1:\"q\";i:3;s:1:\"d\";i:4;s:1:\"8\";i:5;s:1:\"c\";i:6;s:1:\"r\";i:7;s:1:\"a\";i:8;s:1:\"p\";}', 1753431452),
('laravel-cache-captcha_3622b363e8d928efdaa492482eb6f245', 'a:9:{i:0;s:1:\"e\";i:1;s:1:\"p\";i:2;s:1:\"4\";i:3;s:1:\"z\";i:4;s:1:\"g\";i:5;s:1:\"z\";i:6;s:1:\"9\";i:7;s:1:\"b\";i:8;s:1:\"g\";}', 1753438484),
('laravel-cache-captcha_3e5601551d9d38b46036242d498838b8', 'a:9:{i:0;s:1:\"6\";i:1;s:1:\"c\";i:2;s:1:\"q\";i:3;s:1:\"3\";i:4;s:1:\"2\";i:5;s:1:\"g\";i:6;s:1:\"m\";i:7;s:1:\"4\";i:8;s:1:\"f\";}', 1753431208),
('laravel-cache-captcha_40861a7856c5fc1df366748f8ca64c70', 'a:9:{i:0;s:1:\"d\";i:1;s:1:\"z\";i:2;s:1:\"r\";i:3;s:1:\"u\";i:4;s:1:\"t\";i:5;s:1:\"a\";i:6;s:1:\"a\";i:7;s:1:\"e\";i:8;s:1:\"r\";}', 1753430862),
('laravel-cache-captcha_4371a69068e22f0ab73c35a2c7a7544b', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"t\";i:2;s:1:\"r\";i:3;s:1:\"c\";i:4;s:1:\"a\";i:5;s:1:\"b\";i:6;s:1:\"f\";i:7;s:1:\"q\";i:8;s:1:\"q\";}', 1753431449),
('laravel-cache-captcha_45ded0e7f558cd81e6b19aed8c470863', 'a:9:{i:0;s:1:\"7\";i:1;s:1:\"x\";i:2;s:1:\"y\";i:3;s:1:\"d\";i:4;s:1:\"j\";i:5;s:1:\"h\";i:6;s:1:\"g\";i:7;s:1:\"z\";i:8;s:1:\"n\";}', 1753431234),
('laravel-cache-captcha_473cb030d28663c572ad67e6e6894d80', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"z\";i:2;s:1:\"t\";i:3;s:1:\"e\";i:4;s:1:\"9\";i:5;s:1:\"e\";i:6;s:1:\"y\";i:7;s:1:\"2\";i:8;s:1:\"y\";}', 1753438771),
('laravel-cache-captcha_48e7c94a7f6fb1d968c124b92bd05b77', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"j\";i:2;s:1:\"b\";i:3;s:1:\"r\";i:4;s:1:\"h\";i:5;s:1:\"t\";i:6;s:1:\"f\";i:7;s:1:\"8\";i:8;s:1:\"n\";}', 1753438569),
('laravel-cache-captcha_4a00a9e8bdf851f0d167c7f9872b4867', 'a:9:{i:0;s:1:\"u\";i:1;s:1:\"x\";i:2;s:1:\"7\";i:3;s:1:\"j\";i:4;s:1:\"e\";i:5;s:1:\"g\";i:6;s:1:\"z\";i:7;s:1:\"e\";i:8;s:1:\"d\";}', 1753432418),
('laravel-cache-captcha_4d589e12283ed9386665156686506f92', 'a:9:{i:0;s:1:\"9\";i:1;s:1:\"m\";i:2;s:1:\"y\";i:3;s:1:\"u\";i:4;s:1:\"g\";i:5;s:1:\"q\";i:6;s:1:\"z\";i:7;s:1:\"d\";i:8;s:1:\"c\";}', 1753627677),
('laravel-cache-captcha_4f8e1606e0bc29732d30633c6dddb23b', 'a:9:{i:0;s:1:\"c\";i:1;s:1:\"n\";i:2;s:1:\"r\";i:3;s:1:\"a\";i:4;s:1:\"g\";i:5;s:1:\"r\";i:6;s:1:\"8\";i:7;s:1:\"g\";i:8;s:1:\"h\";}', 1753435611),
('laravel-cache-captcha_52a333dc2098b02b87b6c9fdb103a523', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"j\";i:2;s:1:\"z\";i:3;s:1:\"z\";i:4;s:1:\"h\";i:5;s:1:\"t\";i:6;s:1:\"q\";i:7;s:1:\"4\";i:8;s:1:\"d\";}', 1753438482),
('laravel-cache-captcha_5a7cd61ab790c1ca2f708c13e378bf45', 'a:9:{i:0;s:1:\"e\";i:1;s:1:\"m\";i:2;s:1:\"f\";i:3;s:1:\"r\";i:4;s:1:\"m\";i:5;s:1:\"f\";i:6;s:1:\"d\";i:7;s:1:\"d\";i:8;s:1:\"9\";}', 1753438477),
('laravel-cache-captcha_5ca3ad33332d2a636da72ac3ef771e73', 'a:9:{i:0;s:1:\"h\";i:1;s:1:\"t\";i:2;s:1:\"b\";i:3;s:1:\"z\";i:4;s:1:\"z\";i:5;s:1:\"b\";i:6;s:1:\"q\";i:7;s:1:\"j\";i:8;s:1:\"2\";}', 1753439150),
('laravel-cache-captcha_5cdf6174bb709b4fb94da7ae38ccb3cd', 'a:9:{i:0;s:1:\"g\";i:1;s:1:\"q\";i:2;s:1:\"b\";i:3;s:1:\"n\";i:4;s:1:\"c\";i:5;s:1:\"f\";i:6;s:1:\"u\";i:7;s:1:\"b\";i:8;s:1:\"b\";}', 1753435463),
('laravel-cache-captcha_5ceed5ad34f097f95d901214568f5a0e', 'a:9:{i:0;s:1:\"m\";i:1;s:1:\"t\";i:2;s:1:\"f\";i:3;s:1:\"b\";i:4;s:1:\"d\";i:5;s:1:\"3\";i:6;s:1:\"u\";i:7;s:1:\"x\";i:8;s:1:\"y\";}', 1753430374),
('laravel-cache-captcha_5d96fc2f77c482cf3d86cebfeb62f7be', 'a:9:{i:0;s:1:\"8\";i:1;s:1:\"t\";i:2;s:1:\"h\";i:3;s:1:\"z\";i:4;s:1:\"r\";i:5;s:1:\"a\";i:6;s:1:\"2\";i:7;s:1:\"y\";i:8;s:1:\"7\";}', 1753439510),
('laravel-cache-captcha_5f9935e3bc3fcb909d0e880d821502f3', 'a:9:{i:0;s:1:\"m\";i:1;s:1:\"f\";i:2;s:1:\"f\";i:3;s:1:\"y\";i:4;s:1:\"z\";i:5;s:1:\"p\";i:6;s:1:\"p\";i:7;s:1:\"n\";i:8;s:1:\"a\";}', 1753439860),
('laravel-cache-captcha_6751bdfd4ca11f9ebe1e191edea60e91', 'a:9:{i:0;s:1:\"2\";i:1;s:1:\"c\";i:2;s:1:\"y\";i:3;s:1:\"e\";i:4;s:1:\"a\";i:5;s:1:\"m\";i:6;s:1:\"2\";i:7;s:1:\"u\";i:8;s:1:\"h\";}', 1753431923),
('laravel-cache-captcha_6787143d2f4d993f2d15403558a61645', 'a:9:{i:0;s:1:\"p\";i:1;s:1:\"h\";i:2;s:1:\"t\";i:3;s:1:\"f\";i:4;s:1:\"p\";i:5;s:1:\"h\";i:6;s:1:\"f\";i:7;s:1:\"b\";i:8;s:1:\"n\";}', 1753438575),
('laravel-cache-captcha_67c4412a25340f345a18fe6a4e901005', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"x\";i:2;s:1:\"q\";i:3;s:1:\"d\";i:4;s:1:\"n\";i:5;s:1:\"z\";i:6;s:1:\"z\";i:7;s:1:\"x\";i:8;s:1:\"t\";}', 1753432059),
('laravel-cache-captcha_689b37cd34556334cb093f737813745e', 'a:9:{i:0;s:1:\"m\";i:1;s:1:\"2\";i:2;s:1:\"c\";i:3;s:1:\"z\";i:4;s:1:\"m\";i:5;s:1:\"p\";i:6;s:1:\"b\";i:7;s:1:\"h\";i:8;s:1:\"c\";}', 1753431115),
('laravel-cache-captcha_6b6a72da1e53e59708cd8b8b4f04e3a0', 'a:9:{i:0;s:1:\"6\";i:1;s:1:\"d\";i:2;s:1:\"g\";i:3;s:1:\"d\";i:4;s:1:\"m\";i:5;s:1:\"3\";i:6;s:1:\"p\";i:7;s:1:\"c\";i:8;s:1:\"y\";}', 1753431486),
('laravel-cache-captcha_6f5d803ebb36907a108fdeed5c5eb152', 'a:9:{i:0;s:1:\"f\";i:1;s:1:\"m\";i:2;s:1:\"u\";i:3;s:1:\"a\";i:4;s:1:\"q\";i:5;s:1:\"r\";i:6;s:1:\"q\";i:7;s:1:\"z\";i:8;s:1:\"n\";}', 1753431261),
('laravel-cache-captcha_6f5dbe324488dd22ad1e852fcfcff80c', 'a:9:{i:0;s:1:\"8\";i:1;s:1:\"n\";i:2;s:1:\"a\";i:3;s:1:\"8\";i:4;s:1:\"f\";i:5;s:1:\"m\";i:6;s:1:\"6\";i:7;s:1:\"4\";i:8;s:1:\"y\";}', 1753438480),
('laravel-cache-captcha_74a259132036f0c2c6f86894aea561a7', 'a:9:{i:0;s:1:\"f\";i:1;s:1:\"d\";i:2;s:1:\"h\";i:3;s:1:\"y\";i:4;s:1:\"8\";i:5;s:1:\"f\";i:6;s:1:\"n\";i:7;s:1:\"c\";i:8;s:1:\"d\";}', 1754512092),
('laravel-cache-captcha_756622659b9d062b4f639085ed29cb9a', 'a:9:{i:0;s:1:\"m\";i:1;s:1:\"t\";i:2;s:1:\"g\";i:3;s:1:\"x\";i:4;s:1:\"2\";i:5;s:1:\"u\";i:6;s:1:\"n\";i:7;s:1:\"n\";i:8;s:1:\"g\";}', 1753431121),
('laravel-cache-captcha_7849188bb4b6901de5c82b98e2c7bfff', 'a:9:{i:0;s:1:\"n\";i:1;s:1:\"g\";i:2;s:1:\"f\";i:3;s:1:\"y\";i:4;s:1:\"8\";i:5;s:1:\"u\";i:6;s:1:\"m\";i:7;s:1:\"t\";i:8;s:1:\"x\";}', 1753430451),
('laravel-cache-captcha_7a7783313c5593aa458b670b12e29d1b', 'a:9:{i:0;s:1:\"3\";i:1;s:1:\"n\";i:2;s:1:\"h\";i:3;s:1:\"n\";i:4;s:1:\"n\";i:5;s:1:\"z\";i:6;s:1:\"e\";i:7;s:1:\"g\";i:8;s:1:\"c\";}', 1753431165),
('laravel-cache-captcha_7c6955b458ec9aa9c5b4883756cd4b5c', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"e\";i:2;s:1:\"c\";i:3;s:1:\"m\";i:4;s:1:\"4\";i:5;s:1:\"g\";i:6;s:1:\"u\";i:7;s:1:\"z\";i:8;s:1:\"f\";}', 1753431102),
('laravel-cache-captcha_7efdd5d5bc12ab488fbae6f2e6f5b64f', 'a:9:{i:0;s:1:\"n\";i:1;s:1:\"9\";i:2;s:1:\"x\";i:3;s:1:\"x\";i:4;s:1:\"d\";i:5;s:1:\"z\";i:6;s:1:\"t\";i:7;s:1:\"m\";i:8;s:1:\"j\";}', 1754487394),
('laravel-cache-captcha_7fc1813dd26d5e9b4be94e8fc355f206', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"r\";i:2;s:1:\"7\";i:3;s:1:\"g\";i:4;s:1:\"e\";i:5;s:1:\"x\";i:6;s:1:\"a\";i:7;s:1:\"t\";i:8;s:1:\"r\";}', 1753438630),
('laravel-cache-captcha_80c27b8a0685ba156585dfacbbbf66d6', 'a:9:{i:0;s:1:\"3\";i:1;s:1:\"j\";i:2;s:1:\"8\";i:3;s:1:\"f\";i:4;s:1:\"b\";i:5;s:1:\"t\";i:6;s:1:\"q\";i:7;s:1:\"n\";i:8;s:1:\"g\";}', 1753430362),
('laravel-cache-captcha_814d051b947a3a24193068af2736e28a', 'a:9:{i:0;s:1:\"7\";i:1;s:1:\"6\";i:2;s:1:\"c\";i:3;s:1:\"c\";i:4;s:1:\"j\";i:5;s:1:\"7\";i:6;s:1:\"j\";i:7;s:1:\"u\";i:8;s:1:\"u\";}', 1753439109),
('laravel-cache-captcha_83084996330331c5dfbbed48977edea7', 'a:9:{i:0;s:1:\"6\";i:1;s:1:\"z\";i:2;s:1:\"z\";i:3;s:1:\"g\";i:4;s:1:\"9\";i:5;s:1:\"h\";i:6;s:1:\"j\";i:7;s:1:\"x\";i:8;s:1:\"h\";}', 1753431114),
('laravel-cache-captcha_8913b349ffe55742d226f46eb6632b53', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"g\";i:2;s:1:\"t\";i:3;s:1:\"3\";i:4;s:1:\"t\";i:5;s:1:\"t\";i:6;s:1:\"4\";i:7;s:1:\"q\";i:8;s:1:\"h\";}', 1753627588),
('laravel-cache-captcha_8d5696dbf4ee708c696a4480f50467df', 'a:9:{i:0;s:1:\"c\";i:1;s:1:\"z\";i:2;s:1:\"u\";i:3;s:1:\"a\";i:4;s:1:\"b\";i:5;s:1:\"m\";i:6;s:1:\"c\";i:7;s:1:\"n\";i:8;s:1:\"h\";}', 1753438506),
('laravel-cache-captcha_8e7cc20101adc5340019a5163a9f004b', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"h\";i:2;s:1:\"a\";i:3;s:1:\"7\";i:4;s:1:\"j\";i:5;s:1:\"x\";i:6;s:1:\"a\";i:7;s:1:\"x\";i:8;s:1:\"m\";}', 1753432044),
('laravel-cache-captcha_90cfffeef7f42e2f6cbde6fa367518c4', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"h\";i:2;s:1:\"h\";i:3;s:1:\"6\";i:4;s:1:\"d\";i:5;s:1:\"j\";i:6;s:1:\"2\";i:7;s:1:\"z\";i:8;s:1:\"e\";}', 1753439103),
('laravel-cache-captcha_91ade02d13238565400c1e36ed7f2404', 'a:9:{i:0;s:1:\"c\";i:1;s:1:\"y\";i:2;s:1:\"j\";i:3;s:1:\"f\";i:4;s:1:\"y\";i:5;s:1:\"y\";i:6;s:1:\"m\";i:7;s:1:\"e\";i:8;s:1:\"c\";}', 1753432417),
('laravel-cache-captcha_92847900ac1f4c9d6b5de5205776c12e', 'a:9:{i:0;s:1:\"y\";i:1;s:1:\"r\";i:2;s:1:\"a\";i:3;s:1:\"n\";i:4;s:1:\"f\";i:5;s:1:\"p\";i:6;s:1:\"9\";i:7;s:1:\"t\";i:8;s:1:\"q\";}', 1753439157),
('laravel-cache-captcha_92899aeca3fc21a75c51a78e4a27b8dc', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"x\";i:2;s:1:\"8\";i:3;s:1:\"e\";i:4;s:1:\"x\";i:5;s:1:\"b\";i:6;s:1:\"u\";i:7;s:1:\"b\";i:8;s:1:\"x\";}', 1753431269),
('laravel-cache-captcha_92979c4072f18506510dd0e3d05b0039', 'a:9:{i:0;s:1:\"h\";i:1;s:1:\"z\";i:2;s:1:\"4\";i:3;s:1:\"x\";i:4;s:1:\"q\";i:5;s:1:\"b\";i:6;s:1:\"m\";i:7;s:1:\"j\";i:8;s:1:\"e\";}', 1753435461),
('laravel-cache-captcha_93874f70c1e0335b9b19f4c7e8f187d4', 'a:9:{i:0;s:1:\"6\";i:1;s:1:\"t\";i:2;s:1:\"h\";i:3;s:1:\"a\";i:4;s:1:\"9\";i:5;s:1:\"q\";i:6;s:1:\"e\";i:7;s:1:\"7\";i:8;s:1:\"y\";}', 1753439858),
('laravel-cache-captcha_9af882ac8253721dbbb2df81f851456e', 'a:9:{i:0;s:1:\"r\";i:1;s:1:\"8\";i:2;s:1:\"a\";i:3;s:1:\"p\";i:4;s:1:\"e\";i:5;s:1:\"f\";i:6;s:1:\"p\";i:7;s:1:\"2\";i:8;s:1:\"d\";}', 1753439132),
('laravel-cache-captcha_9c330dbaa934ed73f13845122c36c5a6', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"y\";i:2;s:1:\"t\";i:3;s:1:\"h\";i:4;s:1:\"u\";i:5;s:1:\"h\";i:6;s:1:\"g\";i:7;s:1:\"8\";i:8;s:1:\"h\";}', 1753431410),
('laravel-cache-captcha_9c762128d13c4d03d1ef3f3dc38a4416', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"y\";i:2;s:1:\"g\";i:3;s:1:\"y\";i:4;s:1:\"h\";i:5;s:1:\"9\";i:6;s:1:\"x\";i:7;s:1:\"4\";i:8;s:1:\"7\";}', 1753438660),
('laravel-cache-captcha_9d46184dd79af7d99631731a1c55ee24', 'a:9:{i:0;s:1:\"f\";i:1;s:1:\"q\";i:2;s:1:\"q\";i:3;s:1:\"x\";i:4;s:1:\"3\";i:5;s:1:\"t\";i:6;s:1:\"d\";i:7;s:1:\"q\";i:8;s:1:\"m\";}', 1753632111),
('laravel-cache-captcha_9d9c12f6283b61634212244c74856cd1', 'a:9:{i:0;s:1:\"q\";i:1;s:1:\"t\";i:2;s:1:\"e\";i:3;s:1:\"u\";i:4;s:1:\"j\";i:5;s:1:\"7\";i:6;s:1:\"x\";i:7;s:1:\"z\";i:8;s:1:\"z\";}', 1753439144),
('laravel-cache-captcha_a2da6ed75bbd51819c8506959b71ddb8', 'a:9:{i:0;s:1:\"p\";i:1;s:1:\"n\";i:2;s:1:\"3\";i:3;s:1:\"h\";i:4;s:1:\"n\";i:5;s:1:\"m\";i:6;s:1:\"x\";i:7;s:1:\"m\";i:8;s:1:\"t\";}', 1753431282),
('laravel-cache-captcha_a3f07c3229bcba8500ed40b49fc186c4', 'a:9:{i:0;s:1:\"g\";i:1;s:1:\"a\";i:2;s:1:\"z\";i:3;s:1:\"z\";i:4;s:1:\"x\";i:5;s:1:\"m\";i:6;s:1:\"g\";i:7;s:1:\"h\";i:8;s:1:\"e\";}', 1753431123),
('laravel-cache-captcha_a5cfe9466597de6fd61420da0f82bd95', 'a:9:{i:0;s:1:\"r\";i:1;s:1:\"7\";i:2;s:1:\"a\";i:3;s:1:\"g\";i:4;s:1:\"j\";i:5;s:1:\"8\";i:6;s:1:\"d\";i:7;s:1:\"r\";i:8;s:1:\"g\";}', 1753431373),
('laravel-cache-captcha_a83eb962b82ccc4e422b22475a3fd174', 'a:9:{i:0;s:1:\"e\";i:1;s:1:\"x\";i:2;s:1:\"y\";i:3;s:1:\"c\";i:4;s:1:\"p\";i:5;s:1:\"c\";i:6;s:1:\"q\";i:7;s:1:\"3\";i:8;s:1:\"q\";}', 1754511743),
('laravel-cache-captcha_a8cc394eb0166bc437a7a1a67b343270', 'a:9:{i:0;s:1:\"b\";i:1;s:1:\"x\";i:2;s:1:\"4\";i:3;s:1:\"9\";i:4;s:1:\"y\";i:5;s:1:\"x\";i:6;s:1:\"z\";i:7;s:1:\"d\";i:8;s:1:\"c\";}', 1753431414),
('laravel-cache-captcha_a912c4ab3eb1a99e013d48f479fceb54', 'a:9:{i:0;s:1:\"c\";i:1;s:1:\"d\";i:2;s:1:\"y\";i:3;s:1:\"d\";i:4;s:1:\"t\";i:5;s:1:\"6\";i:6;s:1:\"n\";i:7;s:1:\"8\";i:8;s:1:\"2\";}', 1753438656),
('laravel-cache-captcha_a99bb0d98625f53d9f120a8cf1bd5bd2', 'a:9:{i:0;s:1:\"d\";i:1;s:1:\"d\";i:2;s:1:\"b\";i:3;s:1:\"a\";i:4;s:1:\"p\";i:5;s:1:\"y\";i:6;s:1:\"b\";i:7;s:1:\"j\";i:8;s:1:\"3\";}', 1753438626),
('laravel-cache-captcha_aaeb64eda8f756e7451d12410528a338', 'a:9:{i:0;s:1:\"h\";i:1;s:1:\"e\";i:2;s:1:\"d\";i:3;s:1:\"u\";i:4;s:1:\"4\";i:5;s:1:\"2\";i:6;s:1:\"7\";i:7;s:1:\"e\";i:8;s:1:\"x\";}', 1753534505),
('laravel-cache-captcha_ac7aabe0d721f9356ea2f86c9a370817', 'a:9:{i:0;s:1:\"u\";i:1;s:1:\"4\";i:2;s:1:\"c\";i:3;s:1:\"p\";i:4;s:1:\"b\";i:5;s:1:\"n\";i:6;s:1:\"m\";i:7;s:1:\"b\";i:8;s:1:\"g\";}', 1753438603),
('laravel-cache-captcha_ae0d1d699e34c5a4e2c9638684d01f1a', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"h\";i:2;s:1:\"8\";i:3;s:1:\"p\";i:4;s:1:\"d\";i:5;s:1:\"p\";i:6;s:1:\"e\";i:7;s:1:\"u\";i:8;s:1:\"t\";}', 1753435151),
('laravel-cache-captcha_ae1cf5b8cf93272856cd404bdd869c94', 'a:9:{i:0;s:1:\"f\";i:1;s:1:\"q\";i:2;s:1:\"g\";i:3;s:1:\"b\";i:4;s:1:\"h\";i:5;s:1:\"x\";i:6;s:1:\"d\";i:7;s:1:\"u\";i:8;s:1:\"f\";}', 1753439155),
('laravel-cache-captcha_ae6fadcf4310b756d2de175d0633bb0f', 'a:9:{i:0;s:1:\"m\";i:1;s:1:\"4\";i:2;s:1:\"y\";i:3;s:1:\"x\";i:4;s:1:\"u\";i:5;s:1:\"n\";i:6;s:1:\"6\";i:7;s:1:\"f\";i:8;s:1:\"x\";}', 1753432414),
('laravel-cache-captcha_afe750e03c93c3d11f2006f20dd18119', 'a:9:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"r\";i:3;s:1:\"y\";i:4;s:1:\"t\";i:5;s:1:\"f\";i:6;s:1:\"e\";i:7;s:1:\"b\";i:8;s:1:\"g\";}', 1753431412),
('laravel-cache-captcha_b29afcf6f0cabc3fa63d08d773b1a3ca', 'a:9:{i:0;s:1:\"8\";i:1;s:1:\"3\";i:2;s:1:\"m\";i:3;s:1:\"d\";i:4;s:1:\"u\";i:5;s:1:\"q\";i:6;s:1:\"n\";i:7;s:1:\"z\";i:8;s:1:\"n\";}', 1753534500),
('laravel-cache-captcha_b5156029b0f3732427f39c36a9933461', 'a:9:{i:0;s:1:\"b\";i:1;s:1:\"4\";i:2;s:1:\"b\";i:3;s:1:\"9\";i:4;s:1:\"x\";i:5;s:1:\"u\";i:6;s:1:\"p\";i:7;s:1:\"n\";i:8;s:1:\"m\";}', 1753430890),
('laravel-cache-captcha_b55b453941f791c8555419fcb5173da5', 'a:9:{i:0;s:1:\"z\";i:1;s:1:\"z\";i:2;s:1:\"u\";i:3;s:1:\"r\";i:4;s:1:\"d\";i:5;s:1:\"t\";i:6;s:1:\"y\";i:7;s:1:\"r\";i:8;s:1:\"n\";}', 1753439593),
('laravel-cache-captcha_b72650bb3805be125a50ee6aa2386304', 'a:9:{i:0;s:1:\"f\";i:1;s:1:\"j\";i:2;s:1:\"h\";i:3;s:1:\"n\";i:4;s:1:\"u\";i:5;s:1:\"r\";i:6;s:1:\"u\";i:7;s:1:\"f\";i:8;s:1:\"d\";}', 1753438557),
('laravel-cache-captcha_b7993106a91ae95d62f7dcab4bb3feaa', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"n\";i:2;s:1:\"y\";i:3;s:1:\"h\";i:4;s:1:\"q\";i:5;s:1:\"m\";i:6;s:1:\"7\";i:7;s:1:\"6\";i:8;s:1:\"t\";}', 1753430955),
('laravel-cache-captcha_b94ae2435bcaad153516e1ea63b4c859', 'a:9:{i:0;s:1:\"e\";i:1;s:1:\"e\";i:2;s:1:\"7\";i:3;s:1:\"7\";i:4;s:1:\"d\";i:5;s:1:\"m\";i:6;s:1:\"q\";i:7;s:1:\"b\";i:8;s:1:\"y\";}', 1753448176),
('laravel-cache-captcha_c2096b79078a1c75cffa252d3b6128d6', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"t\";i:2;s:1:\"x\";i:3;s:1:\"g\";i:4;s:1:\"t\";i:5;s:1:\"r\";i:6;s:1:\"q\";i:7;s:1:\"x\";i:8;s:1:\"u\";}', 1753438963),
('laravel-cache-captcha_c278341f22407eed92c8fd66fee413ae', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"a\";i:2;s:1:\"q\";i:3;s:1:\"g\";i:4;s:1:\"j\";i:5;s:1:\"9\";i:6;s:1:\"p\";i:7;s:1:\"2\";i:8;s:1:\"z\";}', 1753629817),
('laravel-cache-captcha_c3154a758a36a17b2cb2f3335e898d57', 'a:9:{i:0;s:1:\"q\";i:1;s:1:\"a\";i:2;s:1:\"z\";i:3;s:1:\"8\";i:4;s:1:\"7\";i:5;s:1:\"d\";i:6;s:1:\"p\";i:7;s:1:\"a\";i:8;s:1:\"e\";}', 1753632059),
('laravel-cache-captcha_c6f0fe3ebe6a28dbcea8a71da46dd472', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"2\";i:2;s:1:\"8\";i:3;s:1:\"d\";i:4;s:1:\"g\";i:5;s:1:\"r\";i:6;s:1:\"t\";i:7;s:1:\"x\";i:8;s:1:\"t\";}', 1753435121),
('laravel-cache-captcha_c8ae7156ad3663836570d3960b18e0e0', 'a:9:{i:0;s:1:\"j\";i:1;s:1:\"6\";i:2;s:1:\"q\";i:3;s:1:\"f\";i:4;s:1:\"f\";i:5;s:1:\"e\";i:6;s:1:\"q\";i:7;s:1:\"b\";i:8;s:1:\"2\";}', 1753432074),
('laravel-cache-captcha_c8f9215f7f48a22932109557eb589630', 'a:9:{i:0;s:1:\"4\";i:1;s:1:\"p\";i:2;s:1:\"j\";i:3;s:1:\"g\";i:4;s:1:\"z\";i:5;s:1:\"4\";i:6;s:1:\"f\";i:7;s:1:\"p\";i:8;s:1:\"b\";}', 1753432422),
('laravel-cache-captcha_c95864cd013c6eec53eac8722fcf483b', 'a:9:{i:0;s:1:\"r\";i:1;s:1:\"p\";i:2;s:1:\"a\";i:3;s:1:\"t\";i:4;s:1:\"t\";i:5;s:1:\"d\";i:6;s:1:\"9\";i:7;s:1:\"d\";i:8;s:1:\"c\";}', 1753430855),
('laravel-cache-captcha_ccdc1548f976969a52c3837f63cfe1a4', 'a:9:{i:0;s:1:\"q\";i:1;s:1:\"7\";i:2;s:1:\"a\";i:3;s:1:\"b\";i:4;s:1:\"j\";i:5;s:1:\"n\";i:6;s:1:\"x\";i:7;s:1:\"z\";i:8;s:1:\"h\";}', 1753435125),
('laravel-cache-captcha_d0b47994d2111cd6b3527496e7b949f3', 'a:9:{i:0;s:1:\"t\";i:1;s:1:\"h\";i:2;s:1:\"z\";i:3;s:1:\"d\";i:4;s:1:\"8\";i:5;s:1:\"a\";i:6;s:1:\"8\";i:7;s:1:\"3\";i:8;s:1:\"y\";}', 1753431376),
('laravel-cache-captcha_d69c071d1769e70cf12fb7e73d0996b0', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"m\";i:2;s:1:\"x\";i:3;s:1:\"d\";i:4;s:1:\"c\";i:5;s:1:\"t\";i:6;s:1:\"q\";i:7;s:1:\"2\";i:8;s:1:\"3\";}', 1753442780),
('laravel-cache-captcha_d9ae77679583c3dfc2d1d54e8c8c6b68', 'a:9:{i:0;s:1:\"9\";i:1;s:1:\"6\";i:2;s:1:\"b\";i:3;s:1:\"q\";i:4;s:1:\"y\";i:5;s:1:\"e\";i:6;s:1:\"x\";i:7;s:1:\"u\";i:8;s:1:\"q\";}', 1753439142),
('laravel-cache-captcha_dae62c68c8e9ca42d79081f66bb99829', 'a:9:{i:0;s:1:\"4\";i:1;s:1:\"q\";i:2;s:1:\"e\";i:3;s:1:\"y\";i:4;s:1:\"e\";i:5;s:1:\"x\";i:6;s:1:\"u\";i:7;s:1:\"t\";i:8;s:1:\"u\";}', 1753438519),
('laravel-cache-captcha_dc8f624b85fc2fe3caf14c4f6272d627', 'a:9:{i:0;s:1:\"u\";i:1;s:1:\"d\";i:2;s:1:\"j\";i:3;s:1:\"g\";i:4;s:1:\"m\";i:5;s:1:\"e\";i:6;s:1:\"t\";i:7;s:1:\"m\";i:8;s:1:\"g\";}', 1753430375),
('laravel-cache-captcha_dccbe28d11f0352e4ae73b95dc846967', 'a:9:{i:0;s:1:\"u\";i:1;s:1:\"4\";i:2;s:1:\"u\";i:3;s:1:\"4\";i:4;s:1:\"c\";i:5;s:1:\"7\";i:6;s:1:\"b\";i:7;s:1:\"a\";i:8;s:1:\"y\";}', 1753439111),
('laravel-cache-captcha_de5584001e465b18131eb63a45ebe6e9', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"b\";i:2;s:1:\"q\";i:3;s:1:\"z\";i:4;s:1:\"x\";i:5;s:1:\"7\";i:6;s:1:\"y\";i:7;s:1:\"a\";i:8;s:1:\"d\";}', 1753534507),
('laravel-cache-captcha_e21ba89da898a39b5c3acf3e93375437', 'a:9:{i:0;s:1:\"u\";i:1;s:1:\"t\";i:2;s:1:\"r\";i:3;s:1:\"h\";i:4;s:1:\"f\";i:5;s:1:\"c\";i:6;s:1:\"x\";i:7;s:1:\"x\";i:8;s:1:\"a\";}', 1753430367),
('laravel-cache-captcha_e4fe6b1e3375234c7fbe45d2786dae21', 'a:9:{i:0;s:1:\"y\";i:1;s:1:\"x\";i:2;s:1:\"t\";i:3;s:1:\"x\";i:4;s:1:\"d\";i:5;s:1:\"g\";i:6;s:1:\"m\";i:7;s:1:\"j\";i:8;s:1:\"d\";}', 1753431230),
('laravel-cache-captcha_e732e6bf92931dd95bb2a75a45d454b1', 'a:9:{i:0;s:1:\"x\";i:1;s:1:\"b\";i:2;s:1:\"b\";i:3;s:1:\"f\";i:4;s:1:\"e\";i:5;s:1:\"a\";i:6;s:1:\"g\";i:7;s:1:\"r\";i:8;s:1:\"d\";}', 1753439153),
('laravel-cache-captcha_ea31ad175f21de22d0567a2bbf2217a2', 'a:9:{i:0;s:1:\"p\";i:1;s:1:\"b\";i:2;s:1:\"x\";i:3;s:1:\"8\";i:4;s:1:\"x\";i:5;s:1:\"q\";i:6;s:1:\"6\";i:7;s:1:\"7\";i:8;s:1:\"p\";}', 1753430864),
('laravel-cache-captcha_ee37041830e4f58e5306520ad93c4828', 'a:9:{i:0;s:1:\"y\";i:1;s:1:\"b\";i:2;s:1:\"r\";i:3;s:1:\"z\";i:4;s:1:\"n\";i:5;s:1:\"h\";i:6;s:1:\"q\";i:7;s:1:\"7\";i:8;s:1:\"a\";}', 1753438653),
('laravel-cache-captcha_f2071599d05c9bfb45082b2ef1ee89af', 'a:9:{i:0;s:1:\"a\";i:1;s:1:\"8\";i:2;s:1:\"f\";i:3;s:1:\"4\";i:4;s:1:\"q\";i:5;s:1:\"c\";i:6;s:1:\"n\";i:7;s:1:\"7\";i:8;s:1:\"8\";}', 1753431108),
('laravel-cache-captcha_f3b1f945383c96c5557d18b9c424286d', 'a:9:{i:0;s:1:\"6\";i:1;s:1:\"p\";i:2;s:1:\"z\";i:3;s:1:\"x\";i:4;s:1:\"r\";i:5;s:1:\"a\";i:6;s:1:\"c\";i:7;s:1:\"y\";i:8;s:1:\"9\";}', 1754512105),
('laravel-cache-captcha_f47c47f031ae98f414cb0e0b277c51e8', 'a:9:{i:0;s:1:\"n\";i:1;s:1:\"n\";i:2;s:1:\"y\";i:3;s:1:\"a\";i:4;s:1:\"g\";i:5;s:1:\"a\";i:6;s:1:\"f\";i:7;s:1:\"j\";i:8;s:1:\"h\";}', 1753430373),
('laravel-cache-captcha_fcc5df27eb8ec643512e29386a3f75d9', 'a:9:{i:0;s:1:\"n\";i:1;s:1:\"d\";i:2;s:1:\"f\";i:3;s:1:\"3\";i:4;s:1:\"2\";i:5;s:1:\"d\";i:6;s:1:\"h\";i:7;s:1:\"y\";i:8;s:1:\"t\";}', 1753435154),
('laravel-cache-captcha_fd8fd461881803223afd71c74fa02d7f', 'a:9:{i:0;s:1:\"h\";i:1;s:1:\"x\";i:2;s:1:\"t\";i:3;s:1:\"j\";i:4;s:1:\"d\";i:5;s:1:\"d\";i:6;s:1:\"c\";i:7;s:1:\"e\";i:8;s:1:\"j\";}', 1753431304);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_24_110936_add_otp_fields_to_users_table', 2),
(5, '2025_07_24_111038_add_otp_fields_to_users_table', 3),
(6, '2025_07_24_111432_2025_07_24_create_profile_table', 4),
(7, '2025_07_25_082842_add_role_fields_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE `m_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(100) NOT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `prefix` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `role` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_menu`
--

INSERT INTO `m_menu` (`id`, `desc`, `parent_id`, `prefix`, `link`, `icon`, `position`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '0', 'candidate', 'Dashboard', 'ri-dashboard-3-line', 1, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:27:26'),
(2, 'Profile', '0', 'candidate', 'Profile', 'ri-dashboard-3-line', 2, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:27:32'),
(3, 'Jobs', '0', 'candidate', 'Jobs', 'ri-dashboard-3-line', 3, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:27:35'),
(4, 'Status', '0', 'candidate', 'Jobstatus', 'ri-dashboard-3-line', 4, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:26:24'),
(5, 'Job Alerts', '0', 'candidate', 'Jobalert', 'ri-dashboard-3-line', 5, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:26:58'),
(6, 'Privacy Setting', '0', 'candidate', 'Privacysetting', 'ri-dashboard-3-line', 6, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:28:06'),
(7, 'Tracking', '0', 'candidate', 'JobTracking', 'ri-dashboard-3-line', 7, 1, 1, '2025-04-08 05:10:47', '2025-08-06 07:29:01'),
(8, 'Dashboard', '0', 'employer', 'Dashboard', 'ri-dashboard-3-line', 1, 2, 1, '2025-04-08 05:10:47', '2025-08-06 07:27:26'),
(9, 'Profile', '0', 'employer', 'Profile', 'ri-dashboard-3-line', 2, 2, 1, '2025-04-08 05:10:47', '2025-08-06 07:27:32'),
(10, 'Jobs', '0', 'employer', 'Jobs', 'ri-dashboard-3-line', 3, 2, 1, '2025-04-08 05:10:47', '2025-08-06 07:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ERg6e3QZWrOw4jVifSAz1KoWjtrNzeCRAofip75O', 7, '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQkMwQlBVNGc0TWhtRUpqUUtpdWlNYjVSVjNldlo3eEp5aGxGUERFYSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2NhbmRpZGF0ZS9Qcm9maWxlIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYW5kaWRhdGUvRGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMjoiY2FwdGNoYV90ZXh0IjtzOjY6IlFFRThIMCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Nzt9', 1755163927);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_award_certificate`
--

CREATE TABLE `tbl_award_certificate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_award_certificate`
--

INSERT INTO `tbl_award_certificate` (`id`, `user_id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 7, 'Participate in Hackathon', 'https://www.udemy.com/', '2025-08-14 07:29:26', '2025-08-14 07:29:26'),
(2, 7, 'Got Certificate From Google', 'https://www.google.com/', '2025-08-14 07:29:26', '2025-08-14 07:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate_profile`
--

CREATE TABLE `tbl_candidate_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('M','F','O') DEFAULT NULL COMMENT 'M=Male,F=Female,O=Others',
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `is_profile_public` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `job_alert_enabled` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_candidate_profile`
--

INSERT INTO `tbl_candidate_profile` (`id`, `user_id`, `name`, `dob`, `gender`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `marital_status`, `category`, `profile_img`, `is_profile_public`, `job_alert_enabled`, `created_at`, `updated_at`) VALUES
(1, 7, 'Bhuvan Gupta', '1997-01-08', 'M', 'bhuvan.veritos@gmail.com', '8118879069', 'Plot 89, Shahi Majra, Mohali', 'Mohali', 'Punjab', '146001', 'single', 'general', '1755082406_689c6ea64f4d3.png', '0', '1', '2025-07-27 20:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate_profile_status`
--

CREATE TABLE `tbl_candidate_profile_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_update` tinyint(1) NOT NULL DEFAULT 0,
  `workex_update` tinyint(1) NOT NULL DEFAULT 0,
  `qualification_update` tinyint(1) NOT NULL DEFAULT 0,
  `social_update` tinyint(1) NOT NULL DEFAULT 0,
  `skill_update` tinyint(1) NOT NULL DEFAULT 0,
  `language_update` tinyint(1) NOT NULL DEFAULT 0,
  `award_update` tinyint(1) NOT NULL DEFAULT 0,
  `enclosure_update` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_candidate_profile_status`
--

INSERT INTO `tbl_candidate_profile_status` (`id`, `user_id`, `profile_update`, `workex_update`, `qualification_update`, `social_update`, `skill_update`, `language_update`, `award_update`, `enclosure_update`) VALUES
(1, 7, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer_profile`
--

CREATE TABLE `tbl_employer_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `org_category` int(3) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `org_email` varchar(100) DEFAULT NULL,
  `org_mobile` varchar(20) DEFAULT NULL,
  `org_logo` varchar(255) DEFAULT NULL,
  `org_description` text DEFAULT NULL,
  `org_website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employer_profile`
--

INSERT INTO `tbl_employer_profile` (`id`, `user_id`, `name`, `email`, `mobile`, `profile_img`, `org_category`, `org_name`, `org_email`, `org_mobile`, `org_logo`, `org_description`, `org_website`, `address`, `city`, `state`, `pincode`, `created_at`, `updated_at`) VALUES
(2, 9, 'Gourav Mahipal', 'gourav@veritos.in', '8882373333', NULL, 2, 'Sunrise Softwares Pvt Ltd', 'sunrise.soft@gmail.com', '8822112233', '63c5c76560dae70384daf57375b46bc8_l.jpg', 'Software development company', 'sunrisesoft.com', 'D-190, Industrial area, Mohali, Punjab', 'Mohali', 'Punjab', '170045', '2025-08-07 02:27:37', NULL),
(3, 10, 'Bhuvan Gupta', 'webalignsolutions@gmail.com', '7877258521', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-12 17:01:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer_type`
--

CREATE TABLE `tbl_employer_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employer_type`
--

INSERT INTO `tbl_employer_type` (`id`, `type`) VALUES
(1, 'Hospital'),
(2, 'Company'),
(3, 'Government Department');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `job_type` int(3) DEFAULT NULL,
  `exp_from` tinyint(5) DEFAULT NULL,
  `exp_to` tinyint(5) DEFAULT NULL,
  `exp_type` enum('M','Y','D') NOT NULL DEFAULT 'Y' COMMENT 'M=month, Y=year, D=day',
  `min_salary` int(10) DEFAULT NULL,
  `max_salary` int(10) DEFAULT NULL,
  `sal_type` enum('M','Y') NOT NULL DEFAULT 'Y' COMMENT 'M=month, Y=year',
  `key_skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`key_skills`)),
  `description` text DEFAULT NULL,
  `appln_deadline` date DEFAULT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id`, `emp_id`, `department`, `title`, `address`, `city`, `state`, `pincode`, `job_type`, `exp_from`, `exp_to`, `exp_type`, `min_salary`, `max_salary`, `sal_type`, `key_skills`, `description`, `appln_deadline`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'HR Department', 'HR Intern', 'Mohali, Punjab', NULL, NULL, NULL, 3, 0, 6, 'M', 4000, 7000, 'M', '\"Hiring,Accusition\"', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-08-17', 'A', '2025-08-12 06:15:32', NULL),
(2, 9, 'HR Department', 'HR Intern', 'Patiala, Punjab', NULL, NULL, NULL, 3, 0, 6, 'M', 4000, 7000, 'M', '\"Hiring,Accusition\"', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2025-08-14', 'A', '2025-08-12 06:15:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobtype`
--

CREATE TABLE `tbl_jobtype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobtype`
--

INSERT INTO `tbl_jobtype` (`id`, `name`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Internship'),
(4, 'Contract'),
(5, 'Freelance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_experience`
--

CREATE TABLE `tbl_job_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `work_title` varchar(255) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `last_working_dt` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_job_experience`
--

INSERT INTO `tbl_job_experience` (`id`, `user_id`, `company_name`, `work_title`, `start_dt`, `last_working_dt`, `description`, `created_at`, `updated_at`) VALUES
(10, 7, 'Veritos Infosolutions Pvt Ltd', 'Senior Web Developer', '2022-03-01', '2024-08-13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2025-08-13 12:56:42', '2025-08-13 12:56:42'),
(11, 7, 'Phoenix advance softwares Pvt Ltd', 'Web Developer Intern', '2021-08-14', '2022-02-22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2025-08-13 12:56:42', '2025-08-13 12:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`) VALUES
(1, 'Candidate'),
(2, 'Employer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_links`
--

CREATE TABLE `tbl_social_links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link_type` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_social_links`
--

INSERT INTO `tbl_social_links` (`id`, `user_id`, `link_type`, `link`, `created_at`, `updated_at`) VALUES
(11, 7, 'LinkedIn', 'https://www.linkedin.com/feed/', '2025-08-14 08:32:32', '2025-08-14 08:32:32'),
(12, 7, 'Twitter', 'https://x.com', '2025-08-14 08:32:32', '2025-08-14 08:32:32'),
(13, 7, 'Instagram', 'https://www.instagram.com/', '2025-08-14 08:32:32', '2025-08-14 08:32:32'),
(14, 7, 'Facebook', 'https://www.facebook.com/', '2025-08-14 08:32:32', '2025-08-14 08:32:32'),
(15, 7, 'Youtube', 'https://youtube.com/', '2025-08-14 08:32:32', '2025-08-14 08:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_enclosures`
--

CREATE TABLE `tbl_user_enclosures` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_type` varchar(100) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_enclosures`
--

INSERT INTO `tbl_user_enclosures` (`id`, `user_id`, `doc_type`, `document`, `created_at`, `updated_at`) VALUES
(10, 7, 'resume', '71755158803_resume.pdf', '2025-08-14 08:06:43', '2025-08-14 08:06:43'),
(11, 7, 'experience_certificate', '71755158803_experience_certificate.docx', '2025-08-14 08:06:43', '2025-08-14 08:06:43'),
(12, 7, 'additional_certificate', '71755158803_additional_certificate.pdf', '2025-08-14 08:06:43', '2025-08-14 08:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_languages`
--

CREATE TABLE `tbl_user_languages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_languages`
--

INSERT INTO `tbl_user_languages` (`id`, `user_id`, `language`, `created_at`, `updated_at`) VALUES
(4, 7, 'English', '2025-08-14 07:11:16', '2025-08-14 07:11:16'),
(5, 7, 'Hindi', '2025-08-14 07:11:16', '2025-08-14 07:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_qualification`
--

CREATE TABLE `tbl_user_qualification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `col_uni_name` varchar(255) DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `last_study_year` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_qualification`
--

INSERT INTO `tbl_user_qualification` (`id`, `user_id`, `qualification`, `col_uni_name`, `start_year`, `last_study_year`, `description`, `created_at`, `updated_at`) VALUES
(6, 7, 'Bachelor\'s of Computer Applications', 'Rajasthan Swayat Shasan Mahavidyalaya', '2016', '2019', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2025-08-13 13:06:02', '2025-08-13 13:06:02'),
(7, 7, '12th', 'Kendriya Vidyalaya No.1, Jaipur', '2014', '2015', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2025-08-13 13:06:02', '2025-08-13 13:06:02'),
(8, 7, '10th', 'Kendriya Vidyalaya No.1, Jaipur', '2012', '2013', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2025-08-13 13:06:02', '2025-08-13 13:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_skills`
--

CREATE TABLE `tbl_user_skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `percent` tinyint(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_skills`
--

INSERT INTO `tbl_user_skills` (`id`, `user_id`, `skills`, `percent`, `created_at`, `updated_at`) VALUES
(6, 7, 'PHP', 70, '2025-08-13 18:32:37', '2025-08-13 18:32:37'),
(7, 7, 'Laravel', 40, '2025-08-13 18:32:37', '2025-08-13 18:32:37'),
(8, 7, 'Codeigniter', 60, '2025-08-13 18:32:37', '2025-08-13 18:32:37'),
(9, 7, 'MySQL', 60, '2025-08-13 18:32:37', '2025-08-13 18:32:37'),
(10, 7, 'Javascript', 40, '2025-08-13 18:32:37', '2025-08-13 18:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `mobile_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2') NOT NULL COMMENT '1=Candidate, 2=Employer',
  `is_profile_updated` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `mobile_verified_at`, `password`, `role`, `is_profile_updated`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Bhuvan Gupta', 'bhuvan.veritos@gmail.com', NULL, '8118879069', NULL, '$2y$12$BeKkQ4oJuEPAxGf3AoLysOUxg6rUTgMdD6rh2rZ6Uw1h7hVRmN7cW', '1', '2025-08-14 08:32:32', NULL, '2025-07-27 09:19:00', '2025-07-27 09:19:00'),
(9, 'Gourav Mahipal', 'gourav@veritos.in', NULL, '8882373333', NULL, '$2y$12$M/2WgxOAoffMqeM.uFAxM.eksBrjaX5.M0iQ2T8VaXxUt9XAp9CaW', '2', NULL, NULL, '2025-08-06 15:27:37', '2025-08-06 15:27:37'),
(10, 'Bhuvan Gupta new', 'bhuvangupta8197@gmail.com', NULL, '7877258521', NULL, '$2y$12$pH5nyuZH/lUSNhHQkuyGr./1ACs3i6yBJQJ/B.Zx/aoInlVYhf5vq', '2', NULL, NULL, '2025-08-12 06:01:13', '2025-08-12 06:01:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_award_certificate`
--
ALTER TABLE `tbl_award_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_candidate_profile`
--
ALTER TABLE `tbl_candidate_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_candidate_profile_status`
--
ALTER TABLE `tbl_candidate_profile_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employer_profile`
--
ALTER TABLE `tbl_employer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employer_type`
--
ALTER TABLE `tbl_employer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobtype`
--
ALTER TABLE `tbl_jobtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_experience`
--
ALTER TABLE `tbl_job_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_enclosures`
--
ALTER TABLE `tbl_user_enclosures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_languages`
--
ALTER TABLE `tbl_user_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_qualification`
--
ALTER TABLE `tbl_user_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_skills`
--
ALTER TABLE `tbl_user_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_award_certificate`
--
ALTER TABLE `tbl_award_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_candidate_profile`
--
ALTER TABLE `tbl_candidate_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_candidate_profile_status`
--
ALTER TABLE `tbl_candidate_profile_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employer_profile`
--
ALTER TABLE `tbl_employer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employer_type`
--
ALTER TABLE `tbl_employer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jobtype`
--
ALTER TABLE `tbl_jobtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_job_experience`
--
ALTER TABLE `tbl_job_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user_enclosures`
--
ALTER TABLE `tbl_user_enclosures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_languages`
--
ALTER TABLE `tbl_user_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_qualification`
--
ALTER TABLE `tbl_user_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user_skills`
--
ALTER TABLE `tbl_user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
