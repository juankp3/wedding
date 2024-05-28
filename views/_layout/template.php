<!doctype html>
<html lang="es">
    <head>
        <?php Flight::render('_layout/_partials/head.php') ?>
        <title><?php echo $title; ?></title>
    </head>

    <body style="display: block;">
        <?php Flight::render('_layout/_partials/nav.php')?>
        <?php Flight::render('_layout/_partials/javascript.php') ?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
					<?php Flight::render('_layout/_partials/notification.php') ?>
                    <?php echo $body_content; ?>
                </div>
            </div>
        </div>
    </body>
</html>


