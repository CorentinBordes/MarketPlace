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
	FOREIGN KEY(categorie) REFERENCES categorie(id)
);
