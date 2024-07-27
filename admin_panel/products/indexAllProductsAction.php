<?php 
require_once __DIR__ . '/../../database.php';


        $selectAllProducts ="SELECT * FROM products ORDER BY RAND()";
        $stmt = $pdo->prepare($selectAllProducts);
        $stmt->execute();

        if($stmt->rowCount() > 0){
                      
            $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $empty = "Aucune marque enregistrée pour l'instant."; 
        }
    

?>