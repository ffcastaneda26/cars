SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE tournaments;
INSERT INTO `tournaments` (`sport_id`, `name`, `allow_ties`, `require_all_picks`, `minutes_before_to_edit`, `available_user_at_register`, `create_picks_at_available`) VALUES
	(1, 'Nombre Torneo', 1, 1, 5, 1, 1);
SET FOREIGN_KEY_CHECKS = 1;
