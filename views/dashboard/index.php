<?php
// echo "<pre>";
// var_dump($guestConfirm);
// echo "</pre>";
?>
<div data-bs-theme="dark">
	<div class="header pb-5">
		<div class="container-fluid">
			<div class="header-body">
				<div class="row align-items-end">
					<div class="col">
						<!-- <h6 class="header-pretitle">
                            Annual
                        </h6> -->

						<h1 class="header-title">
							Invitados
						</h1>

					</div>
					<div class="col-auto">

						<!-- Nav -->
						<ul class="nav nav-tabs header-tabs" role="tablist">
							<li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="0" role="presentation">
								<a href="#" class="nav-link text-center active" data-bs-toggle="tab" aria-selected="true" role="tab">
									<h6 class="header-pretitle">
										Confirmados
									</h6>
									<h3 class="mb-0">
										<?php echo !empty($guestConfirm['confirm']) ? $guestConfirm['confirm'] : 0 ?>
									</h3>
								</a>
							</li>
							<li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="1" role="presentation">
								<a href="#" class="nav-link text-center" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
									<h6 class="header-pretitle">
										Pendientes
									</h6>
									<h3 class="mb-0">
										<?php echo !empty($guestConfirm['pending']) ? $guestConfirm['pending'] : 0 ?>
									</h3>
								</a>
							</li>
							<li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="2" role="presentation">
								<a href="#" class="nav-link text-center" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
									<h6 class="header-pretitle">
										Totales
									</h6>
									<h3 class="mb-0">
										<?php echo !empty($guestConfirm['total']) ? $guestConfirm['total'] : 0 ?>
									</h3>
								</a>
							</li>
							<li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="2" role="presentation">
								<a href="#" class="nav-link text-center" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
									<h6 class="header-pretitle">
										No podra asistir
									</h6>
									<h3 class="mb-0">
										<?php echo !empty($guestConfirm['cancelled']) ? $guestConfirm['cancelled'] : 0 ?>
									</h3>
								</a>
							</li>
						</ul>

					</div>
				</div><!-- / .row -->
			</div> <!-- / .header-body -->

			<!-- Footer -->
			<div class="header-footer">

				<!-- Chart -->
				<!-- <div class="chart">
                    <div id="chart-tooltip" role="tooltip" class="popover bs-popover-top"
                        style="visibility: hidden; left: 318.523px; top: 216.075px; transform: translateX(-50%) translateY(-100%) translateY(-1rem);">
                        <div class="popover-arrow translate-middle-x"></div>
                        <div class="popover-content">
                            <div>
                                <h3 class="popover-header text-center text-nowrap">Mar</h3>
                            </div>
                            <div>
                                <div class="popover-body d-flex align-items-center text-nowrap justify-content-center">
                                    <span class="popover-body-indicator"
                                        style="background-color: rgb(44, 123, 229);"></span> 5k</div>
                            </div>
                        </div>
                    </div>
                </div> -->

			</div>

		</div>
	</div> <!-- / .header -->
</div>

<div class="container-fluid mt-n6">
	<div class="row">
		<div class="col-12 col-xl-12">
			<div class="form-group">
				<label for="exampleInputEmail1" class="form-label">Mensaje para los invitados</label>
				<div class="card">
					<div class="card-body">
						<form>
							<div class="form-group">
								<textarea class="form-control form-control-flush form-control-auto" data-autosize="" rows="3" placeholder="¡Hola Juan! 🎉
Nos encantaría que nos acompañaras en nuestra boda.
Para más detalles y confirmar tu asistencia, por favor visita el siguiente enlace: [enlace a la invitación]
¡Esperamos verte!
Carlos y María" style="overflow: hidden; overflow-wrap: break-word; text-align: start; height: 116px;"></textarea>
							</div>
						</form>
						<div class="row align-items-center">
							<div class="col">
								<small class="text-body-secondary">0/500</small>
							</div>
							<div class="col-auto"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- / .row -->
</div>
