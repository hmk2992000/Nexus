<?php
    if(isset($_POST['submittk2']))
    {
		$connect = new mysqli("localhost","root","","nexus");
     	mysqli_query($connect,"SET NAMES UTF8");
		echo 'Thời gian từ: '.$_POST['datefrom2'];
		echo ' đến: '.$_POST['dateto2'];
		echo '<table class="table table-bordered">
			<thead>
			<tr>
				<th data-sortable="true">Product ID</th>
                <th data-sortable="true">Product name</th>
                <th data-sortable="true">Brand name</th>
				<th data-sortable="true">Quantity Sell</th>
			</tr>
			</thead>
			<tbody>';
			// chọn ra 10 sản phẩm bán chạy
            $query3 = "SELECT product.id, product.name, product_brand.name, SUM(order_details.quantity)";
            $query3 .= " FROM customer_order, order_details, product, product_brand";
            $query3 .=  " WHERE customer_order.id=order_details.id and order_details.product_id=product.id and product.brand_id=product_brand.id
            and customer_order.date BETWEEN '".$_POST['datefrom2']."' AND '".$_POST['dateto2']."'";
            $query3 .= " GROUP BY product.id, product.name 
            ORDER BY SUM(order_details.quantity) DESC
            LIMIT 10"; 
	   		$result3 = mysqli_query($connect,$query3);
			while($row3 = mysqli_fetch_array($result3))
			{
			echo '<tr>';			
			echo '<td>'.$row3[0].'</td>';
			echo '<td>'.$row3[1].'</td>';
            echo '<td>'.$row3[2].'</td>';	
            echo '<td>'.$row3[3].'</td>';
			echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
	}
?>