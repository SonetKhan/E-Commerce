/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.26 : Database - mobile_project
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mobile_project` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mobile_project`;

/*Table structure for table `card_info` */

CREATE TABLE `card_info` (
  `ses_id` VARCHAR(100) DEFAULT NULL,
  `productID` VARCHAR(30) DEFAULT NULL,
  `Quentity` DOUBLE DEFAULT NULL,
  `product_price` DOUBLE DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=latin1;

/*Data for the table `card_info` */

INSERT  INTO `card_info`(`ses_id`,`productID`,`Quentity`,`product_price`) VALUES ('l19frlb9k0bcl0vo70qd643qtq','CAT-002-PRO-0001',6,120000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',5,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-003-PRO-0001',4,1000000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-001-PRO-0001',1,10000),('l19frlb9k0bcl0vo70qd643qtq','CAT-002-PRO-0001',1,120000),('l19frlb9k0bcl0vo70qd643qtq','CAT-002-PRO-0001',1,120000),('l19frlb9k0bcl0vo70qd643qtq','CAT-002-PRO-0001',1,120000),('mk5dno7m3p3upur504eb7cobln','CAT-001-PRO-0001',1,10000);

/*Table structure for table `category_info` */

CREATE TABLE `category_info` (
  `cat_id` VARCHAR(10) NOT NULL,
  `cat_name` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `category_info` */

INSERT  INTO `category_info`(`cat_id`,`cat_name`) VALUES ('CAT-001','Apple'),('CAT-002','Samsung'),('CAT-003','HUAWEI'),('CAT-004','GOOGLE'),('CAT-005','SONY'),('CAT-006','NOKIA'),('CAT-007','Honor'),('CAT-008','Razer'),('CAT-009','LG'),('CAT-010','OnePLus'),('CAT-011','Doro'),('CAT-012','Motorola'),('CAT-013','CAT'),('CAT-014','ZTE'),('CAT-015','BlackBerry'),('CAT-016','Xiaomi'),('CAT-017','Alcatel'),('CAT-018','Vodafone'),('CAT-019','Acer'),('CAT-020','Binatone'),('CAT-021','Wileyfox'),('CAT-022','Oppo');

/*Table structure for table `customer_info` */

CREATE TABLE `customer_info` (
  `customer_id` VARCHAR(10) NOT NULL,
  `cus_name` VARCHAR(100) CHARACTER SET utf8 DEFAULT NULL,
  `cus_address` VARCHAR(250) DEFAULT NULL,
  `cus_phone` VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `customer_info` */

INSERT  INTO `customer_info`(`customer_id`,`cus_name`,`cus_address`,`cus_phone`) VALUES ('CUS-000001','Md Nasir Uddin','34/7 chamelibag, dhaka','01725874024'),('CUS-000002','shadin','314 Ullon Road Rampura Dhaka-1217 Bangladesh','01978324152'),('CUS-000003','Md Shihab Uddin','32/2 Santinagor, dhaka-1212','01931710994'),('CUS-000004','Md Billal Hossain','32/2 chemelibag, Santinagor,Dhaka-1212','01770577114'),('CUS-000005','Mohammad ALi','West Rampura,Dhaka','01738908363'),('CUS-000006','Md Moniruzzaman Monir','Master Bari,Gazipur,Dhaka','07115553967'),('CUS-000007','Md Masum Sordar','Purabari,Muna,Gazipur','01915264012'),('CUS-000008','Arefin Hiya','Technical Road,Mymensinh','01682122565'),('CUS-000009','Afsana Jahan MIMI','Jamalpur Chak,Jamalpur','01851188456'),('CUS-000010','Suraiya Shimu','Islampur-2, Jamalpur','01709759288'),('CUS-000011','Jaydeb Chandra Ray','Technical Road,Chittogang','01994700767'),('CUS-000012','Nur Islam','Kuril road, gulshan','01725874024');

/*Table structure for table `order_detail` */

CREATE TABLE `order_detail` (
  `order_id` varchar(10) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_detail` */

insert  into `order_detail`(`order_id`,`product_id`,`quantity`,`price`) values ('ODR-0002','CAT-001-PRO-0001',10,1000),('ODR-0002','CAT-001-PRO-0002',100,100000),('ODR-0002','CAT-002-PRO-0002',1000,1),('ODR-0003','CAT-004-PRO-0003',10,1000);

/*Table structure for table `order_info` */

CREATE TABLE `order_info` (
  `order_id` varchar(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `customer_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_info` */

insert  into `order_info`(`order_id`,`order_date`,`customer_id`) values ('ODR-0002','2019-11-25','CUS-000002'),('ODR-0003','2019-11-25','CUS-000003');

/*Table structure for table `product_info` */

CREATE TABLE `product_info` (
  `cat_id` varchar(10) DEFAULT NULL,
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `description` text,
  `product_price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `showProduct` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_info` */

insert  into `product_info`(`cat_id`,`product_id`,`product_name`,`description`,`product_price`,`stock`,`showProduct`) values ('Acer','CAT-001-PRO-0001','Acer Liquid Z6 Plus','\r\n\r\n    Display 5.50-inch (1920x1080)\r\n    Processor MediaTek MT6753\r\n    Front Camera 5MP\r\n    Rear Camera 13MP\r\n    RAM 3GB\r\n    Storage 32GB\r\n    Battery Capacity 4080mAh\r\n    OS Android 6.0\r\n\r\n',2000,10,'YES'),('Alcatel','CAT-001-PRO-0002','Alcatel 3X (2019)','\r\n\r\n    Display 6.50-inch (720x1600)\r\n    Processor MediaTek Helio P23\r\n    Front Camera 8MP\r\n    Rear Camera 16MP + 8MP + 5MP\r\n    RAM 4GB\r\n    Storage 64GB\r\n    Battery Capacity 4000mAh\r\n    OS Android Pie\r\n\r\n',10000,5,'NO'),('Alcatel','CAT-001-PRO-0003',' Alcatel 1c (2019) ','\r\n\r\n    Display 5.30-inch (480x960)\r\n    Processor Spreadtrum SC7731E\r\n    Front Camera 2MP\r\n    Rear Camera 5MP\r\n    RAM 1GB\r\n    Storage 8GB\r\n    Battery Capacity 2000mAh\r\n    OS Android 8.1\r\n\r\n',20000,6,'NO');

/*Table structure for table `user_info` */

CREATE TABLE `user_info` (
  `user_name` varchar(20) DEFAULT NULL,
  `user_contact` varchar(20) DEFAULT NULL,
  `user_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_info` */

insert  into `user_info`(`user_name`,`user_contact`,`user_pass`) values ('shihab','123456789','*0663F44939D0D10260CDD6E9BDEC3372B23D6712'),('shihab','01738908363','*69FD5AD9B0F140616DCE043C40808C85F64E9A8D');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
