<script>
function checkProductName()
{
    var name = document.getElementById('idname');
    var patt =/^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?!]+$/;
    var result = patt.test(name.value)
    if(result==false)
    {
        document.getElementById('invalid-name').innerHTML="Product name can not contain special characters";
        document.getElementById('invalid-name').style.visibility="visible";
    }
    else
        document.getElementById('invalid-name').style.visibility="hidden";

}
function checkPrice()
{
    var price = document.getElementById('idprice')
    var patt = /^\d+$/;
    var result = patt.test(price.value);
    if(result==false)
    {
        document.getElementById('invalid-price').innerHTML="Number only";
        document.getElementById('invalid-price').style.visibility="visible";
    }
    else
        document.getElementById('invalid-price').style.visibility="hidden";

}

function checkAmount()
{
    var amount = document.getElementById('idamount');
    var patt =/^\d+$/;
    var result = patt.test(amount.value);
    if(result==false)
    {
        document.getElementById('invalid-amount').innerHTML="Number only";
        document.getElementById('invalid-amount').style.visibility="visible";
    }
    else
        document.getElementById('invalid-amount').style.visibility="hidden";
}
function xulyrong()
{
   var name = document.getElementById("idname");
   var brand = document.getElementById("idbrand");
   var category = document.getElementById("idcategory");
   var price = document.getElementById("idprice");
   var amount = document.getElementById("idamount");
   var pic = document.getElementById("idimage");
   var detail = document.getElementById("iddetail");
   
   if(name.value=="")
   {
       alert('Empty Product Name');
       name.focus();
       return false;
   }
   var namex = document.getElementById("invalid-name").style.visibility;
   if(namex == "visible")
   {
       alert("Product name is wrong, please enter again");
       return false;
   }

   if(brand.value=="")
   {
       alert('Empty Brand');
       brand.focus();
       return false;
   }
   if(price.value=="")
   {
       alert('Empty Price');
       price.focus();
       return false;
   }
   var pricex = document.getElementById("invalid-price").style.visibility; 
   if(pricex == "visible")
   {
       alert("Entered price is wrong, please enter again");
       return false;
   }

   if(amount.value=="")
   {
       alert('Empty Quantity');
       amount.focus();
       return false;
   }
   var amountx = document.getElementById("invalid-amount").style.visibility;
   if(amountx == "visible")
   {
       alert("Entered quantity is wrong, please enter again");
       return false;
   }

   if(category.value=="")
   {
       alert('Empty Category');
       category.focus();
       return false;
   }

   if(detail.value=="")
   {
        alert('Empty Description');
        detail.focus();
        return false;
   }

   if(pic.value=="")
   {
       alert('Empty Image');
       pic.focus();
       return false;
   }
   return true;
}

function refresh()
{
    document.getElementById('invalid-name').style.visibility="hidden";
    document.getElementById('invalid-price').style.visibility="hidden";
    document.getElementById('invalid-amount').style.visibility="hidden";

}

</script>

<?php
$conn = new mysqli("localhost","root","","nexus");

if(isset($_POST['edit_id']))
{
    mysqli_query($conn,"SET NAMES UTF8");
    $query= "SELECT * FROM product WHERE id=".$_POST['edit_id'];
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $idproduct = $row['id'];
    $name = $row['name'];
    $image = $row['image'];
    $brand = $row['brand_id'];
    $category = $row['cat_id'];
    $price = $row['sale_price'];
    $amount = $row['quantity'];
    $detail = $row['description']; //chi tiết sản phẩm
}
else
echo 'Request has not been received';
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">Edit Product</h1>
	</div>
</div>
<div class="row">
<form role="form" name='editform' id="ideditform" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Product ID</label>
        <input type="text" class="form-control" id="idid" name="id" value="<?php echo($idproduct)?>" readonly>
    </div>
    <div class="form-group">
        <label>Product ID</label>
        <input type="text" class="form-control" id="idname" name="name" value="<?php echo($name)?>" onchange="checkProductName()">
        <div id="invalid-name" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Brand</label>
        <select id="idbrand" name="brand">
        <?php
        mysqli_query($conn,"SET NAMES UTF8");
        $qry2 ="select * from product_brand where id ='$brand'";
        $result2 = mysqli_query($conn,$qry2);
        $row2 = mysqli_fetch_array($result2);
        $row2['id'];

        $qry="select * from product_brand";
        $result = mysqli_query($conn,$qry);
        while($rowtype=mysqli_fetch_array($result))
        {
            if($rowtype['id'] == $row2['id'])
                echo '<option value='.$rowtype['id'].' selected=\'selected\'>'.$rowtype['name'].'</option>';
            else
                echo '<option value='.$rowtype['id'].'>'.$rowtype['name'].'</option>';
        }
        ?>
        </select>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select id="idcategory" name="category">
        <?php
        mysqli_query($conn,"SET NAMES UTF8");
        $qry2 ="select * from category where id ='$category'";
        $result2 = mysqli_query($conn,$qry2);
        $row2 = mysqli_fetch_array($result2);
        $row2['id'];

        $qry="select * from category";
        $result = mysqli_query($conn,$qry);
        while($rowtype=mysqli_fetch_array($result))
        {
            if($rowtype['id'] == $row2['id'])
                echo '<option value='.$rowtype['id'].' selected=\'selected\'>'.$rowtype['name'].'</option>';
            else
                echo '<option value='.$rowtype['id'].'>'.$rowtype['name'].'</option>';
        }
        ?>
        </select>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" id="idprice" name="price" value="<?php echo($price)?>" onchange="checkPrice()">
        <div id="invalid-price" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="text" id="idamount" class="form-control" name="amount" value="<?php echo($amount)?>" onchange="checkAmount()">
        <div id="invalid-amount" style="color:red; visibility:hidden;"></div>
    </div>
</div>
<div class="col-md-6">  
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" placeholder="Description"  id="iddetail" name="detail" rows="5" cols="33">
        <?php echo $detail ?>
        </textarea>
    </div>
    <div>
    <label>Image</label>
    <br/>
    <img src="../../public/img/<?php echo $image ?>" width="200px" height="200px" class="img-thumbnail">
    </div>

    <div class="form-group">
        <label>You want to change the picture?</label>
        <input type="file" id="idimage" name="HinhAnh" value="<?php echo $image ?>">
    </div>
    <br/>
    <input type="submit" class="btn btn-primary" id="editsubmit" name="submit" value='Edit info'>
    <input type="reset" class="btn btn-default" value='Reset' onclick="refresh()">
</div>
</form>
</div>

<script>
$(document).ready(function()
{
		$("#ideditform").on('submit',function(e)
        {
                e.preventDefault();
                if(xulyrong()==true)
                {
                    $.ajax(
                    {
				    url:"editproduct.php",
				    method:"POST",
                    data: new FormData(this), //gửi theo name
                    contentType:false,
                    processData:false,
				    success:function(data)
                    {
                        alert(data);
                        if(data=="Edit information successfully")
                        $("#myModalEditProduct").modal('hide');
                        //alert("Sửa thành công");
                        //$("#idimage").val('');
                    }
                    });
                }
        });			
});
</script>