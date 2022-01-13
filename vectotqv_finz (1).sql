-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 04:40 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vectotqv_finz`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `external_bussiness_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `external_bussiness_id`, `company_name`, `country`) VALUES
(1, 'AXN78945', 'services3', 'EG'),
(2, 'AXN789455', 'Services2', 'EG'),
(3, 'AXN789456', 'FRINZ Company', 'NG'),
(4, 'AXN78945599', 'Services4', 'EG'),
(5, 'AIG14360', 'SERVICES', 'NG'),
(6, 'JMS34210', 'TESTCOMPANY', 'NG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `sa_id` int(11) NOT NULL,
  `sau_name` varchar(200) NOT NULL,
  `sau_pwd` varchar(256) NOT NULL,
  `sau_isactive` tinyint(1) NOT NULL,
  `role` varchar(50) NOT NULL,
  `sau_FName` varchar(125) NOT NULL,
  `sau_LName` varchar(125) NOT NULL,
  `sau_PhoneNo` varchar(50) DEFAULT NULL,
  `sau_EntryDate` datetime NOT NULL,
  `mofied_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user_address` text,
  `user_type` tinyint(4) NOT NULL COMMENT '0:admin, 1:EXE, 2: Finance',
  `country` varchar(20) DEFAULT NULL,
  `bank` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL COMMENT '0:not_active, 1: active',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`sa_id`, `sau_name`, `sau_pwd`, `sau_isactive`, `role`, `sau_FName`, `sau_LName`, `sau_PhoneNo`, `sau_EntryDate`, `mofied_at`, `user_address`, `user_type`, `country`, `bank`, `is_active`, `created_at`) VALUES
(1, 'admin', '$2y$10$xK6CDTS8ZMyO6n/YUm/czOdbZzUcMkis1zoO6sN.25J9pKw99ijQC', 1, 'S Admin', 'admin', '', '', '0000-00-00 00:00:00', '2020-03-24 18:16:08', NULL, 0, NULL, '', 1, '0000-00-00 00:00:00'),
(2, 'imageconcerns@gmail.com', '$2y$10$xK6CDTS8ZMyO6n/YUm/czOdbZzUcMkis1zoO6sN.25J9pKw99ijQC', 0, 'S Admin', 'admin', '', '', '0000-00-00 00:00:00', '2020-03-24 18:11:25', '', 1, NULL, 'GTB', 1, '2019-01-24 00:00:00'),
(3, 'testuser@gmail.com', '$2y$10$eKyBGmaqSKvnT533bqwVauINzm69XKNRrg6YUitZXUeRD/KQiKJqu', 0, '', 'Test user', '', '', '0000-00-00 00:00:00', '2020-05-05 18:49:19', '', 1, NULL, '', 1, '2019-03-08 00:00:00'),
(21, 'test@gmail.com', '$2y$10$EWIwHFdh5MPHKo5Hsgu5Y.IDf2UAMZebYNycO1K6Z7vi4adN8Zoze', 0, '', 'test test', '', '', '0000-00-00 00:00:00', '2020-05-05 21:24:33', '', 2, 'NG', '', 1, '2020-05-06 00:00:00'),
(22, 'exctest@gmail.com', '$2y$10$W65eubowO.Yd./GgqkZcheF0SEAbRIazq96Z.adnmjFYPWJF5d1n.', 0, '', 'exctest', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'EG', '', 1, '2020-05-06 00:00:00'),
(23, 'teste@teste.com', '$2y$10$M3r37Bb7eTz6QnLB7bN4weKSWWf7AjYKtJoIVgnlPAuVq3mupK2aG', 0, '', '; select  * from users', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'ES', '', 1, '2020-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `remittance_type` varchar(100) NOT NULL,
  `remittance_amount` float NOT NULL,
  `remittance_status` varchar(100) NOT NULL,
  `creator` int(11) NOT NULL,
  `statement_id` varchar(255) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`id`, `tracking_number`, `country`, `company`, `remittance_type`, `remittance_amount`, `remittance_status`, `creator`, `statement_id`, `create_at`) VALUES
(10, 'MPDS-102342', 'NG', 'JMS34210', 'Delivered', 1000, 'Remitted', 1, '755488931', '2020-05-05 18:10:49'),
(11, 'MPDS-102343', 'NG', 'JMS34210', 'Lost', 7000, 'Remitted', 1, '755488931', '2020-05-05 18:10:49'),
(8, 'DS-02F-373286967-9570', 'NG', 'AIG14360', 'Delivered', 2000, 'Remitted', 1, NULL, '2020-05-05 08:04:02'),
(12, '1234567890', 'NG', 'JMS34210', 'Delivered', 1000, 'Remitted', 1, NULL, '2020-05-06 15:49:38'),
(9, 'JE-00D-353196967-9532', 'NG', 'AIG14360', 'Lost', 9000, 'Remitted', 1, '739844076', '2020-05-05 08:04:02'),
(13, '12345678905', 'NG', 'JMS34210', 'Delivered', 1000, 'Remitted', 1, NULL, '2020-05-06 15:51:08'),
(14, '1.23457E+11', 'NG', 'JMS34210', 'Delivered', 1000, 'Remitted', 1, NULL, '2020-05-06 15:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remittance`
--

CREATE TABLE `tbl_remittance` (
  `id` int(11) NOT NULL,
  `statement_id` varchar(100) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `remittace_amount` float NOT NULL,
  `remittance_type` varchar(100) DEFAULT NULL,
  `remittance_status` varchar(100) NOT NULL DEFAULT 'Not Remitted',
  `payment_reference` varchar(200) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `payment_editor` int(11) DEFAULT NULL,
  `payment_edit_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_remittance`
--

INSERT INTO `tbl_remittance` (`id`, `statement_id`, `country`, `company`, `remittace_amount`, `remittance_type`, `remittance_status`, `payment_reference`, `payment_date`, `creator`, `create_at`, `payment_editor`, `payment_edit_at`) VALUES
(5, '980903552', 'NG', 'AXN789455', 0, 'Delivered', 'Remitted', 'testtestpayment', '2020-05-04', 1, '2020-05-05 20:57:55', 21, '2020-05-06 01:43:29'),
(4, '739844076', 'NG', 'AIG14360', 0, '', 'Remitted', '1234gbf5563', '2020-05-05', 1, '2020-05-05 13:42:38', 1, '2020-05-05 21:05:38'),
(6, '755488931', 'NG', 'JMS34210', 0, '', 'Remitted', 'newtest0012345', '2020-05-01', 1, '2020-05-05 23:42:15', 1, '2020-05-05 23:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Tier`
--

CREATE TABLE `tbl_Tier` (
  `id` int(10) NOT NULL,
  `Tier_Name` varchar(255) NOT NULL,
  `Weight` varchar(10) NOT NULL,
  `Amount` int(255) NOT NULL,
  `Created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `external_bussiness_id` (`external_bussiness_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`);

--
-- Indexes for table `tbl_remittance`
--
ALTER TABLE `tbl_remittance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statement_id` (`statement_id`);

--
-- Indexes for table `tbl_Tier`
--
ALTER TABLE `tbl_Tier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_remittance`
--
ALTER TABLE `tbl_remittance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
