<?php
require_once 'controller.php';

if (!isset($_GET['action'])) {
    header('Location: index.php');
    exit;
}

switch ($_GET['action']) {
    case 'create_order':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requiredFields = ['nom', 'prenom', 'email', 'adresse', 'telephone', 'base', 'ingredient1', 'ingredient2', 'ingredient3', 'ingredient4'];
            $missingFields = [];
            
            foreach ($requiredFields as $field) {
                if (empty($_POST[$field])) {
                    $missingFields[] = $field;
                }
            }
            
            if (!empty($missingFields)) {
                header('Location: index.php?page=commande&error=missing_fields');
                exit;
            }
            
            $orderData = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone']
            ];
            
            $orderId = createCommande($orderData);
            
            if ($orderId) {
                header('Location: index.php?page=liste&success=order_created');
            } else {
                header('Location: index.php?page=commande&error=creation_failed');
            }
        } else {
            header('Location: index.php?page=commande');
        }
        break;
        
    case 'update_status':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commande_id']) && isset($_POST['statut'])) {
            $commandeId = intval($_POST['commande_id']);
            $statut = $_POST['statut'];
            
            $updated = updateCommandeStatus($commandeId, $statut);
            
            if ($updated) {
                header('Location: index.php?page=liste&success=status_updated');
            } else {
                header('Location: index.php?page=liste&error=update_failed');
            }
        } else {
            header('Location: index.php?page=liste');
        }
        break;
        
    default:
        header('Location: index.php');
        break;
}
?>