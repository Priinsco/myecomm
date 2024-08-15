<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .logo_login{
            width: 230px;
            margin-left: 70px;
        }
    </style>
</head>
<body>
    <section class="vh-90" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="logpic.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                    <form>

                    <div class="d-flex align-items-center mb-3 pb-1">
                        <img src="images/logo.png" alt="" class="logo_login">
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous à votre compte</h5>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="form2Example17" class="form-control form-control" />
                        <label class="form-label" for="form2Example17">Address email</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="form2Example27" class="form-control form-control" />
                        <label class="form-label" for="form2Example27">Mot de posse</label>
                    </div>

                    <div class="pt-1 mb-4">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn btn-block" type="button">Se connnecter</button>
                    </div>

                    <a class="small text-muted" href="#!">mot de passe oublié?</a>
                    <p class="mb-5 pb" style="color: #393f81;">Vous n'avez pas de compte? <a href="#!"
                        style="color: #393f81;">Créez un compte ici</a></p>
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