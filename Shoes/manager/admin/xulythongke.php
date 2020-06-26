<?php
    if(isset($_POST['submittk']))
    {
		$connect = new mysqli("localhost","root","","nexus");
     	mysqli_query($connect,"SET NAMES UTF8");
			$tongsl=0;
			$tongtien=0;
			echo 'Date from: '.$_POST['datefrom'];
			echo ' to '.$_POST['dateto'];
			echo '<table class="table table-bordered">
			<thead>
			<tr>
				<th data-sortable="true">Brand ID</th>
				<th data-sortable="true">Product ID</th>
				<th data-sortable="true">Product name</th>
				<th data-sortable="true">Quantity</th>
				<th data-sortable="true">Total</th>
			</tr>
			</thead>
			<tbody>';
	   		$catalog_id=$_POST['types'];
	  		$query2 = "SELECT product_brand.id, product.id, product.name, SUM(order_details.quantity), product.sale_price";
	   		$query2 .= " FROM customer_order, order_details, product, product_brand";
	  		$query2 .= " WHERE customer_order.id=order_details.id and order_details.product_id=product.id 
	   		and product.brand_id=product_brand.id and product_brand.id=".$_POST['types'];
	   		$query2 .=" and customer_order.date BETWEEN '".$_POST['datefrom']."' AND '".$_POST['dateto']."'";
	   		$query2 .= " GROUP BY product_brand.id, product.id, product.sale_price";
	   		$result2 = mysqli_query($connect,$query2);
	   		
			while($row2 = mysqli_fetch_array($result2))
			{
				echo '<tr>';			
				echo '<td>'.$row2[0].'</td>';
				echo '<td>'.$row2[1].'</td>';
				echo '<td>'.$row2[2].'</td>';
				echo '<td>'.$row2[3].'</td>';
				echo '<td><p class="text-right">'.$row2[3]*$row2[4].'</p></td>';	
				echo '</tr>';
				$tongsl+=$row2[3];
				$tongtien+=$row2[3]*$row2[4];
			}
				echo '</tbody>';
				echo '</table>';
				echo '<p class="h4">Total amount: '.$tongsl.'</p>';
				echo '<p class="h4">Total price: $'.$tongtien.'</p>';
	}
?>