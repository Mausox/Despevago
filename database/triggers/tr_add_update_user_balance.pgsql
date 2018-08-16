\connect despevago

/* ------------ Trigger 'Addition update user balance' --------- */

CREATE TRIGGER tr_add_update_user_balance AFTER INSERT ON payment_histories
FOR EACH ROW EXECUTE PROCEDURE add_update_user_balance();