-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 27 Janvier 2014 à 22:58
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bloghello`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`) VALUES
(66, 'Lorem Ipsum', 'Facultas pertinent facultas dicendi quod cognatione cognatione ita quidem se quoddam aut ingeni forte commune sit in alia ingeni alia haec ingeni hoc ita hoc in huic nos a quod disciplina facultas ingeni vinculum quod continentur forte ne dediti studio forte humanitatem nobis quidem dicendi quadam dicendi ad nos quae cognatione ad huic ingeni nos quidem hoc nos ne nos sit ratio omnes fuimus ad quoddam nos ne nos cognatione artes cognatione forte aut artes disciplina quoddam umquam sit quis hoc ita quasi forte a alia hoc pertinent sit umquam pertinent haec quadam quidem facultas quasi huic fuimus dici quoddam.', 1390856179),
(67, 'Lorem Ipsum 2', 'Ubique temporis otiosae patrum omnes regina ubique Romani olim temporis centuriae tribus suscipitur ubique nulla temporis canities omnes suffragiorum nulla ubique ubique licet sunt nomen set verecundum reverenda quotquot temporis circumspectum verecundum olim et suffragiorum domina suscipitur quotquot et domina nomen omnes regina omnes circumspectum reverenda olim otiosae Pompiliani nulla otiosae verecundum pacataeque et regina centuriae verecundum reverenda et licet verecundum canities omnes domina et nomen reverenda redierit suffragiorum centuriae olim et centuriae securitas terrarum suscipitur suscipitur regina et suscipitur centuriae canities set et nomen sint et regina omnes pacataeque patrum centuriae canities et set sint patrum verecundum regina circumspectum.', 1390856286),
(68, 'RÃ©dacteur Warlegend', 'Je suis rÃ©dacteur chez Warlegend, je m''occupe principalement du cÃ©lÃ¨bre Moba de Riot : League of Legends. Je parle donc de son contenu, de l''E-Sport et chaque semaine je sors les meilleurs vidÃ©os de la semaine classÃ©es par Humour, Ã‰checs et Action de gÃ©nie. \r\nJe travaille aussi pour eux sur la rÃ©alisation d''un plugin Wordpress qui permettra d''afficher les top stream par jeux. Je le rÃ©alise pendant mes sÃ©ances de projet tutorÃ©. \r\nJ''ai ajoutÃ© un systÃ¨me de lightbox sur le site avec un plugin existant que j''ai lÃ©gÃ¨rement du modifier a cause d''un z-index trop faible. \r\nJ''ai aussi rÃ©alisÃ© un tuto pour que Skype consomme moins de CPU. http://bit.ly/1eI5ntr \r\nNâ€™hÃ©sitez Ã  partager mes articles ou vous inscrire sur le site pour commenter. Un concours pour gagner du stuff Steelseries est organisÃ© chaque mois alors soyez actif ! :)', 1390856313),
(69, 'Bienvenue sur mon blog', 'Bienvenue le blog presque parfait de Laurent Dubreuil ! \r\nComme vous pouvez le voir, j''affiche 2 articles par pages contenant un titre, un contenu texte, une image et un tag. \r\nVous pouvez vous connecter si je vous ai fourni un compte.', 1390856349);

-- --------------------------------------------------------

--
-- Structure de la table `articles_tags`
--

CREATE TABLE IF NOT EXISTS `articles_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `articles_tags`
--

INSERT INTO `articles_tags` (`id`, `article_id`, `tag_id`) VALUES
(13, 57, 14),
(14, 58, 15),
(15, 59, 15),
(17, 54, 16),
(18, 60, 17),
(19, 61, 17),
(20, 62, 17),
(21, 63, 17),
(22, 64, 17),
(23, 65, 18),
(24, 66, 19),
(25, 67, 19),
(26, 68, 18),
(27, 69, 16);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nom_tag` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `nom_tag`) VALUES
(14, 'testd'),
(15, 'der'),
(16, 'bienvenue'),
(17, ''),
(18, 'Warlegend'),
(19, 'latin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `mdp`, `sid`) VALUES
(1, 'laurent.du@hotmail.fr', 'mdp', 'd37753f7457bac486478598642f9a80a'),
(2, 'lannoy@nilsine.fr', 'mdp', 'fa3f190f6e8f92b4122cd7406578a01a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
