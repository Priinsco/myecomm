<?php 
// require_once __DIR__ . '../../database.php';
require("../database.php");

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    
    if(!empty($username) && !empty($email) 
        && !empty($password) && !empty($confirm_pass) 
        && !empty($address) && !empty($mobile)){

        // check if password and confirm password match
        if($password === $confirm_pass){
            // check if email already exists in the database
            $checkIfEmailExist ="SELECT email FROM users WHERE email =?";
            $stmt = $pdo->prepare($checkIfEmailExist);
            $stmt->execute([$email]);
            if($stmt->rowCount() == 0){
                // hashing password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Move the uploaded images to the product images folder
                if(!empty($_FILES['image']['name'])){
                    // accessing images
                    $user_image = $_FILES['image']['name'];

                    // accessing images tmp name
                    $user_image_tmp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($user_image_tmp, "$user_image");

                    // Insert product into the database
                    $createUserQuery = "INSERT INTO users (name, email, password, image, ip, address, mobile) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $pdo->prepare($createUserQuery);
                    $stmt->execute([$username, $email, $hashed_password, $image, $ip, $address, $mobile]);

                }else{
                    $createUserQuery = "INSERT INTO users (name, email, password, ip, address, mobile) VALUES (?,?,?,?,?,?)";
                    $stmt = $pdo->prepare($createUserQuery);
                    $stmt->execute([$username, $email, $hashed_password, $ip, $address, $mobile]);
                }

                // select cart items of the user who just registered
                $selectCartItems = "SELECT * FROM cart_details WHERE ip_address =?";
                $stmt = $pdo->prepare($selectCartItems);
                $stmt->execute([$ip]);
                if($stmt->rowCount() > 0){
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;

                    echo "<script>alert('Compte crée avec succès, vous avez des articles dans votre panier')</script>";
                    echo "<script>window.open('../index.php', '_self')</script>";
                }else{
                    // Display success message and redirect to the login page
                    echo "<script>alert('Compte crée avec succès')</script>";
                    echo "<script>window.open('../index.php', '_self')</script>";
                }
                
            }else{
                $failQuerryMessage="Cette adresse email est indisponible.";
            }    
        }else{
            echo "<script>alert('echec sur le mot de passe>";
            $failQuerryMessage="Les mots de passe ne correspondent pas.";
        }  
        
    
    }else{
            $failQuerryMessage = "Veuillez remplir tous les champs.";
    }
}