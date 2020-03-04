
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
DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Juan','Valdez','100@100.com','f899139df5e1059396431415e770c6dd');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `medico_idmedico` int(11) NOT NULL,
  `paciente_idpaciente` int(11) NOT NULL,
  `consultorio_idconsultorio` int(11) NOT NULL,
  PRIMARY KEY (`idcita`),
  KEY `fk_cita_medico1_idx` (`medico_idmedico`),
  KEY `fk_cita_paciente1_idx` (`paciente_idpaciente`),
  KEY `fk_cita_consultorio1_idx` (`consultorio_idconsultorio`),
  CONSTRAINT `fk_cita_consultorio1` FOREIGN KEY (`consultorio_idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_medico1` FOREIGN KEY (`medico_idmedico`) REFERENCES `medico` (`idmedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_paciente1` FOREIGN KEY (`paciente_idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (1,'2020-03-02','14:00:00',1,1,1),(2,'2020-03-03','16:00:00',2,1,2),(3,'2020-03-03','09:00:00',1,2,3),(4,'2020-03-04','11:00:00',3,2,1),(5,'2020-03-05','19:00:00',2,3,3),(6,'2020-03-02','21:00:00',1,3,1),(7,'2020-03-02','21:00:00',1,3,1),(8,'2020-03-02','21:00:00',1,3,1),(9,'2020-03-02','21:00:00',1,3,1),(10,'2020-03-02','21:00:00',1,3,1),(11,'2020-03-02','21:00:00',1,3,1),(12,'2020-03-02','21:00:00',1,3,1),(13,'2020-03-02','21:00:00',1,1,1),(14,'2020-03-02','21:00:00',1,1,1),(15,'2020-03-02','21:00:00',1,1,1),(16,'2020-03-02','21:00:00',1,1,1),(17,'2020-03-02','21:00:00',1,1,1),(18,'2020-03-02','21:00:00',1,1,1),(19,'2020-03-02','21:00:00',1,1,1),(20,'2020-03-02','21:00:00',1,1,1),(21,'2020-03-02','21:00:00',1,1,1),(22,'2020-03-02','21:00:00',1,1,1),(23,'2020-03-02','21:00:00',1,1,1),(24,'2020-03-02','21:00:00',1,1,1),(25,'2020-03-02','21:00:00',1,1,1),(26,'2020-03-02','21:00:00',1,1,1),(27,'2020-03-02','21:00:00',1,1,1),(28,'2020-03-02','21:00:00',1,1,1),(29,'2020-03-02','21:00:00',1,1,1),(30,'2020-03-02','21:00:00',1,1,1),(31,'2020-03-02','21:00:00',1,1,1),(32,'2020-03-02','21:00:00',1,1,1),(33,'2020-03-02','21:00:00',1,1,1),(34,'2020-03-02','21:00:00',1,1,1),(35,'2020-03-02','21:00:00',1,1,1),(36,'2020-03-02','21:00:00',1,1,1),(37,'2020-03-02','21:00:00',1,1,1),(38,'2020-03-02','21:00:00',1,1,1),(39,'2020-03-02','21:00:00',1,1,1),(40,'2020-03-02','21:00:00',1,1,1),(41,'2020-03-02','21:00:00',1,1,1),(42,'2020-03-02','21:00:00',1,1,1),(43,'2020-03-02','21:00:00',1,1,1),(44,'2020-03-02','21:00:00',1,1,1),(45,'2020-03-02','21:00:00',1,1,1);
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `consultorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultorio` (
  `idconsultorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idconsultorio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `consultorio` WRITE;
/*!40000 ALTER TABLE `consultorio` DISABLE KEYS */;
INSERT INTO `consultorio` VALUES (1,'c1'),(2,'c2'),(3,'c3');
/*!40000 ALTER TABLE `consultorio` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idespecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'Dermatologia'),(2,'Urologia');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `idmedico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tarjetaprofesional` varchar(45) NOT NULL,
  `especialidad_idespecialidad` int(11) NOT NULL,
  PRIMARY KEY (`idmedico`),
  KEY `fk_medico_especialidad_idx` (`especialidad_idespecialidad`),
  CONSTRAINT `fk_medico_especialidad` FOREIGN KEY (`especialidad_idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (1,'Pepe','Perez','101@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','a1',1),(2,'Maria','Gonzalez','102@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','a2',2),(3,'Juan','Rodriguez','103@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','a3',1);
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'Pedro','Picapiedra','10@10.com','d3d9446802a44259755d38e6d163e820','10',0,'12345','Calle sur','132020060729.jpg'),(2,'Pablo','Marmol','20@20.com','98f13708210194c475687be6106a3b84','20',1,NULL,NULL,'default.png'),(3,'Homero','Simpson','30@30.com','34173cb38f07f89ddbebc2ac9128303f','30',0,NULL,NULL,'default.png'),(4,'Clark','Kent','40@40.com','d645920e395fedad7bbbed0eca3fe2e0','40',0,NULL,NULL,'default.png'),(5,'Maria','Picapiedra','11@11.com','d3d9446802a44259755d38e6d163e820','10',0,NULL,NULL,'default.png'),(6,'Pepe','Marmol','12@12.com','98f13708210194c475687be6106a3b84','20',1,'423423','calle 1','default.png'),(7,'Juan','Simpson','13@13.com','34173cb38f07f89ddbebc2ac9128303f','30',0,NULL,NULL,'default.png'),(8,'Julian','Kent','14@14.com','d645920e395fedad7bbbed0eca3fe2e0','40',1,'123','123','default.png'),(9,'dante','Picapiedra','31@31.com','d3d9446802a44259755d38e6d163e820','10',0,NULL,NULL,'default.png'),(10,'venus','Marmol','32@32.com','98f13708210194c475687be6106a3b84','20',0,NULL,NULL,'default.png'),(11,'rocky','Simpson','33@33.com','34173cb38f07f89ddbebc2ac9128303f','30',0,NULL,NULL,'default.png'),(12,'Luna','Kent','34@34.com','d645920e395fedad7bbbed0eca3fe2e0','40',1,'123','123','default.png'),(13,'Tony','Kent','35@35.com','d645920e395fedad7bbbed0eca3fe2e0','40',1,'123','123','default.png'),(14,'Snoopy','Kent','36@36.com','d645920e395fedad7bbbed0eca3fe2e0','40',1,'123','123','default.png'),(15,'Manchas','Kent','37@37.com','d645920e395fedad7bbbed0eca3fe2e0','40',1,'123','123','default.png'),(16,'Michigo','Kent','38@38.com','d645920e395fedad7bbbed0eca3fe2e0','40',0,'123','123','default.png'),(17,'Yo','Yo','70@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','70',1,'1234567','Sur',NULL);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

