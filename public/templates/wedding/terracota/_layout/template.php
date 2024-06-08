<!DOCTYPE html>
<html lang="es">

<head>
	<?php Flight::render('../../widgets/analytics.php') ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<title><?php echo $og['title']; ?></title>
	<meta name="description" content="<?php echo $og['description'] ?>" />

	<!-- OpenGraph -->
	<meta property="og:locale" content="es_PE" />
	<meta property="og:type" content="product" />
	<meta property="og:title" content="<?php echo $og['title']; ?>" />
	<meta property="og:url" content="<?php echo $og['url']; ?>" />
	<meta property="og:description" content="<?php echo $og['description'] ?>" />
	<meta property="og:image" content="<?php echo $og['image']; ?>" />
	<!-- end OpenGraph -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>/public/dist/css/terracota.min.css?v=90">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Incluye jQuery -->
	<script type="module" src="<?php echo BASE_URL ?>/public/dist/js/bundle.min.js?v=90"></script>
	<script src="https://cdn.jsdelivr.net/npm/add-to-calendar-button@2" async defer></script>

	<script type="text/javascript">
		var app = {
			'urls': {
				'base_url': '<?php echo BASE_URL ?>',
				'js_url': '<?php echo JS_URL ?>',
				'img_url': '<?php echo IMG_URL ?>'
			}
		}
	</script>
</head>

<body class="body-envelope">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWX9BDDL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php echo $body_content; ?>
</body>

</html>
