CREATE DATABASE IF NOT EXISTS mvc_blog;

use mvc_blog;


DROP TABLE IF EXISTS `posts`;


CREATE TABLE `posts` (
  `id_post` int(10) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_created` datetime NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `post_title` (`post_title`),
  KEY `post_created` (`post_created`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;# MySQL returned an empty result set (i.e. zero rows).


DELETE FROM `posts`;


INSERT INTO `posts` (`id_post`, `post_title`, `post_content`, `post_created`) VALUES
(1, 'Sample blog post', '  <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>\r\n\r\n  <p>This blog post shows a few different types of content that''s supported and styled with Bootstrap.\r\n  Basic typography, images, and code are all supported.</p>\r\n  <hr>\r\n  <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.\r\n  Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere\r\n  consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n  <blockquote>\r\n  <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare\r\n  vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n  </blockquote>\r\n  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet\r\n  fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n\r\n  <h2>Heading</h2>\r\n\r\n  <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo\r\n  luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac\r\n  consectetur ac, vestibulum at eros.</p>\r\n\r\n  <h3>Sub-heading</h3>\r\n\r\n  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n  <pre><code>Example code block</code></pre>\r\n  <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce\r\n  dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n\r\n  <h3>Sub-heading</h3>\r\n\r\n  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia\r\n  bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus,\r\n  tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet\r\n  risus.</p>\r\n  <ul>\r\n  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n  <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n  <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n  </ul>\r\n  <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n  <ol>\r\n  <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n  <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n  <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n  </ol>\r\n  <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', '2013-09-22 18:00:00'),
(2, 'Another blog post', '\r\n  <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.\r\n  Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere\r\n  consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n  <blockquote>\r\n  <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare\r\n  vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n  </blockquote>\r\n  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet\r\n  fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n\r\n  <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo\r\n  luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac\r\n  consectetur ac, vestibulum at eros.</p>', '2013-09-23 16:54:57'),
(3, 'New feature', '  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia\r\n  bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus,\r\n  tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet\r\n  risus.</p>\r\n  <ul>\r\n  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n  <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n  <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n  </ul>\r\n  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet\r\n  fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n\r\n  <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>', '2015-10-21 00:00:00');
