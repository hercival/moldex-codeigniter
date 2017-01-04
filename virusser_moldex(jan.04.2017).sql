/*
 Navicat Premium Data Transfer

 Source Server         : VIRUS-SERVER
 Source Server Type    : MySQL
 Source Server Version : 50552
 Source Host           : virus-server.com
 Source Database       : virusser_moldex

 Target Server Type    : MySQL
 Target Server Version : 50552
 File Encoding         : utf-8

 Date: 01/04/2017 13:36:11 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `admin`
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', '2016-07-28 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `careers`
-- ----------------------------
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `published` int(11) NOT NULL,
  `date_publish` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `category` varchar(100) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `careers`
-- ----------------------------
BEGIN;
INSERT INTO `careers` VALUES ('1', 'International Property Specialist', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n\n<p><br />\n<strong>Job Requirements:</strong></p>\n\n<p>&bull; Lorem ipsum dolor sit amet.</p>\n\n<p>&bull; Lorem ipsum dolor sit amet.</p>\n', '1', '2016-12-14 00:00:00', '2016-12-14 11:35:33', 'corporate', 'international-property-specialist'), ('2', 'International Sales Manager', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n\n<p><br />\n<strong>Job Requirements:</strong></p>\n\n<p>&bull; Lorem ipsum dolor sit amet.</p>\n\n<p>&bull; Lorem ipsum dolor sit amet.</p>\n', '1', '2016-12-14 00:00:00', '2016-12-14 11:36:56', 'corporate', 'international-sales-manager'), ('3', 'job job title', '<p>sample content</p>\n', '1', '2016-12-15 00:00:00', '2016-12-15 16:50:19', 'in-house-sales', 'job-job-title');
COMMIT;

-- ----------------------------
--  Table structure for `housemodel`
-- ----------------------------
DROP TABLE IF EXISTS `housemodel`;
CREATE TABLE `housemodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `disclaimer` text NOT NULL,
  `floor_area` text NOT NULL,
  `lot_area` text NOT NULL,
  `interior_details` text NOT NULL,
  `interior_gallery` text NOT NULL,
  `project_location_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_type_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `gallery` text NOT NULL,
  `floor_plan` text NOT NULL,
  `video_link` varchar(225) NOT NULL,
  `interior_content` text NOT NULL,
  `banners` text NOT NULL,
  `alias` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `enable` int(11) NOT NULL,
  `featured_leasing` int(11) NOT NULL DEFAULT '0',
  `tile` varchar(100) NOT NULL,
  `model_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `housemodel`
-- ----------------------------
BEGIN;
INSERT INTO `housemodel` VALUES ('1', 'Camille', '<p>Great schools like De La Salle University - Canlubang, St. Scholastica\'s West Grove, Xavier School via Nuvali, and Adventist University of the Philippines are all just minutes away from Heritage Spring Homes.</p>', 'P5M - P10M', '', '', '', '<h3>Interior copy goes here</h3>\n                <br> <strong>Model Features</strong>\n                <p>• Living Room</p>\n                <p>• Dining Room</p>\n                <p>• Kitchen</p>\n                <p>• T &amp; B 1</p>\n                <p>• Service Area</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '0', '8', '0', '0', '', 'cam-basic.jpg', 'http://www.youtube.com/embed/ePbKGoIGAXY', '', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'camille', 'featured', '1', '0', 'hmodel1.jpg', ''), ('2', 'Type 3', '<p>Great schools like De La Salle University - Canlubang, St. Scholastica\'s West Grove, Xavier School via Nuvali, and Adventist University of the Philippines are all just minutes away from Heritage Spring Homes.</p>', 'P5M - P10M', '', '', '', '<h3>Interior copy goes here</h3>\n                <br> <strong>Model Features</strong>\n                <p>• Living Room</p>\n                <p>• Dining Room</p>\n                <p>• Kitchen</p>\n                <p>• T &amp; B 1</p>\n                <p>• Service Area</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '0', '3', '0', '0', '', 'cam-basic.jpg', 'http://www.youtube.com/embed/ePbKGoIGAXY', '', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'type-3', 'featured', '1', '1', 'listingunit1.jpg', '2 BR'), ('3', 'Arden', '<p>Great schools like De La Salle University - Canlubang, St. Scholastica\'s West Grove, Xavier School via Nuvali, and Adventist University of the Philippines are all just minutes away from Heritage Spring Homes.</p>', 'P5M - P10M', '', '103.8 sqm', '120 sqm', '<h3>Interior copy goes here</h3>\n                <br> <strong>Model Features</strong>\n                <p>• Living Room</p>\n                <p>• Dining Room</p>\n                <p>• Kitchen</p>\n                <p>• T &amp; B 1</p>\n                <p>• Service Area</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '0', '4', '0', '0', '', 'cam-basic.jpg', 'http://www.youtube.com/embed/ePbKGoIGAXY', '', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'arden', '', '1', '0', 'listingunit1.jpg', '--'), ('4', 'Fiona', '<p><strong>test</strong></p>\n', 'P5M - P10M', '', ' 68-sqm ', '96-sqm', '<p><strong>test</strong></p>\n', '{\"item\":[\"hmodel1.jpg\",\"hmodel2.jpg\"]}', '0', '8', '0', '0', '', 'cam-basic.jpg', 'http://www.youtube.com/embed/2e0wlm0wTQo', '', '{\"item\":[\"homeslide1.jpg\"]}', 'fiona', 'new', '1', '1', 'hmodel2.jpg', '2 Bedroom');
COMMIT;

-- ----------------------------
--  Table structure for `locations`
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_add` varchar(225) NOT NULL,
  `enable` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `locations`
-- ----------------------------
BEGIN;
INSERT INTO `locations` VALUES ('1', 'Baguio', '1', '2016-12-06 14:31:59'), ('2', 'Bulacan', '1', '2016-12-06 14:32:02'), ('3', 'Cavite', '1', '2016-12-06 14:32:21'), ('4', 'Gil Puyat Ave., Pasay', '1', '2016-12-06 14:32:37'), ('5', 'Laguna', '1', '2016-12-06 14:32:53'), ('6', 'Pampanga', '1', '2016-12-06 14:33:13'), ('7', 'Roxas Boulevard, Manila', '1', '2016-12-06 14:33:27'), ('8', 'Tagaytay', '1', '2016-12-06 14:33:41'), ('9', 'Valenzuela', '1', '2016-12-06 14:33:57'), ('10', 'Vito Cruz, Manila', '1', '2016-12-06 14:34:21'), ('11', 'Sta. Rosa, Laguna', '1', '2016-12-14 16:21:59'), ('12', 'San Jose del Monte, Bulacan', '1', '2016-12-14 16:45:04');
COMMIT;

-- ----------------------------
--  Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `page_id` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  `parent` int(10) NOT NULL,
  `menu_order` int(10) NOT NULL,
  `publish` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `url_link` varchar(500) NOT NULL,
  `group_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `menu_group`
-- ----------------------------
DROP TABLE IF EXISTS `menu_group`;
CREATE TABLE `menu_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `menu_group`
-- ----------------------------
BEGIN;
INSERT INTO `menu_group` VALUES ('1', 'Main Menu', 'Main Top Menu', '2016-08-03 01:02:03'), ('2', 'Footer Menu', 'footer menu bottom menu', '2016-08-03 04:05:06');
COMMIT;

-- ----------------------------
--  Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `mod_type` varchar(255) NOT NULL,
  `page_visible` int(50) NOT NULL,
  `publish` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `mod_type_id` int(50) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `ordering` int(10) NOT NULL,
  `mod_data` longtext NOT NULL,
  `show_title` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `news_events`
-- ----------------------------
DROP TABLE IF EXISTS `news_events`;
CREATE TABLE `news_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `published` int(11) NOT NULL,
  `date_published` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `image` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `news_events`
-- ----------------------------
BEGIN;
INSERT INTO `news_events` VALUES ('1', 'Gisele Town House Product Briefing - Moldex New City', '<p>Gisele Town House Product Briefing &bull; Moldex New City</p>\n', 'Events', '1', '2016-12-14 00:00:00', '2016-12-07 15:43:25', 'welcome-moldex-new-city.jpg', '', 'gisele-town-house-product-briefing-moldex-new-city'), ('2', 'Pool Inauguration & Blessing - MetroGate Centara Tagaytay', '<p>Cool weather and the scenic natural beauty of Tagaytay greeted guests during the luau-themed event of the pool blessing and inauguration at <a href=\"http://moldexrealty.ph/projects/projects.php?prop_name=MetrogateCentaraTagaytay\">MetroGate Centara Tagaytay</a>. Moldex executives, officers, and sales heads who graced the event also attended the groundbreaking of the Ivanah house model.<br />\n&nbsp;</p>\n\n<p><a href=\"http://moldexrealty.ph/projects/projects.php?prop_name=MetrogateCentaraTagaytay\">MetroGate Centara Tagaytay</a> is a serene community and one of Moldex Realty&rsquo;s most successful projects in Tagaytay, perfect for families who love to bond and enjoy weekend escapes away from the city.<br />\n&nbsp;</p>\n\n<p>To learn more about <a href=\"http://moldexrealty.ph/projects/projects.php?prop_name=MetrogateCentaraTagaytay\">MetroGate Centara Tagaytay</a> and other quality South of Manila residential developments of Moldex Realty or to schedule a site visit, send us a message with these details:<br />\n&nbsp;</p>\n\n<p>Name:<br />\nEmail Address:<br />\nContact No(s):<br />\n&nbsp;</p>\n\n<p>You may also get in touch with us through<br />\nText: 917-7178880<br />\nCall: (02)-7178880<br />\nFacebook: <a href=\"https://www.facebook.com/MoldexRealty.Official/\" target=\"_blank\">facebook.com/MoldexRealty.Official</a></p>\n\n<p>&nbsp;</p>\n', 'event', '1', '2016-12-07 00:00:00', '2016-12-07 15:34:53', 'centara-pool-inauguration.jpg', '', 'pool-inauguration-blessing-metrogate-centara-tagaytay'), ('3', 'Moldex Realty welcomes His Holiness Pope Francis', '<p><img src=\"moldex/includes/uploads/drone-1.jpg\"></p>', 'updates', '1', '2016-12-07 15:43:28', '2016-12-07 15:43:30', 'drone-1.jpg', '', 'moldexrealty-welcomes-his-holiness-pope-francis'), ('4', 'Metrogate Dasmarinas Inauguration of Playground and Basketball Court', '', 'event', '1', '2015-12-13 15:59:28', '2016-12-07 15:59:45', 'metrogate-inaguration.jpg', '', 'metrogate-dasmarinas-inauguration-of-playground-and-basketball-court'), ('5', 'Moldex Realty turns over units of Moldex Residences Baguio’s Aspen Tower to condo owners', '<p>Moldex Realty recently held the turnover &amp; blessing ceremonies to unit owners of <a href=\"http://moldexrealty.ph/projects/get.php?prop_name=MoldexResidencesBaguio\" target=\"_self\">Moldex Residences Baguio&rsquo;s</a> Aspen Tower.</p>\n\n<p>&nbsp;</p>\n\n<p>Located on a very strategic location along Ben Palispis Highway ( formerly Marcos Highway ), European Alps-inspired <a href=\"http://moldexrealty.ph/projects/get.php?prop_name=MoldexResidencesBaguio\" target=\"_self\">Moldex Residences Baguio</a> is Moldex Realty&rsquo;s premier development in the City of Pines and the second mid-rise condominium project under the Moldex Residences Series.&nbsp;<br />\n&nbsp;</p>\n\n<p>To learn more about <a href=\"http://moldexrealty.ph/projects/get.php?prop_name=MoldexResidencesBaguio\" target=\"_self\">Moldex Residences Baguio</a> and other quality condominium developments of Moldex Realty or to schedule a site visit, send us a message with these details:<br />\n&nbsp;</p>\n\n<p>Name:<br />\nEmail Address:<br />\nContact No(s):<br />\n&nbsp;</p>\n\n<p>You may also get in touch with us through<br />\nText: 917-7178880<br />\nCall: (02)-7178880<br />\nFacebook: <a href=\"https://www.facebook.com/MoldexRealty.Official/\" target=\"_self\">facebook.com/MoldexRealty.Official</a><br />\n&nbsp;</p>\n', '', '1', '2016-12-15 00:00:00', '2016-12-15 13:26:13', 'aspen-turnover-ceremonies1.jpg', '', 'moldex-realty-turns-over-units-of-moldex-residences-baguios-aspen-tower-to-condo-owners'), ('6', 'Moldex Realty wants you to be part of our team.', '<p>Join the Brokers Accreditation and Project Orientation of Grand Riviera Suites, the newest 55-storey landmark in the City of Manila. See you on Friday, 28-August 2015 at the Mezzanine - Golden Empire Tower Showroom along Roxas Boulevard corner Padre Faura Street, Manila. We</p>\n', '', '1', '2016-12-15 00:00:00', '2016-12-15 14:23:25', 'moldex-broker-accreditation.jpg', '', 'moldex-realty-wants-you-to-be-part-of-our-team'), ('7', 'Outdoor Challenge Philippines comes to Metrogate Silang Estates', '<p><img alt=\"\" src=\"/moldex/includes/uploads/metrogate-silang-estates-offroad.jpg\" /></p>\n', '', '1', '2016-12-12 00:00:00', '2016-12-15 14:30:54', 'metrogate-silang-estates-offroad.jpg', '', 'outdoor-challenge-philippines-comes-to-metrogate-silang-estates'), ('8', 'Topping Off ASPEN Building & Grand Open House Moldex Residences Baguio', '<p><img alt=\"\" src=\"/moldex/includes/uploads/topping-off-moldex-residences-baguio.jpg\" /></p>\n', '', '1', '2016-12-11 00:00:00', '2016-12-15 14:32:36', 'topping-off-moldex-residences-baguio.jpg', '', 'topping-off-aspen-building--grand-open-house-moldex-residences-baguio');
COMMIT;

-- ----------------------------
--  Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `template` varchar(50) NOT NULL,
  `metatags` text NOT NULL,
  `date` datetime NOT NULL,
  `publish` int(10) NOT NULL DEFAULT '0',
  `page_type` varchar(100) NOT NULL,
  `com_layout` varchar(100) NOT NULL,
  `options` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `pages`
-- ----------------------------
BEGIN;
INSERT INTO `pages` VALUES ('1', 'HOME', 'default', '{\"title\":\"projects\",\"description\":\"Real Estate Investments in the Philippines | Moldex Realty Incorporated has made its mark in the real estate industry through the introduction of quality residential subdivisions and housing projects. One of the country\'s leading property developer engaged in both vertical and horizontal developments. It carries the brand of excellence of the Moldex Group of Companies.\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments,philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-01 16:21:23', '1', 'projects', 'location', ''), ('3', 'Projects', 'component', '{\"title\":\"projects\",\"description\":\"projects\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-02 14:17:48', '1', 'projects', 'projects', ''), ('4', 'About Us', 'default', '{\"title\":\"About Us\",\"description\":\"We provide reliable and affordable real estate products to uplift the Filipino lifestyle.\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-07 14:06:17', '1', 'content', 'aboutus', ''), ('5', 'News', 'default', '{\"title\":\"News\",\"description\":\"news\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-07 15:20:33', '1', 'news', 'list', ''), ('6', 'Leasing', 'inner', '{\"title\":\"Leasing\",\"description\":\"Your home should be a reflection of who you are. Choose the living space fit for your family - from condo units to two-storey houses.\n\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-12 15:07:44', '1', 'leasing', 'home', ''), ('7', 'Careers', 'inner', '{\"title\":\"Careers\",\"description\":\"<p> Careers <\\/p>\\n\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-14 11:39:44', '1', 'careers', 'list', ''), ('8', 'Inquiry', 'inner', '{\"title\":\"Inquiry\",\"description\":\"<p> Inquiry <\\/p>\\n\",\"keywords\":\"condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna\",\"image\":\"homeslide1.jpg\"}', '2016-12-14 13:33:58', '1', 'inquiry', 'inquiry', '');
COMMIT;

-- ----------------------------
--  Table structure for `project_location`
-- ----------------------------
DROP TABLE IF EXISTS `project_location`;
CREATE TABLE `project_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `orderby` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `proj_banner` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `project_location`
-- ----------------------------
BEGIN;
INSERT INTO `project_location` VALUES ('1', 'North of Manila', 'north-of-manila', '', '', '1', '1', '2016-12-20 14:00:33', 'proj-bg.jpg'), ('2', 'Heart of Manila', 'heart-of-manila', '', '', '2', '1', '2016-12-20 14:01:10', 'proj-bg.jpg'), ('3', 'South of Manila', 'south-of-manila', '', '', '3', '1', '2016-12-20 14:01:20', 'proj-bg.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `project_type`
-- ----------------------------
DROP TABLE IF EXISTS `project_type`;
CREATE TABLE `project_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `location_id` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `alias` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `project_type`
-- ----------------------------
BEGIN;
INSERT INTO `project_type` VALUES ('1', 'Condominiums', '0', '1', '2016-12-02 10:19:44', 'condominiums'), ('2', 'Subdivisions', '0', '1', '2016-12-02 10:19:49', 'subdivisions'), ('3', 'Business Centers', '0', '1', '2016-12-02 10:19:53', 'business');
COMMIT;

-- ----------------------------
--  Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(225) NOT NULL,
  `location_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `size` varchar(100) NOT NULL,
  `location` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `location_desc` text NOT NULL,
  `long_lat` varchar(100) NOT NULL,
  `site_dev_plan` varchar(225) NOT NULL,
  `floor_dev_plan` varchar(100) NOT NULL,
  `amen_fea_desc` text NOT NULL,
  `gallery` text NOT NULL,
  `enable` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `metadata` text NOT NULL,
  `alias` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL,
  `project_type` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `floor_gallery` text NOT NULL,
  `banners` text NOT NULL,
  `tile` varchar(100) NOT NULL,
  `leasing` int(11) NOT NULL DEFAULT '0',
  `featured_leasing` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `projects`
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('1', 'Moldex Baguio', '2', '<p>Resort-inspired communities made up of mid-rise condominium buildings that lets residents be one with nature.</p>', '706 sq.ft.', '2', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '16.3976261,120.5801923', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n                <p>Find solace within your own urban sanctuary.</p>\n                <br>\n                <p>• Big spacious rooms (sample only)</p>\n                <p>• Clubhouse (sample only)</p>\n                <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 11:53:21', '', 'moldex-baguio', 'featured', '2', 'moldex-BG-logo.jpg', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile1.jpg', '0', '0'), ('2', 'MetroGate San Jose', '2', '<p>Metrogate San Jose is an 88.3-hectare residential development that fulfills the lifestyle and aspirations of families</p>', '706 sq.ft.', '2', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.7609288,120.9696636', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n                <p>Find solace within your own urban sanctuary.</p>\n                <br>\n                <p>• Big spacious rooms (sample only)</p>\n                <p>• Clubhouse (sample only)</p>\n                <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 11:53:25', '', 'metrogate-san-jose', 'new', '2', 'moldex-BG-logo.jpg', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile2.jpg', '0', '0'), ('3', 'The Grand Towers Manila', '2', '<p>Soaring high in one of the most strategic spots in Manila is Moldex Realty’s 47-storey twin tower condominium development along</p>', '706 sq.ft.', '10', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.5616453,120.9947786', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n                <p>Find solace within your own urban sanctuary.</p>\n                <br>\n                <p>• Big spacious rooms (sample only)</p>\n                <p>• Clubhouse (sample only)</p>\n                <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 14:00:39', '', 'the-grand-towers-manila', 'featured', '1', 'gtlogo.jpg', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'main3.jpg', '1', '0'), ('4', 'Metrogate Primavera', '3', '<p>Moldex Realty\'s 9-hectare Metrogate Primavera is one of the upscale residential developments in the industrial zone of progressive Sta. Rosa, Laguna.</p><p>It is accessible via South Luzon Expressway through Mamplasan Exit or Sta. Rosa Exit. This gated neighborhood is tucked away from the hustle and bustle of the city and is embraced by wide open spaces, and blessed by lush vegetation and a flowing stream that runs through the property.</p>', '9.5 Hectares', '11', '28845', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.30961,121.099646,', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<div class=\"row\">\n<div class=\"col-md-6\">\n<h3>Features</h3>\n\n<br>\n<p>• Main Entrance Gate with Guard House</p>\n<p>• 24-hour Security Service</p>\n<p>• Landscape Pocket Parks</p>\n<p>• Bicycle Lane</p>\n<p>• Centralized Water Supply</p>\n<p>• Lighted Streets & Open Spaces</p>\n<p>• Perimeter Fence</p>\n<p>• Concrete Roads & Gutter</p>\n</div>\n<div class=\"col-md-6\">\n<h3>Amenities</h3>\n<br>\n<p>• Clubhouse</p>\n<p>• Adult & Kiddie Pool</p>\n<p>• Fitness Gym</p>\n<p>• Function Hall</p>\n<p>• Basketball Court</p>\n<p>• Jogging Path</p>\n<p>• Children\'s Playground</p>\n<p>• Gazebo</p>\n</div>\n</div>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 14:03:29', '', 'metrogate-primavera', 'featured', '2', 'moldex-BG-logo.jpg', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile4.jpg', '0', '0'), ('5', 'Metrogate Tagaytay Estates', '3', '<p>Come home to Metrogate Tagaytay Estates\' relaxed and serene sophistication. Find yourself kissed by the cool weather and embraced</p>', '706 sq.ft.', '3', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.1177018,120.9284261', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n                <p>Find solace within your own urban sanctuary.</p>\n                <br>\n                <p>• Big spacious rooms (sample only)</p>\n                <p>• Clubhouse (sample only)</p>\n                <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 14:04:28', '', 'metrogate-tagaytay-estates', 'featured', '2', 'heritagespringhomes-logo.png', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile5.jpg', '0', '0'), ('6', 'Metrogate Indang', '3', '<p>Metrogate Indang is an expansive residential subdivision that brings together small town charms and easy-living. This 29.5-hectare</p>', '706 sq.ft.', '3', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.2185284,120.8886075', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n                <p>Find solace within your own urban sanctuary.</p>\n                <br>\n                <p>• Big spacious rooms (sample only)</p>\n                <p>• Clubhouse (sample only)</p>\n                <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 14:05:24', '', 'metrogate-indang', 'new', '2', 'heritagespringhomes-logo.png', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile1.jpg', '0', '0'), ('7', 'Metrogate Dasmarinas', '3', '<p>Located along Governor\'s Drive in Cavite, a province known for its rich history, is Moldex Realty\'s 60.50 hectare premier resident</p>', '706 sq.ft.', '3', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.288487, 121.002726', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n                <p>Find solace within your own urban sanctuary.</p>\n                <br>\n                <p>• Big spacious rooms (sample only)</p>\n                <p>• Clubhouse (sample only)</p>\n                <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-05 14:06:15', '', 'metrogate-masmarinas', 'new', '2', 'heritagespringhomes-logo.png', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile3.jpg', '0', '0'), ('8', 'Heritage Spring Homes', '3', '<p>Great schools like De La Salle University - Canlubang, St. Scholastica\'s West Grove, Xavier School via Nuvali, and Adventist University of the Philippines are all just minutes away from Heritage Spring Homes.</p>', '706 sq.ft.', '8', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.2105855,121.0249', 'hsh.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n        <p>Find solace within your own urban sanctuary.</p>\n        <br>\n        <p>• Big spacious rooms (sample only)</p>\n        <p>• Clubhouse (sample only)</p>\n        <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-07 10:36:07', '', 'heritage-spring-homes', 'featured', '2', 'heritagespringhomes-logo.png', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile4.jpg', '0', '0'), ('9', '1322 Roxas Boulevard', '2', '<p>Great schools like De La Salle University - Canlubang, St. Scholastica\'s West Grove, Xavier School via Nuvali, and Adventist University of the Philippines are all just minutes away from Heritage Spring Homes.</p>', '706 sq.ft.', '7', '0123456789', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.576666,120.9796555', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<h3>Veer away from the busy central areas</h3>\n        <p>Find solace within your own urban sanctuary.</p>\n        <br>\n        <p>• Big spacious rooms (sample only)</p>\n        <p>• Clubhouse (sample only)</p>\n        <p>• Coffee Shop (sample only)</p>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-13 01:04:04', '', '1322-roxas-boulevard', 'new', '1', 'gtlogo.jpg', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'main1.jpg', '1', '0'), ('10', 'MetroGate San Jose', '1', '<p>Metrogate San Jose at Moldex New City is an 88.3-hectare residential development that fulfills the lifestyle and aspirations of families who want to strike a balance between modern comfort and a serene & lovely atmosphere.</p>', '88.3 Hectare', '12', 'Phase 1: #03105 / Phase 2: #08095 / Phase 3: #1138', '<h3>Perfect balance of city and resort-style living.</h3>\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n                <br> <strong>Nearby Establishments</strong>\n                <p>• SM Hypermarket (sample only)</p>', '14.8419199, 121.0367397', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<div class=\"row\">\n<div class=\"col-md-6\">\n<h3>Features</h3>\n\n<br>\n<p>• Main Entrance Gate with Guard House</p>\n<p>• 24-hour Security Service</p>\n<p>• Landscape Pocket Parks</p>\n<p>• Bicycle Lane</p>\n<p>• Centralized Water Supply</p>\n<p>• Lighted Streets & Open Spaces</p>\n<p>• Perimeter Fence</p>\n<p>• Concrete Roads & Gutter</p>\n</div>\n<div class=\"col-md-6\">\n<h3>Amenities</h3>\n<br>\n<p>• Clubhouse</p>\n<p>• Adult & Kiddie Pool</p>\n<p>• Fitness Gym</p>\n<p>• Function Hall</p>\n<p>• Basketball Court</p>\n<p>• Jogging Path</p>\n<p>• Children\'s Playground</p>\n<p>• Gazebo</p>\n</div>\n</div>', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '1', '2016-12-14 16:53:42', '', 'metrogate-san-jose', 'new', '2', 'moldex-BG-logo.jpg', '{\"item\":[\"filler.jpg\",\"filler.jpg\",\"filler.jpg\"]}', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'tile2.jpg', '0', '0'), ('11', 'Grand Riviera Suites', '2', '<p>The 55-storey condominium is everything Manila.</p>\n', '100 hectars', '10', '123456789', '<p>The 55-storey condominium is everything Manila.</p>\n', '14.576666, 120.9796555', 'mrb-siteplan.jpg', 'mrb-floorplan.jpg', '<div class=\"row\">\n<div class=\"col-md-6\">\n<h3>Features</h3>\n&nbsp;\n\n<p>&bull; Main Entrance Gate with Guard House</p>\n\n<p>&bull; 24-hour Security Service</p>\n\n<p>&bull; Landscape Pocket Parks</p>\n\n<p>&bull; Bicycle Lane</p>\n\n<p>&bull; Centralized Water Supply</p>\n\n<p>&bull; Lighted Streets &amp; Open Spaces</p>\n\n<p>&bull; Perimeter Fence</p>\n\n<p>&bull; Concrete Roads &amp; Gutter</p>\n</div>\n\n<div class=\"col-md-6\">\n<h3>Amenities</h3>\n&nbsp;\n\n<p>&bull; Clubhouse</p>\n\n<p>&bull; Adult &amp; Kiddie Pool</p>\n\n<p>&bull; Fitness Gym</p>\n\n<p>&bull; Function Hall</p>\n\n<p>&bull; Basketball Court</p>\n\n<p>&bull; Jogging Path</p>\n\n<p>&bull; Children&#39;s Playground</p>\n\n<p>&bull; Gazebo</p>\n</div>\n</div>\n', '', '1', '2016-12-16 17:20:19', '', 'grand-riviera-suites', 'new', '1', 'gtlogo.jpg', '', '{\"item\":[\"homeslide1.jpg\",\"homeslide1.jpg\"]}', 'main2.jpg', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `properties`
-- ----------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `enable` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `properties`
-- ----------------------------
BEGIN;
INSERT INTO `properties` VALUES ('1', 'Metrogate', 'horiproj-1.jpg', '<p>Envisioned to be important entry points to major cities, these communities provide residents with a refuge from the fast-paced urban life and the ease of access to it...</p>', '', '1', '2016-12-07 14:36:27');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
