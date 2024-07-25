<?php 
require("admin_panel/products/displayAllProducts.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyEcomm</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
      <link rel="stylesheet" href="styles.css">
  
</head>
  <body>
    <!-- nav bar -->
     <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="images/logo.png" alt="MyEcomm logo image" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
         <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Se connecter</a>
                </li>

            </ul>

         </div>
         <!-- third child -->
          <div class="bg-light ">
                <h3 class="text-center">Hiden store</h3>
                <p class="text-center">La communication est au coeur de l'ecommerce et de la communauté</p>
          </div>
          <!-- fourth child -->
           <div class="row">
                <div class="col-md-10">
                    <!-- Products -->
                    <div class="row">
                    <?php 

                    foreach($allProducts as $product){
                                $product_id = $product['product_id'];
                                $product_name = $product['name'];
                                $product_desc = $product['description'];
                                $product_price = $product['price'];
                                $product_image1 = $product['product_image1'];
                                echo "<div class='col-md-4 mb-1'>
                            <div class='card'>
                                <img src='admin_panel/product_images/$product_image1' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_name</h5>
                                    <p class='card-text'>$product_desc.</p>
                                    <p class='card-text'>Prix: $product_price Fcfa</p>
                                    <a href='#' class='btn btn-info'>Ajouter au panier</a>
                                    <a href='#' class='btn btn-secondary'>Voir plus</a>
                                </div>
                            </div>
                        </div>";
                                
                            }
                    ?>
                    </div>
                </div>
                <div class="col-md-2 bg-secondary p-0">
                    <!-- sidenav -->
                     <!-- brands to be displyaed -->
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item c-orange">
                            <a class="nav-link text-light" href="#">Livraison de marques</a>
                        </li>
                        <?php
                        require 'admin_panel/brands/displayAllBrands.php';
                            foreach($allBrands as $brand){
                                $brand_id = $brand['id'];
                                $brand_name = $brand['name'];
                                echo "<li class='nav-item'>
                                            <a class='nav-link text-light' href='index.php?$brand_id'>$brand_name</a>
                                     </li>";
                                
                            }
                        ?>
                    </ul>
                    <!-- categories to be displayed -->
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item c-orange">
                            <a class="nav-link text-light" href="#">Catégories</a>
                        </li>
                        <?php
                        require 'admin_panel/categories/displayAllCategories.php';
                        foreach($allCategories as $categorie){
                            $categorie_id = $categorie['id'];
                            $categorie_name = $categorie['name'];
                                echo "<li class='nav-item'>
                                            <a class='nav-link text-light' href='index.php?$categorie_id'>$categorie_name</a>
                                     </li>";
                                
                            }
                        ?>
                    </ul>
                </div>
           </div>
        <!-- last child -->
         <div class="bg-info p-3 text-center">
            <p>All rights reserved &copy; - design by priince gnamin - 2024</p>
         </div>
     </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>