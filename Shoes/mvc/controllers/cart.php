<?php
	class Cart extends Controller {
		 

		public function __construct() {
			
		}

		function showDefault() {
			//View
			$view = $this->getView("master_client", [
			"page" => "cart"
			 
			]);
		}
	}
?>