/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.2.14-MariaDB : Database - pendaftaran-klinik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pendaftaran-klinik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pendaftaran-klinik`;

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id`,`id_dokter`,`nama`,`spesialis`) values 
(2,'DKS453','Ahmad Yuda Setiawan','Jantung'),
(5,'DKS476','Johan Aldi Saputro','Mata'),
(6,'DKS332','Surya Adi Laksono','Kulit');

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(25) NOT NULL,
  `poliklinik` varchar(100) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `jam_praktek_awal` time NOT NULL DEFAULT current_timestamp(),
  `jam_praktek_akhir` time NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id`,`id_dokter`,`poliklinik`,`dokter`,`spesialis`,`hari`,`jam_praktek_awal`,`jam_praktek_akhir`) values 
(1,'dks332','poli mata','surya adi laksono','Mata','Selasa','08:20:00','22:22:55'),
(4,'DKS453','poli jantung','ahmad yuda','Jantung','Kamis','13:15:00','15:30:00'),
(5,'DKS473','poli anak','putri antika raya','anak','Sabtu','09:15:00','11:10:00'),
(6,'dks221','THT','dr.roni gunawan','THT','Senin','09:30:00','16:45:00');

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code_daftar` varchar(50) NOT NULL,
  `code_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_periksa` date NOT NULL DEFAULT current_timestamp(),
  `poliklinik` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`id_pasien`),
  UNIQUE KEY `id_pendaftaran` (`code_rm`),
  UNIQUE KEY `no_rm` (`code_rm`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `pendaftaran` */

insert  into `pendaftaran`(`id`,`code_daftar`,`code_rm`,`id_pasien`,`nama`,`tgl_periksa`,`poliklinik`) values 
(3,'DF34219','RM08','EUO985174302','Bani Saputra','2022-02-28','Poli Mata'),
(4,'DF58260','RM03','0','Wulan Putri','2022-02-23','Poli Mata'),
(5,'DF97218','RM02','0','Johan Aldi','2022-02-24','poli jantung'),
(6,'DF07618','RM05','0','Agung','2022-02-26','Poli Jantung'),
(10,'DF25469','RM23','JGO479218056','putri aulia','2024-01-15','THT');

/*Table structure for table `poliklinik` */

DROP TABLE IF EXISTS `poliklinik`;

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_poliklinik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_poliklinik` (`id_poliklinik`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `poliklinik` */

insert  into `poliklinik`(`id`,`id_poliklinik`,`nama`) values 
(5,'PL01','Poli Gigi'),
(6,'PL02','Poli Jantung'),
(7,'PL03','Poli Anak');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT current_timestamp(),
  `agama` varchar(25) NOT NULL,
  `usia` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`id_user`,`nama`,`tgl_lahir`,`agama`,`usia`,`alamat`,`email`,`level`,`password`) values 
(1,'EUO985174302','bani saputra','2022-02-02','Islam',18,'Surabaya','bani.s26shafa@gmail.com','staff','1234'),
(5,'JGO479218056','Putri Aulia','2000-10-12','Katholik',21,'Boyolali','putri@gmail.com','Pasien','1234'),
(6,'XRL103954726','Bambang Aji','1999-11-01','Islam',22,'Klaten','bambang@gmail.com','Pasien','1234'),
(7,'WUR609831257','Surya Adi Laksono','1999-01-12','Kristen',23,'Surakarta','surya@gmail.com','Pasien','1234'),
(8,'TLD625304871','Johan Aldi Saputro','2000-12-22','Islam',21,'Boyolali','Johan@gmail.com','Pasien','1234'),
(9,'ZPQ680257493','Andika Muhammad','2000-05-14','Islam',21,'Kartasura','andika@gmail.com','Pasien','1234'),
(10,'ABS726518043','Linda Ayu','1999-01-11','Kristen',22,'Wonogiri','linda@gmail.com','Pasien','1234'),
(12,'GBQ174206938','Joko Susilo','2001-02-18','Kristen',22,'Karanganyar','joko@gmail.com','Pasien','123joko'),
(13,'AZB537180469','John Martin','2000-09-21','Kristen',22,'unknow location','johnm@gmail.com','Pasien','1234');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
