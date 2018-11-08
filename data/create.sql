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

CREATE TABLE panier (--creer une fonction qui fait quantite plus 1 si deja au panier
	quantite INTEGER,
	idClient varchar(100),
	refArticle INTEGER,
	FOREIGN KEY(idClient) REFERENCES clients(id),
	FOREIGN KEY(refArticle) REFERENCES article(ref)
);

CREATE TABLE commande (
	numCommande INTEGER PRIMARY KEY,
	idClient varchar(100),
	dateCommande date,
	FOREIGN KEY(idClient) REFERENCES clients(id)
);

CREATE TABLE ligneDeCommande (
	numCommande INTEGER,
	refArticle INTEGER,
	quantite INTEGER,
	PRIMARY KEY(numCommande,refArticle),
	FOREIGN KEY(numCommande) REFERENCES commande(numCommande),
	FOREIGN KEY(refArticle) REFERENCES panier(refArticle),
	FOREIGN KEY(quantite) REFERENCES panier(quantite)
)
