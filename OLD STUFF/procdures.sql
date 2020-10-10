DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmail`(IN `relEmpID` VARCHAR(6), IN `emailAddress` VARCHAR(50), IN `created_at` TIMESTAMP)
BEGIN
	INSERT INTO tblemails(relEmpID, emailAddress, created_at) 
    VALUES(relEmpID, emailAddress, CURRENT_TIMESTAMP);
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSupervisors`(IN `empID` INT(11), IN `deptID` CHAR(6) CHARSET utf8, IN `from_date	` DATE, IN `to_date` DATE)
BEGIN
INSERT into tbldepartment_supervisor (empID, deptID, from_date, to_date) VALUES (empID, deptID, from_date, to_date);

END$$
DELIMITER ;