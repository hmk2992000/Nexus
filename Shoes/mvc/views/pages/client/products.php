<div class="shop-parallax" style="background-image: url(./public/img/men-parallax.jpg);">
	<div class="text">
		<h3>Find Your Own</h3>
		<h2>STYLE</h2>
	</div>
</div>

<div class="shop"><!--Shop Begin-->

	<div class="filter-collection"><!--Filter Begin-->
		<form>
			<div class="filter-price filter-area">
				<h3 class="tittle">Price Filter</h3>

				<div class="slider-box">
					<input type="hidden" id="hidden_minimum_price" value="50">
					<input type="hidden" id="hidden_maximum_price" value="500">
					<p id="price-show">$50 - $500</p>
					<div id="price-range" class="slider"></div>
				</div>
			</div>

			<div class="filter-category filter-area">
				<h3 class="tittle">Category</h3>
				<ul>
					<?php
						//Covert to array
						$categoryList = json_decode($data["categories"], true);
						if(count($categoryList) > 0)
						{
							foreach ($categoryList as $category) {
					?>
								<li>
									<label><input type="radio" name="category" class="common_selector category" value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></label>
								</li>
					<?php
							}
						} 
					?>
				</ul>
			</div>

			<div class="filter-brand filter-area">
				<h3 class="tittle">Brand</h3>
				<ul>
					<?php
						//Covert to array
						$brandList = json_decode($data["brands"], true);
						if(count($brandList) > 0)
						{
							foreach ($brandList as $brand) {
						?>
								<li>
									<label><input type="checkbox" class="common_selector brand" value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></label>
								</li>
						<?php
							}
						} 
					?>
				</ul>
			</div>

			<div class="filter-size filter-area">
				<h3 class="tittle">Size - UK</h3>
				<ul>
					<?php
						//Covert to array
						$sizeList = json_decode($data["sizes"], true);
						if(count($sizeList) > 0)
						{
							foreach ($sizeList as $size) {
						?>
								<li>
									<label><input type="checkbox" class="common_selector size" value="<?php echo $size["id"]; ?>"><?php echo $size["size"]; ?></label>
								</li>
						<?php
							}
						} 
					?>
				</ul>
			</div>

			<div class="filter-btn">
				<button type="button" id="filterBtn">Filter</button>
			</div>
		</form>
	</div><!--Filter Finish-->

	<div class="collection" id="pagination_data">
		
	</div>
</div><!--Shop Finish-->
<script>
	$(document).ready(function(){
	<?php
		if(isset($data['search_key']))
			echo "filter_data(1, '".$data['search_key'] ."');";
		else
			echo "filter_data();";
	?>

	function get_filter(class_name){
		var filter = [];
		$('.' + class_name + ':checked').each(function(){
			filter.push($(this).val());
		});
		return filter;
	}

	function filter_data(page, search_key){
		var action = 'fetch_data';
		var minimum_price = $("#hidden_minimum_price").val();
		var maximum_price = $("#hidden_maximum_price").val();
		var category = get_filter('category');
		var brand = get_filter('brand');
		var size = get_filter('size');
		$.ajax({
			url: "./public/php/pagination.php",
			method: "POST",
			data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category, brand:brand, size:size, page:page, search_key:search_key},
			success: function(data) {
				$("#pagination_data").html(data);
			}
		});
	}

	$('#filterBtn').click(function(){
		filter_data();
	});

	$(document).on('click', '.pagination_link', function(){
		var page = $(this).attr("id");
		filter_data(page);
		})
	});
 
	 function addCart(id)
	 {
		 num = 1;
		 size = 5;
		 $.post('./public/php/AddtoCart2.php', {'id':id, 'num':num, 'size' : size}, function(data){
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