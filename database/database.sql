--this is the code i used to create my database on phpMyAdmin

CREATE DATABASE IF not EXISTS ITTHINK2;
use itthink2;

CREATE TABLE if not EXISTS users(
	Id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Full_Name varchar(100),
    user_name varchar(50),
    email varchar(250),
    user_password varchar(80)
);



CREATE TABLE IF NOT EXISTS Freelances(
    id_freelance int AUTO_INCREMENT PRIMARY KEY,
    nom_freelance varchar(50),
    competences varchar(500),
    user_Id int,
    FOREIGN KEY (user_Id) REFERENCES users(Id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS Catégories(
    id_categorie int AUTO_INCREMENT PRIMARY KEY,
    nom_categorie varchar(50)
);

CREATE TABLE IF NOT EXISTS Sous_Catégories(
    id_sous_categorie int AUTO_INCREMENT PRIMARY KEY,
    nom_sous_categorie varchar(50),
    id_categorie int,
    FOREIGN KEY (id_categorie) REFERENCES Catégories(id_categorie) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Projets(
    id_projet int AUTO_INCREMENT PRIMARY KEY,
    titre_projet varchar(30),
    description varchar(500),
    id_categorie int,
    id_sous_categorie int,
    user_Id int,
    FOREIGN KEY (id_categorie) REFERENCES Catégories(id_categorie) ON DELETE CASCADE ON UPDATE CASCADE,
     FOREIGN KEY (id_sous_categorie) REFERENCES Sous_Catégories(id_sous_categorie) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_Id) REFERENCES users(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS offres(
    id_offre int AUTO_INCREMENT PRIMARY KEY,
    montant int,
    delai time,
    id_freelance int,
    id_projet int,
    FOREIGN KEY (id_freelance) REFERENCES Freelances(id_freelance) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_projet) REFERENCES Projets(id_projet) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS Témoignages(
    id_temoignage int AUTO_INCREMENT PRIMARY KEY,
    commentaire varchar(200),
    user_Id int,
    FOREIGN KEY (user_Id) REFERENCES users(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

