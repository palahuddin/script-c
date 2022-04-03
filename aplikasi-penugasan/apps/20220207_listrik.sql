-- MySQL dump 10.13  Distrib 5.7.36, for Linux (x86_64)
--
-- Host: localhost    Database: listrik
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblogin`
--

DROP TABLE IF EXISTS `tblogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblogin` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `level` varchar(2) NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_user`),
  UNIQUE KEY `Username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblogin`
--

LOCK TABLES `tblogin` WRITE;
/*!40000 ALTER TABLE `tblogin` DISABLE KEYS */;
INSERT INTO `tblogin` VALUES (1,'fazadmin','asd','Administrator','0','99999999','default.svg'),(2,'99322','asd','Rafa Zaidan Firdaus','1','081290846864','default.svg'),(3,'99675','asd','Fathan Firdaus','1','089636286933','default.svg'),(5,'10843','asd','Ade Firmansyah','2','0877876545','default.svg'),(6,'10743','asd','Kamil Alghifari','2','08561744244','default.svg'),(7,'10427','asd','Cicih','2','08776654654','default.svg'),(8,'10418','asd','Risyad Fadhilah','2','085217345678','default.svg'),(9,'10586','asd','Ahmad Syahroni','2','085617567654','default.svg'),(11,'10490','asd','Issak Ramadhani','2','081310467890','default.svg');
/*!40000 ALTER TABLE `tblogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpelanggan`
--

DROP TABLE IF EXISTS `tbpelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpelanggan` (
  `KodePelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `NoPelanggan` varchar(10) NOT NULL,
  `NoMeter` varchar(18) NOT NULL,
  `KodeTarif` int(11) NOT NULL,
  `NamaLengkap` varchar(80) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`KodePelanggan`),
  UNIQUE KEY `NoPelanggan` (`NoPelanggan`),
  KEY `KodeTarif` (`KodeTarif`),
  CONSTRAINT `tbpelanggan_ibfk_1` FOREIGN KEY (`KodeTarif`) REFERENCES `tbtarif` (`KodeTarif`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpelanggan`
--

LOCK TABLES `tbpelanggan` WRITE;
/*!40000 ALTER TABLE `tbpelanggan` DISABLE KEYS */;
INSERT INTO `tbpelanggan` VALUES (1,'10418','4555786567',5,'Risyad Fadhilah','085217345678','Ciputat'),(2,'10586','4555778445',1,'Ahmad Syahroni','085617567654','Babakan'),(3,'10427','4555676543',4,'Cicih','08776654654','Kedaung'),(4,'10490','4555786568',5,'Issak Ramadhani','081310467890','Citayem');
/*!40000 ALTER TABLE `tbpelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpembayaran`
--

DROP TABLE IF EXISTS `tbpembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpembayaran` (
  `KodePembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `KodeTagihan` int(11) NOT NULL,
  `TglBayar` date NOT NULL,
  `JumlahTagihan` double(10,0) NOT NULL,
  `BuktiPembayaran` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `NoTagihan` varchar(10) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`KodePembayaran`),
  KEY `KodeTagihan` (`KodeTagihan`),
  CONSTRAINT `tbpembayaran_ibfk_1` FOREIGN KEY (`KodeTagihan`) REFERENCES `tbtagihan` (`KodeTagihan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpembayaran`
--

LOCK TABLES `tbpembayaran` WRITE;
/*!40000 ALTER TABLE `tbpembayaran` DISABLE KEYS */;
INSERT INTO `tbpembayaran` VALUES (1,1,'2022-01-11',1000000,'ttd-digital.png','Belum','IHDPYK','Ahmad Syahroni'),(2,2,'2022-01-11',1000,'SKKNI.pdf','Sudah','V1JKPR','Cicih');
/*!40000 ALTER TABLE `tbpembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbregister`
--

DROP TABLE IF EXISTS `tbregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbregister` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `level` varchar(2) NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`kd_user`),
  UNIQUE KEY `Username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbregister`
--

LOCK TABLES `tbregister` WRITE;
/*!40000 ALTER TABLE `tbregister` DISABLE KEYS */;
INSERT INTO `tbregister` VALUES (1,'10427','asd','Cicih','2','08776654654',NULL,'1'),(2,'10843','asd','Ade Firmansyah','2','0877876545',NULL,'1'),(3,'10743','asd','Kamil Alghifari','2','08561744244',NULL,'1'),(4,'10418','asd','Risyad Fadhilah','2','085217345678','default.svg','1'),(5,'10586','asd','Ahmad Syahroni','2','085617567654','default.svg','1'),(6,'10490','asd','Issak Ramadhani','2','081310467890',NULL,'1');
/*!40000 ALTER TABLE `tbregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtagihan`
--

DROP TABLE IF EXISTS `tbtagihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtagihan` (
  `KodeTagihan` int(11) NOT NULL AUTO_INCREMENT,
  `NoTagihan` varchar(10) NOT NULL,
  `NoPelanggan` varchar(10) NOT NULL,
  `TahunTagih` int(11) NOT NULL,
  `BulanTagih` varchar(10) NOT NULL,
  `JumlahPemakaian` int(11) NOT NULL,
  `TotalBayar` double(10,0) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`KodeTagihan`),
  KEY `tbtagihan_ibfk_1` (`NoPelanggan`),
  CONSTRAINT `tbtagihan_ibfk_1` FOREIGN KEY (`NoPelanggan`) REFERENCES `tbpelanggan` (`NoPelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtagihan`
--

LOCK TABLES `tbtagihan` WRITE;
/*!40000 ALTER TABLE `tbtagihan` DISABLE KEYS */;
INSERT INTO `tbtagihan` VALUES (1,'IHDPYK','10586',2021,'Januari',1000,1002500,'Belum'),(2,'V1JKPR','10427',2021,'Januari',1000,501500,'Sudah'),(3,'RO4EPK','10418',2021,'Januari',10000,10002500,'Belum'),(4,'3ARIQ1','10490',2021,'Februari',1000,1002500,'Belum');
/*!40000 ALTER TABLE `tbtagihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtarif`
--

DROP TABLE IF EXISTS `tbtarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtarif` (
  `KodeTarif` int(11) NOT NULL AUTO_INCREMENT,
  `Daya` int(11) NOT NULL,
  `TarifPerKwh` int(11) NOT NULL,
  `BiayaAdmin` int(11) NOT NULL,
  PRIMARY KEY (`KodeTarif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtarif`
--

LOCK TABLES `tbtarif` WRITE;
/*!40000 ALTER TABLE `tbtarif` DISABLE KEYS */;
INSERT INTO `tbtarif` VALUES (1,900,150,500),(2,1200,250,700),(3,2200,350,1000),(4,3500,500,1500),(5,5000,1000,2500);
/*!40000 ALTER TABLE `tbtarif` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-07  3:41:13
