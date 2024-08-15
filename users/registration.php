<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .logo_registration{
            width: 140px;
            margin-left: 1px;
        }
        .bg-orange{
            background-color: #ff9800;
        }
    </style>
</head>
<body>
<?php 
            if(isset($successQuerryMessage)){
                echo "<p class='alert alert-warning text-center'>". $successQuerryMessage ."</p>";
            }else if(isset($failQuerryMessage)){
                echo "<p class='alert alert-warning text-center mb-0'>". $failQuerryMessage ."</p>";
            }
        ?>
<section class="vh-70" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body bg-dark text-light p-5 text-center">
            
            <div class="d-flex align-items-center mb-3 pb-1">
            <h4 class="mb-3 px-2">Créer un compte</h4>
                <img src="../images/logo.png" alt="" class="logo_registration">
            </div>

            <form action="registrationActions.php" method="post" enctype="multipart/form-data">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="typeEmailX-2">Nom d'utilisateur</label>
                    <input type="text" id="typeEmailX-2" name="username" class="form-control form-control" placeholder="Entrez le nom d'utilisateur" required />
                </div>

                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="typeEmailX-2">Email</label>
                    <input type="email" id="typeEmailX-2" name="email" class="form-control form-control" placeholder="Entrez votre email" required/>
                </div>

                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="profilpic">Photo de profil</label>
                    <input type="file" id="profilpic" name="image" class="form-control form-control"/>
                </div>

                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="typePasswordX-2">Mot de passe</label>
                    <input type="password" id="typePasswordX-2" name="password" class="form-control form-control" placeholder="Choississsez un mot de passe" required/>
                </div>

                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="typePasswordX-2">Confirmez le mot de passe</label>
                    <input type="password" id="typePasswordX-2" name="confirm_pass" class="form-control form-control" placeholder="Confirmez le mot de passe" required/>
                </div>
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="address">Addresse</label>
                    <input type="text" id="address" name="address" class="form-control form-control" placeholder="Entrez votre addresse" required/>
                </div>
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="mobile">Téléphone</label>
                    <input type="text" id="mobile" name="mobile" class="form-control form-control mb-2" placeholder="Entrez votre contact" required/>
                </div>
                <input type="submit" class="btn btn btn-block bg-orange" name="submit" value="S'inscrire">
                <!-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn btn-block bg-orange" type="submit">S'inscrire</button> -->

                <hr>
                <a class="small" href="#!">mot de passe oublié?</a>
                <p class="mb-5 pb" style="color: #393f81;">Vous êtres déjà inscrit? <a href="login.php">Se connecter</a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>