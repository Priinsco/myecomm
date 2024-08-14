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

// update cart product quantity function

// function updateCartProductQuantity(){
//     if(isset($_POST['update_product_quantity'])){
//         Global $pdo;
//         $quantity = $_POST['product_quantity'];
//         $ip = getIPAddress();
//         $get_product_id = $_POST['product_id'];

//             $update_query = "UPDATE cart_details SET quantity = ? WHERE product_id = ? AND ip_address = ?";
//             $stmt = $pdo->prepare($update_query);
//             $stmt->execute([$quantity, $get_product_id, $ip]);

//         echo "<script>alert('ip_addresse: $ip, quantité : $quantity, product_id: $get_product_id')</script>";
//         echo "<script>window.open('cart.php', '_self')</script>";
//     }
// }
function updateCartProductQuantity(){
    if (isset($_POST['update_product_quantity'])) {
        $ip = getIPAddress();
        Global $pdo;
        $product_ids = $_POST['product_id'];
        $product_quantities = $_POST['product_quantity'];

        foreach ($product_ids as $product_id) {
            if (isset($product_quantities[$product_id])) {
                $quantity = $product_quantities[$product_id];
                
                $update_query = "UPDATE cart_details SET quantity = ? WHERE product_id = ? AND ip_address = ?";
                $stmt = $pdo->prepare($update_query);
                $stmt->execute([$quantity, $product_id, $ip]);

                echo "<script>alert('quantité mise à jour')</script>";
               
            }
        }
        echo "<script>window.open('cart.php', '_self')</script>";
    }
}

// verify if cart is not empty
function isCartEmpty() {
    global $pdo;
    $ip = getIPAddress();

    // Préparer la requête pour sélectionner les éléments du panier
    $select_query = "SELECT COUNT(*) FROM cart_details WHERE ip_address = ?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip]);

    // Récupérer le nombre d'éléments dans le panier
    $count = $stmt->fetchColumn();

    // Vérifier si le panier est vide ou non
    if ($count > 0) {
        return false; // Le panier n'est pas vide
    } else {
        return true;  // Le panier est vide
    }
}

// delete cart product function
function deleteSelectedProducts(){
    if (isset($_POST['delete_selected_products'])) {
        $ip = getIPAddress();
        global $pdo;

        // Vérifiez si des produits ont été sélectionnés pour suppression
        if (isset($_POST['delete_product'])) {
            $products_to_delete = $_POST['delete_product'];

            foreach ($products_to_delete as $product_id => $value) {
                // Supprimez le produit de la base de données
                $delete_query = "DELETE FROM cart_details WHERE product_id = ? AND ip_address = ?";
                $stmt = $pdo->prepare($delete_query);
                $stmt->execute([$product_id, $ip]);

                echo "<script>alert('Produit supprimé avec succès : $product_id')</script>";
            }

            // Rechargez la page pour mettre à jour le panier
            echo "<script>window.open('cart.php', '_self')</script>";
        } else {
            echo "<script>alert('Aucun produit sélectionné pour suppression.')</script>";
        }
     }
}