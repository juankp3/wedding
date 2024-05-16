<div class="tab-pane fade" id="contactsCardsPane" role="tabpanel" aria-labelledby="contactsCardsTab">
    <!-- Cards -->
    <div data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 9, "pagination": {"paginationClass": "list-pagination"}}' id="contactsCards">
        <!-- Header -->
        <div class="row align-items-center mb-4">
            <div class="col">
                <!-- Form -->
                <form>
                    <div class="input-group input-group-lg input-group-merge input-group-reverse">
                        <input class="form-control list-search" type="search" placeholder="Search" />
                        <span class="input-group-text">
                            <i class="fe fe-search"></i>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-auto me-n3">
                <!-- Select -->
                <form>
                    <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                        <div class="form-select form-select-sm form-control-flush">
                            <select class="form-select form-select-sm form-control-flush form-control" data-choices='{"searchEnabled": false}' hidden="" tabindex="-1" data-choice="active">
                                <option value="9 per page" data-custom-properties="[object Object]">9 per page</option>
                            </select>
                            <div class="choices__list choices__list--single">
                                <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="9 per page" data-custom-properties="[object Object]" aria-selected="true">9 per page</div>
                            </div>
                        </div>
                        <div class="choices__list dropdown-menu" aria-expanded="false">
                            <div class="choices__list" role="listbox">
                                <div
                                    class="choices__item dropdown-item choices__item--selectable is-highlighted"
                                    data-select-text="Press to select"
                                    data-choice=""
                                    data-choice-selectable=""
                                    data-id="1"
                                    data-value="9 per page"
                                    role="option"
                                    aria-selected="true"
                                >
                                    9 per page
                                </div>
                                <div class="choices__item dropdown-item choices__item--selectable" data-select-text="Press to select" data-choice="" data-choice-selectable="" data-id="2" data-value="All" role="option">
                                    All
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <button class="btn btn-sm btn-white" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-sliders me-1"></i> Filter <span class="badge bg-primary ms-1 d-none">0</span>
                    </button>
                    <!-- Menu -->
                    <form class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                        <div class="card-header">
                            <!-- Title -->
                            <h4 class="card-header-title">
                                Filters
                            </h4>
                            <!-- Link -->
                            <button class="btn btn-sm btn-link text-reset d-none" type="reset">
                                <small>Clear filters</small>
                            </button>
                        </div>
                        <div class="card-body">
                            <!-- List group -->
                            <div class="list-group list-group-flush mt-n4 mb-4">
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Text -->
                                            <small>Title</small>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Select -->
                                            <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                                                <div class="form-select form-select-sm">
                                                    <select class="form-select form-select-sm form-control" name="item-title" data-choices='{"searchEnabled": false}' hidden="" tabindex="-1" data-choice="active">
                                                        <option value="*" data-custom-properties="[object Object]">Any</option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="*" data-custom-properties="[object Object]" aria-selected="true">Any</div>
                                                    </div>
                                                </div>
                                                <div class="choices__list dropdown-menu" aria-expanded="false">
                                                    <div class="choices__list" role="listbox">
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable is-highlighted"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="1"
                                                            data-value="*"
                                                            role="option"
                                                            aria-selected="true"
                                                        >
                                                            Any
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="2"
                                                            data-value="Designer"
                                                            role="option"
                                                        >
                                                            Designer
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="3"
                                                            data-value="Developer"
                                                            role="option"
                                                        >
                                                            Developer
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="4"
                                                            data-value="Owner"
                                                            role="option"
                                                        >
                                                            Owner
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="5"
                                                            data-value="Founder"
                                                            role="option"
                                                        >
                                                            Founder
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Text -->
                                            <small>Lead scrore</small>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Select -->
                                            <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                                                <div class="form-select form-select-sm">
                                                    <select class="form-select form-select-sm form-control" name="item-score" data-choices='{"searchEnabled": false}' hidden="" tabindex="-1" data-choice="active">
                                                        <option value="*" data-custom-properties="[object Object]">Any</option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="*" data-custom-properties="[object Object]" aria-selected="true">Any</div>
                                                    </div>
                                                </div>
                                                <div class="choices__list dropdown-menu" aria-expanded="false">
                                                    <div class="choices__list" role="listbox">
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable is-highlighted"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="1"
                                                            data-value="*"
                                                            role="option"
                                                            aria-selected="true"
                                                        >
                                                            Any
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="2"
                                                            data-value="1/10"
                                                            role="option"
                                                        >
                                                            1+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="3"
                                                            data-value="2/10"
                                                            role="option"
                                                        >
                                                            2+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="4"
                                                            data-value="3/10"
                                                            role="option"
                                                        >
                                                            3+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="5"
                                                            data-value="4/10"
                                                            role="option"
                                                        >
                                                            4+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="6"
                                                            data-value="5/10"
                                                            role="option"
                                                        >
                                                            5+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="7"
                                                            data-value="6/10"
                                                            role="option"
                                                        >
                                                            6+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="8"
                                                            data-value="7/10"
                                                            role="option"
                                                        >
                                                            7+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="9"
                                                            data-value="8/10"
                                                            role="option"
                                                        >
                                                            8+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="10"
                                                            data-value="9/10"
                                                            role="option"
                                                        >
                                                            9+
                                                        </div>
                                                        <div
                                                            class="choices__item dropdown-item choices__item--selectable"
                                                            data-select-text="Press to select"
                                                            data-choice=""
                                                            data-choice-selectable=""
                                                            data-id="11"
                                                            data-value="10/10"
                                                            role="option"
                                                        >
                                                            10
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn w-100 btn-primary" type="submit">
                                Apply filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / .row -->
        <!-- Body -->
        <div class="list row">
            <div class="col-12 col-md-6 col-xl-4">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Header -->
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Checkbox -->
                                <div class="form-check form-check-circle">
                                    <input class="form-check-input list-checkbox" type="checkbox" id="cardsCheckboxOne" />
                                    <label class="form-check-label" for="cardsCheckboxOne"></label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
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
                                </div>
                            </div>
                        </div>
                        <!-- / .row -->
                        <!-- Image -->
                        <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                            <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="..." />
                        </a>
                        <!-- Body -->
                        <div class="text-center mb-5">
                            <!-- Heading -->
                            <h2 class="card-title">
                                <a class="item-name" href="profile-posts.html">Dianna Smiley</a>
                            </h2>
                            <!-- Text -->
                            <p class="small text-body-secondary mb-3"><span class="item-title">Designer</span> at <span class="item-company">Twitter</span></p>
                            <!-- Buttons -->
                            <a class="btn btn-sm btn-white" href="tel:1-123-456-7890"> <i class="fe fe-phone me-1"></i> Call </a>
                            <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com"> <i class="fe fe-mail me-1"></i> Email </a>
                        </div>
                        <!-- Divider -->
                        <hr class="card-divider mb-0" />
                        <!-- List group -->
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <!-- Text -->
                                        <small>Company</small>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Text -->
                                        <small>Twitter</small>
                                    </div>
                                </div>
                                <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <!-- Text -->
                                        <small>Lead Score</small>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Badge -->
                                        <span class="item-score badge text-bg-danger-subtle">1/10</span>
                                    </div>
                                </div>
                                <!-- / .row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="row g-0">
            <!-- Pagination (prev) -->
            <ul class="col list-pagination-prev pagination pagination-tabs justify-content-start">
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="fe fe-arrow-left me-1"></i> Prev </a>
                </li>
            </ul>
            <!-- Pagination -->
            <ul class="col list-pagination pagination pagination-tabs justify-content-center">
                <li class="active"><a class="page" href="#" data-i="1" data-page="9">1</a></li>
                <li><a class="page" href="#" data-i="2" data-page="9">2</a></li>
            </ul>
            <!-- Pagination (next) -->
            <ul class="col list-pagination-next pagination pagination-tabs justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="#"> Next <i class="fe fe-arrow-right ms-1"></i> </a>
                </li>
            </ul>
        </div>
        <!-- Alert -->
        <div class="list-alert alert alert-dark alert-dismissible border fade" role="alert">
            <!-- Content -->
            <div class="row align-items-center">
                <div class="col">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" id="cardAlertCheckbox" type="checkbox" checked="" disabled="" />
                        <label class="form-check-label text-white" for="cardAlertCheckbox"> <span class="list-alert-count">0</span> deal(s) </label>
                    </div>
                </div>
                <div class="col-auto me-n3">
                    <!-- Button -->
                    <button class="btn btn-sm bg-white text-white bg-opacity-20 bg-opacity-15-hover">
                        Edit
                    </button>
                    <!-- Button -->
                    <button class="btn btn-sm bg-white text-white bg-opacity-20 bg-opacity-15-hover">
                        Delete
                    </button>
                </div>
            </div>
            <!-- / .row -->
            <!-- Close -->
            <button type="button" class="list-alert-close btn-close" aria-label="Close"></button>
        </div>
    </div>
</div>
