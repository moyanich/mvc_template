DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmail`(IN `relEmpID` VARCHAR(6), IN `emailAddress` VARCHAR(50), IN `created_at` TIMESTAMP)
BEGIN
	INSERT INTO tblemails(relEmpID, emailAddress, created_at) 
    VALUES(relEmpID, emailAddress, CURRENT_TIMESTAMP);
END$$
DELIMITER ;