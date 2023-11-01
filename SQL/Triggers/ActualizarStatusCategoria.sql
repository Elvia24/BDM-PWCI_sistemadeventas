
DELIMITER //

CREATE TRIGGER ActualizarStatusCategoria
AFTER UPDATE ON usuario
FOR EACH ROW
BEGIN
  DECLARE usuario_id_to_update INT;
  DECLARE nuevo_status_usuario INT;
  
  SET usuario_id_to_update = NEW.ID_usuario;
  SET nuevo_status_usuario = NEW.status_usuario;
  
  IF nuevo_status_usuario = 0 THEN
    UPDATE categoria SET status_categoria = 0 WHERE ID_usuario = usuario_id_to_update;
  END IF;
END;
//

DELIMITER ;