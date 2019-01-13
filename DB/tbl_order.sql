-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `db_shop`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbl_order`
-- 

CREATE TABLE `tbl_order` (
  `order_id` int(5) unsigned zerofill NOT NULL auto_increment COMMENT 'รหัสการสั่งสินค้า',
  `customer_id` int(5) unsigned zerofill NOT NULL COMMENT 'รหัสของลูกค้าที่สั่งสินค้า',
  `newname` varchar(50) collate utf8_unicode_ci NOT NULL,
  `address_send` text collate utf8_unicode_ci NOT NULL,
  `district_id` int(5) NOT NULL,
  `prefecture_id` int(5) NOT NULL,
  `province_id` int(2) NOT NULL,
  `postcode` int(5) NOT NULL,
  `telephone_send` varchar(10) collate utf8_unicode_ci NOT NULL,
  `mail_send` varchar(50) collate utf8_unicode_ci NOT NULL,
  `paper_id` int(2) unsigned zerofill NOT NULL,
  `ribbon_id` int(2) unsigned zerofill NOT NULL,
  `order_date` date NOT NULL COMMENT 'วันที่ลูกค้าสั่งซื้อสินค้า',
  `order_status` int(1) NOT NULL,
  `delivery_id` varchar(13) collate utf8_unicode_ci NOT NULL default '-',
  `order_tc` int(2) NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางสั่งซื้อสินค้า' AUTO_INCREMENT=74 ;

-- 
-- dump ตาราง `tbl_order`
-- 

UPDATE `tbl_order` SET `order_id` = 00001, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 01, `ribbon_id` = 02, `order_date` = '2014-03-27', `order_status` = 4, `delivery_id` = '2342341242354', `order_tc` = 1 WHERE  `tbl_order`.`order_id` = 00001;
UPDATE `tbl_order` SET `order_id` = 00002, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14/106', `district_id` = 6431, `prefecture_id` = 724, `province_id` = 50, `postcode` = 724, `telephone_send` = '0826574298', `mail_send` = 'finalfast_1412@live.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2014-03-27', `order_status` = 4, `delivery_id` = '5464645342354', `order_tc` = 1 WHERE  `tbl_order`.`order_id` = 00002;
UPDATE `tbl_order` SET `order_id` = 00003, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 01, `ribbon_id` = 03, `order_date` = '2014-03-27', `order_status` = 4, `delivery_id` = '2342354353452', `order_tc` = 2 WHERE  `tbl_order`.`order_id` = 00003;
UPDATE `tbl_order` SET `order_id` = 00004, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14/106', `district_id` = 6418, `prefecture_id` = 721, `province_id` = 50, `postcode` = 721, `telephone_send` = '3242341231', `mail_send` = 'finalfast_1412@live.com', `paper_id` = 01, `ribbon_id` = 01, `order_date` = '2014-03-27', `order_status` = 4, `delivery_id` = '3453465768768', `order_tc` = 2 WHERE  `tbl_order`.`order_id` = 00004;
UPDATE `tbl_order` SET `order_id` = 00005, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 01, `ribbon_id` = 02, `order_date` = '2014-03-27', `order_status` = 4, `delivery_id` = '4353485649836', `order_tc` = 1 WHERE  `tbl_order`.`order_id` = 00005;
UPDATE `tbl_order` SET `order_id` = 00006, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2014-03-27', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00006;
UPDATE `tbl_order` SET `order_id` = 00007, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2014-03-27', `order_status` = 3, `delivery_id` = '-', `order_tc` = 1 WHERE  `tbl_order`.`order_id` = 00007;
UPDATE `tbl_order` SET `order_id` = 00008, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2014-04-05', `order_status` = 1, `delivery_id` = '-', `order_tc` = 1 WHERE  `tbl_order`.`order_id` = 00008;
UPDATE `tbl_order` SET `order_id` = 00009, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2014-04-06', `order_status` = 6, `delivery_id` = '-', `order_tc` = 2 WHERE  `tbl_order`.`order_id` = 00009;
UPDATE `tbl_order` SET `order_id` = 00010, `customer_id` = 00001, `newname` = 'จักรกฤช เอี่ยมสอาด', `address_send` = '14106', `district_id` = 377, `prefecture_id` = 68, `province_id` = 4, `postcode` = 68, `telephone_send` = '0826574298', `mail_send` = 'finalff7_1412@windowslive.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2014-04-06', `order_status` = 5, `delivery_id` = '-', `order_tc` = 2 WHERE  `tbl_order`.`order_id` = 00010;
UPDATE `tbl_order` SET `order_id` = 00011, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 10, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-02-03', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00011;
UPDATE `tbl_order` SET `order_id` = 00012, `customer_id` = 00007, `newname` = 'ศรัณยู ดำคชรัตน์', `address_send` = '1124/288 เสนานิคม 1 ซอย 26 แยก 5', `district_id` = 181, `prefecture_id` = 30, `province_id` = 1, `postcode` = 30, `telephone_send` = '0896564753', `mail_send` = 'Sarunyou_Damkotcharat@hotmail.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-02-04', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00012;
UPDATE `tbl_order` SET `order_id` = 00013, `customer_id` = 00007, `newname` = 'ศรัณยู ดำคชรัตน์', `address_send` = '1124/288 เสนานิคม 1 ซอย 26 แยก 5', `district_id` = 183, `prefecture_id` = 30, `province_id` = 1, `postcode` = 30, `telephone_send` = '0896564753', `mail_send` = 'Sarunyou_Damkotcharat@hotmail.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-02-04', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00013;
UPDATE `tbl_order` SET `order_id` = 00014, `customer_id` = 00020, `newname` = 'bank', `address_send` = 'asdasda', `district_id` = 191, `prefecture_id` = 33, `province_id` = 1, `postcode` = 33, `telephone_send` = '0952111111', `mail_send` = 'asd@hotmail.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-08-22', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00014;
UPDATE `tbl_order` SET `order_id` = 00015, `customer_id` = 00021, `newname` = 'ddddd', `address_send` = 'dssdsds', `district_id` = 191, `prefecture_id` = 33, `province_id` = 1, `postcode` = 33, `telephone_send` = '0695852222', `mail_send` = 'aaaaaaa', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-08-27', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00015;
UPDATE `tbl_order` SET `order_id` = 00071, `customer_id` = 00044, `newname` = 'abc', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00071;
UPDATE `tbl_order` SET `order_id` = 00070, `customer_id` = 00043, `newname` = 'aa', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00070;
UPDATE `tbl_order` SET `order_id` = 00069, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00069;
UPDATE `tbl_order` SET `order_id` = 00068, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00068;
UPDATE `tbl_order` SET `order_id` = 00067, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00067;
UPDATE `tbl_order` SET `order_id` = 00066, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00066;
UPDATE `tbl_order` SET `order_id` = 00065, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00065;
UPDATE `tbl_order` SET `order_id` = 00017, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00017;
UPDATE `tbl_order` SET `order_id` = 00016, `customer_id` = 00006, `newname` = '', `address_send` = '', `district_id` = 0, `prefecture_id` = 0, `province_id` = 0, `postcode` = 0, `telephone_send` = '', `mail_send` = '', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-01', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00016;
UPDATE `tbl_order` SET `order_id` = 00072, `customer_id` = 00045, `newname` = 'ww', `address_send` = 'wwww', `district_id` = 1246, `prefecture_id` = 155, `province_id` = 12, `postcode` = 155, `telephone_send` = '1123', `mail_send` = 'ww', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2018-09-17', `order_status` = 3, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00072;
UPDATE `tbl_order` SET `order_id` = 00073, `customer_id` = 00046, `newname` = 'Manomai', `address_send` = 'Wat Nam Dang', `district_id` = 270, `prefecture_id` = 54, `province_id` = 2, `postcode` = 54, `telephone_send` = '0912345678', `mail_send` = 'abcdefg@gmail.com', `paper_id` = 00, `ribbon_id` = 00, `order_date` = '2019-01-13', `order_status` = 0, `delivery_id` = '-', `order_tc` = 0 WHERE  `tbl_order`.`order_id` = 00073;
