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

							<?php
								$active = 'noactive';
								for ($i=0; $i < 5; $i++) {
							?>
							<!-- Item con carta -->

							<div class="list-group-item">
								<div class="row">
									<div class="col-auto">
										<!-- Avatar-->
										<div class="ct-avatar avatar avatar-sm <?php echo $i%2==0?'active':'' ?>">
											<div class="avatar-title fs-lg bg-primary-subtle rounded-circle text-primary">
												<i class="fa-regular fa-envelope"></i>
												<i class="fa-regular fa-check"></i>
											</div>
										</div>
									</div>
									<div class="col ms-n2">
										<!-- Heading -->
										<h5 class="mb-1">
											Launchday 1.4.0 update email sent
										</h5>
										<!-- Text -->
										<p class="small text-gray-700 mb-0">
											Sent to all 1,851 subscribers over a 24 hour period
										</p>
										<!-- Time -->
										<small class="text-body-secondary">
											2m ago
										</small>
									</div>
								</div> <!-- / .row -->
							</div>
							<!-- FIn con carta -->
							<?php } ?>
						</div>

					</div>

				</div>

			</div>
			<!-- FIN CARD -->
		</div>



    </div>
</div>
