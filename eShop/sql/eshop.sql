# phpMyAdmin SQL Dump
# version 2.5.3-rc1
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Feb 13, 2005 at 02:15 AM
# Server version: 4.0.23
# PHP Version: 4.3.10-2
# 
# Database : `eshop`
# 

# --------------------------------------------------------

#
# Table structure for table `prefix_active_mod`
#

DROP TABLE IF EXISTS `prefix_active_mod`;
CREATE TABLE `prefix_active_mod` (
  `am_id` int(11) NOT NULL auto_increment,
  `am_name` varchar(255) NOT NULL default '',
  `am_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`am_id`),
  KEY `am_name` (`am_name`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# Dumping data for table `prefix_active_mod`
#

INSERT INTO `prefix_active_mod` (`am_id`, `am_name`, `am_status`) VALUES (1, 'estimate', 1),
(2, 'order', 0);

# --------------------------------------------------------

#
# Table structure for table `prefix_basket`
#

DROP TABLE IF EXISTS `prefix_basket`;
CREATE TABLE `prefix_basket` (
  `ba_id` int(9) NOT NULL auto_increment,
  `ba_session` varchar(255) NOT NULL default '',
  `ba_last_use` int(10) NOT NULL default '0',
  `ba_comments` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ba_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# Dumping data for table `prefix_basket`
#


# --------------------------------------------------------

#
# Table structure for table `prefix_basket_items`
#

DROP TABLE IF EXISTS `prefix_basket_items`;
CREATE TABLE `prefix_basket_items` (
  `bi_id` int(9) NOT NULL auto_increment,
  `bi_basket_FK` int(9) NOT NULL default '0',
  `bi_item_FK` int(9) NOT NULL default '0',
  `bi_quantity` int(9) NOT NULL default '1',
  PRIMARY KEY  (`bi_id`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=18 ;

#
# Dumping data for table `prefix_basket_items`
#


# --------------------------------------------------------

#
# Table structure for table `prefix_cat`
#

DROP TABLE IF EXISTS `prefix_cat`;
CREATE TABLE `prefix_cat` (
  `ca_id` int(9) NOT NULL auto_increment,
  `ca_name` varchar(50) NOT NULL default '',
  `ca_description` longtext NOT NULL,
  `ca_level` int(9) NOT NULL default '0',
  `ca_cat_FK` int(9) NOT NULL default '0',
  `ca_comments` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ca_id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

#
# Dumping data for table `prefix_cat`
#

INSERT INTO `prefix_cat` (`ca_id`, `ca_name`, `ca_description`, `ca_level`, `ca_cat_FK`, `ca_comments`) VALUES (1, 'Souris', 'yep', 0, 0, ''),
(2, 'Cartes graphiques', '', 0, 0, ''),
(3, 'Processeur', '', 0, 0, ''),
(4, 'Optique', 'Souris optique', 0, 1, '');

# --------------------------------------------------------

#
# Table structure for table `prefix_countries`
#

DROP TABLE IF EXISTS `prefix_countries`;
CREATE TABLE `prefix_countries` (
  `co_id` int(9) NOT NULL auto_increment,
  `co_code` char(2) NOT NULL default '',
  `co_name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`co_id`)
) TYPE=MyISAM AUTO_INCREMENT=241 ;

#
# Dumping data for table `prefix_countries`
#

INSERT INTO `prefix_countries` (`co_id`, `co_code`, `co_name`) VALUES (1, 'ae', 'United Arab Emirates'),
(2, 'af', 'Afghanistan'),
(3, 'ag', 'Antigua and Barbuda'),
(4, 'ai', 'Anguilla'),
(5, 'al', 'Albania'),
(6, 'am', 'Armenia'),
(7, 'an', 'Netherlands Antilles'),
(8, 'ao', 'Angola'),
(9, 'aq', 'Antarctica'),
(10, 'ar', 'Argentina'),
(11, 'as', 'American Samoa'),
(12, 'at', 'Austria'),
(13, 'au', 'Australia'),
(14, 'aw', 'Aruba'),
(15, 'az', 'Azerbaidjan'),
(16, 'ba', 'Bosnia-Herzegovina'),
(17, 'bb', 'Barbados'),
(18, 'bd', 'Bangladesh'),
(19, 'be', 'Belgium'),
(20, 'bf', 'Burkina Faso'),
(21, 'bg', 'Bulgaria'),
(22, 'bh', 'Bahrain'),
(23, 'bi', 'Burundi'),
(24, 'bj', 'Benin'),
(25, 'bm', 'Bermuda'),
(26, 'bn', 'Brunei Darussalam'),
(27, 'bo', 'Bolivia'),
(28, 'br', 'Brazil'),
(29, 'bs', 'Bahamas'),
(30, 'bt', 'Bhutan'),
(31, 'bv', 'Bouvet Island'),
(32, 'bw', 'Botswana'),
(33, 'by', 'Belarus'),
(34, 'bz', 'Belize'),
(35, 'ca', 'Canada'),
(36, 'cc', 'Cocos (Keeling) Islands'),
(37, 'cf', 'Central African Republic'),
(38, 'cg', 'Congo'),
(39, 'ch', 'Switzerland'),
(40, 'ci', 'Ivory Coast (Cote D\'Ivoire)'),
(41, 'ck', 'Cook Islands'),
(42, 'cl', 'Chile'),
(43, 'cm', 'Cameroon'),
(44, 'cn', 'China'),
(45, 'co', 'Colombia'),
(46, 'cr', 'Costa Rica'),
(47, 'cs', 'Former Czechoslovakia'),
(48, 'cu', 'Cuba'),
(49, 'cv', 'Cape Verde'),
(50, 'cx', 'Christmas Island'),
(51, 'cy', 'Cyprus'),
(52, 'cz', 'Czech Republic'),
(53, 'de', 'Germany'),
(54, 'dj', 'Djibouti'),
(55, 'dk', 'Denmark'),
(56, 'dm', 'Dominica'),
(57, 'do', 'Dominican Republic'),
(58, 'dz', 'Algeria'),
(59, 'ec', 'Ecuador'),
(60, 'ee', 'Estonia'),
(61, 'eg', 'Egypt'),
(62, 'eh', 'Western Sahara'),
(63, 'er', 'Eritrea'),
(64, 'es', 'Spain'),
(65, 'et', 'Ethiopia'),
(66, 'fj', 'Fiji'),
(67, 'fk', 'Falkland Islands'),
(68, 'fm', 'Micronesia'),
(69, 'fo', 'Faroe Islands'),
(70, 'fr', 'France'),
(71, 'fx', 'France (European Territory)'),
(72, 'ga', 'Gabon'),
(73, 'gb', 'Great Britain'),
(74, 'gd', 'Grenada'),
(75, 'ge', 'Georgia'),
(76, 'gf', 'French Guyana'),
(77, 'gh', 'Ghana'),
(78, 'gi', 'Gibraltar'),
(79, 'gl', 'Greenland'),
(80, 'gm', 'Gambia'),
(81, 'gn', 'Guinea'),
(82, 'gp', 'Guadeloupe (French)'),
(83, 'gq', 'Equatorial Guinea'),
(84, 'gr', 'Greece'),
(85, 'gs', 'S. Georgia & S. Sandwich Isls.'),
(86, 'gt', 'Guatemala'),
(87, 'gu', 'Guam (USA)'),
(88, 'gw', 'Guinea Bissau'),
(89, 'gy', 'Guyana'),
(90, 'hk', 'Hong Kong'),
(91, 'hm', 'Heard and McDonald Islands'),
(92, 'hn', 'Honduras'),
(93, 'hr', 'Croatia'),
(94, 'ht', 'Haiti'),
(95, 'hu', 'Hungary'),
(96, 'id', 'Indonesia'),
(97, 'ie', 'Ireland'),
(98, 'il', 'Israel'),
(99, 'in', 'India'),
(100, 'io', 'British Indian Ocean Territory'),
(101, 'iq', 'Iraq'),
(102, 'ir', 'Iran'),
(103, 'is', 'Iceland'),
(104, 'it', 'Italy'),
(105, 'jm', 'Jamaica'),
(106, 'jo', 'Jordan'),
(107, 'jp', 'Japan'),
(108, 'ke', 'Kenya'),
(109, 'kg', 'Kyrgyzstan'),
(110, 'kh', 'Cambodia'),
(111, 'ki', 'Kiribati'),
(112, 'km', 'Comoros'),
(113, 'kn', 'Saint Kitts & Nevis Anguilla'),
(114, 'kr', 'South Korea'),
(115, 'kw', 'Kuwait'),
(116, 'ky', 'Cayman Islands'),
(117, 'kz', 'Kazakhstan'),
(118, 'la', 'Laos'),
(119, 'lb', 'Lebanon'),
(120, 'lc', 'Saint Lucia'),
(121, 'li', 'Liechtenstein'),
(122, 'lk', 'Sri Lanka'),
(123, 'lr', 'Liberia'),
(124, 'ls', 'Lesotho'),
(125, 'lt', 'Lithuania'),
(126, 'lu', 'Luxembourg'),
(127, 'lv', 'Latvia'),
(128, 'ly', 'Libya'),
(129, 'ma', 'Morocco'),
(130, 'mc', 'Monaco'),
(131, 'md', 'Moldavia'),
(132, 'mg', 'Madagascar'),
(133, 'mh', 'Marshall Islands'),
(134, 'mk', 'Macedonia'),
(135, 'ml', 'Mali'),
(136, 'mm', 'Myanmar'),
(137, 'mn', 'Mongolia'),
(138, 'mo', 'Macau'),
(139, 'mp', 'Northern Mariana Islands'),
(140, 'mq', 'Martinique (French)'),
(141, 'mr', 'Mauritania'),
(142, 'ms', 'Montserrat'),
(143, 'mt', 'Malta'),
(144, 'mu', 'Mauritius'),
(145, 'mv', 'Maldives'),
(146, 'mw', 'Malawi'),
(147, 'mx', 'Mexico'),
(148, 'my', 'Malaysia'),
(149, 'mz', 'Mozambique'),
(150, 'na', 'Namibia'),
(151, 'nc', 'New Caledonia (French)'),
(152, 'ne', 'Niger'),
(153, 'nf', 'Norfolk Island'),
(154, 'ng', 'Nigeria'),
(155, 'ni', 'Nicaragua'),
(156, 'nl', 'Netherlands'),
(157, 'no', 'Norway'),
(158, 'np', 'Nepal'),
(159, 'nr', 'Nauru'),
(160, 'nt', 'Neutral Zone'),
(161, 'nu', 'Niue'),
(162, 'nz', 'New Zealand'),
(163, 'om', 'Oman'),
(164, 'pa', 'Panama'),
(165, 'pe', 'Peru'),
(166, 'pf', 'Polynesia (French)'),
(167, 'pg', 'Papua New Guinea'),
(168, 'ph', 'Philippines'),
(169, 'pk', 'Pakistan'),
(170, 'pl', 'Poland'),
(171, 'pm', 'Saint Pierre and Miquelon'),
(172, 'pn', 'Pitcairn Island'),
(173, 'pr', 'Puerto Rico'),
(174, 'pt', 'Portugal'),
(175, 'pw', 'Palau'),
(176, 'py', 'Paraguay'),
(177, 'qa', 'Qatar'),
(178, 're', 'Reunion (French)'),
(179, 'ro', 'Romania'),
(180, 'ru', 'Russian Federation'),
(181, 'rw', 'Rwanda'),
(182, 'sa', 'Saudi Arabia'),
(183, 'sb', 'Solomon Islands'),
(184, 'sc', 'Seychelles'),
(185, 'sd', 'Sudan'),
(186, 'se', 'Sweden'),
(187, 'sg', 'Singapore'),
(188, 'sh', 'Saint Helena'),
(189, 'si', 'Slovenia'),
(190, 'sj', 'Svalbard and Jan Mayen Islands'),
(191, 'sk', 'Slovak Republic'),
(192, 'sl', 'Sierra Leone'),
(193, 'sm', 'San Marino'),
(194, 'sn', 'Senegal'),
(195, 'so', 'Somalia'),
(196, 'sr', 'Suriname'),
(197, 'st', 'Saint Tome (Sao Tome) and Princi'),
(198, 'su', 'Former USSR'),
(199, 'sv', 'El Salvador'),
(200, 'sy', 'Syria'),
(201, 'sz', 'Swaziland'),
(202, 'tc', 'Turks and Caicos Islands'),
(203, 'td', 'Chad'),
(204, 'tf', 'French Southern Territories'),
(205, 'tg', 'Togo'),
(206, 'th', 'Thailand'),
(207, 'tj', 'Tadjikistan'),
(208, 'tk', 'Tokelau'),
(209, 'tm', 'Turkmenistan'),
(210, 'tn', 'Tunisia'),
(211, 'to', 'Tonga'),
(212, 'tp', 'East Timor'),
(213, 'tr', 'Turkey'),
(214, 'tt', 'Trinidad and Tobago'),
(215, 'tv', 'Tuvalu'),
(216, 'tw', 'Taiwan'),
(217, 'tz', 'Tanzania'),
(218, 'ua', 'Ukraine'),
(219, 'ug', 'Uganda'),
(220, 'uk', 'United Kingdom'),
(221, 'um', 'USA Minor Outlying Islands'),
(222, 'us', 'United States'),
(223, 'uy', 'Uruguay'),
(224, 'uz', 'Uzbekistan'),
(225, 'va', 'Vatican City State'),
(226, 'vc', 'Saint Vincent & Grenadines'),
(227, 've', 'Venezuela'),
(228, 'vg', 'Virgin Islands (British)'),
(229, 'vi', 'Virgin Islands (USA)'),
(230, 'vn', 'Vietnam'),
(231, 'vu', 'Vanuatu'),
(232, 'wf', 'Wallis and Futuna Islands'),
(233, 'ws', 'Samoa'),
(234, 'ye', 'Yemen'),
(235, 'yt', 'Mayotte'),
(236, 'yu', 'Yugoslavia'),
(237, 'za', 'South Africa'),
(238, 'zm', 'Zambia'),
(239, 'cd', 'Congo, Republic Democratic'),
(240, 'zw', 'Zimbabwe');

# --------------------------------------------------------

#
# Table structure for table `prefix_estimate`
#

DROP TABLE IF EXISTS `prefix_estimate`;
CREATE TABLE `prefix_estimate` (
  `est_id` int(11) NOT NULL auto_increment,
  `est_num` int(9) NOT NULL default '0',
  `est_user_id_FK` int(9) NOT NULL default '0',
  `est_date` date NOT NULL default '0000-00-00',
  `est_ttc_price` float(10,2) NOT NULL default '0.00',
  `est_status` int(1) NOT NULL default '0',
  `us_company` varchar(50) default NULL,
  `us_first_name` varchar(50) default NULL,
  `us_name` varchar(50) default NULL,
  `us_address` varchar(100) default NULL,
  `us_NPA` varchar(10) default NULL,
  `us_city` varchar(50) default NULL,
  `us_country` varchar(32) default NULL,
  `us_email` varchar(50) default NULL,
  PRIMARY KEY  (`est_id`),
  KEY `est_id` (`est_id`,`est_num`),
  KEY `est_user_id_FK` (`est_user_id_FK`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=3 ;

#
# Dumping data for table `prefix_estimate`
#

INSERT INTO `prefix_estimate` (`est_id`, `est_num`, `est_user_id_FK`, `est_date`, `est_ttc_price`, `est_status`, `us_company`, `us_first_name`, `us_name`, `us_address`, `us_NPA`, `us_city`, `us_country`, `us_email`) VALUES (1, 200408001, 1, '2004-08-27', '1959.50', 0, 'ONEOS S.A.R.L.', 'KAKESA', 'Christian', '1 rue du Ngliema', '51451', 'Kinshasa', 'Congo, Republic Democratic', 'admin@eshop.net'),
(2, 200408002, 1, '2004-08-27', '1379.50', 0, 'ONEOS S.A.R.L.', 'KAKESA', 'Christian', '1 rue du Ngliema', '51451', 'Kinshasa', 'Congo, Republic Democratic', 'admin@eshop.net');

# --------------------------------------------------------

#
# Table structure for table `prefix_estimate_items`
#

DROP TABLE IF EXISTS `prefix_estimate_items`;
CREATE TABLE `prefix_estimate_items` (
  `id` int(9) NOT NULL auto_increment,
  `est_id_FK` int(9) NOT NULL default '0',
  `it_id_FK` int(9) NOT NULL default '0',
  `it_price` float(10,2) NOT NULL default '0.00',
  `it_qte` int(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `est_id_FK` (`est_id_FK`,`it_id_FK`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=5 ;

#
# Dumping data for table `prefix_estimate_items`
#

INSERT INTO `prefix_estimate_items` (`id`, `est_id_FK`, `it_id_FK`, `it_price`, `it_qte`) VALUES (1, 200408001, 6, '1099.50', 1),
(2, 200408001, 7, '430.00', 2),
(3, 200408002, 6, '1099.50', 1),
(4, 200408002, 4, '280.00', 1);

# --------------------------------------------------------

#
# Table structure for table `prefix_items`
#

DROP TABLE IF EXISTS `prefix_items`;
CREATE TABLE `prefix_items` (
  `it_id` int(9) NOT NULL auto_increment,
  `it_name` varchar(50) NOT NULL default '',
  `it_description` longtext NOT NULL,
  `it_price` float NOT NULL default '0',
  `it_quantity` int(9) NOT NULL default '0',
  `it_number_sold` int(9) NOT NULL default '0',
  `it_cat_FK` int(9) NOT NULL default '0',
  `it_activated` int(1) NOT NULL default '0',
  `it_frontpage` int(1) NOT NULL default '0',
  `it_comments` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`it_id`)
) TYPE=MyISAM AUTO_INCREMENT=12 ;

#
# Dumping data for table `prefix_items`
#

INSERT INTO `prefix_items` (`it_id`, `it_name`, `it_description`, `it_price`, `it_quantity`, `it_number_sold`, `it_cat_FK`, `it_activated`, `it_frontpage`, `it_comments`) VALUES (8, 'Avance scroll mouse, 3 buttons, PS/2', 'Avance scroll mouse, 3 buttons, PS/2', '10', 6, 4, 1, 1, 0, ''),
(9, 'Logitech Cordless Optical mouse MX700', 'Logitech Cordless Optical mouse MX700', '95', 10, 2, 4, 1, 0, ''),
(4, 'Asus A9600XT/VD', 'Asus A9600XT/VD, ATI Radeon 9600XT, 128 MB DDR, DVI, Video-In, TV out, Dual VGA, AGP 8x', '280', 5, 0, 2, 1, 1, ''),
(5, 'Hercules Prophet 9600', 'Hercules Prophet 9600, ATI Radeon 9600, 256 MB DDR, DVI, TV out, AGP 8x', '205', 10, 0, 2, 1, 0, ''),
(6, 'His ATI Radeon 9800XT', 'His ATI Radeon 9800XT, 256 MB DDR, DVI, TV out', '1099.5', 10, 0, 2, 1, 1, ''),
(7, 'Intel Pentium 4 3.2 GHz', 'Intel Pentium 4 3.2 GHz, FSB 800, 1 MB cache Prescott', '430', 10, 0, 3, 1, 1, ''),
(10, 'Logitech Optical mouse MX310, PS/2+USB', 'Logitech Optical mouse MX310, PS/2+USB', '45', 3, 2, 4, 1, 1, ''),
(11, 'Souris Linux PS2/USB2', 'Souris Linux PS2/USB2', '29.9', 10, 0, 1, 1, 0, '');

# --------------------------------------------------------

#
# Table structure for table `prefix_price_cat`
#

DROP TABLE IF EXISTS `prefix_price_cat`;
CREATE TABLE `prefix_price_cat` (
  `pc_id` int(9) NOT NULL auto_increment,
  `pc_name` varchar(50) NOT NULL default '',
  `pc_reduction` float NOT NULL default '0',
  `pc_comments` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`pc_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# Dumping data for table `prefix_price_cat`
#

INSERT INTO `prefix_price_cat` (`pc_id`, `pc_name`, `pc_reduction`, `pc_comments`) VALUES (1, 'Normal', '0', '');

# --------------------------------------------------------

#
# Table structure for table `prefix_status`
#

DROP TABLE IF EXISTS `prefix_status`;
CREATE TABLE `prefix_status` (
  `st_id` int(1) unsigned NOT NULL default '0',
  `st_name` varchar(255) default NULL,
  PRIMARY KEY  (`st_id`),
  KEY `st_name` (`st_name`),
  KEY `st_id` (`st_id`)
) TYPE=MyISAM;

#
# Dumping data for table `prefix_status`
#

INSERT INTO `prefix_status` (`st_id`, `st_name`) VALUES (0, 'not read'),
(1, 'read'),
(2, 'at work'),
(3, 'ok');

# --------------------------------------------------------

#
# Table structure for table `prefix_style`
#

DROP TABLE IF EXISTS `prefix_style`;
CREATE TABLE `prefix_style` (
  `st_nom` varchar(50) NOT NULL default '',
  `st_comments` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`st_nom`)
) TYPE=MyISAM;

#
# Dumping data for table `prefix_style`
#


# --------------------------------------------------------

#
# Table structure for table `prefix_users`
#

DROP TABLE IF EXISTS `prefix_users`;
CREATE TABLE `prefix_users` (
  `us_id` int(9) NOT NULL auto_increment,
  `us_login` varchar(50) NOT NULL default '',
  `us_password` varchar(50) NOT NULL default '',
  `us_email` varchar(50) NOT NULL default '',
  `us_name` varchar(50) NOT NULL default '',
  `us_first_name` varchar(50) NOT NULL default '',
  `us_company` varchar(50) NOT NULL default '',
  `us_address` varchar(100) NOT NULL default '',
  `us_NPA` varchar(10) NOT NULL default '0',
  `us_city` varchar(50) NOT NULL default '',
  `us_country` int(9) NOT NULL default '0',
  `us_last_log` int(10) NOT NULL default '0',
  `us_last_ip` varchar(15) NOT NULL default '',
  `us_newsletter` int(1) NOT NULL default '0',
  `us_register_date` int(10) NOT NULL default '0',
  `us_level` int(2) NOT NULL default '0',
  `us_price_cat_FK` int(2) NOT NULL default '0',
  `us_activated` int(1) NOT NULL default '0',
  `us_comments` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`us_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# Dumping data for table `prefix_users`
#

INSERT INTO `prefix_users` (`us_id`, `us_login`, `us_password`, `us_email`, `us_name`, `us_first_name`, `us_company`, `us_address`, `us_NPA`, `us_city`, `us_country`, `us_last_log`, `us_last_ip`, `us_newsletter`, `us_register_date`, `us_level`, `us_price_cat_FK`, `us_activated`, `us_comments`) VALUES (1, 'admin', 'd0990ff47680b74fb2e882de778cb81a', 'admin@eshop.net', 'Christian', 'KAKESA', 'ONEOS S.A.R.L.', '1 rue du Ngliema', '51451', 'Kinshasa', 239, 1108256966, '127.0.0.1', 1, 1087574037, 7, 1, 1, '');

# --------------------------------------------------------

#
# Table structure for table `prefix_users_level`
#

DROP TABLE IF EXISTS `prefix_users_level`;
CREATE TABLE `prefix_users_level` (
  `ul_id` int(9) NOT NULL auto_increment,
  `ul_name` varchar(25) NOT NULL default '',
  `ul_value` int(1) NOT NULL default '0',
  PRIMARY KEY  (`ul_id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

#
# Dumping data for table `prefix_users_level`
#

INSERT INTO `prefix_users_level` (`ul_id`, `ul_name`, `ul_value`) VALUES (1, 'Registered (no priv.)', 0),
(3, 'Root', 7);
