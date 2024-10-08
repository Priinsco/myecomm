<?php
session_start();
require("admin_panel/products/displayAllProducts.php");
// require("functions/common_function.php")


// add product to cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        Global $pdo;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM cart_details WHERE ip_address = ? AND product_id = ?";
        $stmt = $pdo->prepare($select_query);
        $stmt->execute([$ip, $get_product_id]);

        if($stmt->rowCount() > 0){
            echo "<script>alert('Cet article est déjà présent dans votre panier')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }else{
            $insert_query = "INSERT INTO cart_details (ip_address, product_id, quantity) VALUES (?,?,?)";
            $stmt = $pdo->prepare($insert_query);
            $stmt->execute([$ip, $get_product_id, 0]);
            echo "<script>alert('L'article a été ajouté dans votre panier')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}
?>
<!doctype html>
<html lang="en">
    
  <!-- html head -->
  <?php include("includes/head.php");?>
  <!-- end html head -->

  <body>
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

    </style>
    <!-- nav bar -->
     <div class="container-fluid p-0">

        <!-- first child -->
        <?php include("includes/navbar.php");?>
        <!-- calling cart function -->
         <?php cart(); ?>
        <!-- end calling cart function -->

        <!-- second child -->
         <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php 
                    if(isset($_SESSION['username'])){
                        $username=$_SESSION['username'];
                        
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='#'>Welcome $username</a>
                            </li>

                            <li class='nav-item'>
                                <a class='nav-link' href='users/logout.php'>Se deconnecter</a>
                            </li>
                        ";
                    }else{
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='#'>Welcome Guest</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='users/login.php'>Se connecter</a>
                            </li>
                        ";
                    }
                ?>

            </ul>

         </div>
         <!-- third child -->
          <div class="bg-light ">
                <h3 class="text-center">MyEcomm - Le super market</h3>
                <p class="text-center">À votre service pour rendre votre vie plus simple.</p>
          </div>
          <!-- fourth child -->
           <div class="row">
                <div class="col-md-10">
                    <!-- Products -->
                    <div class="row">
                    <?php 

                    if($stmt->rowCount() > 0){
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
                                    <p class='card-text'>Prix: $product_price Fcfa</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Ajouter au panier</a>
                                    <a href='products/viewMoreDetails.php?product_id=$product_id?details' class='btn btn-secondary'>Voir plus</a>
                                </div>
                            </div>
                        </div>";
                                
                            }
                        }elseif(isset($faillSeach)){
                            echo "<div class='col-md-12 text-center text-danger'>$faillSeach</div>";
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
                        require 'admin_panel/brands/displayAllBrands.php';
                            foreach($allBrands as $brand){
                                $brand_id = $brand['id'];
                                $brand_name = $brand['name'];
                                echo "<li class='nav-item'>
                                            <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_name</a>
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
                                            <a class='nav-link text-light' href='index.php?category=$categorie_id'>$categorie_name</a>
                                     </li>";
                                
                            }
                        ?>
                    </ul>
                </div>
           </div>
        <!-- last child -->
         <?php include("includes/footer.php") ?>
     </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>