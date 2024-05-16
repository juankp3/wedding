<!doctype html>
<html lang="en">
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
                    <?php echo $body_content; ?>
                </div>
            </div>
        </div>
    </body>
</html>


