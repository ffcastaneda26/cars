-- Preguntas con sus opciones
SELECT qu.id,qu.spanish,op.id,op.spanish
FROM questions qu,options op
WHERE qu.id = op.question_id
ORDER BY qu.order,op.id
