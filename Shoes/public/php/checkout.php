<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "nexus");
    $status = false;
    if(isset($_SESSION['customer_username']) 
        &&  isset($_POST["FullName"])
        &&  isset($_POST["Email"])
        &&  isset($_POST["Total"])
        &&  isset($_POST["Address"])
        &&  isset($_POST["Phone"])    
    )
    {   
       

        $username = $_SESSION['customer_username'];
        $currentDate = date("Y-m-d");
        $FullName = $_POST["FullName"];
        $Date = $currentDate;
        $Email = $_POST["Email"];
        $Total = $_POST["Total"];
        $Address = $_POST["Address"];
        $Phone = $_POST["Phone"];
        $Oder_Status = 1;
        $query = "INSERT INTO `customer_order`(`id`, `customer_username`, `email`, `fullname`, `date`, `total_price`, `address`, `phone`, `status`) VALUES (null,'".$username."','".$Email."','".$FullName."','".$Date."',".$Total.",'". $Address."',".$Phone.",".$Oder_Status.")";
        if(mysqli_query($con, $query))
		{	
			$status = true;
		}
        
        
        $getQry = "SELECT MAX(id) from customer_order ";

        $result = mysqli_query($con, $getQry);
        $row = mysqli_fetch_array($result);
        $newestID = $row[0];
        
        if(isset($_SESSION['cart']))
        {   
            
            $cart = $_SESSION['cart'];
            
            foreach ($cart as $key => $value) {
                $insertQry = "INSERT INTO `order_details` VALUES('".$newestID."','".$value['id']."','".$value['size']."','".$value['num']."',".$value['price'].",'".$value['num']*$value['price']."')";
                if(mysqli_query($con, $insertQry))
                {	
                    
                    $status = true;
                }
            }
        }
		echo $status;
    }
    else echo $status;
    


     
?>