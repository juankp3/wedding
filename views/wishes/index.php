<div class="col-12">
    <?php Flight::render('_partials/header/header.php')?>
    <div class="tab-content">



		<div class="row">
			<!-- CARD -->
			<div class="col-lg-12">

				<div class="card">



					<div class="card-header">
						<?php Flight::render('_partials/table/_partials/search.php')?>
						<?php Flight::render('_partials/table/_partials/filter.php')?>
					</div>

					<div class="card-body">

						<!-- List group -->
						<div class="list-group list-group-flush list-group-activity my-n3">

							<?php foreach ($data as $item) : ?>

								<div class="list-group-item">
									<div class="row">
										<div class="col-auto">

											<!-- Avatar-->
											<div data-id="<?php echo $item['id_wishes'] ?>" class="ct-avatar avatar avatar-sm <?php echo $item['active']==1?'active':'' ?>">
												<div class="avatar-title fs-lg bg-primary-subtle rounded-circle text-primary">
													<i class="fa-regular fa-envelope"></i>
													<i class="fa-regular fa-check"></i>
												</div>
											</div>

										</div>
										<div class="col ms-n2">
											<!-- Heading -->
											<h5 class="mb-1">
												<?php echo $item['name'] ?>
											</h5>
											<!-- Text -->
											<p class="small text-gray-700 mb-0">
												<?php echo $item['message'] ?>
											</p>
											<!-- Time -->
											<small class="text-body-secondary">
												<?php echo $item['date_add'] ?>
											</small>
										</div>
									</div> <!-- / .row -->
								</div>

							<?php endforeach ?>


						</div>

					</div>

				</div>

			</div>
			<!-- FIN CARD -->
		</div>



    </div>
</div>
