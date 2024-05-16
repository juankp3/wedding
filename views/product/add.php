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
                        Nuevo Producto
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
                <label class="form-label">Producto</label>
                <input type="text" name="name" class="form-control <?php echo !empty($error['fields']['name'])?'is-invalid':'' ?>" value="<?php echo !empty($data['name'])?$data['name']:'' ?>"  />
                <?php if (!empty($error['fields']['name'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['name']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Precio</label>
                <input type="text" name="price" class="form-control <?php echo !empty($error['fields']['price'])?'is-invalid':'' ?>" value="<?php echo !empty($data['price'])?$data['price']:'' ?>"  />
                <?php if (!empty($error['fields']['price'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['price']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Codigo</label>
                <input type="text" name="barcode" class="form-control <?php echo !empty($error['fields']['barcode'])?'is-invalid':'' ?>" value="<?php echo !empty($data['barcode'])?$data['barcode']:'' ?>"  />
                <?php if (!empty($error['fields']['barcode'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['barcode']?></div>
                <?php endif?>
            </div>

            <?php /* ?>
            <div class="form-group">
                <label class="form-label">Categoria</label>
                <input type="text" name="id_category" class="form-control <?php echo !empty($error['fields']['id_category'])?'is-invalid':'' ?>" value="<?php echo !empty($data['id_category'])?$data['id_category']:'' ?>"  />
                <?php if (!empty($error['fields']['id_category'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['id_category']?></div>
                <?php endif?>
            </div>

            <div class="form-group">
                <label class="form-label">Activado</label>
                <input type="text" name="active" class="form-control <?php echo !empty($error['fields']['active'])?'is-invalid':'' ?>"  />
                <?php if (!empty($error['fields']['active'])): ?>
                    <div class="invalid-feedback"><?php echo $error['fields']['active']?></div>
                <?php endif?>
            </div>
            <?php */ ?>

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


