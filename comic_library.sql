-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 04:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comic_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_id` tinyint(3) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter` smallint(5) UNSIGNED DEFAULT NULL,
  `reading_status` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`note`)),
  `rating` decimal(5,1) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`id`, `user_id`, `title`, `url_id`, `slug`, `chapter`, `reading_status`, `note`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SSS-Class Suicide Hunter', 1, 'sss-class-suicide-hunter', 81, 'Stacked', '[\"never read in alphascans, grammar\'s fucked\"]', '4.9', '2022-06-22 16:00:00', '2022-07-15 03:29:07', NULL),
(2, 1, 'Return of the Frozen Player', 1, 'return-of-the-frozen-player-manhwa', 50, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(3, 1, 'Dungeon Reset', 1, 'dungeon-reset', 129, 'Reading', '[]', '4.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(4, 1, 'The S-Classes That I Raised', 1, 'the-s-classes-that-i-raised', 48, 'Stacked', '[\"never read in asurascans, grammar\'s fucked\"]', '5.0', '2022-06-22 16:00:00', '2022-08-09 08:32:39', NULL),
(5, 1, 'Nano Machine', 1, 'nano-machine', 118, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-08-11 11:12:38', NULL),
(6, 1, 'Is this Hunter for Real?', 1, 'is-this-hunter-for-real', 34, 'Reading', '[]', '4.5', '2022-06-22 16:00:00', '2022-07-24 07:58:54', NULL),
(7, 1, 'Return To Player', 1, 'return-to-player', 83, 'Reading', '[]', '4.8', '2022-06-22 16:00:00', '2022-07-12 03:47:03', NULL),
(8, 1, 'God of Blackfield', 1, 'god-of-blackfield', 134, 'Stacked', '[]', '4.7', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(9, 1, 'Volcanic Age', 1, 'volcanic-age', 212, 'Reading', '[\"luminous scan\'s is fucked, never try to read it there again\"]', '5.0', '2022-06-22 16:00:00', '2022-07-27 09:23:34', NULL),
(10, 1, 'Surviving in an Action Manhwa', 1, 'surviving-in-an-action-manhwa', 20, 'Stacked', '[]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(11, 1, 'Swordmaster\'s Youngest Son - Manhwa', 1, 'swordmasters-youngest-son-manhwa', 31, 'Stacked', '[]', '4.3', '2022-06-22 16:00:00', '2022-07-24 02:48:40', NULL),
(12, 1, 'Overgeared', 1, 'overgeared', 141, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-08-13 07:17:01', NULL),
(13, 1, 'Leveling With The Gods', 1, 'leveling-with-the-gods-manhwa', 62, 'Reading', '[]', '4.9', '2022-06-22 16:00:00', '2022-08-09 20:35:24', NULL),
(14, 1, 'Dungeons & Artifacts', 1, 'dungeons-and-artifacts', 77, 'Reading', '[]', '4.6', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(15, 1, 'The Tutorial is Too Hard', 1, 'the-tutorial-is-too-hard-manhwa', 69, 'Reading', '[\"confusing af, keeps jumping from actual present to flashbacks with little to no notice smh\"]', '4.8', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(16, 1, 'The Great Mage that Returned after 4000 Years', 1, 'the-great-mage-that-returned-after-4000-years', 133, 'Reading', '[]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(17, 1, 'The Challenger', 1, 'the-challenger', 39, 'Reading', '[]', '4.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(18, 1, 'Archmage Streamer', 1, 'archmage-streamer', 45, 'Reading', '[]', '4.7', '2022-06-22 16:00:00', '2022-07-18 04:35:36', NULL),
(19, 1, 'The Hero Returns', 1, 'the-hero-returns', 35, 'Reading', '[\"ugh\",\"consider dropping lmao\"]', '3.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(20, 1, 'Arcane Sniper', 1, 'arcane-sniper', 82, 'On Hold', '[\"consider dropping\", \"it\'s so fucking shit at this point\"]', '3.0', '2022-06-22 16:00:00', '2022-07-29 02:42:05', NULL),
(21, 1, 'Seoul Station Druid', 1, 'seoul-station-druid', 64, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-20 06:55:03', NULL),
(22, 1, 'Player from Today Onwards', 1, 'player-from-today-onwards', 46, 'Stacked', '[]', '4.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(23, 1, 'Foreigner on the Periphery', 1, 'foreigner-on-the-periphery', 13, 'Stacked', '[\"stack, ends with cliffhanger\"]', '4.8', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(24, 1, 'Regressor Instruction Manual', 1, 'regressor-instruction-manual', 23, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(25, 1, 'Dungeon House', 1, 'dungeon-house', 24, 'Reading', '[]', '4.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(26, 1, 'The Healing Priest of the Sun', 1, 'the-healing-priest-of-the-sun', 32, 'Reading', '[\"lol boring\"]', '3.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(27, 1, 'I Became the Male Lead\'s Adopted Daughter', 2, '91489', 51, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(28, 1, 'Touch My Little Brother and You\'re Dead [Official]', 2, '90543', 51, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(29, 1, 'Chitra', 2, '77717', 138, 'Stacked', '[\"stack since every chapter is short\"]', '4.8', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(30, 1, 'I\'ll Just Live on as a Villainess', 2, '84970', 39, 'Stacked', '[\"bato.to/series/92998/ (official) > check this also if there\'s updates\"]', '5.0', '2022-06-22 16:00:00', '2022-07-25 11:51:46', NULL),
(31, 1, 'I Have No Health', 2, '90754', 41, 'Stacked', '[\"stack since every end is cliffhanger\"]', '4.7', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(32, 1, 'The Viridescent Crown (Salty Scans Version)', 2, '95971', 72, 'Reading', '[]', '4.9', '2022-06-22 16:00:00', '2022-08-09 20:11:30', NULL),
(33, 1, 'Another Typical Fantasy Romance', 2, '96753', 47, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-08-05 04:46:12', NULL),
(34, 1, 'Lady Chef Royale', 2, '80362', 53, 'Reading', '[\"(chapter 49)season 2 almost made me dropped this because of personality change of fl smh\"]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(35, 1, 'The Legendary Beasts Animal Hospital (Official)', 2, '91940', 44, 'Reading', '[]', '4.7', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(36, 1, 'I Became the Villain\'s Contract Family [Salty witches co.]', 2, '97884', 30, 'Stacked', '[\"stack since every chapter is short\"]', '4.4', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(37, 1, 'I Became the Wife of the Monstrous Crown Prince', 2, '85907', 58, 'Reading', '[]', '4.9', '2022-06-22 16:00:00', '2022-08-09 20:11:18', NULL),
(38, 1, 'Say Ah, the Golden Spoon Is Entering (Princess Alliance)', 2, '88147', 41, 'Reading', '[\"also princess alliance dropped it, sadge\"]', '3.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(39, 1, 'How to Be a Dark Hero\'s Daughter', 2, '90350', 41, 'Stacked', '[\"stack since every chapter is short\"]', '4.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(40, 1, 'My Family is Obsessed with Me', 2, '97568', 17, 'Stacked', '[\"stack since every chapter is short\"]', '4.6', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(41, 1, 'Éminence Grise Female Lead Is Trying to Make Me Her Stepmom (Princess Alliance)', 2, '85153', 23, 'Reading', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(42, 1, 'The Villainess\'s Days Are Numbered! (Official)', 2, '94610', 31, 'Reading', '[]', '4.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(43, 1, 'A Wicked Tale of Cinderella\'s Stepmom', 2, '81532', 79, 'Reading', '[]', '4.8', '2022-06-22 16:00:00', '2022-07-25 11:54:32', NULL),
(44, 1, 'I\'m Worried that My Brother is Too Gentle', 2, '101103', 30, 'Reading', '[\"bato.to/series/94717 (sugar babies are not uploading anymore)\"]', '4.2', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(45, 1, 'A Red Knight Does Not Blindly Follow Money', 2, '88091', 28, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-12 11:36:01', NULL),
(46, 1, 'The Youngest Princess', 2, '79488', 105, 'Reading', '[]', '4.3', '2022-06-22 16:00:00', '2022-07-25 11:53:47', NULL),
(47, 1, 'The Evil Lady\'s Hero', 2, '80052', 88, 'Reading', '[\"Waiting for after end specials\"]', '4.7', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(48, 1, 'Beware the Villainess! (Official)', 2, '83606', 93, 'Reading', '[\"Waiting for after end specials\"]', '4.8', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(49, 1, 'A Single Round at Romance is Enough! (Official)', 2, '100364', 20, 'Reading', '[]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(50, 1, 'Father, I Don\'t Want this Marriage', 2, '83381', 33, 'Reading', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(51, 1, 'As You Wish, Prince', 2, '74247', 23, 'Reading', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(52, 1, 'I Became the Hero\'s Mom', 2, '83866', 42, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(53, 1, 'The Tyrant\'s Guardian is an Evil Witch', 2, '83151', 28, 'Reading', '[]', '3.8', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(54, 1, 'The Lady Wants to Rest [Bored Corona Kids version]', 2, '84538', 44, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(55, 1, 'Why She Lives as a Villainess', 2, '88548', 31, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(56, 1, 'The Villainous Princess Wants to Live in a Cookie House', 2, '87557', 43, 'Reading', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(57, 1, 'The Precious Sister of the Villainous Grand Duke', 2, '84622', 50, 'Reading', '[\"ugh\",\"she\'s playing herself smh what a moron\",\"typical isekai bullshit\"]', '3.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(58, 1, 'Today the Villainess Has Fun Again', 2, '91930', 31, 'Reading', '[\"ugh\",\"the ml is the fucking kid smh cringe\",\"webtoon for women with shotacon fetish ew\"]', '3.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(59, 1, 'The Wicked Little Princess', 2, '95981', 35, 'Reading', '[\"she became unnecessarily arrogant\"]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(60, 1, 'The Lady\'s Butler', 2, '79916', 46, 'Reading', '[]', '0.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(61, 1, 'Empress? Empress!', 2, '78242', 70, 'Reading', '[]', '3.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(62, 1, 'You Can\'t Change a Person! (Official)', 2, '86968', 23, 'Reading', '[]', '3.7', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(63, 1, 'I Choose the Emperor Ending', 2, '76421', 76, 'On Hold', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(64, 1, 'The Lady Tames the Swordmaster', 2, '87689', 22, 'Plan To Read', '[]', '3.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(65, 1, 'Villain To The Rescue!', 2, '87597', 14, 'Reading', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-25 11:54:16', NULL),
(66, 1, 'Spirit Farmer', 3, 'spirit-farmer', 99, 'Stacked', '[\"stack because it\'s not enough\"]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(67, 1, 'My Daughter is the Final Boss', 3, 'my-daughter-is-the-final-boss', 38, 'Stacked', '[\"stack because it\'s not enough\"]', '5.0', '2022-06-22 16:00:00', '2022-08-06 05:36:19', NULL),
(68, 1, 'The Constellation that Returned from Hell', 3, 'the-constellation-that-returned-from-hell', 91, 'Stacked', '[\"stack because it\'s short af\"]', '4.9', '2022-06-22 16:00:00', '2022-08-11 11:53:48', NULL),
(69, 1, 'Reincarnation of the Suicidal Battle God', 3, 'reincarnation-of-the-suicidal-battle-god', 59, 'Reading', '[]', '4.9', '2022-06-22 16:00:00', '2022-07-24 02:49:06', NULL),
(70, 1, 'Death Is the Only Ending for the Villainess', 3, 'death-is-the-only-ending-for-the-villainess', 93, 'Stacked', '[\"stack because it\'s not enough\"]', '5.0', '2022-06-22 16:00:00', '2022-07-25 05:54:16', NULL),
(71, 1, 'Solo Max-Level Newbie', 3, 'solo-max-level-newbie', 58, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-22 14:53:02', NULL),
(72, 1, 'The Tutorial Tower of the Advanced Player', 3, 'the-tutorial-tower-of-the-advanced-player', 123, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-29 02:42:40', NULL),
(73, 1, 'Worn and Torn Newbie', 3, 'worn-and-torn-newbie', 105, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-08-09 12:56:23', NULL),
(74, 1, 'The Max Level Hero has Returned!', 3, 'the-max-level-hero-has-returned', 97, 'Reading', '[]', '4.8', '2022-06-22 16:00:00', '2022-08-05 18:18:22', NULL),
(75, 1, 'Return of the Mount Hua Sect', 3, 'return-of-the-mount-hua-sect', 73, 'Stacked', '[\"stack because it\'s not enough\"]', '5.0', '2022-06-22 16:00:00', '2022-07-13 07:31:40', NULL),
(76, 1, 'Seoul Station Necromancer', 1, 'seoul-station-necromancer', 56, 'Reading', '[]', '4.8', '2022-06-22 16:00:00', '2022-08-05 21:04:49', NULL),
(77, 1, 'How To Live As a Villain', 3, 'how-to-live-as-a-villain', 47, 'On Hold', '[]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(78, 1, 'Murim Login', 3, 'murim-login', 118, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(79, 1, 'The Dark Magician Transmigrates After 66666 Years', 3, 'the-dark-magician-transmigrates-after-66666-years', 58, 'Stacked', '[\"stack because author likes to force things smh\"]', '4.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(80, 1, 'The Return of the Crazy Demon', 3, 'the-return-of-the-crazy-demon', 53, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(81, 1, 'Return of the Disaster-Class Hero', 3, 'return-of-the-disaster-class-hero', 48, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-08-11 04:53:51', NULL),
(82, 1, 'Duke Pendragon', 3, 'duke-pendragon', 46, 'Stacked', '[\"stack\"]', '4.8', '2022-06-22 16:00:00', '2022-07-20 06:55:12', NULL),
(83, 1, 'Legendary Youngest Son of the Marquis House (Manhwa)', 3, 'legendary-youngest-son-of-the-marquis-house-manhwa', 42, 'Stacked', '[\"stack because it\'s short as shit\"]', '5.0', '2022-06-22 16:00:00', '2022-08-11 04:54:35', NULL),
(84, 1, 'Doctor\'s Rebirth', 3, 'doctors-rebirth', 92, 'Reading', '[]', '4.6', '2022-06-22 16:00:00', '2022-07-23 17:07:33', NULL),
(85, 1, 'Reformation of the Deadbeat Noble', 3, 'reformation-of-the-deadbeat-noble', 59, 'Stacked', '[\"stack because  it ends with shit ass cliff hanger\"]', '4.7', '2022-06-22 16:00:00', '2022-07-24 02:49:22', NULL),
(86, 1, 'To Hell With Being A Saint, I\'m A Doctor', 3, 'to-hell-with-being-a-saint-im-a-doctor', 30, 'Stacked', '[\"ehhh so much cliffhanging bullshit\"]', '4.3', '2022-06-22 16:00:00', '2022-08-05 18:14:46', NULL),
(87, 1, 'Talent-Swallowing Magician', 3, 'talent-swallowing-magician', 41, 'Stacked', '[\"stack because it\'s short as shit\"]', '4.5', '2022-06-22 16:00:00', '2022-08-09 20:59:40', NULL),
(88, 1, 'The Lord\'s Coins Aren\'t Decreasing?!', 3, 'the-lords-coins-arent-decreasing', 74, 'Stacked', '[\"stack because it ends with shit ass cliff hanger\"]', '4.7', '2022-06-22 16:00:00', '2022-08-09 12:55:33', NULL),
(89, 1, 'The Newbie is Too Strong', 3, 'the-newbie-is-too-strong', 29, 'Stacked', '[]', '4.5', '2022-06-26 16:00:00', '2022-08-09 08:34:18', NULL),
(90, 1, 'I Reincarnated As The Crazed Heir', 3, 'i-reincarnated-as-the-crazed-heir', 54, 'Reading', '[]', '4.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(91, 1, 'Street Restaurant of a Returned Hero', 3, 'street-restaurant-of-a-returned-hero', 28, 'On Hold', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(92, 1, 'Worthless Regression', 3, 'worthless-regression', 22, 'On Hold', '[\"ugh\"]', '3.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(93, 1, 'Return of the 8th Class Magician', 3, 'return-of-the-8th-class-magician', 63, 'Stacked', '[\"kinda became a meh? idk\"]', '4.0', '2022-06-22 16:00:00', '2022-07-18 04:29:46', NULL),
(94, 1, 'Return Of The Shattered Constellation', 3, 'return-of-the-shattered-constellation', 38, 'Reading', '[\"nice art, not story\"]', '3.5', '2022-06-22 16:00:00', '2022-07-12 03:47:50', NULL),
(95, 1, 'Taming Master', 3, '1649969363-taming-master', 68, 'On Hold', '[]', '2.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(96, 1, 'Path of the Shaman', 3, 'path-of-the-shaman', 41, 'On Hold', '[]', '0.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(97, 1, 'Maxed Out Leveling', 3, 'maxed-out-leveling', 54, 'On Hold', '[\"beware: cliffhanging galore\"]', '3.5', '2022-06-22 16:00:00', '2022-07-24 07:58:27', NULL),
(98, 1, 'Heavenly Demon Instructor', 3, 'heavenly-demon-instructor', 40, 'On Hold', '[\"cliffhanging piece of shit smh\",\"ugh\",\"consider dropping, not good to mental health tbh\"]', '2.6', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(99, 1, 'SSS-Class Gacha Hunter', 3, 'sss-class-gacha-hunter', 14, 'On Hold', '[]', '3.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(100, 1, 'Sleeping Ranker', 3, 'sleeping-ranker', 39, 'Stacked', '[]', '5.0', '2022-07-03 16:00:00', '2022-07-25 05:54:01', NULL),
(101, 1, 'Omniscient Reader\'s Viewpoint', 4, 'omniscient-readers-viewpoint', 115, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(102, 1, 'Heavenly Demon Cultivation Simulation', 4, 'heavenly-demon-cultivation-simulation', 46, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-15 03:28:48', NULL),
(103, 1, 'The Villainess is a Marionette', 4, 'the-villainess-is-a-marionette', 59, 'Reading', '[\"DMCA\'ed\"]', '4.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(104, 1, 'Solo Necromancy', 4, 'solo-necromancy', 50, 'Stacked', '[]', '4.7', '2022-06-22 16:00:00', '2022-07-15 03:27:48', NULL),
(105, 1, 'Reincarnation of the Murim Clan\'s Former Ranker', 4, 'reincarnation-of-the-murim-clans-former-ranker', 54, 'Reading', '[]', '4.5', '2022-06-22 16:00:00', '2022-07-15 03:27:17', NULL),
(106, 1, 'A Returner\'s Magic Should Be Special', 5, 'a-returners-magic-should-be-special', 195, 'Reading', '[\"DMCA\'ed\",\"flamesccans dropped it because of dmca, picked up by luminous\"]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(107, 1, 'A Stepmother\'s Märchen', 2, '83291', 69, 'Reading', '[\"flamescans dropped it because of official tls\"]', '4.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(108, 1, 'FFF-Class Trash Hero', 5, 'fff-class-trash-hero', 110, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(109, 1, 'Trash of the Count\'s Family', 3, 'trash-of-the-counts-family', 92, 'Stacked', '[\"stack because it ends with shit ass cliff hanger and also short as shit\",\n                    \"collaboration of alphascans and asurascans so check the alphascans if asura ain\'t uploading\"]', '5.0', '2022-06-22 16:00:00', '2022-07-29 02:42:52', NULL),
(110, 1, 'Mercenary Enrollment', 1, 'mercenary-enrollment', 97, 'Stacked', '[\"if not stacked, read in luminousscans because they upload fast but grammar is ight\"]', '4.8', '2022-06-22 16:00:00', '2022-08-09 19:36:04', NULL),
(111, 1, 'MEMORIZE', 5, 'memorize', 101, 'Stacked', '[\"stack because it ends with shit ass cliff hanger and also short as shit\"]', '4.5', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(112, 1, 'My Dad Is Too Strong', 5, 'my-dad-is-so-powerful', 95, 'Stacked', '[\"stack just because\"]', '4.3', '2022-06-22 16:00:00', '2022-08-05 19:42:38', NULL),
(113, 1, 'The Live', 3, 'the-live', 92, 'On Hold', '[\"nice art and story but shit action and script considering that\'s somewhat the hightlight too smh\",\n                    \"consider dropping\"]', '1.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(114, 1, 'Book Eater', 9, 'book-eater', 34, 'On Hold', '[]', '3.6', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(115, 1, 'I\'m Only A Stepmother, But My Daughter Is Just So Cute! ', 6, 'im-the-stepmother-but-my-daughter-is-too-cute', 71, 'Reading', '[]', '4.6', '2022-06-22 16:00:00', '2022-08-05 08:19:24', NULL),
(116, 1, 'I\'m A Martial Art Villainess But I\'m The Strongest!', 6, 'im-a-martial-art-villainess-but-im-the-strongest', 37, 'Plan To Read', '[]', '0.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(117, 1, 'I Tamed a Tyrant and Ran Away', 6, 'i-tamed-a-tyrant-and-ran-away', 41, 'Plan To Read', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(118, 1, 'Not Just Anybody Can Become a Villainess', 6, 'not-just-anybody-can-become-a-villainess', 25, 'Plan To Read', '[]', '0.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(119, 1, 'Reader', 7, 'reader', 155, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(120, 1, 'A.i Doctor', 7, 'a-i-doctor', 67, 'Reading', '[]', '4.4', '2022-06-22 16:00:00', '2022-07-19 19:38:13', NULL),
(121, 1, 'Trapped in a Webnovel as a Good for Nothing', 8, '1645401723-trapped-in-a-webnovel-as-a-good-for-nothing', 106, 'Stacked', '[\"asurascans x alphascans collab so if this url still has no updates, check asura\"]', '4.6', '2022-06-22 16:00:00', '2022-08-10 06:09:21', NULL),
(122, 1, 'Ranker\'s Return (Remake)', 1, 'rankers-return', 69, 'Reading', '[\"alphascans tl is shit because they\'re not consistent with character names smh\"]', '4.5', '2022-06-22 16:00:00', '2022-08-09 19:46:19', NULL),
(123, 1, 'Kill The Hero', 8, 'kill-the-hero', 101, 'Reading', '[\"alphascans tl is bearable but if you want legit good shit, check reaperscans\"]', '4.4', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(124, 1, 'Reincarnated as a Legendary Surgeon', 8, 'i-reincarnated-as-a-legendary-surgeon', 47, 'Stacked', '[\"stack because it\'s cliff hanger and SHORT AS SHIT\"]', '4.6', '2022-06-22 16:00:00', '2022-08-09 08:27:31', NULL),
(125, 1, 'The Immortal Emperor Luo Wuji Has Returned', 8, 'the-immortal-emperor-luo-wuji-has-returned', 138, 'Stacked', '[\"stack because it\'s cliff hanger and short as shit\"]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(126, 1, 'The Descent of the Demonic Master', 8, '1644105722-the-descent-of-the-demonic-master', 142, 'Reading', '[]', '3.9', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(127, 1, 'The Gamer', 9, 'the-gamer', 433, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-25 13:55:02', NULL),
(128, 1, 'The Scholarly Reincarnation', 9, 'the-scholarly-reincarnation', 199, 'Reading', '[]', '4.4', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(129, 1, 'I Will Make an Attempt to Change the Genre', 10, 'time-to-change-the-genre', 55, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-08-05 08:19:01', NULL),
(130, 1, 'Leveling Up, by Only Eating!', 11, 'i-level-up-by-eating', 110, 'Reading', '[\"pmscans/rackusreader is fucking shit but they\'re the official english tl now smh\"]', '4.0', '2022-06-22 16:00:00', '2022-08-05 04:57:27', NULL),
(131, 1, 'Tales of Demons and Gods', 12, 'tales-of-demons-and-gods', 390, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-27 09:26:03', NULL),
(132, 1, 'Second Life Ranker', 13, 'second-life-ranker', 127, 'Reading', '[]', '4.5', '2022-06-22 16:00:00', '2022-07-27 09:23:51', NULL),
(133, 1, 'Forced to Become the Villainous Son-in-law', 14, '18032', 92, 'Plan To Read', '[]', '0.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(134, 1, 'Goblin Slayer', 14, '15987', 73, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 08:44:38', NULL),
(135, 1, 'Goblin Slayer: Side Story Year One', 14, '16151', 73, 'Reading', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 08:44:41', NULL),
(136, 1, 'I\'m Just an Immortal', 15, 'im-just-an-immortal', 58, 'Reading', '[]', '0.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(137, 1, 'The Overachiever\'s Black Tech System Comics', 16, 'the-overachievers-black-tech-system-comics', 62, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(138, 1, 'The King\'s Avatar (reboot)', 17, 'the-king-s-avatar-reboot', 88, 'Stacked', '[]', '5.0', '2022-06-22 16:00:00', '2022-07-23 17:34:28', NULL),
(139, 1, 'Extraordinary Son-In-Law', 18, 'we923906', 62, 'Reading', '[]', '4.1', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(140, 1, 'Time Stop Brave', 19, 'hl984820', 21, 'Reading', '[]', '3.8', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(141, 1, 'Gokufuri Kyohi Shite Tesaguri Sutato! Toku-Ka Shinai Hira, Nakama To Wakarete Tabi Ni Deru', 19, 'ku987955', 28, 'Reading', '[]', '4.3', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(142, 1, 'Little Girl X Scoop X Evil Eye', 19, 'ik985467', 13, 'Reading', '[]', '4.0', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(143, 1, 'I Became a Renowned Family\'s Sword Prodigy', 3, 'i-became-a-renowned-familys-sword-prodigy', 20, 'Reading', '[\"it\'s just a revenge plot so don\'t expect anything\"]', '3.3', '2022-07-05 16:00:00', '2022-07-23 01:18:28', NULL),
(144, 1, 'My Superstar Uncle', 1, 'my-superstar-uncle', 112, 'Stacked', '[]', '5.0', '2022-07-25 10:10:56', '2022-07-25 10:10:56', NULL),
(145, 1, 'Is This Hero For Real?', 1, 'is-this-hero-for-real', 39, 'Stacked', '[]', '5.0', '2022-07-25 10:11:57', '2022-07-25 10:11:57', NULL),
(146, 1, 'I Obtained A Mythic Item - Manhwa', 1, 'i-obtained-a-mythic-item-manhwa', 14, 'Stacked', '[]', '4.2', '2022-07-25 10:30:59', '2022-07-25 10:30:59', NULL),
(147, 1, 'Academy’s Undercover Professor - Manhwa', 1, 'academys-undercover-professor-manhwa', 17, 'Stacked', '[\"stack because it\'s too damn good\"]', '5.0', '2022-07-25 10:32:14', '2022-08-05 20:02:36', NULL),
(148, 1, 'Transcension Academy', 1, 'transcension-academy', 18, 'Stacked', '[]', '4.5', '2022-07-25 10:34:48', '2022-08-11 05:24:23', NULL),
(149, 1, 'The Novel’s Extra (Remake)', 1, 'the-novels-extra', 27, 'Stacked', '[\"stack because it\'s too damn good\"]', '5.0', '2022-07-25 10:35:47', '2022-08-09 12:56:41', NULL),
(150, 1, 'Damn Reincarnation', 1, 'damn-reincarnation', 28, 'Stacked', '[]', '4.5', '2022-07-25 10:40:42', '2022-08-11 04:54:58', NULL),
(151, 1, 'I Have An Sss-rank Trait, But I Want A Normal Life', 1, 'i-have-an-sss-rank-trait-but-i-want-a-normal-life', 26, 'Stacked', '[]', '4.0', '2022-07-25 10:41:39', '2022-07-25 10:41:39', NULL),
(152, 1, 'The World After The Fall', 1, 'the-world-after-the-fall', 32, 'Stacked', '[\"stack because it\'s short as shit\"]', '4.0', '2022-07-25 10:42:30', '2022-07-25 10:42:30', NULL),
(153, 1, 'I Am The Fated Villain', 3, 'i-am-the-fated-villain', 41, 'Stacked', '[\"stack because it\'s short as shit\"]', '4.0', '2022-07-25 10:43:09', '2022-07-25 10:43:09', NULL),
(154, 1, 'Chronicles Of The Martial God’s Return', 3, 'chronicles-of-the-martial-gods-return', 28, 'Stacked', '[\"stack because it\'s short as shit\"]', '3.5', '2022-07-25 10:44:00', '2022-07-25 10:44:00', NULL),
(155, 1, 'The Heavenly Demon Can’t Live A Normal Life', 3, 'the-heavenly-demon-cant-live-a-normal-life', 40, 'Stacked', '[\"stack because it\'s short as shit\"]', '3.5', '2022-07-25 10:45:14', '2022-08-10 06:08:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_06_22_234703_create_comics_table', 1),
(4, '2022_06_23_151517_create_websites_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `contact_number`, `birthday`, `gender`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gaddiel', 'Conde', '09350124876', '1999-11-28', 'Male', 'gaddiel.conde@gmail.com', '2022-07-10 02:17:19', '$2y$10$ge43ckT//DmU36srd0nmMePcTprcYzaVSLG9JTcZb1r78JHrbk3ZS', 'BSGCGpyqQh84mxuFs834uH6Np9lhTw2fDuFmCnAj0sov3Umo0cIw6U2AllQx', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL),
(2, 'Vincent', 'Duag', '09558820920', '1999-04-27', 'Male', 'estrelladuag@gmail.com', '2022-07-10 02:17:19', '$2y$10$ge43ckT//DmU36srd0nmMePcTprcYzaVSLG9JTcZb1r78JHrbk3ZS', 'OSlCMKEZ8n', '2022-06-22 16:00:00', '2022-07-10 02:17:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `url`) VALUES
(1, 'reaperscans.com/series/'),
(2, 'bato.to/series/'),
(3, 'asurascans.com/comics/'),
(4, 'flamescans.org/series/'),
(5, 'luminousscans.com/series/'),
(6, 'leviatanscans.com/hym/'),
(7, 'comicdom.org/manga/'),
(8, 'alpha-scans.org/manga/'),
(9, 'reset-scans.com/manga/'),
(10, 'gourmetscans.net/project/'),
(11, 'rackusreader.org/manga/'),
(12, 'setsuscans.com/manga/'),
(13, 'zeroscans.com/comics/'),
(14, 'readm.org/manga/'),
(15, 'mangarockteam.com/manga/'),
(16, 'mangabob.com/manga/'),
(17, 'manhuafast.com/manga/'),
(18, 'manganelo.com/manga/'),
(19, 'manganato.com/manga-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
