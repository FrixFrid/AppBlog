-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 26 jan. 2023 à 13:44
-- Version du serveur :  5.7.34
-- Version de PHP : 8.1.12

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
(178, 'À la découverte de PHP', 'PHP', 'Farid', 'PHP est un langage de programmation populaire utilisé pour développer des sites web dynamiques. Il est facile à apprendre pour les débutants et offre une grande flexibilité pour les développeurs expérimentés.', 'istockphoto-1297752994-170667a.jpgistockphoto-1297752994-170667a.jpgimage/jpeg/Applications/MAMP/tmp/php/phphv23IL074515', 'PHP est un langage de programmation populaire utilisé pour développer des sites web dynamiques. Il est facile à apprendre pour les débutants et offre une grande flexibilité pour les développeurs expérimentés. PHP est un outil puissant pour les développeurs web qui souhaitent ajouter une interactivité accrue à leur site, telle que la gestion de formulaires en ligne, la création de forums et de systèmes de gestion de contenu (CMS).\r\n\r\nHistoire de PHP:\r\n\r\nPHP a été créé en 1994 par Rasmus Lerdorf. Au départ, il était utilisé pour maintenir son propre curriculum vitae en ligne, mais au fil du temps, il s&#039;est développé pour devenir un langage de programmation complet pour le développement web. Depuis lors, PHP a évolué pour devenir un des langages de programmation les plus populaires pour les sites web dynamiques.\r\n\r\nPourquoi choisir PHP:\r\n\r\nPHP offre plusieurs avantages pour les développeurs web, notamment :\r\n\r\nFacilité d&#039;apprentissage: PHP est un langage de programmation simple et facile à apprendre pour les débutants.\r\n\r\nGrande communauté: PHP a une grande communauté de développeurs expérimentés qui peuvent aider les développeurs débutants à résoudre des problèmes et à améliorer leurs compétences.\r\n\r\nInteropérabilité avec d&#039;autres technologies: PHP est compatible avec de nombreuses autres technologies telles que HTML, CSS, JavaScript et MySQL, ce qui facilite la création de sites web complexes.\r\n\r\nLarge choix de frameworks et de bibliothèques: PHP offre un large choix de frameworks et de bibliothèques pour les développeurs, ce qui les aide à développer des sites web plus rapidement et de manière plus efficace.\r\n\r\nComment développer un site web avec PHP:\r\n\r\nPour développer un site web avec PHP, les développeurs doivent suivre les étapes suivantes :\r\n\r\nPlanification: Les développeurs doivent planifier leur site web en déterminant les fonctionnalités nécessaires, la structure de la base de données et la conception générale.\r\n\r\nDéveloppement de la base de données: Les développeurs doivent développer une base de données pour stocker les données du site web.\r\n\r\nDéveloppement du code: Les développeurs doivent développer le code PHP pour le site web en utilisant des fonctionnalités telles que les formulaires, les pages dynamiques et les scripts de base de données.\r\n\r\nTest et débogage: Les développeurs doivent tester leur site web pour s&#039;assurer qu&#039;il fonctionne correctement et corriger toutes les erreurs éventuelles.\r\n\r\nMise en ligne: Une fois le site web développé et testé, les développeurs peuvent le mettre en ligne pour qu&#039;il soit accessible au public.\r\nConclusion:\r\n\r\nPHP est un langage de programmation populaire et puissant pour le développement de sites web dynamiques. Il offre de nombreux avantages pour les développeurs, tels que la facilité d&#039;apprentissage, une grande communauté et une interopérabilité avec d&#039;autres technologies. Les développeurs peuvent suivre les étapes de planification, de développement de la base de données, de développement du code, de test et de débogage et de mise en ligne pour développer un site web avec PHP. En fin de compte, PHP peut être un outil précieux pour les développeurs web qui souhaitent développer des sites web interactifs et fonctionnels.', '2023-02-04 17:29:40'),
(179, 'À la découverte de SYMFONY', 'SYMFONY', 'Farid', 'Symfony est un framework PHP open source utilisé pour développer des applications web complexes. Il a été créé en 2005 et est devenu un des frameworks PHP les plus populaires et fiables pour les développeurs web.', 'symfony.jpgsymfony.jpgimage/jpeg/Applications/MAMP/tmp/php/phptVano00131018', 'Symfony est un framework PHP open source utilisé pour développer des applications web complexes. Il a été créé en 2005 et est devenu un des frameworks PHP les plus populaires et fiables pour les développeurs web. Symfony permet aux développeurs de gagner du temps et de l&#039;efficacité en leur fournissant des outils prêts à l&#039;emploi pour développer des applications web, tels que des formulaires, des URL définies par l&#039;utilisateur, des mécanismes de sécurité et bien plus encore.\r\n\r\nAvantages de Symfony:\r\n\r\nFlexibilité: Symfony offre une grande flexibilité pour les développeurs, leur permettant de personnaliser leurs applications en fonction de leurs besoins spécifiques.\r\n\r\nScalabilité: Symfony peut gérer les applications de petite à grande échelle, ce qui en fait un choix idéal pour les entreprises en croissance.\r\n\r\nPerformance: Symfony est optimisé pour la performance, ce qui signifie que les applications développées avec ce framework sont rapides et réactives.\r\n\r\nSécurité: Symfony inclut des mécanismes de sécurité robustes pour protéger les applications contre les attaques.\r\n\r\nComment développer une application avec Symfony:\r\n\r\nPlanification: Les développeurs doivent planifier leur application en déterminant les fonctionnalités nécessaires, la structure de la base de données et la conception générale.\r\n\r\nInstallation de Symfony: Les développeurs doivent installer Symfony sur leur ordinateur en utilisant les instructions de l&#039;installation fournies sur le site web de Symfony.\r\n\r\nCréation d&#039;un projet: Les développeurs peuvent créer un nouveau projet en utilisant la commande symfony new sur leur terminal.\r\n\r\nConfiguration de la base de données: Les développeurs doivent configurer leur base de données en utilisant les paramètres de configuration fournis dans le fichier .env du projet.\r\n\r\nDéveloppement du code: Les développeurs peuvent développer leur application en utilisant les composants de Symfony pour les formulaires, les URL définies par l&#039;utilisateur, les vues et bien plus encore.\r\n\r\nTest et débogage: Les développeurs doivent tester leur application pour s&#039;assurer qu&#039;elle fonctionne correctement et corriger toutes les erreurs éventuelles.\r\n\r\nMise en production: Une fois l&#039;application développée et testée, les développeurs peuvent la mettre en production pour qu&#039;elle soit accessible au public.\r\n\r\nConclusion:\r\n\r\nSymfony est un framework PHP open source puissant et populaire pour le développement d&#039;applications web complexes. Il offre aux développeurs une grande flexibilité, une scalabilité, une performance optimisée et une sécurité renforcée. Les développeurs peuvent suivre les étapes de planification, d&#039;installation, de création de projet, de configuration de la base de données, de développement de code, de test et de débogage et de mise en production pour développer une application avec Symfony. En fin de compte, Symfony peut être un outil précieux pour les développeurs web qui souhaitent développer des applications web robustes et fiables.\r\n\r\nDe plus, Symfony a une communauté active et une documentation complète, ce qui aide les développeurs à résoudre rapidement les problèmes rencontrés lors du développement. C&#039;est pourquoi Symfony est un choix populaire pour les grandes entreprises, les gouvernements et les organisations à but non lucratif, car il leur permet de développer des applications fiables et évolutives.', '2023-02-04 18:25:28');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  'email' varchar(100),
  `createdAt` datetime NOT NULL,
  `is_validate` tinyint(1) NOT NULL DEFAULT '0',
  `articleId` int(11) NOT NULL,
      FOREIGN KEY (articleId) REFERENCES articles (id) ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `content`, `createdAt`, `is_validate`, `articleId`) VALUES
(276, 'Farid', 'pas mal l&#039;article', '2023-02-05 16:33:39', 1, 179),
(277, 'Farid', 'vraiment pas mal&#039; l&#039;article', '2023-02-05 16:35:50', 1, 179);

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
(73, 'FaridPasAdmin', 'webmaster@goldnstudio.com', '$2y$10$RTdhkRm0EV/pPdzu7R79l.gKgoeVZPb3f6jO9qT6h/5wlJfgXfHPe', 0),

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
  ADD KEY `FK_ARTICLES` (`articleId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
