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



<?php Flight::render('_partials/modal.php') ?>
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
