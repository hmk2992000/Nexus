<div class="product-details-area"><!--Product Details Begin-->
	<div class="container">

		<div class="product-img">
			<?php echo "<img src='./public/img/" . $data['product']['image'] . "'>"; ?>
		</div>
		<div class="product-details">
			<div class="product-text">
				<h3><?php echo $data['product']['name']?></h3>
				<h5><?php echo trim($data['category'], '"') ?>'s Running Shoes</h5>
				<h3 class="rate">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="far fa-star"></i>
				</h3>
				<h2><?php echo $data['product']['sale_price']?></h2>
				<p><?php echo $data['product']['description']?></p>
				<div class="controls">

					<div class="product-size">
						<label for="size">Size:</label>
						<div class="select-box" >
							<select id = "size">
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</div>
					</div>
					
					
					<div class="product-count">
						<label for="size">Quantity:</label>
						<div class="quantity">
							<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
							<input class="quantity" id = "number" min="1" name="quantity" value="1" type="number">
							<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
						</div>
					</div>

				</div>

				<button class="btn add-to-cart-btn" onclick="addCart(<?php echo $data['product']['id']?>);" >ADD TO CART</button>
			</div>
		</div>

	</div>
</div><!--Product Details Finish-->




<div class="tabbed"><!--Tabs Begin-->
	<input checked="checked" id="tab1" type="radio" name="tabs" />
	<input id="tab2" type="radio" name="tabs" />
	<ul class="nav-tabs">
		<li class="tab1">
			<label for="tab1">Description</label>
		</li>
		<li class="tab2">
			<label for="tab2">Reviews</label>
		</li>
	</ul>
	<section>
		<div class="tab1">
			<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband.</p><br/>
			<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>
		</div>

		<div class="tab2">
			<div class="content">
				<div class="review-list">
					<div class="review-items">
						<div class="media">
							<div class="avatar">
								<img src="../../img/media1.jpg">
							</div>
							<div class="media-body">
								<h4>William</h4>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="far fa-star"></i>
							</div>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magnaaliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
					</div>


					<div class="review-items">
						<div class="media">
							<div class="avatar">
								<img src="../../img/media2.jpg">
							</div>
							<div class="media-body">
								<h4>Cindy</h4>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magnaaliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
					</div>


					<div class="review-items">
						<div class="media">
							<div class="avatar">
								<img src="../../img/media3.jpg">
							</div>
							<div class="media-body">
								<h4>Josh</h4>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="far fa-star"></i>
							</div>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magnaaliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
					</div>
				</div>

				<div class="review-box">
					<div class="container">
						<h3>Add A Review</h3>
						<form>
							<p>Your Rating:</p>
							<div class="rating">
								<input id="star5" type="radio" name="star">
								<label for="star5"></label>

								<input id="star4" type="radio" name="star">
								<label for="star4"></label>
								
								<input id="star3" type="radio" name="star">
								<label for="star3"></label>
								
								<input id="star2" type="radio" name="star">
								<label for="star2"></label>
								
								<input id="star1" type="radio" name="star">
								<label for="star1"></label>
							</div>

							
							<div class="form-group">
								<input class="form-control" id="name" type="text" name="name" placeholder="Your Full Name" required="required">
							</div>
							<div class="form-group">
								<input class="form-control" id="email" type="email" name="email" placeholder="Email" required="required">
							</div>
							<div class="form-group">
								<input class="form-control" id="phoneNumber" type="text" name="number" placeholder="Phone Number" required="required">
							</div>
							<div class="form-group">
								<textarea class="form-control" id="message" name="message" placeholder="Review" required="required"></textarea>
							</div>
							<div class="text-right">
								<button type="submit" value="submit" class="submit-btn">Submit Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div><!--Tabs Finish-->
<script>
 
 function addCart(id)
 {
	 num = $("#number").val();
	 size = $("#size").val();
	 $.post('./public/php/AddtoCart2.php', {'id':id, 'num':num, 'size':size}, function(data){
		$('#items-count').text(data);
	 });
	 
 }


</script>

 