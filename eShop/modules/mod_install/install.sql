DROP TABLE IF EXISTS prefix_basket;#%%
CREATE TABLE prefix_basket (
    ba_id int(9) NOT NULL auto_increment,
    ba_session varchar(255) NOT NULL,
    ba_last_use int(10) DEFAULT '0' NOT NULL,
    ba_comments varchar(255) NOT NULL,
   PRIMARY KEY (ba_id)
);#%%

INSERT INTO prefix_basket VALUES ('4','3fd7c98b974084d61a5bcd14d9ebaf41','1088598843','');#%%


DROP TABLE IF EXISTS prefix_basket_items;#%%
CREATE TABLE prefix_basket_items (
    bi_id int(9) NOT NULL auto_increment,
    bi_basket_FK int(9) DEFAULT '0' NOT NULL,
    bi_item_FK int(9) DEFAULT '0' NOT NULL,
    bi_quantity int(9) DEFAULT '1' NOT NULL,
   PRIMARY KEY (bi_id)
);#%%



DROP TABLE IF EXISTS prefix_cat;#%%
CREATE TABLE prefix_cat (
    ca_id int(9) NOT NULL auto_increment,
    ca_name varchar(50) NOT NULL,
    ca_description longtext NOT NULL,
    ca_cat_FK int(9) DEFAULT '0' NOT NULL,
    ca_comments varchar(255) NOT NULL,
   PRIMARY KEY (ca_id)
);#%%

INSERT INTO prefix_cat VALUES ('1','Souris','','0','0','');#%%
INSERT INTO prefix_cat VALUES ('2','Cartes graphiques','','0','0','');#%%
INSERT INTO prefix_cat VALUES ('3','Processeur','','0','0','');#%%


DROP TABLE IF EXISTS prefix_countries;#%%
CREATE TABLE prefix_countries (
    co_id int(9) NOT NULL auto_increment,
    co_code char(2) NOT NULL,
    co_name varchar(32) NOT NULL,
   PRIMARY KEY (co_id)
);#%%

INSERT INTO prefix_countries VALUES ('1','ae','United Arab Emirates');#%%
INSERT INTO prefix_countries VALUES ('2','af','Afghanistan');#%%
INSERT INTO prefix_countries VALUES ('3','ag','Antigua and Barbuda');#%%
INSERT INTO prefix_countries VALUES ('4','ai','Anguilla');#%%
INSERT INTO prefix_countries VALUES ('5','al','Albania');#%%
INSERT INTO prefix_countries VALUES ('6','am','Armenia');#%%
INSERT INTO prefix_countries VALUES ('7','an','Netherlands Antilles');#%%
INSERT INTO prefix_countries VALUES ('8','ao','Angola');#%%
INSERT INTO prefix_countries VALUES ('9','aq','Antarctica');#%%
INSERT INTO prefix_countries VALUES ('10','ar','Argentina');#%%
INSERT INTO prefix_countries VALUES ('11','as','American Samoa');#%%
INSERT INTO prefix_countries VALUES ('12','at','Austria');#%%
INSERT INTO prefix_countries VALUES ('13','au','Australia');#%%
INSERT INTO prefix_countries VALUES ('14','aw','Aruba');#%%
INSERT INTO prefix_countries VALUES ('15','az','Azerbaidjan');#%%
INSERT INTO prefix_countries VALUES ('16','ba','Bosnia-Herzegovina');#%%
INSERT INTO prefix_countries VALUES ('17','bb','Barbados');#%%
INSERT INTO prefix_countries VALUES ('18','bd','Bangladesh');#%%
INSERT INTO prefix_countries VALUES ('19','be','Belgium');#%%
INSERT INTO prefix_countries VALUES ('20','bf','Burkina Faso');#%%
INSERT INTO prefix_countries VALUES ('21','bg','Bulgaria');#%%
INSERT INTO prefix_countries VALUES ('22','bh','Bahrain');#%%
INSERT INTO prefix_countries VALUES ('23','bi','Burundi');#%%
INSERT INTO prefix_countries VALUES ('24','bj','Benin');#%%
INSERT INTO prefix_countries VALUES ('25','bm','Bermuda');#%%
INSERT INTO prefix_countries VALUES ('26','bn','Brunei Darussalam');#%%
INSERT INTO prefix_countries VALUES ('27','bo','Bolivia');#%%
INSERT INTO prefix_countries VALUES ('28','br','Brazil');#%%
INSERT INTO prefix_countries VALUES ('29','bs','Bahamas');#%%
INSERT INTO prefix_countries VALUES ('30','bt','Bhutan');#%%
INSERT INTO prefix_countries VALUES ('31','bv','Bouvet Island');#%%
INSERT INTO prefix_countries VALUES ('32','bw','Botswana');#%%
INSERT INTO prefix_countries VALUES ('33','by','Belarus');#%%
INSERT INTO prefix_countries VALUES ('34','bz','Belize');#%%
INSERT INTO prefix_countries VALUES ('35','ca','Canada');#%%
INSERT INTO prefix_countries VALUES ('36','cc','Cocos (Keeling) Islands');#%%
INSERT INTO prefix_countries VALUES ('37','cf','Central African Republic');#%%
INSERT INTO prefix_countries VALUES ('38','cg','Congo');#%%
INSERT INTO prefix_countries VALUES ('39','ch','Switzerland');#%%
INSERT INTO prefix_countries VALUES ('40','ci','Ivory Coast (Cote D\'Ivoire)');#%%
INSERT INTO prefix_countries VALUES ('41','ck','Cook Islands');#%%
INSERT INTO prefix_countries VALUES ('42','cl','Chile');#%%
INSERT INTO prefix_countries VALUES ('43','cm','Cameroon');#%%
INSERT INTO prefix_countries VALUES ('44','cn','China');#%%
INSERT INTO prefix_countries VALUES ('45','co','Colombia');#%%
INSERT INTO prefix_countries VALUES ('46','cr','Costa Rica');#%%
INSERT INTO prefix_countries VALUES ('47','cs','Former Czechoslovakia');#%%
INSERT INTO prefix_countries VALUES ('48','cu','Cuba');#%%
INSERT INTO prefix_countries VALUES ('49','cv','Cape Verde');#%%
INSERT INTO prefix_countries VALUES ('50','cx','Christmas Island');#%%
INSERT INTO prefix_countries VALUES ('51','cy','Cyprus');#%%
INSERT INTO prefix_countries VALUES ('52','cz','Czech Republic');#%%
INSERT INTO prefix_countries VALUES ('53','de','Germany');#%%
INSERT INTO prefix_countries VALUES ('54','dj','Djibouti');#%%
INSERT INTO prefix_countries VALUES ('55','dk','Denmark');#%%
INSERT INTO prefix_countries VALUES ('56','dm','Dominica');#%%
INSERT INTO prefix_countries VALUES ('57','do','Dominican Republic');#%%
INSERT INTO prefix_countries VALUES ('58','dz','Algeria');#%%
INSERT INTO prefix_countries VALUES ('59','ec','Ecuador');#%%
INSERT INTO prefix_countries VALUES ('60','ee','Estonia');#%%
INSERT INTO prefix_countries VALUES ('61','eg','Egypt');#%%
INSERT INTO prefix_countries VALUES ('62','eh','Western Sahara');#%%
INSERT INTO prefix_countries VALUES ('63','er','Eritrea');#%%
INSERT INTO prefix_countries VALUES ('64','es','Spain');#%%
INSERT INTO prefix_countries VALUES ('65','et','Ethiopia');#%%
INSERT INTO prefix_countries VALUES ('66','fj','Fiji');#%%
INSERT INTO prefix_countries VALUES ('67','fk','Falkland Islands');#%%
INSERT INTO prefix_countries VALUES ('68','fm','Micronesia');#%%
INSERT INTO prefix_countries VALUES ('69','fo','Faroe Islands');#%%
INSERT INTO prefix_countries VALUES ('70','fr','France');#%%
INSERT INTO prefix_countries VALUES ('71','fx','France (European Territory)');#%%
INSERT INTO prefix_countries VALUES ('72','ga','Gabon');#%%
INSERT INTO prefix_countries VALUES ('73','gb','Great Britain');#%%
INSERT INTO prefix_countries VALUES ('74','gd','Grenada');#%%
INSERT INTO prefix_countries VALUES ('75','ge','Georgia');#%%
INSERT INTO prefix_countries VALUES ('76','gf','French Guyana');#%%
INSERT INTO prefix_countries VALUES ('77','gh','Ghana');#%%
INSERT INTO prefix_countries VALUES ('78','gi','Gibraltar');#%%
INSERT INTO prefix_countries VALUES ('79','gl','Greenland');#%%
INSERT INTO prefix_countries VALUES ('80','gm','Gambia');#%%
INSERT INTO prefix_countries VALUES ('81','gn','Guinea');#%%
INSERT INTO prefix_countries VALUES ('82','gp','Guadeloupe (French)');#%%
INSERT INTO prefix_countries VALUES ('83','gq','Equatorial Guinea');#%%
INSERT INTO prefix_countries VALUES ('84','gr','Greece');#%%
INSERT INTO prefix_countries VALUES ('85','gs','S. Georgia & S. Sandwich Isls.');#%%
INSERT INTO prefix_countries VALUES ('86','gt','Guatemala');#%%
INSERT INTO prefix_countries VALUES ('87','gu','Guam (USA)');#%%
INSERT INTO prefix_countries VALUES ('88','gw','Guinea Bissau');#%%
INSERT INTO prefix_countries VALUES ('89','gy','Guyana');#%%
INSERT INTO prefix_countries VALUES ('90','hk','Hong Kong');#%%
INSERT INTO prefix_countries VALUES ('91','hm','Heard and McDonald Islands');#%%
INSERT INTO prefix_countries VALUES ('92','hn','Honduras');#%%
INSERT INTO prefix_countries VALUES ('93','hr','Croatia');#%%
INSERT INTO prefix_countries VALUES ('94','ht','Haiti');#%%
INSERT INTO prefix_countries VALUES ('95','hu','Hungary');#%%
INSERT INTO prefix_countries VALUES ('96','id','Indonesia');#%%
INSERT INTO prefix_countries VALUES ('97','ie','Ireland');#%%
INSERT INTO prefix_countries VALUES ('98','il','Israel');#%%
INSERT INTO prefix_countries VALUES ('99','in','India');#%%
INSERT INTO prefix_countries VALUES ('100','io','British Indian Ocean Territory');#%%
INSERT INTO prefix_countries VALUES ('101','iq','Iraq');#%%
INSERT INTO prefix_countries VALUES ('102','ir','Iran');#%%
INSERT INTO prefix_countries VALUES ('103','is','Iceland');#%%
INSERT INTO prefix_countries VALUES ('104','it','Italy');#%%
INSERT INTO prefix_countries VALUES ('105','jm','Jamaica');#%%
INSERT INTO prefix_countries VALUES ('106','jo','Jordan');#%%
INSERT INTO prefix_countries VALUES ('107','jp','Japan');#%%
INSERT INTO prefix_countries VALUES ('108','ke','Kenya');#%%
INSERT INTO prefix_countries VALUES ('109','kg','Kyrgyzstan');#%%
INSERT INTO prefix_countries VALUES ('110','kh','Cambodia');#%%
INSERT INTO prefix_countries VALUES ('111','ki','Kiribati');#%%
INSERT INTO prefix_countries VALUES ('112','km','Comoros');#%%
INSERT INTO prefix_countries VALUES ('113','kn','Saint Kitts & Nevis Anguilla');#%%
INSERT INTO prefix_countries VALUES ('114','kr','South Korea');#%%
INSERT INTO prefix_countries VALUES ('115','kw','Kuwait');#%%
INSERT INTO prefix_countries VALUES ('116','ky','Cayman Islands');#%%
INSERT INTO prefix_countries VALUES ('117','kz','Kazakhstan');#%%
INSERT INTO prefix_countries VALUES ('118','la','Laos');#%%
INSERT INTO prefix_countries VALUES ('119','lb','Lebanon');#%%
INSERT INTO prefix_countries VALUES ('120','lc','Saint Lucia');#%%
INSERT INTO prefix_countries VALUES ('121','li','Liechtenstein');#%%
INSERT INTO prefix_countries VALUES ('122','lk','Sri Lanka');#%%
INSERT INTO prefix_countries VALUES ('123','lr','Liberia');#%%
INSERT INTO prefix_countries VALUES ('124','ls','Lesotho');#%%
INSERT INTO prefix_countries VALUES ('125','lt','Lithuania');#%%
INSERT INTO prefix_countries VALUES ('126','lu','Luxembourg');#%%
INSERT INTO prefix_countries VALUES ('127','lv','Latvia');#%%
INSERT INTO prefix_countries VALUES ('128','ly','Libya');#%%
INSERT INTO prefix_countries VALUES ('129','ma','Morocco');#%%
INSERT INTO prefix_countries VALUES ('130','mc','Monaco');#%%
INSERT INTO prefix_countries VALUES ('131','md','Moldavia');#%%
INSERT INTO prefix_countries VALUES ('132','mg','Madagascar');#%%
INSERT INTO prefix_countries VALUES ('133','mh','Marshall Islands');#%%
INSERT INTO prefix_countries VALUES ('134','mk','Macedonia');#%%
INSERT INTO prefix_countries VALUES ('135','ml','Mali');#%%
INSERT INTO prefix_countries VALUES ('136','mm','Myanmar');#%%
INSERT INTO prefix_countries VALUES ('137','mn','Mongolia');#%%
INSERT INTO prefix_countries VALUES ('138','mo','Macau');#%%
INSERT INTO prefix_countries VALUES ('139','mp','Northern Mariana Islands');#%%
INSERT INTO prefix_countries VALUES ('140','mq','Martinique (French)');#%%
INSERT INTO prefix_countries VALUES ('141','mr','Mauritania');#%%
INSERT INTO prefix_countries VALUES ('142','ms','Montserrat');#%%
INSERT INTO prefix_countries VALUES ('143','mt','Malta');#%%
INSERT INTO prefix_countries VALUES ('144','mu','Mauritius');#%%
INSERT INTO prefix_countries VALUES ('145','mv','Maldives');#%%
INSERT INTO prefix_countries VALUES ('146','mw','Malawi');#%%
INSERT INTO prefix_countries VALUES ('147','mx','Mexico');#%%
INSERT INTO prefix_countries VALUES ('148','my','Malaysia');#%%
INSERT INTO prefix_countries VALUES ('149','mz','Mozambique');#%%
INSERT INTO prefix_countries VALUES ('150','na','Namibia');#%%
INSERT INTO prefix_countries VALUES ('151','nc','New Caledonia (French)');#%%
INSERT INTO prefix_countries VALUES ('152','ne','Niger');#%%
INSERT INTO prefix_countries VALUES ('153','nf','Norfolk Island');#%%
INSERT INTO prefix_countries VALUES ('154','ng','Nigeria');#%%
INSERT INTO prefix_countries VALUES ('155','ni','Nicaragua');#%%
INSERT INTO prefix_countries VALUES ('156','nl','Netherlands');#%%
INSERT INTO prefix_countries VALUES ('157','no','Norway');#%%
INSERT INTO prefix_countries VALUES ('158','np','Nepal');#%%
INSERT INTO prefix_countries VALUES ('159','nr','Nauru');#%%
INSERT INTO prefix_countries VALUES ('160','nt','Neutral Zone');#%%
INSERT INTO prefix_countries VALUES ('161','nu','Niue');#%%
INSERT INTO prefix_countries VALUES ('162','nz','New Zealand');#%%
INSERT INTO prefix_countries VALUES ('163','om','Oman');#%%
INSERT INTO prefix_countries VALUES ('164','pa','Panama');#%%
INSERT INTO prefix_countries VALUES ('165','pe','Peru');#%%
INSERT INTO prefix_countries VALUES ('166','pf','Polynesia (French)');#%%
INSERT INTO prefix_countries VALUES ('167','pg','Papua New Guinea');#%%
INSERT INTO prefix_countries VALUES ('168','ph','Philippines');#%%
INSERT INTO prefix_countries VALUES ('169','pk','Pakistan');#%%
INSERT INTO prefix_countries VALUES ('170','pl','Poland');#%%
INSERT INTO prefix_countries VALUES ('171','pm','Saint Pierre and Miquelon');#%%
INSERT INTO prefix_countries VALUES ('172','pn','Pitcairn Island');#%%
INSERT INTO prefix_countries VALUES ('173','pr','Puerto Rico');#%%
INSERT INTO prefix_countries VALUES ('174','pt','Portugal');#%%
INSERT INTO prefix_countries VALUES ('175','pw','Palau');#%%
INSERT INTO prefix_countries VALUES ('176','py','Paraguay');#%%
INSERT INTO prefix_countries VALUES ('177','qa','Qatar');#%%
INSERT INTO prefix_countries VALUES ('178','re','Reunion (French)');#%%
INSERT INTO prefix_countries VALUES ('179','ro','Romania');#%%
INSERT INTO prefix_countries VALUES ('180','ru','Russian Federation');#%%
INSERT INTO prefix_countries VALUES ('181','rw','Rwanda');#%%
INSERT INTO prefix_countries VALUES ('182','sa','Saudi Arabia');#%%
INSERT INTO prefix_countries VALUES ('183','sb','Solomon Islands');#%%
INSERT INTO prefix_countries VALUES ('184','sc','Seychelles');#%%
INSERT INTO prefix_countries VALUES ('185','sd','Sudan');#%%
INSERT INTO prefix_countries VALUES ('186','se','Sweden');#%%
INSERT INTO prefix_countries VALUES ('187','sg','Singapore');#%%
INSERT INTO prefix_countries VALUES ('188','sh','Saint Helena');#%%
INSERT INTO prefix_countries VALUES ('189','si','Slovenia');#%%
INSERT INTO prefix_countries VALUES ('190','sj','Svalbard and Jan Mayen Islands');#%%
INSERT INTO prefix_countries VALUES ('191','sk','Slovak Republic');#%%
INSERT INTO prefix_countries VALUES ('192','sl','Sierra Leone');#%%
INSERT INTO prefix_countries VALUES ('193','sm','San Marino');#%%
INSERT INTO prefix_countries VALUES ('194','sn','Senegal');#%%
INSERT INTO prefix_countries VALUES ('195','so','Somalia');#%%
INSERT INTO prefix_countries VALUES ('196','sr','Suriname');#%%
INSERT INTO prefix_countries VALUES ('197','st','Saint Tome (Sao Tome) and Princi');#%%
INSERT INTO prefix_countries VALUES ('198','su','Former USSR');#%%
INSERT INTO prefix_countries VALUES ('199','sv','El Salvador');#%%
INSERT INTO prefix_countries VALUES ('200','sy','Syria');#%%
INSERT INTO prefix_countries VALUES ('201','sz','Swaziland');#%%
INSERT INTO prefix_countries VALUES ('202','tc','Turks and Caicos Islands');#%%
INSERT INTO prefix_countries VALUES ('203','td','Chad');#%%
INSERT INTO prefix_countries VALUES ('204','tf','French Southern Territories');#%%
INSERT INTO prefix_countries VALUES ('205','tg','Togo');#%%
INSERT INTO prefix_countries VALUES ('206','th','Thailand');#%%
INSERT INTO prefix_countries VALUES ('207','tj','Tadjikistan');#%%
INSERT INTO prefix_countries VALUES ('208','tk','Tokelau');#%%
INSERT INTO prefix_countries VALUES ('209','tm','Turkmenistan');#%%
INSERT INTO prefix_countries VALUES ('210','tn','Tunisia');#%%
INSERT INTO prefix_countries VALUES ('211','to','Tonga');#%%
INSERT INTO prefix_countries VALUES ('212','tp','East Timor');#%%
INSERT INTO prefix_countries VALUES ('213','tr','Turkey');#%%
INSERT INTO prefix_countries VALUES ('214','tt','Trinidad and Tobago');#%%
INSERT INTO prefix_countries VALUES ('215','tv','Tuvalu');#%%
INSERT INTO prefix_countries VALUES ('216','tw','Taiwan');#%%
INSERT INTO prefix_countries VALUES ('217','tz','Tanzania');#%%
INSERT INTO prefix_countries VALUES ('218','ua','Ukraine');#%%
INSERT INTO prefix_countries VALUES ('219','ug','Uganda');#%%
INSERT INTO prefix_countries VALUES ('220','uk','United Kingdom');#%%
INSERT INTO prefix_countries VALUES ('221','um','USA Minor Outlying Islands');#%%
INSERT INTO prefix_countries VALUES ('222','us','United States');#%%
INSERT INTO prefix_countries VALUES ('223','uy','Uruguay');#%%
INSERT INTO prefix_countries VALUES ('224','uz','Uzbekistan');#%%
INSERT INTO prefix_countries VALUES ('225','va','Vatican City State');#%%
INSERT INTO prefix_countries VALUES ('226','vc','Saint Vincent & Grenadines');#%%
INSERT INTO prefix_countries VALUES ('227','ve','Venezuela');#%%
INSERT INTO prefix_countries VALUES ('228','vg','Virgin Islands (British)');#%%
INSERT INTO prefix_countries VALUES ('229','vi','Virgin Islands (USA)');#%%
INSERT INTO prefix_countries VALUES ('230','vn','Vietnam');#%%
INSERT INTO prefix_countries VALUES ('231','vu','Vanuatu');#%%
INSERT INTO prefix_countries VALUES ('232','wf','Wallis and Futuna Islands');#%%
INSERT INTO prefix_countries VALUES ('233','ws','Samoa');#%%
INSERT INTO prefix_countries VALUES ('234','ye','Yemen');#%%
INSERT INTO prefix_countries VALUES ('235','yt','Mayotte');#%%
INSERT INTO prefix_countries VALUES ('236','yu','Yugoslavia');#%%
INSERT INTO prefix_countries VALUES ('237','za','South Africa');#%%
INSERT INTO prefix_countries VALUES ('238','zm','Zambia');#%%
INSERT INTO prefix_countries VALUES ('239','cd','Congo, Democratic Republic');#%%
INSERT INTO prefix_countries VALUES ('240','zw','Zimbabwe');#%%


DROP TABLE IF EXISTS prefix_items;#%%
CREATE TABLE prefix_items (
    it_id int(9) NOT NULL auto_increment,
    it_name varchar(50) NOT NULL,
    it_description longtext NOT NULL,
    it_price float DEFAULT '0' NOT NULL,
    it_quantity int(9) DEFAULT '0' NOT NULL,
    it_number_sold int(9) DEFAULT '0' NOT NULL,
    it_cat_FK int(9) DEFAULT '0' NOT NULL,
    it_activated int(1) DEFAULT '0' NOT NULL,
    it_frontpage int(1) DEFAULT '0' NOT NULL,
    it_comments varchar(255) NOT NULL,
   PRIMARY KEY (it_id)
);#%%

INSERT INTO prefix_items VALUES ('8','Avance scroll mouse, 3 buttons, PS/2','','10','6','4','1','0','0','');#%%
INSERT INTO prefix_items VALUES ('9','Logitech Cordless Optical mouse MX700','','95','10','2','1','1','0','');#%%
INSERT INTO prefix_items VALUES ('4','Asus A9600XT/VD','Asus A9600XT/VD, ATI Radeon 9600XT, 128 MB DDR, DVI, Video-In, TV out, Dual VGA, AGP 8x','280','0','0','2','1','0','');#%%
INSERT INTO prefix_items VALUES ('5','Hercules Prophet 9600','Hercules Prophet 9600, ATI Radeon 9600, 256 MB DDR, DVI, TV out, AGP 8x','205','0','0','2','1','0','');#%%
INSERT INTO prefix_items VALUES ('6','His ATI Radeon 9800XT','His ATI Radeon 9800XT, 256 MB DDR, DVI, TV out','625','0','0','2','1','0','');#%%
INSERT INTO prefix_items VALUES ('7','Intel Pentium 4 3.2 GHz','Intel Pentium 4 3.2 GHz, FSB 800, 1 MB cache Prescott','430','0','0','3','1','0','');#%%
INSERT INTO prefix_items VALUES ('10','Logitech Optical mouse MX310, PS/2+USB','','45','3','2','1','1','0','');#%%


DROP TABLE IF EXISTS prefix_price_cat;#%%
CREATE TABLE prefix_price_cat (
    pc_id int(9) NOT NULL auto_increment,
    pc_name varchar(50) NOT NULL,
    pc_reduction float DEFAULT '0' NOT NULL,
    pc_comments varchar(255) NOT NULL,
   PRIMARY KEY (pc_id)
);#%%

INSERT INTO prefix_price_cat VALUES ('1','Normal','0','');#%%


DROP TABLE IF EXISTS prefix_style;#%%
CREATE TABLE prefix_style (
    st_nom varchar(50) NOT NULL,
    st_comments varchar(255) NOT NULL,
   PRIMARY KEY (st_nom)
);#%%



DROP TABLE IF EXISTS prefix_users;#%%
CREATE TABLE prefix_users (
    us_id int(9) NOT NULL auto_increment,
    us_login varchar(50) NOT NULL,
    us_password varchar(50) NOT NULL,
    us_email varchar(50) NOT NULL,
    us_name varchar(50) NOT NULL,
    us_first_name varchar(50) NOT NULL,
    us_company varchar(50) NOT NULL,
    us_address varchar(100) NOT NULL,
    us_NPA varchar(10) DEFAULT '0' NOT NULL,
    us_city varchar(50) NOT NULL,
    us_country int(9) DEFAULT '0' NOT NULL,
    us_last_log int(10) DEFAULT '0' NOT NULL,
    us_last_ip varchar(15) NOT NULL,
    us_newsletter int(1) DEFAULT '0' NOT NULL,
    us_register_date int(10) DEFAULT '0' NOT NULL,
    us_level int(2) DEFAULT '0' NOT NULL,
    us_price_cat_FK int(2) DEFAULT '0' NOT NULL,
    us_activated int(1) DEFAULT '0' NOT NULL,
    us_comments varchar(255) NOT NULL,
   PRIMARY KEY (us_id)
);#%%

INSERT INTO prefix_users VALUES ('1','admin','d0990ff47680b74fb2e882de778cb81a','admin@eshop.net','','','','','0','','2','1088598834','127.0.0.1','0','1087574037','7','1','1','');#%%


DROP TABLE IF EXISTS prefix_users_level;#%%
CREATE TABLE prefix_users_level (
    ul_id int(9) NOT NULL auto_increment,
    ul_name varchar(25) NOT NULL,
    ul_value int(1) DEFAULT '0' NOT NULL,
   PRIMARY KEY (ul_id)
);#%%

INSERT INTO prefix_users_level VALUES ('1','Registered (no priv.)','0');#%%
INSERT INTO prefix_users_level VALUES ('3','Root','7');#%%

DROP TABLE IF EXISTS `prefix_estimate`;
CREATE TABLE `prefix_estimate` (
  `est_id` int(11) NOT NULL auto_increment,
  `est_num` int(9) NOT NULL default '0',
  `est_user_id_FK` int(9) NOT NULL default '0',
  `est_date` date NOT NULL default '0000-00-00',
  `est_ttc_price` float(10,2) NOT NULL default '0.00',
  `est_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`est_id`),
  KEY `est_id` (`est_id`,`est_num`),
  KEY `est_user_id_FK` (`est_user_id_FK`)
) TYPE=MyISAM ;

DROP TABLE IF EXISTS `prefix_estimate_items`;
CREATE TABLE `prefix_estimate_items` (
  `id` int(9) NOT NULL auto_increment,
  `est_id_FK` int(9) NOT NULL default '0',
  `it_id_FK` int(9) NOT NULL default '0',
  `it_price` float(10,2) NOT NULL default '0.00',
  `it_qte` int(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `est_id_FK` (`est_id_FK`,`it_id_FK`)
) TYPE=MyISAM;

# Structure of table `prefix_status`
DROP TABLE IF EXISTS `prefix_status`;
CREATE TABLE `prefix_status` (
  `st_id` int(1) unsigned NOT NULL default '0',
  `st_name` varchar(255) default NULL,
  PRIMARY KEY  (`st_id`),
  KEY `st_name` (`st_name`),
  KEY `st_id` (`st_id`)
) TYPE=MyISAM;
INSERT INTO `prefix_status` VALUES (0, 'not read');
INSERT INTO `prefix_status` VALUES (1, 'read');
INSERT INTO `prefix_status` VALUES (2, 'at work');
INSERT INTO `prefix_status` VALUES (3, 'ok');

DROP TABLE IF EXISTS `prefix_active_mod`;
CREATE TABLE `prefix_active_mod` (
  `am_id` int(11) NOT NULL auto_increment,
  `am_name` varchar(255) NOT NULL default '',
  `am_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`am_id`),
  KEY `am_name` (`am_name`)
) TYPE=MyISAM;