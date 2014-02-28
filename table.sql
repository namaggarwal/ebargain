
create database if not exists eBargain;

use eBargain;

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `linkid` int(11) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `tbllink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(1024) DEFAULT NULL,
  `host` varchar(256) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

