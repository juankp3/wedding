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
    <title>Tienda</title>
  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
          <h1 class="display-4 text-center mb-3">PLANOGRAMA</h1>
          <p class="text-muted text-center mb-5">Shop Seller</p>
          <form class="mb-4" action="" method="post">
            <div class="form-group">
              <label class="form-label">Tienda</label>
              <select name="shop" class="form-select mb-3" onchange="this.form.submit()">
                <option value="">Selecione</option>
                <?php foreach($shops as $shop): ?>
                    <option value="<?php echo $shop['id_shop'] ?>" <?php if ($shop['id_shop'] == $shopId): ?>selected <?php endif?> >
                        <?php echo $shop['name']?>
                    </option>
                <?php endforeach?>
              </select>
            </div>
          </form>

          <div class="card">
            <div class="card-header">
              <h4 class="card-header-title">Archivos</h4>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-lg list-group-flush list my-n4">
                <?php foreach($files as $file): ?>
                  <li class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <a href="<?php echo BASE_URL . '/file/download/' . $file['id_file'] ?>" class="avatar avatar-lg">
                          <img src="<?php echo IMG_URL ?>/download.png" alt="..." class="avatar-img rounded" />
                        </a>
                      </div>
                      <div class="col ms-n2">
                        <h4 class="mb-1 name">
                          <a href="<?php echo APP_UPLOAD_FILE . $file['fullname'] ?>"  target="_blank"><?php echo $file['name']?></a>
                        </h4>
                        <p class="card-text small text-muted mb-1">
                          <?php echo $file['size_name'] ?>
                        </p>
                        <p class="card-text small text-muted">
                          <time datetime="<?php echo $file['date_upd']?>"><?php echo $file['date_upd']?></time>
                        </p>
                      </div>
                      <div class="col-auto">
                        <a href="<?php echo APP_UPLOAD_FILE . $file['fullname'] ?>" target="_blank" class="btn btn-sm btn-white d-none d-md-inline-block">
                            Vista previa
                        </a>
                      </div>
                      <div class="col-auto"></div>
                    </div>
                  </li>
                <?php endforeach?>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>