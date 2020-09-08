CREATE DEFINER=`root`@`localhost` TRIGGER `swiftdb`.`tblDepartments_AFTER_INSERT` AFTER INSERT ON `tblDepartments` FOR EACH ROW
BEGIN
INSERT INTO swiftdb.tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New record created for ', NEW.deptName, ' By ', (SELECT username from users WHERE userID = NEW.created_by));
END