<div class="modal fade" id="modalSongs" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-card card" data-list="{&quot;valueNames&quot;: [&quot;name&quot;]}">
					<div class="card-header">

						<!-- Title -->
						<h4 class="card-header-title" id="exampleModalCenterTitle">
							Invitados que sugirieron la canción
						</h4>

						<!-- Close -->
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

					</div>
					<div class="card-header">

						<!-- Form -->
						<form>
							<div class="input-group input-group-flush input-group-merge input-group-reverse">
								<input class="form-control list-search" type="search" placeholder="Buscar">
								<div class="input-group-text">
									<i class="fas fa-search "></i>
								</div>
							</div>
						</form>

					</div>
					<div class="card-body">

						<!-- List group -->
						<ul class="list-group list-group-flush list my-n3">
							<?php for ($i=0; $i<4; $i++) { ?>
							<li class="list-group-item">
								<div class="row align-items-center">
									<div class="col-auto">

									</div>
									<div class="col ms-n2">

										<!-- Title -->
										<h4 class="mb-1 name">
											<a href="../profile-posts.html">Miyah Myles</a>
										</h4>
									</div>
									<div class="col-auto">

										<!-- Button -->
										<a href="#!" class="btn btn-sm btn-white">
											Add
										</a>

									</div>
								</div> <!-- / .row -->
							</li>
							<?php } ?>

						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
