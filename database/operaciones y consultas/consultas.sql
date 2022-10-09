-- Preguntas con sus opciones
SELECT *
FROM teams
-- Agregar un campo  a una tabla
ALTER TABLE `options` ADD `dependent_question_id` BIGINT(20) UNSIGNED NULL COMMENT 'Pregunta dependiente' AFTER `english`;
 -- Obener un aleatorio
 SELECT ROUND((RAND() * (20))+0)  as resultado