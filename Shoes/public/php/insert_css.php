<?php
	$css_name = "";
	switch ($data["page"]) {
		case "products":
			$css_name = "shop";
			break;
		case "detail":
			$css_name = "details";
			break;
		case "cart":
			$css_name = "cart";
			break;
		case "checkout":
			$css_name = "checkout";
			break;
		case "blog":
			$css_name = "blog";
			break;
		default:
			
			break;
	}
	if(!empty($css_name)) {
		echo '<link rel="stylesheet" type="text/css" href="./public/css/' . $css_name . '.css">';
	}
?>