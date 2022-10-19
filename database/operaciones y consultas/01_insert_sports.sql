SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE sports;
INSERT INTO `sports` (`spanish`, `short_spanish`, `english`, `short_english`, `individual`) VALUES
	('Fútbol', 'Futbol', 'Soccer', 'Soccer', 0, 'sports/634f3eee88e8c_soccer.jfif'),
	('Americano', 'America', 'FootBall', 'FootBall', 0);
SET FOREIGN_KEY_CHECKS = 1;


