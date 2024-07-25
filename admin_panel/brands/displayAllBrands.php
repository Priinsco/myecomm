<?php 
require_once __DIR__ . '/../../database.php';



        $selectAllBrands ="SELECT * FROM brands";
        $stmt = $pdo->prepare($selectAllBrands);
        $stmt->execute();


        // If the brand name does not exist, insert it into the database
        if($stmt->rowCount() > 0){
                      
            $allBrands = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            $empty = "Aucune marque enregistrée pour l'instant."; 
        }    

