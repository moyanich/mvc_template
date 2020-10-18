CREATE DEFINER=`root`@`localhost` TRIGGER `swiftdb`.`tblDepartments_AFTER_INSERT` AFTER INSERT ON `tblDepartments` FOR EACH ROW
BEGIN
INSERT INTO swiftdb.tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New record created for ', NEW.deptName, ' By ', (SELECT username from users WHERE userID = NEW.created_by));
END















CREATE TRIGGER `updateLogTable` AFTER UPDATE ON `tblemployees`
 FOR EACH ROW BEGIN
IF OLD.first_name <> new.first_name THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Updated <br/> New First Name: ', NEW.first_name));
END IF;

IF OLD.last_name <> new.last_name THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a> Updated <br/> New Last Name: ', NEW.last_name ));
END IF;

IF OLD.gender <> new.gender THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Gender changed from ', OLD.gender, ' to ', NEW.gender));
END IF;

IF OLD.empDOB <> new.empDOB THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> DOB Updated ', OLD.empDOB, ' to ', NEW.empDOB));
END IF;
	 
IF OLD.trn <> new.trn THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> TRN Updated: ', NEW.trn));
    
   ELSEIF OLD.trn IS NULL THEN
    INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> TRN added: ', NEW.trn));
END IF;

IF OLD.nis <> new.nis THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> NIS Updated: ', NEW.nis));
    
    ELSEIF OLD.nis IS NULL THEN
    INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> NIS added: ', NEW.nis));
END IF;


IF OLD.address <> new.address || OLD.address IS NULL THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Address Updated: ', NEW.address));
END IF;

IF OLD.internalEmail <> new.internalEmail || OLD.internalEmail IS NULL THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Email Address Updated: ', NEW.internalEmail));
END IF;

IF OLD.hire_date <> new.hire_date || OLD.hire_date IS NULL THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.empID ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Hire Date Updated: ', NEW.hire_date));
END IF;

END