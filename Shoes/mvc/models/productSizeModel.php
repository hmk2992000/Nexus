<?php
	class ProductSizeModel extends Database {
		
		public function listAllSizes() {
			$query = "SELECT * FROM product_size";
			$result = mysqli_query($this->con, $query);
			$productSizeList = array();

			while($row = mysqli_fetch_array($result)) {
				$productSizeList[] = $row;
			}

		return json_encode($productSizeList);
		}

	}
?>