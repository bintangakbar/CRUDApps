CREATE TABLE IF NOT EXISTS 'CRUD' (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `aktivitas` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tanggal_deadline` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;