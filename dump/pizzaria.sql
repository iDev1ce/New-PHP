CREATE DATABASE  IF NOT EXISTS `db_pizzaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pizzaria`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_pizzaria
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `curiosidades`
--

DROP TABLE IF EXISTS `curiosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curiosidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curiosidades`
--

LOCK TABLES `curiosidades` WRITE;
/*!40000 ALTER TABLE `curiosidades` DISABLE KEYS */;
INSERT INTO `curiosidades` VALUES (11,'São Paulo - Além de ter um dia só para ela, a história da pizza esconde curiosidades que nem todo mundo conhece. A sua origem, por exemplo, é questionável. Há relatos que ela pode ter surgido bem antes de Cristo e não no século XVI, na Itália.\r\n\r\nA pizza que comemos hoje com molho de tomate, queijo e outros recheios teve origem em Nápoles, na Itália, por volta de 1.520.\r\n\r\nBem antes disso, no entanto, há relatos que no século 6 a.C. soldados assavam um pão achatado em seus escudos.\r\n\r\nEssa pode ser possivelmente a mais antiga menção sobre o surgimento da pizza.','5b47c8c9ac4f4f61a5c21bc92b3c4321b449d18f23f22f084f805d6fdca484da.jpg',_binary ''),(12,'São Paulo - Além de ter um dia só para ela, a história da pizza esconde curiosidades que nem todo mundo conhece. A sua origem, por exemplo, é questionável. Há relatos que ela pode ter surgido bem antes de Cristo e não no século XVI, na Itália.\r\n\r\nA pizza que comemos hoje com molho de tomate, queijo e outros recheios teve origem em Nápoles, na Itália, por volta de 1.520.\r\n\r\nBem antes disso, no entanto, há relatos que no século 6 a.C. soldados assavam um pão achatado em seus escudos.\r\n\r\nEssa pode ser possivelmente a mais antiga menção sobre o surgimento da pizza.','5c09d80eac68ae9fde31828d2eff6bf922efa50a28a6e1d7eac20fad3f6882cb.jpg',_binary '');
/*!40000 ALTER TABLE `curiosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filiais`
--

DROP TABLE IF EXISTS `filiais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filiais` (
  `id_filial` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(150) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `status` bit(1) NOT NULL,
  `numero` varchar(15) NOT NULL,
  PRIMARY KEY (`id_filial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filiais`
--

LOCK TABLES `filiais` WRITE;
/*!40000 ALTER TABLE `filiais` DISABLE KEYS */;
INSERT INTO `filiais` VALUES (1,'Rua Luiz Scott','Vila Nossa Sra. da Escada','Barueri','SP','06440-260',_binary '','108');
/*!40000 ALTER TABLE `filiais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis`
--

DROP TABLE IF EXISTS `niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `niveis` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `adm_contato` bit(1) NOT NULL,
  `adm_conteudo` bit(1) NOT NULL,
  `adm_usuarios` bit(1) NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis`
--

LOCK TABLES `niveis` WRITE;
/*!40000 ALTER TABLE `niveis` DISABLE KEYS */;
INSERT INTO `niveis` VALUES (1,'Administrador',_binary '',_binary '',_binary '',_binary ''),(8,'Administrador de Conteúdo',_binary '\0',_binary '',_binary '\0',_binary '');
/*!40000 ALTER TABLE `niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sobre`
--

DROP TABLE IF EXISTS `sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sobre` (
  `id_sobre` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id_sobre`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sobre`
--

LOCK TABLES `sobre` WRITE;
/*!40000 ALTER TABLE `sobre` DISABLE KEYS */;
INSERT INTO `sobre` VALUES (16,'PIZZARIA FRAJOLA, UM EXEMPLO A SER SEGUIDO','Não é Crepe, Panqueca, Cone, tampouco Taco. É Pizza Frajolas! Massa Extra Fina e crocante, a qual é recheada com os mais variados e saborosos ingredientes. São mais de 70 sabores de Pizzas (salgadas, doces e Light) a escolha dos clientes.\r\nNa Pizzaria Frajolas tudo é pensado para que você tenha a melhor e mais espetacular experiência ao saborear uma Pizza prática, barata, diferente, crocante e muito saborosa. Para isso, somos criteriosos na escolha dos ingredientes e na apresentação de nossas Pizzas, as quais são embaladas individualmente para facilitar a degustação.','5581cbbc8fbafa3e3c27168a2affbc134e0d737849d78220359ad5fb952b1e27.jpg',_binary ''),(17,'UM NOVO CONCEITO DE PIZZA','Não é Crepe, Panqueca, Cone, tampouco Taco. É Pizza Frajolas! Massa Extra Fina e crocante, a qual é recheada com os mais variados e saborosos ingredientes. São mais de 70 sabores de Pizzas (salgadas, doces e Light) a escolha dos clientes.\r\n\r\n\r\nNa Pizza Frajolas tudo é pensado para que você tenha a melhor e mais espetacular experiência ao saborear uma Pizza prática, barata, diferente, crocante e muito saborosa. Para isso, somos criteriosos na escolha dos ingredientes e na apresentação de nossas Pizzas, as quais são embaladas individualmente para facilitar a degustação.','ca6c0fe4e43c36bf7735ed52a39e5dd70331f66db49dcf3b6d46a5c46142a7c7.jpg',_binary '');
/*!40000 ALTER TABLE `sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contatos`
--

DROP TABLE IF EXISTS `tbl_contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `homepage` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(150) NOT NULL,
  `mensagem` text NOT NULL,
  `critica_sugestao` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contatos`
--

LOCK TABLES `tbl_contatos` WRITE;
/*!40000 ALTER TABLE `tbl_contatos` DISABLE KEYS */;
INSERT INTO `tbl_contatos` VALUES (2,'Juan Riquelme','NA','(31) 23123-12','juan@gmail.com','NA','NA','M','Programador','Mais queijoo!','critica'),(4,'Juan Riquelme','NA','(12) 34124-2142','juan@gmail.com','NA','NA','M','Programador','As pizzas estavam muito boas!\r\nPorém, seria ótimo caso houvesse brinde quando se compra combos, muito obrigado!','sugestao');
/*!40000 ALTER TABLE `tbl_contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status` bit(1) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nivel_idx` (`id_nivel`),
  CONSTRAINT `id_nivel` FOREIGN KEY (`id_nivel`) REFERENCES `niveis` (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Juan Riquelme','juan@gmail.com','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',_binary '',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-19  1:40:16
