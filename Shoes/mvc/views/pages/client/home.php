<header><!--Header Begin-->
	<div class="swiper-container landing-page">
	    <div class="swiper-wrapper">
	    	<div class="swiper-slide">

	    		<div class="tone-1">
					<div class="product-info">
						<h1>NIKE AIR MAX 270</h1>
						<p>New and improved</p>
						<h2>$140</h2>
						<div class="info-btns">
							<a href="./product/detail/9" class="btn discover-btn">DISCOVER</a>
							<a class="btn cart-btn add-to-cart-btn" onclick="addCart(9);" >ADD TO CART</a>
						</div>
					</div>
				</div>

				<div class="tone-2 bg1">
					<img src="./public/img/product/1.png" alt="product1">
				</div>

	    	</div>
		    
		    <div class="swiper-slide">

	    		<div class="tone-1">
					<div class="product-info">
						<h1>ADIDAS ULTRA BOOST 20</h1>
						<p>New and improved</p>
						<h2>$130</h2>
						<div class="info-btns">
							<a href="./product/detail/1" class="btn discover-btn">DISCOVER</a>
							<a class="btn cart-btn add-to-cart-btn" onclick="addCart(1);" >ADD TO CART</a>
						</div>
					</div>
				</div>

				<div class="tone-2 bg2">
					<img src="./public/img/product/2.png" alt="product1">
				</div>

	    	</div>

	    	<div class="swiper-slide">

	    		<div class="tone-1">
					<div class="product-info">
						<h1>AIR JORDAN 1 RETRO</h1>
						<p>New and improved</p>
						<h2>$120</h2>
						<div class="info-btns">
							<a href="./product/detail/4" class="btn discover-btn">DISCOVER</a>
							<a class="btn cart-btn add-to-cart-btn" onclick="addCart(4);" >ADD TO CART</a>
						</div>
					</div>
				</div>

				<div class="tone-2 bg3">
					<img src="./public/img/product/3.png" alt="product1">
				</div>

	    	</div>

	    </div>
	    <!-- Add Arrows -->
	    <div class="swiper-button-next"></div>
	    <div class="swiper-button-prev"></div>
	</div>
	
</header><!--Header Finish-->





<div class="countdown"><!--Countdown Begin-->
	<h1 class="tittle">Deal Of The Week</h1>
	<div class="countdown-container">

		<div class="countdown-img">
			<a href="./product/detail/13">
				<img src="./public/img/countdown-img.jpg">
			</a>
		</div>

		<div class="countdown-info">
			<p>Hot Deal Week</p>
			<h2>Reebok Aztrek 96</h2>
			<div class="price">
				<span class="countdown-price">$80</span>
				<span class="countdown-price-compare">$90</span>
			</div>
			<div class="time">
				<div id="day">NA</div>
				<div id="hour">NA</div>
				<div id="minute">NA</div>
				<div id="second">NA</div>
			</div>
			<a class="btn" href="./product/detail/13">Order Now</a>
		</div>

	</div>	
</div><!--Countdown Finish-->


<div class="banner"><!--Banner Begin-->
	<div class="banner-container">

		<div class="banner-item">
			<a class="banner-img" href="./product/detail/6">
				<img src="./public/img/banner1.gif">
			</a>
			<div class="banner-info">
				<h5>Women's Running Shoes</h5>
				<h2>
					Nike Air 
					<br/>
					Zoom Streak 7
				</h2>
				<a class="btn" href="./product/detail/6">More Info</a>
			</div>
		</div>

		<div class="banner-item">
			<a class="banner-img" href="./product/detail/7">
				<img src="./public/img/banner2.gif">
			</a>
			<div class="banner-info">
				<h5>Men's Running Shoes</h5>
				<h2>
					Nike Zoom 
					<br/>
					Fly Flyknit
				</h2>
				<a class="btn" href="./product/detail/7">More Info</a>
			</div>
		</div>

	</div>
</div><!--Banner Finish-->



<div class="featured-slider"><!--Featured Products Begin-->
	<h1 class="tittle">Featured Products</h1>
	<i class="fas fa-arrow-alt-circle-left prev"></i>
	<i class="fas fa-arrow-alt-circle-right next"></i>

	<div class="featured-wrapper">

		<?php
			$html = "";
			//Covert to array
			$newProductsList = json_decode($data["newProducts"], true);
			if(count($newProductsList) > 0)
			{
				foreach ($newProductsList as $product) {
					$cat = "";
					switch ($product["cat_id"]) {
						case '1':
							$cat = "Men";
							break;
						case '2':
							$cat = "Women";
							break;
						
						default:
							# code...
							break;
					}

					$html .= '<div class="shop-card">
								<a href="./product/detail/' . $product['id'] . '">
									<img src="./public/img/' . $product['image'] . '">
								</a>
								<div class="tittle">
									' . $product['name'] . '
								</div>
								<div class="cta">
									<div class="price">' . $product['sale_price'] . '</div>
									<button id='.$product['id'].' class="btn add-to-cart-btn" onclick="addCart('.$product['id'].');">Add to Cart<span class="bg"></span></button>
								</div>
							</div>';
				}
			} 
			echo $html;
		?>
	</div>
</div><!--Featured Products Finish-->



<section id="testimonials"><!--Testimonial Begin-->
	<h3 class="tittle">What our customers say</h3>
	<div class="swiper-container testimonials-container">
	    <div class="swiper-wrapper">
			<div class="swiper-slide">

				<div class="testimonial">
					<img src="./public/img/client1.jpg" class="img-responsive img-circle">
					<blockquote>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>
					</blockquote>
					<div class="testimonial-author">
						<p>
							<strong>Selena Gomez</strong>
							<span>American Actress & Singer</span>
						</p>
					</div>
				</div>

			</div>

			<div class="swiper-slide">

				<div class="testimonial">
					<img src="./public/img/client2.jpg" class="img-responsive img-circle">
					<blockquote>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>
					</blockquote>
					<div class="testimonial-author">
						<p>
							<strong>Lee Min-ho</strong>
							<span>Korean Actor & Model</span>
						</p>
					</div>
				</div>

			</div>

			<div class="swiper-slide">

				<div class="testimonial">
					<img src="./public/img/client3.jpg" class="img-responsive img-circle">
					<blockquote>
						<p class="quote">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>
					</blockquote>
					<div class="testimonial-author">
						<p>
							<strong>Sơn Tùng M-TP</strong>
							<span>Vietnamese Singer & Songwriter</span>
						</p>
					</div>
				</div>

			</div>
			
	    </div>
    
    <div class="swiper-pagination"></div><!-- Add Pagination -->
	</div>
</section><!--Testimonial Finish-->

<script>
function addCart(id)
 {
	 num = 1;
	 size = 5;
	 
	 $.post('./public/php/AddtoCart2.php', {'id':id, 'num':num, 'size':size}, function(data){
		$('#items-count').text(data);
	 });

	 Swal.fire({
                    icon: 'success',
                    title: 'Great!',
                    text: 'Add to Cart Successfully',
                    showConfirmButton: false,
                    timer: 2500
					});
	 
 }
</script>
 