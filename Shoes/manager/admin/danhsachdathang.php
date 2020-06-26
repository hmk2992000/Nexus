<head>
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
	<script>
		function confirmbefore()
		{
			if(confirm('You want to confirm this order'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function confirmbefore1()
		{
			if(confirm('You want to cancel this order'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function confirmbefore2()
		{
			if(confirm('You want to save this order'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function status(obj){
			if(confirmbefore()){
				$.ajax({
					type:"POST",
					url: "xulydathang.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
		function deleteoder(obj){
			if(confirmbefore1()){
				$.ajax({
					type:"POST",
					url: "huydathang.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
		function detail(obj){
			$.ajax({
				type:"POST",
				url: "hienthichitietdathang.php",
				dataType: 'html',
				data:{
					idoder:obj.id
				},
				success: function(data){
					$("#themchitietdonhang").html(data);
					$("#myModalchitiet1").modal(options11);
					var options11 = {
						'backdrop' : 'static',
						'keyboard' : true,
						'show' :true,
						'focus' : false
						}
				}
			});
		}
		function adduser(){
			$("#themtaikhoan").load("themtaikhoan.php");
			$("#myModalthem").modal(options1);
			var options1 = {
				  'backdrop' : 'static',
				  'keyboard' : true,
				  'show' :true,
				  'focus' : false
			}
		}
		function save(obj){
			if(confirmbefore2()){
				$.ajax({
					type:"POST",
					url: "luudathang.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
	</script>
</head>
<body>
	<div class="modal " id="myModalchitiet1" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themchitietdonhang"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
	<div class="modal " id="myModalsua" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="suataikhoan"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Order Table</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Order Table</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Order Table</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Order ID</th>
						        <th data-sortable="true">Customer Username</th>
						        <th data-sortable="true">Full name</th>
						        <th data-sortable="true">Email</th>
						        <th data-sortable="true">Total</th>
								<th data-sortable="true">Date</th>
								<th data-sortable="true">Address</th>
								<th data-sortable="true">Status</th>
								<th data-sortable="true"></th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
			  						$class2=new Database();
									$sqloder="select * from customer_order";
									$dataloder=$class2->query($sqloder);
									foreach($dataloder as $key=>$value){
										if($value['status']<=3)
										{
											//$value['statuscart']==1-> chưa check đơn
											//$value['statuscart']==2-> đã check đơn
											$string="";
											switch($value['status'])
											{
												case 1:{
													$string=$string."Wait for confirmation";
													break;
												}
												case 2:{
													$string=$string."Confirmed";
													break;
												}
												case 3:{
													$string=$string."Order canceled";
													break;
												}
											}
											?>
											<tr>
												<td data-sortable="true"><?php echo $value['id']?></td>
												<td data-sortable="true"><?php echo $value['customer_username']?></td>
												<td data-sortable="true"><?php echo $value['fullname']?></td>
												<td data-sortable="true"><?php echo $value['email']?></td>
												<td data-sortable="true"><?php echo number_format($value['total_price'])?></td>
												<td data-sortable="true"><?php echo $value['date']?></td>
												<td data-sortable="true"><?php echo $value['address']?></td>
												<td data-sortable="true"><p style="color: red"><?php echo $string; ?></p></td>
												<td data-sortable="true">
												<button class="btn btn-info btn-sm" name="edit" title="See order details" id="<?php echo $value['id']?>" onClick="detail(this)"><i class="fa fa-list-ul"></i></button>
												<?php if($value['status']==1){?>
													<button class="btn btn-danger btn-sm" id="<?php echo $value['id']?>" name="print" title="Order confirmation" onClick="status(this)"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
												<?php
												}
												?>
												<?php if($value['status']!=1){?>
												<button class="btn btn-danger btn-sm" name="save" title="Save order" id="<?php echo $value['id']?>" onClick="save(this)"><i class="fa fa-floppy-o"></i></button>
												<?php
												}
												?>
												<?php if($value['status']==1){?>
													<button class="btn btn-danger btn-sm" name="delete" title="Cancel order" id="<?php echo $value['id']?>" onClick="deleteoder(this)"><i class="fa fa-times" aria-hidden="true"></i></button>
												<?php
												}
												?>
												</td>
											</tr>
											<?php
										}
									}
								?>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>