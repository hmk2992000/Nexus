<?php
session_start();
//Pagination
	function paginate() {
		$con = mysqli_connect("localhost", "root", "", "nexus");

		$record_per_page = 6;
		$page = '';
		$output = '';

		if(isset($_POST["search_key"]))
		{
			$key = $_POST["search_key"];
			$query = "SELECT * FROM product WHERE name LIKE '%$key%'";
		}
		else
		{
			$query = "SELECT DISTINCT product.id, product.name, product.image, product.sale_price FROM product";

			if(isset($_POST["size"]))
				$query .= ", product_attributes";

			$query .= " WHERE product.id > 0";

			if(isset($_POST["action"])) {
				if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) 
				{
					$query .= " AND sale_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
				}

				if(isset($_POST["category"]))
				{
					$category_filter = implode("','", $_POST["category"]);
					$query .= " AND cat_id IN('" . $category_filter . "')";
				}

				if(isset($_POST["brand"]))
				{
					$brand_filter = implode("','", $_POST["brand"]);
					$query .= " AND brand_id IN('" . $brand_filter . "')";
				}

				if(isset($_POST["size"]))
				{
					$size_filter = implode("','", $_POST["size"]);
					$query .= " AND product.id=product_attributes.product_id AND product_attributes.product_size_id IN('" . $size_filter . "')";
				}
			}
		}

		if(isset($_POST["page"])) {
			$page = $_POST["page"];
		}
		else {
			$page = 1;
		}

		$start_from = ($page - 1) * $record_per_page;
		$page_query = $query . " ORDER BY id DESC";
		$query .= " ORDER BY id DESC LIMIT $start_from, $record_per_page";
		$result = mysqli_query($con, $query);

		$output .= '<div class="container">';

		while($row = mysqli_fetch_array($result)) {
			$output .= '<div class="shop-card">
							<a href="./product/detail/' . $row['id'] . '">
								<img src="./public/img/' . $row['image'] . '">
							</a>
							<div class="tittle">
								' . $row['name'] . '
							</div>
							<div class="cta">
								<div class="price">$' . $row['sale_price'] . '</div>
								<button class="btn add-to-cart-btn" onclick="addCart('.$row["id"].');">Add to Cart<span class="bg"></span></button>
							</div>
						</div>';
		}
		$output .= '</div>
					<div class="pagination">';

		$page_result = mysqli_query($con, $page_query);
		$total_records = mysqli_num_rows($page_result);
		$total_pages = ceil($total_records / $record_per_page);

		for($i = 1; $i <= $total_pages; $i++) {
			$output .= '<span class="pagination_link" id="' . $i . '">' . $i . '</span>';
		}
		$num = mysqli_num_rows($result);
		if($num == 0)
			$output .= "<p>No results found</p>";

		$output .= '</div>';
		echo $output;
	}


	// Login & Register 
	function Login() {
		
		$con = mysqli_connect("localhost", "root", "", "nexus");

		$status = false;
		 
		$username = '';
		$password = '';

		if(isset($_POST["username"])) {
			$username = $_POST["username"];
		}

		if(isset($_POST["password"])) {
			$password = $_POST["password"];
		}

		$query = "SELECT * FROM customer_account WHERE username ='$username' AND password = '$password'";
		 
		$result =  mysqli_query($con, $query);
		$rowcount = mysqli_num_rows($result);

		if ($rowcount == 1)
		{	
			//session_start();
			$_SESSION['customer_username'] = $username;
			$status = true;
		}

		echo $status;
	}

	function Logout()
	{
		if(isset($_SESSION['customer_username']))
		{
			unset($_SESSION['customer_username']);
		}
	}

	function Register() {
		$con = mysqli_connect("localhost", "root", "", "nexus");

		$status = false;
		$email = '';
		$username = '';
		$password = '';

		if(isset($_POST["email"])) {
			$email = $_POST["email"];
		}
		
		if(isset($_POST["username"])) {
			$username = $_POST["username"];
		}

		if(isset($_POST["password"])) {
			$password = $_POST["password"];
		}

		$query = "INSERT INTO customer_account VALUES('$username','$email','$password')";
		
		if(mysqli_query($con, $query))
		{	
			$_SESSION['customer_username'] = $username;
			$status = true;
		}
		
		echo $status;
	}

	function getCustomerId() {
		$username = '';
		if(isset($_POST["username"])) {
			$username = $_POST["username"];
		}
		$con = mysqli_connect("localhost", "root", "", "nexus");
		$query = "SELECT * FROM customer_account WHERE username='".$username."'";
		$result =  mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result))
		{
		    //$row = mysqli_fetch_array($result);
			$output = $row["id"];
		}
		return $output;
	}

	function getCustomerUsername() {
		$username = '';
		if(isset($_POST["username"])) {
			$username = $_POST["username"];
		}
		$con = mysqli_connect("localhost", "root", "", "nexus");
		$query = "SELECT * FROM customer_account WHERE username='".$username."'";
		$result =  mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result))
		{
		    //$row = mysqli_fetch_array($result);
			$output = $row["username"];
		}
		return $output;
	}
?>