#
# DUMP FILE
#
# Database is ported from MS Access
#------------------------------------------------------------------
# Created using "MS Access to MySQL" form http://www.bullzip.com
# Program Version 5.5.282
#
# OPTIONS:
#   sourcefilename=C:/Users/student/Documents/Language_Profit.accdb
#   sourceusername=
#   sourcepassword=
#   sourcesystemdatabase=
#   destinationdatabase=movedb
#   storageengine=MyISAM
#   dropdatabase=0
#   createtables=1
#   unicode=1
#   autocommit=1
#   transferdefaultvalues=1
#   transferindexes=1
#   transferautonumbers=1
#   transferrecords=1
#   columnlist=1
#   tableprefix=
#   negativeboolean=0
#   ignorelargeblobs=0
#   memotype=LONGTEXT
#   datetimetype=DATETIME
#

CREATE DATABASE IF NOT EXISTS `movedb`;
USE `movedb`;

#
# Table structure for table 'dzial'
#

DROP TABLE IF EXISTS `dzial`;

CREATE TABLE `dzial` (
  `id_dzialu` VARCHAR(255) NOT NULL, 
  `dzial` VARCHAR(40) NOT NULL, 
  `id_kursu` VARCHAR(255), 
  INDEX (`id_dzialu`), 
  INDEX (`id_kursu`), 
  PRIMARY KEY (`id_dzialu`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'dzial'
#

# 0 records

#
# Table structure for table 'kurs'
#

DROP TABLE IF EXISTS `kurs`;

CREATE TABLE `kurs` (
  `id_kursu` VARCHAR(255) NOT NULL, 
  `kurs` VARCHAR(255), 
  INDEX (`kurs`), 
  PRIMARY KEY (`id_kursu`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'kurs'
#

# 0 records

#
# Table structure for table 'slowa_ang'
#

DROP TABLE IF EXISTS `slowa_ang`;

CREATE TABLE `slowa_ang` (
  `id_slowka_ang` VARCHAR(255) NOT NULL, 
  `slowo_ang` VARCHAR(255), 
  INDEX (`id_slowka_ang`), 
  PRIMARY KEY (`id_slowka_ang`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'slowa_ang'
#

# 0 records

#
# Table structure for table 'slowa_pl'
#

DROP TABLE IF EXISTS `slowa_pl`;

CREATE TABLE `slowa_pl` (
  `id_slowka` INTEGER NOT NULL AUTO_INCREMENT, 
  `slowo` VARCHAR(255), 
  `id_dzialu` VARCHAR(255), 
  INDEX (`id_dzialu`), 
  PRIMARY KEY (`id_slowka`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'slowa_pl'
#

# 0 records

#
# Table structure for table 'tlumaczenia'
#

DROP TABLE IF EXISTS `tlumaczenia`;

CREATE TABLE `tlumaczenia` (
  `id_tlumaczenia` VARCHAR(255) NOT NULL, 
  `id_slowka` INTEGER AUTO_INCREMENT, 
  `id_slowka_ang` VARCHAR(255), 
  INDEX (`id_slowka`), 
  INDEX (`id_slowka_ang`), 
  INDEX (`id_tlumaczenia`), 
  PRIMARY KEY (`id_tlumaczenia`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'tlumaczenia'
#

# 0 records

#
# Table structure for table 'uzytkownik'
#

DROP TABLE IF EXISTS `uzytkownik`;

CREATE TABLE `uzytkownik` (
  `login` VARCHAR(30) NOT NULL, 
  `haslo` VARCHAR(255) NOT NULL, 
  `administrator` VARCHAR(3) NOT NULL DEFAULT 'No', 
  `mail` VARCHAR(50) NOT NULL DEFAULT 'No', 
  PRIMARY KEY (`login`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'uzytkownik'
#

# 0 records

#
# Table structure for table 'zdane_polaczenie'
#

DROP TABLE IF EXISTS `zdane_polaczenie`;

CREATE TABLE `zdane_polaczenie` (
  `login` VARCHAR(255), 
  `id_tlumaczenia` VARCHAR(255), 
  `zdane` VARCHAR(3) NOT NULL DEFAULT 'No', 
  `id_zdane` VARCHAR(255) NOT NULL, 
  INDEX (`id_tlumaczenia`), 
  INDEX (`id_zdane`), 
  PRIMARY KEY (`id_zdane`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'zdane_polaczenie'
#

# 0 records

