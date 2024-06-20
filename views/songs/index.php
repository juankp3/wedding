<div class="col-12">
    <?php Flight::render('_partials/header/header.php')?>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
            <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
                <div class="card-header">
                    <div class="row align-items-center">
                        <?php Flight::render('_partials/table/_partials/search.php')?>
                        <?php Flight::render('_partials/table/_partials/filter.php')?>
                    </div>
                </div>
                <?php Flight::render('_partials/table/index.php')?>
                <?php Flight::render('_partials/table/_partials/pagination.php')?>
<!--
				<div class="table-responsive">
					<table class="table table-sm table-hover table-nowrap card-table">
						<thead>
							<tr>
								<th>

									<div class="form-check mb-n2">
										<input class="form-check-input list-checkbox-all" id="listCheckboxAll" type="checkbox" />
										<label class="form-check-label" for="listCheckboxAll"></label>
									</div>
								</th>
								<th>
									<a class="list-sort text-body-secondary" data-sort="item-name" href="#">Canción</a>
								</th>
								<th>
									<a class="list-sort text-body-secondary" data-sort="item-title" href="#">Votos</a>
								</th>
							</tr>
						</thead>
						<tbody class="list fs-base">
							<tr>
								<td>

									<div class="form-check">
										<input class="form-check-input list-checkbox" id="listCheckboxEleven" type="checkbox" />
										<label class="form-check-label" for="listCheckboxEleven"></label>
									</div>
								</td>
								<td>

									<span class="item-title">La Bicicleta - Shakira</span>
								</td>
								<td>

									<span class="item-title">2</span>
								</td>
								<td class="text-end">

									<div class="dropdown">
										<a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
								</td>
							</tr>


						</tbody>
					</table>
				</div>
Checkbox -->



            </div>
        </div>
    </div>
</div>
