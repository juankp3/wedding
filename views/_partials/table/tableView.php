<div class="card-body">
    <!-- List group -->
    <div class="list-group list-group-flush my-n3">

        <?php if(!empty($data['records'])): ?>
            <?php foreach($data['records'] as $item): ?>
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
                        <a href="#"><?php echo $item['title'] ?></a>
                        </h4>

                        <p class="small text-muted mb-0">
                        <a class="d-block text-reset text-truncate" href="mailt:<?php echo $item['subtitle'] ?>"><?php echo $item['subtitle'] ?></a>
                        </p>
                    </div>

                    <div class="col-auto ms-auto me-n3"></div>


                    <div class="col-auto">
                        <div class="dropdown">
                        <a href="<?php echo BASE_URL . '/dashboard/user/delete/' . $item['id'] ?>" class="dropdown-ellipses dropdown-toggle" role="button"  aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-solid fa-trash"></i>
                        </a>
                        </div>
                    </div>
                    </div>
                    <!-- / .row -->
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
