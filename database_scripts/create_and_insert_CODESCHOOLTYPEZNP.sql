﻿CREATE TABLE `codeschooltypeznp` (
 `SCHOOLTYPEID` int(1) NOT NULL AUTO_INCREMENT,
 `SCHOOLTYPENAME` varchar(50) NOT NULL,
 PRIMARY KEY (`SCHOOLTYPEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

INSERT INTO`codeschooltypeznp`
SET `SCHOOLTYPENAME` = 'Държавно';
INSERT INTO`codeschooltypeznp`
SET `SCHOOLTYPENAME` = 'Частно';
INSERT INTO`codeschooltypeznp`
SET `SCHOOLTYPENAME` = 'Духовно';