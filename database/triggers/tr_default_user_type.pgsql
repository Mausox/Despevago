\connect despevago

/* ------------ Trigger 'User default user type' --------- */

CREATE TRIGGER tr_user_default_user_type AFTER INSERT ON users
FOR EACH ROW EXECUTE PROCEDURE default_user_type();
