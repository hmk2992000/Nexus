<!DOCTYPE html>
<html>
<head>
	<title></title>
	<base href="http://localhost/Shoes/">
    <meta charset="utf-8">
    <meta http-equiv=“X-UA-Compatible” content=“IE=edge”>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="title icon" href="./public/img/logo.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./public/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="./public/css/main.css">
	<?php require_once "./public/php/insert_css.php"; ?>

	<script src="https://apps.elfsight.com/p/platform.js" defer></script>
	<div class="elfsight-app-64648c4b-1768-454f-b2d8-316e0529a4af"></div>
</head>
<body>

	<?php require_once "./mvc/views/blocks/client/loader.php"; ?>
	<?php require_once "./mvc/views/blocks/client/navbar.php"; ?>


	<?php require_once "./mvc/views/pages/client/" . $data["page"] . ".php"; ?>


	<?php require_once "./mvc/views/blocks/client/footer.php"; ?>


	<!---------Javascript---------->
	<script src="./public/js/swiper.min.js"></script>
	<script src="./public/js/slick.min.js"></script>
	<script src="./public/js/sweetalert2.all.min.js"></script>
	<script src="./public/js/main.js"></script>
	<script src="./public/js/shop.js"></script>
	</script>
</body>
</html>