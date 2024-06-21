<div class="col-12">
    <?php Flight::render('_partials/header/header.php')?>
    <div class="tab-content">

		<?php Flight::render('songs/modal.php')?>

        <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
            <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
                <div class="card-header">
                    <div class="row align-items-center">
                        <?php Flight::render('_partials/table/_partials/search.php')?>
                        <?php Flight::render('_partials/table/_partials/filter.php')?>
                    </div>
                </div>

                <?php /* Flight::render('_partials/table/index.php') */ ?>


				<!-- Tabla -->
				<div class="table-responsive">
					<table class="table table-sm table-hover table-nowrap card-table">
						<thead>
							<tr>
								<?php if ($permissions['modify'] || $permissions['delete']) : ?>
									<th>
										<!-- Checkbox -->
										<div class="form-check mb-n2">
											<input class="form-check-input list-checkbox-all" id="listCheckboxAll" type="checkbox" />
											<label class="form-check-label" for="listCheckboxAll"></label>
										</div>
									</th>
								<?php endif ?>
								<?php
								$countColumn = 0;
								foreach ($header as $head) : $countColumn++; ?>
									<th <?php echo $countColumn == count($header) ? 'colspan="2"' : '' ?>>
										<a class="list-sort text-body-secondary" data-sort="item-name" href="#"><?php echo $head ?></a>
									</th>
								<?php endforeach ?>
							</tr>
						</thead>
						<tbody class="list fs-base">
							<?php foreach ($data['records'] as $item) : ?>
								<tr data-bs-toggle="modal" data-bs-target="#modalSongs" style="cursor:pointer" >
									<?php if ($permissions['modify'] || $permissions['delete']) : ?>
										<td>
											<div class="form-check">
												<input class="form-check-input list-checkbox" id="listCheckboxEleven" type="checkbox" />
												<label class="form-check-label" for="listCheckboxEleven"></label>
											</div>
										</td>
									<?php endif ?>
									<?php foreach ($item as $key => $field) : ?>
										<td>
											<span class="item-title">
												<?php
												if (is_numeric($field) && $header[$key] == 'Estado') {
													echo ($field) ? '<span class="text-success">●</span> Activo' : '<span class="text-danger">●</span> Inactivo';
												} else {
													echo $field;
												}
												?>
											</span>
										</td>
									<?php endforeach ?>

									<td class="text-end">
										<?php if ($permissions['modify'] || $permissions['delete']) : ?>
											<div class="dropdown">
												<a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-end">
													<?php if ($permissions['modify']) : ?>
														<a href="<?php echo $current_page . '/edit/' . $item[0] ?>" class="dropdown-item">
															<i class="fas fa-solid fa-pen" style="margin-right: 4px;"></i>
															Editar
														</a>
													<?php endif ?>

													<?php if ($permissions['delete']) : ?>
														<a href="<?php echo $current_page . '/delete/' . $item[0] ?>" class="dropdown-item" style="color:red;">
															<i class="fas fa-solid fa-trash" style="margin-right: 4px;"></i>
															Eliminar
														</a>
													<?php endif ?>
												</div>
											</div>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- Fin Tabla -->

				<?php Flight::render('_partials/table/_partials/pagination.php')  ?>

            </div>
        </div>
    </div>
</div>
