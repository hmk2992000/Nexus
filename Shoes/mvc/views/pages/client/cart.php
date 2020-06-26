<div class="filled-cart" id = "listCart"><!--Cart Begin-->
		 
			<table class="pc-table" id = "cart"><!--PC Table Begin-->
				<thead>
					<tr>
						<th colspan="2">ITEM</th>
						<th>SIZE</th>
						<th>QTY</th>
						<th>PRICE</th>
						<th>REMOVE</th>
					</tr>
				</thead>

				<tbody id = "pc_table" >
				<?php
					if(!isset($total))
					$total = 0;
					if(isset($_SESSION["cart"])) 
					{	
						
						foreach($_SESSION['cart'] as $key => $value){
							
							
				?>
					<tr>
						<td style="text-align: left"><img src=<?php echo "./public/img/".$value["image"]; ?>></td>
						<td style="text-align: left"><h2><?php echo $value["name"]; ?></h2></td>
						<td>
							<div class="size-box size-box_<?php echo $key; ?>" id="<?php echo $value["id"]; ?>">
							
								<select id="pc-size_<?php echo $key; ?>" onchange="updateCart2(<?php echo $key; ?>)">
									<option id= "5" value="5">5</option>
									<option id= "6" value="6">6</option>
									<option id= "7" value="7">7</option>
									<option id= "8" value="8">8</option>
									<option id= "9" value="9">9</option>
									<option id= "10" value="10">10</option>
								</select>
								<?php echo "<script>  $('#pc-size_".$key."').val(".$value['size'].");  
								 
								 
								</script>"; ?>
							</div>
						</td>
						<td>
							<input id="pc-qty_<?php echo $key; ?>" onchange="updateCart2(<?php echo $key; ?>)" type="number" min="1" value="<?php echo $value["num"]; ?>" name="">
						</td>
						<td>
							<span><?php echo "$ ".$value["price"]; 
							
							$subtotal = $value["price"] * $value["num"];
							//echo "<script> alert('+$subtotal+'); </script>";
							$total+=$subtotal;
							?></span>
						</td>
						<td>
							<span><i class="fas fa-trash-alt" onclick="deleteCart(<?php echo $key; ?>)"></i></span>
						</td>
					</tr>
				<?php
						}
					}
					else 
					{
						echo "<script> $('#pc_table').html('Cart is empty'); </script>";
						
						$subtotal = 0;
					}
				?>
				 
					 
				</tbody>
			</table><!--PC Table Finish-->



			<table class="mobile-table">
				<tbody>
				<?php
					if(!isset($totalM))
					$totalM = 0;
					if(isset($_SESSION["cart"])) 
					{	
						
						foreach($_SESSION['cart'] as $key => $value){
							
							
				?>
					<tr>
						<td>
							<img src=<?php echo "./public/img/".$value["image"]; ?>>
						</td>
						<td>
							<h2><?php echo $value["name"]; ?></h2>

							<div class="size-box size-box_<?php echo $key; ?>" id="<?php echo $value["id"]; ?>">
								<label>Size:</label>
								<select id="mobile-size_<?php echo $key; ?>" onchange="updateCart3(<?php echo $key; ?>)">
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
								<?php echo "<script>  $('#mobile-size_".$key."').val(".$value['size'].");  
								 
								 
								</script>"; ?>
							</div>

							<div>
								<label>Quantity:</label>
								<input id="mobile-qty_<?php echo $key; ?>" onchange="updateCart3(<?php echo $key; ?>)" type="number" min="1" value="<?php echo $value["num"]; ?>" name="">
							</div>

							<span id="mobile-remove"><i class="fas fa-trash-alt" onclick="deleteCart(<?php echo $key; ?>)"></i></span>

							<span id="mobile-price">
							<?php echo "$ ".$value["price"]; 
							
							$subtotalM = $value["price"] * $value["num"];
							//echo "<script> alert('+$subtotal+'); </script>";
							$totalM+=$subtotalM;
							?>
							</span>
						</td>
					</tr>
					<?php
							}
						}
						else 
						{
							echo "<script> $('.mobile-table').html('Cart is empty'); </script>";
							
							$subtotalM = 0;
						}
					?>

					 
				</tbody>
			</table>



			<div class="text-right"><!--Total Begin-->
				<p>TOTAL:<span id="total"><?php  echo "$ ".$total; ?></span></p>
			</div><!--Total Finish-->

			<div class="text-right"><!--Update & Checkout Btn Begin-->
				<a id="update-btn" class="btn" onclick="refresh()" >
					<i class="fas fa-sync"  ></i>Update Cart
				</a>
				<a class="btn checkout" href="./checkout/">
					<i class="fas fa-sign-in-alt"></i>Checkout
				</a>
			</div><!--Update & Checkout Btn Finish-->
		 
	</div><!--Cart Finish-->
 <script>
	function refresh()
	{	
		 
		location.reload();
	}
	function updateCart(id)
 	{	
		num = $("#pc-qty_"+id).val();
		size = $("#pc-size_"+id).val();
		$.post('./public/php/updateCart.php', {'id':id, 'num':num, 'size':size}, function(data){
			
			$("#listCart").load("http://localhost/Shoes/cart/ #listCart" );
		});
	}
	function updateCart2(id)
 	{	
		//update without ajax
		num = $("#pc-qty_"+id).val();
		size = $("#pc-size_"+id).val();
		product_id = $(".size-box_"+id).attr('id');
		$.post('./public/php/updateCart.php', {'id':id, 'num':num, 'size':size, 'product_id':product_id}, function(data){
			  
		});
	 }

	 function updateCart3(id)
 	{	
		//update without ajax for mobile
		num = $("#mobile-qty_"+id).val();
		size = $("#mobile-size_"+id).val();
		product_id = $(".size-box_"+id).attr('id');
		$.post('./public/php/updateCart.php', {'id':id, 'num':num, 'size':size, 'product_id':product_id}, function(data){
			  
		});
	 }
	  
 	function deleteCart(id)
 	{	
		num = 0;
		size = $("#pc-size_"+id).val();
		product_id = $(".size-box_"+id).attr('id');
		$.post('./public/php/updateCart.php', {'id':id, 'num':num ,'size':size, 'product_id':product_id}, function(data){
			$("#listCart").load("http://localhost/Shoes/cart/ #listCart" );
			$('#items-count').text(data);
		});
	}
</script>