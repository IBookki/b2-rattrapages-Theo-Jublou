<?php
$host = 'localhost';
$dbname = 'rattrapage';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS commandes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        adresse TEXT NOT NULL,
        telephone VARCHAR(15) NOT NULL,
        prix DECIMAL(10, 2) NOT NULL,
        statut ENUM('Commande prise en compte', 'En cours', 'Réalisée', 'Annulée') DEFAULT 'Commande prise en compte',
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>