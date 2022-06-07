-- TP2 articles et usagers

CREATE TABLE usagers
(
    username varchar(30) NOT NULL,
	password varchar(255) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	nom VARCHAR(50) NOT NULL,
	PRIMARY KEY(username)
);

CREATE TABLE articles
(
	id INT UNSIGNED AUTO_INCREMENT,
	idAuteur varchar(30) NOT NULL,
	titre varchar(100),
    texte  LONGTEXT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(idAuteur) REFERENCES usagers(username)
);



