\connect despevago

/* ------------- Substract user balance after reservation ------------- */

CREATE TRIGGER tr_reservation_user_balance_update AFTER UPDATE OF closed ON reservations
FOR EACH ROW EXECUTE PROCEDURE reservation_user_balance_update();