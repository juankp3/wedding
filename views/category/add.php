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
                        Nueva Categoria
                    </h1>
                    </div>
                </div>
                <!-- / .row -->
            </div>
        </div>

        <!-- Form -->
        <form class="mb-4" action="" method="post">
            <!-- Project name -->
            <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control <?php echo !empty($error['fields']['name'])?'is-invalid':'' ?>" value="<?php echo !empty($data['name'])?$data['name']:'' ?>"  />
                <?php if (!empty($error['fields']['name'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['name']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Descripcion</label>
                <input type="text" name="description" class="form-control <?php echo !empty($error['fields']['description'])?'is-invalid':'' ?>" value="<?php echo !empty($data['description'])?$data['description']:'' ?>"  />
                <?php if (!empty($error['fields']['description'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['description']?></div>
                <?php endif?>
            </div>

            <button type="submit" class="btn btn-primary mb-2 w-100">Guardar</button>
            <a href="<?php echo $current_page ?>" class="btn w-100 btn-link text-muted mt-2">
                Cancelar
            </a>
        </form>

        <?php
            // if (!empty($error)) {
            //     echo $error['message'];
            // }
        ?>

        </div>
    </div>
</div>


