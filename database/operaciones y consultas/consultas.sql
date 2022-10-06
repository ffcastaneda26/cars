-- Preguntas con sus opciones
SELECT qu.id,qu.spanish,op.id,op.spanish
FROM questions qu,options op
WHERE qu.id = op.question_id
ORDER BY qu.order,op.id

-- Respuestas de un cliente en una promoción
SELECT pr.spanish AS PROMOCION, cu.first_name,cu.last_name,qu.spanish AS question, op.spanish AS answer
FROM answers an,questions qu,options op,customers cu,promotions pr
WHERE qu.id = op.question_id
  AND op.id = an.option_id
  AND cu.id = an.customer_id
  AND pr.id = an.promotion_id

-- Respuestas de los clientes al registrarse
SELECT pr.spanish AS PROMOCION, cu.first_name,cu.last_name,qu.spanish AS question, op.spanish AS answer
FROM answers an,questions qu,options op,customers cu,promotions pr
WHERE qu.id = op.question_id
  AND op.id = an.option_id
  AND cu.id = an.customer_id
  AND pr.id = an.promotion_id


-- Agregar un campo  a una tabla
ALTER TABLE `options` ADD `dependent_question_id` BIGINT(20) UNSIGNED NULL COMMENT 'Pregunta dependiente' AFTER `english`;
