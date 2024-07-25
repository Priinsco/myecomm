<?php 
require_once __DIR__ . '/../../database.php';


if(isset($_POST['ajouter'])) {
    $cat_name = $_POST['cat_name'];

    if(!empty($cat_name)) {

        // Check if category name already exists in the database

        $checkIfCatNameExist ="SELECT name FROM categories WHERE name = ?";
        $stmt = $pdo->prepare($checkIfCatNameExist);
        $stmt->execute([$cat_name]);


        // If the category name does not exist, insert it into the database
        if($stmt->rowCount() == 0){
            // Insert the new category into the database
            $insertCategorie = "INSERT INTO categories (name) VALUES (?)";
            $stmt = $pdo->prepare($insertCategorie);
            $stmt->execute([$cat_name]);


            $successQuerryMessage = "Catégorie ajoutée avec succès.";
        }else{
            $failQuerryMessage = "Cette catégorie existe déjà.";
        }    
        
    }else{
        $failQuerryMessage = "Veuillez entrer un nom de catégorie valide.";
    }
}