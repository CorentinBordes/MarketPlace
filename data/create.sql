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
	id varchar(100) PRIMARY KEY,
	password varchar(100),
	administrateur boolean
);

CREATE TABLE panier (
	id varchar(100) PRIMARY KEY,
	listeObjet INTEGER,
	idClient varchar(100),
	refArticle INTEGER,
	FOREIGN KEY(idClient) REFERENCES clients(id),
	FOREIGN KEY(refArticle) REFERENCES article(ref)
);
