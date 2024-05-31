<script>
	$(document).ready(function() {
		console.log("ready!");
		$("a[data-bs-toggle").click(function() {
			const data = $(this).data()
			$("#exampleModalLabel").html(data.name)
			console.log('data', data.name)
		})
	});
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-fullscreen-sm-down">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							2 Pases
							<div class="row">
								<div class="col-8 col-sm-6">Level 2: .col-8 .col-sm-6</div>
								<div class="col-4 col-sm-6">Level 2: .col-4 .col-sm-6</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">.col-md-4</div>
						<div class="col-md-4 ms-auto">.col-md-4 .ms-auto</div>
					</div>
				</div>
				...
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<nav class="navbar bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
			Lista de Invitados
		</a>
	</div>
</nav>



<div class="container-xl">
	<br>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active position-relative" aria-current="page" href="#">
				Todos
				<span class="badge text-bg-secondary">50</span>
				<!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
					99+
					<span class="visually-hidden">unread messages</span>
				</span> -->
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link position-relative" href="#">Pendientes
				<span class="badge text-bg-secondary">10</span>
				<!--
				<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
					99+
					<span class="visually-hidden">unread messages</span>
				</span> -->
			</a>

		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Confirmados
				<span class="badge text-bg-secondary">30</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Cancelados
				<span class="badge text-bg-secondary">5</span>
			</a>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link disabled" aria-disabled="true">Disabled</a>
		</li> -->
	</ul>
	<br>
	<div class="table-responsive">
		<?php Flight::render('table.php') ?>
	</div>
</div>

<!-- <div class="container-xxl">
	100% wide until extra extra large breakpoint <br>
</div> -->

<!-- <div class="container mt-5 ">
	<div class="table-responsive">

	</div>
</div> -->
