<?php
// echo "<pre>";
// var_dump($current_page);
// echo "</pre>";
$invitation = $_ENV['BASE_URL']. '/boda/angelica-y-luis';
?>
<div class="header">
    <div class="header-body" style="padding-top: 8px;">
        <div class="row align-items-center">
            <div class="col">
                <a href="<?php echo $invitation?>" target="_blank" class="btn btn-outline-primary mb-2 btn-sm"> Ver invitación
                    <i class="fas fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
            <hr class="mt-1 mb-4">
        </div>
        <div class="row align-items-center">
            <div class="col">
                <!-- Pretitle -->
                <!-- <h6 class="header-pretitle">
                    <a href="#" target="_blank" class="btn btn-outline-primary mb-2 btn-sm"> Ver invitación </a>
                </h6> -->
                <h6 class="header-pretitle">
                    OVERVIEW
                </h6>
                <!-- Title -->
                <h1 class="header-title text-truncate">
                    <?php echo $title ?>
                </h1>

            </div>

            <div class="col-auto">
                <!-- Navigation (button group) -->


                <!-- <div class="nav btn-group d-inline-flex" role="tablist">
                    <button class="btn btn-white active" id="contactsListTab" data-bs-toggle="tab" data-bs-target="#contactsListPane" role="tab" aria-controls="contactsListPane" aria-selected="true">
                        <span class="fe fe-list"></span>
                    </button>
                    <button class="btn btn-white" id="contactsCardsTab" data-bs-toggle="tab" data-bs-target="#contactsCardsPane" role="tab" aria-controls="contactsCardsPane" aria-selected="false" tabindex="-1">
                        <span class="fe fe-grid"></span>
                    </button>
                </div> -->


                <!-- / .nav -->
                <!-- Buttons -->
                <?php if ($permissions['create']): ?>
                    <a href="<?php echo $current_page . '/new
                    ' ?>" class="btn btn-primary ms-2">
                        Nuevo
                    </a>
                <?php endif ?>
            </div>
        </div>


        <!-- <div class="row align-items-center">
            <div class="col">
                <ul class="nav nav-tabs nav-overflow header-tabs">
                    <li class="nav-item">
                        <a href="#!" class="nav-link text-nowrap active"> Todos los usuarios <span class="badge rounded-pill text-bg-secondary-subtle">823</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#!" class="nav-link text-nowrap"> Your contacts <span class="badge rounded-pill text-bg-secondary-subtle">231</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#!" class="nav-link text-nowrap"> Deleted <span class="badge rounded-pill text-bg-secondary-subtle">22</span> </a>
                    </li>
                </ul>
            </div>
        </div> -->


    </div>
</div>
