<?php 
require_once __DIR__ . '/../database.php';


if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product_infos=false;

    if(!empty($product_id)) {

        // Check if category name already exists in the database

        $selectProduct ="SELECT * FROM products WHERE product_id = ?";
        $stmt = $pdo->prepare($selectProduct);
        $stmt->execute([$product_id]);

        if($stmt->rowCount() > 0){
            $product_infos = $stmt->fetch(PDO::FETCH_ASSOC);

            //select product brand and category details
            $selectBrand ="SELECT name FROM brands WHERE id =?";
            $stmt = $pdo->prepare($selectBrand);
            $stmt->execute([$product_infos['brand_id']]);
            $brand_name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];

        }else{
            $failQuerryMessage = "Cet article n'existe pas.";
        }    
        
    }else{
        $failQuerryMessage = "Selectionnez un article qui vous intéresse.";
    }
}