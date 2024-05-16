<!-- NAVIGATION -->

<link rel="stylesheet" href="https://superpet.pe/themes/superpet/assets/lib/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
<nav class="navbar navbar-vertical fixed-start navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="<?php echo IMG_URL ?>/logo.svg" class="navbar-brand-img mx-auto d-none d-md-block" alt="..." >
            <img src="<?php echo IMG_URL ?>/logo.svg" class="navbar-brand-img mx-auto d-md-none" alt="..." style="max-height: 2rem">
            <p class="small text-muted mb-0 d-none d-md-block" style="padding-top: 8px;"><?php echo Flight::get('app_version')?></p>
            <!-- <div>
                <span class="badge bg-primary ms-auto"><?php echo Flight::get('app_version')?></span>
            </div> -->
        </a>
        <!-- User (xs) -->
        <div class="navbar-user d-md-none">
            <!-- Dropdown -->
            <div class="dropdown">
            <!-- Toggle -->
            <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                    <img src="https://dashkit.goodthemes.co/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                </div>
            </a>
            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
                <a href="#" class="dropdown-item">Mi Perfil</a>
                <!-- <a href="#" class="dropdown-item">Settings</a> -->
                <hr class="dropdown-divider">
                <a href="/logout" class="dropdown-item">Cerrar sesión</a>
            </div>
            </div>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <p class="small text-muted mb-0 d-md-none" style="padding-top: 8px;text-align: center;"><?php echo Flight::get('app_version')?></p>
            <!-- Navigation -->
            <ul class="navbar-nav">

                <?php
                    $menu = FrontController::getMenu();
                ?>
                <?php foreach ($menu as $key => $item):?>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarDashboards_<?php echo $key?>" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarDashboards_<?php echo $key?>">
                        <i class="fas fa-solid <?php echo $item['icon'] ?>" style="margin-right: 10px;"></i><?php echo $item['name'] ?></a>
                        <div class="collapse show" id="sidebarDashboards_<?php echo $key?>">
                            <ul class="nav nav-sm flex-column">
                                <?php foreach ($item['items'] as $link):?>
                                    <li class="nav-item">
                                        <a href="<?php echo $link['link'] ?>" class="nav-link <?php echo $link['id'] ==$active['id']?'active':'' ?>">
                                            <?php echo $link['name']?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
            <!-- Push content down -->
            <div class="mt-auto"></div>
            <!-- Customize -->
            <!-- <div id="popoverDemo">
                <a class="btn w-100 btn-primary mb-4" href="/logout" aria-controls="offcanvasDemo">
                    Cerrar sesión
                </a>
            </div> -->

            <?php
            $loggedInUser = FrontController::authenticatedUser();
            ?>

            <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="https://dashkit.goodthemes.co/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>
                <div style="display:flex;flex-direction: column;">
                    <p class="small text-muted mb-0"><?php echo $loggedInUser['fullnamne']; ?></p>
                    <p class="small text-muted mb-0"><?php echo $loggedInUser['email']; ?></p>
                </div>


            </div>
            <div id="popoverDemo">
                <a class="btn w-100 btn-primary mb-4 d-none d-md-block" href="/logout" aria-controls="offcanvasDemo">
                    Cerrar sesión
                </a>
            </div>

            <!-- <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasActivity" aria-controls="sidebarOffcanvasActivity">
                    <span class="icon">
                        <i class="fas fa-bell"></i>
                    </span>
                </a>
                <div class="dropup">
                    <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="https://dashkit.goodthemes.co/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="./profile-posts.html" class="dropdown-item">Profile</a>
                        <a href="./account-general.html" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a href="./sign-in.html" class="dropdown-item">Logout</a>
                    </div>
                </div>
                <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasSearch" aria-controls="sidebarOffcanvasSearch">
                    <span class="icon">
                        <i class="fas fa-search"></i>
                    </span>
                </a>
            </div> -->

        </div>
    </div>
</nav>
