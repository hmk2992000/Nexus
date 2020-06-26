<?php
	class Home extends Controller {
		public $productModel;

		public function __construct() {
			$this->productModel = $this->getModel("productModel");
		}

		function showDefault() {
			//View
			$view = $this->getView("master_client", [
			"page" => "home",
			"newProducts" => $this->productModel->listNewProducts(6)
			]);
		}
	}
?>