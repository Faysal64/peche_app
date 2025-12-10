CREATE TABLE poissons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    taille INT NOT NULL,
    poids FLOAT NOT NULL
);

INSERT INTO poissons (nom, taille, poids) VALUES
('Saumon', 40, 1.5),
('Thon', 90, 8.2),
('Truite', 30, 0.7);

CREATE TABLE localisations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    lat FLOAT NOT NULL,
    lng FLOAT NOT NULL
);