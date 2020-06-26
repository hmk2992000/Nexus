<?php
    if(isset($_POST['submittk1']))
    {
		$connect = new mysqli("localhost","root","","nexus");
     	mysqli_query($connect,"SET NAMES UTF8");
		echo 'Date from: '.$_POST['datefrom1'];
		echo ' to: '.$_POST['dateto1'];
		echo '<table class="table table-bordered">
			<thead>
			<tr>
				<th data-sortable="true">ID</th>
				<th data-sortable="true">Brand name</th>
				<th data-sortable="true">Quantity Sell</th>
			</tr>
			</thead>
			<tbody>';
	   $query3 = "SELECT product_brand.id, product_brand.name, SUM(order_details.quantity)";
	   $query3 .="FROM customer_order, order_details, product, product_brand ";
	   $query3 .=" where customer_order.id=order_details.id and order_details.product_id=product.id and product.brand_id=product_brand.id";
	   $query3 .=" and customer_order.date BETWEEN '".$_POST['datefrom1']."' AND '".$_POST['dateto1']."'";
	   $query3 .=" GROUP BY product_brand.id, product_brand.name";
	   $result3 = mysqli_query($connect,$query3);
		while($row3 = mysqli_fetch_array($result3))
		{
			echo '<tr>';			
			echo '<td>'.$row3[0].'</td>';
			echo '<td>'.$row3[1].'</td>';
			echo '<td>'.$row3[2].'</td>';	
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
?>