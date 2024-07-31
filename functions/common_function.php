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

// select cart product quantity function

function cartProductQuantity(){
    Global $pdo;
    $ip = getIPAddress();
    $select_query = "SELECT * FROM cart_details WHERE ip_address = ?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip]);
    $result = $stmt->rowCount();
    return $result;
}

// select cart product total price function

function cartProductTotalPrice(){
    Global $pdo;
    $ip = getIPAddress();
    $select_query = "SELECT SUM(products.price) AS total_price FROM products INNER JOIN cart_details ON products.product_id = cart_details.product_id WHERE cart_details.ip_address =?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_price'];
}

// select cart product details function

function cartProductDetails(){
    Global $pdo;
    $ip = getIPAddress();
    $select_query = "SELECT * FROM products INNER JOIN cart_details ON products.product_id = cart_details.product_id WHERE cart_details.ip_address =?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip]);
    $cart_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cart_datas;
}

$cart_datas = cartProductDetails();