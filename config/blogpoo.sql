-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 14 mars 2023 à 20:20
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogpoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `extrait` varchar(255) NOT NULL,
  `imgArticle` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `author`, `extrait`, `imgArticle`, `content`, `createdAt`) VALUES
(205, 'À la découverte de PHPStorm', 'logiciel', 'Farid', 'PHPStorm est un puissant environnement de développement intégré (IDE) pour le développement PHP.', 'img63ea23095fbae5.50890605.jpg', 'PHPStorm est un puissant environnement de développement intégré (IDE) pour le développement PHP. Il est construit sur la plate-forme IntelliJ IDEA, l&#039;un des IDE Java les plus populaires, et est spécifiquement conçu pour les développeurs web qui utilisent PHP, HTML, CSS et JavaScript. Le logiciel a été développé par JetBrains, une entreprise ayant une réputation pour la création d&#039;outils de développement de qualité supérieure. Dans cet article, nous allons faire une analyse approfondie de PHPStorm et explorer ses fonctionnalités et capacités.\r\n\r\nDébogage et tests\r\n\r\nLe débogage et les tests sont des parties cruciales du processus de développement et PHPStorm offre un soutien complet pour les deux. Le logiciel comprend un débogueur intégré qui vous permet de déboguer votre code en temps réel et de voir les valeurs de variables et les points d&#039;arrêt. De plus, le logiciel prend en charge les tests PHPUnit, ce qui vous permet de tester votre code et de vous assurer qu&#039;il fonctionne correctement avant de le déployer.\r\n\r\nIntégration de Git\r\n\r\nGit est l&#039;un des systèmes de contrôle de version les plus populaires pour les développeurs web et PHPStorm offre une intégration complète avec Git. Le logiciel comprend des fonctionnalités telles que la gestion de la source, le suivi des modifications et la gestion de branches, ce qui vous permet de travailler efficacement avec votre code sur Git. De plus, PHPStorm prend en charge la fonctionnalité de « Revert », qui vous permet de annuler rapidement les modifications que vous avez apportées à votre code.\r\n\r\nConclusion\r\n\r\nEn conclusion, PHPStorm est un IDE remarquable pour les développeurs PHP. Il offre une interface utilisateur propre et moderne, des fonctionnalités de développement avancées telles que l&#039;éditeur de code intelligent et le débogueur intégré, et une intégration complète avec Git. Si vous êtes un développeur PHP ou si vous travaillez sur des projets PHP, je vous recommande fortement d&#039;essayer PHPStorm. Vous ne serez pas déçu !\r\n\r\nInterface utilisateur et navigation\r\n\r\nL&#039;une des premières choses que vous remarquerez à propos de PHPStorm est son interface utilisateur propre et moderne. Le logiciel est conçu pour être facile à naviguer, avec une structure bien organisée qui facilite la recherche de ce dont vous avez besoin. La fenêtre principale est divisée en plusieurs panneaux, y compris un panneau Projet, un panneau Éditeur et un panneau Débogueur. Le panneau Projet est là où vous pouvez accéder à tous vos fichiers et répertoires de projet, tandis que le panneau Éditeur est là où vous écrirez votre code. Le panneau Débogueur est là où vous pouvez déboguer votre code et voir les résultats de votre session de débogage.\r\n\r\nFonctionnalités de l&#039;éditeur\r\n\r\nL&#039;éditeur de PHPStorm est l&#039;un des meilleurs du secteur. Il est bourré de fonctionnalités qui facilitent l&#039;écriture, le débogage et la gestion de votre code. Le logiciel prend en charge la coloration de code pour PHP, HTML, CSS et JavaScript, ce qui facilite la lecture et la compréhension de votre code. De plus, le logiciel comprend des fonctionnalités telles que le repli de code, l&#039;achèvement de code et le surlignage d&#039;erreur, ce qui vous aidera à écrire un code plus propre et plus efficient.\r\n\r\nLe logiciel comprend également un éditeur de code intelligent qui est capable de suggérer des complétions de code, des réfections automatiques et des correctifs rapides. L&#039;éditeur de code prend également en charge les modèles en direct, ce qui vous permet d&#039;insérer des extraits de code fréquemment utilisés dans vos projets. C&#039;est un énorme gain de temps et facilite la maintenance d&#039;un style de code cohérent dans tous vos projets.', '2023-02-13 12:46:17'),
(202, 'À la découverte de PHP', 'PHP', 'Farid', 'PHP (Hypertext Preprocessor) est un langage de programmation populaire utilisé pour développer des applications web.', 'img63e0d9c2c4b903.04080559.jpg', 'PHP (Hypertext Preprocessor) est un langage de programmation populaire utilisé pour développer des applications web. Il a été créé en 1994 et est depuis devenu l&#039;un des langages les plus populaires pour le développement web. PHP peut être utilisé pour créer des pages web dynamiques, interagir avec des bases de données et construire des applications web complexes.\r\n\r\nPHP est un langage de programmation interprété, ce qui signifie qu&#039;il n&#039;a pas besoin d&#039;être compilé avant d&#039;être exécuté. Au lieu de cela, le code PHP est exécuté sur le serveur et le résultat est envoyé sous forme de code HTML à un navigateur web. Cela permet aux développeurs de concevoir des applications web plus rapidement, car ils peuvent rapidement tester et effectuer des modifications sans avoir à recompiler le code.\r\n\r\nPHP est également considéré comme un langage facile à apprendre pour les développeurs débutants. Il a une syntaxe simple et intuitive, et de nombreux didacticiels et tutoriels en ligne disponibles pour aider les développeurs à démarrer rapidement. De plus, PHP est un langage open-source, ce qui signifie qu&#039;il est entièrement gratuit et accessible à tout le monde.\r\n\r\nUn des principaux avantages de PHP est sa compatibilité avec une variété de systèmes de gestion de bases de données, y compris MySQL, Oracle et Microsoft SQL Server. Cela permet aux développeurs de construire des applications web interactives en utilisant des bases de données pour stocker et gérer les données utilisateur. PHP offre également une grande quantité de fonctionnalités pour travailler avec des bases de données, telles que la connexion, la sélection, l&#039;insertion et la mise à jour de données.\r\n\r\nEn plus de sa compatibilité avec les bases de données, PHP est également compatible avec de nombreux systèmes d&#039;exploitation et serveurs web, notamment Windows, Linux et Unix. Cela signifie que les développeurs peuvent utiliser PHP pour construire des applications web sur une variété de plateformes, sans avoir à s&#039;inquiéter des incompatibilités.\r\n\r\nPHP est également un langage de programmation très sécurisé. Il inclut de nombreuses fonctionnalités de sécurité intégrées pour protéger les applications web contre les attaques telles que les injections SQL, les attaques XSS et les attaques CSRF. Cependant, il est important de noter que la sécurité dépend en grande partie de la manière dont les développeurs implémentent les fonctionnalités de sécurité dans leur code.', '2023-02-06 11:43:14'),
(203, 'À la découverte de SYMFONY', 'SYMFONY', 'Farid', 'Symfony est un framework PHP open source utilisé pour développer des applications web complexes. ', 'img63e0da010ed8e4.39218923.jpg', 'Symfony est un framework PHP open source utilisé pour développer des applications web complexes. Il a été créé en 2005 et est devenu un des frameworks PHP les plus populaires et fiables pour les développeurs web. Symfony permet aux développeurs de gagner du temps et de l&#039;efficacité en leur fournissant des outils prêts à l&#039;emploi pour développer des applications web, tels que des formulaires, des URL définies par l&#039;utilisateur, des mécanismes de sécurité et bien plus encore. Avantages de Symfony: Flexibilité: Symfony offre une grande flexibilité pour les développeurs, leur permettant de personnaliser leurs applications en fonction de leurs besoins spécifiques. Scalabilité: Symfony peut gérer les applications de petite à grande échelle, ce qui en fait un choix idéal pour les entreprises en croissance. Performance: Symfony est optimisé pour la performance, ce qui signifie que les applications développées avec ce framework sont rapides et réactives. Sécurité: Symfony inclut des mécanismes de sécurité robustes pour protéger les applications contre les attaques. Comment développer une application avec Symfony: Planification: Les développeurs doivent planifier leur application en déterminant les fonctionnalités nécessaires, la structure de la base de données et la conception générale. Installation de Symfony: Les développeurs doivent installer Symfony sur leur ordinateur en utilisant les instructions de l&#039;installation fournies sur le site web de Symfony. Création d&#039;un projet: Les développeurs peuvent créer un nouveau projet en utilisant la commande symfony new sur leur terminal. Configuration de la base de données: Les développeurs doivent configurer leur base de données en utilisant les paramètres de configuration fournis dans le fichier .env du projet. Développement du code: Les développeurs peuvent développer leur application en utilisant les composants de Symfony pour les formulaires, les URL définies par l&#039;utilisateur, les vues et bien plus encore. Test et débogage: Les développeurs doivent tester leur application pour s&#039;assurer qu&#039;elle fonctionne correctement et corriger toutes les erreurs éventuelles. Mise en production: Une fois l&#039;application développée et testée, les développeurs peuvent la mettre en production pour qu&#039;elle soit accessible au public. Conclusion: Symfony est un framework PHP open source puissant et populaire pour le développement d&#039;applications web complexes. Il offre aux développeurs une grande flexibilité, une scalabilité, une performance optimisée et une sécurité renforcée. Les développeurs peuvent suivre les étapes de planification, d&#039;installation, de création de projet, de configuration de la base de données, de développement de code, de test et de débogage et de mise en production pour développer une application avec Symfony. En fin de compte, Symfony peut être un outil précieux pour les développeurs web qui souhaitent développer des applications web robustes et fiables. De plus, Symfony a une communauté active et une documentation complète, ce qui aide les développeurs à résoudre rapidement les problèmes rencontrés lors du développement. C&#039;est pourquoi Symfony est un choix populaire pour les grandes entreprises, les gouvernements et les organisations à but non lucratif, car il leur permet de développer des applications fiables et évolutives.\r\n', '2023-02-06 11:44:17'),
(204, 'À la découverte de MySQL', 'MySQL', 'Farid', 'MySQL est un système de gestion de bases de données relationnelles (RDBMS) populaire utilisé pour stocker et gérer les données sur un serveur. ', 'img63e0da318b5c53.92529426.jpg', 'MySQL est un système de gestion de bases de données relationnelles (RDBMS) populaire utilisé pour stocker et gérer les données sur un serveur. C&#039;est un logiciel open-source qui est gratuit et facile à utiliser pour les développeurs et les utilisateurs. Il est largement utilisé avec les langages de programmation tels que PHP, Python, Java, C#, etc. pour développer des applications web.\r\nMySQL utilise le langage SQL (Structured Query Language) pour interagir avec les bases de données. Avec SQL, vous pouvez créer des tables, insérer des données, mettre à jour des enregistrements, supprimer des enregistrements, exécuter des requêtes et effectuer d&#039;autres opérations sur les données.\r\nL&#039;un des avantages de MySQL est sa grande fiabilité et sa performance. Il est capable de gérer une grande quantité de données et peut être utilisé pour gérer des bases de données de petite à grande échelle. De plus, MySQL est très flexible et facile à personnaliser pour répondre aux besoins spécifiques de l&#039;application.\r\nMySQL est également très sécurisé et prend en charge de nombreuses fonctionnalités de sécurité pour protéger les données. Par exemple, il prend en charge les utilisateurs et les privilèges, ce qui permet de contrôler l&#039;accès aux données et aux opérations sur les données.\r\nEn conclusion, MySQL est un système de gestion de bases de données relationnelles populaire, fiable, performant et sécurisé. Il est facile à utiliser pour les développeurs et les utilisateurs et peut être utilisé pour développer des applications web de petite à grande échelle. Si vous êtes un développeur ou un utilisateur à la recherche d&#039;un système de gestion de bases de données, MySQL est une excellente option à considérer.', '2023-02-06 11:45:05'),
(232, 'testtest', 'testtest', 'test', 'testest', 'img64049df22ef1d1.58060041.JPG', 'testvrvjbvkise', '2023-03-05 14:49:38');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `is_validate` tinyint(1) NOT NULL DEFAULT '0',
  `articleId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `content`, `email`, `createdAt`, `is_validate`, `articleId`) VALUES
(7, 'Farid', 'MySQL....je ne suis pas très fan pour ma part', 'fridfrix@icloud.com', '2023-03-04 20:21:33', 1, 204),
(6, 'Farid', 'c&#039;est trop bien PHP Storm !!!!', 'fridfrix@icloud.com', '2023-03-04 20:21:02', 1, 205),
(8, 'Farid', 'Hâte d&#039;apprendre Symfony!!', 'fridfrix@icloud.com', '2023-03-04 20:21:51', 1, 203),
(9, 'Frix', 'test ajout commentaire', 'fridfrix@icloud.com', '2023-03-05 14:24:05', 1, 205);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mdp`, `is_admin`) VALUES
(66, 'farid', 'farid.t@goldnstudio.com', '$2y$10$EdvmnkcCbv/O3lMBcYlwGuQjiC29shg4p6beFL5HaJ7WqdeXcphtG', 1),
(80, 'frix', 'fridfrix@icloud.com', '$2y$10$vo5YJhMqz2MtZehBkkUo2u47G0wkX0V7LyJlNZdpsoXHNt/rMYrtS', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`articleId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
