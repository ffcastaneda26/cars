-- Consulta resultados
SELECT CONCAT(co.first_name,' ', co.last_name) AS NOMBRE,
		DATE_FORMAT(ga.date, '%d/%b/%Y') AS fecha,
       tl.name AS LOCAL,
       ga.local_score AS "Goles Local",
       tv.name AS VISITA,
       ga.visit_score AS "Goles Visita" ,
       CASE
		    WHEN ga.result = 0 THEN "EMPATE"
		    WHEN ga.result = 1 THEN "LOCAL"
		    ELSE "VISITA"
		END AS RESULTADO,
		CASE
			WHEN pic.winner = 0 THEN "EMPATE"
		   WHEN pic.winner = 1 THEN "LOCAL"
		   ELSE "VISITA"
		END AS PRONOSTICO,
       IF(ga.result = pic.winner,'SI','NO') AS 'ACERTO?'

FROM games ga,teams tl, teams tv,picks pic,competidors co
WHERE tl.id = ga.local_team_id
  AND tv.id = ga.visit_team_id
  AND ga.id = pic.game_id
  AND co.id = pic.competidor_id
ORDER BY ga.date




SELECT *
FROM teams
-- Agregar un campo  a una tabla
ALTER TABLE `options` ADD `dependent_question_id` BIGINT(20) UNSIGNED NULL COMMENT 'Pregunta dependiente' AFTER `english`;
 -- Obener un aleatorio
 SELECT ROUND((RAND() * (20))+0)  as resultado