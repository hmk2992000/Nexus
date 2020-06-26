<?php
	if(isset($_POST['idcart']))
	{
		$idcart=$_POST['idcart'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data="status = 0";
		$table='cart';
		$class->updatecart($table,$data,$idcart);
		echo "Save successfully";
		exit;
	}
?>