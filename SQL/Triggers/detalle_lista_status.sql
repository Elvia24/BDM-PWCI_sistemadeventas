CREATE TRIGGER `detalle_lista_status` AFTER UPDATE ON `lista`
 FOR EACH ROW BEGIN
    IF NEW.status_lista = 0 THEN
        UPDATE detalle_lista
        SET status_detalle_lista = 0
        WHERE id_lista = NEW.ID_lista;
    END IF;
END
