-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: burkanbank
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IBAN` varchar(60) NOT NULL,
  `curency` int(11) NOT NULL,
  `balance` varchar(60) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `IBAN_UNIQUE` (`IBAN`),
  KEY `fk_accounts_users1_idx` (`users_id`),
  KEY `fk_accounts_account_type1_idx` (`curency`),
  CONSTRAINT `fk_accounts_account_type1` FOREIGN KEY (`curency`) REFERENCES `currency_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_accounts_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (20,'`F|uçq¸Q¸\'Çó·.™ñÅ?é¶ÈzQKµ8¿ A~',16,'a¿Ó]@mi,Ð¿H¶á)',43),(21,'öd·…E†»Fs¼üÙþŒ\0o…g»Ÿú+’¸Â›=J&‡À',16,'äõ?ÂáMˆ\'ü>‘ö†ä’',44);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency_type`
--

DROP TABLE IF EXISTS `currency_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(60) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_id_UNIQUE` (`type_id`),
  UNIQUE KEY `currency_UNIQUE` (`currency`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_type`
--

LOCK TABLES `currency_type` WRITE;
/*!40000 ALTER TABLE `currency_type` DISABLE KEYS */;
INSERT INTO `currency_type` VALUES (89,'¾ö~U-u#ŽàwM–Ÿ'),(17,'Ôõ˜O<ï›D®0¤¡èP4'),(26,'I(»~B_à.(Îd«'),(101,'2ÓµQšŠŠqTyÔ»’É°'),(74,'NV`1ÁÇß…*\ra_'),(108,'²ŽC²³àzDUCœ›'),(141,'ø=­eµ:tõ…gó‡]'),(87,'#®˜w´FžW\'Xîè'),(47,'%ÁnÕèí—@lž‘g&'),(68,'\rV,ª©£bõ5•ó^^_x½'),(95,'–¢$ÕíTï‹9<­ä'),(65,'·„pîM@¬Â‰ÈûË'),(15,'·zu>Zí€‚UQZlßU'),(21,'r[FlËÛ‹cè@÷Œ•j'),(104,'#½¾&U/Åµ¸ƒ6\Z'),(63,'eÙâ³Äñßø/Œ(=Y'),(49,'è?-Üƒo×ä9˜°\\¹'),(31,'°å_6.5ânñ)ðM'),(122,'ÒÏN´´ÖYÜ3=gè†\"'),(3,'!áo\Z}1»ïCØ}?\\œh1'),(19,'\"ÿÛ‘h­–¬Ç‰Ç^^Vh'),(1,')y±P-Â7‡¢™ªK¯'),(157,'+âßFs8}eÌ/®'),(134,',/œâ½Ñ®ƒu«…'),(59,'.¤&ÜCÂ4…„/¡ÆCš'),(42,'0:ýÂÝÇ6	rÚ¸Lmë'),(100,'1#GáaI¥ÄF	a#*Y'),(96,'2öÙ•ìUì$Æû‰´­Xù'),(34,'44Ksût¨™ºnÐr§m'),(143,'6ÎPð©1 ·Ö]r–\rw}&'),(88,'8ï[&àéˆv\Zïæž‰ë3P'),(5,'9“Ó‡½š?3\0³L–ìë'),(84,'9DirðøyOoaúÓ;D‡>'),(6,'9HMd0\"Û(ª1×²#'),(35,':êT™5˜O›ÀwÝ#ÅÝq'),(39,'<Å“AI.¸š–»eÊóh©b'),(50,'=8A\'íÚm9Ði3áº'),(52,'>_CÂ .Ãžû(s\rÊ'),(7,'?ÇÐ4Ï¨P\'¿'),(38,'â+éÈ±o~€q\rÞ‘Ü´'),(18,'àâ™iç“‡=ékm‚¼ø'),(55,'Ãn|+÷_~î@fU”Þ V'),(144,'á]ÄXwÇG³Ð?G87°»u'),(124,'Ã¡®\n–¸Ö¸æÓ:„Ðj?'),(32,'Â«œ£8å\0{Æ„ç@ã ß'),(130,'b¸’\n>¼[ö9oK“Ý_\Z'),(128,'C>ó\0ÈDB1«ªèb'),(54,'Çr¥K×u¿@üÓ¿N{}ù'),(107,'ÇzXŽ:ÎÉ…Tb™)ÉI”'),(14,'CžN>´â¹‰1„,R'),(103,'Ê¯ì–Ñoð‡LŸz\"\Z0t'),(85,'Èö:ÓÏ¦\"‘èbA·ØW±'),(30,'èÚfk±Ôw3\"»í“Oµ'),(29,'èŸ™ôäpü6øÁmKàz\"Û'),(36,'éŽ[ãÜKmfY1\nGlùæ|'),(46,'êm&`š-M©¢‘ÞgF'),(72,'é«rPˆÂ­vÑzœ“jp'),(70,'e‰­Œfu\nå]VTÁËA!'),(119,'GðÇù£ÆWÆåi‰$¸…yB'),(64,'h|}[•ïŒÜ#\"BáµZ'),(76,'hJ!„8E«]$ÕÙHoÐ'),(82,'î‰\\6ñpÍˆ‰æREn–'),(94,'Ìå9*¢„CòôË‰¸n‡œ'),(9,'ÌÖ®?ÂsØÆ*\rÉØlýbO'),(71,'Ìs\"™°wÿÜ³Ô®‰'),(90,'Î~Ó†Ò©sˆuc¦€O¨'),(136,'Jp©%‡÷ôú­cmkØÄ'),(109,'J·\r%=ÙX¾ëcywº'),(121,'j»¨kYYì[j¼_}ë'),(155,'kÝ\r’\r,ÂEËß•ÚF'),(114,'møg’O\0F‚Zðó©05@½'),(43,'N`bÖü3ô¡ Øß'),(60,'N<t?‡×ÇQ¼0á%3'),(77,'ñKo×Ë„$W§h•Üà#'),(80,'Ñ°‰çg^Â¬Öóu\"\08-'),(10,'N‹UR[#¸ñŒé„\rÉ¼g'),(25,'ö÷FE]ÖS—`1\"ã'),(115,'õC£9ZÐ©VÙ9ŒdÁ‘¼'),(106,'Oè.7eÄ Ç¸e\r‚'),(53,'ÖgÈß)$~µÓ¯	´nªæ'),(92,'ô_Èä	“Ÿcd‰þ÷{'),(139,'QlD¾€\0$Š£ƒòT„¶é'),(67,'QÜ=pºû„ü6T¯M'),(86,'r]bÒR$îÁœøÿ­:Íù'),(27,'RµjuÔz2¼i?ÀïÕs¢'),(150,'tK™„QÉƒ_AÂéû¼vC\''),(112,'tOEÝŠ¯Èãïìfƒža'),(156,'ü4¶ó¡ÇpÑ;´Ýãb'),(93,'Uä®A¸á.|l·ü¡·¿U“'),(58,'uBç$½¢ÑZ$´»†Æ5S'),(2,'ùì÷eÁþÅlY\\(Ð¡zÜ'),(148,'Ùx#bÂô_ ªt¢Yå'),(56,'ú]¨ŠËÊ·„ÐÞï tW'),(22,'û½4}a¾­Çå›ÚµäÜ='),(24,'Uþ¶‡e\rÂ…£êBŽÝB'),(146,'V‘DÑt¹g1à+žÀ5º)'),(57,'v™¢‚íúSº5|èßÓœ'),(51,'x?SÀ,ë‡8­J¹-\nsþ'),(126,'Xr´ïC¤UÄH:ŸZA'),(120,'Yâ;TÙëö”ì@#çZ'),(62,'ŸÍvrÖÖvYÆñî=R'),(97,'ž%ZÙ4šôä÷¯ˆìêÂ®'),(11,'z%’süþÄ”å¬]'),(73,'zDÛoæ¶F-ñpzÏÃ…'),(20,'žŸÿ>lÑã¸}¾NÓì\n<î'),(138,'\\wœ‚éA·$©0„Ã!wu'),(33,']œD5\"šüF–=¦k4Ÿ'),(79,'^à!ÒÏ*¿q`>@pe\r'),(28,'`0M¢g/AK:XG_ÌÆS'),(153,'`V\nãdÊ£°ÓÈÄ$0)•'),(13,'`²”H=vT9‘®5–˜€'),(61,'|Ž\n¢}jh2à‹EñT'),(8,'}lëJQß¬ZÎ?|[Îï.¯'),(145,'~™d¢ñ¸È£À§1Ü$M'),(151,'ª‚ÒB”ð³t%“0¤öã'),(98,'´7üœv1?TØðñŸ|Oª'),(147,' }jßmÞ\ZÐçvJÍÍµêÞ'),(113,'¢î®9\"À¬¾ÕTñ%ò3R«'),(117,'£¦Žêù5\'‚AiŒ*Ë¹/'),(37,'¥+§è»j\0ƒÚpBô„'),(135,'¥M	U—º“‚ø!Ê‰h'),(23,'§· 8\"‚”tDùO~\'¤|'),(137,'¨O»í”ý,#¢2Bä •H'),(129,'©DlÀ-Yøz~ËË¹ž_6€'),(152,'©iZç9\n¶B7»p}dE•'),(41,'©ö¾ÿzd_½»E4\'¦<'),(123,'ªE« ž–74²‰E¨4“'),(140,'«gJŒ˜­©šãð.‹$P'),(105,'­üÃâ.‰a@¶\0Í¹K\n\'x'),(110,'¯0\0E\nk&\nkÆg²/–'),(149,'´HŽQÐŸˆÏ\0Í\Z£q'),(83,'´õx>¬ˆÝ4DL’J0d¥'),(78,'·NµŽŸYu†\0š™ËB¿'),(142,'¹eKPÇ?çeò;Î‘'),(99,'¹­yƒãkÕ‰¬ó<ümè'),(75,'¼[!_éBšb’‹µÅUÏÓ'),(12,'¾\0\'5;XøŸBÛàaÒ*'),(44,'¿}|­Í›½–€-šV\0¡'),(66,'Æ‘©M¹B¾Ö^XÄ!Û˜O'),(116,'ÆlÆaþòÄØ¥–‚Q—©'),(131,'øËZ¯Äï,ÔRRÇ\"Ÿ'),(4,'œü.ˆÌ·,¦•ÔÌ²Åáå'),(133,'Œ…øóÞSàÚÌ¶Šä¶P'),(91,'ˆñû$B—\n!`RHím'),(132,'‘O´q¹Èæý¿Y¶/1'),(118,'‘ó8Cö½ÌðBy¿MÆ…Ü'),(48,'‘ï‹›­éÒD&.¡]JCv'),(69,'’‘^EŒµ\\,¡¢[ZU'),(45,'“¼¯ù‡h…îFè±˜Ë;f'),(111,'”0Ú—™ê*_J†RÀÓ!y'),(127,'„\"#8\n\0ÚÝ;¾œ(?²ˆ'),(40,'‡? %W4¥Ÿ¬ç†AÛ'),(16,'‡ÞÆœa©n™f…Äì7È;'),(81,'•ºÛä\rc-ïJQ´¥ì'),(125,'‹°›n²Œ2´ü~³ýnÎo'),(154,'›UÍ·°¼4>*MiCÔÔ'),(102,'™kîòcÖJ0°õ9bô²');
/*!40000 ALTER TABLE `currency_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technical_data`
--

DROP TABLE IF EXISTS `technical_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technical_data` (
  `ip` varchar(60) NOT NULL,
  `atempts` int(11) NOT NULL,
  `last_atempt` int(11) DEFAULT NULL,
  PRIMARY KEY (`ip`),
  UNIQUE KEY `id_UNIQUE` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technical_data`
--

LOCK TABLES `technical_data` WRITE;
/*!40000 ALTER TABLE `technical_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `technical_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `reference_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_iban` varchar(60) NOT NULL,
  `date` varchar(60) NOT NULL,
  `sum` varchar(60) NOT NULL,
  `recipient_iban` varchar(60) NOT NULL,
  `reason` varchar(130) NOT NULL,
  `aditional_reason` varchar(130) DEFAULT NULL,
  `recipient_name` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  PRIMARY KEY (`reference_id`),
  UNIQUE KEY `transaction_number_UNIQUE` (`reference_id`),
  KEY `fk_transactions_accounts1_idx` (`sender_iban`),
  CONSTRAINT `fk_transactions_accounts1` FOREIGN KEY (`sender_iban`) REFERENCES `accounts` (`IBAN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_phone` varchar(60) NOT NULL,
  `login_name` varchar(60) NOT NULL,
  `login_pass` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  UNIQUE KEY `user_phone_UNIQUE` (`user_phone`),
  UNIQUE KEY `login_name_UNIQUE` (`login_name`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (43,'ˆ„2$ñF<Ârñ~fóõgµ','@}ün¦|ˆCa&ðÇé±yÄÉ¬Þ\"+\nÏö,í','áÙòUR‡ˆä\"qèa·Æ','¨Tô)½e\0ËÙóz+%™','z1ÜÒã§1[§}Û^{ž¢~ÈGb¼ûçQkhD}','$2y$15$5SpInI3c36pvkvL1yXzBHe7y/aVUj9bGyGlKOeFmEVZFB6XzpPNVa'),(44,'\ZÒÃö5Ü\Z¨§€|ÄÄâx¿Ø©HÈ%¢½÷)¹+÷±×ž','#oXLÑ]f¢ÔP‹e­Ú\\RÄlœ³PN[\nò','lßÈ×Ý3çôCÍkp³‘_sÂ€˜D-•¢+å)®JÒ‚','¾E!©‚·ã_,™Ätè6F','N’¸Ú<0zlù‘í•ÒæÚý”kè†ü·','$2y$15$Cu96TaGQ/nVixQjRtxWqx.4FD0dH9sqld1jG6te3Bn0k7nPCXT52u');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'burkanbank'
--

--
-- Dumping routines for database 'burkanbank'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-02 12:11:05
