<script>
	$(document).ready(function() {
		console.log("ready!");
		$("a[data-bs-toggle").click(function() {
			const data = $(this).data()
			$("#exampleModalLabel").html(data.name)
			console.log('data', data.name)
		})

		$(".nav-link").click(function() {
			$(".nav-link").removeClass('active')
			$(this).addClass('active')
		})
	});
</script>
<style>
	/* .table-responsive {
		height: 100vh;
		overflow-y: auto;
	}

	.table thead th {
		position: sticky;
		top: 0;
		background-color: #fff;
		z-index: 1;
	} */


	.nav-tabs {
		overflow-x: auto;
		overflow-y: hidden;
		white-space: nowrap;
		flex-wrap: nowrap;
		border: 0;
	}

	.nav-item {
		flex: 0 0 auto;
	}

	.nav-tabs::-webkit-scrollbar {
		display: none;
		/* Oculta la barra de desplazamiento en navegadores WebKit */
	}

	.sticky-top {
		position: -webkit-sticky;
		position: sticky;
		top: 0;
		z-index: 1020;
		/* Asegura que la barra de navegación esté por encima del contenido */
	}
</style>


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

<?php Flight::render('_partials/nav.php') ?>
<div class="container-xl" style="margin-top: 80px;">
	<br>


	<div class="table-responsive">
		<?php Flight::render('_partials/table.php') ?>
	</div>
</div>

<!-- <div class="container-xxl">
	100% wide until extra extra large breakpoint <br>
</div> -->

<!-- <div class="container mt-5 ">
	<div class="table-responsive">

	</div>
</div> -->
