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
   var id = document.getElementById("idid");
   var name = document.getElementById("idname");
   var brand = document.getElementById("idbrand");
   var category = document.getElementById("idcategory");
   var price = document.getElementById("idprice");
   var amount = document.getElementById("idamount");
   var pic = document.getElementById("idimage");
   var detail = document.getElementById("iddetail");
   if(id.value=="")
   {
       alert('Empty Product ID')
       id.focus();
       return false;
   }
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
    $conn2 = new mysqli("localhost","root","","nexus");
    mysqli_query($conn2,"SET NAMES UTF8");
    //include('../connect.php');
    //$class=new Database();
	//$sqd=$class->connect();
    $query2 = "SELECT MAX(id) FROM product";
    $result2 = mysqli_query($conn2,$query2);
    $row2= mysqli_fetch_array($result2);
    //$row2=$class->query($query2);
    $max_id=$row2[0];
?>
<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add new product</h1>
			</div>
</div>
<div class="row">
<form role="form" name='addform' id="idaddform" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Product ID</label>
		<input class="form-control" type="text" id="idid" name="id" value=<?php echo $max_id+1 ?> readonly>
    </div>
    <div class="form-group">
        <label>Product Name</label>
		<input class="form-control" placeholder="Product Name" type="text" id="idname" name="name" onchange="checkProductName()">
		<div id="invalid-name" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Brand</label>
        <select id="idbrand" name="brand">
        <option value="">----</option>
        <?php
        $qry="select * from product_brand";
        $row = mysqli_query($conn2,$qry);
        //$row=$class->query($qry);
        foreach($row as $key => $value)
        {
            echo '<option value=\''.$value['id'].'\'>'.$value['name'].'</option>';
        }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select id="idcategory" name="category">
        <option value="">----</option>
        <?php
        $qry="select * from category";
        $row = mysqli_query($conn2,$qry);
        //$row=$class->query($qry);
        foreach($row as $key => $value)
        {
            echo '<option value=\''.$value['id'].'\'>'.$value['name'].'</option>';
        }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input class="form-control" placeholder="Price" type="text" id="idprice" name="price" onchange="checkPrice()">
        <div id="invalid-price" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Quantity</label>
		<input class="form-control" placeholder="Quantity" type="text" id="idamount" name="amount" onchange="checkAmount()">
		<div id="invalid-amount" style="color:red; visibility:hidden;"></div>
    </div>   
</div>  
<div class="col-md-6">   
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" placeholder="Description"  id="iddetail" name="detail" rows="5" cols="33"></textarea>
    </div>
    <div>
        <label>Image</label>
        <input type="file" id="idimage" name="image-url">
    </div>
    <br/>
    <input type="submit" class="btn btn-primary" name="submit" id="btnsubmit" value='Add'>
    <button type="reset" class="btn btn-default" value='Làm lại' onclick="refresh()">Refresh</button>
</div> 
</form>
<div id="image_preview">
</div>
</div>


<script>
$(document).ready(function()
{
		$("#idaddform").on('submit',function(e)
        {
                e.preventDefault();
                if(xulyrong()==true)
                {
                    $.ajax(
                    {
				    url:"xulythemsanpham.php",
				    method:"POST",
                    data: new FormData(this), //gửi theo name
                    contentType:false,
                    processData:false,
				    success:function(data)
                    {
                        alert(data);
                        if(data=="Add Successfully")
                            $("#myModalAddProduct").modal('hide');
                    }
                    });
                }
        });			
});

</script>