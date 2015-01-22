CREATE TABLE `codebasicschooltype` (
 `BASICSCHOOLTYPEID` int(2) NOT NULL AUTO_INCREMENT,
 `SCHOOLTYPENAME` varchar(50) NOT NULL,
 PRIMARY KEY (`BASICSCHOOLTYPEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

INSERT INTO`codebasicschooltype`
SET `SCHOOLTYPENAME` = 'Университет';
INSERT INTO`codebasicschooltype`
SET `SCHOOLTYPENAME` = 'Специализирано ВУ';
INSERT INTO`codebasicschooltype`
SET `SCHOOLTYPENAME` = 'Самостоятелен колеж';