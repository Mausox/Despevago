\connect despevago

/* ------------- Substract user balance after reservation ------------- */

DROP FUNCTION IF EXISTS reservation_user_balance_update() CASCADE;
CREATE OR REPLACE FUNCTION reservation_user_balance_update()
RETURNS trigger AS $$
BEGIN
    UPDATE users SET current_balance = current_balance - NEW.current_balance WHERE id = NEW.user_id;
    RETURN NULL;
END;
$$
LANGUAGE plpgsql;