<?php
	class ProductModel extends Database {
		
		public function listAllProducts() {
			$query = "SELECT * FROM product";
			$result = mysqli_query($this->con, $query);
			$productList = array();

			while($row = mysqli_fetch_array($result)) {
				$productList[] = $row;
			}

			return json_encode($productList);
		}
		
		public function listNewProducts($number) {
			$query = "SELECT * FROM product ORDER BY id DESC LIMIT " . $number;
			$result = mysqli_query($this->con, $query);
			$productList = array();

			while($row = mysqli_fetch_array($result)) {
				$productList[] = $row;
			}

			return json_encode($productList);
		}
		
		public function getProduct($id) {
			$query = "SELECT * FROM product WHERE id ='$id'";
			$result = mysqli_query($this->con, $query);
			$product;

			while($row = mysqli_fetch_assoc($result)) {
				$product = $row;
			}

			return json_encode($product);
		}
		
		public function getProductCatId($id) {
			$query = "SELECT cat_id FROM product WHERE id ='$id'";
			$result = mysqli_query($this->con, $query);
			$cat_id;

			if(mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result);
				$cat_id = $row['cat_id'];
			}

			return json_encode($cat_id);
		}

	}
?>