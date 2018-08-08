\connect despevago

/* ------------- Default user into user user_type ------------- */

DROP FUNCTION IF EXISTS default_user_type() CASCADE;
CREATE OR REPLACE FUNCTION default_user_type()
RETURNS trigger AS $$
BEGIN
    INSERT INTO users_user_types (user_id, user_type_id) VALUES (NEW.id, 2);
    RETURN NULL;
END;
$$
LANGUAGE plpgsql;