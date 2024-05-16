<div class="col-12">
    <?php Flight::render('_partials/header/header.php')?>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
            <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
                <div class="card-header">
                    <div class="row align-items-center">
                        <?php Flight::render('_partials/table/_partials/search.php')?>
                        <?php // Flight::render('_partials/table/_partials/per-page.php')?>
                        <?php Flight::render('_partials/table/_partials/filter.php')?>
                    </div>
                </div>
                <?php Flight::render('_partials/table/index.php')?>
                <?php Flight::render('_partials/table/_partials/pagination.php')?>
            </div>
        </div>
    </div>
</div>
