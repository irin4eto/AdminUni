CREATE TABLE `proffesionalarea` (
 `ID` int(2) NOT NULL AUTO_INCREMENT,
 `ISACCREDITED` tinyint(1) NOT NULL,
 `STARTACCREDITATION` datetime,
 `ENDACCREDITATION` datetime,
 `IUD` int(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8