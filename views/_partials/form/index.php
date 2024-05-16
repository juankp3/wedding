<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
        <!-- Header -->
        <div class="header mt-md-5">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                    <!-- Title -->
                    <h1 class="header-title">
                        <?php echo $title ?>
                    </h1>
                    </div>
                </div>
                <!-- / .row -->
            </div>
        </div>

        <!-- Form -->
        <form class="mb-4" action="" method="post">
            <?php Flight::render('_partials/controls/form.php') ?>
            <button type="submit" class="btn btn-primary mb-2 w-100">Guardar</button>
            <a href="<?php echo $current_page ?>" class="btn w-100 btn-link text-muted mt-2">
                Cancelar
            </a>
        </form>

        </div>
    </div>
</div>


