-- Adminer 4.8.1 MySQL 5.7.23-23 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `threads`;
CREATE TABLE `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assistant` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thread` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_msg` text COLLATE utf8_unicode_ci,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `threads` (`id`, `assistant`, `thread`, `last_msg`, `email`, `updated_at`, `verified`) VALUES
(500,	'asst_Pfl9mO2IQXN5lcMlJUwuyJzk',	'thread_Du0sLBAm7PH2f8idqlKpgC5E',	NULL,	'null',	NULL,	1),
(501,	'1234',	'1234',	NULL,	'KKK@GMAIL.COM',	NULL,	0),
(502,	'asst_Pfl9mO2IQXN5lcMlJUwuyJzk',	'thread_PDZT0ILA6AODdyyoWAh89ds8',	NULL,	'simran@tutorz.ai',	NULL,	1),
(503,	'asst_xpLeza6gXpg32Nftz6NG5Ss7',	'thread_KCGUjHEB3mvPPKIyaOmAB8ri',	NULL,	'simran@tutorz.ai',	NULL,	1),
(504,	'asst_BAZXFCyPtDugSvsDEMetlNO0',	'thread_7v1HklA8PJJccpmmQoqp2ilv',	NULL,	'simran@tutorz.ai',	NULL,	1);

-- 2024-12-10 12:33:08
