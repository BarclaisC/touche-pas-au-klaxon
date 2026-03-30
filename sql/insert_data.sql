USE touche_pas_au_klaxon;

-- AGENCES
INSERT INTO agence (nom, adresse, ville, code_postal) VALUES
('Paris', '12 rue Lafayette', 'Paris', '75000'),
('Lyon', '5 avenue des Alpes', 'Lyon', '69000'),
('Marseille', '8 rue du Port', 'Marseille', '13000');

-- EMPLOYES
INSERT INTO employe (nom, prenom, email, telephone, mot_de_passe, role) VALUES
('Dupont', 'Marie', 'marie@test.com', '0600000000', '1234', 'admin'),
('Martin', 'Lucas', 'lucas@test.com', '0611111111', '1234', 'user'),
('Bernard', 'Sophie', 'sophie@test.com', '0622222222', '1234', 'user');

-- TRAJETS
INSERT INTO trajet (
    id_agence_depart, id_agence_arrivee, id_employe,
    date_heure_depart, date_heure_arrivee,
    nb_places_total, nb_places_dispo
) VALUES
(1, 2, 2, '2026-04-01 08:00:00', '2026-04-01 12:00:00', 4, 3),
(2, 3, 3, '2026-04-02 14:00:00', '2026-04-02 18:00:00', 3, 1);