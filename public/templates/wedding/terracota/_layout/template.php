<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script type="text/javascript">
		var app = {
			'urls': {
				'base_url': '<?php echo BASE_URL ?>',
				'js_url': '<?php echo JS_URL ?>',
				'img_url': '<?php echo IMG_URL ?>'
			}
		}
	</script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="<?php echo BASE_URL ?>/public/dist/css/terracota.min.css?v=23">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Incluye jQuery -->
	<script type="module" src="<?php echo BASE_URL ?>/public/dist/js/bundle.min.js?v=23"></script>
	<title><?php echo $title; ?></title>
</head>

<body class="body-envelope">
	<?php echo $body_content; ?>
</body>

</html>
