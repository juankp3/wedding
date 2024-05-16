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
                        Nuevo Cliente
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
                <input type="text" name="firstname" class="form-control <?php echo !empty($error['fields']['firstname'])?'is-invalid':'' ?>" value="<?php echo !empty($data['firstname'])?$data['firstname']:'' ?>"  />
                <?php if (!empty($error['fields']['firstname'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['firstname']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Apellido</label>
                <input type="text" name="lastname" class="form-control <?php echo !empty($error['fields']['lastname'])?'is-invalid':'' ?>" value="<?php echo !empty($data['lastname'])?$data['lastname']:'' ?>"  />
                <?php if (!empty($error['fields']['lastname'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['lastname']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control <?php echo !empty($error['fields']['email'])?'is-invalid':'' ?>" value="<?php echo !empty($data['email'])?$data['email']:'' ?>" />
                <?php if (!empty($error['fields']['email'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['email']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Dni</label>
                <input type="text" name="dni" class="form-control <?php echo !empty($error['fields']['dni'])?'is-invalid':'' ?>" value="<?php echo !empty($data['dni'])?$data['dni']:'' ?>" />
                <?php if (!empty($error['fields']['dni'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['dni']?></div>
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


