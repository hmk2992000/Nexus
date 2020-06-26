/* Line Chart*/
window.onload = function() {
	var chart1 = document.getElementById('chart1');
	var lineChart = new Chart(chart1, {
		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
			datasets: [{
				label: 'New Visitor',
				fill: true,
				lineTension: 0.5,
				backgroundColor: 'rgba(136, 249, 248, 0.4)',
				borderColor: 'rgba(136, 249, 248, 0.4)',
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				pointBorderColor: 'rgba(136, 249, 248, 1)',
				pointBackgroundColor: "#fff",
				pointBorderWidth: 1,
				pointHoverRadius: 5,
				pointHoverBackground: 'rgba(136, 249, 248, 1)',
				pointHoverBorderColor: 'rgba(220, 220, 220, 1)',
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: [17, 25, 30, 42, 25, 30, 44, 50, 30, 35]
			},
			{
				label: 'Old Visitor',
				fill: true,
				lineTension: 0.5,
				backgroundColor: 'rgba(0, 112, 113, 0.4)',
				borderColor: 'rgba(0, 112, 113, 0.4)',
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				pointBorderColor: 'rgba(0, 112, 113, 1)',
				pointBackgroundColor: "#fff",
				pointBorderWidth: 1,
				pointHoverRadius: 5,
				pointHoverBackground: 'rgba(0, 112, 113, 1)',
				pointHoverBorderColor: 'rgba(220, 220, 220, 1)',
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: [65, 58, 73, 81, 72, 73, 69, 82, 80, 77]
			}]
		},
		options: {
			animation: {
				animateScale: true,
				duration: 1000,
				easing: 'linear',
			}
		}
	});


	var chart2 = document.getElementById('chart2');
	var doughnutChart = new Chart(chart2, {
		type: 'doughnut',
		data: {
			labels: ['Sales1', 'Sales2', 'Sales3'],
			datasets: [
			{
				label: 'Points',
				backgroundColor: ['#00cec9', '#6c5ce7', '#fd79a8'],
				data: [282, 143, 95]
			}
			]
		},
		options: {
			animation: {
				animateScale: true,
				duration: 1000,
				easing: 'linear',
			}
		}
	});
};

/* Date Range */
$(document).ready(function(){
	$('.input-daterange').datepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	$("#start-date").datepicker().datepicker("setDate", new Date('October 18, 2019'));
	$("#end-date").datepicker().datepicker("setDate", new Date());
});

/* Data Table */
$(document).ready(function() {
	$('#dataTable').DataTable({
		//"ordering": false,
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
	});
});


/* Edit Btn */
$('.table tbody').on('click', '.edit-btn', function(){
	var curRow = $(this).closest('tr');
	var name = curRow.find('td:eq(0)').text();
	var brand = curRow.find('td:eq(2)').text();
	var price = curRow.find('td:eq(3)').text();
	var quantity = curRow.find('td:eq(4)').text();

	$('#name').val(name);
	$("#brand").val(brand).change();
	$('#price').val(price);
	$('#quantity').val(quantity);

	if($( "#remove-current-img" ).prop("checked", false)) {
		$('#upload-new-img').hide();
	}

	$('#remove-current-img').click(function(){
		if($(this).is(':checked')){
			$('#upload-new-img').show();
		}
		else {
			$('#upload-new-img').val('');
			$('#upload-new-img').hide();
		}
	});
});

/* Update Btn */
$('.table tbody').on('click', '.update-btn', function(){
	var curRow = $(this).closest('tr');
	var status = curRow.find('td:eq(3) span').text();

	console.log(status);
	$("#status").val(status).change();
});



// $('#start_date').change(function(){
// 	var start = $('#start_date').val();
// 	console.log(start);
// });