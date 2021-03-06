CREATE TABLE `student` (
 `EGN` varchar(10) NOT NULL,
 `EGNFLAG` tinyint(1) NOT NULL,
 `NAME` varchar(50) NOT NULL,
 `SURNAME` varchar(50) NOT NULL,
 `LASTNAME` varchar(50) NOT NULL,
 `SEX` tinyint(1) NOT NULL,
 `BIRTHPLACE` int(6) NOT NULL,
 `COUNTRYID` int(3) NOT NULL,
 `RESIDENCE` int(6) NOT NULL,
 `BIRTHDATE` datetime NOT NULL,
 `EDUCATIONTYPE` int(11) NOT NULL,
 `YEARCOMPLETION` int(4) NOT NULL,
 `NAMEOFSCHOOL` varchar(255) NOT NULL,
 `PLACEOFSCHOOL` int(6) NOT NULL,
 `PROFFILESCHOOL` varchar(255) NOT NULL,
 PRIMARY KEY (`EGN`),
 KEY `birthplace_constr` (`BIRTHPLACE`),
 KEY `residence_constr` (`RESIDENCE`),
 KEY `country_constr` (`COUNTRYID`),
 CONSTRAINT `country_constr` FOREIGN KEY (`COUNTRYID`) REFERENCES `tekatte` (`EKATTEID`),
 CONSTRAINT `birthplace_constr` FOREIGN KEY (`BIRTHPLACE`) REFERENCES `tekatte` (`EKATTEID`),
 CONSTRAINT `residence_constr` FOREIGN KEY (`RESIDENCE`) REFERENCES `tekatte` (`EKATTEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8