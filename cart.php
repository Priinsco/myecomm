<?php
require("admin_panel/products/displayAllProducts.php");
require("functions/common_function.php");


// add product to cart function

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
            .taille_input{
                width: 80px;
            }
            .taille_input2{
                width: 160px;
            }
            .pro_img{
                width:60px;
                height:60px;
                object-fit: contain;
            }
            .update_control{
                margin-right: 663px;
                margin-bottom: 5px;
            }
            .update_control1{
                margin-right: 5px;
            }
            .update_control3{
                margin-left: -29px;
            }
            .margin_control{
                margin-left: 593px;
            }
            .update_control2_achat{
                margin-left: -673px;
            }
            .update_control1_price{
                margin-right: 600px;
            }
            .update_control2_price{
                margin-left: 550px;
            }

    </style>
    <!-- nav bar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="http://localhost/MyEcomm/images/logo.png" alt="MyEcomm logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://localhost/MyEcomm/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="indexAllProducts.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="fa-solid fa-cart-shopping"></i><sup class="text-danger"> <?=cartProductQuantity()?></sup></a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">Prix Total <strong class="text-danger"><?=cartProductTotalPrice()?></strong> Fcfa</span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- calling cart function -->
         <?php cart(); 
            updateCartProductQuantity();
            deleteSelectedProducts();
            isCartEmpty();
         ?>
        <!-- end calling cart function -->

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



        <div class="container">
            <!-- display if cart is not empty-->
            <?php if (isCartEmpty()): ?>
                <p class="alert alert-warning text-center">Votre panier est vide.</p>
                <div class="mb-5">
                    <a href="index.php"><button type='button' class='btn btn-outline-dark '>Continuer les achats</button></a>
                </div>
            <?php else: ?>
            <div class="row">
                <table class="table table-secondary">
                        <form action="" method="post">
                            <thead>
                                <div class="input-group update_control">
                                    <input type='submit' class='btn btn-outline-success update_control1' name='update_product_quantity' value='sauvegarder ces quantités'>
                                    <input type='submit' class='btn btn-outline-danger update_control2' name='delete_selected_products' value='Retirer les articles'> 
                                </div>
                            
                                <tr>
                                    <th scope="col">article</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix total</th>
                                    <th scope="col">Retirer</th>
                            </thead>
                            <tbody class="table-group-divider">
                                    <?php
                                        $ptt = 0;
                                        foreach($cart_datas as $data){
                                            $product_id = $data['product_id'];
                                            $product_qte = $data['quantity'];
                                            $product_image = $data['product_image1'];
                                            $product_name = $data['name'];
                                            $product_price = $data['price'];
                                            $ptt += $product_price ;
                                            echo"
                                            <input type='hidden' name='product_id[]' value='$product_id'>
                                                <tr>
                                                    <td scope='row'>$product_name</td>
                                                    <td><img src='admin_panel/product_images/$product_image' class='pro_img' alt='image article'></td>
                                                    <td>
                                                        <div class='input-group taille_input'>
                                                            <input type='number' name='product_quantity[$product_id]' value='$product_qte' class='form-control text-center' aria-label='Dollar amount (with dot and two decimal places)'>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class='input-group taille_input2'>
                                                            <span class='input-group-text'>Fcfa</span>
                                                            <span class='input-group-text'>$product_price</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class='form-check form-switch'>
                                                            <input class='form-check-input' type='checkbox' name='delete_product[$product_id]' role='switch' id='flexSwitchCheckDefault' >
                                                            <label class='form-check-label' for='flexSwitchCheckDefault'></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    ?>
                        </form>
                    </tbody>
                </table>
                <div class="mb-5">
                        <a href="index.php"><button type='button' class='btn btn-outline-dark '>Continuer les achats</button></a>
                        <a href="checkout.php"><button type='button' class='btn btn-outline-dark '>Passer la Commande</button></a>
                        <button type='button' class='btn update_control2_price'>
                            <input type='submit' class='btn btn-dark' value='Prix total:'>
                            <button type='button' class='btn btn-dark'><?=number_format($ptt)?> Fcf</button>
                        </button>
                        
                </div>           
            </div>
            <?php endif; ?>
        </div>







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
                                
                            }
                        }else{
                            echo "<h2 class='col-md-12 text-center text-danger'>stock épuisé votre marque préférée sera bientôt de retour</h2>";
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