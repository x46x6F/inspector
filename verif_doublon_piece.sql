CREATE TRIGGER verif_doublon_piece BEFORE INSERT ON models
FOR EACH ROW BEGIN
  -- Vérifier les enregistrements communs entre les tables
  -- intersection pour comparer les données entre deux tables qui sont identiques
  SET @intersection_count = (
    SELECT COUNT(*) 
    FROM (
      SELECT name
      FROM models
      WHERE name = NEW.name
      INTERSECT
      SELECT model_name
      FROM csv_pieces
    ) AS common_records
  );

  -- Si le nombre d'enregistrements communs est supérieur à 0, lever une exception
  IF @intersection_count > 0 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Des données communes existent entre models et csv_piece.';
  END IF;
END
