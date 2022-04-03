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
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblogin`
--

LOCK TABLES `tblogin` WRITE;
/*!40000 ALTER TABLE `tblogin` DISABLE KEYS */;
INSERT INTO `tblogin` VALUES (37,'fazadmin','asd','Administrator','0','fazadmin@web.id','default.svg'),(38,'josephine_darakjy','asd','Josephine Darakjy','2','081290846864','default.svg'),(39,'art','asd','Art Venere','1','art@venere.org','default.svg'),(40,'lpaprocki','asd','Lenna Paprocki','2','lpaprocki@hotmail.com','default.svg'),(41,'donette.foller','asd','Donette Foller','2','donette.foller@cox.net','default.svg'),(42,'simona','asd','Simona Morasca','2','simona@morasca.com','default.svg'),(43,'mitsue_tollner','asd','Mitsue Tollner','2','mitsue_tollner@yahoo.com','default.svg'),(44,'leota','asd','Leota Dilliard','2','leota@hotmail.com','default.svg'),(45,'sage_wieser','asd','Sage Wieser','2','sage_wieser@cox.net','default.svg'),(46,'kris','asd','Kris Marrier','2','kris@gmail.com','default.svg'),(47,'minna_amigon','asd','Minna Amigon','2','minna_amigon@yahoo.com','default.svg'),(48,'amaclead','asd','Abel Maclead','2','amaclead@gmail.com','default.svg'),(49,'kiley.caldarera','asd','Kiley Caldarera','2','kiley.caldarera@aol.com','default.svg'),(50,'gruta','asd','Graciela Ruta','2','gruta@cox.net','default.svg'),(51,'calbares','asd','Cammy Albares','2','calbares@gmail.com','default.svg'),(52,'mattie','asd','Mattie Poquette Hardi','2','mattie@aol.com','default.svg'),(53,'meaghan','asd','Meaghan Garufi','2','meaghan@hotmail.com','default.svg'),(54,'gladys.rim','asd','Gladys Rim','2','gladys.rim@rim.org','default.svg'),(55,'yuki_whobrey','asd','Yuki Whobrey','2','yuki_whobrey@aol.com','default.svg'),(56,'fletcher.flosi','asd','Fletcher Flosi','2','fletcher.flosi@yahoo.com','default.svg'),(57,'bette_nicka','asd','Bette Nicka','2','bette_nicka@cox.net','default.svg'),(58,'vinouye','asd','Veronika Inouye','2','vinouye@aol.com','default.svg'),(59,'willard','asd','Willard Kolmetz','2','willard@hotmail.com','default.svg'),(60,'mroyster','asd','Maryann Royster','2','mroyster@royster.com','default.svg'),(61,'alisha','asd','Alisha Slusarski','2','alisha@slusarski.com','default.svg'),(62,'allene_iturbide','asd','Allene Iturbide','2','allene_iturbide@cox.net','default.svg'),(63,'chanel.caudy','asd','Chanel Caudy','2','chanel.caudy@caudy.org','default.svg'),(64,'ezekiel','asd','Ezekiel Chui','2','ezekiel@chui.com','default.svg'),(65,'wkusko','asd','Willow Kusko','2','wkusko@yahoo.com','default.svg'),(66,'bfigeroa','asd','Bernardo Figeroa','2','bfigeroa@aol.com','default.svg'),(67,'ammie','asd','Ammie Corrio','2','ammie@corrio.com','default.svg'),(68,'francine_vocelka','asd','Francine Vocelka','2','francine_vocelka@vocelka.com','default.svg'),(69,'ernie_stenseth','asd','Ernie Stenseth','2','ernie_stenseth@aol.com','default.svg'),(70,'albina','asd','Albina Glick','2','albina@glick.com','default.svg'),(71,'asergi','asd','Alishia Sergi','2','asergi@gmail.com','default.svg'),(72,'solange','asd','Solange Shinko','2','solange@shinko.com','default.svg'),(73,'jose','asd','Jose Stockham','2','jose@yahoo.com','default.svg'),(74,'rozella.ostrosky','asd','Rozella Ostrosky','2','rozella.ostrosky@ostrosky.com','default.svg'),(75,'valentine_gillian','asd','Valentine Gillian','2','valentine_gillian@gmail.com','default.svg'),(76,'kati.rulapaugh','asd','Kati Rulapaugh','2','kati.rulapaugh@hotmail.com','default.svg'),(77,'youlanda','asd','Youlanda Schemmer','2','youlanda@aol.com','default.svg'),(78,'doldroyd','asd','Dyan Oldroyd','2','doldroyd@aol.com','default.svg'),(79,'roxane','asd','Roxane Campain','2','roxane@hotmail.com','default.svg'),(80,'lperin','asd','Lavera Perin','2','lperin@perin.org','default.svg'),(81,'erick.ferencz','asd','Erick Ferencz','2','erick.ferencz@aol.com','default.svg'),(82,'fsaylors','asd','Fatima Saylors','2','fsaylors@saylors.org','default.svg'),(83,'jina_briddick','asd','Jina Briddick','2','jina_briddick@briddick.com','default.svg'),(84,'kanisha_waycott','asd','Kanisha Waycott','2','kanisha_waycott@yahoo.com','default.svg'),(85,'emerson.bowley','asd','Emerson Bowley','2','emerson.bowley@bowley.org','default.svg'),(86,'bmalet','asd','Blair Malet','2','bmalet@yahoo.com','default.svg'),(87,'bbolognia','asd','Brock Bolognia','2','bbolognia@yahoo.com','default.svg'),(88,'lnestle','asd','Lorrie Nestle','2','lnestle@hotmail.com','default.svg'),(89,'sabra','asd','Sabra Uyetake','2','sabra@uyetake.org','default.svg'),(90,'mmastella','asd','Marjory Mastella','2','mmastella@mastella.com','default.svg'),(91,'karl_klonowski','asd','Karl Klonowski','2','karl_klonowski@yahoo.com','default.svg'),(92,'twenner','asd','Tonette Wenner','2','twenner@aol.com','default.svg'),(93,'amber_monarrez','asd','Amber Monarrez','2','amber_monarrez@monarrez.org','default.svg'),(94,'shenika','asd','Shenika Seewald','2','shenika@gmail.com','default.svg'),(95,'delmy.ahle','asd','Delmy Ahle','2','delmy.ahle@hotmail.com','default.svg'),(96,'deeanna_juhas','asd','Deeanna Juhas','2','deeanna_juhas@gmail.com','default.svg'),(97,'bpugh','asd','Blondell Pugh','2','bpugh@aol.com','default.svg'),(98,'jamal','asd','Jamal Vanausdal','2','jamal@vanausdal.org','default.svg'),(99,'cecily','asd','Cecily Hollack','2','cecily@hollack.org','default.svg'),(100,'carmelina_lindall','asd','Carmelina Lindall','2','carmelina_lindall@lindall.com','default.svg'),(101,'maurine_yglesias','asd','Maurine Yglesias','2','maurine_yglesias@yglesias.com','default.svg'),(102,'tawna','asd','Tawna Buvens','2','tawna@gmail.com','default.svg'),(103,'penney_weight','asd','Penney Weight','2','penney_weight@aol.com','default.svg'),(104,'elly_morocco','asd','Elly Morocco','2','elly_morocco@gmail.com','default.svg'),(105,'ilene.eroman','asd','Ilene Eroman','2','ilene.eroman@hotmail.com','default.svg'),(106,'vmondella','asd','Vallie Mondella','2','vmondella@mondella.com','default.svg'),(107,'kallie.blackwood','asd','Kallie Blackwood','2','kallie.blackwood@gmail.com','default.svg'),(108,'johnetta_abdallah','asd','Johnetta Abdallah','2','johnetta_abdallah@aol.com','default.svg'),(109,'brhym','asd','Bobbye Rhym','2','brhym@rhym.com','default.svg'),(110,'micaela_rhymes','asd','Micaela Rhymes','2','micaela_rhymes@gmail.com','default.svg'),(111,'tamar','asd','Tamar Hoogland','2','tamar@hotmail.com','default.svg'),(112,'moon','asd','Moon Parlato','2','moon@yahoo.com','default.svg'),(113,'laurel_reitler','asd','Laurel Reitler','2','laurel_reitler@reitler.com','default.svg'),(114,'delisa.crupi','asd','Delisa Crupi','2','delisa.crupi@crupi.com','default.svg'),(115,'viva.toelkes','asd','Viva Toelkes','2','viva.toelkes@gmail.com','default.svg'),(116,'elza','asd','Elza Lipke','2','elza@yahoo.com','default.svg'),(117,'devorah','asd','Devorah Chickering','2','devorah@hotmail.com','default.svg'),(118,'timothy_mulqueen','asd','Timothy Mulqueen','2','timothy_mulqueen@mulqueen.org','default.svg'),(119,'ahoneywell','asd','Arlette Honeywell','2','ahoneywell@honeywell.com','default.svg'),(120,'dominque.dickerson','asd','Dominque Dickerson','2','dominque.dickerson@dickerson.org','default.svg'),(121,'lettie_isenhower','asd','Lettie Isenhower','2','lettie_isenhower@yahoo.com','default.svg'),(122,'mmunns','asd','Myra Munns','2','mmunns@cox.net','default.svg'),(123,'stephaine','asd','Stephaine Barfield','2','stephaine@barfield.com','default.svg'),(124,'lai.gato','asd','Lai Gato','2','lai.gato@gato.org','default.svg'),(125,'stephen_emigh','asd','Stephen Emigh','2','stephen_emigh@hotmail.com','default.svg'),(126,'tshields','asd','Tyra Shields','2','tshields@gmail.com','default.svg'),(127,'twardrip','asd','Tammara Wardrip','2','twardrip@cox.net','default.svg'),(128,'cory.gibes','asd','Cory Gibes','2','cory.gibes@gmail.com','default.svg'),(129,'danica_bruschke','asd','Danica Bruschke','2','danica_bruschke@gmail.com','default.svg'),(130,'wilda','asd','Wilda Giguere','2','wilda@cox.net','default.svg'),(131,'elvera.benimadho','asd','Elvera Benimadho','2','elvera.benimadho@cox.net','default.svg'),(132,'carma','asd','Carma Vanheusen','2','carma@cox.net','default.svg'),(133,'malinda.hochard','asd','Malinda Hochard','2','malinda.hochard@yahoo.com','default.svg'),(134,'natalie.fern','asd','Natalie Fern','2','natalie.fern@hotmail.com','default.svg'),(142,'10427','asd','Rafa Zaidan','2','0813','default.svg'),(143,'10824','asd','Rafa Zaidan','2','0811','default.svg'),(144,'10240','asd','Fathan Firdaus','2','0815','default.svg'),(145,'10696','asd','Cicih','3','0852','default.svg');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpelanggan`
--

LOCK TABLES `tbpelanggan` WRITE;
/*!40000 ALTER TABLE `tbpelanggan` DISABLE KEYS */;
INSERT INTO `tbpelanggan` VALUES (7,'10361','082134834564',2,'Kajika Sama','0892345734','Mengwi'),(8,'10721','023485323544',1,'Nirwana Sari','0873484553','Tulung Agung'),(9,'10369','004585763954',1,'Kadek Suartana Bumi Arta','0874354632','Jln Tukad Petanu'),(12,'10240','1122334455',6,'Fathan Firdaus','0815','Pamulang'),(13,'10427','112233445566',1,'Rafa Zaidan','0813','Bandung');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpembayaran`
--

LOCK TABLES `tbpembayaran` WRITE;
/*!40000 ALTER TABLE `tbpembayaran` DISABLE KEYS */;
INSERT INTO `tbpembayaran` VALUES (8,36,'2019-02-14',344500,'bukti.png','Sudah'),(16,34,'2022-01-07',1000000,'ttd-digital.png','Belum');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbregister`
--

LOCK TABLES `tbregister` WRITE;
/*!40000 ALTER TABLE `tbregister` DISABLE KEYS */;
INSERT INTO `tbregister` VALUES (1,'10824','asd','Rafa Zaidan','2','0811',NULL,'1'),(2,'10523','asd','Rafa Zaidan','2','0812',NULL,'0'),(3,'10427','asd','Rafa Zaidan','2','0813',NULL,'1'),(5,'10696','asd','Cicih','2','0852',NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtagihan`
--

LOCK TABLES `tbtagihan` WRITE;
/*!40000 ALTER TABLE `tbtagihan` DISABLE KEYS */;
INSERT INTO `tbtagihan` VALUES (32,'M9GWU5','10721',2019,'Januari',90,169500,'Belum'),(34,'H6FBJN','10369',2019,'Januari',100,288500,'Belum'),(35,'53LSQB','10369',2019,'Februari',80,232500,'Belum'),(36,'R0ZIT1','10361',2019,'Januari',120,344500,'Sudah'),(39,'TPNS2I','10361',2019,'Februari',120,344500,'Belum'),(40,'5STY8L','10361',2019,'Maret',100,288500,'Belum'),(41,'JOEC9V','10721',2020,'Desember',1000,1807500,'Belum'),(42,'JZYISQ','10721',2019,'November',1000,1807500,'Belum'),(43,'L9EF5K','10369',2019,'Februari',200000,560008500,'Belum'),(44,'ASKCF7','10721',2019,'November',1000,1807500,'Belum'),(45,'X9GQD1','10427',2019,'Januari',10000,18007500,'Sudah'),(46,'OML4Q2','10240',2021,'Februari',1000,9001200,'Belum');
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
INSERT INTO `tbtarif` VALUES (1,900,1800,7500),(2,1300,2800,8500),(3,2200,3400,12000),(4,18000,9000,10000),(5,18000,9000,1200),(6,18000,9000,1200);
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

-- Dump completed on 2022-01-09 16:16:44
