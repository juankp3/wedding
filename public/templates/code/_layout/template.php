<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- <meta name="format-detection" content="telephone=no"> -->
	<script type="text/javascript">
		var app = {
			'urls': {
				'base_url': '<?php echo BASE_URL ?>',
				'js_url': '<?php echo JS_URL ?>',
				'img_url': '<?php echo IMG_URL ?>'
			}
		}
	</script>
	<script type="text/javascript">
		const jsonData = <?php echo json_encode($guests) ?>
	</script>
	<script type="text/javascript">
		const token = '<?php echo $token ?>'
	</script>
	<script type="text/javascript">
		const guestsObject = jsonData.reduce((acc, guest) => {
			acc[guest.id_guest] = guest;
			return acc;
		}, {});
	</script>

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> -->


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo JS_URL ?>/code.js?v=1"></script>




	<title>Listado de invitados</title>
</head>

<body class="body-envelope">
	<?php echo $body_content; ?>
</body>

</html>
