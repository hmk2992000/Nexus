<?php
	class CategoryModel extends Database {
		
		public function listAllCategories() {
			$query = "SELECT * FROM category";
			$result = mysqli_query($this->con, $query);
			$categoryList = array();

			while($row = mysqli_fetch_array($result)) {
				$categoryList[] = $row;
			}

			return json_encode($categoryList);
		}
		
		public function getIdCategory($name) {
			$query = "SELECT id FROM category WHERE name = '$name'";
			$result = mysqli_query($this->con, $query);
			$id;

			if(mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result);
				$id = $row['id'];
			}
			
			return json_encode($id);
		}
		
		public function getNameCategory($id) {
			$query = "SELECT name FROM category WHERE id = $id";
			$result = mysqli_query($this->con, $query);
			$name;
			if(mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result);
				$name = $row['name'];
			}

			return json_encode($name);
		}

	}
?>