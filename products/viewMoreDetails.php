<?php
require("../admin_panel/products/displayAllProducts.php");
require("viewMoreDetailsActions.php");


?>
<!doctype html>
<html lang="en">
    
  <!-- html head -->
  <?php include("../includes/head.php");
  ?>
  <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.logo{
    width: 10%;
    height: 10%;
}
.card-img-top{
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.c-orange{
    background-color: orange;
    font-size: 20px;
}
.tc-orange{
    color: orange;
    font-size: 20px;
}
.lar_30{
    width: 30px;
}

/* carousel style */

.container img{
    width: 650px;
    height: 450px;
    object-fit: contain;
}
.container{
    width: 650px;
    height: 450px;
    margin-right: 3px;
}

  </style>
  <!-- end html head -->

  <body>
    <!-- nav bar -->
     <div class="container-fluid p-0">

        <!-- first child -->
        <?php include("../includes/navbar.php");
        ?>

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
                <h3 class="text-center">MyEcomm store</h3>
                <p class="text-center">La communication est au coeur de l'ecommerce et de la communauté</p>
          </div>
          <!-- fourth child -->
           <div class="row">
                <div class="col-md-10">
                    <!-- Products -->
                    <div class="row">
                        <!-- card and carousel for product details -->
                        <?php


                        if($product_infos){
                                                                
                            $product_id = $product_infos['product_id'];
                            $product_name = $product_infos['name'];
                            $product_desc = $product_infos['description'];
                            $product_price = $product_infos['price'];
                            $product_image1 = $product_infos['product_image1'];
                            $product_image2 = $product_infos['product_image2'];
                            $product_image3 = $product_infos['product_image3'];
                            $brand_name;

                            // card
                            echo "<div class='col-md-4 mb-1'>
                                        <div class='card'>
                                            <img src='../admin_panel/product_images/$product_image1' class='card-img-top' alt='...'>
                                            <div class='card-body'>
                                                <h5 class='card-title bg-dark tc-orange text-center'>$product_name</h5>
                                                <p class='card-text bg-dark text-light text-center'>$product_desc.</p>
                                                <p class='card-text bg-dark text-light text-center'>Marque: <span class='tc-orange'>$brand_name</span></p>
                                                <p class='card-text bg-dark text-light text-center'>Prix: <span class='tc-orange'>$product_price</span> Fcfa</p>
                                                <a href='../index.php?add_to_cart=$product_id' class='btn btn-info mx-4'>Ajouter au panier</a>
                                                <a href='../index.php' class='btn btn-dark mx-0'>Retour</a>
                                            </div>
                                        </div>
                                    </div>";


                                
                                    // carousel
                                        echo "
                                        
                                        
                                                <div class='container'>
                                    <div id='carouselExampleDark' class='carousel carousel-dark slide'>
                                        <div class='carousel-indicators'>
                                            <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                                            <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='1' aria-label='Slide 2'></button>
                                            <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='2' aria-label='Slide 3'></button>
                                        </div>
                                        <div class='carousel-inner c_inner'>
                                            <div class='carousel-item active' data-bs-interval='1000'>
                                            <img src='../admin_panel/product_images/$product_image1' class='d-block w-100' alt='...'>
                                            </div>
                                            <div class='carousel-item' data-bs-interval='1000'>
                                            <img src='../admin_panel/product_images/$product_image2' class='d-block w-100' alt='...'>
                                            </div>
                                            <div class='carousel-item data-bs-interval='1000''>
                                            <img src='../admin_panel/product_images/$product_image3' class='d-block w-100' alt='...'>
                                            </div>
                                        </div>
                                        <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleDark' data-bs-slide='prev'>
                                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                            <span class='visually-hidden'>Previous</span>
                                        </button>
                                        <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleDark' data-bs-slide='next'>
                                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                            <span class='visually-hidden'>Next</span>
                                        </button>
                                    </div>
                                </div>";
                                        
                                    
                            } else{
                                echo "<h2 class='col-md-12 text-center text-danger'>stock épuisé votre marque préférée sera bientôt de retour</h2>";
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
                        require '../admin_panel/brands/displayAllBrands.php';
                            foreach($allBrands as $brand){
                                $brand_id = $brand['id'];
                                $brand_name = $brand['name'];
                                echo "<li class='nav-item'>
                                            <a class='nav-link text-light' href='../index.php?brand=$brand_id'>$brand_name</a>
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
                        require '../admin_panel/categories/displayAllCategories.php';
                        foreach($allCategories as $categorie){
                            $categorie_id = $categorie['id'];
                            $categorie_name = $categorie['name'];
                                echo "<li class='nav-item'>
                                            <a class='nav-link text-light' href='../index.php?category=$categorie_id'>$categorie_name</a>
                                     </li>";
                                
                            }
                        ?>
                    </ul>
                </div>
           </div>
        <!-- last child -->
         <?php include("../includes/footer.php") ?>
     </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>