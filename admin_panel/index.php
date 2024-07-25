<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../styles.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .adminImage{
            width: 100%;
            height: 130px;
            object-fit: contain;
            margin-left: 20px;
        }
        .border-none{
            border:none;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <div class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="">
                <div class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcom Guest</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Gérer les détails</h3>
         </div>
         <!-- third child -->
          <div class="row">
                <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                    <div>
                        <img src="../images/anana-juice.jpeg" class="adminImage" alt="Admin Image">
                        <p class="text-light text-center">Admin name</p>
                    </div>
                    <div class="button text-center">
                        <button class="border-none mb-1"><a href="products/add.php" class="nav-link text-light bg-info m-1">Ajouter des produits</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Voir les produits</a></button>
                        <button class="border-none mb-1"><a href="index.php?insert_category" class="nav-link text-light bg-info m-1">Ajouter des catégories</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Voir les vatégories</a></button>
                        <button class="border-none mb-1"><a href="index.php?insert_brand" class="nav-link text-light bg-info m-1">Ajouter des marques</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Voir les marques</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Toutes les commandes</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Tous les payements</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Liste des utilisateurs</a></button>
                        <button class="border-none mb-1"><a href="" class="nav-link text-light bg-info m-1">Se déconnecter</a></button>
                    </div>
                </div>
          </div>
          <!-- fourth child -->
           <div class="container">
                <?php 
                    if(isset($_GET['insert_category'])){
                        include("categories/add.php");
                    }
                    if(isset($_GET['insert_brand'])){
                        include("brands/add.php");
                    }
                
                ?>
           </div>
          <!-- last child -->
          <div class="bg-secondary p-2 text-center">
            <p class="tc-orange">All rights reserved &copy; - design by priince gnamin - 2024</p>
         </div>
    </div>

    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>