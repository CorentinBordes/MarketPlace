CREATE TABLE categorie (
	id INTEGER PRIMARY KEY,
	nom TEXT
);

CREATE TABLE article (
	ref INTEGER PRIMARY KEY,
	intitulé TEXT,
	categorie INTEGER,
	info TEXT,
    prix float,
	image TEXT,
	reduction float,
	FOREIGN KEY(categorie) REFERENCES categorie(id)

);

CREATE TABLE clients (
	nom varchar(100),
	prenom varchar(100),
	adresse varchar(100),
	password varchar(100)
);

--table personne
--table panier
