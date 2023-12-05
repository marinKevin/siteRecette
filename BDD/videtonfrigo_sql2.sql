CREATE DATABASE videTonFrigo;
USE videTonFrigo;

CREATE TABLE recipe (
    id_recipe INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name_recipe VARCHAR(50),
    step_recipe TEXT,
    id_times INT
);
CREATE TABLE quantity(
	id_quantity INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    amount_quantity FLOAT,
    id_unit_measure INT,
    id_recipe INT,
    id_ingredient INT
);
CREATE TABLE dlc (
	id_dlc INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	date_dlc DATE
);
CREATE TABLE times (
    id_time INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name_time VARCHAR(50)
);
CREATE TABLE equipment (
    id_equipment INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name_equipment VARCHAR(50)
);
CREATE TABLE ingredient (
	id_ingredient INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name_ingredient VARCHAR(50)
);
CREATE TABLE unit_measure (
	id_unit_measure INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name_unit_measure VARCHAR(50)
);
CREATE TABLE contact_user (
    name_contact_user VARCHAR(50),
    first_name_contact__user VARCHAR(50),
    email_contact_user VARCHAR(50),
    message_contact_user TEXT
);
CREATE TABLE to_end (
	id_recipe INT,
    id_dlc INT,
    PRIMARY KEY (id_recipe, id_dlc)
);
CREATE TABLE to_use (
    id_recipe INT,
    id_equipment INT,
    PRIMARY KEY (id_recipe, id_equipment)
);
CREATE TABLE to_cook (
    id_recipe INT,
    id_ingredient INT,
    PRIMARY KEY (id_recipe, id_ingredient)
);


# Clée étrangère 
ALTER TABLE recipe ADD CONSTRAINT fk_id_times_recipe FOREIGN KEY (id_times) REFERENCES times (id_time);
ALTER TABLE quantity ADD CONSTRAINT fk_id_unit_measure_quantity FOREIGN KEY (id_unit_measure) REFERENCES unit_measure (id_unit_measure);
ALTER TABLE quantity ADD CONSTRAINT fk_id_recipe_quantity  FOREIGN KEY (id_recipe) REFERENCES recipe (id_recipe);
ALTER TABLE quantity ADD CONSTRAINT fk_id_ingredient_quantity FOREIGN KEY (id_ingredient) REFERENCES ingredient (id_ingredient);

# Table d'association
ALTER TABLE to_end ADD CONSTRAINT fk_id_recipe_to_end FOREIGN KEY (id_recipe) REFERENCES recipe (id_recipe);
ALTER TABLE to_end ADD CONSTRAINT fk_id_dlc_to_end FOREIGN KEY (id_dlc) REFERENCES dlc (id_dlc);
ALTER TABLE to_use ADD CONSTRAINT fk_id_recipe_to_use FOREIGN KEY (id_recipe) REFERENCES recipe (id_recipe);
ALTER TABLE to_use ADD CONSTRAINT fk_id_equipment_to_use FOREIGN KEY (id_equipment) REFERENCES equipment (id_equipment);
ALTER TABLE to_cook ADD CONSTRAINT fk_id_recipe_to_cook FOREIGN KEY (id_recipe) REFERENCES recipe (id_recipe);
ALTER TABLE to_cook ADD CONSTRAINT fk_id_ingredient_to_cook FOREIGN KEY (id_ingredient) REFERENCES ingredient (id_ingredient) 
