CREATE DATABASE IF NOT EXISTS mvc_blog;

use mvc_blog;


DROP TABLE IF EXISTS `posts`;


CREATE TABLE `posts` (
  `id_post` int(10) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_created` date NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `post_title` (`post_title`),
  KEY `post_created` (`post_created`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DELETE FROM `posts`;

INSERT INTO `posts` (`id_post`, `post_title`, `post_content`, `post_created`) VALUES
(1, 'Sample blog post', '  Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere\r\n  consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.', '2013-09-22'),
(2, 'Another blog post', 'Cum sociis natoque penatibus et magnis nascetur ridiculus mus.\r\n  Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere\r\n  consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.', '2013-09-23'),
(3, 'dfgdfg sdhkfjs', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia\r\n  bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus,\r\n  tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet\r\n  risus.', '2015-10-21');