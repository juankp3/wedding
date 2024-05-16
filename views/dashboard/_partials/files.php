
<?php if(isset($upload['error']) && $upload['error']): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo $upload['error_message'];?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif ?>

<div class="card">
  <div class="card-header">
    <!-- Title -->
    <h4 class="card-header-title">
      Archivos (<?php echo count($files)?>)
    </h4>
    <form style="display:flex;" action="" method="post" id="" enctype="multipart/form-data" accept-charset="UTF-8,ISO-8859-1,UTF-16">
      <div class="gc_marketplace_image gc_marketplace_image_file">
        <label for="select_file">
          <!-- <input name="select_file[]" id="select_file" type="file" multiple/> -->
          <input type="hidden" value="asd" name="typeXML">
          <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" >
        </label>
        <!-- <i class="more" aria-hidden="true"></i> -->

      </div>
      <button type="submit" class="btn btn-primary" style="margin-left: 16px;">Cargar</button>
    </form>



  </div>
  <!-- <div class="card-header">
    <form>
      <div class="input-group input-group-flush input-group-merge input-group-reverse">
        <input class="form-control list-search" type="search" placeholder="Search" />
        <div class="input-group-text">
          <span class="fe fe-search"></span>
        </div>
      </div>
    </form>
  </div> -->

  <div class="card-body">
    <!-- List -->
    <ul class="list-group list-group-lg list-group-flush list my-n4">
      <?php foreach($files as $file): ?>
        <li class="list-group-item">
          <div class="row align-items-center">
            <div class="col-auto">
              <!-- Avatar -->
              <a href="<?php echo BASE_URL . '/file/download/'.$file['id_file'] ?>" class="avatar avatar-lg">
                <img src="<?php echo IMG_URL ?>/download.png" alt="..." class="avatar-img rounded" />
              </a>
            </div>
            <div class="col ms-n2">
              <!-- Title -->
              <h4 class="mb-1 name">
                <!-- <a href="#!">Launchday Logo</a> -->
                <a href="<?php echo BASE_URL . '/dashboard/file/edit/' . $file['id_file'] ?>"><?php echo $file['name'] ?></a>
              </h4>
              <!-- Text -->
              <p class="card-text small text-muted mb-1">
                <?php echo $file['size_name'] ?>
              </p>
              <!-- <p> </p> -->
              <p class="card-text small text-muted mb-1">
                <b>Tiendas:</b> <?php echo !empty($file['shops_name'])?$file['shops_name']:'-' ?>
              </p>
              <!-- Time -->
              <p class="card-text small text-muted">
                <!-- Subido/Actualizado el -->
                <!-- Uploaded by Dianna Smiley on -->
                <time datetime="2018-01-03"><?php echo $file['date_upd'] ?></time>
              </p>
            </div>
            <div class="col-auto">
              <!-- <a href="#!" class="btn btn-sm btn-white d-none d-md-inline-block">
                Download
              </a> -->
            </div>

            <div class="col-auto">
              <!-- Dropdown -->
              <!-- <div class="dropdown">
                <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-solid fa-ellipsis-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end" style="">
                  <a href="#!" class="dropdown-item">
                    Action
                  </a>
                  <a href="#!" class="dropdown-item">
                    Another action
                  </a>
                  <a href="#!" class="dropdown-item">
                    Something else here
                  </a>
                </div>
              </div> -->

              <div class="dropdown">
                <a href="<?php echo BASE_URL . '/dashboard/file/delete/' . $file['id_file'] ?>" class="dropdown-ellipses dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-solid fa-trash"></i>
                </a>
              </div>

            </div>
          </div>
          <!-- / .row -->
        </li>
      <?php endforeach ?>

    </ul>
  </div>
</div>
