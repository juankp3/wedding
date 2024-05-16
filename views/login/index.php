<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <!-- <link rel="shortcut icon" href="/assets/favicon/favicon.ico" type="image/x-icon"> -->
        <link rel="stylesheet" href="assets/css/libs.bundle.css">
        <link rel="stylesheet" href="assets/css/theme.bundle.css" id="stylesheetLight">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js?v=1"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <style>
            body {
                display: none;
            }
        </style>
        <title>Login</title>
    </head>

    <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 col-xl-4 my-5">
                    <h1 class="display-4 text-center mb-3">Iniciar sesión</h1>
                    <p class="text-muted text-center mb-5"><?php echo Flight::get('app_version')?></p>
                    <form method="post" action="./">
                        <div class="form-group">
                            <label class="form-label">Dirección de correo electrónico</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="test@example.com">
                            <div class="invalid-feedback">Ingrese un correo válido.</div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Contraseña</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="passwd" id="passwd" class="form-control" type="password" placeholder="Contraseña">
                                <div class="invalid-feedback">Ingrese una clave válida.</div>
                            </div>
                        </div>
                        <input name="submitLogin" type="hidden" value="1">
                        <input class="btn btn-lg w-100 btn-primary mb-3" type="submit" value="Iniciar sesión" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
