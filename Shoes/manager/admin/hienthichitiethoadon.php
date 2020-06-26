<?php
	if(isset($_POST['idcart']))
	{
		$idcart=$_POST['idcart'];
?>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<h2 style="color: black; margin-left: 35%;">Bill Details</h2>
	<?php
			//lấy tên tài khoản địa chỉ
			include('../connect.php');			$class7=new Database();
			//Lấy tên khách hàng số điện thoại
				//1 lấy tài khoản khách hàng
				$sqlusernamekh1="SELECT * FROM cart WHERE id = $idcart";
				$datalname1=$class7->query($sqlusernamekh1);
				foreach($datalname1 as $key1=>$value1){
					$name=$value1['customer_username'];
					$sum=$value1['total_price'];
					$day=$value1['date'];
				};
				//2 lấy tên với sdt khách
				$sqlusernamekh2="SELECT * FROM customer_account WHERE `username` = '$name'";
				$datalname2=$class7->query($sqlusernamekh2);
				foreach($datalname2 as $key1=>$value1){
					$name1=$value1['username'];
					$email=$value1['email'];
				};
			$sqlcart="SELECT * FROM cart WHERE id=$idcart";
			$datalcart1=$class7->query($sqlcart);
			foreach($datalcart1 as $key=>$value){
				?>
				<h4>Customer username: <?php echo $name1 ?></h4>
				<h4>Address: <?php echo $value['address'] ?></h4>
				<h4>Email: <?php echo $email ?></h4>
				<h5>-----------------------------------------------------------</h5>
				<h4>Checker: <?php echo $value['admin_username'] ?> </h4>
				<h4>Date ship: <?php echo $day; ?></h4>
				<?php
			}
	?>
	<div style="width: 100%;height: 400px">
	<table data-toggle="table">
		<thead>
			<tr>
				<th data-sortable="true">Product Name</th>
				<th data-sortable="true">Size</th>
				<th data-sortable="true">Quantity</th>
				<th data-sortable="true">Price</th>
				<th data-sortable="true">Total Price</th>
			</tr>
		</thead>
		<?php
			include('laynameproduct.php');
			$product=new search();
			$sqlcart="SELECT * FROM cart_details WHERE cart_id=$idcart";
			$datalcartdetails=$class7->query($sqlcart);
			foreach($datalcartdetails as $key=>$value){
				//Tìm tên sản phẩm
				print_r('<tr>
				<td data-sortable="true">'.$product->searchnameproduct($value['product_id']).'</td>
				<td data-sortable="true">'.$value['size'].'</td>
				<td data-sortable="true">'.$value['amount'].'</td>
				<td data-sortable="true">'.number_format($value['price']).'</td>
				<td data-sortable="true">'.number_format($value['amount']*$value['price']).'</td>							
				</tr>');
			}	
		
		?>
	</table>
	</div>
	<h2>Total: <?php echo "$ ".number_format($sum)?> </h2>
	<?php
	}
?>