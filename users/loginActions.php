<?php
session_start();
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
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    // verified password match hashed password in database
     $select_query = "SELECT * FROM users WHERE email =?";
     $stmt = $pdo->prepare($select_query);
     $stmt->execute([$user_email]);
     // Check if user exists in the database
     if($stmt->rowCount() > 0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result && password_verify($user_password, $result['password'])){
                    
             // Set session
                $_SESSION['username'] = $result['name'];
                $_SESSION['user_email'] = $result['email'];

                echo ($_SESSION['user_email']);
        
                // Redirect to home page
                $successQuerryMessage= "vous êtres connectés.";
                // verified if current connected user has not empty cart
                $select_query = "SELECT COUNT(*) FROM cart_details WHERE ip_address =?";
                $stmt = $pdo->prepare($select_query);
                $stmt->execute([$ip]);
                if($stmt->fetchColumn() > 0){
                    echo "<script>window.open('payement.php', '_self')</script>";
                } else{
                    echo "<script>window.open('profile.php', '_self')</script>";
                }
             
         }else{
            $failQuerryMessage= "Mot de passe incorrect.";
            echo "<script>alert('Mot de passe incorrect.'); window.location.href = document.referrer;</script>";          
         }

     }else{
        $failQuerryMessage= "Email invalide.";
        echo "<script>alert('Email invalide.'); window.location.href = document.referrer;</script>"; 
     }
}