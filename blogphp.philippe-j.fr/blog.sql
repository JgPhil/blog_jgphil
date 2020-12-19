-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mai 2020 à 08:29
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `validate` tinyint(1) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  `erasedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `content`, `createdAt`, `validate`, `post_id`, `visible`, `erasedAt`) VALUES
(139, 62, 'edzedz', '2020-05-05 13:13:25', 1, 21, 1, NULL),
(142, 62, 'blablabla', '2020-05-10 10:50:38', 1, 27, 0, NULL),
(143, 62, 'blablabla', '2020-05-10 10:51:29', 1, 27, 0, NULL),
(154, 62, 'J&#39;ai créé un objet picture qui me sera bien utile sur mes différentes vues', '2020-05-10 12:03:26', 1, 23, 0, '2020-05-12 14:17:51'),
(155, 52, 'Super ton nouvel article !', '2020-05-10 23:02:26', 1, 22, 1, NULL),
(156, 135, 'Coucou super', '2020-05-12 16:15:16', 0, 23, 0, '2020-05-12 14:17:51'),
(157, 135, 'Coucou super', '2020-05-12 16:15:27', 1, 23, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `createdAt`) VALUES
(1, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Coucou c\'est moi', '2020-04-30 15:22:30'),
(2, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'gsggsregsr', '2020-04-30 15:27:46'),
(3, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'gsggsregsr', '2020-04-30 15:29:00'),
(4, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'gtrjgritujgirjtsiogjtrgs', '2020-04-30 15:32:21'),
(5, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'erferferferf', '2020-04-30 15:34:02'),
(6, 'zfzef', 'jamingph@gmail.com', 674257229, 'ezdzfzfezef', '2020-04-30 15:34:32'),
(7, 'erferf', 'jamingph@gmail.com', 674257229, 'Coucou', '2020-04-30 15:39:48'),
(8, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Test', '2020-04-30 15:58:13'),
(9, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'ffgbtrgktrokgo', '2020-04-30 16:19:50'),
(10, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Coucou', '2020-04-30 16:21:23'),
(11, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Coucou lorem ipsum', '2020-04-30 16:23:48'),
(12, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Coucou', '2020-05-01 09:33:18'),
(13, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Coucou', '2020-05-01 09:38:33'),
(14, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'Coucou', '2020-05-01 09:40:04'),
(15, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'blablabla', '2020-05-01 14:41:54'),
(16, 'Orianne Jaming', 'jamingph@gmail.com', 674257229, 'Blablablabla', '2020-05-01 16:26:15'),
(17, 'Kevin', 'jamingph@gmail.com', 674257229, 'blablabla', '2020-05-01 16:54:05'),
(18, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'blabla\r\n', '2020-05-01 21:08:22'),
(19, 'Philippe Jaming', 'jamingph@gmail.com', 674257229, 'tests', '2020-05-22 13:38:29');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `name`, `post_id`, `user_id`) VALUES
(1, '1447626eeffc65a9be665c810be89f.jpg', 21, NULL),
(2, 'ChaletsEtCaviar.png', 22, NULL),
(3, 'actualités.png', 23, NULL),
(4, 'nas.jpg', 24, NULL),
(7, 'jus.jpg', 27, NULL),
(15, 'desktop.jpg', 31, NULL),
(16, 'glace.jpg', 32, NULL),
(23, 'Phil.png', NULL, 62),
(26, 'member1.jpeg', NULL, 52),
(52, 'Packages.png', 55, NULL),
(53, 'IMG_20180509.jpg', NULL, 140),
(54, 'flat,550x550,075,f.jpg', 61, NULL),
(57, 'oscar-mendoza-nathans-character-portrait-pixel-animated-large.gif', NULL, 161),
(58, 'Cali-gif.thumb.gif.edeb398583dc6bc23e7b6fdacc965e95.gif', NULL, 162),
(59, 'member2.png', NULL, 148);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lastUpdate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  `erasedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `heading`, `content`, `lastUpdate`, `user_id`, `visible`, `erasedAt`) VALUES
(21, 'Starting block', 'Le changement c&#39;est maintenant !', '  Après une carrière de plus de 15 ans en industrie, où les conditions de travail (horaires postées, pénibilité, motivation) avaient un impact négatif sur ma santé et sur ma vie familiale,  j’ai décidé de me réorienter  et de m&#39;&#39;épanouir professionnellement​ dans le secteur de l’informatique qui m&#39;intéresse depuis de nombreuses années. .\r\n\r\n  Après une longue période de réflexion, j’ai listé les différents domaines qui peuvent me convenir et j’ai effectué des enquêtes métiers approfondies. Ces recherches m’ont permis de mettre en évidence mon intérêt pour l’informatique. \r\n  En explorant le marché du travail et les profils les plus recherchés, je me suis intéressé au métier de Développeur web. J’ai ensuite poursuivi mes recherches et je me suis rendu au salon du Grand Est Numérique à Metz #GEN où j’ai pu assister à des conférences. J’ai ensuite décidé de me diriger vers la spécialisation du langage PHP, qui à défaut d&#39;être  récent , est un langage très utilisé à la fois sur le marché de l&#39;emploi local en entreprise et en tant que freelance.\r\n\r\n  Il y a actuellement une pénurie de développeurs Web en France, et je pense avoir les qualités nécessaires pour exercer cette activité. J’ai aidé mon épouse à créer son site Web en 2012 sur la plateforme WiX, j’ai trouvé ça très gratifiant de voir le résultat final, ainsi qu’à le mettre à jour et à l’améliorer régulièrement. \r\nAujourd&#39;hui j’acquière les compétences nécessaires à la création d&#39;un site Web complet. \r\nMa formation &#34;Développeur d&#39;application Spécialisation PHP/Symfony&#34; s&#39;étale du 04/11/2019 au 04/11/2020 avec au bout, un diplôme de niveau Bac+3/4.\r\nLa première étape pour entamer cette formation sereinement est de définir ma stratégie d&#39;apprentissage, mes objectifs. \r\nC&#39;est chose faite à travers le projet n°1: &#34;Définissez votre stratégie d&#39;apprentissage&#34;. validé le 23 Novembre 2019.\r\n\r\nLe programme des semaines à venir: HTML , CSS et connaissances générales sur le Web pour me préparer au projet 2! \r\n...', '2020-05-14 17:28:49', 62, 1, NULL),
(22, 'Chalets & Caviar', 'Montagne, Luxe et Wordpress', 'Pour ce premier défi, le sujet est le suivant:  Créer un projet de site Web pour une agence immobilière de location de chalets à Courchevel. Rien que ça !\r\nAu programme donc: \r\nCréation de deux sections distinctes pour les ventes et les locations. Une page par chalet avec ses détails.\r\nUne section contact avec un formulaire .\r\nchoix d&#39;un thème Wordpress adapté, création d&#39;une identité visuelle (typographie, couleurs) et intégration sur les différentes pages.\r\nLe design du site est épuré et chic, mais je l’ai mis en contraste avec des couleurs chaudes qui rappellent les essences de bois que l’on retrouve dans les chalets.\r\nCréation de comptes utilisateurs avec différents privilèges .\r\nHébergement du site.\r\nCe premier projet m&#39;a permis d&#39;avoir un aperçu des possibilités offertes par Wordpress, un CMS puissant permettant aux quasi-néophytes de pouvoir mettre en place un site assez rapidement. J&#39;ai également  approfondi mes connaissances en CSS pour personnaliser le site.\r\nProjet validé le Jeudi 28 Novembre 2019.\r\n', '2020-05-09 21:19:24', 62, 1, NULL),
(23, 'Festival de films', 'On tourne!', 'Troisième projet de cette formation: Analysez les besoins de votre client pour son festival de films.\r\nIci, le but est de bien identifier les attentes du client et des utilisateurs futurs, grâce à une étude préalable. Quelles sont les fonctionnalités essentielles pour ce type de site Web? De quoi le client a-t-il réellement besoin? Ces questions essentielles à tout projet guident l&#39;analyse lors de la rédaction du cahier des charges.\r\nAprès cette réflexion, le projet de site Web est présenté sous forme de pages statiques HTML avec la mise forme CSS prédéfinie au client pour validation ou d&#39;éventuelles corrections/ajustements.\r\nCe travail a été très instructif dans l&#39;apprentissage de CSS, et cela m&#39;a également permis de faire connaissance avec Bootstrap.\r\nProjet validé le 3 Janvier 2020.\r\n\r\nProchaine étape du parcours: On laisse un peu le frontend de coté et on va s&#39;intéresser aux bases de données, ainsi quà la représentation conceptuelle de l&#39;application grâce aux schémas UML.', '2020-05-14 17:48:52', 62, 1, NULL),
(24, 'Article n°4', 'LE quatrième article !!!!!', 'Lorem Elsass ipsum semper réchime Carola Spätzle non rucksack risus, ac Strasbourg eget schnaps messti de Bischheim morbi Oberschaeffolsheim varius kartoffelsalad Oberschaeffolsheim Heineken munster sed so placerat Racing. purus adipiscing gewurztraminer mamsell quam. commodo Miss Dahlias consectetur senectus Kabinetpapier vielmols, libero, Verdammi Chulia Roberstau und tristique rossbolla tchao bissame Richard Schirmeck barapli aliquam id Salut bisamme Gal ! kuglopf amet flammekueche id, mollis sagittis ornare geïz Salu bissame DNA, gal Hans ftomi! météor Huguette turpis, hop salu hopla nullam leo amet, turpis Morbi Gal. libero, wurscht suspendisse baeckeoffe lacus mänele vulputate dignissim auctor, kougelhopf gravida ornare schpeck merci vielmols geht&#39;s blottkopf, Wurschtsalad bredele pellentesque chambon knack hopla sed tellus et leverwurscht bissame Yo dû. dolor knepfle Mauris quam, non libero. porta yeuh. ante nüdle Coopé de Truchtersheim sit Christkindelsmärik habitant wie tellus schneck rhoncus picon bière lotto-owe hopla amet sit ch&#39;ai in, eleifend ullamcorper Chulien Pellentesque condimentum leo  hoplageiss hopla jetz gehts los s&#39;guelt dui elit sit Pfourtz !', '2020-05-08 11:28:06', 62, 0, '2020-05-12 14:17:51'),
(26, 'Article n°6', 'Test', 'Je galère un peu là  avec les images;)', '2020-05-08 14:47:27', 62, 0, '2020-05-12 14:17:51'),
(27, 'Article n°7', 'article 7', 'nrihgru itnezs pirtu  gvbnz  sr tbnvhnd   forefpok p orek   ork êgk riozjetrgj tre tigj tt tijgi tjg tigotrgk,', '2020-05-08 11:27:39', 62, 0, '2020-05-12 14:17:51'),
(31, 'Article n°8', 'Mon 8ème article', 'gk,zogznsrengpisendrgnbvpsldfnv rns nrij ngngr ngrng  ,, rg, rg oeg,k r r ;rgr lpmelr ll  per; kger ;$z^lsd;f,rvoepz,j,gf ep rng, epgr,n,;; rprg ', '2020-05-08 10:46:52', 62, 0, '2020-05-12 14:17:51'),
(32, 'Je rajoute mes images', 'Les images , c&#39;est pas un petit morceau', 'Je pensais pas galérer autant avec la gestion des images, entre la gestion en base, l&#39;affichage , le traitement par le controller, il y a du taf ^^!', '2020-05-08 10:49:04', 62, 0, '2020-05-12 14:17:51'),
(55, 'Express food', 'C&#39;est dans la boite', 'Quatrième projet de cette formation: la conception d&#39;une base de données d&#39;une application de restauration rapide “Expressfood”.\r\nL’objectif est de concevoir une solution adaptée aux attentes des différents acteurs impliqués.\r\n\r\nPour cela J’ai dans un premier temps effectué une analyse de l&#39;application grâce à des schémas “UML”, un langage de modélisation graphique, qui permet d’expliquer les modèles objets à travers un ensemble de diagrammes. Cette première étape permet de bien identifier les besoins des utilisateurs.\r\n \r\nAprès avoir posé les bases du cadrage, j&#39;ai créé une base de donnée avec les différentes tables nécéssaires. A savoir:\r\n- les plats du jour\r\n- les desserts\r\n- les plats\r\n- les livreurs \r\n- stocks livreurs\r\n- adresses\r\n- utilisateurs\r\n- commandes\r\n\r\n\r\nRestait ensuite à définir tout les champs des tables avec leur type de valeur et relier les tables entre elles .\r\nCette partie est la plus délicate car il faut bien se questionner sur les futures requètes SQL et sur les besoins de l&#39;application.\r\n\r\nUne fois ce travail effectué, il ne reste plus qu&#39;à remplir la base de donnée ! ', '2020-05-14 17:45:42', 62, 1, NULL),
(61, 'Blog PHP', 'Programmation', 'A l&#39;heure où j&#39;écris ces lignes, je suis en train de finir le projet 5: Programmer votre premier blog en PHP.\r\n\r\nC&#39;est le premier projet d&#39;une belle ampleur, où il faut non seulement mettre en oeuvre toutes connaissances acquises durant les 3 premiers projets, mais aussi la &#34;petite&#34; nouveauté : programmer toute l&#39;application en language en PHP et POO.\r\nGrâce à à PHP , je suis maintenant capable de programmer de petites applications et d&#39;intégrer de nouvelles fonctionnalités rapidement.\r\nDans ce projet, tout le code a été créé par moi-même sans l&#39;aide de framework.\r\nLa seule bibliothèque externe du nom de PHPMailer qui m&#39;a servie à gérer des emails a été intégrée avec &#34;Composer&#34;.\r\n\r\nIl m&#39;a fallu trois mois pour venir à bout de ce travail, en incluant toute la partie formation. Ce fût intense, mais le travail  a porté ses fruits, et je commence à être à l&#39;aise avec PHP. \r\nDans le prochain épisode, je vais créer un site communautaire, cette fois avec l&#39;aide de Symfony.\r\n', '2020-05-16 10:49:22', 62, 1, NULL),
(62, 'ferfe', 'erferf', 'erferf', '2020-05-22 14:59:31', 62, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `token` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`token`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`token`, `createdAt`, `user_id`) VALUES
('4e3d5e2bf1117f7b7725db213129ad76', '2020-05-22 13:30:28', 147),
('51a3123b75cd3d3be56d481e2dedc006', '2020-05-22 13:27:58', 146),
('9f781c43d8d25dc8bbed20d391c5e53b', '2020-05-22 13:17:57', 145),
('55a421143fb3fe52d612fc6e9736f07e', '2020-05-22 13:14:58', 144),
('04557da2b68663f302da95b833340e0e', '2020-05-22 13:12:47', 143);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  `erasedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `createdAt`, `role_id`, `activated`, `email`, `visible`, `erasedAt`) VALUES
(52, 'Alphonse', '$2y$10$P5WKLV06r47u8h4gdVFNeOq/GRu18vI14Kb6xJTmH3D9M51Bks.Zq', '2020-04-24 10:53:53', 1, 1, 'filtre67@gmail.com', 1, NULL),
(62, 'Phil', '$2y$10$NbCGuyQ5dRjnXA3PRUeHEeSCHmgyCe22alkRoYdshLcxZ3lXz3VFK', '2020-04-24 16:42:30', 1, 1, 'jamingph@gmail.com', 1, NULL),
(64, 'Ali', '$2y$10$hLuuGooxo/GUF29KGzE9fOwwVWZQs951BTpwQJjydjpjTTayLcdCS', '2020-04-24 16:57:49', 2, 1, 'jamingph@gmail.com', 1, NULL),
(65, 'Orianne', '$2y$10$bGnuS1Hs1g/TZ5/FFNYTJOeN3CQ2Luoc.518WL2rA/dNhHeO7HThe', '2020-04-24 17:04:44', 2, 0, 'jamingph@gmail.com', 0, '2020-05-12 14:17:51'),
(66, 'Loïcia', '$2y$10$XecsurrAFcZk.CdH9mMVceJKLJLJ14zGVBI9zB4XQt07e1LBjCScO', '2020-04-24 17:45:40', 1, 1, 'jamingph@gmail.com', 1, NULL),
(67, 'Solange', '$2y$10$71HQeoDzXimuILcsaWudte2nBHjt8cNHVLD8JvcxF5G89leHaDXa.', '2020-04-24 17:52:00', 2, 1, 'jamingph@gmail.com', 1, NULL),
(68, 'Jérome', '$2y$10$agkqaXdZItgtHrSS2qBQzeq2ATk.dikrl9iYrDHAfDHljZMICxAtC', '2020-04-25 15:52:27', 2, 0, 'jamingph@gmail.com', 1, NULL),
(71, 'Frido', '$2y$10$OWQdjpZHpso5A7jOq345LuWDe/bUOhISwVCNTXecTjzYmoKaTBqG2', '2020-04-25 17:53:41', 2, 1, 'jamingph@gmail.com', 1, NULL),
(73, 'Léonard', '$2y$10$VPQ8a7agFu9qJHyoKJDZwepSQpR3jxRqzxajbudEwBRYPLEofx6me', '2020-04-26 17:30:02', 2, 0, 'jamingph@gmail.com', 0, '2020-05-12 14:17:51'),
(74, 'Pascal', '$2y$10$kJE3zx.Jehqoa2D5.XWupONbjZZ9sxYEKl.aurRnarJVveTfC2.Zy', '2020-04-26 17:36:55', 1, 1, 'jamingph@gmail.com', 1, NULL),
(83, 'Charles', '$2y$10$doQ.JfnZWRVZQNk53rK9nez9fOQHK70J/w6crWBUfoAplPNL2fiz.', '2020-04-28 10:30:28', 2, 1, 'jamingph@gmail.com', 1, NULL),
(84, 'Nadia', '$2y$10$zKUMV9iVaq81lSe3FhfNXuTOsZAxRTNXcayu3hGV3lD3VyCHKzSDu', '2020-04-17 10:41:57', 2, 1, 'jamingph@gmail.com', 1, NULL),
(94, 'Henry', '$2y$10$2HY8RJ5UclMGGzos4jugjeO89M7AHWGhTWoOZ/OGOUqTYbEjItItK', '2020-04-18 14:07:22', 2, 0, 'jamingph@gmail.com', 1, NULL),
(95, 'Gregory', '$2y$10$VtjF/mpj2jkfynLm5WFCO./erV92kAr5IsjAqpItFkMQDcEhidinm', '2020-04-28 15:17:15', 2, 0, 'jamingph@gmail.com', 0, NULL),
(96, 'Jared', '$2y$10$HeY05F/YmdDWqanNwQKviudZdmFYmksihheGwycQuXRmE5ntk3TzG', '2020-04-28 15:21:48', 2, 0, 'jamingph@gmail.com', 0, NULL),
(115, 'Roger', '$2y$10$/5oI6z5nYF8jwqeTgFJURuoM/Z8JlIfbI69.VCI9q9iuqg1W8tDP6', '2020-05-01 13:19:16', 2, 1, 'jamingph@gmail.com', 0, NULL),
(116, 'Kevin', '$2y$10$53WwbKUMQvkrfaV0JW7VHeX9lg84LpqH4HWvmuSyNuZlolEbaHvnG', '2020-05-01 18:51:03', 2, 1, 'jamingph@gmail.com', 0, NULL),
(117, 'Tarah', '$2y$10$ippKQGAKU6j71ksMR6BoPOES/4SzWTr5PlC7YaWkOtQVxrrdhYvI.', '2020-05-04 19:19:24', 2, 1, 'jamingph@gmail.com', 0, NULL),
(120, 'Sarah', '$2y$10$XzQrx.C//QWMHAu33Ak4ReMcgoIs96IzC4IsQS2boKPMXlboa/30K', '2020-05-05 12:05:40', 2, 1, 'jamingph@gmail.com', 1, NULL),
(134, 'Max', '$2y$10$E8c5xTNHFtrA6frRNSp2NewlLo5Uh.hWwM8eH5vzfkDS5a0GEuL6y', '2020-05-08 16:38:58', 2, 1, 'jamingph@gmail.com', 1, NULL),
(135, 'Téa', '$2y$10$DqWTCUkP2Y/3/MzlCL8PROii2Of9aMVLjdZrJvyZVm36UqeH5ElZa', '2020-05-12 16:13:55', 2, 1, 'jamingph@gmail.com', 1, NULL),
(137, 'Charlie', '$2y$10$LMVkvWZrMvgq9weDtMGItuC4rU36vmCsEzk/nQxlZb4jqh3lW5fxm', '2020-05-12 16:37:15', 2, 0, 'jamingph@gmail.com', 1, NULL),
(138, 'Pascalle', '$2y$10$rve95k1pfj6XUuFYWKmi8.PE.TngZAobeZfrz4qbh6yPqPYxJo2Fm', '2020-05-12 16:45:08', 2, 1, 'jamingph@gmail.com', 1, NULL),
(139, 'Maxime', '$2y$10$xMf2QQUTzX2QWG9MPMPuWuUZyFF4AxkbetuNcCNxppBgk1OAQjNQO', '2020-05-13 11:33:27', 2, 1, 'jamingph@gmail.com', 1, NULL),
(148, 'Henriette', '$2y$10$K17eaEryDDpw21Hh2hpcfOEHeY0.CCjtliDxeUc3i5oa.valcCDS2', '2020-05-22 15:32:43', 2, 1, 'jamingph@gmail.com', 1, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
