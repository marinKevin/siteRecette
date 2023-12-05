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
ALTER TABLE to_cook ADD CONSTRAINT fk_id_ingredient_to_cook FOREIGN KEY (id_ingredient) REFERENCES ingredient (id_ingredient);

# -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

-- DONNEES --

# Unité de mesure 

INSERT INTO unit_measure (name_unit_measure) VALUE ("ml");
INSERT INTO unit_measure (name_unit_measure) VALUE ("cl");
INSERT INTO unit_measure (name_unit_measure) VALUE ("l");
INSERT INTO unit_measure (name_unit_measure) VALUE ("g");
INSERT INTO unit_measure (name_unit_measure) VALUE ("kg");
INSERT INTO unit_measure (name_unit_measure) VALUE ("pièce");
INSERT INTO unit_measure (name_unit_measure) VALUE ("cuil.à soupe");
INSERT INTO unit_measure (name_unit_measure) VALUE ("cuil.à café");
INSERT INTO unit_measure (name_unit_measure) VALUE ("pm");
INSERT INTO unit_measure (name_unit_measure) VALUE ("botte");

# Times

INSERT INTO times (name_time) VALUE ("Très rapide (moins de 30 minutes");
INSERT INTO times (name_time) VALUE ("Rapide (entre 30 minutes et une heure");
INSERT INTO times (name_time) VALUE ("Long (entre une heure et deux");
INSERT INTO times (name_time) VALUE ("Très long (plus de deux heures");

# Equipement 

INSERT INTO equipment (name_equipment) VALUE ("Four");
INSERT INTO equipment (name_equipment) VALUE ("Chalumeau");
INSERT INTO equipment (name_equipment) VALUE ("Cuit Vapeur");
INSERT INTO equipment (name_equipment) VALUE ("Crêpière");


# Ingredient

INSERT INTO ingredient (name_ingredient) VALUE ("Sel");
INSERT INTO ingredient (name_ingredient) VALUE ("Poivre");
INSERT INTO ingredient (name_ingredient) VALUE ("Huile d'olive");
INSERT INTO ingredient (name_ingredient) VALUE ("Tomates concassées");
INSERT INTO ingredient (name_ingredient) VALUE ("Thym");
INSERT INTO ingredient (name_ingredient) VALUE ("Ail");
INSERT INTO ingredient (name_ingredient) VALUE ("Basilic");
INSERT INTO ingredient (name_ingredient) VALUE ("Viande hachée de boeuf");
INSERT INTO ingredient (name_ingredient) VALUE ("Viande hachée de porc");
INSERT INTO ingredient (name_ingredient) VALUE ("Parmesan");
INSERT INTO ingredient (name_ingredient) VALUE ("Oeuf");
INSERT INTO ingredient (name_ingredient) VALUE ("Ricotta");
INSERT INTO ingredient (name_ingredient) VALUE ("Persil");
INSERT INTO ingredient (name_ingredient) VALUE ("Mie de pain");
INSERT INTO ingredient (name_ingredient) VALUE ("Oignon");
INSERT INTO ingredient (name_ingredient) VALUE ("echalote");
INSERT INTO ingredient (name_ingredient) VALUE ("cornichon");
INSERT INTO ingredient (name_ingredient) VALUE ("Moutarde");
INSERT INTO ingredient (name_ingredient) VALUE ("Citron");
INSERT INTO ingredient (name_ingredient) VALUE ("Tabasco");
INSERT INTO ingredient (name_ingredient) VALUE ("Câpres");


# -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

# Recipes Boulettes de viande gourmande

INSERT INTO recipe (name_recipe, step_recipe, id_times) VALUE (
"Boulettes de viande goumande",
"1- Préchauffer le four à 170 °C.
2- Dans une casserole, verser l’huile d’olive, ajouter l’oignon ciselé et le faire suer sans coloration. Verser les tomates concassées, le thym, l’ail écrasé et le basilic ciselé. Laisser mijoter pour faire réduire la sauce 45 min.
3- Pendant ce temps, préparer les boulettes : dans un saladier, mélanger les deux viandes avec le parmesan râpé, les œufs, la ricotta, le persil haché et la mie de pain (préalablement trempée dans du lait et pressée). Mélanger à la main et assaisonner de sel fin et de poivre du moulin. Former des boulettes à la main et les déposer dans une assiette.
4- Dans une poêle chaude, verser un trait d’huile d’olive. Déposer les boulettes et les colorer jusqu’à ce qu’elles soient bien dorées. Déposer les boulettes dans un plat et verser la sauce tomate par-dessus. Enfourner et laisser cuire 7 min. Servez chaud.",
2
);

# Quantity

INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (1,9,1,3);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (1,6,1,15);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (500,4,1,4);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (null,9,1,7);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (300,4,1,8);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (300,4,1,9);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (30,4,1,10);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (2,6,1,11);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (100,4,1,12);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (null,9,1,13);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (10,4,1,14);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (null,9,1,1);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (null,9,1,2);


# To_cook (Ingredient pour recherche)

INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,3);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,4);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,5);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,6);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,7);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,8);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,9);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,10);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,11);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,12);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,13);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,14);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (1,15);

# -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

# Recipes tartare de boeuf mélangé

INSERT INTO recipe (name_recipe, step_recipe, id_times) VALUE (
"Tartare de boeuf mélangé",
"1- Épluchez l'oignon et l'échalote et coupez-les très finement. Coupez les cornichons en tout petits morceaux. Lavez le persil.
2- Dans un saladier, mélangez successivement les jaunes d'oeufs, la moutarde et le jus de citron. Puis, versez l'huile d'olive en fouettant. Verser le Tabasco. Salez et poivez.
3- Ajoutez le steak haché dans cette préparation. Mélangez légèrement pour que la viande s'imprègne tout juste de sauce. Ajoutez les câpres, les cornichons, le persil, l'oignon et l'échalote. Mélangez à nouveau.  
4- Dressez la viande dans les assièttes, vous pouvez utiliser un fond de tarte ou un bol.",
1
);

# Quantity

INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (700,4,2,8);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (1,6,2,15);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (1,6,2,16);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (6,6,2,17);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (0.5,10,2,13);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (4,6,2,11);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (2,7,2,18);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (0.5,6,2,19);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (5,7,2,3);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (1,8,2,20);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (5,7,2,21);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (null,9,2,1);
INSERT INTO quantity (amount_quantity, id_unit_measure, id_recipe, id_ingredient) VALUE (null,9,2,2);

# To_cook (Ingredient pour recherche)

INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,8);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,15);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,16);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,17);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,13);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,11);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,18);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,19);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,3);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,20);
INSERT INTO to_cook (id_recipe, id_ingredient) VALUE (2,21);




# drop database videTonFrigo;
USE videTonFrigo;


