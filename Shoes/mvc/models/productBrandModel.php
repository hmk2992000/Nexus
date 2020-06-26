<?php
	class ProductBrandModel extends Database {
		
		public function listAllBrands() {
			$query = "SELECT * FROM product_brand";
			$result = mysqli_query($this->con, $query);
			$productBrandList = array();

			while($row = mysqli_fetch_array($result)) {
				$productBrandList[] = $row;
			}

		return json_encode($productBrandList);
		}

	}
?>