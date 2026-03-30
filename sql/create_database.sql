CREATE DATABASE IF NOT EXISTS touche_pas_au_klaxon
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE touche_pas_au_klaxon;

-- TABLE AGENCE
CREATE TABLE agence (
    id_agence INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    code_postal VARCHAR(10) NOT NULL
);

-- TABLE EMPLOYE
CREATE TABLE employe (
    id_employe INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telephone VARCHAR(20),
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

-- TABLE TRAJET
CREATE TABLE trajet (
    id_trajet INT AUTO_INCREMENT PRIMARY KEY,
    id_agence_depart INT NOT NULL,
    id_agence_arrivee INT NOT NULL,
    id_employe INT NOT NULL,
    date_heure_depart DATETIME NOT NULL,
    date_heure_arrivee DATETIME NOT NULL,
    nb_places_total INT NOT NULL,
    nb_places_dispo INT NOT NULL,

    CONSTRAINT fk_depart FOREIGN KEY (id_agence_depart)
        REFERENCES agence(id_agence),

    CONSTRAINT fk_arrivee FOREIGN KEY (id_agence_arrivee)
        REFERENCES agence(id_agence),

    CONSTRAINT fk_employe FOREIGN KEY (id_employe)
        REFERENCES employe(id_employe)
);