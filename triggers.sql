DROP TRIGGER IF EXISTS campaign_has_error;
DELIMITER //
CREATE TRIGGER campaign_has_errors BEFORE INSERT ON campaigns FOR EACH ROW
IF NEW.auditor_id NOT IN (SELECT users.id FROM users INNER JOIN roles on users.role_id = roles.id WHERE roles.name = "Auditeur") THEN 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = "Le rôle de l'auditeur n'est pas le bon";
END IF//
IF NEW.creator_id NOT IN (SELECT users.id FROM users INNER JOIN roles on users.role_id = roles.id WHERE roles.name = "Chef de projet") THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = "Le rôle du créateur n'est pas le bon";
END IF//
DELIMITER ;
