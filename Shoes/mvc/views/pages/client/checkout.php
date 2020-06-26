<!--Checkout Begin-->
<div class="checkout-container">
		<div class="left">
			<form>
				<div class="from-text">
					<h3>Billing Address</h3>
					<label for="fname"><i class="fa fa-user"></i> Full Name</label>
					<input type="text" id="fname" name="firstname" pattern="[A-Za-z\s]{1,32}" type="text" name="First Name" value="" required title="Only Characters are allowed" placeholder="John M. Doe">
					<label for="iemail"><i class="fa fa-envelope"></i> Email</label>
					<input type="email" id="iemail" name="email" placeholder="john@gmail.com" required title="Invalid Email">
					<label for="adr"><i class="fas fa-address-card"></i> Address</label>
					<input type="text" id="adr" name="address" pattern="[A-Za-z0-9\s]{1,80}" value="" required title="Special Characters are not allowed" placeholder="542 W. 15th Street">
					<label for="city"><i class="fas fa-city"></i> City</label>
					<input type="text" id="city" name="city" pattern="[A-Za-z0-9\s]{1,25}" value="" required title="Special Characters are not allowed" placeholder="New York">
					<label for="phone"><i class="fas fa-phone-alt"></i> Phone</label>
					<input type="text" id="phone" name="phone" pattern="[0-9]{10,10}" required title="Special Characters are not allowed" placeholder="0123456789">
				</div>
				<label>
					<input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
				</label>
				<button type="button" class="btnx" onclick="checkOut();">Continue to checkout</button>
			</form>
		</div>

		<div class="right">
			<div class="space">
				<h3>Order Sumary</h3>
				<table class="order-table">
					<tbody>
                    <?php
					if(!isset($total))
					$total = 0;
					if(isset($_SESSION["cart"])) 
					{	
						
						foreach($_SESSION['cart'] as $key => $value){
							
							
				    ?>
						<tr>
							<td><img class="cart-item-image" src=<?php echo "./public/img/".$value["image"]; ?>></td>
							<td>
								<h3 class="tittle"><?php echo $value["name"]; ?></h3>
								<h4>Size: <span><?php echo $value["size"]; ?></span></h4>
								<h4>Quantity: <span><?php echo $value["num"]; ?></span></h4>
								<h4 class="price">Price: <span> 
                                <?php echo "$ ".$value["price"]; 
							
                                $subtotal = $value["price"] * $value["num"];
                                //echo "<script> alert('+$subtotal+'); </script>";
                                $total+=$subtotal;
                                ?>
                                </span>   
                                </span></h4>
							</td>
                        </tr>
                        <?php
                                }
                            }
                            else 
                            {
                                echo "<script> $('.order-table').html('Oder is empty'); </script>";
                                
                                $subtotal = 0;
                            }
                        ?>
						     
					</tbody>           
				</table>

				<div class="total">
					<p>Total: <span id="total"><?php  echo "$ ".$total; ?></span></p>
				</div>
			</div>
		</div>
	</div>	
    <!--Checkout Finish-->
    
    <script>

	function validateEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}

	function checkOut()
 	{	
        
        FullName = $("#fname").val();
        Email = $("#iemail").val();
        Total = <?php echo $total; ?>;
        Address = $("#adr").val()+", "+$("#city").val();
        Phone = $("#phone").val();

		if (FullName=="" || Email =="" || Address=="" || Phone =="" )
		{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'All fields must be filled!',
				showConfirmButton: false,
				timer: 2500
			});
		}
		else {
			if(validateEmail(Email) == false) {
				Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Invalid Email!',
				showConfirmButton: false,
				timer: 2500
			});
			}

			else 
			{
				$.post('./public/php/checkout.php', {
				'FullName':FullName,
				'Email':Email,
				'Total':Total, 
				'Address':Address,
				'Phone':Phone
			
				}, function(data){	
						if(data)
						{
							Swal.fire({
									icon: 'success',
									title: 'Great!',
									text: 'Oder Successfully',
									showConfirmButton: false,
									timer: 2500
									});
						}
						else
						{
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'You did not login or Cart is empty!',
								showConfirmButton: false,
								timer: 2500
								});
						}
					});
			}
		} 



        
	}

</script>