CREATE DATABASE IF NOT EXISTS rattrapage;
USE rattrapage;

-- Table pour les commandes
CREATE TABLE IF NOT EXISTS commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    adresse TEXT NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    statut ENUM('Commande prise en compte', 'En cours', 'Réalisée', 'Annulée') DEFAULT 'Commande prise en compte',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);