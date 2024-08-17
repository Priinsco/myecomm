<?php
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();

function cartProductQuantity(){
    Global $pdo;
    $ip = getIPAddress();
    $select_query = "SELECT * FROM cart_details WHERE ip_address = ?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip]);
    $result = $stmt->rowCount();
    return $result;
}
$cart_product_quantity = cartProductQuantity();

function cartProductTotalPrice(){
    Global $pdo;
    $ip = getIPAddress();
    $select_query = "SELECT SUM(products.price) AS total_price FROM products INNER JOIN cart_details ON products.product_id = cart_details.product_id WHERE cart_details.ip_address =?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_price'];
}

?>

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
                        <?php if(isset($_GET['details'])){
                            $path="myecomm/users/registration.php";
                        }else{
                            $path="../users/registration.php";
                        }
                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='<?php echo $path ;?>'>Register</a>
                                </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/MyEcomm/cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="text-danger"><?=$cart_product_quantity?></sup></a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">Prix Total <strong class="text-danger"><?=cartProductTotalPrice()?></strong> Fcfa</span>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Chercher un produit" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit" name="search_product" aria-label="Search">Chercher</button>
                    </form>
                </div>
            </div>
        </nav>