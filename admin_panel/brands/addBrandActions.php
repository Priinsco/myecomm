<?php 
require_once __DIR__ . '/../../database.php';


if(isset($_POST['ajouter'])) {
    $brand_name = $_POST['brand_name'];

    if(!empty($brand_name)) {

        // Check if brand name already exists in the database

        $checkIfBrandNameExist ="SELECT name FROM brands WHERE name = ?";
        $stmt = $pdo->prepare($checkIfBrandNameExist);
        $stmt->execute([$brand_name]);


        // If the brand name does not exist, insert it into the database
        if($stmt->rowCount() == 0){
            // Insert the new category into the database
            $insertBrand = "INSERT INTO brands (name) VALUES (?)";
            $stmt = $pdo->prepare($insertBrand);
            $stmt->execute([$brand_name]);


            $successQuerryMessage = "Marque ajoutée avec succès.";
        }else{
            $failQuerryMessage = "Cette marque existe déjà.";
        }    
        
    }else{
        $failQuerryMessage = "Veuillez entrer un nom de marque valide.";
    }
}