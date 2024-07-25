<?php 
require_once __DIR__ . '/../../database.php';


if(isset($_POST['ajouter'])) {
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    $status = "true";

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing images tmp name
    $product_image1_tmp = $_FILES['product_image1']['tmp_name'];
    $product_image2_tmp = $_FILES['product_image2']['tmp_name'];
    $product_image3_tmp = $_FILES['product_image3']['tmp_name'];


    
    if(!empty($product_name) && !empty($product_desc) 
        && !empty($product_keywords) && !empty($product_category) 
        && !empty($product_brand) && !empty($product_price) 
        && !empty($product_image1) && !empty($product_image2) 
        && !empty($product_image3)){

            
        // Move the uploaded images to the product images folder
        move_uploaded_file($product_image1_tmp, "../product_images/$product_image1");
        move_uploaded_file($product_image2_tmp, "../product_images/$product_image2");
        move_uploaded_file($product_image3_tmp, "../product_images/$product_image3");

        // Insert product into the database
        $insertProductQuery = "INSERT INTO products (name, description, keywords, category_id, brand_id, price, product_image1, product_image2, product_image3, status) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($insertProductQuery);
        $stmt->execute([$product_name, $product_desc, $product_keywords, $product_category, $product_brand, $product_price, $product_image1, $product_image2, $product_image3,$status]);
        
        if($stmt){
            $successQuerryMessage = "Produit ajouté avec succès.";
        }
    }else{
        $failQuerryMessage = "Veuillez remplir tous les champs.";
    }
}