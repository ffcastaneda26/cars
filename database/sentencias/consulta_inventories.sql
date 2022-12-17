Liga para posible API decodificadora del VIN
https://vindecoder.eu/api/?gclid=Cj0KCQiAvqGcBhCJARIsAFQ5ke6fO_LOIELyRAmEZ-SqJ_RVyWZm6HiqFBvJzypC8Ipwri51SSlpZAMaAtwnEALw_wcB

Poblar Vehículos desde inventories
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE vehicles;
INSERT INTO vehicles (location_id,vin,model_year,make,model,interior_color_id,exterior_color_id,miles,transmission,engine_model,price,body)
SELECT   FLOOR(1 + RAND()*(30-(SELECT MAX(id) FROM locations))) AS LOCATION_ID,
			vin,
			YEAR ,
			make,
			model,
			FLOOR(1 + RAND()*(100-(SELECT MAX(id) FROM colors))) AS interior_color_id,
			FLOOR(1 + RAND()*(100-(SELECT MAX(id) FROM colors))) AS exterior_color_id,
			mileage,
			transmission,
			ENGINE,
			sales_price,
			body
FROM inventories;
SET FOREIGN_KEY_CHECKS = 1;

