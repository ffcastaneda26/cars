INSERT INTO teams (name) VALUES ('Argentina');
INSERT INTO teams (name) VALUES ('Países Bajos');
INSERT INTO teams (name) VALUES ('Uruguay');
INSERT INTO teams (name) VALUES ('Bélgica');
INSERT INTO teams (name) VALUES ('Serbia');
INSERT INTO teams (name) VALUES ('Arabia Saudí');
INSERT INTO teams (name) VALUES ('Ecuador');
INSERT INTO teams (name) VALUES ('Croacia');
INSERT INTO teams (name) VALUES ('Suiza');
INSERT INTO teams (name) VALUES ('Japón');
INSERT INTO teams (name) VALUES ('Portugal');
INSERT INTO teams (name) VALUES ('Francia');
INSERT INTO teams (name) VALUES ('Inglaterra');
INSERT INTO teams (name) VALUES ('Túnez');
INSERT INTO teams (name) VALUES ('Alemania');
INSERT INTO teams (name) VALUES ('Estados Unidos');
INSERT INTO teams (name) VALUES ('España');
INSERT INTO teams (name) VALUES ('Ghana');
INSERT INTO teams (name) VALUES ('Irán');
INSERT INTO teams (name) VALUES ('Brasil');
INSERT INTO teams (name) VALUES ('Gales');
INSERT INTO teams (name) VALUES ('Marruecos');
INSERT INTO teams (name) VALUES ('Canadá');
INSERT INTO teams (name) VALUES ('México');
INSERT INTO teams (name) VALUES ('Polonia');
INSERT INTO teams (name) VALUES ('Australia');
INSERT INTO teams (name) VALUES ('Dinamarca');
INSERT INTO teams (name) VALUES ('Qatar');
INSERT INTO teams (name) VALUES ('Costa Rica');
INSERT INTO teams (name) VALUES ('Senegal');
INSERT INTO teams (name) VALUES ('Corea del Sur');
INSERT INTO teams (name) VALUES ('Camerún');


UPDATE teams SET short = SUBSTR(NAME,1,6),alias=NAME;
COMMIT;