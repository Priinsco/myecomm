<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .logo_login{
            width: 230px;
            margin-left: 70px;
        }
    </style>
</head>
<body>
    <!-- fonction for logo and login image -->
    <?php
        $logpicPrimaryImagePath = "logpic.jpg"; // Chemin principal 
        $logpicBackupImagePath = "../logpic.jpg"; // Chemin de secours

        $logoPrimaryImagePath = "logo.png"; // Chemin principal
        $logoBackupImagePath = "../logo.png"; // Chemin de secours

        // Vérifie si le fichier de l'image principale existe
        if (file_exists($logpicPrimaryImagePath)) {
            $logpicImagePath = $logpicPrimaryImagePath;
        } else {
            $logpicImagePath = $logpicBackupImagePath;
        }

        if (file_exists($logoPrimaryImagePath)) {
            $logoImagePath = $logoPrimaryImagePath;
        } else {
            $logoImagePath = $logoBackupImagePath;
        }

        // registration path
        $primaryRegistrationPath = "registration.php"; // Chemin de la page de registration
        $backupRegistrationPath = "users/registration.php"; // Chemin de la page de registration

        if (file_exists($primaryRegistrationPath)) {
            $registrationPath = $primaryRegistrationPath;
            } else {
            $registrationPath = $backupRegistrationPath;
        }

    ?>
    <!-- end fonction for logo and login image -->
    <section class="vh-90" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="<?php echo $logpicImagePath; ?>" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                    <form>

                    <div class="d-flex align-items-center mb-3 pb-1">
                        <img src="<?php echo $logoImagePath; ?>" alt="" class="logo_login">
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous à votre compte</h5>

                    <div data-mdb-input-init class="form-outline mb-2">
                        <input type="email" id="form2Example17" class="form-control form-control" />
                        <label class="form-label" for="form2Example17">Address email</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-2">
                        <input type="password" id="form2Example27" class="form-control form-control" />
                        <label class="form-label" for="form2Example27">Mot de posse</label>
                    </div>

                    <div class="pt-1 mb-1">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn btn-block" type="button">Se connnecter</button>
                    </div>

                    <hr>
                    <a class="small text-muted" href="#!">mot de passe oublié?</a>
                    <p class="mb-5 pb" style="color: #393f81;">Vous n'avez pas de compte? <a href="<?php echo $registrationPath; ?>">Créez un compte</a></p>
                    </form>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>