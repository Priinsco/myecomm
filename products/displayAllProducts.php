<?php 
require_once __DIR__ . '/../../database.php';

try{
        
    // If no category or brand filter is selected, display all products
    $selectAllProducts ="SELECT * FROM products ORDER BY RAND()";
    $stmt = $pdo->prepare($selectAllProducts);
    $stmt->execute();

    // If the brand name does not exist, insert it into the database
    if($stmt->rowCount() > 0){
                      
        $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $empty = "Aucune marque enregistrée pour l'instant."; 
    }
}catch(PDOException $e){
        $faillSeach = "problème lors de la récupération des produits $e";
}