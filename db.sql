-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 mars 2022 à 10:08
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `content_comment` text NOT NULL,
  `is_actived` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `comment_post0_FK` (`id_article`),
  KEY `comment_user_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `content_comment`, `is_actived`, `date_creation`, `date_update`, `id_user`, `id_article`) VALUES
(1, 'Très bon article !', 1, '2021-09-25 21:17:12', '2021-09-25 21:17:12', 4, 15),
(2, 'Excellent article !', 1, '2021-09-26 19:38:10', '2021-09-26 19:38:10', 1, 15),
(3, 'Vivement Windows 11 !', 1, '2021-09-27 06:16:50', '2021-09-27 06:16:50', 1, 15),
(4, 'Trop cool :)', 1, '2022-03-23 11:05:16', '2022-03-23 11:05:16', 17, 15),
(5, 'Test message', 1, '2022-03-25 14:09:22', '2022-03-25 14:09:22', 1, 21),
(6, 'Test user', 1, '2022-03-25 14:12:38', '2022-03-25 14:12:38', 17, 21);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `chapo` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `post_user_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_article`, `title`, `chapo`, `content`, `date_creation`, `date_update`, `id_user`) VALUES
(15, 'Windows 11 arrive bientôt !!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis tellus eu diam faucibus.', 'Proin dictum in ex in molestie. Vivamus vehicula metus massa, eu lobortis felis iaculis eget. Donec eu molestie nunc, porttitor malesuada nulla. Donec eget tortor quis justo pretium pellentesque. Pellentesque at justo est. Vestibulum interdum pretium nulla nec sollicitudin. Vivamus eget convallis mi. Vestibulum sed venenatis ligula. Donec nec aliquet nisi, a rutrum ante. Curabitur nibh diam, pulvinar eget lectus non, pellentesque luctus lectus. Pellentesque ac consectetur sem.\r\n\r\nProin condimentum justo et ligula blandit, non volutpat velit pretium. Mauris lorem elit, fermentum a pellentesque id, commodo eget turpis. Fusce in velit eget lorem porta bibendum eu non eros. Curabitur sodales, tellus sed convallis lobortis, diam metus scelerisque lacus, eu sodales lorem risus et ligula. Quisque aliquet dictum dui, sed varius urna sodales sed. Mauris rutrum, elit nec tempor volutpat, nisl orci aliquam lectus, sed bibendum turpis massa ut orci. Nunc rhoncus lacus et lacus dictum, sed efficitur lorem lacinia. Nam congue nunc at arcu ornare, et hendrerit dolor pellentesque. Morbi tincidunt nibh quis augue gravida, at maximus elit tincidunt.\r\n\r\nDonec commodo gravida elit, vulputate fringilla quam pharetra nec. Vestibulum nec metus a risus pharetra ornare sed et nisi. Etiam in purus tempus nulla mattis vulputate. Aliquam ut turpis euismod, viverra magna quis, hendrerit velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer sapien massa, feugiat eget nisl et, vulputate posuere risus. Phasellus molestie lectus id purus ultrices ultricies. Sed in ornare nulla, a porttitor libero. Nam nec neque accumsan sem facilisis consequat eget at libero.\r\n\r\nPraesent feugiat dapibus massa, eget efficitur ipsum sagittis a. Quisque feugiat velit metus, quis laoreet quam mattis id. Cras at tincidunt urna, in tincidunt nulla. Duis mattis dictum libero non mollis. Aliquam id finibus purus. Proin eget felis porta, semper libero id, egestas ante. Aenean faucibus ligula a neque rhoncus, ac volutpat orci aliquet. Nunc commodo nulla in semper blandit. Ut quis ornare elit. Etiam eget nisi eget lectus congue sagittis. Ut porta mi mauris, a rhoncus metus gravida vitae. Vestibulum in sem mi.', '2021-09-24 21:15:24', '2021-09-24 21:15:24', 1),
(16, 'Kylian Mbappé se confie sur RMC', 'Son faux départ au Real Madrid, sa relation avec Messi, Mbappé nous dit tout.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus molestie urna a ultrices. Aliquam bibendum malesuada orci, ut elementum massa. Fusce sit amet justo et felis egestas euismod sed sit amet libero. Donec luctus ut nisl ac pulvinar. Cras facilisis in sem ac faucibus. Proin facilisis sem at tincidunt semper. Nam sed lacus nisl. Curabitur quis nunc pharetra, luctus mauris vulputate, sodales mauris. Maecenas elementum ac dui in malesuada. Ut et velit eget justo consectetur luctus. Sed iaculis nisi elit, sodales pulvinar quam finibus vitae. Sed tempus sit amet nisl quis pulvinar. Mauris efficitur mi nunc, in laoreet ante efficitur ut. Quisque pharetra risus eget ullamcorper ultricies. Mauris pellentesque ultricies ultricies.\r\n\r\nVestibulum a eros tincidunt, porttitor massa sed, blandit ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed eget suscipit neque, eget pulvinar elit. Donec vitae ipsum eros. In eu placerat justo. Suspendisse eget tincidunt ipsum. Pellentesque vel condimentum quam. Donec lacinia leo a turpis egestas suscipit. Quisque consequat ligula eu ante scelerisque, in posuere odio finibus. Integer aliquam odio et velit pellentesque, mollis tempor risus eleifend.\r\n\r\nNullam tempus neque massa, et euismod nulla feugiat sit amet. Quisque lorem risus, venenatis et varius a, tempor a est. Donec congue interdum risus. Nulla ac molestie sapien. Nam molestie efficitur libero, eu condimentum est facilisis et. Aenean eleifend semper vulputate. Integer elementum lacus id velit tempor elementum. Nam tincidunt vulputate nunc, vel consectetur magna facilisis et. Curabitur nunc nibh, mattis vitae pharetra eget, egestas faucibus nulla. Morbi ligula massa, condimentum eleifend elit vitae, sollicitudin fermentum lacus. Sed lacinia quam tellus, vitae luctus orci consequat quis.\r\n\r\nCurabitur a scelerisque risus. Nulla at sapien sit amet arcu viverra dapibus. Aliquam sagittis dui non consectetur feugiat. In varius porttitor cursus. Integer pulvinar molestie nulla sit amet vestibulum. Nam maximus, nibh non maximus facilisis, ante dui fermentum lorem, eget viverra nisi augue eget sapien. Vestibulum ac dapibus neque. Curabitur sit amet lobortis sem. Duis iaculis arcu at fringilla vestibulum. Integer sollicitudin diam a augue faucibus, nec interdum dolor efficitur. Vivamus fringilla molestie nunc, quis lacinia tellus vestibulum eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis non ex nulla. Maecenas blandit libero et nunc semper cursus. Vestibulum molestie eget orci quis tincidunt. Etiam a augue non dui euismod maximus sit amet et mauris.\r\n\r\nEtiam interdum nec turpis porttitor cursus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam gravida, ex a placerat auctor, lectus tortor semper est, ut lacinia enim nunc at felis. Sed vehicula eros ex, sed fermentum lacus accumsan vel. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer volutpat lectus vitae volutpat vestibulum. Pellentesque mi tellus, mollis ac rutrum at, laoreet ut mi. Fusce venenatis faucibus felis vitae sodales. Integer ornare quis nulla ac rhoncus. Sed ac bibendum ipsum, sed porttitor massa. In at lorem sit amet orci rhoncus sollicitudin eget vitae tellus. Vestibulum at massa varius, ultrices felis in, consectetur nisl. Sed ultrices blandit tristique. Mauris eros nunc, lobortis ut nunc sit amet, vestibulum dignissim leo.', '2021-10-07 08:31:44', '2021-10-07 08:31:44', 1),
(17, 'La Section Paloise l\'emporte à Perpignan', 'Après une victoire contre Montpellier au Hameau, Pau remporte une deuxième victoire consécutive. Allez Pau !', 'Fusce id scelerisque enim. Cras mauris sem, rhoncus vel dui ut, faucibus pellentesque nulla. Praesent eu scelerisque risus. Fusce sollicitudin dapibus mauris sit amet hendrerit. Phasellus metus sapien, varius eu elementum placerat, tincidunt commodo leo. Suspendisse tempor volutpat aliquet. Vivamus et ultricies nisl. Morbi justo nisi, efficitur porttitor sapien vel, fringilla pulvinar mi. In tempor mauris sed turpis finibus, eget gravida urna pellentesque. Curabitur dictum ante non quam molestie maximus. Sed egestas lectus sit amet porta congue. Morbi tempor cursus neque, a venenatis quam. Proin mattis in tellus at tristique. Duis sodales cursus nunc sed ullamcorper. Nullam molestie neque ligula, pretium ullamcorper tortor tincidunt feugiat. Vivamus semper nisi ac aliquet feugiat.\r\n\r\nMorbi consectetur lorem rhoncus justo suscipit mollis. Nam vel tempor mauris. Donec sit amet dolor metus. Sed malesuada odio ut dui imperdiet, vitae tincidunt arcu auctor. Suspendisse pharetra magna id nisi aliquet facilisis. Phasellus blandit tellus vitae bibendum fringilla. Morbi varius nibh eu vulputate tristique. Nam laoreet condimentum dignissim. Suspendisse nec aliquam ante. Nullam cursus tortor in erat lobortis rutrum vitae ac tellus. Donec eu dui lectus. Quisque consequat lobortis nunc eget suscipit. Duis eu vehicula metus. Morbi mollis diam eget orci blandit, quis feugiat risus vestibulum.\r\n\r\nSuspendisse condimentum leo ac enim pellentesque, ac posuere nunc fermentum. Suspendisse id tristique diam, vel gravida metus. Nullam ultricies augue mi, sed pharetra enim sagittis ac. Donec non neque accumsan, molestie lectus at, cursus dui. Sed at venenatis tortor, consequat rhoncus lacus. Cras massa neque, convallis id malesuada nec, commodo cursus ante. Sed libero dui, cursus commodo dui eu, semper commodo est. Mauris id mauris orci.\r\n\r\nFusce rutrum orci massa, ut pellentesque nibh dapibus sit amet. Etiam in imperdiet augue. Mauris in aliquet lorem. In vitae ultricies massa. Praesent vulputate quis leo sed ornare. Curabitur lorem erat, luctus at malesuada eu, pharetra eget velit. Proin nec urna in odio scelerisque mattis. Nunc sodales consequat ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque et dapibus odio, vel fermentum tortor. Suspendisse tincidunt leo et dolor hendrerit tristique. Suspendisse tincidunt consectetur ligula, vehicula interdum nisi fermentum at. Ut faucibus enim ligula, vel euismod nisi laoreet at. Vestibulum ut pretium risus. Pellentesque ut semper enim. Praesent at elit sit amet risus luctus suscipit quis sed mauris.', '2021-08-19 16:07:32', '2022-03-23 11:08:22', 1),
(18, 'Facebook touché par une panne mondiale', 'Facebook, Instagram et WhatsApp ont été victime d\'une panne mondiale ce lundi 7 octobre.', 'Mauris consequat purus eu neque facilisis, ultrices gravida lacus feugiat. Suspendisse potenti. Maecenas placerat lorem venenatis suscipit facilisis. In fermentum massa sit amet ultricies placerat. Donec varius vitae magna eget rutrum. Morbi non nisi et est rhoncus placerat. Pellentesque auctor mattis efficitur. Suspendisse auctor diam sed urna efficitur, quis pharetra libero tincidunt. Sed lectus sapien, pretium a sapien consequat, commodo facilisis nisi. Maecenas eu luctus felis.\r\n\r\nNunc dapibus mattis erat, nec gravida tortor dignissim eu. Etiam purus tellus, pellentesque ut odio et, tristique mattis ligula. Fusce mattis maximus venenatis. Phasellus erat ante, lobortis non neque vitae, pulvinar aliquet tellus. Aliquam erat volutpat. Sed scelerisque pretium feugiat. Fusce ultrices leo et velit pretium, in maximus metus eleifend. Curabitur lectus leo, egestas sit amet auctor ut, mollis sed enim. Proin ipsum arcu, lobortis in tincidunt at, aliquam et est. Donec blandit risus a turpis pulvinar, non commodo est volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vehicula nulla sed tellus sollicitudin dictum.\r\n\r\nSuspendisse at ante nunc. Donec vel eros laoreet, rhoncus felis ac, gravida justo. Aliquam consectetur blandit lobortis. Vestibulum sagittis, purus vitae sollicitudin egestas, dolor dolor scelerisque neque, ac cursus orci magna ut velit. Integer tempor lectus eu nisi placerat molestie. Mauris rhoncus eros elit, eu commodo metus luctus eget. Cras consectetur turpis sed vulputate fringilla. Quisque mollis hendrerit libero ac tempus. Integer aliquam ligula ut mattis sagittis. Nullam vulputate tempus lacus, id tempor tellus sollicitudin ac. Aenean id arcu ut turpis commodo molestie vel non augue. Aliquam finibus tortor vitae egestas finibus. Curabitur ac velit sollicitudin, hendrerit elit et, efficitur ipsum. Nunc quis orci eu massa molestie tristique eget a dui.\r\n\r\nCras ac fringilla dolor. Nullam dapibus imperdiet dictum. Cras finibus nisi facilisis, sollicitudin tortor eu, suscipit leo. Ut et dui mauris. Aenean volutpat interdum dolor, in scelerisque enim tristique ut. In ut tortor fermentum, condimentum est sit amet, interdum justo. Donec posuere, urna in pharetra fermentum, metus magna gravida lacus, ut posuere dolor tellus et enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean odio velit, interdum eu rutrum ac, sodales nec felis.\r\n\r\nPellentesque nec pulvinar eros. Mauris bibendum euismod est, et fringilla est faucibus vel. Donec vel eleifend leo. Cras hendrerit sodales eros vel porttitor. Aenean quis mollis dolor. Proin non nunc sed lorem efficitur convallis vel vel nunc. Sed et massa eget est blandit gravida. Morbi faucibus metus quam, ac molestie dolor maximus eu. In hac habitasse platea dictumst. Phasellus nunc lorem, suscipit eget dapibus quis, imperdiet quis velit. Vestibulum quis consequat nunc, in ullamcorper mauris. Praesent tincidunt pellentesque odio.', '2021-10-07 08:39:42', '2021-10-07 08:39:42', 1),
(19, 'Schumacher, le mystère demeure', 'Victime d\'un grave accident de ski le 29 décembre 2013 à Méribel, son état physique demeure encore aujourd\'hui, un mystère aux yeux de tous.', 'Vivamus feugiat ullamcorper lobortis. Duis hendrerit turpis nec purus suscipit condimentum. Mauris tempor varius lorem nec ullamcorper. Nam consequat tincidunt dolor, vitae egestas augue egestas vitae. Donec a mattis nulla, sit amet luctus nisl. Duis ut massa et felis facilisis dictum ac a nunc. Integer et sagittis arcu. Morbi posuere, orci ac aliquam consectetur, turpis eros varius libero, sit amet dignissim ligula sapien sit amet neque. In augue tellus, suscipit sit amet justo vitae, dignissim luctus nisi. Nulla facilisi. Pellentesque porttitor ornare sodales.\r\n\r\nIn congue ex nec justo suscipit, sit amet posuere erat sollicitudin. Maecenas dignissim, magna et fringilla varius, felis arcu tristique dui, quis congue arcu ex et nisi. Cras venenatis lacinia dolor eget sodales. Mauris mollis pulvinar lacus, eu ullamcorper sem lacinia at. Nullam id turpis at tellus blandit suscipit. In rutrum fringilla arcu, eu hendrerit lectus viverra vel. Aliquam erat volutpat. Fusce nec pulvinar neque. Vestibulum sem tortor, bibendum at lectus non, luctus euismod arcu.\r\n\r\nNulla eleifend dapibus mauris sed placerat. Aliquam faucibus ante a finibus rutrum. Sed bibendum hendrerit dui eget pellentesque. Integer non neque vitae sem aliquet luctus nec blandit tortor. Donec nisi odio, eleifend porta ligula et, tristique tincidunt odio. Proin sit amet risus augue. Curabitur volutpat efficitur neque at lobortis. Aenean quis molestie velit. Aenean maximus pulvinar felis non rhoncus. Integer venenatis nibh augue, blandit finibus nunc bibendum quis. Nunc massa dolor, tincidunt et ligula sit amet, blandit vestibulum risus.\r\n\r\nSed gravida suscipit nisl, id tincidunt nibh venenatis sed. Sed suscipit laoreet odio a maximus. Curabitur mollis justo pretium enim pulvinar, quis mollis erat consectetur. Vivamus et nibh vitae risus fermentum tincidunt. Sed quis vehicula lectus, sit amet bibendum arcu. Quisque sit amet tortor nec urna feugiat interdum eget in sapien. Aliquam erat volutpat. Curabitur laoreet magna ac rhoncus bibendum.\r\n\r\nInteger quis lectus eget sem commodo vehicula in eget nunc. Aenean in turpis eget lacus posuere interdum. Duis massa nunc, sagittis a aliquam in, tristique sed magna. Vestibulum tincidunt enim ut faucibus lobortis. Curabitur blandit, justo sit amet lobortis vestibulum, sapien erat pulvinar mauris, a rutrum est diam in massa. Maecenas eros leo, convallis non ante eget, pretium varius augue. Pellentesque vel hendrerit neque. Phasellus semper orci vel magna dictum imperdiet.', '2021-10-07 08:43:21', '2021-10-07 08:43:21', 1),
(20, 'Comment devenir développeur web ?', 'Le développeur web est un technicien, ou ingénieur, chargé de concevoir des applications ou des sites pour l\'entreprise dans laquelle il est employé', 'In et tellus tristique augue tincidunt consectetur. Nam maximus mi et enim dapibus luctus non vel enim. Vivamus ullamcorper vitae libero eget placerat. Fusce pellentesque enim ut neque viverra dictum sed et ante. Aliquam id laoreet risus, a facilisis quam. Proin massa elit, facilisis a luctus sed, feugiat et turpis. Ut in mauris at velit dictum elementum. Sed facilisis elit placerat nisl efficitur, eget ullamcorper elit laoreet. Praesent rutrum porta urna, id sodales metus ullamcorper ut. Proin ut turpis et tellus sagittis ultrices. Maecenas iaculis vitae ligula a rutrum. Etiam suscipit orci et ligula porttitor bibendum viverra eget mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse dapibus ullamcorper ultrices. Sed vitae nisi bibendum, venenatis odio tempor, interdum nunc.\r\n\r\nQuisque euismod tellus et sagittis lacinia. Ut tempus pellentesque diam, at tincidunt nisl sagittis non. Mauris rhoncus diam quis purus laoreet finibus. Praesent iaculis orci urna, eget lobortis massa finibus in. Suspendisse sapien ex, pellentesque in pretium sed, feugiat blandit dui. Nulla facilisi. Phasellus aliquet convallis lacus sed dictum.\r\n\r\nPraesent non ipsum ac tortor aliquet suscipit. Fusce quam arcu, luctus molestie ultrices commodo, ullamcorper nec purus. Phasellus pulvinar varius massa eget pretium. Proin molestie arcu tellus, at elementum nisi malesuada quis. Nunc lacinia, magna quis luctus ultrices, leo elit cursus ligula, sed porttitor mi erat sit amet augue. Vivamus ligula ante, lobortis ut turpis sed, viverra dapibus nisl. Aliquam erat volutpat. Integer mauris ligula, commodo sed posuere sit amet, facilisis a erat. Curabitur nec neque magna. Nulla bibendum a metus nec lobortis. Nulla in dolor sit amet nisl mollis cursus. Cras porta eros ac sapien porta, scelerisque sagittis nisi congue.', '2021-10-07 08:47:24', '2021-10-07 09:03:09', 1),
(21, 'Guerre en Ukraine', 'La Russie a lancé, jeudi 24 février, une invasion de l’Ukraine. Deux jours après avoir reconnu l’indépendance de territoires séparatistes ukrainiens.', 'Sed rutrum aliquam orci, non sodales nulla imperdiet in. Aliquam erat volutpat. Phasellus suscipit erat ligula, ullamcorper cursus leo ultrices id. Sed tellus tortor, luctus vitae blandit eu, rhoncus at erat. Vivamus congue scelerisque massa, sed rhoncus dui semper ut. Fusce mollis sed dolor id ultrices. Suspendisse faucibus laoreet sapien nec cursus. Nunc sed tellus eget tortor pulvinar dignissim. Proin quis magna aliquam, fermentum diam in, imperdiet erat. Suspendisse dignissim leo sed mi suscipit ultrices.\r\n\r\nFusce luctus quam et vulputate tincidunt. Nunc vestibulum quam justo, et imperdiet quam auctor ac. In non risus purus. Aliquam consectetur tortor nec molestie pretium. Maecenas in tristique risus. Cras rhoncus, neque sit amet blandit accumsan, odio dui molestie velit, vel placerat ante metus non ligula. Praesent sed ultricies urna, eu finibus lacus. Aliquam erat volutpat. Donec hendrerit efficitur neque, id dictum velit hendrerit id.\r\n\r\nSed arcu neque, varius non urna in, tempus venenatis lorem. Nam semper malesuada enim et consequat. Maecenas a mattis ipsum. Nunc rhoncus urna non felis commodo posuere. In hac habitasse platea dictumst. Quisque laoreet, velit ac gravida rhoncus, dolor quam dignissim ante, sit amet ultricies risus lectus quis lacus. Etiam eu nisl neque. Curabitur gravida odio quis velit cursus faucibus.\r\n\r\nMauris at urna elit. Integer et bibendum nunc. Aliquam fringilla, nisi non blandit mattis, lorem eros pulvinar lectus, vitae eleifend eros diam at nibh. Vestibulum aliquam dapibus turpis sed pulvinar. Vestibulum sit amet risus id mi consequat aliquam in nec sapien. Phasellus gravida at metus vel scelerisque. Aliquam erat volutpat. Maecenas rhoncus scelerisque tortor vitae placerat. Phasellus lacinia metus at libero rhoncus hendrerit. Vivamus semper quam vel risus convallis iaculis ut eu mi. Curabitur ac condimentum orci. Phasellus eleifend condimentum feugiat. Mauris convallis augue a odio fringilla, non tempus enim pharetra. Donec vestibulum in nisi a elementum.', '2022-03-23 11:10:17', '2022-03-23 11:10:17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `token`, `is_admin`, `date_creation`, `date_update`) VALUES
(1, 'gaetan.fouillet@gmail.com', 'Gaetan64', '$2y$10$SqVQR1N7Sjeq/4Pgy2zRKuLvkSOBTlFftvEFbn68Fk2clgMmOlauG', NULL, 1, '2021-08-19 16:07:32', '2021-10-07 14:32:11'),
(4, 'thierry64@gmail.com', 'Thierry', '$2y$10$vuNXwPPwoUWRZBVu4G2JHOeLkTuch9jultCMlGp3Z3On6GEa0EO2u', NULL, 0, '2021-09-15 12:51:16', '2021-09-20 08:25:11'),
(6, 'thomas12@gmail.com', 'Thomas12', '$2y$10$V.eYNTyxF/ZTzUOpcaWyeuBAikE6o6UuWzCnD6HAjVOA0PLtm8a/y', NULL, 0, '2021-09-20 06:12:57', '2022-03-28 06:01:36'),
(17, 'gaetan.fouillet@greta-cfa-aquitaine.academy', 'Jessica', '$2y$10$XtNZZ5iqN7q8NiqjIdJBNuDSU8htYbd1wbG97pJObXOdomxUZb0Pu', NULL, 0, '2022-03-23 10:43:31', '2022-03-25 14:12:25');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_post0_FK` FOREIGN KEY (`id_article`) REFERENCES `post` (`id_article`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
