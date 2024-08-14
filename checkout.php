<?php
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
        <!-- end calling cart function -->

        <!-- second child -->
         
         <!-- third child -->
          <div class="bg-light ">
                <h3 class="text-center"><img src="http://localhost/MyEcomm/images/logo.png" alt="MyEcomm logo" class="logo"></h3>
                <p class="text-center">À votre service pour rendre votre vie plus simple. </p>
          </div>
          <!-- fourth child -->
           <div class="">
                <div class="col-md-12">
                    <div class="row">
                        <?php 
                            if(!isset($_SESSION['username'])){
                                include('users/login.php');
                            }else{
                                include('payement.php');
                            }
                        ?>
                    </div>
                </div>
           </div>
        <!-- last child -->
         <?php include("includes/footer.php") ?>
     </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>