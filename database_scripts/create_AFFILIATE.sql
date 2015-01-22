CREATE TABLE `affiliate` (
 `ID` int(2) NOT NULL AUTO_INCREMENT,
 `NAME` varchar(255) NOT NULL,
 `LOCATION` int(6) NOT NULL,
 `ADDRESS` varchar(255) NOT NULL,
 `BULSTATNUMBER` varchar(13),
 `PHONENUMBER1` varchar(50) NOT NULL,
 `PHONENUMBER2` varchar(50),
 `PHONENUMBER3` varchar(50),
 `EMAIL` varchar(255) NOT NULL,
 `ISCLOSED` tinyint(1) NOT NULL DEFAULT '0',
 `IUD` int(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`ID`),
 KEY `location_constr2` (`LOCATION`),
 CONSTRAINT `location_constr2` FOREIGN KEY (`LOCATION`) REFERENCES `tekatte` (`EKATTEID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1