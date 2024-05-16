<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="" method="post" id="" enctype="multipart/form-data" accept-charset="UTF-8,ISO-8859-1,UTF-16">
                <div class="form-group">
                    <?php if (in_array(strtolower($data['type']), array('jpg','jpeg','png'))): ?>
                        <div style="padding: 8px 0;">
                            <img src="<?php echo APP_UPLOAD_FILE.$data['fullname'] ?>" style="height: 100px;">
                        </div>
                    <?php endif?>
                    <label for="fileToUpload" class="form-label">Archivo</label>
                    <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" >
                    <p class="mt-2">
                        <a href="<?php echo APP_UPLOAD_FILE . $data['fullname'] ?>">
                            <?php echo $data['name'] ?>
                        </a>
                    </p>
                </div>
                <div class="form-group">
                    <label for="shops" class="form-label">Tienda</label>
                    <select id="shops" name="shops[]" style="height: 250px;" class="form-control mb-4" multiple>
                        <?php foreach($shops as $shop):?>
                            <option value="<?php echo $shop['id_shop'] ?>" <?php if (!empty($shop['selected'])): ?> selected <?php endif ?> >
                                <?php echo $shop['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <button type="submit" name="submitFiles" class="btn btn-primary mb-2 w-100">Guardar</button>
                <a href="<?php echo BASE_URL . '/dashboard/file' ?>" class="btn w-100 btn-link text-muted mt-2">
                Cancelar
                </a>
            </form>
        </div>
    </div>
</div>



