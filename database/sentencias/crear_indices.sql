CREATE INDEX vehicles_make_idx ON vehicles (make);
CREATE INDEX vehicles_model_idx ON vehicles (model);
CREATE INDEX vehicles_model_year_idx ON vehicles (model_year);
CREATE INDEX vehicles_body_idx ON vehicles (body);

// Quitar los índices
DROP INDEX vehicles_make_idx ON vehicles;
DROP INDEX vehicles_model_idx ON vehicles;
DROP INDEX vehicles_model_year_idx ON vehicles;
DROP INDEX vehicles_body_idx ON vehicles;

