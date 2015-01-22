CREATE TABLE `basicunit` (
 `AFFILIATEID` int(2) NOT NULL,
 `UNITID` int(3) NOT NULL AUTO_INCREMENT,
 `NAME` varchar(255) NOT NULL,
 `ISCLOSED` tinyint(1) NOT NULL DEFAULT '0',
 `IUD` varchar(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`UNITID`),
 KEY `affiliate_constr` (`AFFILIATEID`),
 CONSTRAINT `affiliate_constr` FOREIGN KEY (`AFFILIATEID`) REFERENCES `affiliate` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1