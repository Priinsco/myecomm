<?php 
require_once __DIR__ . '/../../database.php';



        $selectAllProducts ="SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
        $stmt = $pdo->prepare($selectAllProducts);
        $stmt->execute();


        // If the brand name does not exist, insert it into the database
        if($stmt->rowCount() > 0){
                      
            $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            $empty = "Aucune marque enregistrée pour l'instant."; 
        }    

