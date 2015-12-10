-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 16:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `date` datetime DEFAULT NULL,
  `status` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `titre`, `description`, `url`, `date`, `status`) VALUES
(1, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 15:02:08', NULL),
(2, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 17:33:08', NULL),
(3, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 17:33:32', NULL),
(4, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 17:33:51', NULL),
(5, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 17:34:21', NULL),
(6, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 17:38:04', NULL),
(7, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(8, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(9, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(10, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(11, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(12, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(13, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(14, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(15, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-13 15:02:08', NULL),
(16, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 15:02:08', NULL),
(17, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 15:02:08', NULL),
(18, 'Mercedes classe c garantie 2017', 'test test test', 'a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-10-14 15:02:08', NULL),
(19, 'Mercedes classe c garantie 2017', 'suite mutation sur Paris je met en vente ma Mercedes classe c 180 exécutive garantie jusqu''en 2017 par Mercedes . la révision vient d''être effectuée . motorisation 156 chevaux turbo essence très faible consommation de 6litres @,elle dispose d ''un grand réservoir de 66 litres(plus de 1000 kilomètres d''autonomie).de l''active park assist ( la voiture se gare toute seule) des feux a led i.l.s avec mode plein phares automatique .GPS Europe a commande vocale et pad tactile . bluetooth pour vos appels et votre musique . lecteur DVD et lecteur de carte sd plus 2 prises USB.capteur de stationnement avant et arrière. Stop and start automatique.aide au démarrage en côte.Régulateur et limiteur de vitesse avec le système anti collision ( la voiture freine automatiquement) capteur de panneaux de signalisation. Sièges en cuir chauffants et électriques avec soutien lombaires . rétroviseurs anti éblouissement etc..... Ma voiture est dans un état neuf aucune rayure ou choc et je suis Non fumeur ,elle sent toujours le neuf . photos supplémentaires sur demande.prix négociable raisonnablement', 'http://img1.leboncoin.fr/images/a03/a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg', '2015-12-10 09:30:40', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
