-- MySQL dump 10.13  Distrib 5.7.36, for Linux (x86_64)
--
-- Host: localhost    Database: db
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `kd_admin` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approve`
--

DROP TABLE IF EXISTS `approve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `approve` (
  `kd_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`kd_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approve`
--

LOCK TABLES `approve` WRITE;
/*!40000 ALTER TABLE `approve` DISABLE KEYS */;
/*!40000 ALTER TABLE `approve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `kd_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `stok` int(4) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES ('FZ0001','suction filter','pcs',1500,1000,100,'0'),('FZ0002','oil compressor','pcs',2500,2000,125,'1'),('FZ0003','separator element','pcs',3500,3000,20,'0'),('FZ0004','oil filter','pcs',4500,4000,70,'1');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_pembelian`
--

DROP TABLE IF EXISTS `barang_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_pembelian` (
  `kd_barang_beli` int(6) NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) NOT NULL,
  `nama_barang_beli` varchar(225) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_beli` double NOT NULL,
  `item` int(4) NOT NULL,
  `total` double NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_barang_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_pembelian`
--

LOCK TABLES `barang_pembelian` WRITE;
/*!40000 ALTER TABLE `barang_pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barangp_sementara`
--

DROP TABLE IF EXISTS `barangp_sementara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barangp_sementara` (
  `id_barangp` int(6) NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) NOT NULL,
  `nama_barangp` varchar(225) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_barangp` double NOT NULL,
  `item` int(4) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_barangp`),
  KEY `kd_pembelian` (`kd_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangp_sementara`
--

LOCK TABLES `barangp_sementara` WRITE;
/*!40000 ALTER TABLE `barangp_sementara` DISABLE KEYS */;
/*!40000 ALTER TABLE `barangp_sementara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_pembelian`
--

DROP TABLE IF EXISTS `d_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_pembelian` (
  `id_pembelian` int(6) NOT NULL AUTO_INCREMENT,
  `kd_pembelian` char(8) NOT NULL,
  `kd_barang_beli` int(6) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `kd_pembelian` (`kd_pembelian`),
  KEY `kd_pembelian_2` (`kd_pembelian`),
  KEY `kd_barang_beli` (`kd_barang_beli`),
  KEY `kd_barang_beli_2` (`kd_barang_beli`),
  CONSTRAINT `d_pembelian_ibfk_3` FOREIGN KEY (`kd_pembelian`) REFERENCES `pembelian` (`kd_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `d_pembelian_ibfk_4` FOREIGN KEY (`kd_barang_beli`) REFERENCES `barang_pembelian` (`kd_barang_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_pembelian`
--

LOCK TABLES `d_pembelian` WRITE;
/*!40000 ALTER TABLE `d_pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_penjualan`
--

DROP TABLE IF EXISTS `d_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_penjualan` (
  `id_penjualan` int(6) NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `kd_penjualan` (`kd_penjualan`),
  KEY `kd_barang` (`kd_barang`),
  KEY `kd_barang_2` (`kd_barang`),
  CONSTRAINT `d_penjualan_ibfk_3` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  CONSTRAINT `d_penjualan_ibfk_4` FOREIGN KEY (`kd_penjualan`) REFERENCES `penjualan` (`kd_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_penjualan`
--

LOCK TABLES `d_penjualan` WRITE;
/*!40000 ALTER TABLE `d_penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian` (
  `kd_pembelian` char(8) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kd_admin` int(6) NOT NULL,
  `kd_supplier` int(6) NOT NULL,
  `total_pembelian` double NOT NULL,
  PRIMARY KEY (`kd_pembelian`),
  KEY `kd_admin` (`kd_admin`),
  KEY `kd_supplier` (`kd_supplier`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `kd_penjualan` char(8) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kd_admin` int(6) NOT NULL,
  `dibayar` double NOT NULL,
  `total_penjualan` double NOT NULL,
  PRIMARY KEY (`kd_penjualan`),
  KEY `kd_admin` (`kd_admin`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan_sementara`
--

DROP TABLE IF EXISTS `penjualan_sementara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan_sementara` (
  `id_penjualan_sementara` int(11) NOT NULL AUTO_INCREMENT,
  `kd_penjualan` char(8) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `item` int(4) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_penjualan_sementara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan_sementara`
--

LOCK TABLES `penjualan_sementara` WRITE;
/*!40000 ALTER TABLE `penjualan_sementara` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan_sementara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perusahaan`
--

DROP TABLE IF EXISTS `perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perusahaan` (
  `kd_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `pemilik` varchar(225) NOT NULL,
  `kota` varchar(225) NOT NULL,
  PRIMARY KEY (`kd_perusahaan`),
  KEY `kd_perusahaan` (`kd_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan`
--

LOCK TABLES `perusahaan` WRITE;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `kd_supplier` int(6) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(60) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (6,'PT Senjaya Securindo Berjaya','Office 8 Gandaria City'),(7,'PT Kobelco Indonesia','Gedung Kobelco Jl. TB Simatupang Jakarta Selatan'),(8,'PT. Asian Engineering','Jl. Jendral Sudirman Karet Sudirman'),(9,'PT. Golden Solution','Jl. Angkas Kemayoran Kav.1-2');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblogin`
--

DROP TABLE IF EXISTS `tblogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblogin` (
  `KodeLogin` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaLengkap` varchar(80) NOT NULL,
  `Level` varchar(20) NOT NULL,
  PRIMARY KEY (`KodeLogin`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblogin`
--

LOCK TABLES `tblogin` WRITE;
/*!40000 ALTER TABLE `tblogin` DISABLE KEYS */;
INSERT INTO `tblogin` VALUES (9,'admin','admin','Agus Chandra','Admin'),(10,'10361','10361','Kajika Sama','Pelanggan'),(11,'jakads','jakads','jakads','Petugas'),(12,'10721','10721','Nirwana Sari','Pelanggan'),(14,'10369','10369','Kadek Suartana','Pelanggan'),(15,'ketut','ketut','ketu sujarna','Petugas'),(16,'ketut2','ketut2','ketut pejana','Petugas');
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
  `Telp` varchar(10) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`KodePelanggan`),
  UNIQUE KEY `NoPelanggan` (`NoPelanggan`),
  KEY `KodeTarif` (`KodeTarif`),
  CONSTRAINT `tbpelanggan_ibfk_1` FOREIGN KEY (`KodeTarif`) REFERENCES `tbtarif` (`KodeTarif`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpelanggan`
--

LOCK TABLES `tbpelanggan` WRITE;
/*!40000 ALTER TABLE `tbpelanggan` DISABLE KEYS */;
INSERT INTO `tbpelanggan` VALUES (7,'10361','082134834564',2,'Kajika Sama','0892345734','Mengwi'),(8,'10721','023485323544',1,'Nirwana Sari','0873484553','Tulung Agung'),(9,'10369','004585763954',2,'Kadek Suartana','0874354632','Jln Tukad Petanu');
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
  PRIMARY KEY (`KodePembayaran`),
  KEY `KodeTagihan` (`KodeTagihan`),
  CONSTRAINT `tbpembayaran_ibfk_1` FOREIGN KEY (`KodeTagihan`) REFERENCES `tbtagihan` (`KodeTagihan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpembayaran`
--

LOCK TABLES `tbpembayaran` WRITE;
/*!40000 ALTER TABLE `tbpembayaran` DISABLE KEYS */;
INSERT INTO `tbpembayaran` VALUES (8,36,'2019-02-14',344500,'bukti.png','Sudah');
/*!40000 ALTER TABLE `tbpembayaran` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtagihan`
--

LOCK TABLES `tbtagihan` WRITE;
/*!40000 ALTER TABLE `tbtagihan` DISABLE KEYS */;
INSERT INTO `tbtagihan` VALUES (32,'M9GWU5','10721',2019,'Januari',90,169500,'Sudah'),(34,'H6FBJN','10369',2019,'Januari',100,288500,'Belum'),(35,'53LSQB','10369',2019,'Februari',80,232500,'Belum'),(36,'R0ZIT1','10361',2019,'Januari',120,344500,'Sudah'),(39,'TPNS2I','10361',2019,'Februari',120,344500,'Belum'),(40,'5STY8L','10361',2019,'Maret',100,288500,'Belum');
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
  `Beban` int(11) NOT NULL,
  PRIMARY KEY (`KodeTarif`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtarif`
--

LOCK TABLES `tbtarif` WRITE;
/*!40000 ALTER TABLE `tbtarif` DISABLE KEYS */;
INSERT INTO `tbtarif` VALUES (1,100,1800,7500),(2,150,2800,8500),(6,350,3400,12000);
/*!40000 ALTER TABLE `tbtarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `kd_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin` varchar(5) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg',
  PRIMARY KEY (`kd_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'fazadmin','fazadmin@web.id','$2y$10$l0H.V3I2d3nWCIB10i0.ku5h6hULrsAYKNlqUTMmBsbfvNjYOBJ/m','Administrator','2','default.svg'),(3,'josephine_darakjy','josephine_darakjy@darakjy.org.id','$2y$10$hHkVZg0/5VvDSmb4L3Ec7eaQVTOhQpPiq4hYnU5MMrnGLp760FhBi','Josephine Darakjy','1','default.svg'),(4,'art','art@venere.org','$2y$10$l1Sp7g2C/FB8bd0C9xM9XeR17kNe2SVs1zcJjyWhtvr5GgUbc9Mly','Art Venere','1','default.svg'),(5,'lpaprocki','lpaprocki@hotmail.com','$2y$10$lISpd6fmregNG5JxxaAuNuDZXWcU91r.yjSkJ0bqCbrT9wGvm/MKC','Lenna Paprocki','1','default.svg'),(6,'donette.foller','donette.foller@cox.net','$2y$10$1MqSTaondYy83zKNbi59H.PJB33r70e3ytWL.CFyuIZ11wgdVTe4y','Donette Foller','1','default.svg'),(7,'simona','simona@morasca.com','$2y$10$mt1ZOlmRjFDcXEwJ6SiXyupefIshMeDu6tVZ1Oj.PaPMsuJi4pQKG','Simona Morasca','1','default.svg'),(8,'mitsue_tollner','mitsue_tollner@yahoo.com','$2y$10$SUSoPsUnHDYR1RI3yprHoOb27QNWwo.xqJGzAp8n.jBzDKjYlPP9.','Mitsue Tollner','1','default.svg'),(9,'leota','leota@hotmail.com','$2y$10$m8GlSTNhGB88QCRS8.DhUupn/XYDFGhICDzvRne2SyZecfFfIEMhS','Leota Dilliard','1','default.svg'),(10,'sage_wieser','sage_wieser@cox.net','$2y$10$VScnpb0ySV.DLiNjGiGhq.MPal4YaYrWYdl5LIBA6z8Qw8mb4.ZwK','Sage Wieser','1','default.svg'),(11,'kris','kris@gmail.com','$2y$10$xHKgceBN1.YxVr2d6yvqx./9NUDg4PWBNB/QIHITJAyUES9d6Has.','Kris Marrier','1','default.svg'),(12,'minna_amigon','minna_amigon@yahoo.com','$2y$10$gRtRi8UpT.8BlkjP1DYdd.JH9QS6ibCUxH6L9kOwJD0qHa9KkZlgK','Minna Amigon','1','default.svg'),(13,'amaclead','amaclead@gmail.com','$2y$10$4zeU0BlhskDlx56MbIas/uj1omgP7dQ5ZOriKrAoGrdDHTUHs8ra2','Abel Maclead','1','default.svg'),(14,'kiley.caldarera','kiley.caldarera@aol.com','$2y$10$/2T.vMXRdIVM1IkTYjCSSe0TfvDGWLQWO1DcuKoDh2ZpF748mkqXe','Kiley Caldarera','1','default.svg'),(15,'gruta','gruta@cox.net','$2y$10$yWzI5qaLnbVkwVSEDEqEK.U5qLrDWqFIhxAlPdaYgX8XGrvu2usIK','Graciela Ruta','1','default.svg'),(16,'calbares','calbares@gmail.com','$2y$10$o2RXeY/Qn.koG4w557udf..ymYyiKijE.AB9HQvBpp.eh1q/QRPwO','Cammy Albares','1','default.svg'),(17,'mattie','mattie@aol.com','$2y$10$w5lt5fGIZPSQwaL9TM4jxeeiJNBzcdhkkPmY7wocCJW1KmsSfi9JC','Mattie Poquette Hardi','1','default.svg'),(18,'meaghan','meaghan@hotmail.com','$2y$10$L7f8gTHpxaP7Y.xOoj3d0.ZL3LRT1hYLeQ4Qv/W6eLMABHxUDHpYu','Meaghan Garufi','1','default.svg'),(19,'gladys.rim','gladys.rim@rim.org','$2y$10$bj9BV5gg2rHC.zpeyg4kVuct2TmbqYRlAIfg7bjeGicOIBmavaG7S','Gladys Rim','0','default.svg'),(20,'yuki_whobrey','yuki_whobrey@aol.com','$2y$10$slgWE04sfOHIUjYwy84b8OlqDbV1vVCQ9O7S2icAYLSKKKI0ryl7G','Yuki Whobrey','0','default.svg'),(21,'fletcher.flosi','fletcher.flosi@yahoo.com','$2y$10$tXZJ34fSOoIIZLFytgIpcOhWpYIuElihJFqavGGdfR1m553QuylSi','Fletcher Flosi','0','default.svg'),(22,'bette_nicka','bette_nicka@cox.net','$2y$10$ptS9mqH9ys9BDghr4KRD.en8cY1s6DbCM1CFFwBsALw.FmuvIM99e','Bette Nicka','0','default.svg'),(23,'vinouye','vinouye@aol.com','$2y$10$0TIisNwKbEazW5u1EvJBkO5LO5LqHc1ti.vpZwGsC1pFwfnp1n1ue','Veronika Inouye','0','default.svg'),(24,'willard','willard@hotmail.com','$2y$10$6HO0vhksRiMN.k2X7ntI0.fyu9rjYbHq6r/1JrGjaUq5/biRQHqc2','Willard Kolmetz','0','default.svg'),(25,'mroyster','mroyster@royster.com','$2y$10$cRmVASBmOvEdMBWiFEEsYuWrSGpHGI0hczUUe2ESif6PYjdB/tYlO','Maryann Royster','0','default.svg'),(26,'alisha','alisha@slusarski.com','$2y$10$GsNl21PR44XYDujFn768XuBeSz3MKtrlgfL5VNrjYXweKDAq/1oSq','Alisha Slusarski','0','default.svg'),(27,'allene_iturbide','allene_iturbide@cox.net','$2y$10$ck0rdbQuHW0SJmrLIOL57./wFBZ8txdsseRxiHSNa0dAEax4ex8Ua','Allene Iturbide','0','default.svg'),(28,'chanel.caudy','chanel.caudy@caudy.org','$2y$10$XX8YkFkARXGu.2Fgwzapg.50ZqmTljt4.DK3ipbGakJ5Mzt7t44QW','Chanel Caudy','0','default.svg'),(29,'ezekiel','ezekiel@chui.com','$2y$10$Nf/l4wNfgNKFFq7798PEjOrkdRJA0UmPOgU5h.FLNQ8Grr7.eTXiu','Ezekiel Chui','0','default.svg'),(30,'wkusko','wkusko@yahoo.com','$2y$10$N7uoYefZwJWIMX7z9LUCrOKt9gS0ZXgqws2dn9EEe3ndUbBwkroUu','Willow Kusko','0','default.svg'),(31,'bfigeroa','bfigeroa@aol.com','$2y$10$wSdH/OL9hjuX4..UrfSvgu0hy8exoehyo/GJgKvxa1ssvMYk4zMqO','Bernardo Figeroa','0','default.svg'),(32,'ammie','ammie@corrio.com','$2y$10$KHmoxO1APUkoGIl4xae...ruLk0bmj5xCCIkencsNkvN9X7LP3uGq','Ammie Corrio','0','default.svg'),(33,'francine_vocelka','francine_vocelka@vocelka.com','$2y$10$EdT1za6hFh3l7dFXY0.aFuQmp6c5JyS3NnL35xc4K2YsYOyaD.EGC','Francine Vocelka','0','default.svg'),(34,'ernie_stenseth','ernie_stenseth@aol.com','$2y$10$zvCI6Grjw3awmnTu0OmEzOFDSpiqiSuLLfGNZk5v02Ry.478.Pm4a','Ernie Stenseth','0','default.svg'),(35,'albina','albina@glick.com','$2y$10$L8HJswnsp5UI758RE3GJL.M9PZi9Q8ouVrkObLpRewdQ1PxbZ76WC','Albina Glick','0','default.svg'),(36,'asergi','asergi@gmail.com','$2y$10$yxQS68Dpi/exa2O.UvT20uuadvKFZffcGXdVDiMTM9fVt0Bkk3B6O','Alishia Sergi','0','default.svg'),(37,'solange','solange@shinko.com','$2y$10$4ukZIZ2D4SrtT8lw7mlE/OCk9ezynDzh8XptLWYFMy/pvy0720BGG','Solange Shinko','0','default.svg'),(38,'jose','jose@yahoo.com','$2y$10$QbKTPmQUpqH4RYUF4.4XUu2P1XxycD6Vf9O8N4Cf4ubgXvsGV1Moi','Jose Stockham','0','default.svg'),(39,'rozella.ostrosky','rozella.ostrosky@ostrosky.com','$2y$10$tGdasDLVnv8CDC/XsOa3buLCp3YchDks67kKZstEqrPGZoG9la9Ty','Rozella Ostrosky','0','default.svg'),(40,'valentine_gillian','valentine_gillian@gmail.com','$2y$10$kOG8IvWPx9I8jAbmxg5Z0ezlPW2PhSzZs.TjtQ9Ssd/H.HzhX0seq','Valentine Gillian','0','default.svg'),(41,'kati.rulapaugh','kati.rulapaugh@hotmail.com','$2y$10$CEKcWHoDs2NKQm5EtyfMee6y9UusxjXoeRZ2FzOaJbPwz4kcBswqy','Kati Rulapaugh','0','default.svg'),(42,'youlanda','youlanda@aol.com','$2y$10$HX8/1ya9X4OMnTsS/oOZHOG4DmVmg/NcNVeq8y/rd.6H7jghWQ7li','Youlanda Schemmer','0','default.svg'),(43,'doldroyd','doldroyd@aol.com','$2y$10$vwGuqxLsM6MNHpyHRc0HjO6.Qg4hHz7a5c/1qGoqE2ZFgaxSEX36a','Dyan Oldroyd','0','default.svg'),(44,'roxane','roxane@hotmail.com','$2y$10$9BMf2jO2XS55MsQ9N2VvE.yHbbgSM0Ztqx8PnOi1Nr4YdCjXoNMK.','Roxane Campain','0','default.svg'),(45,'lperin','lperin@perin.org','$2y$10$YKUzfFR3GNs8p4Ikm3axOuUss/XrCsiPIk1ub5GdSp/vBYAra2d8e','Lavera Perin','0','default.svg'),(46,'erick.ferencz','erick.ferencz@aol.com','$2y$10$chvx3nqkZ8.OLdxGYTFWkOzPcAsldqOHDKwYecWptv9lw/i2FlCzm','Erick Ferencz','0','default.svg'),(47,'fsaylors','fsaylors@saylors.org','$2y$10$FPr48kEAbiSvVeRFSh9SLeuhYbJQxUrhP0y5/KWU.LpNw8zCTgjgu','Fatima Saylors','0','default.svg'),(48,'jina_briddick','jina_briddick@briddick.com','$2y$10$NyVqGJJgPVWlTe9i38v0K.wTaNNyGY2nivCr66MYwXZc7g5ioPSHe','Jina Briddick','0','default.svg'),(49,'kanisha_waycott','kanisha_waycott@yahoo.com','$2y$10$FLpcqhAplVW3Fhhzr2LpIOTM2LVbelbsd8UvydWgYKHShEwJWhTqa','Kanisha Waycott','0','default.svg'),(50,'emerson.bowley','emerson.bowley@bowley.org','$2y$10$xq8OS.1cng35/Zz7BkwLteS9tnTE1hP4AuuwwJObix3JrUxeNHyki','Emerson Bowley','0','default.svg'),(51,'bmalet','bmalet@yahoo.com','$2y$10$NMcUi8.74mKMxHjSnUpiUOgK7O9M25Z9X2RFRXMqVTD.DBsIoePy6','Blair Malet','0','default.svg'),(52,'bbolognia','bbolognia@yahoo.com','$2y$10$hSqntRVammBZF/te5DWKnOFhYLEEWpAvntFn7rgOudYJOy/BGOsOm','Brock Bolognia','0','default.svg'),(53,'lnestle','lnestle@hotmail.com','$2y$10$XFQkmYUNPRyL5dJ.0I27x.uqQGlh/fG2DiSMS5wEFtJpqFQg.9K.O','Lorrie Nestle','0','default.svg'),(54,'sabra','sabra@uyetake.org','$2y$10$jO/EtJ5RctoW.UHS8qihW.XntkHZqYKWZdUt1mwupetWSl9N9FQo.','Sabra Uyetake','0','default.svg'),(55,'mmastella','mmastella@mastella.com','$2y$10$Ddo.RThTACbs.8rml.tZ1OoWShDUZ7wPA9GubO8Ffzi0mxPppRRu2','Marjory Mastella','0','default.svg'),(56,'karl_klonowski','karl_klonowski@yahoo.com','$2y$10$cinsskETIwIR3hCGMySjgePF0JlOGuHG2qiZ3ZLUrAafTGTJnsQ9e','Karl Klonowski','0','default.svg'),(57,'twenner','twenner@aol.com','$2y$10$X3l2F56yTAUYctinFx9Sn.FyL/hO2sb9IS1Hn1mmFilWnKgGtnzX2','Tonette Wenner','0','default.svg'),(58,'amber_monarrez','amber_monarrez@monarrez.org','$2y$10$JJ7wKnkHM73OhtjtmQze2O/S84xpjNcA8IUkDI850My8Q7tzYVKJG','Amber Monarrez','0','default.svg'),(59,'shenika','shenika@gmail.com','$2y$10$QLL60U1HmlKbo51A52LBKOCydsn5xxoxkYc.v.HKDc.t05D6V6kuK','Shenika Seewald','0','default.svg'),(60,'delmy.ahle','delmy.ahle@hotmail.com','$2y$10$MwSuXd106jmppX2ZC4N5rO4wibbZcfXZTiB8EMgp/M.dufphUaDCK','Delmy Ahle','0','default.svg'),(61,'deeanna_juhas','deeanna_juhas@gmail.com','$2y$10$Esq7ch6/h/s7MEq/K2Ba8O7r9AZ6eI9EcjWzWWRP7.txVN4ZrMOzu','Deeanna Juhas','0','default.svg'),(62,'bpugh','bpugh@aol.com','$2y$10$9HdRqpNeI6qF192GFe3Ln.OH/NnXqHkpA6QYJJXPWSNml2TziZcyu','Blondell Pugh','0','default.svg'),(63,'jamal','jamal@vanausdal.org','$2y$10$Gw/VHsqRd83mCG09tRHoe.nwnfKFnBeGq5QBvUeIeWGei2Pfwhrqq','Jamal Vanausdal','0','default.svg'),(64,'cecily','cecily@hollack.org','$2y$10$QPcYzmRifP.dqYvBYIqmP.3xl1Z8mofC8YnM.996FB27d7PcnAfKS','Cecily Hollack','0','default.svg'),(65,'carmelina_lindall','carmelina_lindall@lindall.com','$2y$10$5XVvWo/MIRVdwW/TmnDhVOhtOO6KjlF5N1DWXum8Uq.uX4btLMxGe','Carmelina Lindall','0','default.svg'),(66,'maurine_yglesias','maurine_yglesias@yglesias.com','$2y$10$FkM1kuiEeLHS87uNEzamu.0gMvusjQoiNQwaQoJIok8WS6zhtQBnq','Maurine Yglesias','0','default.svg'),(67,'tawna','tawna@gmail.com','$2y$10$zsuU2cmIhWlWzB61X1l0euD1O5HchQejdgzN8I9ho0jnh7WhrMVmi','Tawna Buvens','0','default.svg'),(68,'penney_weight','penney_weight@aol.com','$2y$10$CYsb/dIKT4e3jaeoK4Q1QOe3mfeio9n6JDbvEGMtlGIyOaH2JotQ6','Penney Weight','0','default.svg'),(69,'elly_morocco','elly_morocco@gmail.com','$2y$10$v0FqXjO2loDGNJno5ukDIOuwM5YrJZAn0s2jdnp8MRqc8vFOgn9gi','Elly Morocco','0','default.svg'),(70,'ilene.eroman','ilene.eroman@hotmail.com','$2y$10$xiED43sUPWc1J09RLO1Sb.kf5iarRUmgg581vkqPViIeGzyMQWa2.','Ilene Eroman','0','default.svg'),(71,'vmondella','vmondella@mondella.com','$2y$10$TGfiOpKkRoNHVk7gn2QoM.F3RyXNilnA2EETXiyZi0fY1U9/avf1S','Vallie Mondella','0','default.svg'),(72,'kallie.blackwood','kallie.blackwood@gmail.com','$2y$10$mMkgVymG2MJHmfpb78vAuOP/EV5j84RZdLGKnIyycyigoN624/FQq','Kallie Blackwood','0','default.svg'),(73,'johnetta_abdallah','johnetta_abdallah@aol.com','$2y$10$vMbUcefACGezMmdrbzisheUkCooUjevjXQhm33l2VknDw5L0h0m7y','Johnetta Abdallah','0','default.svg'),(74,'brhym','brhym@rhym.com','$2y$10$cDWZlhinZL0XT0sL2W1HwOihxEFbKcGX1OGq6IOqRo0.hM0m/nYr.','Bobbye Rhym','0','default.svg'),(75,'micaela_rhymes','micaela_rhymes@gmail.com','$2y$10$VLvN.DaMH3ziA7gZWrtEken6LLoyepklH8oVhMfD9o7S1En4egyuS','Micaela Rhymes','0','default.svg'),(76,'tamar','tamar@hotmail.com','$2y$10$3e1j81hW5kfl7QlbaqMXV.ZO.lO/ekFw2PLyW5tihreUDy7.Wx2p2','Tamar Hoogland','0','default.svg'),(77,'moon','moon@yahoo.com','$2y$10$agv8ncDs7b/Z3Zjle8KDg.LXolzpFwUuHOp06ZPpuqhH5oZ1W4UZC','Moon Parlato','0','default.svg'),(78,'laurel_reitler','laurel_reitler@reitler.com','$2y$10$6XTtcqzdPwHkGr5HH7KLeOM4ItIx6Q2c8UKQrxAp.DPoWvl1pcf7u','Laurel Reitler','0','default.svg'),(79,'delisa.crupi','delisa.crupi@crupi.com','$2y$10$/KQ92JqeikxQg1CIOhyj8O49mCxYTlB9uKQxzw4vfL54IIA7R42lu','Delisa Crupi','0','default.svg'),(80,'viva.toelkes','viva.toelkes@gmail.com','$2y$10$nxpR62kvTrS6kUCWGiRQ3uxGsVNatZE0oZvY540ff9e/ykxfH0Equ','Viva Toelkes','0','default.svg'),(81,'elza','elza@yahoo.com','$2y$10$lGSW.oF4xvnbRxWwJ.vYA.hGXrlRcDCqGb9kHHPMCBjYpBBEVOkeC','Elza Lipke','0','default.svg'),(82,'devorah','devorah@hotmail.com','$2y$10$kWFw90W7St5k67YV5AEvge/YBw5urOSy9WA314Kdh.CIEJjcxAizG','Devorah Chickering','0','default.svg'),(83,'timothy_mulqueen','timothy_mulqueen@mulqueen.org','$2y$10$Nq0gIAmFSFMeq0mqJDStROsg6Jn9fV61B5VyC3WSCIoIMiC.T9C.q','Timothy Mulqueen','0','default.svg'),(84,'ahoneywell','ahoneywell@honeywell.com','$2y$10$pa4LXeReXBr/YuEz4vqo1.Cwkx1cGVaMeI.Z4eDYKN0eROmvTGj7e','Arlette Honeywell','0','default.svg'),(85,'dominque.dickerson','dominque.dickerson@dickerson.org','$2y$10$xTGgVOT0X2mLZpPAIxBdm.7YZ1K2Xf7kE.tPHCWtKTg34V9H3dIKq','Dominque Dickerson','0','default.svg'),(86,'lettie_isenhower','lettie_isenhower@yahoo.com','$2y$10$7NhEfMkdqV8GyeXiwtmD/uWpFvjezBY0QVUEzEwyXDpNyqtAO47nK','Lettie Isenhower','0','default.svg'),(87,'mmunns','mmunns@cox.net','$2y$10$oDBOT2K18dqlABx4McuA1uWY1ctMoS2mj/EB0X0gTEdxmVAhTW5ZC','Myra Munns','0','default.svg'),(88,'stephaine','stephaine@barfield.com','$2y$10$v4XT0wO1fahWwtU93vmdNO/6yK0RZytqqnrc98W/HyKH3BFa6q6yK','Stephaine Barfield','0','default.svg'),(89,'lai.gato','lai.gato@gato.org','$2y$10$mU98IpjpJ8khoONXSIlo8.2REunEl9Xxnch6RqYm5/p7cNLxRSKfW','Lai Gato','0','default.svg'),(90,'stephen_emigh','stephen_emigh@hotmail.com','$2y$10$3twcULy1CIkLM4JlueQkZ.k3TRMjL0BKEhIAD7QTl66esQdG9N326','Stephen Emigh','0','default.svg'),(91,'tshields','tshields@gmail.com','$2y$10$0jr7IaKXcoy6t0nWNxCs0uOIluyY.SMfWU/O1mRqeVzVmj1Po9j/W','Tyra Shields','0','default.svg'),(92,'twardrip','twardrip@cox.net','$2y$10$44fwCxJ81Fmo60quhA4qxupar9xgkfYXyvHymInwxzdNq0LE0W4uy','Tammara Wardrip','0','default.svg'),(93,'cory.gibes','cory.gibes@gmail.com','$2y$10$OnJwrzMwLCTz.brbCgrlf.ma2CD.aXE0p.8h0r0jCYdWWFTVp1/QS','Cory Gibes','0','default.svg'),(94,'danica_bruschke','danica_bruschke@gmail.com','$2y$10$sak96OjNtcCnDjDtJG7zeu7QTx0mE0JbH85S2sAKjrWeiN4H3tOHG','Danica Bruschke','0','default.svg'),(95,'wilda','wilda@cox.net','$2y$10$hqMMPJT.vV9PMU2VCkQBTu06OTZHaN984rzAzZ6gtPkxRuz1hld42','Wilda Giguere','0','default.svg'),(96,'elvera.benimadho','elvera.benimadho@cox.net','$2y$10$FSpL7HxWo6zcHbFknFKaGeqSEHgaKOTgqq2d3hF4ab81R4kAxzWce','Elvera Benimadho','0','default.svg'),(97,'carma','carma@cox.net','$2y$10$sLYrXvjc2SRnTWRigWBAM.1NHfKM2MwFA4KmFh4dKNyUlpvFz64aS','Carma Vanheusen','0','default.svg'),(98,'malinda.hochard','malinda.hochard@yahoo.com','$2y$10$KYfTBqtYzt6.wEKB5nYI6eL9z7t.URtu25BAuJiLinVx2wQZ7.b7.','Malinda Hochard','0','default.svg'),(99,'natalie.fern','natalie.fern@hotmail.com','$2y$10$X.08q07vjlHQgSgiRN778OqPmjPwTefA7zhKA9GwtFynaaQvI052W','Natalie Fern','0','default.svg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-06 10:43:51
