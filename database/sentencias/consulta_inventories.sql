Liga para posible API decodificadora del VIN
https://vindecoder.eu/api/?gclid=Cj0KCQiAvqGcBhCJARIsAFQ5ke6fO_LOIELyRAmEZ-SqJ_RVyWZm6HiqFBvJzypC8Ipwri51SSlpZAMaAtwnEALw_wcB

-- Consultar inventario por concepto
SELECT distinct(make) as Valor,'Marca' as Tipo
FROM  inventories
UNION
SELECT distinct(model) as Valor,'Modelo' as Modelo
FROM  inventories
UNION
SELECT distinct(exterior_color) as Valor, 'Exterior' as Exterior
FROM  inventories
UNION
SELECT distinct(interior_color) as Valor,'Interior' as Interior
FROM  inventories
UNION
SELECT distinct(transmission) as Valor,'Transmision' as Tipo
FROM  inventories
UNION
SELECT distinct(engine)as Valor ,'Motor' as Tipo
FROM  inventories
UNION
SELECT distinct(body) as Valor,'Body' as Body
FROM  inventories
UNION
SELECT distinct(trim) as Valor,'Trim' as Adornos
FROM  inventories
