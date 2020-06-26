<?php
$conn = new mysqli("localhost","root","","nexus");

mysqli_query($conn,"SET NAMES UTF8");

$error=0;
if(isset($_POST['id']))
{
    {
        $error=0;
        if($_FILES["HinhAnh"]["name"]=="") //Khi không upload file ảnh
        {
            $query1="UPDATE product SET
                name='".$_POST['name']."',
                brand_id=".$_POST['brand'].",
                cat_id=".$_POST['category'].",
                sale_price='".$_POST['price']."',
                quantity='".$_POST['amount']."',
                description='".$_POST['detail']."'
                WHERE id=".$_POST['id'];
                mysqli_query($conn,$query1);
                mysqli_close($conn);
                //echo "không upload ảnh, cập nhật thông tin sản phẩm thành công";
                echo "Edit successfully";
        }
            
        else //Khi có thay đổi hình
        {
            if($_FILES["HinhAnh"]["error"]!=0)
            {
                $error=1;
                echo "Problem uploading the file";
                exit;
            }

            if($_FILES["HinhAnh"]["size"]>1000000)
            {
                $error=1;
                echo "The file is large, please try again";
                exit;
            }

            $file_type=pathinfo($_FILES["HinhAnh"]["name"],PATHINFO_EXTENSION);
            $file_type_allow=array('png','jpg','jpeg','gif');
            if(!in_array(strtolower($file_type), $file_type_allow))
            {
                $error=1;
                echo "Only upload image files";
                exit;
            }

            if($error==0)
            {
                $brand_name;
                $qry="select * from product_brand";
                $row = mysqli_query($conn,$qry);
                foreach($row as $key => $value)
                {
                    if($value['id'] == $_POST['brand']) {
                        $brand_name = $value['name'];
                        break;
                    }
                }

                $tmp_name=$_FILES["HinhAnh"]["tmp_name"];
                $newimageurl="product/" . $brand_name . "/".rand(0,50).$_FILES["HinhAnh"]["name"];//tên đường dẫn mới
                $moveimageurl = "../../public/img/".$newimageurl;
                move_uploaded_file($tmp_name,$moveimageurl);
                $query2="UPDATE product 
                SET  
                name='".$_POST['name']."',
                brand_id='".$_POST['brand']."',
                cat_id=".$_POST['category'].",
                sale_price='".$_POST['price']."',
                quantity='".$_POST['amount']."',
                description='".$_POST['detail']."',
                image='".$newimageurl."'
                WHERE id=".$_POST['id'];
                mysqli_query($conn,$query2);
                mysqli_close($conn);
            }
            //echo "Sửa thông tin sản phẩm thành công";
            echo "Edit information successfully";
        }
                   
    }
}
    
else
    echo 'Not received the edit form';
?>