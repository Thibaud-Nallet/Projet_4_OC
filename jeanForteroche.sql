-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 10 sep. 2019 à 10:25
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeanForteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `content` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `alert` varchar(100) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `date_creation`, `content`, `id_post`, `alert`) VALUES
(1, 1, '2019-09-08 22:54:52', 'Bonjour', 2, 'false'),
(2, 4, '2019-09-08 22:55:26', 'Super', 3, 'true'),
(3, 4, '2019-09-08 22:55:47', 'Hate de voir la fin', 1, 'false'),
(4, 8, '2019-09-08 22:56:09', 'Super ce blog', 2, 'false'),
(5, 8, '2019-09-08 22:56:19', 'J\'adore les requetes sql', 2, 'false'),
(6, 8, '2019-09-08 22:56:49', 'Reste plus que 800 pages à écrire', 1, 'false'),
(7, 1, '2019-09-09 11:52:41', 'Essai de com', 2, 'false'),
(8, 1, '2019-09-09 11:52:47', 'Essai de com 2', 2, 'false');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `date_creation`, `id_author`, `title`, `content`) VALUES
(1, '2019-08-30 13:30:00', 1, 'Le premier article de mon blog', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum !<br /><br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<br /><br />At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.<br /><br />Suspendisse potenti. Vestibulum volutpat. Proin semper, dolor eu porttitor scelerisque, risus dui vehicula justo, id vulputate quam ante vel ipsum. Pellentesque id neque nec ligula elementum aliquet. Maecenas venenatis tortor ut quam faucibus ornare. Donec mollis eros. Mauris magna pede, vehicula eget, molestie ac, vehicula sed, orci. Morbi pharetra urna at eros. Donec cursus dui luctus nulla. Curabitur malesuada justo in libero. In erat diam, sagittis quis, dictum at, ultrices eget, enim. <br /><br />Mauris euismod ante ac turpis. Donec ante ante, tincidunt sit amet, laoreet rutrum, lacinia at, sem. Nam et nunc vitae dui posuere sodales. Aliquam vel erat. Vestibulum condimentum laoreet quam. Suspendisse viverra velit at lorem. Vestibulum suscipit interdum purus. Suspendisse ut enim vitae risus blandit dignissim. Sed facilisis, odio vitae aliquam ullamcorper, elit arcu hendrerit velit, vitae pretium eros lorem luctus lectus. Aliquam non nisl. Nulla facilisi. Maecenas non tellus. Praesent ipsum nisi, lobortis non, posuere non, ultrices in, lacus. Phasellus lobortis euismod nibh. Vivamus sollicitudin velit sed felis. Suspendisse commodo augue quis dui. Suspendisse porttitor odio sed nisl lacinia gravida. Ut tincidunt, velit et tempor pulvinar, mi urna venenatis diam, in ultrices lacus nibh eu libero.</p>'),
(2, '2019-08-30 15:00:00', 1, 'Article 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<br /><br />At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.<br /><br />Suspendisse potenti. Vestibulum volutpat. Proin semper, dolor eu porttitor scelerisque, risus dui vehicula justo, id vulputate quam ante vel ipsum. Pellentesque id neque nec ligula elementum aliquet. Maecenas venenatis tortor ut quam faucibus ornare. Donec mollis eros. Mauris magna pede, vehicula eget, molestie ac, vehicula sed, orci. Morbi pharetra urna at eros. Donec cursus dui luctus nulla. Curabitur malesuada justo in libero. In erat diam, sagittis quis, dictum at, ultrices eget, enim. <br /><br />Mauris euismod ante ac turpis. Donec ante ante, tincidunt sit amet, laoreet rutrum, lacinia at, sem. Nam et nunc vitae dui posuere sodales. Aliquam vel erat. Vestibulum condimentum laoreet quam. Suspendisse viverra velit at lorem. Vestibulum suscipit interdum purus. Suspendisse ut enim vitae risus blandit dignissim. Sed facilisis, odio vitae aliquam ullamcorper, elit arcu hendrerit velit, vitae pretium eros lorem luctus lectus. Aliquam non nisl. Nulla facilisi. Maecenas non tellus. Praesent ipsum nisi, lobortis non, posuere non, ultrices in, lacus. Phasellus lobortis euismod nibh. Vivamus sollicitudin velit sed felis. Suspendisse commodo augue quis dui. Suspendisse porttitor odio sed nisl lacinia gravida. Ut tincidunt, velit et tempor pulvinar, mi urna venenatis diam, in ultrices lacus nibh eu libero. '),
(3, '2019-09-07 08:59:36', 1, 'Test d\'envoi', '<p>J\'envoie un nouveau texte avec <strong><em>TinyMCE</em></strong> ?????</p>');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `statut` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `date_inscription`, `pseudo`, `pass`, `email`, `statut`) VALUES
(1, '2019-08-30 13:00:00', 'Thibaud', '1234', 'thibaud.nallet@gmail.com', 'admin'),
(2, '2019-08-30 15:00:00', 'Commenteur', '1234', 'commenteur@gmail.com', 'user'),
(3, '2019-09-01 00:00:00', 'testmyadmin', '1234', 'coucou@gmail.com', 'user'),
(4, '2019-09-01 00:00:00', 'testreq', 'az', 'hello@yahoo.co', 'user'),
(5, '2019-09-02 00:00:00', 'Essai page', 'azerty', 'antoine@yahoo.fr', 'user'),
(6, '2019-09-03 00:00:00', 'essai', 'oups', 'test5@essai.fr', 'user'),
(7, '2019-09-03 21:43:04', 'CC', 'cc', 'cc@cc.fr', 'user'),
(8, '2019-09-04 23:26:03', 'Megan', 'qwerty', 'megan.amate@gmail.com', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_ibfk_1` (`id_author`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
