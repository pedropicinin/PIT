-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: sem_desculpas
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluno` (
  `id_aluno` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `curso_desejado` varchar(45) NOT NULL,
  `instituicao_desejada` varchar(45) NOT NULL,
  `materias_estudar` varchar(45) NOT NULL,
  `materias_dificuldade` varchar(45) NOT NULL,
  `horas_estudadas` int NOT NULL,
  `notificacoes` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (15,'sandra','123.456.789-10','(22) 2222-2222','sandrinha10@gmail.com','$2y$10$zS13J0KJrd1u4Nr./Fe5s.lEKCakD7aJRUkadO0w5/swDkueAODoC','computacao','una','Matemática','Linguagens',8,0),(14,'lucas','140.625.886-50','(31) 99908-231','lucas@gmail.com','$2y$10$BbE2mU7gHhBzffUIMpNyfu3tqu04RveTapld/QXn0L5cBaW8tv1sW','ri','ufmg','Matemática','Ciências da Natureza',50,0),(13,'izabela','140.625.886-50','(31) 99908-231','izabela@gmail.com','$2y$10$9GexdMtgafhntV1QZ7yzMOYx7pvNPGd/W/e15oWEuDX6GPKUW0xAy','ri','puc','Ciências da Natureza','Matemática',50,1),(12,'rodrigo ','128.528.522-22','(31) 87258-232','rodrigo@gmail.com','$2y$10$BTBUiR85LIs/YJhGO28tt..q8EM6jvzp.UNf4sEkpbjYHs9lXQLEu','musica','puc','Linguagens','Linguagens',5,1),(11,'renata lopes','150.685.735-43','(31) 98652-522','renata@gmail.com','$2y$10$f8MWN71NwVXF2F4sz3ZZQ.Qgh.3Th4jfaaWg6V5vW35uzMRNxekwK','jornalismo','usp','Linguagens','Linguagens',1,0),(10,'gustavo','123.456.789-10','(31) 5852-2222','penido@gmail.com','$2y$10$rTD5Lepx3JrZICgsZWwADeaEKiXPx4ICFuBE.wz4fA2gIKzYL/J8G','computacao','ufmg','Linguagens','Linguagens',24,1),(16,'lucas','125.528.522-28','(31) 99908-231','lucas@gmail.com','$2y$10$L761Zp0XmJpbgMnZn1jrsuRMF4D.tEhfIzPbrPbwaqVwvqa3x9RTW','computacao','puc','Matemática','Ciências da Natureza',10,1),(17,'arthur','525.228.250-22','(21) 52828-222','arthur@gmail.com','$2y$10$GoT7lswXBjjoZHgdcq7TiONXo6i/ZQa7rWkV8nCBsVIZ/lVpBtZPC','computacao','puc','Linguagens','Linguagens',2,0),(18,'izabela','111.111.111-11','(11) 1111111-1','lucas10@gmail.com','$2y$10$5sMnSCrV/ompiLivBjlfvOOl4Sfoi0RqS9qNOSadXauZGCmtToKKW','ri','puc','Matemática','Matemática',2,1);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conteudos`
--

DROP TABLE IF EXISTS `conteudos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conteudos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `materia` text NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  `anexo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudos`
--

LOCK TABLES `conteudos` WRITE;
/*!40000 ALTER TABLE `conteudos` DISABLE KEYS */;
INSERT INTO `conteudos` VALUES (15,'Titulocxxccxxc','Escreva a matéria...cxxcxccxxc','Matemática','notas.xlsx'),(11,'oi','oi','Matemática',''),(12,'oi','oi','Matemática',''),(13,'oi','oi','Ciências Humanas',''),(14,'oii','ldskkcx','Ciências da Natureza','notas.xlsx');
/*!40000 ALTER TABLE `conteudos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronograma_estudos`
--

DROP TABLE IF EXISTS `cronograma_estudos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cronograma_estudos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conteudo` text,
  `dia_semana` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronograma_estudos`
--

LOCK TABLES `cronograma_estudos` WRITE;
/*!40000 ALTER TABLE `cronograma_estudos` DISABLE KEYS */;
INSERT INTO `cronograma_estudos` VALUES (1,'sgeunda','Segunda'),(2,'terca','Terca'),(3,'quarta','Quarta'),(4,'dddd','Quinta'),(5,'ddd','Sexta');
/*!40000 ALTER TABLE `cronograma_estudos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicios`
--

DROP TABLE IF EXISTS `exercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` text,
  `materia` varchar(50) NOT NULL,
  `pontuacao` int DEFAULT NULL,
  `concluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicios`
--

LOCK TABLES `exercicios` WRITE;
/*!40000 ALTER TABLE `exercicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `id_professor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `materia_lecionar` varchar(45) NOT NULL,
  PRIMARY KEY (`id_professor`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'paulo susu','paulosusu@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(2,'paulo susu','paulosusu@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(3,'paulo susu','paulosusu@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(4,'camila','camikla@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(5,'gordo','gordo@gmail.com','$2y$10$koaPWTbLaE92kRd9yGrGKOto7w2afR9bachs3WXoQ2x.gBVaKAonm','902.455.753-62','(31) 82054-052','Ciências da Natureza'),(6,'carla','carla@gmail.com','$2y$10$rs0Cp9KyJ1JIQZk7jrN0ye0LRGwxzAsPT6J9E6zrrTvkPkk7dM2PO','222.222.222-22','(11) 47856-866','Linguagens'),(7,'sandra','sandra@gmail.com','$2y$10$crnEBEgxGjBIgD.7hdkW2ePUcmgYed9mDhZTeRPTPc5rHbyeGXFGq','888.888.888-88','(22) 22222-222','Matemática'),(8,'gordo','gordo@gmail.com','$2y$10$d.oVB/sjNSN3S6uK4xlSkeQIwqdJBUAaYTambCG2v6DvIXnStf4Uy','786.252.535-25','(55) 35858-665','Matemática'),(9,'gordo','gordo@gmail.com','$2y$10$Q7BWFpw7/IhXw2m3XMapweKlBH.d5AWw7FNgwxCpZCYPyJ2MTJYxW','786.252.535-25','(55) 35858-665','Ciências da Natureza'),(10,'paulo susu','paulosusu@gmail.com','$2y$10$q5OKY2NQwhWSF0RuTGSJ6OfQuFEAt7DpCMgyUAufpMsuUg.f0iM86','123.456.789-10','(31) 9972-2754','Ciências da Natureza'),(11,'izabela','kjcksxs@dddd.com','$2y$10$BaxCG3IwDepqQ1WJZAuu/uk9dJft9mL15SbwsYo98WjZDA/QAw8za','888.888.888-88','26562030','Ciências da Natureza'),(12,'izabela','izabela@gmail.com','$2y$10$BzbJy7mfMUlvwm33AIxC2OJe2iZs2Ya4nDthZQPQJpYH/sioongp2','12345678910','26562030','Linguagens'),(13,'gustavo','penido@gmail.com','$2y$10$eVj0wzT2IE6cCyPirlogluphlehoK8jW9WdYmdKA3/JtTpvanSM1C','123.456.789-10','(31) 5852-2222','Ciências da Natureza'),(14,'lucas','lucas@gmail.com','$2y$10$hx8ROlfI2LcqJO3/bvmSqe5MNml3yq/e6pbnLebH70zeqA32vZMT.','140.625.886-50','(31) 9990-8231','Ciências da Natureza'),(15,'lucas','lucas@gmail.com','$2y$10$LzyxvnpCJ.DLBSqGE8iqOOgJM.25rn2rrBaknef.imYVM76TChAYe','140.625.886-50','(31) 9990-8231','Matemática'),(16,'pedro','pedro@gmail.com','$2y$10$eoZH74zmxBmFqKgzidvCPeWUgOaHuw2AGbtkRrGrnqLmsAaovPog.','150.558.665-55','31999082317','Ciências da Natureza'),(17,'arthur alemeida','almeida@gmail.com','$2y$10$tP3I2x49NHkInxtIQOOLpuIddSW38qCdl1OwyyXyosR1spvCwufAG','875.052.583-58','(32) 52828-385','Ciências da Natureza');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provas`
--

DROP TABLE IF EXISTS `provas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_concurso` varchar(255) NOT NULL,
  `ano` int NOT NULL,
  `nome_arquivo_gabarito` varchar(255) NOT NULL,
  `nome_arquivo_prova` varchar(255) NOT NULL,
  `data_postagem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provas`
--

LOCK TABLES `provas` WRITE;
/*!40000 ALTER TABLE `provas` DISABLE KEYS */;
INSERT INTO `provas` VALUES (1,'ccxxcx',2019,'barra.png','notas.xlsx','2023-08-30 22:24:37');
/*!40000 ALTER TABLE `provas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redacoes`
--

DROP TABLE IF EXISTS `redacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `redacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_entrega` date NOT NULL,
  `topico` varchar(100) NOT NULL,
  `instrucoes` text,
  `nota` float DEFAULT NULL,
  `concluida` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redacoes`
--

LOCK TABLES `redacoes` WRITE;
/*!40000 ALTER TABLE `redacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `redacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_video` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `materia` varchar(255) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `data_postagem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-01 16:31:28
