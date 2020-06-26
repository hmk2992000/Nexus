function xulysubmit()
{
	var type = document.getElementById("idtypes");
	var datefrom = document.getElementById("from");
	var dateto = document.getElementById("to");
	if(type.value=="")
	{
		alert('No product type selected');
		type.focus();
		return false;
	}
	if(datefrom.value=="")
	{
		alert('You have not selected a date');
		datefrom.focus();
		return false;
	}
	if(dateto.value=="")
	{
		alert('You have not selected a date');
		dateto.focus();
		return false;
	}
	if(Date.parse(dateto.value) < Date.parse(datefrom.value))
	{
		alert('You have chosen an invalid date, please choose again');
		datefrom.focus();
		return false;
	}

	return true;	
}
function xulysubmit1()
{
	var datefrom1 = document.getElementById("from1");
	var dateto1 = document.getElementById("to1");
	if(datefrom1.value=="")
	{
		alert('You have not selected a date');
		datefrom1.focus();
		return false;
	}
	if(dateto1.value=="")
	{
		alert('You have not selected a date');
		dateto1.focus();
		return false;
	}
	if(Date.parse(dateto1.value) < Date.parse(datefrom1.value))
	{
		alert('You have chosen an invalid date, please choose again');
		datefrom1.focus();
		return false;
	}

	return true;
}
function xulysubmit2()
{
	var datefrom2 = document.getElementById("from2");
	var dateto2 = document.getElementById("to2");
	if(datefrom2.value=="")
	{
		alert('You have not selected a date');
		datefrom2.focus();
		return false;
	}
	if(dateto2.value=="")
	{
		alert('You have not selected a date');
		dateto2.focus();
		return false;
	}
	if(Date.parse(dateto2.value) < Date.parse(datefrom2.value))
	{
		alert('You have chosen an invalid date, please choose again');
		datefrom2.focus();
		return false;
	}
	return true;
}