<?php 
require_once __DIR__ . '/../../database.php';

try{
        // specific category filter
        if(isset($_GET['category'])){
            $category_id = $_GET['category']; 

            $selectAllProducts ="SELECT * FROM products WHERE category_id = ? ORDER BY RAND() LIMIT 0,9";
            $stmt = $pdo->prepare($selectAllProducts);
            $stmt->execute([$category_id]);
        }else{
        
            // If no category or brand filter is selected, display all products
            $selectAllProducts ="SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
            $stmt = $pdo->prepare($selectAllProducts);
            $stmt->execute();
    
            }


        // specific brand filter
        if(isset($_GET['brand'])){
            $brand_id = $_GET['brand']; 

            $selectAllProducts ="SELECT * FROM products WHERE brand_id = ? ORDER BY RAND() LIMIT 0,9";
            $stmt = $pdo->prepare($selectAllProducts);
            $stmt->execute([$brand_id]);
        }

        // specific search filter
        try{
        if(isset($_GET['search_product'])){
            $product_keywords =htmlspecialchars( $_GET['search']); 

            $selectAllProducts ="SELECT * FROM products WHERE keywords like '%$product_keywords%'  ORDER BY RAND() LIMIT 0,9";
            $stmt = $pdo->prepare($selectAllProducts);
            $stmt->execute();
        }
    }catch(PDOException $e){
        $faillSeach = "Entrez des mots clés qui ne contiennent pas de caractères spéciaux comme des appostrophes (<span class='text-warning'>'</span>) par exemple";
    }

        // If the brand name does not exist, insert it into the database
    if($stmt->rowCount() > 0){
                      
        $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $empty = "Aucune marque enregistrée pour l'instant."; 
    }    
    
}catch(PDOException $e){
    echo "echec";
}