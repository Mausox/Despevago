\connect despevago

/* ------------- Addition update to user balance ------------- */

DROP FUNCTION IF EXISTS add_update_user_balance() CASCADE;
CREATE OR REPLACE FUNCTION add_update_user_balance()
RETURNS trigger AS $$
BEGIN
    UPDATE users SET current_balance = current_balance + NEW.amount WHERE id = NEW.user_id;
    RETURN NULL;
END;
$$
LANGUAGE plpgsql;