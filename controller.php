<?php
require_once 'config/db.php';

function getAllCommandes() {
    global $pdo;
    try {
        $stmt = $pdo->query('SELECT * FROM commandes ORDER BY date_creation DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des commandes: " . $e->getMessage();
        return [];
    }
}

function getCommandeById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare('SELECT * FROM commandes WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération de la commande: " . $e->getMessage();
        return false;
    }
}

function createCommande($data) {
    global $pdo;
    
    try {

        $prix = rand(800, 1500) / 100;
        
        $stmt = $pdo->prepare('INSERT INTO commandes (nom, prenom, email, adresse, telephone, prix, statut) VALUES (:nom, :prenom, :email, :adresse, :telephone, :prix, "Commande prise en compte")');
        
        $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $data['adresse'], PDO::PARAM_STR);
        $stmt->bindParam(':telephone', $data['telephone'], PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
        
        $stmt->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        echo "Erreur lors de la création de la commande: " . $e->getMessage();
        return false;
    }
}