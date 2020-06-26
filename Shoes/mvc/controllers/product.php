<?php
	class Product extends Controller {
		public $productModel;
		public $productBrandModel;
		public $categoryModel;
		public $productSizeModel;

		public function __construct() {
			$this->productModel = $this->getModel("productModel");
			$this->productBrandModel = $this->getModel("productBrandModel");
			$this->categoryModel = $this->getModel("categoryModel");
			$this->productSizeModel = $this->getModel("productSizeModel");
		}

		function showDefault() {
			//View
			$view = $this->getView("master_client", [
			"page" => "products",
			"brands" => $this->productBrandModel->listAllBrands(),
			"categories" => $this->categoryModel->listAllCategories(),
			"sizes" => $this->productSizeModel->listAllSizes()
			]);
		}

		function search($keyword) {
			//View
			$view = $this->getView("master_client", [
			"page" => "products",
			"brands" => $this->productBrandModel->listAllBrands(),
			"categories" => $this->categoryModel->listAllCategories(),
			"sizes" => $this->productSizeModel->listAllSizes(),
			"search_key" => $keyword
			]);
		}

		function detail($id) {
			$product_cat_id = $this->productModel->getProductCatId($id);
			//View
			$view = $this->getView("master_client", [
			"page" => "detail",
			"category" => $this->categoryModel->getNameCategory($product_cat_id),
			"product" => json_decode($this->productModel->getProduct($id), true)
			]);
		}
	}

?>