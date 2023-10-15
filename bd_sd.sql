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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (15,'sandra','123.456.789-10','(22) 2222-2222','sandrinha10@gmail.com','$2y$10$zS13J0KJrd1u4Nr./Fe5s.lEKCakD7aJRUkadO0w5/swDkueAODoC','computacao','una','Matemática','Linguagens',8,0),(14,'lucas','140.625.886-50','(31) 99908-231','lucas@gmail.com','$2y$10$BbE2mU7gHhBzffUIMpNyfu3tqu04RveTapld/QXn0L5cBaW8tv1sW','ri','ufmg','Matemática','Ciências da Natureza',50,0),(13,'izabela','140.625.886-50','(31) 99908-231','izabela@gmail.com','$2y$10$9GexdMtgafhntV1QZ7yzMOYx7pvNPGd/W/e15oWEuDX6GPKUW0xAy','ri','puc','Ciências da Natureza','Matemática',50,1),(12,'rodrigo ','128.528.522-22','(31) 87258-232','rodrigo@gmail.com','$2y$10$BTBUiR85LIs/YJhGO28tt..q8EM6jvzp.UNf4sEkpbjYHs9lXQLEu','musica','puc','Linguagens','Linguagens',5,1),(11,'renata lopes','150.685.735-43','(31) 98652-522','renata@gmail.com','$2y$10$f8MWN71NwVXF2F4sz3ZZQ.Qgh.3Th4jfaaWg6V5vW35uzMRNxekwK','jornalismo','usp','Linguagens','Linguagens',1,0),(10,'gustavo','123.456.789-10','(31) 5852-2222','penido@gmail.com','$2y$10$rTD5Lepx3JrZICgsZWwADeaEKiXPx4ICFuBE.wz4fA2gIKzYL/J8G','computacao','ufmg','Linguagens','Linguagens',24,1),(16,'lucas','125.528.522-28','(31) 99908-231','lucas@gmail.com','$2y$10$L761Zp0XmJpbgMnZn1jrsuRMF4D.tEhfIzPbrPbwaqVwvqa3x9RTW','computacao','puc','Matemática','Ciências da Natureza',10,1),(17,'arthur','525.228.250-22','(21) 52828-222','arthur@gmail.com','$2y$10$GoT7lswXBjjoZHgdcq7TiONXo6i/ZQa7rWkV8nCBsVIZ/lVpBtZPC','computacao','puc','Linguagens','Linguagens',2,0),(18,'izabela','111.111.111-11','(11) 1111111-1','lucas10@gmail.com','$2y$10$5sMnSCrV/ompiLivBjlfvOOl4Sfoi0RqS9qNOSadXauZGCmtToKKW','ri','puc','Matemática','Matemática',2,1),(19,'TESTE1','123.456.789-10','(26) 56-2030','TESTE12@GMAIL.COM','$2y$10$tao41XA3ddrX9Y0C1fp2Duv/Rw84WG9ItdP6WkaxNCwjwPMwXKfUi','computacao','ufmg','Matemática','Matemática',23,1),(20,'TESTE4','554.545.565-55','(55) 263266-22','TESTE4@GMAIL.COM','$2y$10$9z7LBDMgXgECPOoFN1SBF.VlfJ9LI5NC.lyt2EWDFKfdvSgOfDKtu','computacao','ufmg','Matemática','Matemática',78,1),(21,'aluno1','140.625.886-50','(31) 89908-278','aluno10@gmail.com','$2y$10$OO20CVOBUZSo2xlJ1H08ze.E1ep0UaS1N.pjIS8cn0eLNOBTJpali','matematica','puc','Matemática','Ciências da Natureza',2,0);
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudos`
--

LOCK TABLES `conteudos` WRITE;
/*!40000 ALTER TABLE `conteudos` DISABLE KEYS */;
INSERT INTO `conteudos` VALUES (16,'tt','ttttt','Matemática','notas.xlsx'),(15,'Titulocxxccxxc','Escreva a matéria...cxxcxccxxc','Matemática','notas.xlsx'),(11,'oi','oi','Matemática',''),(12,'oi','oi','Matemática',''),(13,'oi','oi','Ciências Humanas',''),(14,'oii','ldskkcx','Ciências da Natureza','notas.xlsx'),(17,'tt','tt','Matemática','Design sem nome (7).png'),(18,'ccc','cccspsksokslkclmc','Matemática','ff.pdf'),(19,'teste 1','tststs','Linguagens','FOLHA DE DADOS - CAPA.pdf'),(20,'TITULO TESTE 1','MATERIA TESTE 1','Matemática','conteudo 1.pdf'),(21,'teste 1010','teste materia 101023','Ciências da Natureza','3ª ETAPA  -  LISTA 08 - ANALISE COMBINÁTORIA (4 Oct 2023 at 0820).pdf'),(22,'TESTE 2 1010','COTEMIG BOSTA','Linguagens','_GUSTAVO LOPES -  CV.pdf'),(23,'TTTTT','TTTT','Matemática','ilovepdf_merged.pdf'),(24,'OI TESTE','TETE SKKDK','Ciências Humanas','Falta de inovação em um setor.pdf'),(25,'TETSE 1010 5.0','CCCC','Ciências Humanas','12908167_certificado_Fgv.pdf');
/*!40000 ALTER TABLE `conteudos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correcoes`
--

DROP TABLE IF EXISTS `correcoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correcoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_redacao` int NOT NULL,
  `comentario` text NOT NULL,
  `nota` float DEFAULT NULL,
  `enviado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_redacao` (`id_redacao`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correcoes`
--

LOCK TABLES `correcoes` WRITE;
/*!40000 ALTER TABLE `correcoes` DISABLE KEYS */;
INSERT INTO `correcoes` VALUES (1,18,'teste 1/2',700,1),(2,16,'teste 2/2',500,1),(3,16,'teste 2/2',500,1),(4,16,'teste 2/2',500,1),(5,3,'teste 4',500,1),(6,4,'teste 7',500,1),(7,6,'teste id 21 aluno1',500,1),(8,9,'o aluno se destacou muito de skc',700,1);
/*!40000 ALTER TABLE `correcoes` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronograma_estudos`
--

LOCK TABLES `cronograma_estudos` WRITE;
/*!40000 ALTER TABLE `cronograma_estudos` DISABLE KEYS */;
INSERT INTO `cronograma_estudos` VALUES (21,'teste 1/2','Segunda'),(20,'teste5','Sexta'),(19,'teste4','Quinta'),(16,'TESTE1','Segunda'),(17,'TESTE 2','Terca'),(18,'teste3','Quarta'),(22,'teste 2/2','Terca'),(23,'teste 3/2','Quarta'),(24,'teste 4/2','Quinta'),(25,'teste 5/2','Sexta'),(26,'teste 1/3','Segunda'),(27,'teste 2/3','Terca'),(28,'teste 3/3','Quarta'),(29,'teste 4/3','Quinta'),(30,'teste 5/3','Sexta');
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'paulo susu','paulosusu@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(2,'paulo susu','paulosusu@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(3,'paulo susu','paulosusu@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(4,'camila','camikla@gmail.com','$2y$10','444.444.444-44','(31) 99722-754','Linguagens'),(5,'gordo','gordo@gmail.com','$2y$10$koaPWTbLaE92kRd9yGrGKOto7w2afR9bachs3WXoQ2x.gBVaKAonm','902.455.753-62','(31) 82054-052','Ciências da Natureza'),(6,'carla','carla@gmail.com','$2y$10$rs0Cp9KyJ1JIQZk7jrN0ye0LRGwxzAsPT6J9E6zrrTvkPkk7dM2PO','222.222.222-22','(11) 47856-866','Linguagens'),(7,'sandra','sandra@gmail.com','$2y$10$crnEBEgxGjBIgD.7hdkW2ePUcmgYed9mDhZTeRPTPc5rHbyeGXFGq','888.888.888-88','(22) 22222-222','Matemática'),(8,'gordo','gordo@gmail.com','$2y$10$d.oVB/sjNSN3S6uK4xlSkeQIwqdJBUAaYTambCG2v6DvIXnStf4Uy','786.252.535-25','(55) 35858-665','Matemática'),(9,'gordo','gordo@gmail.com','$2y$10$Q7BWFpw7/IhXw2m3XMapweKlBH.d5AWw7FNgwxCpZCYPyJ2MTJYxW','786.252.535-25','(55) 35858-665','Ciências da Natureza'),(10,'paulo susu','paulosusu@gmail.com','$2y$10$q5OKY2NQwhWSF0RuTGSJ6OfQuFEAt7DpCMgyUAufpMsuUg.f0iM86','123.456.789-10','(31) 9972-2754','Ciências da Natureza'),(11,'izabela','kjcksxs@dddd.com','$2y$10$BaxCG3IwDepqQ1WJZAuu/uk9dJft9mL15SbwsYo98WjZDA/QAw8za','888.888.888-88','26562030','Ciências da Natureza'),(12,'izabela','izabela@gmail.com','$2y$10$BzbJy7mfMUlvwm33AIxC2OJe2iZs2Ya4nDthZQPQJpYH/sioongp2','12345678910','26562030','Linguagens'),(13,'gustavo','penido@gmail.com','$2y$10$eVj0wzT2IE6cCyPirlogluphlehoK8jW9WdYmdKA3/JtTpvanSM1C','123.456.789-10','(31) 5852-2222','Ciências da Natureza'),(14,'lucas','lucas@gmail.com','$2y$10$hx8ROlfI2LcqJO3/bvmSqe5MNml3yq/e6pbnLebH70zeqA32vZMT.','140.625.886-50','(31) 9990-8231','Ciências da Natureza'),(15,'lucas','lucas@gmail.com','$2y$10$LzyxvnpCJ.DLBSqGE8iqOOgJM.25rn2rrBaknef.imYVM76TChAYe','140.625.886-50','(31) 9990-8231','Matemática'),(16,'pedro','pedro@gmail.com','$2y$10$eoZH74zmxBmFqKgzidvCPeWUgOaHuw2AGbtkRrGrnqLmsAaovPog.','150.558.665-55','31999082317','Ciências da Natureza'),(17,'arthur alemeida','almeida@gmail.com','$2y$10$tP3I2x49NHkInxtIQOOLpuIddSW38qCdl1OwyyXyosR1spvCwufAG','875.052.583-58','(32) 52828-385','Ciências da Natureza'),(18,'TESTE1','TESTE1@GMAIL.COM','$2y$10$GLzOnB/jdxquZmU8SA6kAelJTgu9J/Za/6e4pjYV2SIfjVrTW3W0S','546.262.223-23','(65) 562322222','Linguagens'),(19,'teste3','teste3@gmail.com','$2y$10$v8q9LcpStQocJ3aqPUY.9uOEKghWZN3nupbI.rMTerufclEjBUMwy','266.232.323-23','(65) 6532-3232','Matemática'),(20,'professor1','professor1@gmail.com','$2y$10$S8IBTXyNb4Fd.uB58iTKmuxi4HPydZytwc.vKDoF7BBzaEPIKWnAi','140.625.886-50','(31) 99908-231','Linguagens');
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provas`
--

LOCK TABLES `provas` WRITE;
/*!40000 ALTER TABLE `provas` DISABLE KEYS */;
INSERT INTO `provas` VALUES (1,'ccxxcx',2019,'barra.png','notas.xlsx','2023-08-30 22:24:37'),(2,'TESTE 1',2022,'FOLHA DE DADOS - CAPA.pdf','pp.pdf','2023-09-08 19:56:40'),(3,'teste 2',2021,'LISTA DE MATERIAL - LMD.pdf','_Proposta Comercial Infra Rise (3).pdf','2023-09-11 19:44:51'),(4,'teste1010',2012,'3ª ETAPA  -  LISTA 08 - ANALISE COMBINÁTORIA (4 Oct 2023 at 0820).pdf','3ª ETAPA  -  LISTA 08 - ANALISE COMBINÁTORIA (4 Oct 2023 at 0820).pdf','2023-10-10 18:38:11'),(5,'teste 1010',2018,'Profile (3).pdf','Boleto_0369962850_10_20220910_20220910.pdf','2023-10-10 22:32:53');
/*!40000 ALTER TABLE `provas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red_textos`
--

DROP TABLE IF EXISTS `red_textos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `red_textos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tema` varchar(200) NOT NULL,
  `pdf_textos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red_textos`
--

LOCK TABLES `red_textos` WRITE;
/*!40000 ALTER TABLE `red_textos` DISABLE KEYS */;
INSERT INTO `red_textos` VALUES (1,'teste 1 ','Profile (3) (1).pdf'),(2,'teste 1010','conteudo 1.pdf'),(3,'teste 1410','GustavoLopes-Fundamentos em C-certificate (1).pdf'),(4,'tema final','Cisco PKT.pdf'),(5,'tema final 2 ','9024176_enem_os-impactos-sociais-desiguais-frente-aos-avancos-da-economia-digital-brasileira.pdf');
/*!40000 ALTER TABLE `red_textos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redacoes`
--

DROP TABLE IF EXISTS `redacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `redacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_aluno` int NOT NULL,
  `id_red_textos` int NOT NULL,
  `texto` varchar(400) NOT NULL,
  `enviado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_red_textos` (`id_red_textos`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redacoes`
--

LOCK TABLES `redacoes` WRITE;
/*!40000 ALTER TABLE `redacoes` DISABLE KEYS */;
INSERT INTO `redacoes` VALUES (1,20,1,'App ui design.jpg',1),(2,20,2,'teste',1),(3,21,1,'teste2',1),(4,21,2,'Pure Lust.jpg',1),(5,21,2,'',1),(6,21,3,'teste id 21 aluno1',1),(7,21,4,'',1),(8,21,4,'',1),(9,21,5,'jonathan-borba-v_2FRXEba94-unsplash.jpg',1);
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (2,'teste 1','teste 1teste 1','Linguagens','WhatsApp Video 2023-09-06 at 19.29.38.mp4','2023-09-06 22:49:12'),(3,'teste 1','teste 1 teste 1','Matemática','WhatsApp Video 2023-09-06 at 19.29.38.mp4','2023-09-06 22:50:09'),(4,'teste 2','ddd','Linguagens','WhatsApp Video 2023-09-06 at 19.29.38.mp4','2023-09-06 23:27:53'),(5,'teste 3','ghghghghhghg','Linguagens','WhatsApp Video 2023-09-06 at 20.29.47.mp4','2023-09-06 23:29:58'),(6,'teste 5','teste 5 teste 5','Linguagens','WhatsApp Video 2023-09-06 at 20.29.47.mp4','2023-09-06 23:42:10'),(7,'teste 6','fff','Linguagens','WhatsApp Video 2023-09-06 at 20.29.47.mp4','2023-09-06 23:46:57'),(8,'teste sla','slalas','Linguagens','WhatsApp Video 2023-09-06 at 20.29.47.mp4','2023-09-06 23:54:00'),(9,'teste 2','ddsds','Linguagens','WhatsApp Video 2023-09-06 at 20.29.47.mp4','2023-09-11 21:50:06'),(10,'teste 1110','testando','Ciências da Natureza','teste2.mp4','2023-10-11 14:23:14'),(11,'teste 2 1110','testando','Ciências Humanas','WhatsApp Video 2023-10-11 at 13.14.12.mp4','2023-10-11 16:14:47');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_redacao_aluno`
--

DROP TABLE IF EXISTS `view_redacao_aluno`;
/*!50001 DROP VIEW IF EXISTS `view_redacao_aluno`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_redacao_aluno` AS SELECT 
 1 AS `id`,
 1 AS `id_red_textos`,
 1 AS `nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_redacao_aluno`
--

/*!50001 DROP VIEW IF EXISTS `view_redacao_aluno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_redacao_aluno` AS select `redacoes`.`id` AS `id`,`redacoes`.`id_red_textos` AS `id_red_textos`,`aluno`.`nome` AS `nome` from (`redacoes` join `aluno` on((`redacoes`.`id_aluno` = `aluno`.`id_aluno`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-14 21:38:21
