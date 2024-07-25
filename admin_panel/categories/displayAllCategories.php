<?php 
require_once __DIR__ . '/../../database.php';



        $selectAllCategories ="SELECT * FROM categories";
        $stmt = $pdo->prepare($selectAllCategories);
        $stmt->execute();


        // If the brand name does not exist, insert it into the database
        if($stmt->rowCount() > 0){
                      
            $allCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            $empty = "Aucune marque enregistrée pour l'instant."; 
        }    

