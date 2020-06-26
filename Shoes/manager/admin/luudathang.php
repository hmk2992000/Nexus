<?php
	if(isset($_POST['idoder']))
	{
		$idoder=$_POST['idoder'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data="status = 4";
		$table='customer_order';
		$class->updatecart($table,$data,$idoder);
		echo "Save successfully";
		exit;
	}
?>