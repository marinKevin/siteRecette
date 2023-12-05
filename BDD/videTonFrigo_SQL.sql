create database videTonFrigo;
use videTonFrigo;

create table recipe (
    id_recipe int primary key not null auto_increment,
    name_recipe varchar(50),
    step_recipe text,
    id_times int not null
);
create table ingredient (
	id_ingredient int primary key not null auto_increment,
	name_ingredient varchar(50),
    amount_name_ingredient varchar(50)
    );
create table equipment (
    id_equipment int primary key not null auto_increment,
    name_equipment varchar(50)
);
create table style_cooking (
    id_style_cooking int primary key not null auto_increment,
    name_style varchar(50)
);
create table times (
    id_times int primary key not null auto_increment,
    prep_times int,
    waiting_times int,
    cooking_times int
);
create table contact_user (
    name_user varchar(50),
    first_name_user varchar(50),
    email_user varchar(50),
    message text
);
create table to_utilize (
	id_recipe int not null,
    id_ingredient int not null,
    primary key (id_recipe, id_ingredient)
);
create table to_use (
    id_recipe int not null,
    id_equipment int not null,
    primary key (id_recipe, id_equipment)
);
create table to_describe (
    id_recipe int not null,
    id_style_cooking int not null,
    primary key (id_recipe, id_style_cooking)
);

alter table recipe add constraint fk_id_times foreign key (id_times) references times (id_times);
alter table to_use add constraint fk_id_recipe foreign key (id_recipe) references recipe (id_recipe);
alter table to_use add constraint fk_id_equipment foreign key(id_equipment) references equipment (id_equipment);
alter table to_describe add constraint fk_id_recipe2 foreign key(id_recipe) references recipe(id_recipe);
alter table to_describe add constraint fk_id_style_cooking foreign key(id_style_cooking) references style_cooking (id_style_cooking);
alter table to_utilize add constraint fk_id_recipe3 foreign key(id_recipe) references recipe(id_recipe);
alter table to_utilize add constraint fk_id_ingredient foreign key (id_ingredient) references ingredient(id_ingredient);

