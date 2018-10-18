CREATE TABLE article (
	ref INTEGER PRIMARY KEY,
	intitulé TEXT,
	categorie INTEGER,
	info TEXT,
	image TEXT,
	FOREIGN KEY(categorie) REFERENCES categorie(id)
);
CREATE TABLE categorie (
	id INTEGER PRIMARY KEY,
	nom TEXT
);
