DROP TABLE admin;
DROP TABLE ajouter;
DROP TABLE contrat_location;
DROP TABLE contrat_employer_proprietaire;
DROP TABLE annonce;
DROP TABLE proprietaire;
DROP TABLE voiture;
DROP TABLE client;
DROP TABLE employer;
DROP TABLE personne;


CREATE TABLE admin
(
  id_dmin INT NOT NULL,
  motdepasse_admin VARCHAR(30) NOT NULL,
  nom_admin VARCHAR(30) NOT NULL,
  prenom_admin VARCHAR(30) NOT NULL,
  CONSTRAINT admin_pkey PRIMARY KEY (id_dmin)
);
CREATE TABLE ajouter
(
  date_embauche date NOT NULL
);

CREATE TABLE personne
(
  nom_personne VARCHAR(30) NOT NULL,
  prenom_personne VARCHAR(30) NOT NULL,
  date_de_nai_personne date NOT NULL,
  adresse_personne VARCHAR(60) NOT NULL,
  email_personne VARCHAR NOT NULL,
  mot_de_passe_personne VARCHAR NOT NULL,
  numero_telephone INT NOT NULL
);
CREATE TABLE employer (
  id_employer INT PRIMARY KEY NOT NULL,
  siret_agence INT NOT NULL,
  date_embauche date NOT NULL,
  salaire_employer FLOAT NOT NULL
)INHERITS (personne);
CREATE TABLE client(
 id_client INT NOT NULL,
  numero_permis INT NOT NULL,
  CONSTRAINT client_pkey PRIMARY KEY (id_client)
)INHERITS (personne);

CREATE TABLE voiture
(
  matricule VARCHAR(10) NOT NULL,
  marque VARCHAR(50) NOT NULL,
  date_mise_circulation date NOT NULL,
  kilometrage INT NOT NULL,
  energie VARCHAR(50) NOT NULL,
  CONSTRAINT voiture_pkey PRIMARY KEY (matricule)
);
CREATE TABLE proprietaire (
  id_proprietaire INT PRIMARY KEY NOT NULL,
  matricule_voitur CHAR(50),
  CONSTRAINT  matricule_voiture FOREIGN KEY (matricule_voitur)  REFERENCES voiture(matricule),
  date_de_permier_contrat date NOT NULL
)INHERITS (personne);

CREATE TABLE annonce (
  matricule_voitur CHAR(50),

  id_annonce INT PRIMARY KEY NOT NULL,
  description VARCHAR(2000) NOT NULL,
  titre VARCHAR(100) NOT NULL,
  prix FLOAT NOT NULL,
  CONSTRAINT id_employer_annonce FOREIGN KEY (id_annonce) REFERENCES employer (id_employer),
  CONSTRAINT  matricule_voiture FOREIGN KEY (matricule_voitur) REFERENCES voiture(matricule)
);
CREATE TABLE contrat_employer_proprietaire (

    matricule_voitur CHAR(50),
    id_employer_contra INT,
    id_proprietaire_contra INT,

  date_debut date NOT NULL,
  date_fin date NOT NULL,
  montant FLOAT NOT NULL,
  id_contrat INT PRIMARY KEY NOT NULL,
  CONSTRAINT  id_employer_contrat FOREIGN KEY (id_employer_contra) REFERENCES employer (id_employer),
  CONSTRAINT  id_proprietaire_contrat FOREIGN KEY (id_proprietaire_contra) REFERENCES proprietaire (id_proprietaire),
  CONSTRAINT  matricule_contrat FOREIGN KEY (matricule_voitur) REFERENCES voiture(matricule)
);

CREATE TABLE contrat_location(
 matricule CHAR(50),
 id_employer INT,
 id_client INT, 
 id_annonce INT,  
 id_contrat_location INT PRIMARY KEY NOT NULL,
 date_debut date NOT NULL,
 date_fin date NOT NULL,
 prix FLOAT NOT NULL,
 CONSTRAINT id_annonce_location FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce),
 CONSTRAINT id_client_location FOREIGN KEY (id_client) REFERENCES client(id_client),
 CONSTRAINT id_employer_location FOREIGN KEY (id_employer) REFERENCES employer(id_employer),
 CONSTRAINT matricule_location FOREIGN KEY (matricule) REFERENCES voiture(matricule)
);