CREATE TABLE `university` (
 `ID` int(7) NOT NULL AUTO_INCREMENT,
 `YEAR` int(4) NOT NULL,
 `PERIOD` int(1) NOT NULL,
 `FULLNAME` varchar(200) NOT NULL,
 `SHORTNAME` varchar(30) NOT NULL,
 `TYPEART17` int(2) NOT NULL,
 `TYPEART11` int(1) NOT NULL,
 `FINANCER` int(2) NOT NULL,
 `LOCATIONID` int(6) NOT NULL,
 `POSTCODE` int(4) NOT NULL,
 `ADDRESS` varchar(50) NOT NULL,
 `PHONENUMBER1` varchar(15) NOT NULL,
 `PHONENUMBER2` varchar(15) DEFAULT NULL,
 `PHONENUMBER3` varchar(15) DEFAULT NULL,
 `PHONENUMBER4` varchar(15) DEFAULT NULL,
 `PHONENUMBER5` varchar(15) DEFAULT NULL,
 `FAX` varchar(15) NOT NULL,
 `EMAIL` varchar(50) NOT NULL,
 `SITE` varchar(50) NOT NULL,
 `BULSTATNUMBER` varchar(9) NOT NULL,
 `YEARESTABLISH` varchar(4) NOT NULL,
 `IUD` varchar(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`ID`),
 KEY `location_constr` (`LOCATIONID`),
 KEY `basicschooltype_constr` (`TYPEART17`),
 KEY `schooltype_constr` (`TYPEART11`),
 KEY `budged_constr` (`FINANCER`),
 CONSTRAINT `budged_constr` FOREIGN KEY (`FINANCER`) REFERENCES `codebudgedfrom` (`BUDGEDFROMID`),
 CONSTRAINT `basicschooltype_constr` FOREIGN KEY (`TYPEART17`) REFERENCES `codebasicschooltype` (`BASICSCHOOLTYPEID`),
 CONSTRAINT `location_constr` FOREIGN KEY (`LOCATIONID`) REFERENCES `tekatte` (`EKATTEID`),
 CONSTRAINT `schooltype_constr` FOREIGN KEY (`TYPEART11`) REFERENCES `codeschooltypeznp` (`SCHOOLTYPEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8