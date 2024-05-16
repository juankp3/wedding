<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">
                  Productos
                </h4>

                <!-- Dropdown -->
                <div class="dropdown">
                  <a href="<?php echo BASE_URL . '/dashboard/product/new' ?>" class="btn  btn-sm btn-primary">
                    Nuevo
                  </a>


                  <form class="dropdown-menu dropdown-menu-end dropdown-menu-card" aria-labelledby="inviteMember">
                    <div class="card-header">
                      <!-- Title -->
                      <h4 class="card-header-title">
                        Invite a member
                      </h4>

                      <!-- Badge -->
                      <span class="badge bg-primary-soft">2 seats left</span>
                    </div>
                    <div class="card-header">
                      <div class="row g-0 align-items-center">
                        <div class="col-3">
                          <!-- Label -->
                          <label class="mb-0" for="inviteMemberName">
                            Name
                          </label>
                        </div>
                        <div class="col">
                          <!-- Input -->
                          <input class="form-control form-control-flush" id="inviteMemberName" type="text" placeholder="Full name" />
                        </div>
                      </div>
                      <!-- / .row -->
                    </div>
                    <div class="card-header">
                      <div class="row g-0 align-items-center">
                        <div class="col-3">
                          <!-- Label -->
                          <label class="mb-0" for="inviteMemberEmail">
                            Email
                          </label>
                        </div>
                        <div class="col">
                          <!-- Input -->
                          <input class="form-control form-control-flush" id="inviteMemberEmail" type="text" placeholder="Email address" />
                        </div>
                      </div>
                      <!-- / .row -->
                    </div>
                    <div class="card-footer">
                      <!-- Button -->
                      <button class="btn w-100 btn-primary" type="submit">
                        Invite member
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card-body">
                <!-- List group -->
                <div class="list-group list-group-flush my-n3">

                  <?php foreach($products as $product): ?>
                    <div class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <a href="#" class="avatar">
                            <img src="https://dashkit.goodthemes.co/assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle" />
                          </a>
                        </div>
                        <div class="col-5 ms-n2">
                          <h4 class="mb-1">
                            <a href="#"><?php echo $product['firstname']. " ".$product['lastname'] ?></a>
                          </h4>

                          <p class="small text-muted mb-0">
                            <a class="d-block text-reset text-truncate" href="mailt:<?php echo $product['email'] ?>"><?php echo $product['email'] ?></a>
                          </p>
                        </div>



                        <div class="col-auto ms-auto me-n3">


                        </div>


                        <div class="col-auto">
                          <!-- Dropdown -->


                          <div class="dropdown">
                            <a href="<?php echo BASE_URL . '/dashboard/product/delete/' . $product['id_product'] ?>" class="dropdown-ellipses dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-solid fa-trash"></i>
                            </a>
                          </div>



                        </div>
                      </div>
                      <!-- / .row -->
                    </div>
                  <?php endforeach ?>

                </div>
              </div>
            </div>
        </div>
    </div>
</div>

