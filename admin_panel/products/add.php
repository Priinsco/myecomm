<?php 
require("../categories/displayAllCategories.php");
require("../brands/displayAllBrands.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add new product</title>
     <!-- Bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../../styles.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    <div class="container">
        <h3 class="text-center mt-2">Ajouter un nouveau produit</h3>
        <form method="post" class="py-0" action="" enctype="multipart/form-data">
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_name">Nom</label>
                <input type="text" id="product_name" name="product_name" class="form-control py-0" placeholder="Entrez le nom du produit" autocomplete="off" required>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_desc">Description</label>
                <input type="text" id="product_desc" name="product_desc" class="form-control py-0" placeholder="Entrez la description du produit" autocomplete="off" required>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_keyword">Mots clé du produit</label>
                <input type="text" id="product_keywords" name="product_keyword" class="form-control py-0" placeholder="Entrez des mots clé du produit" autocomplete="off" required>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <select class="form-control py-0" value="product_category" id=""> <i class="fas fa-angle-right"></i>
                <option value="">Selectionnez une catégorie</option>
                    <?php foreach($allCategories as $categorie){
                            $categorie_id = $categorie['id'];
                            $categorie_name = $categorie['name'];

                            echo "<option value='$categorie_id'>$categorie_name</option>";
        
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <select class="form-control py-0" value="brand" id=""> <i class="fa fa-arrow-down"></i>
                <option value="">Selectionnez une marque</option>
                    <?php foreach($allBrands as $brand){
                            $brande_id = $brand['id'];
                            $brand_name = $brand['name'];

                            echo "<option value='$brande_id'>$brand_name</option>";
        
                        }
                    ?>
                </select>
            </div>
            <!-- product image 1 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_image1">Image 1 du prouit</label>
                <input type="file" id="product_image1" name="product_image1" class="form-control py-0" required>
            </div>
            <!-- product image 2 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_image2">Image 2 du prouit</label>
                <input type="file" id="product_image2" name="product_image2" class="form-control py-0" required>
            </div>
            <!-- product image 3 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_image3">Image 3 du prouit</label>
                <input type="file" id="product_image3" name="product_image3" class="form-control py-0" required>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label class="form-label" for="product_price">Prix</label>
                <input type="text" id="product_price" name="product_price" class="form-control py-0" placeholder="Entrez le prix du produit" autocomplete="off" required>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <button type="submit" name="ajouter" class="btn c-orange">Ajouter</button>
            </div>
        </form>
    </div>
</body>
</html>