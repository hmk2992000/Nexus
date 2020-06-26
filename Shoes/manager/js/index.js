function hienthi_dk(){
	$.ajax({
		type:"POST",
		url: "modal_heading.php",
		dataType: 'html',
		data:{
			id:"2",
			tt:"true"
		},
		success: function(data){
            if(data == 'false') 
            {
                alert('Không có người dùng');
            }else{
                $('#body1').html(data);
            }
		}
	});
}
function hienthi_dn(){
	$.ajax({
		type:"POST",
		url: "modal_heading2.php",
		dataType: 'html',
		data:{
			id:"3",
			tt:"true"
		},
		success: function(data){
            if(data == 'false') 
            {
               	alert('Không có người dùng');
            }else{
                $('#body2').html(data);
            }
		}
	});		
}
function hienthimenu(){
	alert("ok");
	$.ajax({
		type:"POST",
		url: "hienthisanpham.php",
		dataType: 'html',
		data:{
			id:$("#MNL2").val();
		},
		success: function(data){
            if(data == 'false') 
            {
                alert('Không có người dùng');
            }else{
                $('#content').html(data);
            }
		}
	});
}