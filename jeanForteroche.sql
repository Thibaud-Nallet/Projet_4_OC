-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 14 sep. 2019 à 20:34
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
  `alert` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `date_creation`, `content`, `id_post`, `alert`) VALUES
(1, 2, '2019-09-14 22:21:07', 'Hâte de lire la suite !', 1, '0'),
(2, 2, '2019-09-14 22:21:29', 'Très bon début !', 2, '0'),
(3, 2, '2019-09-14 22:22:04', 'Votre essai est prometteur', 3, '0'),
(4, 2, '2019-09-14 22:22:33', 'Quelle bonne idée de publier en ligne ce roman', 4, '0'),
(5, 2, '2019-09-14 22:22:55', 'Quand publierez vous la suite ?', 5, '0'),
(6, 3, '2019-09-14 22:24:16', 'J\'adore l\'Alaska !', 1, '0'),
(7, 3, '2019-09-14 22:24:53', 'Votre écriture est particulière mais c\'est un bon début !', 2, '0'),
(8, 3, '2019-09-14 22:25:51', 'Un peu tirés par les cheveux parler d\'un meurtre pour finalement qu\'elle ne soit pas morte ?', 3, '0'),
(9, 3, '2019-09-14 22:26:14', 'Vivement la suite pour que l\'on comprenne ...', 4, '0'),
(10, 3, '2019-09-14 22:26:58', 'Dépêchez-vous de publier la suite !!!', 5, '0'),
(11, 4, '2019-09-14 22:31:00', 'Idée naze, titre naze ça m\'inspire rien', 1, '0'),
(12, 4, '2019-09-14 22:31:36', 'Bien ce que je disais vous pouvez vous arrêter là de publier', 5, '0'),
(13, 5, '2019-09-14 22:32:45', 'Vous êtes tout pourri comme auteur', 2, '1'),
(14, 5, '2019-09-14 22:33:12', 'NNNNNNNUUUUUUUUUULLLLLLLLLLLL', 1, '1');

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
(1, '2019-09-14 22:16:02', 1, 'Arrivé à la gare', '<p class=\"p1\">Le d&eacute;cor qui accueillit Guy et Harry cet apr&egrave;s-midi-l&agrave; &eacute;tait sinistre &agrave; souhait.</p>\r\n<p class=\"p1\">Durant les vingt minutes qu&rsquo;il leur fallut pour arriver en train &agrave; la gare d&rsquo;Anchorage, le temps avait fraichi &agrave; mesure que le cr&eacute;puscule gagnait. Comme on les avait inform&eacute;s que l&rsquo;incident s&rsquo;&eacute;tait produit sur le quai 1, ils s&rsquo;empress&egrave;rent de traverser le pont qui menait au quai suivant, o&ugrave; le train de 15h20 en provenance de Victoria Station &eacute;tait immobilis&eacute;, emp&ecirc;cher d&rsquo;atteindre sa destination. On avait transf&eacute;r&eacute; dans un autre train ses passagers en col&egrave;re ; pour eux, le drame qui s&rsquo;&eacute;tait d&eacute;roul&eacute; juste sous leur nez avait vite &eacute;t&eacute; &eacute;clips&eacute; par des histoires de rendez-vous manqu&eacute;s et de soupers refroidis.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">Un groupe d&rsquo;hommes se tenait sur le quai pr&egrave;s du dernier compartiment, dont un jeune employ&eacute; tenait la porti&egrave;re ouverte. Dans la foule de badauds en qu&ecirc;te de sensations fortes, Guy rep&eacute;ra le chef de gare, M. Manning, &agrave; la couleur vert fonc&eacute; de son costume et &agrave; son insigne en cuivre. Il s&rsquo;entretenait avec un homme coiff&eacute; d&rsquo;un feutre, qui devait &ecirc;tre un policier. Non loin de l&agrave;, trois cheminots en v&ecirc;tements de travail et casquettes conversaient &agrave; voix basse, les mains dans les poches.<span class=\"Apple-converted-space\">&nbsp;</span></p>'),
(2, '2019-09-14 22:17:02', 1, 'Rencontre avec l\'inspecteur', '<p class=\"p1\">Guy acc&eacute;l&eacute;ra le pas et interrompit la conversation d&rsquo;un ton qui se voulait autoritaire.</p>\r\n<p class=\"p1\">- Monsieur Manning, monsieur, dit-il en saluant les deux hommes, nous sommes les sergents Sullivan et Conlon de la police d&rsquo;Anchorage. C&rsquo;est le commissaire Jarvis qui nous as envoy&eacute;s. Que s&rsquo;est-il pass&eacute; ?<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">M. Manning consid&eacute;ra Guy d&rsquo;un air grave qui trahissait son inqui&eacute;tude. Il allait r&eacute;pondre quand il en fut emp&ecirc;ch&eacute; par le policier, qui ne prit pas la peine de se pr&eacute;senter et dont Guy apprit par la suite qu&rsquo;il s&rsquo;agissait de l&rsquo;inspecteur principal Vine, de la police de L&rsquo;East Sussex.</p>\r\n<p class=\"p1\">- Merci, sergent, mais nous avons pris l&rsquo;affaire en main. L&rsquo;ambulance est ici et le corps de la victime va &ecirc;tre enlev&eacute;, d&eacute;clara-t-il d&rsquo;un ton p&eacute;remptoire, en lissant sa moustache.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Tr&egrave;s bien, monsieur. Mais nous devons faire un rapport &agrave; notre chef, r&eacute;pliqua Guy d&rsquo;un air r&eacute;solu, et il avan&ccedil;a vers la porti&egrave;re ouverte devant laquelle un agent de la gare &eacute;tait post&eacute; pour tenir la foule &agrave; distance, tandis que l&rsquo;inspecteur Vine, dont la moustache sembla rebiquer un peu plus, reculait &agrave; contrecoeur pour les laisser passer.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">Ils scrut&egrave;rent l&rsquo;int&eacute;rieur de l&rsquo;&eacute;troit compartiment, o&ugrave; la vive lueur des lampes &agrave; gaz donna &agrave; Guy l&rsquo;impression qu&rsquo;il s&rsquo;agissait d&rsquo;une sc&egrave;ne de th&eacute;&acirc;tre &eacute;clair&eacute;e par des projecteurs.</p>'),
(3, '2019-09-14 22:17:28', 1, 'Est-elle morte ?', '<p class=\"p1\">L&agrave;, deux ambulanciers s&rsquo;occupaient de hisser une femme sur une civi&egrave;re. Elle portait encore son manteau de fourrure, ouvert sur une robe de cr&ecirc;pe noire &agrave; l&rsquo;ancienne mode et des bottines en cuir verni. Comme sa t&ecirc;te ballottait sur le c&ocirc;t&eacute;, Guy vit la bouche entrouverte, les cheveux en d&eacute;sordre et, sur sa tempe, une large tra&icirc;n&eacute;e de sang s&eacute;ch&eacute;.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">D&eacute;cid&eacute;ment, quel jour funeste pour les femmes en d&eacute;tresse, songea Guy.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Est-elle en vie ? murmura-t-il &agrave; Harry.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Je crois bien. Regarde.</p>\r\n<p class=\"p1\">Ils virent alors la femme lever une main en agitant faiblement les doigts. Les ambulanciers sortirent la civi&egrave;re du compartiment en se pr&eacute;parant &agrave; fendre la foule rassembl&eacute;e au-dehors.</p>\r\n<p class=\"p1\">Une fois qu&rsquo;ils furent partis, Guy et Harry mont&egrave;rent &agrave; l&rsquo;int&eacute;rieur.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Il y a du sang par terre, remarqua soudain Guy avec horreur.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">Harry regarda la tra&icirc;n&eacute;e de sang rouge fonc&eacute;, puis la place vide o&ugrave; la victime s&rsquo;&eacute;tait assise. A c&ocirc;t&eacute;, sur une palette en cuir &eacute;lim&eacute;e, un chapeau &eacute;tait pos&eacute;, ainsi qu&rsquo;un sac &agrave; main noir. Il y avait aussi un exemplaire pli&eacute; de l&rsquo;Illustrated London News sur la banquette, macul&eacute; de sang, comme si la victime avait voulu &eacute;tancher sa blessure &agrave; la t&ecirc;te. Une autre valise se trouvait sous le si&egrave;ge. Enfin, un n&eacute;cessaire de toilette bleu marine ouvert laissait entrevoir de la lingerie blanche. Sur le sol gisaient une paire de lunettes cass&eacute;e, les deux morceaux d&rsquo;un peigne bris&eacute; et une feuille de journal.<span class=\"Apple-converted-space\">&nbsp;</span></p>'),
(4, '2019-09-14 22:17:57', 1, 'Des traces d\'indices', '<p class=\"p1\">Guy inscrivit sur une liste chaque objet, dont l&rsquo;ensemble formait le r&eacute;sum&eacute; path&eacute;tique d&rsquo;une vie de femme. Il remarqua une autre grande tra&icirc;n&eacute;e de sang sur la paroi, l&agrave; o&ugrave; elle avait appuy&eacute; sa t&ecirc;te.</p>\r\n<p class=\"p1\">- Regarde dans son sac &agrave; main, dit Harry. Peut-&ecirc;tre d&eacute;couvrirons-nous qui elle &eacute;tait &hellip; Qui elle est, se reprit-il.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">Guy examina le contenu du sac &agrave; main : un porte-monnaie vide, un carnet o&ugrave; figuraient quelques notes<span class=\"Apple-converted-space\">&nbsp; </span>&eacute;crites au crayon noir qu&rsquo;il ne r&eacute;ussit pas &agrave; lire par manque de lumi&egrave;re, le billet de retour, et une carte d&rsquo;identit&eacute; identifiant la victime comme &eacute;tant Carrie A. Nelson, infirmi&egrave;re travaillant &agrave; l&rsquo;Alaska Native Medical Center.</p>\r\n<p class=\"p1\">- C&rsquo;est une enqu&ecirc;te criminelle, d&eacute;clara soudain Guy d&rsquo;un air effar&eacute;. Il s&rsquo;agit d&rsquo;un meurtre.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Doucement, dit Harry. Elle est encore en vie. Esp&eacute;rons qu&rsquo;elle s&rsquo;en sorte. Allons, nous ferions mieux de rejoindre les autres.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">A l&rsquo;ext&eacute;rieur r&eacute;gnait un certain d&eacute;sordre. Le passage des ambulanciers emportant le corps sur une civi&egrave;re avait provoqu&eacute; des remous dans la foule, une femme s&rsquo;&eacute;tait m&ecirc;me &eacute;vanouie. M. Manning se retrouva entour&eacute; de l&rsquo;inspecteur Vine, des deux agents de la gare r&eacute;pondant aux noms de Henry Duck et George Walters, ainsi que de Guy et Harry. Il y eut une discussion anim&eacute;e sur la suite &agrave; donner aux &eacute;v&eacute;nements, sans que rien n&rsquo;en sorte par manque d&rsquo;&eacute;coute de part et d&rsquo;autre.<span class=\"Apple-converted-space\">&nbsp;</span></p>'),
(5, '2019-09-14 22:18:20', 1, 'Trois suspects ...', '<p class=\"p1\">M. Manning s&rsquo;adressa alors &agrave; inspecteur Vine.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Allez-vous emporter les affaires de la dame, monsieur Vine ? Nous devons remettre ce train en circulation, sinon il y aura des retards sur cette ligne tout au long de la nuit.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">- Inspecteur principal Vine, monsieur Manning, le corrigea son interlocuteur. Je regrette, mais ce train fait dor&eacute;naveant partie de notre enqu&ecirc;te et tout ce qui s&rsquo;y trouve doit y rester.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">Guy &eacute;prouvait une sorte de malaise f&eacute;brile, comme si cette ignoble agression avait infest&eacute; l&rsquo;atmosph&egrave;re. Un peu &agrave; l&rsquo;&eacute;cart, les trois cheminots se contentaient de fumer en silence, les yeux fix&eacute;s au sol.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">L&rsquo;inspecteur Vine fit signe &agrave; Guy et &agrave; Harry d&rsquo;approcher.<span class=\"Apple-converted-space\">&nbsp;</span></p>\r\n<p class=\"p1\">Je dois emmener ces trois-l&agrave; jusqu&rsquo;&agrave; la gare. Ils sont mont&eacute;s &agrave; bord &agrave; Houston, pourtant ils n&rsquo;ont donn&eacute; l&rsquo;alerte qu&rsquo;&agrave; Wasilla. Ils pr&eacute;tendent qu&rsquo;au d&eacute;but, ils ont cru qu&rsquo;elle dormait, et ce n&rsquo;est qu&rsquo;&agrave; l&rsquo;arr&ecirc;t suivant qu&rsquo;ils ont vu qu&rsquo;elle avait le visage ensanglant&eacute;. Escortons-en un chacun. La gare n&rsquo;est qu&rsquo;&agrave; quelques minutes de marche. Mais soyez prudents, les gars, nous tenons peut-&ecirc;tre l&agrave; nos trois suspects.<span class=\"Apple-converted-space\">&nbsp;</span></p>');

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
(1, '2019-09-14 22:13:19', 'admin', '$2y$10$GyPJ9Y.fNuwJ15zKliwIYua1i9/TraPvKeMFqCtxuftBjYo1zCihW', 'admin@admin.com', 'admin'),
(2, '2019-09-14 22:20:09', 'Antoine', '$2y$10$VTundEokr8T4QU9VgXNqTe0LkEba.3wjfHI54kz0.tK09XCcz1sRK', 'antoine@hotmail.fr', 'user'),
(3, '2019-09-14 22:23:22', 'Megan', '$2y$10$g1.GFIOKNyfYsFPMtqv7DuWmJ06WqoJz.WhiGX/CL/xrCwFhB08Wq', 'megan@gmail.com', 'user'),
(4, '2019-09-14 22:30:15', 'Anthony', '$2y$10$7LepKRsxI0tUKkFAHFs9weLD3yglYVJxfvPy6xBXwqRD0aErnxOay', 'anthony@yahoo.com', 'user'),
(5, '2019-09-14 22:32:13', 'luc', '$2y$10$gf19wfhvtcRckA2XNsVoWuvuAWWkpOi7.PV.Y5fPurxZrFYXT8Y0q', 'luc@wanadoo.com', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
