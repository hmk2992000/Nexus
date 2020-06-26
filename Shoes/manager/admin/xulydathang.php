<?php
	if(isset($_POST['idoder']))
	{
		include('../kiemtrasession.php');
		$idoder=$_POST['idoder'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data="status = 2";
		$table='customer_order';
		$class->updatecart($table,$data,$idoder);
		//Lấy id cuoi cùng trong table
		$sqlid="Select id from cart";
		$result=mysqli_query($sq1,$sqlid);
		$num=mysqli_num_rows($result);
		//Lấy dữ liệu từ oder úp qua cart
		$sqloder="Select * from customer_order where id=$idoder";
		$dataoder=$class->query($sqloder);
		$flag = false;
		if(isset($_SESSION['useradmin']))
		{
			foreach($dataoder as $key=>$value){
				$data1=array('id' => $num+1,
							'customer_username' => $value['customer_username'],
							'admin_username' => $_SESSION['useradmin'],
							'total_price' => $value['total_price'],
							'date' => date('y-m-d'),
							'address' => $value['address'],
							'status' => 1,
							);
			}
			
			$table1="cart";
			$class->insert($table1,$data1);
			//Lấy dữ liệu tu oder_details úp qua cart_details
			$sqloder="Select * from order_details where id=$idoder";
			$dataoder=$class->query($sqloder);
			$table2="cart_details";
			foreach($dataoder as $key=>$value){
				$data2=array('cart_id' => $num+1,
							'product_id' => $value['product_id'],
							'size'=>$value['size'],
							'price' => $value['price'],
							'total_price' => $value['total_price'], // sua total price thành price
							'amount' => $value['quantity'],
							);
				$class->insert($table2,$data2);
			}
			$flag = true;
		}
		
		if($flag)
		{
		echo "You have successfully confirmed.";
		}
		else 
		{	
			$data="status = 1";
			$class->updatecart($table,$data,$idoder);
			echo "You must login!";
		}
		exit;
	}
?>