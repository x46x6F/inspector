-- Suppression du trigger existant s'il y en déjà un
DROP TRIGGER IF EXISTS campaign_has_error;
-- Remplacement des ; de fin d'instruction par des //
DELIMITER //
-- Création du trigger et demande de vérification avant insertion dans la table campaign
CREATE TRIGGER campaign_has_errors BEFORE INSERT ON campaigns FOR EACH ROW

-- Vérification du rôle de l'utilisateur, si son rôle n'est pas "Auditeur" alors on renvoie un message d'erreur
IF NEW.auditor_id NOT IN (SELECT users.id FROM users INNER JOIN roles on users.role_id = roles.id WHERE roles.name = "Auditeur") THEN 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = "Le rôle de l'auditeur n'est pas le bon";
END IF//
--  Même principe mais avec "Chef de projet" avant une création de campagne
IF NEW.creator_id NOT IN (SELECT users.id FROM users INNER JOIN roles on users.role_id = roles.id WHERE roles.name = "Chef de projet") THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = "Le rôle du créateur n'est pas le bon";
END IF//
DELIMITER ;
