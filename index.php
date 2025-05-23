<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mongoo - Click & Collect</title>
    
</head>
<body>
    <header>
        <h1>Mongoo</h1>
        <p>Commandez votre salade personnalisée et récupérez-la en restaurant</p>
    </header>
    <nav>
        <a href="index.php?page=accueil">Accueil</a>
        <a href="index.php?page=commande">Commander</a>
        <a href="index.php?page=liste">Liste des commandes</a>
    </nav>

    <div class="container">
        <?php
        switch($page) {
            case 'accueil':
                ?>
                <h2>Bienvenue chez Mongoo</h2>
                <p>Commandez des maintenant votre salade</p>
                <?php
                break;
            
            case 'commande':
                ?>
                <h2>Passer une commande</h2>
                <form action="actions.php?action=create_order" method="post">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <textarea id="adresse" name="adresse" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone :</label>
                        <input type="tel" id="telephone" name="telephone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="base">Base de salade :</label>
                        <select id="base" name="base" required>
                            <option value="">Choisir une base</option>
                            <option value="Laitue">Laitue</option>
                            <option value="Roquette">Roquette</option>
                            <option value="Épinards">Épinards</option>
                            <option value="Mélange printanier">Mélange printanier</option>
                        </select>
                    </div>
                    
                    <h3>Choisissez 4 ingrédients:</h3>
                    <div class="form-group">
                        <label for="ingredient1">Ingrédient 1 :</label>
                        <select id="ingredient1" name="ingredient1" required>
                            <option value="">Choisir un ingrédient</option>
                            <option value="Tomates">Tomates</option>
                            <option value="Concombres">Concombres</option>
                            <option value="Maïs">Maïs</option>
                            <option value="Poivrons">Poivrons</option>
                            <option value="Carottes">Carottes</option>
                            <option value="Avocat">Avocat</option>
                            <option value="Poulet">Poulet</option>
                            <option value="Jambon">Jambon</option>
                            <option value="Œuf">Œuf</option>
                            <option value="Fromage">Fromage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ingredient2">Ingrédient 2 :</label>
                        <select id="ingredient2" name="ingredient2" required>
                            <option value="">Choisir un ingrédient</option>
                            <option value="Tomates">Tomates</option>
                            <option value="Concombres">Concombres</option>
                            <option value="Maïs">Maïs</option>
                            <option value="Poivrons">Poivrons</option>
                            <option value="Carottes">Carottes</option>
                            <option value="Avocat">Avocat</option>
                            <option value="Poulet">Poulet</option>
                            <option value="Jambon">Jambon</option>
                            <option value="Œuf">Œuf</option>
                            <option value="Fromage">Fromage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ingredient3">Ingrédient 3 :</label>
                        <select id="ingredient3" name="ingredient3" required>
                            <option value="">Choisir un ingrédient</option>
                            <option value="Tomates">Tomates</option>
                            <option value="Concombres">Concombres</option>
                            <option value="Maïs">Maïs</option>
                            <option value="Poivrons">Poivrons</option>
                            <option value="Carottes">Carottes</option>
                            <option value="Avocat">Avocat</option>
                            <option value="Poulet">Poulet</option>
                            <option value="Jambon">Jambon</option>
                            <option value="Œuf">Œuf</option>
                            <option value="Fromage">Fromage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ingredient4">Ingrédient 4 :</label>
                        <select id="ingredient4" name="ingredient4" required>
                            <option value="">Choisir un ingrédient</option>
                            <option value="Tomates">Tomates</option>
                            <option value="Concombres">Concombres</option>
                            <option value="Maïs">Maïs</option>
                            <option value="Poivrons">Poivrons</option>
                            <option value="Carottes">Carottes</option>
                            <option value="Avocat">Avocat</option>
                            <option value="Poulet">Poulet</option>
                            <option value="Jambon">Jambon</option>
                            <option value="Œuf">Œuf</option>
                            <option value="Fromage">Fromage</option>
                        </select>
                    </div>
                    
                    <button type="submit">Commander</button>
                </form>
                <?php
                break;
            
            case 'liste':
                require_once 'controller.php';
                $commandes = getAllCommandes();
                ?>
                <h2>Liste des commandes</h2>
                <?php if ($commandes && count($commandes) > 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($commandes as $commande): ?>
                                <tr>
                                    <td><?php echo $commande['id']; ?></td>
                                    <td><?php echo htmlspecialchars($commande['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($commande['prenom']); ?></td>
                                    <td><?php echo $commande['prix']; ?> €</td>
                                    <td>
                                        <?php 
                                        $statusClass = '';
                                        switch($commande['statut']) {

                                            case 'En cours':
                                                $statusClass = 'status-encours';
                                                break;
                                            case 'Réalisée':
                                                $statusClass = 'status-realise';
                                                break;
                                            case 'Annulée':
                                                $statusClass = 'status-annule';
                                                break;
                                        }
                                        ?>
                                        <span class="<?php echo $statusClass; ?>">
                                            <?php echo htmlspecialchars($commande['statut']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $commande['date_creation']; ?></td>
                                    <td>
                                        <form action="actions.php?action=update_status" method="post">
                                            <input type="hidden" name="commande_id" value="<?php echo $commande['id']; ?>">
                                            <select name="statut">
                                                <option value="En cours" <?php if($commande['statut'] == 'En cours') echo 'selected'; ?>>En cours</option>
                                                <option value="Réalisée" <?php if($commande['statut'] == 'Réalisée') echo 'selected'; ?>>Réalisée</option>
                                                <option value="Annulée" <?php if($commande['statut'] == 'Annulée') echo 'selected'; ?>>Annulée</option>
                                            </select>
                                            <button type="submit">Mettre à jour</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Aucune commande enregistrée.</p>
                <?php endif; ?>
                <?php
                break;
            
            default:
                echo "<h2>Page non trouvée</h2>";
                break;
        }
        ?>
    </div>

</body>
</html>