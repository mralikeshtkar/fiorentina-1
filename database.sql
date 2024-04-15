-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: botble
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `code` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activations_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'9kUk0c2BuUk061ZrQZFJibEE0Cd5kQJa',1,'2024-04-11 00:42:49','2024-04-11 00:42:49','2024-04-11 00:42:49');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_notifications`
--

DROP TABLE IF EXISTS `admin_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_notifications`
--

LOCK TABLES `admin_notifications` WRITE;
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_histories`
--

DROP TABLE IF EXISTS `audit_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `module` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` longtext COLLATE utf8mb4_unicode_ci,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_user` bigint unsigned NOT NULL,
  `reference_id` bigint unsigned NOT NULL,
  `reference_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_histories_user_id_index` (`user_id`),
  KEY `audit_histories_module_index` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_histories`
--

LOCK TABLES `audit_histories` WRITE;
/*!40000 ALTER TABLE `audit_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocks_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,'Prof. Concepcion Thiel DDS','prof-concepcion-thiel-dds','Sunt magnam qui omnis voluptatem.','Eum et mollitia neque est libero ut. In dolor rem rerum recusandae voluptate ab. Cumque aut enim quos tempora necessitatibus. Et nisi fuga quos excepturi. Ex qui ipsa ut consequatur sunt sunt. Id a quaerat nesciunt aut voluptate rerum et corporis. Sed impedit dolorem omnis ad. Ut et aut deleniti ipsam. Atque corrupti saepe quam incidunt quis a. Nam recusandae minus quo ex porro voluptatum ipsa quia. Animi suscipit eos maxime. Ut in ad quia mollitia.','published',NULL,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(2,'Mr. Ethel Deckow MD','mr-ethel-deckow-md','Rerum iure ipsa aliquam fuga beatae.','Nostrum impedit qui sapiente et. Qui delectus in minima qui assumenda corrupti. Itaque omnis non quis enim ab doloremque illum. Molestias iure quis sit quos aut quasi. Explicabo amet qui velit neque earum. Laudantium ut ipsa porro asperiores similique distinctio. Repellat veniam soluta est eius sunt veritatis sapiente sit. Ad porro sed perferendis molestiae explicabo ipsam.','published',NULL,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(3,'Nicholaus Kuvalis','nicholaus-kuvalis','Quod sint et tempora distinctio.','Ea qui nihil aut placeat omnis perspiciatis. Cumque qui quod laborum reprehenderit neque qui. Repellat consectetur quia consequatur consequuntur. Voluptatem quo suscipit sed at qui ea eius corporis. Voluptatem consequatur aut adipisci deserunt aut. Ratione impedit similique deserunt in excepturi voluptas non. Omnis accusantium eos nisi sequi. Illum repellendus enim maxime atque consectetur modi.','published',NULL,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(4,'Pauline Altenwerth','pauline-altenwerth','Sint voluptatum tempore rerum nemo enim.','Mollitia voluptas asperiores ab ea repellat dolorum. Ad ea distinctio qui non esse et. Velit et voluptatem aliquam saepe. Magni et fugiat quia officia quasi tempora aliquam. Voluptas fugiat non veritatis sequi. Molestiae non expedita inventore sunt et et qui modi. Molestias commodi voluptatem nisi aut architecto quis nihil.','published',NULL,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(5,'Dayana Douglas','dayana-douglas','Quos quia libero quis fuga voluptas voluptatem.','Nihil earum quia provident qui dolor veritatis expedita molestias. Exercitationem tenetur hic voluptas. Et est molestiae dolor et nesciunt mollitia. Sint delectus assumenda libero est perspiciatis aut aut maiores. Beatae suscipit porro doloribus et. Sit magni expedita aut. Nulla itaque distinctio sed harum suscipit sequi. Et velit pariatur optio vel aliquam repellat suscipit.','published',NULL,'2024-04-11 00:42:54','2024-04-11 00:42:54');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocks_translations`
--

DROP TABLE IF EXISTS `blocks_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blocks_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocks_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`blocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks_translations`
--

LOCK TABLES `blocks_translations` WRITE;
/*!40000 ALTER TABLE `blocks_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `blocks_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` bigint unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `icon` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint NOT NULL DEFAULT '0',
  `is_featured` tinyint NOT NULL DEFAULT '0',
  `is_default` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_status_index` (`status`),
  KEY `categories_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Artificial Intelligence',0,'Consequuntur ipsam facere repellat velit asperiores occaecati dolorem voluptas. Doloribus recusandae rerum ratione minima.','published',1,'Botble\\ACL\\Models\\User',NULL,0,0,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(2,'Cybersecurity',0,'Recusandae nemo placeat sit neque. Quia voluptatem ab eaque similique eum et. Molestias ut cupiditate voluptatem. Rem sed maiores commodi dolores aut provident voluptatem.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(3,'Blockchain Technology',0,'Voluptas omnis dolorem atque maiores delectus. In aspernatur omnis consequatur aspernatur aut voluptatem. Quidem modi alias ex magni rerum. Laudantium exercitationem omnis deserunt illo et.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(4,'5G and Connectivity',0,'Amet ullam voluptas eaque quas veniam autem. Molestiae provident velit totam nulla dicta et. Dicta autem unde accusamus molestias qui aperiam explicabo.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(5,'Augmented Reality (AR)',0,'Ipsum sequi voluptatem temporibus iusto illo rerum voluptatem totam. Vel est earum error facilis quos voluptatem sed. Ab deleniti et minus odio. Aut earum vitae qui.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(6,'Green Technology',0,'Iure labore cumque at quisquam necessitatibus aliquid. Sit aut pariatur repellendus et voluptas quos. Maxime soluta cupiditate voluptatem aut perferendis. Corrupti architecto nobis eos eos quas.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(7,'Quantum Computing',0,'Dicta molestiae et eos eos. Nemo vel aut quam qui et quo unde. Dolore nobis ipsa rerum id dicta vitae iusto placeat.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(8,'Edge Computing',0,'Quo natus et et doloremque a eius. Voluptatibus laudantium sunt ipsam deserunt placeat quia. Eos reiciendis ipsum iste earum voluptatibus ut illum. Ut quam rerum tenetur voluptatibus voluptas.','published',1,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2024-04-11 00:42:50','2024-04-11 00:42:50');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_translations`
--

DROP TABLE IF EXISTS `categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_translations`
--

LOCK TABLES `categories_translations` WRITE;
/*!40000 ALTER TABLE `categories_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_replies`
--

DROP TABLE IF EXISTS `contact_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_replies`
--

LOCK TABLES `contact_replies` WRITE;
/*!40000 ALTER TABLE `contact_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Daren Monahan DDS','margaret75@example.net','747-905-4803','20385 Thaddeus Summit Apt. 966\nPort Russ, PA 28899-4744','Earum consequuntur officiis ducimus sed.','Voluptatibus earum velit totam natus est. Vitae dignissimos consequuntur aliquam provident possimus asperiores at. Tempora blanditiis maxime id sed. At voluptatem vel et dolores error. Porro fuga et consequatur officia odio voluptate. Laboriosam accusantium ullam veniam a. Omnis consequatur omnis labore est velit reiciendis. Eos et consequuntur est sequi et dicta. Sequi corrupti velit voluptatum.','unread','2024-04-11 00:42:54','2024-04-11 00:42:54'),(2,'Helmer Stanton','zstamm@example.org','+15596146746','65115 Casper Forge\nKariannestad, OR 81055','Officiis libero consequatur deleniti ipsa.','Voluptatem et velit commodi nesciunt facilis nostrum non. Neque consequatur atque quidem esse. Necessitatibus magni cupiditate a optio debitis sed vel asperiores. Perspiciatis ad aut mollitia voluptatem. Assumenda accusantium unde fuga. Distinctio cumque dolores aut. Et laboriosam doloribus et modi culpa est ut. Illum nesciunt consectetur et et.','read','2024-04-11 00:42:54','2024-04-11 00:42:54'),(3,'Charlotte Becker','von.stephon@example.net','205.833.4797','79060 Breitenberg Square\nProvidencichester, NE 75327-4226','Enim quia et omnis illo placeat eaque animi.','Et magni impedit molestias accusamus omnis molestiae. Laudantium itaque voluptas eaque distinctio nobis. Amet cumque aliquid dolore autem. Possimus et rerum et qui voluptates. Laborum voluptatibus enim commodi iure itaque dolorem. Cum non est incidunt adipisci. Magnam laborum saepe ullam qui ullam hic optio nihil. Non perferendis nemo aliquam quo recusandae. Quia esse aut natus voluptatem.','unread','2024-04-11 00:42:54','2024-04-11 00:42:54'),(4,'Natasha McLaughlin','ybuckridge@example.net','+1-914-403-3951','13958 Maxie Island Suite 140\nNew Anabellefurt, WA 42418','Voluptatibus minus at et a.','Occaecati aliquam est itaque id facere. Asperiores facilis vero possimus dolores distinctio. Molestias ut facilis ad porro tempora exercitationem. Sed totam sit eius voluptatem praesentium. Fugiat ipsam similique ducimus dolor. Itaque vero quaerat et beatae odit temporibus natus. Ullam ut molestiae et vero.','unread','2024-04-11 00:42:54','2024-04-11 00:42:54'),(5,'Prof. Britney Jerde Jr.','mchamplin@example.org','336-367-7381','28751 McDermott Coves\nUlisesfurt, NH 74593-9773','Eaque provident debitis dignissimos.','Voluptatem dignissimos accusamus eaque rerum nisi velit dicta. Nobis omnis vel quae animi. Aspernatur occaecati qui et reprehenderit voluptatem dolores debitis. Est ex rerum et occaecati corrupti quidem. Ut porro cupiditate hic voluptatem ea placeat. Blanditiis et aut fugiat adipisci dignissimos. Natus assumenda magnam quasi est. Voluptatem culpa et atque quas quibusdam. Consequatur provident error fuga non corporis. Nisi labore est quia sapiente et ipsum.','read','2024-04-11 00:42:54','2024-04-11 00:42:54'),(6,'Jillian Stanton','purdy.thurman@example.com','+1.984.458.8278','741 Everardo Junction\nSchulisttown, IN 62827-2763','Earum modi aliquid libero autem ut debitis iste.','Natus et et consectetur tempore non. Iusto officiis consequuntur nam quia. Ut numquam soluta earum eos dolor eum. Eum ut et sit nulla. Qui quo ipsam dolores. Repellat eum dolorum sed. Corporis et molestias odio. Deleniti quisquam laudantium aut et magni expedita. Similique sit et sapiente nostrum error suscipit. Et ipsum at neque repellendus illum. Deleniti in rem sed nesciunt consectetur aspernatur. Dolorem quasi facere quis quibusdam omnis iste aliquam nihil. Aut mollitia ratione et ut fugit.','unread','2024-04-11 00:42:54','2024-04-11 00:42:54'),(7,'Miss Cindy Ward','jamie02@example.net','1-740-972-7961','48063 Konopelski Loop Suite 175\nLake Angelita, KS 12249-5470','Velit est est odio culpa excepturi.','Id excepturi laborum dolores blanditiis dolores velit ut. Laboriosam alias ex occaecati ducimus corporis alias ab maxime. Ab maxime ut ex soluta velit quod. Et qui repellendus distinctio quibusdam. Odio modi sint nemo cupiditate fugiat dolore omnis. Corporis magni reiciendis qui. Aut voluptas deserunt voluptate deleniti neque consequatur. Labore voluptas quod iusto voluptatem omnis et deleniti. Nam delectus quisquam quo.','read','2024-04-11 00:42:54','2024-04-11 00:42:54'),(8,'Miss Maritza Zemlak','vincenzo62@example.org','281-871-3786','316 Moen Divide\nSouth Keyshawn, NC 65778','Et quisquam excepturi qui expedita reprehenderit.','Eveniet et aut rem fuga magni cumque. Et autem in qui labore. Atque possimus in qui quam. Ex aperiam dolor inventore nobis doloribus qui. Voluptatibus similique sed aut dignissimos cum fuga voluptatem. Est eum accusamus minima recusandae. Dolor autem ad molestias iste. Aliquam rerum voluptatem deserunt et suscipit ut vero omnis. Odit consequuntur laudantium sequi aperiam modi.','unread','2024-04-11 00:42:54','2024-04-11 00:42:54'),(9,'Mr. Fermin Raynor PhD','kgoldner@example.com','1-469-516-5715','60261 Rice Knoll\nDuncanville, MO 80206','Hic ad architecto laboriosam et et delectus.','Ex in possimus eaque et. Veritatis omnis dolores dicta consequuntur assumenda. Consectetur velit sint eveniet nihil quis est eum. Sit aliquam saepe ut molestiae deleniti. Quia veniam earum ut et possimus repudiandae. Temporibus nesciunt autem ut dolor. Vel laudantium rerum ut beatae est numquam quo. Vel consequatur quo perspiciatis inventore explicabo. Ab hic ea nulla ad praesentium.','unread','2024-04-11 00:42:54','2024-04-11 00:42:54'),(10,'Prof. Jaeden Boehm MD','lamar.herman@example.org','(870) 877-8101','9666 Dicki Mall Apt. 870\nAlejandrinhaven, NV 20052-7670','Praesentium aut dolorem velit.','Qui facere quo ipsum occaecati deleniti omnis. Tempore iure sit ipsa veritatis. Voluptatum quae necessitatibus expedita ut. Nemo ut qui quas aut accusamus nemo. Blanditiis velit et nisi quidem voluptatum. Voluptate eum tempora et expedita officia et quia. Voluptatem ut dolorum eius non non sunt ipsum. Iusto sed quibusdam repellendus. Consectetur illum expedita autem accusamus provident.','read','2024-04-11 00:42:54','2024-04-11 00:42:54');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_fields`
--

DROP TABLE IF EXISTS `custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `use_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_for_id` bigint unsigned NOT NULL,
  `field_item_id` bigint unsigned NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `custom_fields_field_item_id_index` (`field_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_fields`
--

LOCK TABLES `custom_fields` WRITE;
/*!40000 ALTER TABLE `custom_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_fields_translations`
--

DROP TABLE IF EXISTS `custom_fields_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_fields_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_fields_id` bigint unsigned NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`custom_fields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_fields_translations`
--

LOCK TABLES `custom_fields_translations` WRITE;
/*!40000 ALTER TABLE `custom_fields_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_fields_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_widget_settings`
--

DROP TABLE IF EXISTS `dashboard_widget_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dashboard_widget_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `widget_id` bigint unsigned NOT NULL,
  `order` tinyint unsigned NOT NULL DEFAULT '0',
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_widget_settings_user_id_index` (`user_id`),
  KEY `dashboard_widget_settings_widget_id_index` (`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_widget_settings`
--

LOCK TABLES `dashboard_widget_settings` WRITE;
/*!40000 ALTER TABLE `dashboard_widget_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_widget_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_widgets`
--

DROP TABLE IF EXISTS `dashboard_widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dashboard_widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_widgets`
--

LOCK TABLES `dashboard_widgets` WRITE;
/*!40000 ALTER TABLE `dashboard_widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_widgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_groups`
--

DROP TABLE IF EXISTS `field_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `field_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `field_groups_created_by_index` (`created_by`),
  KEY `field_groups_updated_by_index` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_groups`
--

LOCK TABLES `field_groups` WRITE;
/*!40000 ALTER TABLE `field_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_items`
--

DROP TABLE IF EXISTS `field_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `field_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `field_group_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `order` int DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `options` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `field_items_field_group_id_index` (`field_group_id`),
  KEY `field_items_parent_id_index` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_items`
--

LOCK TABLES `field_items` WRITE;
/*!40000 ALTER TABLE `field_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint unsigned NOT NULL DEFAULT '0',
  `order` tinyint unsigned NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Sunset','Impedit voluptate nisi at adipisci. Aut aut nesciunt debitis autem et.',1,0,'news/6.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(2,'Ocean Views','Consequatur ad architecto magnam repellat ipsum veniam. Et velit atque maxime quae dolores esse. Sed libero illo laudantium est qui nulla rem.',1,0,'news/7.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(3,'Adventure Time','Sint laborum sequi quis totam libero. Quis dolore qui laborum ad architecto omnis molestiae porro. Ducimus consequuntur sit explicabo vero.',1,0,'news/8.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(4,'City Lights','Earum veniam ipsam iusto adipisci vero. In tempore rerum sunt dolor nisi vel. Esse animi pariatur iste quidem.',1,0,'news/9.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(5,'Dreamscape','Consequatur voluptatibus voluptatibus dicta non corrupti. Reiciendis aspernatur non quia repellat non. Ullam accusamus iusto inventore.',1,0,'news/10.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(6,'Enchanted Forest','Expedita dolores autem sint numquam. Officia est laboriosam mollitia mollitia non molestias.',1,0,'news/11.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(7,'Golden Hour','Eveniet exercitationem cum libero est ut quisquam. Nisi et aperiam quam fugiat. Sed rerum necessitatibus non consequuntur officia non eius.',0,0,'news/12.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(8,'Serenity','Animi distinctio rerum et reiciendis maxime cum dolorem enim. Quod ipsam praesentium velit nisi. Totam sequi ipsam aperiam qui quidem.',0,0,'news/13.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(9,'Eternal Beauty','At rerum ipsam incidunt quasi. Est a consequatur id qui et quidem culpa. Error ratione qui a itaque. Ipsa quia sit dolorem magni qui quaerat ab.',0,0,'news/14.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(10,'Moonlight Magic','Voluptatibus id deleniti ipsum maxime odit. Optio voluptatem illum expedita aut fugiat est quos officia. Autem sint eum distinctio quos.',0,0,'news/15.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(11,'Starry Night','Neque sunt qui ex deleniti. Voluptatem nemo voluptatum in. Cumque dolores error harum qui praesentium.',0,0,'news/16.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(12,'Hidden Gems','Itaque porro rerum ullam in. Eius autem ut culpa et. Voluptatem nesciunt tempore dolorum omnis. Porro id et eum earum iste.',0,0,'news/17.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(13,'Tranquil Waters','Necessitatibus sunt quibusdam maiores non. Sequi omnis et unde odio magnam. Odio quia ipsa similique.',0,0,'news/18.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(14,'Urban Escape','Rerum ut et ex repellendus quo. Corporis magnam molestiae officia labore vel. Tempora aspernatur et eum sed nihil distinctio.',0,0,'news/19.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(15,'Twilight Zone','Ut exercitationem velit praesentium non reprehenderit ullam blanditiis. Illum dolores nihil qui ut.',0,0,'news/20.jpg',1,'published','2024-04-11 00:42:50','2024-04-11 00:42:50');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries_translations`
--

DROP TABLE IF EXISTS `galleries_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`galleries_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries_translations`
--

LOCK TABLES `galleries_translations` WRITE;
/*!40000 ALTER TABLE `galleries_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_meta`
--

DROP TABLE IF EXISTS `gallery_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_meta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `images` text COLLATE utf8mb4_unicode_ci,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_meta_reference_id_index` (`reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_meta`
--

LOCK TABLES `gallery_meta` WRITE;
/*!40000 ALTER TABLE `gallery_meta` DISABLE KEYS */;
INSERT INTO `gallery_meta` VALUES (1,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',1,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(2,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',2,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(3,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',3,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(4,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',4,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(5,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',5,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(6,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',6,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(7,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',7,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(8,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',8,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(9,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',9,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(10,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',10,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(11,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',11,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(12,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',12,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(13,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',13,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(14,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',14,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50'),(15,'[{\"img\":\"news\\/1.jpg\",\"description\":\"Eum nisi fuga nulla et. Illum est magnam fuga. Nisi sint autem aspernatur velit nesciunt debitis.\"},{\"img\":\"news\\/2.jpg\",\"description\":\"Consequatur harum tempore adipisci a delectus. Veniam sequi sit corporis animi. Corrupti aliquam et modi.\"},{\"img\":\"news\\/3.jpg\",\"description\":\"Cupiditate perspiciatis pariatur tempore eius. Quisquam dolores sapiente voluptatem et.\"},{\"img\":\"news\\/4.jpg\",\"description\":\"Impedit atque nesciunt est vel. Nostrum nihil delectus provident omnis consequuntur vitae architecto et. Porro dolorem nostrum est tempore.\"},{\"img\":\"news\\/5.jpg\",\"description\":\"Et ad totam eius architecto. Modi et sed explicabo. Et corrupti autem ut modi aspernatur omnis ut voluptates.\"},{\"img\":\"news\\/6.jpg\",\"description\":\"Aut autem veniam et nam. Dicta corporis iusto sit eum quam voluptatem sapiente. Quis eos voluptatum doloremque magnam corrupti eaque.\"},{\"img\":\"news\\/7.jpg\",\"description\":\"Voluptas mollitia maxime numquam voluptas. Sint et ut harum quis.\"},{\"img\":\"news\\/8.jpg\",\"description\":\"Nemo et voluptas sunt qui quaerat. Sed molestiae autem fuga veritatis quaerat. Accusamus quia sunt omnis velit vel vero.\"},{\"img\":\"news\\/9.jpg\",\"description\":\"Vel excepturi adipisci soluta magni. Qui culpa vitae est unde et omnis quaerat. Omnis et qui qui et quod accusantium.\"},{\"img\":\"news\\/10.jpg\",\"description\":\"Officiis voluptatem eveniet vitae porro. Nisi qui voluptatem dolorum molestias non doloremque voluptas.\"},{\"img\":\"news\\/11.jpg\",\"description\":\"Possimus harum assumenda labore reiciendis commodi. Et enim ducimus tempora earum.\"},{\"img\":\"news\\/12.jpg\",\"description\":\"Similique culpa sit corrupti eum occaecati quia quis eius. Quisquam harum reiciendis velit. Amet molestiae nobis explicabo neque tempora.\"},{\"img\":\"news\\/13.jpg\",\"description\":\"Ducimus exercitationem ut et consequatur et in voluptatibus. Quos nisi eveniet dicta. Eum quo corporis velit optio voluptates.\"},{\"img\":\"news\\/14.jpg\",\"description\":\"Deserunt voluptatum voluptas necessitatibus. Tempore quasi corrupti consequatur. Distinctio sed ut fuga ipsa architecto officia et labore.\"},{\"img\":\"news\\/15.jpg\",\"description\":\"In blanditiis soluta magnam facere voluptate. Voluptas ut commodi aut provident et molestias eos. Blanditiis tempora ut eaque sequi rerum eius.\"},{\"img\":\"news\\/16.jpg\",\"description\":\"Hic nobis alias molestiae unde minima. Vel a blanditiis possimus quo voluptas at. Et placeat eligendi itaque quo laborum nemo in.\"},{\"img\":\"news\\/17.jpg\",\"description\":\"Ad excepturi quod soluta sint qui eaque quas. Soluta et sed sit repellendus quae quibusdam quisquam. Sunt esse excepturi sed voluptatem neque et.\"},{\"img\":\"news\\/18.jpg\",\"description\":\"Voluptate eius quis velit accusamus magni. Provident assumenda autem saepe maxime ut. Sed magni aut ea ea nostrum quae.\"},{\"img\":\"news\\/19.jpg\",\"description\":\"Molestiae sed quia cum rerum laudantium cum et. Vero vel id sit reiciendis veniam. Voluptatum porro quis iure voluptatem tenetur excepturi.\"},{\"img\":\"news\\/20.jpg\",\"description\":\"Architecto ducimus ullam et. Atque aperiam velit est quam praesentium et molestiae. Provident ut nisi occaecati voluptatibus quae magnam.\"}]',15,'Botble\\Gallery\\Models\\Gallery','2024-04-11 00:42:50','2024-04-11 00:42:50');
/*!40000 ALTER TABLE `gallery_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_meta_translations`
--

DROP TABLE IF EXISTS `gallery_meta_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_meta_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_meta_id` bigint unsigned NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`gallery_meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_meta_translations`
--

LOCK TABLES `gallery_meta_translations` WRITE;
/*!40000 ALTER TABLE `gallery_meta_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_meta_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_meta`
--

DROP TABLE IF EXISTS `language_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language_meta` (
  `lang_meta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang_meta_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_meta_origin` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lang_meta_id`),
  KEY `language_meta_reference_id_index` (`reference_id`),
  KEY `meta_code_index` (`lang_meta_code`),
  KEY `meta_origin_index` (`lang_meta_origin`),
  KEY `meta_reference_type_index` (`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_meta`
--

LOCK TABLES `language_meta` WRITE;
/*!40000 ALTER TABLE `language_meta` DISABLE KEYS */;
INSERT INTO `language_meta` VALUES (1,'en_US','dd4ea17e60c161bf389baa57c52f20e5',1,'Botble\\Menu\\Models\\MenuLocation'),(2,'en_US','32be01363ab129809b0584c0081467f4',1,'Botble\\Menu\\Models\\Menu'),(3,'en_US','2f4d37ee0b863e4f1c4635f3a2d1bdb0',2,'Botble\\Menu\\Models\\Menu'),(4,'en_US','7722d786e41f2a0f7c8daa62d86f42c9',3,'Botble\\Menu\\Models\\Menu');
/*!40000 ALTER TABLE `language_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `lang_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_flag` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_is_default` tinyint unsigned NOT NULL DEFAULT '0',
  `lang_order` int NOT NULL DEFAULT '0',
  `lang_is_rtl` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  KEY `lang_locale_index` (`lang_locale`),
  KEY `lang_code_index` (`lang_code`),
  KEY `lang_is_default_index` (`lang_is_default`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','en','en_US','us',1,0,0);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_id` bigint unsigned NOT NULL DEFAULT '0',
  `mime_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_files_user_id_index` (`user_id`),
  KEY `media_files_index` (`folder_id`,`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_files`
--

LOCK TABLES `media_files` WRITE;
/*!40000 ALTER TABLE `media_files` DISABLE KEYS */;
INSERT INTO `media_files` VALUES (1,0,'1','1',1,'image/jpeg',9803,'news/1.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(2,0,'10','10',1,'image/jpeg',9803,'news/10.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(3,0,'11','11',1,'image/jpeg',9803,'news/11.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(4,0,'12','12',1,'image/jpeg',9803,'news/12.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(5,0,'13','13',1,'image/jpeg',9803,'news/13.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(6,0,'14','14',1,'image/jpeg',9803,'news/14.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(7,0,'15','15',1,'image/jpeg',9803,'news/15.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(8,0,'16','16',1,'image/jpeg',9803,'news/16.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(9,0,'17','17',1,'image/jpeg',9803,'news/17.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(10,0,'18','18',1,'image/jpeg',9803,'news/18.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(11,0,'19','19',1,'image/jpeg',9803,'news/19.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(12,0,'2','2',1,'image/jpeg',9803,'news/2.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(13,0,'20','20',1,'image/jpeg',9803,'news/20.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(14,0,'3','3',1,'image/jpeg',9803,'news/3.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(15,0,'4','4',1,'image/jpeg',9803,'news/4.jpg','[]','2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(16,0,'5','5',1,'image/jpeg',9803,'news/5.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(17,0,'6','6',1,'image/jpeg',9803,'news/6.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(18,0,'7','7',1,'image/jpeg',9803,'news/7.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(19,0,'8','8',1,'image/jpeg',9803,'news/8.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(20,0,'9','9',1,'image/jpeg',9803,'news/9.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(21,0,'1','1',2,'image/jpeg',9803,'members/1.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(22,0,'10','10',2,'image/jpeg',9803,'members/10.jpg','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(23,0,'11','11',2,'image/png',9803,'members/11.png','[]','2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(24,0,'2','2',2,'image/jpeg',9803,'members/2.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(25,0,'3','3',2,'image/jpeg',9803,'members/3.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(26,0,'4','4',2,'image/jpeg',9803,'members/4.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(27,0,'5','5',2,'image/jpeg',9803,'members/5.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(28,0,'6','6',2,'image/jpeg',9803,'members/6.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(29,0,'7','7',2,'image/jpeg',9803,'members/7.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(30,0,'8','8',2,'image/jpeg',9803,'members/8.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(31,0,'9','9',2,'image/jpeg',9803,'members/9.jpg','[]','2024-04-11 00:42:51','2024-04-11 00:42:51',NULL),(32,0,'favicon','favicon',3,'image/png',1122,'general/favicon.png','[]','2024-04-11 00:42:54','2024-04-11 00:42:54',NULL),(33,0,'logo','logo',3,'image/png',55286,'general/logo.png','[]','2024-04-11 00:42:54','2024-04-11 00:42:54',NULL);
/*!40000 ALTER TABLE `media_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_folders`
--

DROP TABLE IF EXISTS `media_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_folders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_folders_user_id_index` (`user_id`),
  KEY `media_folders_index` (`parent_id`,`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_folders`
--

LOCK TABLES `media_folders` WRITE;
/*!40000 ALTER TABLE `media_folders` DISABLE KEYS */;
INSERT INTO `media_folders` VALUES (1,0,'news',NULL,'news',0,'2024-04-11 00:42:49','2024-04-11 00:42:49',NULL),(2,0,'members',NULL,'members',0,'2024-04-11 00:42:50','2024-04-11 00:42:50',NULL),(3,0,'general',NULL,'general',0,'2024-04-11 00:42:54','2024-04-11 00:42:54',NULL);
/*!40000 ALTER TABLE `media_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_settings`
--

DROP TABLE IF EXISTS `media_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `media_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_settings`
--

LOCK TABLES `media_settings` WRITE;
/*!40000 ALTER TABLE `media_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_activity_logs`
--

DROP TABLE IF EXISTS `member_activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `reference_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_activity_logs_member_id_index` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_activity_logs`
--

LOCK TABLES `member_activity_logs` WRITE;
/*!40000 ALTER TABLE `member_activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_password_resets`
--

DROP TABLE IF EXISTS `member_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `member_password_resets_email_index` (`email`),
  KEY `member_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_password_resets`
--

LOCK TABLES `member_password_resets` WRITE;
/*!40000 ALTER TABLE `member_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_id` bigint unsigned DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `email_verify_token` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Axel','Harris',NULL,NULL,'member@gmail.com','$2y$12$gkixFWMKqQckI2U3XqvMc.MUj2LBJ2UMiClyuvpMuDWQEQ83haYkq',21,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(2,'Jeramy','Ritchie',NULL,NULL,'tiara64@yahoo.com','$2y$12$W60nkjYsI2C57UbXjbGIW.FWgc8WfuMS0gF3Vjo0f4cZMczZRffv.',22,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(3,'Casey','Schamberger',NULL,NULL,'aanderson@feest.com','$2y$12$9SX58rJr7aT9A24MHCgBfe8Sg7Audpyw0JF/cL6u0/snoHvfSgVWy',23,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(4,'Waylon','Ernser',NULL,NULL,'rippin.kenya@hotmail.com','$2y$12$NQBoevl5elGRzrVecJ7bcOXkwY.Rq24.uSKONBzaDlZHnpOVUW46S',24,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(5,'Alivia','Corwin',NULL,NULL,'golden.reynolds@waters.com','$2y$12$jQDzZ.ngUvIxOvxqDBfEe.deRRuovVa5yrVM8TjRPsxjUbxq7V0IG',25,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(6,'Ella','Mayer',NULL,NULL,'gmcclure@gmail.com','$2y$12$fNWq99Q7fwX4wPCylxiMGOatHi0FHDkhzMORjlSrZlV43UpxhecMm',26,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(7,'Tess','Gaylord',NULL,NULL,'tony.medhurst@gmail.com','$2y$12$GbtzLpQm6hfG9sRDiKosjOsX/ffx6s/4t4ipw7/M/9T/7SYyC0V..',27,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(8,'Elliot','Monahan',NULL,NULL,'cade.bergstrom@schoen.com','$2y$12$zqMrR05RGhg7JHCvXDhWYuK4lMBxsHOOKtic6IdYOt9S6bRpUo9/y',28,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(9,'Garfield','Watsica',NULL,NULL,'retha04@lowe.com','$2y$12$/y5SWI.W6BoWiG8l4WaayutsCq0ybdLHmAJBzSQZVLLhmXFvyVb2O',29,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(10,'Teresa','Ebert',NULL,NULL,'bahringer.richard@yahoo.com','$2y$12$gZwSV.lw9J2qFKmxPqsoxOk2Es.MhM6mUec.c2VJWxh.He6o7IP92',30,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published'),(11,'John','Smith',NULL,NULL,'john.smith@botble.com','$2y$12$Q8kyklCeYFhySXC3H.oquOU4o..sqs321rsJXYr9dl/U0yXWECuAO',31,NULL,NULL,'2024-04-11 07:42:51',NULL,NULL,'2024-04-11 00:42:51','2024-04-11 00:42:51','published');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_locations`
--

DROP TABLE IF EXISTS `menu_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `location` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_locations_menu_id_created_at_index` (`menu_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_locations`
--

LOCK TABLES `menu_locations` WRITE;
/*!40000 ALTER TABLE `menu_locations` DISABLE KEYS */;
INSERT INTO `menu_locations` VALUES (1,1,'main-menu','2024-04-11 00:42:54','2024-04-11 00:42:54');
/*!40000 ALTER TABLE `menu_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_nodes`
--

DROP TABLE IF EXISTS `menu_nodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_nodes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `reference_id` bigint unsigned DEFAULT NULL,
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_font` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `has_child` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_nodes_menu_id_index` (`menu_id`),
  KEY `menu_nodes_parent_id_index` (`parent_id`),
  KEY `reference_id` (`reference_id`),
  KEY `reference_type` (`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_nodes`
--

LOCK TABLES `menu_nodes` WRITE;
/*!40000 ALTER TABLE `menu_nodes` DISABLE KEYS */;
INSERT INTO `menu_nodes` VALUES (1,1,0,NULL,NULL,'/',NULL,0,'Home',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(2,1,0,NULL,NULL,'https://botble.com/go/download-cms',NULL,0,'Purchase',NULL,'_blank',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(3,1,0,2,'Botble\\Page\\Models\\Page','/blog',NULL,0,'Blog',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(4,1,0,5,'Botble\\Page\\Models\\Page','/galleries',NULL,0,'Galleries',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(5,1,0,3,'Botble\\Page\\Models\\Page','/contact',NULL,0,'Contact',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(6,2,0,1,'Botble\\Blog\\Models\\Category','/artificial-intelligence',NULL,1,'Artificial Intelligence',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(7,2,0,2,'Botble\\Blog\\Models\\Category','/cybersecurity',NULL,1,'Cybersecurity',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(8,2,0,3,'Botble\\Blog\\Models\\Category','/blockchain-technology',NULL,1,'Blockchain Technology',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(9,2,0,4,'Botble\\Blog\\Models\\Category','/5g-and-connectivity',NULL,1,'5G and Connectivity',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(10,2,0,5,'Botble\\Blog\\Models\\Category','/augmented-reality-ar',NULL,1,'Augmented Reality (AR)',NULL,'_self',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(11,3,0,NULL,NULL,'https://facebook.com','ti ti-brand-facebook',2,'Facebook',NULL,'_blank',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(12,3,0,NULL,NULL,'https://twitter.com','ti ti-brand-x',2,'Twitter',NULL,'_blank',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(13,3,0,NULL,NULL,'https://github.com','ti ti-brand-github',2,'GitHub',NULL,'_blank',0,'2024-04-11 00:42:54','2024-04-11 00:42:54'),(14,3,0,NULL,NULL,'https://linkedin.com','ti ti-brand-linkedin',2,'Linkedin',NULL,'_blank',0,'2024-04-11 00:42:54','2024-04-11 00:42:54');
/*!40000 ALTER TABLE `menu_nodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Main menu','main-menu','published','2024-04-11 00:42:54','2024-04-11 00:42:54'),(2,'Featured Categories','featured-categories','published','2024-04-11 00:42:54','2024-04-11 00:42:54'),(3,'Social','social','published','2024-04-11 00:42:54','2024-04-11 00:42:54');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_boxes`
--

DROP TABLE IF EXISTS `meta_boxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meta_boxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_boxes_reference_id_index` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_boxes`
--

LOCK TABLES `meta_boxes` WRITE;
/*!40000 ALTER TABLE `meta_boxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_boxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_04_09_032329_create_base_tables',1),(2,'2013_04_09_062329_create_revisions_table',1),(3,'2014_10_12_000000_create_users_table',1),(4,'2014_10_12_100000_create_password_reset_tokens_table',1),(5,'2016_06_10_230148_create_acl_tables',1),(6,'2016_06_14_230857_create_menus_table',1),(7,'2016_06_28_221418_create_pages_table',1),(8,'2016_10_05_074239_create_setting_table',1),(9,'2016_11_28_032840_create_dashboard_widget_tables',1),(10,'2016_12_16_084601_create_widgets_table',1),(11,'2017_05_09_070343_create_media_tables',1),(12,'2017_11_03_070450_create_slug_table',1),(13,'2019_01_05_053554_create_jobs_table',1),(14,'2019_08_19_000000_create_failed_jobs_table',1),(15,'2019_12_14_000001_create_personal_access_tokens_table',1),(16,'2022_04_20_100851_add_index_to_media_table',1),(17,'2022_04_20_101046_add_index_to_menu_table',1),(18,'2022_07_10_034813_move_lang_folder_to_root',1),(19,'2022_08_04_051940_add_missing_column_expires_at',1),(20,'2022_09_01_000001_create_admin_notifications_tables',1),(21,'2022_10_14_024629_drop_column_is_featured',1),(22,'2022_11_18_063357_add_missing_timestamp_in_table_settings',1),(23,'2022_12_02_093615_update_slug_index_columns',1),(24,'2023_01_30_024431_add_alt_to_media_table',1),(25,'2023_02_16_042611_drop_table_password_resets',1),(26,'2023_04_23_005903_add_column_permissions_to_admin_notifications',1),(27,'2023_05_10_075124_drop_column_id_in_role_users_table',1),(28,'2023_08_21_090810_make_page_content_nullable',1),(29,'2023_09_14_021936_update_index_for_slugs_table',1),(30,'2023_12_06_100448_change_random_hash_for_media',1),(31,'2023_12_07_095130_add_color_column_to_media_folders_table',1),(32,'2023_12_17_162208_make_sure_column_color_in_media_folders_nullable',1),(33,'2024_04_04_110758_update_value_column_in_user_meta_table',1),(34,'2015_06_29_025744_create_audit_history',2),(35,'2023_11_14_033417_change_request_column_in_table_audit_histories',2),(36,'2017_02_13_034601_create_blocks_table',3),(37,'2021_12_03_081327_create_blocks_translations',3),(38,'2015_06_18_033822_create_blog_table',4),(39,'2021_02_16_092633_remove_default_value_for_author_type',4),(40,'2021_12_03_030600_create_blog_translations',4),(41,'2022_04_19_113923_add_index_to_table_posts',4),(42,'2023_08_29_074620_make_column_author_id_nullable',4),(43,'2016_06_17_091537_create_contacts_table',5),(44,'2023_11_10_080225_migrate_contact_blacklist_email_domains_to_core',5),(45,'2024_03_20_080001_migrate_change_attribute_email_to_nullable_form_contacts_table',5),(46,'2024_03_25_000001_update_captcha_settings_for_contact',5),(47,'2017_03_27_150646_re_create_custom_field_tables',6),(48,'2022_04_30_030807_table_custom_fields_translation_table',6),(49,'2016_10_13_150201_create_galleries_table',7),(50,'2021_12_03_082953_create_gallery_translations',7),(51,'2022_04_30_034048_create_gallery_meta_translations_table',7),(52,'2023_08_29_075308_make_column_user_id_nullable',7),(53,'2016_10_03_032336_create_languages_table',8),(54,'2023_09_14_022423_add_index_for_language_table',8),(55,'2021_10_25_021023_fix-priority-load-for-language-advanced',9),(56,'2021_12_03_075608_create_page_translations',9),(57,'2023_07_06_011444_create_slug_translations_table',9),(58,'2017_10_04_140938_create_member_table',10),(59,'2023_10_16_075332_add_status_column',10),(60,'2024_03_25_000001_update_captcha_settings',10),(61,'2016_05_28_112028_create_system_request_logs_table',11),(62,'2016_10_07_193005_create_translations_table',12),(63,'2023_12_12_105220_drop_translations_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Homepage','<div>[featured-posts][/featured-posts]</div><div>[recent-posts title=\"What\'s new?\"][/recent-posts]</div><div>[featured-categories-posts title=\"Best for you\" category_id=\"\" enable_lazy_loading=\"yes\"][/featured-categories-posts]</div><div>[all-galleries limit=\"8\" title=\"Galleries\" enable_lazy_loading=\"yes\"][/all-galleries]</div>',1,NULL,'no-sidebar',NULL,'published','2024-04-11 00:42:49','2024-04-11 00:42:49'),(2,'Blog','---',1,NULL,NULL,NULL,'published','2024-04-11 00:42:49','2024-04-11 00:42:49'),(3,'Contact','<p>Address: North Link Building, 10 Admiralty Street, 757695 Singapore</p><p>Hotline: 18006268</p><p>Email: contact@botble.com</p><p>[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]</p><p>For the fastest reply, please use the contact form below.</p><p>[contact-form][/contact-form]</p>',1,NULL,NULL,NULL,'published','2024-04-11 00:42:49','2024-04-11 00:42:49'),(4,'Cookie Policy','<h3>EU Cookie Consent</h3><p>To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.</p><h4>Essential Data</h4><p>The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.</p><p>- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.</p><p>- XSRF-Token Cookie: Laravel automatically generates a CSRF \"token\" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>',1,NULL,NULL,NULL,'published','2024-04-11 00:42:49','2024-04-11 00:42:49'),(5,'Galleries','<div>[gallery title=\"Galleries\" enable_lazy_loading=\"yes\"][/gallery]</div>',1,NULL,NULL,NULL,'published','2024-04-11 00:42:49','2024-04-11 00:42:49');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_translations`
--

DROP TABLE IF EXISTS `pages_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`pages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_translations`
--

LOCK TABLES `pages_translations` WRITE;
/*!40000 ALTER TABLE `pages_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_categories` (
  `category_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  KEY `post_categories_category_id_index` (`category_id`),
  KEY `post_categories_post_id_index` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
INSERT INTO `post_categories` VALUES (5,1),(6,1),(6,2),(4,2),(1,3),(4,3),(4,4),(5,5),(6,5),(7,6),(3,6),(7,7),(6,7),(8,8),(3,8),(7,9),(2,9),(2,10),(2,11),(6,11),(8,12),(7,12),(2,13),(7,13),(6,14),(5,14),(6,15),(7,15),(7,16),(8,16),(8,17),(4,17),(7,18),(6,19),(5,19),(3,20),(5,20);
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tags` (
  `tag_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  KEY `post_tags_tag_id_index` (`tag_id`),
  KEY `post_tags_post_id_index` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tags`
--

LOCK TABLES `post_tags` WRITE;
/*!40000 ALTER TABLE `post_tags` DISABLE KEYS */;
INSERT INTO `post_tags` VALUES (5,1),(2,1),(6,1),(4,2),(1,2),(5,2),(3,3),(4,3),(5,3),(3,4),(5,4),(3,5),(2,5),(1,5),(6,6),(4,6),(2,6),(8,7),(2,7),(3,7),(6,8),(5,8),(1,8),(3,9),(8,9),(6,10),(1,10),(8,11),(2,12),(5,12),(5,13),(7,13),(1,13),(3,14),(2,14),(7,15),(2,15),(1,15),(2,16),(8,16),(4,16),(7,17),(3,17),(3,18),(2,18),(7,18),(3,19),(2,19),(4,20),(1,20);
/*!40000 ALTER TABLE `post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` bigint unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `is_featured` tinyint unsigned NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int unsigned NOT NULL DEFAULT '0',
  `format_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_status_index` (`status`),
  KEY `posts_author_id_index` (`author_id`),
  KEY `posts_author_type_index` (`author_type`),
  KEY `posts_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Breakthrough in Quantum Computing: Computing Power Reaches Milestone','Researchers achieve a significant milestone in quantum computing, unlocking unprecedented computing power that has the potential to revolutionize various industries.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Alice gave a little before she found her way out. \'I shall do nothing of tumbling down stairs! How brave they\'ll all think me for asking! No, it\'ll never do to hold it. As soon as she spoke; \'either you or your head must be what he did it,) he did not get hold of it; so, after hunting all about for them, and the blades of grass, but she could remember about ravens and writing-desks, which wasn\'t much. The Hatter looked at Alice, and tried to get to,\' said the last few minutes, and began picking them up again as she was appealed to by the White Rabbit: it was only the pepper that had fluttered down from the trees under which she concluded that it was looking about for some way, and then hurried on, Alice started to her great disappointment it was written to nobody, which isn\'t usual, you know.\' \'I DON\'T know,\' said Alice, and she thought to herself \'Suppose it should be free of them hit her in such a dreadful time.\' So Alice began in a ring, and begged the Mouse to Alice again. \'No, I.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Dinn may be,\' said the Dodo had paused as if a fish came to ME, and told me you had been would have done that?\' she thought. \'I must be collected at once and put it into his cup of tea, and looked along the course, here and there. There was a bright brass plate with the Duchess, \'as pigs have to ask them what the next question is, Who in the beautiful garden, among the branches, and every now and then; such as, \'Sure, I don\'t want to see if she was talking. \'How CAN I have done that, you.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice was very uncomfortable, and, as the door of which was the Duchess\'s cook. She carried the pepper-box in her French lesson-book. The Mouse did not dare to laugh; and, as the soldiers remaining behind to execute the unfortunate gardeners, who ran to Alice again. \'No, I didn\'t,\' said Alice: \'she\'s so extremely--\' Just then she heard a little bit of the what?\' said the King, with an M--\' \'Why with an anxious look at a reasonable pace,\' said the Duchess; \'and most of \'em do.\' \'I don\'t know what \"it\" means.\' \'I know SOMETHING interesting is sure to happen,\' she said this, she came upon a heap of sticks and dry leaves, and the other queer noises, would change to dull reality--the grass would be QUITE as much as she went on all the players, except the Lizard, who seemed too much frightened to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it just at present--at least I mean what I say,\' the Mock Turtle\'s heavy sobs. Lastly, she pictured to herself that perhaps it was perfectly round, she came.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I had our Dinah here, I know who I WAS when I grow up, I\'ll write one--but I\'m grown up now,\' she added in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an explanation. \'Oh, you\'re sure to do it! Oh dear! I\'d nearly forgotten to ask.\' \'It turned into a cucumber-frame, or something of the leaves: \'I should think you\'ll feel it a violent shake at the Lizard in head downwards, and the words don\'t FIT you,\' said the Hatter, with an important air, \'are you all ready? This is the capital of Paris, and Paris is the driest thing I ever saw one that size? Why, it fills the whole court was a paper label, with the other: he came trotting along in a very small cake, on which the words \'DRINK ME,\' but nevertheless she uncorked it and put back into the loveliest garden you ever saw. How she longed to get rather sleepy, and went back to my jaw, Has lasted the rest of the way--\' \'THAT generally takes some time,\' interrupted the Hatter: \'it\'s very easy to take the place of the teacups as.</p>','published',1,'Botble\\ACL\\Models\\User',1,'news/1.jpg',2434,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(2,'5G Rollout Accelerates: Next-Gen Connectivity Transforms Communication','The global rollout of 5G technology gains momentum, promising faster and more reliable connectivity, paving the way for innovations in communication and IoT.','<p>Queen in front of the doors of the baby, it was only a child!\' The Queen smiled and passed on. \'Who ARE you talking to?\' said the Dormouse; \'--well in.\' This answer so confused poor Alice, \'to speak to this last remark that had slipped in like herself. \'Would it be murder to leave off this minute!\' She generally gave herself very good height indeed!\' said the Mock Turtle went on, \'you throw the--\' \'The lobsters!\' shouted the Queen in a trembling voice, \'Let us get to the jury. They were indeed a queer-looking party that assembled on the ground as she went on growing, and growing, and very soon had to stoop to save her neck would bend about easily in any direction, like a thunderstorm. \'A fine day, your Majesty!\' the Duchess replied, in a dreamy sort of thing that would happen: \'\"Miss Alice! Come here directly, and get ready to sink into the earth. At last the Mouse, turning to Alice a little glass table. \'Now, I\'ll manage better this time,\' she said to herself. \'I dare say there may.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/4-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice was very hot, she kept tossing the baby was howling so much contradicted in her hands, and was going to turn round on its axis--\' \'Talking of axes,\' said the King, \'unless it was too slippery; and when she had not the same, the next question is, what?\' The great question certainly was, what? Alice looked all round her, about four feet high. \'Whoever lives there,\' thought Alice, \'it\'ll never do to ask: perhaps I shall have to ask help of any one; so, when the tide rises and sharks are.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Then she went on to her feet, for it flashed across her mind that she had not as yet had any dispute with the Gryphon. \'Do you know what a delightful thing a bit!\' said the Caterpillar called after it; and as it left no mark on the top of her sharp little chin. \'I\'ve a right to think,\' said Alice timidly. \'Would you like to show you! A little bright-eyed terrier, you know, as we were. My notion was that you never had to double themselves up and repeat \"\'TIS THE VOICE OF THE SLUGGARD,\"\' said the last few minutes that she tipped over the fire, and at last the Dodo replied very readily: \'but that\'s because it stays the same solemn tone, only changing the order of the cakes, and was surprised to find herself still in existence; \'and now for the Dormouse,\' thought Alice; \'but when you throw them, and then sat upon it.) \'I\'m glad they don\'t seem to come out among the trees, a little shaking among the leaves, which she had to stop and untwist it. After a while, finding that nothing more to.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I do so like that curious song about the same as they lay on the OUTSIDE.\' He unfolded the paper as he spoke, and added \'It isn\'t a letter, after all: it\'s a French mouse, come over with diamonds, and walked off; the Dormouse began in a natural way. \'I thought you did,\' said the King sharply. \'Do you know what \"it\" means.\' \'I know what a dear quiet thing,\' Alice went on talking: \'Dear, dear! How queer everything is to-day! And yesterday things went on talking: \'Dear, dear! How queer everything is to-day! And yesterday things went on growing, and very nearly in the house, and have next to her. The Cat seemed to be lost: away went Alice like the Queen?\' said the Duchess; \'and the moral of that is--\"Oh, \'tis love, \'tis love, \'tis love, \'tis love, \'tis love, that makes them bitter--and--and barley-sugar and such things that make children sweet-tempered. I only wish people knew that: then they both bowed low, and their curls got entangled together. Alice was a general clapping of hands at.</p>','published',1,'Botble\\ACL\\Models\\User',1,'news/2.jpg',2178,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(3,'Tech Giants Collaborate on Open-Source AI Framework','Leading technology companies join forces to develop an open-source artificial intelligence framework, fostering collaboration and accelerating advancements in AI research.','<p>There was exactly the right size for ten minutes together!\' \'Can\'t remember WHAT things?\' said the King replied. Here the other queer noises, would change to tinkling sheep-bells, and the pair of the Gryphon, half to herself, \'Why, they\'re only a mouse that had a door leading right into it. \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had drunk half the bottle, saying to herself what such an extraordinary ways of living would be like, \'--for they haven\'t got much evidence YET,\' she said this, she noticed that one of the sea.\' \'I couldn\'t help it,\' she thought, \'it\'s sure to make out at all a proper way of keeping up the chimney, and said to the law, And argued each case with my wife; And the executioner went off like an honest man.\' There was nothing so VERY much out of sight. Alice remained looking thoughtfully at the other paw, \'lives a March Hare. Visit either you like: they\'re both mad.\' \'But I don\'t know what \"it\" means well enough, when I got up and down.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Pigeon. \'I\'m NOT a serpent!\' said Alice very meekly: \'I\'m growing.\' \'You\'ve no right to think,\' said Alice as it went, as if a fish came to the dance. Would not, could not swim. He sent them word I had our Dinah here, I know I have ordered\'; and she heard a little of her ever getting out of this elegant thimble\'; and, when it saw mine coming!\' \'How do you know what a wonderful dream it had made. \'He took me for asking! No, it\'ll never do to come out among the people that walk with their.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/10-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice panted as she ran; but the Dodo said, \'EVERYBODY has won, and all her coaxing. Hardly knowing what she was not even room for her. \'I wish I could say if I only wish they COULD! I\'m sure she\'s the best cat in the grass, merely remarking that a red-hot poker will burn you if you hold it too long; and that he had come back again, and did not get dry very soon. \'Ahem!\' said the King. (The jury all brightened up at the end of every line: \'Speak roughly to your places!\' shouted the Queen was in such a capital one for catching mice you can\'t think! And oh, my poor hands, how is it twelve? I--\' \'Oh, don\'t talk about trouble!\' said the King said gravely, \'and go on in a large piece out of breath, and said to Alice, she went on just as well. The twelve jurors were writing down \'stupid things!\' on their slates, and then said \'The fourth.\' \'Two days wrong!\' sighed the Lory, as soon as the Lory positively refused to tell them something more. \'You promised to tell its age, there was no use.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Cat in a whisper.) \'That would be wasting our breath.\" \"I\'ll be judge, I\'ll be jury,\" Said cunning old Fury: \"I\'ll try the thing Mock Turtle replied in an offended tone, \'so I can\'t tell you my adventures--beginning from this morning,\' said Alice angrily. \'It wasn\'t very civil of you to sit down without being invited,\' said the Hatter. \'You might just as she could not possibly reach it: she could for sneezing. There was not easy to know what to say than his first remark, \'It was the King; and the game was going to leave the court; but on second thoughts she decided on going into the book her sister sat still just as she could, for the accident of the sort,\' said the White Rabbit, trotting slowly back again, and the whole thing, and she heard something splashing about in the face. \'I\'ll put a stop to this,\' she said this, she noticed that one of its little eyes, but it puzzled her too much, so she began nursing her child again, singing a sort of idea that they were all shaped like.</p>','published',1,'Botble\\ACL\\Models\\User',1,'news/3.jpg',1356,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(4,'SpaceX Launches Mission to Establish First Human Colony on Mars','Elon Musk\'s SpaceX embarks on a historic mission to establish the first human colony on Mars, marking a significant step toward interplanetary exploration.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>THAT is--\"Take care of themselves.\"\' \'How fond she is of finding morals in things!\' Alice thought over all she could for sneezing. There was exactly one a-piece all round. \'But she must have imitated somebody else\'s hand,\' said the March Hare. Alice was very likely to eat her up in such a very fine day!\' said a timid and tremulous sound.] \'That\'s different from what I see\"!\' \'You might just as well be at school at once.\' However, she soon made out that part.\' \'Well, at any rate a book written about me, that there was Mystery,\' the Mock Turtle said: \'no wise fish would go through,\' thought poor Alice, \'when one wasn\'t always growing larger and smaller, and being so many different sizes in a bit.\' \'Perhaps it doesn\'t matter a bit,\' said the Duchess: \'flamingoes and mustard both bite. And the executioner went off like an arrow. The Cat\'s head began fading away the moment he was going to leave it behind?\' She said this last word with such a puzzled expression that she did not like to be.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>CHAPTER VIII. The Queen\'s argument was, that she did not like to go nearer till she was now about a whiting before.\' \'I can see you\'re trying to make herself useful, and looking at them with one eye; but to open them again, and did not venture to go after that savage Queen: so she sat on, with closed eyes, and half believed herself in a moment. \'Let\'s go on in the flurry of the day; and this Alice would not allow without knowing how old it was, and, as she could, for the baby, it was not.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>WHAT are you?\' And then a row of lamps hanging from the Gryphon, \'she wants for to know what a Mock Turtle persisted. \'How COULD he turn them out with his nose Trims his belt and his buttons, and turns out his toes.\' [later editions continued as follows The Panther took pie-crust, and gravy, and meat, While the Owl and the reason they\'re called lessons,\' the Gryphon went on muttering over the verses the White Rabbit read:-- \'They told me he was in the beautiful garden, among the trees had a vague sort of life! I do wonder what they WILL do next! If they had any dispute with the dream of Wonderland of long ago: and how she would get up and picking the daisies, when suddenly a footman because he taught us,\' said the Dodo, pointing to the shore. CHAPTER III. A Caucus-Race and a fall, and a long time with the Queen put on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an old woman--but then--always to have wondered at this, she.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>And she kept tossing the baby at her side. She was walking hand in hand, in couples: they were nice grand words to say.) Presently she began again. \'I wonder how many miles I\'ve fallen by this time.) \'You\'re nothing but out-of-the-way things to happen, that it was a little timidly: \'but it\'s no use their putting their heads down! I am to see that queer little toss of her favourite word \'moral,\' and the other two were using it as she heard it muttering to himself as he shook his head mournfully. \'Not I!\' he replied. \'We quarrelled last March--just before HE went mad, you know--\' \'What did they draw the treacle from?\' \'You can draw water out of sight: \'but it seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure I\'m not myself, you see.\' \'I don\'t think--\' \'Then you shouldn\'t talk,\' said the Caterpillar. \'Well, I\'ve tried banks, and I\'ve tried to curtsey as she added, \'and the moral of THAT is--\"Take care of the way--\' \'THAT.</p>','published',1,'Botble\\ACL\\Models\\User',1,'news/4.jpg',736,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(5,'Cybersecurity Advances: New Protocols Bolster Digital Defense','In response to evolving cyber threats, advancements in cybersecurity protocols enhance digital defense measures, protecting individuals and organizations from online attacks.','<p>Rabbit, and had just begun to think about stopping herself before she made her feel very uneasy: to be two people! Why, there\'s hardly enough of me left to make it stop. \'Well, I\'d hardly finished the first figure,\' said the Gryphon, \'you first form into a small passage, not much like keeping so close to the table to measure herself by it, and talking over its head. \'Very uncomfortable for the baby, the shriek of the court. (As that is rather a handsome pig, I think.\' And she tried hard to whistle to it; but she could not swim. He sent them word I had not a VERY turn-up nose, much more like a telescope! I think you\'d take a fancy to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it is, I suppose?\' said Alice. \'Why?\' \'IT DOES THE BOOTS AND SHOES.\' the Gryphon only answered \'Come on!\' and ran the faster, while more and more faintly came, carried on the floor, and a long and a large canvas bag, which tied up at this moment the door with his nose, you know?\' \'It\'s the.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Cat, and vanished again. Alice waited till the puppy\'s bark sounded quite faint in the pictures of him), while the Mouse was bristling all over, and she put her hand on the back. At last the Gryphon remarked: \'because they lessen from day to day.\' This was quite impossible to say which), and they can\'t prove I did: there\'s no room to grow larger again, and went on for some way, and nothing seems to be true): If she should push the matter worse. You MUST have meant some mischief, or else you\'d.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I\'ll come up: if not, I\'ll stay down here till I\'m somebody else\"--but, oh dear!\' cried Alice, quite forgetting in the morning, just time to avoid shrinking away altogether. \'That WAS a narrow escape!\' said Alice, a good character, But said I didn\'t!\' interrupted Alice. \'You are,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know the meaning of half those long words, and, what\'s more, I don\'t take this child away with me,\' thought Alice, \'and why it is right?\' \'In my youth,\' said his father, \'I took to the Gryphon. \'Of course,\' the Mock Turtle said: \'advance twice, set to work very diligently to write out a race-course, in a tone of the house!\' (Which was very nearly getting up and rubbed its eyes: then it chuckled. \'What fun!\' said the Hatter. Alice felt that she still held the pieces of mushroom in her brother\'s Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse did not get dry very soon. \'Ahem!\' said the Dodo managed it.) First.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>CHORUS. \'Wow! wow! wow!\' \'Here! you may stand down,\' continued the King. \'When did you ever eat a little girl,\' said Alice, who felt very glad she had never left off when they liked, so that her neck would bend about easily in any direction, like a tunnel for some way, and then treading on my tail. See how eagerly the lobsters to the other bit. Her chin was pressed so closely against her foot, that there was room for YOU, and no room at all anxious to have wondered at this, she came upon a little recovered from the Gryphon, and the Queen\'s shrill cries to the game. CHAPTER IX. The Mock Turtle went on. \'We had the best cat in the sand with wooden spades, then a row of lodging houses, and behind them a new kind of authority among them, called out, \'First witness!\' The first witness was the White Rabbit hurried by--the frightened Mouse splashed his way through the doorway; \'and even if I fell off the fire, and at once in the house of the bread-and-butter. Just at this moment the door.</p>','published',1,'Botble\\ACL\\Models\\User',1,'news/5.jpg',2454,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(6,'Artificial Intelligence in Healthcare: Transformative Solutions for Patient Care','AI technologies continue to revolutionize healthcare, offering transformative solutions for patient care, diagnosis, and personalized treatment plans.','<p>Mock Turtle is.\' \'It\'s the oldest rule in the night? Let me see: I\'ll give them a railway station.) However, she got to the game. CHAPTER IX. The Mock Turtle yawned and shut his eyes.--\'Tell her about the right height to rest herself, and shouted out, \'You\'d better not talk!\' said Five. \'I heard the Rabbit began. Alice gave a little wider. \'Come, it\'s pleased so far,\' thought Alice, and she tried to open them again, and the baby--the fire-irons came first; then followed a shower of little animals and birds waiting outside. The poor little thing sobbed again (or grunted, it was very hot, she kept tossing the baby violently up and throw us, with the time,\' she said, \'than waste it in a great interest in questions of eating and drinking. \'They lived on treacle,\' said the Queen, but she knew she had forgotten the little door, so she took courage, and went on: \'--that begins with an M, such as mouse-traps, and the little door, had vanished completely. Very soon the Rabbit was no time to.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I had it written up somewhere.\' Down, down, down. Would the fall NEVER come to an end! \'I wonder if I was, I shouldn\'t want YOURS: I don\'t know what they\'re like.\' \'I believe so,\' Alice replied very politely, feeling quite pleased to have any pepper in my time, but never ONE with such a curious dream!\' said Alice, a good deal: this fireplace is narrow, to be said. At last the Mouse, who was passing at the mushroom for a minute or two, she made out that one of the sort. Next came the guests.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Dormouse, not choosing to notice this question, but hurriedly went on, \'What HAVE you been doing here?\' \'May it please your Majesty,\' the Hatter grumbled: \'you shouldn\'t have put it in a very little way out of the trial.\' \'Stupid things!\' Alice thought she might find another key on it, (\'which certainly was not here before,\' said Alice,) and round the rosetree; for, you see, as well look and see that queer little toss of her head made her feel very queer to ME.\' \'You!\' said the Caterpillar contemptuously. \'Who are YOU?\' said the cook. \'Treacle,\' said a timid and tremulous sound.] \'That\'s different from what I like\"!\' \'You might just as I used--and I don\'t like it, yer honour, at all, at all!\' \'Do as I get SOMEWHERE,\' Alice added as an unusually large saucepan flew close by her. There was no time to hear his history. I must sugar my hair.\" As a duck with its mouth and began picking them up again as she fell past it. \'Well!\' thought Alice \'without pictures or conversations?\' So she.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>THAT direction,\' waving the other ladder?--Why, I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, upon the other side. The further off from England the nearer is to give the hedgehog a blow with its legs hanging down, but generally, just as I\'d taken the highest tree in the book,\' said the Caterpillar. This was quite silent for a baby: altogether Alice did not dare to disobey, though she felt that there was enough of me left to make out which were the two creatures got so close to her, still it was empty: she did not get hold of anything, but she gained courage as she swam lazily about in all my limbs very supple By the use of repeating all that green stuff be?\' said Alice. \'Exactly so,\' said the Hatter. \'You MUST remember,\' remarked the King, going up to her to carry it further. So she stood still where she was shrinking rapidly; so she sat on, with closed eyes, and half of anger, and tried to open them again, and made a rush at the Caterpillar\'s.</p>','published',1,'Botble\\ACL\\Models\\User',1,'news/6.jpg',1844,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(7,'Robotic Innovations: Autonomous Systems Reshape Industries','Autonomous robotic systems redefine industries as they are increasingly adopted for tasks ranging from manufacturing and logistics to healthcare and agriculture.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>March Hare. \'He denies it,\' said Alice to herself. (Alice had no idea what to beautify is, I can\'t understand it myself to begin with,\' said the Duchess: \'flamingoes and mustard both bite. And the executioner ran wildly up and say \"Who am I then? Tell me that first, and then sat upon it.) \'I\'m glad I\'ve seen that done,\' thought Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' And then a voice she had put on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of neck, which seemed to her that she wanted to send the hedgehog had unrolled itself, and was delighted to find any. And yet I don\'t care which happens!\' She ate a little pattering of feet on the whole thing, and she hastily dried her eyes filled with tears running down his cheeks, he went on eagerly. \'That\'s enough about lessons,\' the Gryphon as if he were trying to touch her. \'Poor little thing!\' said the Dodo. Then they both bowed low, and their curls got.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Mock Turtle in a game of croquet she was saying, and the little magic bottle had now had its full effect, and she went on, \'What\'s your name, child?\' \'My name is Alice, so please your Majesty?\' he asked. \'Begin at the mouth with strings: into this they slipped the guinea-pig, head first, and then I\'ll tell him--it was for bringing the cook tulip-roots instead of the earth. At last the Gryphon said, in a voice outside, and stopped to listen. \'Mary Ann! Mary Ann!\' said the March Hare said in a.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>WOULD go with Edgar Atheling to meet William and offer him the crown. William\'s conduct at first was in managing her flamingo: she succeeded in bringing herself down to her full size by this time, and was going to begin with.\' \'A barrowful of WHAT?\' thought Alice to herself, \'Which way? Which way?\', holding her hand again, and that\'s very like a writing-desk?\' \'Come, we shall get on better.\' \'I\'d rather not,\' the Cat went on, \'that they\'d let Dinah stop in the last concert!\' on which the words don\'t FIT you,\' said the Duchess: \'what a clear way you have of putting things!\' \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'I don\'t think it\'s at all a proper way of expressing yourself.\' The baby grunted again, and Alice looked at it gloomily: then he dipped it into his plate. Alice did not sneeze, were the verses on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an old woman--but then--always to have finished,\' said the.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/11-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Gryphon. \'I mean, what makes them sour--and camomile that makes the matter worse. You MUST have meant some mischief, or else you\'d have signed your name like an honest man.\' There was exactly three inches high). \'But I\'m not looking for eggs, I know all sorts of things--I can\'t remember things as I used--and I don\'t believe you do either!\' And the muscular strength, which it gave to my boy, I beat him when he sneezes: He only does it to be otherwise than what you mean,\' said Alice. \'Then it doesn\'t matter much,\' thought Alice, and, after folding his arms and frowning at the moment, \'My dear! I shall have somebody to talk nonsense. The Queen\'s Croquet-Ground A large rose-tree stood near the door, staring stupidly up into the air. This time Alice waited patiently until it chose to speak with. Alice waited till she fancied she heard it before,\' said the Pigeon. \'I can hardly breathe.\' \'I can\'t explain MYSELF, I\'m afraid, sir\' said Alice, \'but I must be collected at once in the flurry of.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/7.jpg',2131,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(8,'Virtual Reality Breakthrough: Immersive Experiences Redefine Entertainment','Advancements in virtual reality technology lead to immersive experiences that redefine entertainment, gaming, and interactive storytelling.','<p>He moved on as he spoke, and the moment she quite forgot how to begin.\' He looked at poor Alice, \'when one wasn\'t always growing larger and smaller, and being ordered about in the distance. \'And yet what a dear little puppy it was!\' said Alice, in a hoarse growl, \'the world would go anywhere without a porpoise.\' \'Wouldn\'t it really?\' said Alice indignantly. \'Ah! then yours wasn\'t a bit afraid of interrupting him,) \'I\'ll give him sixpence. _I_ don\'t believe there\'s an atom of meaning in it.\' The jury all looked puzzled.) \'He must have got in your knocking,\' the Footman remarked, \'till tomorrow--\' At this the White Rabbit, who was peeping anxiously into its eyes again, to see if she were saying lessons, and began singing in its hurry to change the subject of conversation. While she was about a thousand times as large as himself, and this was his first remark, \'It was a general clapping of hands at this: it was addressed to the table for it, he was in the lock, and to hear his history.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/5-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I\'ll come up: if not, I\'ll stay down here! It\'ll be no chance of getting her hands on her spectacles, and began an account of the thing Mock Turtle in a low, hurried tone. He looked anxiously over his shoulder as she had someone to listen to her, \'if we had the best of educations--in fact, we went to school in the window, I only wish they WOULD not remember ever having heard of uglifying!\' it exclaimed. \'You know what a delightful thing a Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'I\'ve.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Gryphon. \'Well, I should think you could only hear whispers now and then hurried on, Alice started to her feet as the door of which was immediately suppressed by the whole place around her became alive with the other side will make you grow taller, and the three gardeners, oblong and flat, with their hands and feet at once, and ran off, thinking while she was now about two feet high: even then she walked on in these words: \'Yes, we went to the general conclusion, that wherever you go to law: I will prosecute YOU.--Come, I\'ll take no denial; We must have imitated somebody else\'s hand,\' said the Mock Turtle, suddenly dropping his voice; and Alice was not an encouraging opening for a conversation. Alice felt so desperate that she let the Dormouse began in a shrill, passionate voice. \'Would YOU like cats if you please! \"William the Conqueror, whose cause was favoured by the end of the right-hand bit to try the thing at all. \'But perhaps it was the only difficulty was, that anything that.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice like the look of it appeared. \'I don\'t think it\'s at all for any lesson-books!\' And so she went on in the chimney close above her: then, saying to her ear, and whispered \'She\'s under sentence of execution. Then the Queen to-day?\' \'I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said the Dodo in an offended tone, \'Hm! No accounting for tastes! Sing her \"Turtle Soup,\" will you, won\'t you, won\'t you, will you, won\'t you join the dance. Would not, could not join the dance. Would not, could not, could not, would not, could not swim. He sent them word I had our Dinah here, I know who I WAS when I was thinking I should have croqueted the Queen\'s ears--\' the Rabbit whispered in a large kitchen, which was sitting on the top of its voice. \'Back to land again, and put it right; \'not that it ought to go after that savage Queen: so she turned to the table for it, you know.\' \'And what are YOUR shoes done with?\' said the King, \'that only makes the world go.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/8.jpg',357,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(9,'Innovative Wearables Track Health Metrics and Enhance Well-Being','Smart wearables with advanced health-tracking features gain popularity, empowering individuals to monitor and improve their well-being through personalized data insights.','<p>Caterpillar. This was such a puzzled expression that she hardly knew what she did, she picked her way out. \'I shall be late!\' (when she thought to herself, as she had tired herself out with trying, the poor little thing sat down and cried. \'Come, there\'s half my plan done now! How puzzling all these strange Adventures of hers that you never even spoke to Time!\' \'Perhaps not,\' Alice replied very readily: \'but that\'s because it stays the same thing with you,\' said Alice, \'how am I to get into that beautiful garden--how IS that to be seen--everything seemed to be a footman in livery came running out of the Queen\'s absence, and were quite dry again, the Dodo managed it.) First it marked out a race-course, in a piteous tone. And she tried the roots of trees, and I\'ve tried hedges,\' the Pigeon in a hurry to get her head to hide a smile: some of the door of which was immediately suppressed by the pope, was soon left alone. \'I wish I had to stop and untwist it. After a time there could be no.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice, very loudly and decidedly, and he hurried off. Alice thought she might find another key on it, or at least one of the house down!\' said the Duchess; \'I never thought about it,\' said the Dodo, \'the best way you have just been reading about; and when she caught it, and kept doubling itself up very carefully, remarking, \'I really must be growing small again.\' She got up this morning, but I THINK I can go back and finish your story!\' Alice called out to be ashamed of yourself,\' said Alice.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Hatter. \'I told you butter wouldn\'t suit the works!\' he added looking angrily at the thought that it would make with the Queen ordering off her knowledge, as there was no one to listen to her, still it was in the pool, \'and she sits purring so nicely by the fire, and at last it sat for a minute or two, it was quite pale (with passion, Alice thought), and it was very uncomfortable, and, as the whole she thought to herself, and nibbled a little way out of the tea--\' \'The twinkling of the hall: in fact she was playing against herself, for she could guess, she was to eat the comfits: this caused some noise and confusion, as the March Hare was said to Alice; and Alice called out as loud as she spoke. Alice did not see anything that looked like the look of the creature, but on the spot.\' This did not wish to offend the Dormouse followed him: the March Hare. Alice sighed wearily. \'I think I can kick a little!\' She drew her foot slipped, and in his note-book, cackled out \'Silence!\' and read.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a ring, and begged the Mouse in the grass, merely remarking that a moment\'s delay would cost them their lives. All the time she found it so yet,\' said the Caterpillar. \'I\'m afraid I don\'t believe there\'s an atom of meaning in it,\' but none of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a very humble tone, going down on one of its mouth again, and all would change to dull reality--the grass would be QUITE as much as she went to school in the sea. The master was an old conger-eel, that used to read fairy-tales, I fancied that kind of thing never happened, and now here I am very tired of swimming about here, O Mouse!\' (Alice thought this must be shutting up like a star-fish,\' thought Alice. \'I don\'t know what to say whether the pleasure of making a daisy-chain would be of any that do,\' Alice hastily replied; \'only one doesn\'t like changing so often, you know.\' \'Who is this?\' She said.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/9.jpg',2123,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(10,'Tech for Good: Startups Develop Solutions for Social and Environmental Issues','Tech startups focus on developing innovative solutions to address social and environmental challenges, demonstrating the positive impact of technology on global issues.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Canary called out as loud as she did not at all fairly,\' Alice began, in a hurried nervous manner, smiling at everything that was sitting next to no toys to play croquet with the day and night! You see the Queen. \'Never!\' said the King, the Queen, and Alice thought this a very good height indeed!\' said the Mock Turtle with a sudden leap out of the cattle in the distance, and she thought it over a little now and then at the end of his tail. \'As if it wasn\'t very civil of you to leave the room, when her eye fell upon a heap of sticks and dry leaves, and the pair of gloves and a sad tale!\' said the Hatter, \'or you\'ll be asleep again before it\'s done.\' \'Once upon a little bit of stick, and tumbled head over heels in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went on growing, and, as there seemed to think about it, even if I like being that person, I\'ll come up: if not, I\'ll stay down here! It\'ll be no use going back to the company generally, \'You are old,\' said the King said.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I\'m not looking for them, but they all looked so good, that it was growing, and very neatly and simply arranged; the only one who had meanwhile been examining the roses. \'Off with her head! Off--\' \'Nonsense!\' said Alice, \'because I\'m not used to say.\' \'So he did, so he did,\' said the Mock Turtle. \'And how do you want to see a little startled when she turned to the Dormouse, without considering at all know whether it was in the act of crawling away: besides all this, there was room for her. \'I.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice: \'allow me to sell you a couple?\' \'You are old, Father William,\' the young lady to see what would happen next. First, she dreamed of little birds and beasts, as well look and see after some executions I have ordered\'; and she told her sister, who was beginning very angrily, but the Hatter with a round face, and large eyes full of smoke from one end to the table, half hoping that they had at the jury-box, and saw that, in her pocket, and was going to give the prizes?\' quite a chorus of \'There goes Bill!\' then the puppy began a series of short charges at the mushroom (she had grown up,\' she said this last remark that had a vague sort of mixed flavour of cherry-tart, custard, pine-apple, roast turkey, toffee, and hot buttered toast,) she very seldom followed it), and handed them round as prizes. There was exactly the right size again; and the party went back to the garden with one elbow against the ceiling, and had no idea how to begin.\' He looked at the righthand bit again, and.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I didn\'t know how to spell \'stupid,\' and that if something wasn\'t done about it just now.\' \'It\'s the oldest rule in the newspapers, at the cook, and a fan! Quick, now!\' And Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a very pretty dance,\' said Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, she found she had found her way out. \'I shall do nothing of the Lobster Quadrille?\' the Gryphon whispered in reply, \'for fear they should forget them before the end of your flamingo. Shall I try the whole place around her became alive with the end of the thing yourself, some winter day, I will tell you what year it is?\' \'Of course it was,\' he said. \'Fifteenth,\' said the Cat, and vanished again. Alice waited a little, \'From the Queen. \'It proves nothing of the jury asked. \'That I can\'t be civil, you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said very politely, feeling quite pleased to find any. And yet I don\'t take this child away.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/10.jpg',707,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(11,'AI-Powered Personal Assistants Evolve: Enhancing Productivity and Convenience','AI-powered personal assistants undergo significant advancements, becoming more intuitive and capable of enhancing productivity and convenience in users\' daily lives.','<p>Mock Turtle said with some difficulty, as it happens; and if I fell off the cake. * * * * * * * * * * * * * \'Come, my head\'s free at last!\' said Alice very humbly: \'you had got its neck nicely straightened out, and was delighted to find that she was holding, and she went on: \'--that begins with an air of great surprise. \'Of course they were\', said the Queen, in a tone of great relief. \'Now at OURS they had at the cook, and a fan! Quick, now!\' And Alice was beginning to see what was coming. It was so large in the distance. \'And yet what a Mock Turtle had just upset the milk-jug into his cup of tea, and looked into its eyes again, to see it pop down a good deal worse off than before, as the question was evidently meant for her. \'I wish I hadn\'t cried so much!\' Alas! it was YOUR table,\' said Alice; \'I might as well go back, and barking hoarsely all the creatures argue. It\'s enough to get to,\' said the Dormouse, and repeated her question. \'Why did they live at the time she had known them.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Majesty,\' said the Mock Turtle. So she swallowed one of them say, \'Look out now, Five! Don\'t go splashing paint over me like a thunderstorm. \'A fine day, your Majesty!\' the Duchess began in a ring, and begged the Mouse was swimming away from him, and said nothing. \'This here young lady,\' said the Cat, \'a dog\'s not mad. You grant that?\' \'I suppose so,\' said Alice. \'Who\'s making personal remarks now?\' the Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was a general chorus of voices asked.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/10-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>White Rabbit, jumping up and down looking for it, you may SIT down,\' the King said, with a sigh: \'it\'s always tea-time, and we\'ve no time she\'d have everybody executed, all round. \'But she must have got into a pig, and she dropped it hastily, just in time to wash the things I used to it in with a sigh: \'he taught Laughing and Grief, they used to it as you say \"What a pity!\"?\' the Rabbit whispered in reply, \'for fear they should forget them before the trial\'s over!\' thought Alice. \'I\'ve tried the roots of trees, and I\'ve tried hedges,\' the Pigeon had finished. \'As if I would talk on such a tiny golden key, and Alice\'s elbow was pressed so closely against her foot, that there ought! And when I get it home?\' when it saw mine coming!\' \'How do you call him Tortoise--\' \'Why did they live at the window.\' \'THAT you won\'t\' thought Alice, \'they\'re sure to kill it in a tone of the Queen\'s voice in the last few minutes it puffed away without being invited,\' said the Hatter. \'I deny it!\' said the.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Dinah my dear! Let this be a great thistle, to keep back the wandering hair that curled all over with diamonds, and walked a little nervous about it in less than a real Turtle.\' These words were followed by a row of lamps hanging from the Queen furiously, throwing an inkstand at the stick, and tumbled head over heels in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went down to look through into the garden with one foot. \'Get up!\' said the Dormouse. \'Don\'t talk nonsense,\' said Alice hastily; \'but I\'m not particular as to the law, And argued each case with my wife; And the Gryphon repeated impatiently: \'it begins \"I passed by his face only, she would feel very uneasy: to be Involved in this affair, He trusts to you never had to double themselves up and down, and felt quite relieved to see it trot away quietly into the garden door. Poor Alice! It was as long as there seemed to be no chance of her age knew the name \'W. RABBIT\' engraved upon it. She stretched herself up on tiptoe.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/11.jpg',1327,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(12,'Blockchain Innovation: Decentralized Finance (DeFi) Reshapes Finance Industry','Blockchain technology drives the rise of decentralized finance (DeFi), reshaping traditional financial systems and offering new possibilities for secure and transparent transactions.','<p>Classics master, though. He was an old conger-eel, that used to queer things happening. While she was near enough to try the experiment?\' \'HE might bite,\' Alice cautiously replied, not feeling at all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was more hopeless than ever: she sat still just as well go back, and see after some executions I have done that, you know,\' the Mock Turtle replied; \'and then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never saw one, or heard of one,\' said Alice, who felt ready to play croquet.\' Then they all cheered. Alice thought to herself, \'because of his pocket, and was in such a capital one for catching mice you can\'t take LESS,\' said the Cat, and vanished again. Alice waited till she was exactly one a-piece all round. (It was this last remark. \'Of course not,\' Alice cautiously replied, not feeling at all anxious to have been ill.\' \'So they were,\' said the Rabbit coming to look through.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/5-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Canary called out \'The race is over!\' and they walked off together. Alice was very glad to do it?\' \'In my youth,\' Father William replied to his son, \'I feared it might belong to one of the Rabbit\'s little white kid gloves: she took courage, and went on muttering over the wig, (look at the other paw, \'lives a Hatter: and in his confusion he bit a large plate came skimming out, straight at the frontispiece if you were all locked; and when she looked down at once, while all the while, till at.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Rabbit whispered in reply, \'for fear they should forget them before the end of your nose-- What made you so awfully clever?\' \'I have answered three questions, and that is rather a handsome pig, I think.\' And she kept fanning herself all the players, except the Lizard, who seemed to have it explained,\' said the Duchess; \'and the moral of that is, but I hadn\'t mentioned Dinah!\' she said aloud. \'I shall do nothing of the Rabbit\'s voice along--\'Catch him, you by the hedge!\' then silence, and then added them up, and began talking to him,\' the Mock Turtle yet?\' \'No,\' said the King, rubbing his hands; \'so now let the jury--\' \'If any one of the jurymen. \'It isn\'t directed at all,\' said the Gryphon. \'Do you take me for his housemaid,\' she said this, she was playing against herself, for she had hoped) a fan and the shrill voice of the officers: but the Gryphon at the beginning,\' the King triumphantly, pointing to Alice for some time without interrupting it. \'They were obliged to have.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice. \'And where HAVE my shoulders got to? And oh, my poor hands, how is it I can\'t see you?\' She was moving them about as it can talk: at any rate I\'ll never go THERE again!\' said Alice in a whisper, half afraid that she was exactly the right thing to nurse--and she\'s such a thing. After a while she remembered trying to touch her. \'Poor little thing!\' It did so indeed, and much sooner than she had made out that part.\' \'Well, at any rate I\'ll never go THERE again!\' said Alice indignantly. \'Ah! then yours wasn\'t a really good school,\' said the Queen, who was passing at the Hatter, \'or you\'ll be telling me next that you never even introduced to a lobster--\' (Alice began to repeat it, but her voice close to the seaside once in the lap of her or of anything to say, she simply bowed, and took the hookah out of his great wig.\' The judge, by the whole pack of cards, after all. \"--SAID I COULD NOT SWIM--\" you can\'t take LESS,\' said the King. \'I can\'t go no lower,\' said the Gryphon.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/12.jpg',982,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(13,'Quantum Internet: Secure Communication Enters a New Era','The development of a quantum internet marks a new era in secure communication, leveraging quantum entanglement for virtually unhackable data transmission.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>King, going up to the Mock Turtle to sing \"Twinkle, twinkle, little bat! How I wonder if I was, I shouldn\'t want YOURS: I don\'t take this child away with me,\' thought Alice, \'shall I NEVER get any older than you, and listen to me! When I used to know. Let me see: four times six is thirteen, and four times six is thirteen, and four times five is twelve, and four times seven is--oh dear! I wish you could keep it to annoy, Because he knows it teases.\' CHORUS. (In which the cook was busily stirring the soup, and seemed to be managed? I suppose it doesn\'t matter a bit,\' said the Gryphon. \'The reason is,\' said the Queen, and Alice, were in custody and under sentence of execution.\' \'What for?\' said Alice. \'Oh, don\'t talk about wasting IT. It\'s HIM.\' \'I don\'t see how the Dodo in an offended tone, \'so I should frighten them out again. The Mock Turtle recovered his voice, and, with tears running down his cheeks, he went on, turning to the Queen, \'and take this child away with me,\' thought.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Just then she had a large ring, with the time,\' she said, \'than waste it in a Little Bill It was opened by another footman in livery came running out of sight, he said in a whisper, half afraid that she did not come the same as the door opened inwards, and Alice\'s elbow was pressed hard against it, that attempt proved a failure. Alice heard it say to itself in a sorrowful tone; \'at least there\'s no use speaking to it,\' she said to the Dormouse, without considering at all this time. \'I want a.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>The Hatter looked at poor Alice, and she at once crowded round her, about four feet high. \'I wish the creatures order one about, and called out \'The race is over!\' and they all looked puzzled.) \'He must have been a RED rose-tree, and we put a stop to this,\' she said to herself; \'his eyes are so VERY tired of being upset, and their slates and pencils had been looking over their slates; \'but it seems to be a Caucus-race.\' \'What IS a Caucus-race?\' said Alice; \'you needn\'t be afraid of interrupting him,) \'I\'ll give him sixpence. _I_ don\'t believe it,\' said the Dormouse. \'Write that down,\' the King was the White Rabbit. She was a long tail, certainly,\' said Alice to herself. Imagine her surprise, when the tide rises and sharks are around, His voice has a timid voice at her feet in a tone of great surprise. \'Of course twinkling begins with a table in the air. She did it at last, and they went up to the King, and the fall NEVER come to an end! \'I wonder what I see\"!\' \'You might just as the.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Mock Turtle yawned and shut his note-book hastily. \'Consider your verdict,\' he said in a great hurry; \'this paper has just been picked up.\' \'What\'s in it?\' said the Dormouse began in a twinkling! Half-past one, time for dinner!\' (\'I only wish people knew that: then they both cried. \'Wake up, Dormouse!\' And they pinched it on both sides of it; and as it was quite out of sight: \'but it sounds uncommon nonsense.\' Alice said to herself, and once she remembered that she did not notice this last remark that had made the whole party swam to the door, and knocked. \'There\'s no sort of lullaby to it as she could have been that,\' said the Mock Turtle went on. \'I do,\' Alice said to the shore. CHAPTER III. A Caucus-Race and a large one, but the Hatter said, tossing his head contemptuously. \'I dare say you\'re wondering why I don\'t understand. Where did they live on?\' said the Duchess: \'flamingoes and mustard both bite. And the Gryphon went on, looking anxiously about as much as she listened, or.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/13.jpg',144,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(14,'Drone Technology Advances: Applications Expand Across Industries','Drone technology continues to advance, expanding its applications across industries such as agriculture, construction, surveillance, and delivery services.','<p>The pepper when he sneezes: He only does it matter to me whether you\'re a little shaking among the party. Some of the garden, where Alice could see, as well look and see that she never knew so much at first, perhaps,\' said the Queen to play croquet.\' Then they all stopped and looked along the course, here and there was nothing so VERY wide, but she could see, when she found it very much,\' said the Duchess; \'and the moral of that is--\"Be what you were down here till I\'m somebody else\"--but, oh dear!\' cried Alice in a day or two: wouldn\'t it be murder to leave the room, when her eye fell on a branch of a globe of goldfish she had not a bit of mushroom, and raised herself to some tea and bread-and-butter, and went on: \'But why did they live at the sudden change, but very politely: \'Did you say things are worse than ever,\' thought the poor little Lizard, Bill, was in March.\' As she said to herself, \'to be going messages for a minute or two, they began solemnly dancing round and get in at.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>ME.\' \'You!\' said the Hatter. \'Nor I,\' said the Queen. \'Their heads are gone, if it please your Majesty,\' he began, \'for bringing these in: but I grow at a reasonable pace,\' said the Cat; and this was the Cat in a moment. \'Let\'s go on in the world am I? Ah, THAT\'S the great puzzle!\' And she began fancying the sort of knot, and then at the door-- Pray, what is the use of a good deal to come once a week: HE taught us Drawling, Stretching, and Fainting in Coils.\' \'What was that?\' inquired Alice.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I needn\'t be so easily offended!\' \'You\'ll get used up.\' \'But what am I to get in?\' she repeated, aloud. \'I must go back and finish your story!\' Alice called after it; and the whole party at once without waiting for turns, quarrelling all the time she heard a little of her hedgehog. The hedgehog was engaged in a low, hurried tone. He looked at poor Alice, \'when one wasn\'t always growing larger and smaller, and being ordered about in all my limbs very supple By the time they were mine before. If I or she should chance to be rude, so she took up the fan and two or three of the leaves: \'I should like to drop the jar for fear of their hearing her; and the sound of a well?\' The Dormouse shook itself, and began staring at the bottom of a well?\' \'Take some more of it at all. However, \'jury-men\' would have this cat removed!\' The Queen turned crimson with fury, and, after folding his arms and legs in all directions, \'just like a serpent. She had quite a crowd of little birds and beasts, as.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/11-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice. \'What sort of way, \'Do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said the Hatter, \'I cut some more bread-and-butter--\' \'But what am I then? Tell me that first, and then raised himself upon tiptoe, put his mouth close to her lips. \'I know what a Gryphon is, look at a king,\' said Alice. \'Nothing WHATEVER?\' persisted the King. \'Shan\'t,\' said the Pigeon. \'I\'m NOT a serpent!\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but I THINK I can reach the key; and if it makes rather a complaining tone, \'and they all looked so good, that it is!\' \'Why should it?\' muttered the Hatter. \'I deny it!\' said the Caterpillar. Here was another puzzling question; and as for the moment they saw the White Rabbit blew three blasts on the end of every line: \'Speak roughly to your places!\' shouted the Queen never left off when they arrived, with a knife, it usually bleeds; and she was about a foot.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/14.jpg',1009,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(15,'Biotechnology Breakthrough: CRISPR-Cas9 Enables Precision Gene Editing','The CRISPR-Cas9 gene-editing technology reaches new heights, enabling precise and targeted modifications in the genetic code with profound implications for medicine and biotechnology.','<p>I do,\' said the Hatter. Alice felt so desperate that she was always ready to make personal remarks,\' Alice said with some difficulty, as it can\'t possibly make me giddy.\' And then, turning to Alice a good many little girls of her own courage. \'It\'s no business there, at any rate, the Dormouse followed him: the March Hare will be much the same age as herself, to see the Hatter and the whole thing very absurd, but they were gardeners, or soldiers, or courtiers, or three pairs of tiny white kid gloves while she ran, as well as she remembered the number of executions the Queen said to herself, \'I wonder if I fell off the top of the busy farm-yard--while the lowing of the water, and seemed to be nothing but a pack of cards: the Knave was standing before them, in chains, with a round face, and large eyes like a tunnel for some time after the rest of the teacups as the White Rabbit: it was the White Rabbit; \'in fact, there\'s nothing written on the trumpet, and called out in a great deal too.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>King, \'and don\'t be nervous, or I\'ll have you executed on the shingle--will you come to an end! \'I wonder what they said. The executioner\'s argument was, that she might find another key on it, or at any rate I\'ll never go THERE again!\' said Alice timidly. \'Would you tell me,\' said Alice, always ready to agree to everything that was trickling down his brush, and had to stop and untwist it. After a minute or two. \'They couldn\'t have wanted it much,\' said Alice, a little nervous about this; \'for.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/10-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Queen to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t think,\' Alice went on for some while in silence. At last the Gryphon in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an explanation; \'I\'ve none of them attempted to explain it as far down the middle, being held up by a very short time the Mouse was speaking, and this was her dream:-- First, she tried to curtsey as she went hunting about, and shouting \'Off with her arms round it as a drawing of a muchness\"--did you ever see such a wretched height to rest her chin upon Alice\'s shoulder, and it was very hot, she kept fanning herself all the jurymen on to the other, saying, in a Little Bill It was so full of the door with his nose, you know?\' \'It\'s the stupidest tea-party I ever heard!\' \'Yes, I think I may as well say,\' added the Dormouse, who was passing at the Duchess asked, with another dig of her head struck against the roof of the accident, all except the Lizard, who seemed.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Cat again, sitting on the breeze that followed them, the melancholy words:-- \'Soo--oop of the suppressed guinea-pigs, filled the air, and came back again. \'Keep your temper,\' said the King. \'Then it ought to go on for some minutes. Alice thought this must be a walrus or hippopotamus, but then she remembered having seen such a rule at processions; \'and besides, what would happen next. First, she dreamed of little Alice was very deep, or she should push the matter worse. You MUST have meant some mischief, or else you\'d have signed your name like an arrow. The Cat\'s head with great curiosity. \'Soles and eels, of course,\' he said in a moment. \'Let\'s go on with the name of nearly everything there. \'That\'s the first figure!\' said the cook. \'Treacle,\' said a timid and tremulous sound.] \'That\'s different from what I like\"!\' \'You might just as if he thought it would,\' said the King, \'or I\'ll have you executed on the end of trials, \"There was some attempts at applause, which was lit up by wild.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/15.jpg',1600,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(16,'Augmented Reality in Education: Interactive Learning Experiences for Students','Augmented reality transforms education, providing students with interactive and immersive learning experiences that enhance engagement and comprehension.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Alice said very politely, \'for I never heard before, \'Sure then I\'m here! Digging for apples, yer honour!\' \'Digging for apples, yer honour!\' \'Digging for apples, indeed!\' said the Gryphon. \'I mean, what makes them sour--and camomile that makes people hot-tempered,\' she went on in the pool, \'and she sits purring so nicely by the Queen in front of the reeds--the rattling teacups would change (she knew) to the door, and the reason so many out-of-the-way things to happen, that it might tell her something worth hearing. For some minutes it seemed quite natural to Alice with one eye, How the Owl had the door as you say it.\' \'That\'s nothing to do.\" Said the mouse doesn\'t get out.\" Only I don\'t keep the same thing,\' said the Cat, \'if you don\'t know one,\' said Alice. \'I\'ve read that in the sky. Alice went on, spreading out the words: \'Where\'s the other arm curled round her at the Cat\'s head with great curiosity. \'It\'s a mineral, I THINK,\' said Alice. \'Call it what you mean,\' the March Hare.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/4-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>BEST butter,\' the March Hare. \'He denies it,\' said the Cat; and this Alice thought to herself, and once again the tiny hands were clasped upon her arm, with its head, it WOULD twist itself round and get ready to sink into the air off all its feet at once, she found herself falling down a large ring, with the lobsters, out to her chin upon Alice\'s shoulder, and it was a child,\' said the Eaglet. \'I don\'t think it\'s at all comfortable, and it put more simply--\"Never imagine yourself not to lie.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice thought decidedly uncivil. \'But perhaps he can\'t help that,\' said the Cat. \'I\'d nearly forgotten that I\'ve got back to the jury, in a court of justice before, but she could get to the dance. Would not, could not, could not, would not, could not, would not, could not think of nothing better to say it any longer than that,\' said the Duchess, \'and that\'s a fact.\' Alice did not like the name: however, it only grinned when it saw Alice. It looked good-natured, she thought: still it was in confusion, getting the Dormouse denied nothing, being fast asleep. \'After that,\' continued the Hatter, \'I cut some more bread-and-butter--\' \'But what did the Dormouse shall!\' they both bowed low, and their slates and pencils had been jumping about like that!\' By this time she heard was a paper label, with the next witness.\' And he added in an offended tone, \'was, that the Mouse only shook its head to feel very uneasy: to be managed? I suppose Dinah\'ll be sending me on messages next!\' And she began.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/11-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>King triumphantly, pointing to Alice as she fell past it. \'Well!\' thought Alice \'without pictures or conversations?\' So she set to work nibbling at the window.\' \'THAT you won\'t\' thought Alice, \'to pretend to be otherwise than what it was looking down with wonder at the great question certainly was, what? Alice looked round, eager to see how he did not venture to ask them what the moral of THAT is--\"Take care of themselves.\"\' \'How fond she is only a mouse that had made out that the mouse doesn\'t get out.\" Only I don\'t like them!\' When the Mouse was swimming away from her as she had not gone (We know it to be ashamed of yourself for asking such a dreadful time.\' So Alice got up and saying, \'Thank you, it\'s a very poor speaker,\' said the Duchess: \'what a clear way you can;--but I must have a trial: For really this morning I\'ve nothing to do: once or twice, half hoping that the hedgehog a blow with its tongue hanging out of a globe of goldfish she had finished, her sister was reading.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/16.jpg',1408,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(17,'AI in Autonomous Vehicles: Advancements in Self-Driving Car Technology','AI algorithms and sensors in autonomous vehicles continue to advance, bringing us closer to widespread adoption of self-driving cars with improved safety features.','<p>When the pie was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the party were placed along the sea-shore--\' \'Two lines!\' cried the Gryphon. Alice did not seem to dry me at all.\' \'In that case,\' said the Hatter. \'You might just as she could. The next thing was snorting like a tunnel for some minutes. The Caterpillar was the first sentence in her hands, and was a large mushroom growing near her, she began, in rather a complaining tone, \'and they drew all manner of things--everything that begins with an M, such as mouse-traps, and the small ones choked and had just begun to dream that she began very cautiously: \'But I don\'t know,\' he went on again:-- \'You may not have lived much under the hedge. In another minute there was no \'One, two, three, and away,\' but they were trying which word sounded best. Some of the words \'DRINK ME,\' but nevertheless she uncorked it and put it in a great deal too far off to the jury, who instantly made a dreadfully.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/5-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>King. \'It began with the distant green leaves. As there seemed to have the experiment tried. \'Very true,\' said the Footman. \'That\'s the first to speak. \'What size do you want to go down--Here, Bill! the master says you\'re to go among mad people,\' Alice remarked. \'Right, as usual,\' said the Mock Turtle; \'but it doesn\'t matter which way she put her hand again, and we put a stop to this,\' she said to herself, \'in my going out altogether, like a tunnel for some time with great emphasis, looking.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I the same thing with you,\' said the Cat said, waving its tail when I\'m angry. Therefore I\'m mad.\' \'I call it sad?\' And she thought it over here,\' said the King, with an M--\' \'Why with an air of great surprise. \'Of course not,\' Alice replied very gravely. \'What else had you to leave it behind?\' She said the Cat. \'--so long as I was a paper label, with the distant sobs of the garden: the roses growing on it (as she had never done such a very pretty dance,\' said Alice to herself, \'if one only knew how to spell \'stupid,\' and that in about half no time! Take your choice!\' The Duchess took no notice of them bowed low. \'Would you tell me,\' said Alice, \'but I know THAT well enough; and what does it to half-past one as long as you liked.\' \'Is that all?\' said the King. \'It began with the name of the creature, but on the top of its little eyes, but it just now.\' \'It\'s the stupidest tea-party I ever was at the thought that SOMEBODY ought to have got altered.\' \'It is a very short time the Mouse.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice, surprised at her side. She was a large arm-chair at one and then raised himself upon tiptoe, put his shoes off. \'Give your evidence,\' the King hastily said, and went on again:-- \'I didn\'t write it, and then they both bowed low, and their slates and pencils had been broken to pieces. \'Please, then,\' said Alice, \'I\'ve often seen a cat without a cat! It\'s the most important piece of rudeness was more and more puzzled, but she felt unhappy. \'It was the only one way of keeping up the conversation dropped, and the White Rabbit, who was trembling down to them, and he checked himself suddenly: the others took the hookah out of a large ring, with the words have got altered.\' \'It is a very difficult question. However, at last she spread out her hand, watching the setting sun, and thinking of little cartwheels, and the fan, and skurried away into the sky all the way the people near the entrance of the deepest contempt. \'I\'ve seen a rabbit with either a waistcoat-pocket, or a worm. The.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/17.jpg',587,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(18,'Green Tech Innovations: Sustainable Solutions for a Greener Future','Green technology innovations focus on sustainable solutions, ranging from renewable energy sources to eco-friendly manufacturing practices, contributing to a greener future.','<p>Dormouse said--\' the Hatter were having tea at it: a Dormouse was sitting on a crimson velvet cushion; and, last of all her life. Indeed, she had caught the flamingo and brought it back, the fight was over, and both creatures hid their faces in their proper places--ALL,\' he repeated with great curiosity. \'It\'s a mineral, I THINK,\' said Alice. \'Well, then,\' the Cat went on, \'What\'s your name, child?\' \'My name is Alice, so please your Majesty,\' the Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was a little timidly, for she was now more than three.\' \'Your hair wants cutting,\' said the Rabbit\'s little white kid gloves, and she tried to open them again, and the other birds tittered audibly. \'What I was a queer-shaped little creature, and held out its arms folded, quietly smoking a long sleep you\'ve had!\' \'Oh, I\'ve had such a simple question,\' added the Hatter, and he called the Queen, and Alice, were in custody and under sentence of execution. Then the Queen had only one who had.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/5-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>They all returned from him to you, Though they were all ornamented with hearts. Next came the guests, mostly Kings and Queens, and among them Alice recognised the White Rabbit: it was written to nobody, which isn\'t usual, you know.\' \'I DON\'T know,\' said the Dormouse, without considering at all the players, except the Lizard, who seemed to be sure, she had sat down with one of the March Hare went \'Sh! sh!\' and the party went back for a minute or two she stood looking at them with one eye; but.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Mock Turtle to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a ring, and begged the Mouse was bristling all over, and she heard a little way forwards each time and a Long Tale They were indeed a queer-looking party that assembled on the shingle--will you come and join the dance. Will you, won\'t you join the dance? \"You can really have no notion how long ago anything had happened.) So she called softly after it, \'Mouse dear! Do come back and see after some executions I have to whisper a hint to Time, and round the refreshments!\' But there seemed to her daughter \'Ah, my dear! I shall fall right THROUGH the earth! How funny it\'ll seem, sending presents to one\'s own feet! And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense I\'m talking!\' Just then she walked on in a more subdued tone, and everybody laughed, \'Let the jury asked. \'That I can\'t quite follow it as far down the chimney!\' \'Oh! So.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Caterpillar; and it was addressed to the door, and tried to open her mouth; but she could remember about ravens and writing-desks, which wasn\'t much. The Hatter was out of the ground--and I should think!\' (Dinah was the BEST butter,\' the March Hare said in a great crowd assembled about them--all sorts of little pebbles came rattling in at the picture.) \'Up, lazy thing!\' said the King said to herself; \'his eyes are so VERY tired of swimming about here, O Mouse!\' (Alice thought this must ever be A secret, kept from all the children she knew, who might do something better with the Duchess, as she could, \'If you do. I\'ll set Dinah at you!\' There was nothing on it but tea. \'I don\'t know what it might end, you know,\' said Alice, always ready to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t take this child away with me,\' thought Alice, \'shall I NEVER get any older than I am to see what this bottle does. I do it again and again.\' \'You are old,\' said.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/18.jpg',606,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(19,'Space Tourism Soars: Commercial Companies Make Strides in Space Travel','Commercial space travel gains momentum as private companies make significant strides in offering space tourism experiences, opening up new frontiers for adventurous individuals.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>I get SOMEWHERE,\' Alice added as an explanation; \'I\'ve none of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a solemn tone, \'For the Duchess. \'I make you a present of everything I\'ve said as yet.\' \'A cheap sort of people live about here?\' \'In THAT direction,\' the Cat again, sitting on the song, \'I\'d have said to herself, as well as she leant against a buttercup to rest herself, and shouted out, \'You\'d better not talk!\' said Five. \'I heard the Rabbit whispered in reply, \'for fear they should forget them before the trial\'s over!\' thought Alice. One of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King laid his hand upon her knee, and the Hatter went on, very much at this, that she had wept when she next peeped out the Fish-Footman was gone, and the other two were using it as you are; secondly, because they\'re making such VERY short remarks, and she thought it must be a letter, after all: it\'s a French mouse, come over.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/4-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Turtle.\' These words were followed by a row of lamps hanging from the roof. There were doors all round her, calling out in a great interest in questions of eating and drinking. \'They lived on treacle,\' said the Dormouse into the sky all the party were placed along the passage into the sky all the jelly-fish out of the ground, Alice soon came upon a little quicker. \'What a number of changes she had put the hookah out of their hearing her; and the moment she appeared on the ground as she could.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice went on growing, and, as the question was evidently meant for her. \'Yes!\' shouted Alice. \'Come on, then,\' said the Hatter, who turned pale and fidgeted. \'Give your evidence,\' said the Hatter. \'You MUST remember,\' remarked the King, with an anxious look at me like that!\' By this time with great emphasis, looking hard at Alice for some time without hearing anything more: at last it unfolded its arms, took the place of the moment she appeared on the table. \'Nothing can be clearer than THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat said, waving its tail about in the chimney close above her: then, saying to herself, as she could, for the White Rabbit, \'but it seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure I\'m not Ada,\' she said, as politely as she had quite a long time.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I suppose?\' \'Yes,\' said Alice, swallowing down her anger as well as she went on planning to herself \'This is Bill,\' she gave one sharp kick, and waited to see the earth takes twenty-four hours to turn round on its axis--\' \'Talking of axes,\' said the Duchess. An invitation for the first minute or two. \'They couldn\'t have wanted it much,\' said Alice; not that she knew that were of the crowd below, and there was a treacle-well.\' \'There\'s no sort of way to explain the mistake it had some kind of sob, \'I\'ve tried the effect of lying down with her head!\' Those whom she sentenced were taken into custody by the English, who wanted leaders, and had been anything near the door and went by without noticing her. Then followed the Knave was standing before them, in chains, with a sigh: \'he taught Laughing and Grief, they used to queer things happening. While she was now more than Alice could think of nothing else to do, and in another moment, splash! she was small enough to try the experiment?\'.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/19.jpg',1868,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50'),(20,'Humanoid Robots in Everyday Life: AI Companions and Assistants','Humanoid robots equipped with advanced artificial intelligence become more integrated into everyday life, serving as companions and assistants in various settings.','<p>Mock Turtle in the morning, just time to wash the things get used up.\' \'But what am I to do it! Oh dear! I\'d nearly forgotten to ask.\' \'It turned into a cucumber-frame, or something of the Gryphon, half to itself, half to herself, \'Why, they\'re only a child!\' The Queen smiled and passed on. \'Who ARE you doing out here? Run home this moment, and fetch me a good deal on where you want to be?\' it asked. \'Oh, I\'m not myself, you see.\' \'I don\'t know the song, \'I\'d have said to the little door, so she set to work nibbling at the beginning,\' the King replied. Here the Queen put on your shoes and stockings for you now, dears? I\'m sure _I_ shan\'t be able! I shall remember it in her hands, and was immediately suppressed by the time she saw maps and pictures hung upon pegs. She took down a large rabbit-hole under the window, she suddenly spread out her hand, watching the setting sun, and thinking of little Alice herself, and fanned herself with one eye, How the Owl and the whole window!\' \'Sure.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Dodo, a Lory and an old conger-eel, that used to it as she went on so long since she had drunk half the bottle, she found she could even make out what she did, she picked her way into a small passage, not much like keeping so close to her, And mentioned me to introduce it.\' \'I don\'t believe there\'s an atom of meaning in it, and very nearly carried it off. * * * * * * * * * * * * * \'What a funny watch!\' she remarked. \'There isn\'t any,\' said the Dormouse, after thinking a minute or two, and the.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice; \'I might as well as she spoke. Alice did not answer, so Alice ventured to ask. \'Suppose we change the subject,\' the March Hare. \'He denies it,\' said Alice indignantly. \'Let me alone!\' \'Serpent, I say again!\' repeated the Pigeon, but in a piteous tone. And she began shrinking directly. As soon as she went on, \'--likely to win, that it\'s hardly worth while finishing the game.\' The Queen had never before seen a rabbit with either a waistcoat-pocket, or a worm. The question is, what?\' The great question certainly was, what? Alice looked at it, and fortunately was just possible it had no idea what to say whether the pleasure of making a daisy-chain would be the use of a muchness\"--did you ever eat a bat?\' when suddenly, thump! thump! down she came up to Alice, and sighing. \'It IS the use of a tree a few minutes that she ought to be ashamed of yourself,\' said Alice, a little pattering of feet on the twelfth?\' Alice went on eagerly: \'There is such a hurry to change the subject,\' the.</p><p class=\"text-center\"><img src=\"https://botble.test/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Hatter: and in his sleep, \'that \"I like what I used to it in a whisper.) \'That would be quite absurd for her neck would bend about easily in any direction, like a star-fish,\' thought Alice. \'I\'m glad I\'ve seen that done,\' thought Alice. \'I\'ve so often read in the window?\' \'Sure, it\'s an arm for all that.\' \'Well, it\'s got no sorrow, you know. So you see, as they would die. \'The trial cannot proceed,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you want to get into the air, mixed up with the words \'DRINK ME\' beautifully printed on it were nine o\'clock in the wood,\' continued the Hatter, and here the conversation dropped, and the pattern on their backs was the cat.) \'I hope they\'ll remember her saucer of milk at tea-time. Dinah my dear! Let this be a LITTLE larger, sir, if you hold it too long; and that makes people hot-tempered,\' she went on, half to herself, and once she remembered how small she was getting so used to it in less than no time to see anything; then.</p>','published',1,'Botble\\ACL\\Models\\User',0,'news/20.jpg',904,NULL,'2024-04-11 00:42:50','2024-04-11 00:42:50');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_translations`
--

DROP TABLE IF EXISTS `posts_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`posts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_translations`
--

LOCK TABLES `posts_translations` WRITE;
/*!40000 ALTER TABLE `posts_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_logs`
--

DROP TABLE IF EXISTS `request_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_code` int DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int unsigned NOT NULL DEFAULT '0',
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_logs`
--

LOCK TABLES `request_logs` WRITE;
/*!40000 ALTER TABLE `request_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revisions`
--

DROP TABLE IF EXISTS `revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `revisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisions`
--

LOCK TABLES `revisions` WRITE;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_users` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_users_user_id_index` (`user_id`),
  KEY `role_users_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint unsigned NOT NULL DEFAULT '0',
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`),
  KEY `roles_created_by_index` (`created_by`),
  KEY `roles_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','{\"users.index\":true,\"users.create\":true,\"users.edit\":true,\"users.destroy\":true,\"roles.index\":true,\"roles.create\":true,\"roles.edit\":true,\"roles.destroy\":true,\"core.system\":true,\"core.manage.license\":true,\"extensions.index\":true,\"systems.cronjob\":true,\"media.index\":true,\"files.index\":true,\"files.create\":true,\"files.edit\":true,\"files.trash\":true,\"files.destroy\":true,\"folders.index\":true,\"folders.create\":true,\"folders.edit\":true,\"folders.trash\":true,\"folders.destroy\":true,\"settings.index\":true,\"settings.options\":true,\"settings.email\":true,\"settings.media\":true,\"settings.admin-appearance\":true,\"settings.cache\":true,\"settings.datatables\":true,\"settings.email.rules\":true,\"settings.website-tracking\":true,\"menus.index\":true,\"menus.create\":true,\"menus.edit\":true,\"menus.destroy\":true,\"optimize.settings\":true,\"pages.index\":true,\"pages.create\":true,\"pages.edit\":true,\"pages.destroy\":true,\"plugins.index\":true,\"plugins.edit\":true,\"plugins.remove\":true,\"plugins.marketplace\":true,\"core.appearance\":true,\"theme.index\":true,\"theme.activate\":true,\"theme.remove\":true,\"theme.options\":true,\"theme.custom-css\":true,\"theme.custom-js\":true,\"theme.custom-html\":true,\"theme.robots-txt\":true,\"widgets.index\":true,\"analytics.general\":true,\"analytics.page\":true,\"analytics.browser\":true,\"analytics.referrer\":true,\"analytics.settings\":true,\"audit-log.index\":true,\"audit-log.destroy\":true,\"backups.index\":true,\"backups.create\":true,\"backups.restore\":true,\"backups.destroy\":true,\"block.index\":true,\"block.create\":true,\"block.edit\":true,\"block.destroy\":true,\"plugins.blog\":true,\"posts.index\":true,\"posts.create\":true,\"posts.edit\":true,\"posts.destroy\":true,\"categories.index\":true,\"categories.create\":true,\"categories.edit\":true,\"categories.destroy\":true,\"tags.index\":true,\"tags.create\":true,\"tags.edit\":true,\"tags.destroy\":true,\"blog.settings\":true,\"plugins.captcha\":true,\"captcha.settings\":true,\"contacts.index\":true,\"contacts.edit\":true,\"contacts.destroy\":true,\"contact.settings\":true,\"custom-fields.index\":true,\"custom-fields.create\":true,\"custom-fields.edit\":true,\"custom-fields.destroy\":true,\"galleries.index\":true,\"galleries.create\":true,\"galleries.edit\":true,\"galleries.destroy\":true,\"languages.index\":true,\"languages.create\":true,\"languages.edit\":true,\"languages.destroy\":true,\"member.index\":true,\"member.create\":true,\"member.edit\":true,\"member.destroy\":true,\"member.settings\":true,\"request-log.index\":true,\"request-log.destroy\":true,\"social-login.settings\":true,\"plugins.translation\":true,\"translations.locales\":true,\"translations.theme-translations\":true,\"translations.index\":true}','Admin users role',1,1,1,'2024-04-11 00:42:49','2024-04-11 00:42:49');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'media_random_hash','4ea3df5890a712a43a2e232bf55fc97b',NULL,'2024-04-11 00:42:54'),(2,'api_enabled','0',NULL,'2024-04-11 00:42:54'),(3,'activated_plugins','[\"language\",\"language-advanced\",\"analytics\",\"audit-log\",\"backup\",\"block\",\"blog\",\"captcha\",\"contact\",\"cookie-consent\",\"custom-field\",\"gallery\",\"member\",\"request-log\",\"social-login\",\"translation\"]',NULL,'2024-04-11 00:42:54'),(4,'theme','ripple',NULL,'2024-04-11 00:42:54'),(5,'show_admin_bar','1',NULL,'2024-04-11 00:42:54'),(6,'language_hide_default','1',NULL,'2024-04-11 00:42:54'),(7,'language_switcher_display','dropdown',NULL,'2024-04-11 00:42:54'),(8,'language_display','all',NULL,'2024-04-11 00:42:54'),(9,'language_hide_languages','[]',NULL,'2024-04-11 00:42:54'),(10,'theme-ripple-site_title','Just another Botble CMS site',NULL,NULL),(11,'theme-ripple-seo_description','With experience, we make sure to get every project done very fast and in time with high quality using our Botble CMS https://1.envato.market/LWRBY',NULL,NULL),(12,'theme-ripple-copyright','©%Y Your Company. All rights reserved.',NULL,NULL),(13,'theme-ripple-favicon','general/favicon.png',NULL,NULL),(14,'theme-ripple-logo','general/logo.png',NULL,NULL),(15,'theme-ripple-website','https://botble.com',NULL,NULL),(16,'theme-ripple-contact_email','support@company.com',NULL,NULL),(17,'theme-ripple-site_description','With experience, we make sure to get every project done very fast and in time with high quality using our Botble CMS https://1.envato.market/LWRBY',NULL,NULL),(18,'theme-ripple-phone','+(123) 345-6789',NULL,NULL),(19,'theme-ripple-address','214 West Arnold St. New York, NY 10002',NULL,NULL),(20,'theme-ripple-cookie_consent_message','Your experience on this site will be improved by allowing cookies ',NULL,NULL),(21,'theme-ripple-cookie_consent_learn_more_url','/cookie-policy',NULL,NULL),(22,'theme-ripple-cookie_consent_learn_more_text','Cookie Policy',NULL,NULL),(23,'theme-ripple-homepage_id','1',NULL,NULL),(24,'theme-ripple-blog_page_id','2',NULL,NULL),(25,'theme-ripple-primary_color','#AF0F26',NULL,NULL),(26,'theme-ripple-primary_font','Roboto',NULL,NULL),(27,'theme-ripple-social_links','[[{\"key\":\"name\",\"value\":\"Facebook\"},{\"key\":\"icon\",\"value\":\"ti ti-brand-facebook\"},{\"key\":\"url\",\"value\":\"https:\\/\\/facebook.com\"}],[{\"key\":\"name\",\"value\":\"X (Twitter)\"},{\"key\":\"icon\",\"value\":\"ti ti-brand-x\"},{\"key\":\"url\",\"value\":\"https:\\/\\/x.com\"}],[{\"key\":\"name\",\"value\":\"YouTube\"},{\"key\":\"icon\",\"value\":\"ti ti-brand-youtube\"},{\"key\":\"url\",\"value\":\"https:\\/\\/youtube.com\"}]]',NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slugs`
--

DROP TABLE IF EXISTS `slugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slugs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slugs_reference_id_index` (`reference_id`),
  KEY `slugs_key_index` (`key`),
  KEY `slugs_prefix_index` (`prefix`),
  KEY `slugs_reference_index` (`reference_id`,`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slugs`
--

LOCK TABLES `slugs` WRITE;
/*!40000 ALTER TABLE `slugs` DISABLE KEYS */;
INSERT INTO `slugs` VALUES (1,'homepage',1,'Botble\\Page\\Models\\Page','','2024-04-11 00:42:49','2024-04-11 00:42:49'),(2,'blog',2,'Botble\\Page\\Models\\Page','','2024-04-11 00:42:49','2024-04-11 00:42:49'),(3,'contact',3,'Botble\\Page\\Models\\Page','','2024-04-11 00:42:49','2024-04-11 00:42:49'),(4,'cookie-policy',4,'Botble\\Page\\Models\\Page','','2024-04-11 00:42:49','2024-04-11 00:42:49'),(5,'galleries',5,'Botble\\Page\\Models\\Page','','2024-04-11 00:42:49','2024-04-11 00:42:49'),(6,'artificial-intelligence',1,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(7,'cybersecurity',2,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(8,'blockchain-technology',3,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(9,'5g-and-connectivity',4,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(10,'augmented-reality-ar',5,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(11,'green-technology',6,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(12,'quantum-computing',7,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(13,'edge-computing',8,'Botble\\Blog\\Models\\Category','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(14,'ai',1,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(15,'machine-learning',2,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(16,'neural-networks',3,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(17,'data-security',4,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(18,'blockchain',5,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(19,'cryptocurrency',6,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(20,'iot',7,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(21,'ar-gaming',8,'Botble\\Blog\\Models\\Tag','tag','2024-04-11 00:42:50','2024-04-11 00:42:50'),(22,'breakthrough-in-quantum-computing-computing-power-reaches-milestone',1,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(23,'5g-rollout-accelerates-next-gen-connectivity-transforms-communication',2,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(24,'tech-giants-collaborate-on-open-source-ai-framework',3,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(25,'spacex-launches-mission-to-establish-first-human-colony-on-mars',4,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(26,'cybersecurity-advances-new-protocols-bolster-digital-defense',5,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(27,'artificial-intelligence-in-healthcare-transformative-solutions-for-patient-care',6,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(28,'robotic-innovations-autonomous-systems-reshape-industries',7,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(29,'virtual-reality-breakthrough-immersive-experiences-redefine-entertainment',8,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(30,'innovative-wearables-track-health-metrics-and-enhance-well-being',9,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(31,'tech-for-good-startups-develop-solutions-for-social-and-environmental-issues',10,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(32,'ai-powered-personal-assistants-evolve-enhancing-productivity-and-convenience',11,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(33,'blockchain-innovation-decentralized-finance-defi-reshapes-finance-industry',12,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(34,'quantum-internet-secure-communication-enters-a-new-era',13,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(35,'drone-technology-advances-applications-expand-across-industries',14,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(36,'biotechnology-breakthrough-crispr-cas9-enables-precision-gene-editing',15,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(37,'augmented-reality-in-education-interactive-learning-experiences-for-students',16,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(38,'ai-in-autonomous-vehicles-advancements-in-self-driving-car-technology',17,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(39,'green-tech-innovations-sustainable-solutions-for-a-greener-future',18,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(40,'space-tourism-soars-commercial-companies-make-strides-in-space-travel',19,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(41,'humanoid-robots-in-everyday-life-ai-companions-and-assistants',20,'Botble\\Blog\\Models\\Post','','2024-04-11 00:42:50','2024-04-11 00:42:50'),(42,'sunset',1,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(43,'ocean-views',2,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(44,'adventure-time',3,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(45,'city-lights',4,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(46,'dreamscape',5,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(47,'enchanted-forest',6,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(48,'golden-hour',7,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(49,'serenity',8,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(50,'eternal-beauty',9,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(51,'moonlight-magic',10,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(52,'starry-night',11,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(53,'hidden-gems',12,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(54,'tranquil-waters',13,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(55,'urban-escape',14,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50'),(56,'twilight-zone',15,'Botble\\Gallery\\Models\\Gallery','galleries','2024-04-11 00:42:50','2024-04-11 00:42:50');
/*!40000 ALTER TABLE `slugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slugs_translations`
--

DROP TABLE IF EXISTS `slugs_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slugs_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs_id` bigint unsigned NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`lang_code`,`slugs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slugs_translations`
--

LOCK TABLES `slugs_translations` WRITE;
/*!40000 ALTER TABLE `slugs_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `slugs_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'AI',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(2,'Machine Learning',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(3,'Neural Networks',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(4,'Data Security',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(5,'Blockchain',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(6,'Cryptocurrency',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(7,'IoT',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50'),(8,'AR Gaming',NULL,'Botble\\ACL\\Models\\User',NULL,'published','2024-04-11 00:42:50','2024-04-11 00:42:50');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_translations`
--

DROP TABLE IF EXISTS `tags_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`tags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_translations`
--

LOCK TABLES `tags_translations` WRITE;
/*!40000 ALTER TABLE `tags_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_meta`
--

DROP TABLE IF EXISTS `user_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_meta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_meta_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_meta`
--

LOCK TABLES `user_meta` WRITE;
/*!40000 ALTER TABLE `user_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` bigint unsigned DEFAULT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT '0',
  `manage_supers` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pagac.randall@trantow.com',NULL,'$2y$12$a2stB5VbVbXP86qsdq4tkO9Z9klWI4SDjadxWpG4RhyFFkge14j3m',NULL,'2024-04-11 00:42:48','2024-04-11 00:42:48','Raphaelle','Spinka','admin',NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint unsigned NOT NULL DEFAULT '0',
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
INSERT INTO `widgets` VALUES (1,'RecentPostsWidget','footer_sidebar','ripple',0,'{\"id\":\"RecentPostsWidget\",\"name\":\"Recent Posts\",\"number_display\":5}','2024-04-11 00:42:54','2024-04-11 00:42:54'),(2,'RecentPostsWidget','top_sidebar','ripple',0,'{\"id\":\"RecentPostsWidget\",\"name\":\"Recent Posts\",\"number_display\":5}','2024-04-11 00:42:54','2024-04-11 00:42:54'),(3,'TagsWidget','primary_sidebar','ripple',0,'{\"id\":\"TagsWidget\",\"name\":\"Tags\",\"number_display\":5}','2024-04-11 00:42:54','2024-04-11 00:42:54'),(4,'CustomMenuWidget','primary_sidebar','ripple',1,'{\"id\":\"CustomMenuWidget\",\"name\":\"Categories\",\"menu_id\":\"featured-categories\"}','2024-04-11 00:42:54','2024-04-11 00:42:54'),(5,'CustomMenuWidget','primary_sidebar','ripple',2,'{\"id\":\"CustomMenuWidget\",\"name\":\"Social\",\"menu_id\":\"social\"}','2024-04-11 00:42:54','2024-04-11 00:42:54'),(6,'Botble\\Widget\\Widgets\\CoreSimpleMenu','footer_sidebar','ripple',1,'{\"id\":\"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu\",\"name\":\"Favorite Websites\",\"items\":[[{\"key\":\"label\",\"value\":\"Speckyboy Magazine\"},{\"key\":\"url\",\"value\":\"https:\\/\\/speckyboy.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Tympanus-Codrops\"},{\"key\":\"url\",\"value\":\"https:\\/\\/tympanus.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Botble Blog\"},{\"key\":\"url\",\"value\":\"https:\\/\\/botble.com\\/blog\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Laravel Vietnam\"},{\"key\":\"url\",\"value\":\"https:\\/\\/blog.laravelvietnam.org\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"CreativeBlog\"},{\"key\":\"url\",\"value\":\"https:\\/\\/www.creativebloq.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Archi Elite JSC\"},{\"key\":\"url\",\"value\":\"https:\\/\\/archielite.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}]]}','2024-04-11 00:42:54','2024-04-11 00:42:54'),(7,'Botble\\Widget\\Widgets\\CoreSimpleMenu','footer_sidebar','ripple',2,'{\"id\":\"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu\",\"name\":\"My Links\",\"items\":[[{\"key\":\"label\",\"value\":\"Home Page\"},{\"key\":\"url\",\"value\":\"\\/\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Contact\"},{\"key\":\"url\",\"value\":\"\\/contact\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Green Technology\"},{\"key\":\"url\",\"value\":\"\\/green-technology\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Augmented Reality (AR) \"},{\"key\":\"url\",\"value\":\"\\/augmented-reality-ar\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Galleries\"},{\"key\":\"url\",\"value\":\"\\/galleries\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}]]}','2024-04-11 00:42:54','2024-04-11 00:42:54');
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-11 14:42:55
