<?php
    $conn3 = new mysqli("localhost","root","","nexus");

    mysqli_query($conn3,"SET NAMES UTF8");
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['price'])
        && isset($_POST['amount']) && isset($_POST['detail']))
        {        
            $error=0;   
         
            if($_FILES["image-url"]["error"] != 0) //gặp lỗi trong khi đang upload file
            {
                $error=1;
                echo "There was a problem uploading, please try again";
                exit;
            }
            
            if($_FILES["image-url"]["size"]>1000000)
            {
                $error=1;
                echo "The file is large, please try again";
                exit;
            }
    
            $file_type=pathinfo($_FILES["image-url"]["name"], PATHINFO_EXTENSION); //đuôi ảnh upload
            $file_type_allow=array('png','jpg','jpeg','gif'); //đuôi ảnh được chấp nhập
            if(!in_array(strtolower($file_type), $file_type_allow))
            {
                $error=1;
                echo "File must be a image";
                exit;
            }

            if($error==0)
            {
                $tmp_name = $_FILES["image-url"]["tmp_name"];

                $brand_name;
                $qry="select * from product_brand";
                $row = mysqli_query($conn3,$qry);
                foreach($row as $key => $value)
                {
                    if($value['id'] == $_POST['brand']) {
                        $brand_name = $value['name'];
                        break;
                    }
                }

                $newimageurl = "product/" . $brand_name . "/".rand(0,50).$_FILES["image-url"]["name"]; // đường dẫn lưu ở csdl
                $moveimageurl = "../../public/img/".$newimageurl; //đường dẫn để di chuyển file ảnh
                move_uploaded_file($tmp_name,$moveimageurl);
                
                $query="INSERT INTO product(id, name, image, brand_id, cat_id, sale_price, quantity, description) VALUES ("
                .$_POST['id'].",'"
                .$_POST['name']."','"
                .$newimageurl."',"
                .$_POST['brand'].","
                .$_POST['category'].","
                .$_POST['price'].","
                .$_POST['amount'].",'"
                .$_POST['detail']."')";
                mysqli_query($conn3,$query);   
            echo "Add Successfully";        
            }
            
        }
?>