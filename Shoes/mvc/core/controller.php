<?php
	class Controller {
		function getModel($model) {
			require_once "./mvc/models/". $model . ".php";
			return new $model;
		}

		function getView($view, $data=[]) {
			require_once "./mvc/views/". $view . ".php";
		}
	}
?>