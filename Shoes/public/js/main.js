
			//Loader
$(window).on('load',function(){
			$('.loader-wrapper').fadeOut("slow");
		});


			//Menu Toggle
$(function() {
	$('.menu-toggle, .fa-times').on('click',function() {
		$('nav').toggleClass('active');
		$('.overlay').toggleClass('menu-open');
	});

	$('.overlay').on('click',function() {
		$('nav').removeClass('active');
		$(this).removeClass('menu-open');
	});
});


			//Navbar on scroll
$(window).on("scroll",function() {
	if($(window).scrollTop()) {
		$('nav').addClass('white');
	}

	else {
		$('nav').removeClass('white');
	}
});


			//Search Btn
function openSearch() {
	document.getElementById("overlay1").style.height = "100%";
}

function closeSearch() {
	document.getElementById("overlay1").style.height = "0";
}


			//Account
function openAccount() {
	document.getElementById("overlay2").style.height = "100%";
}

function closeAccount() {
	document.getElementById("overlay2").style.height = "0";
}

$(window).on("hashchange", function(){
	if(location.hash.slice(1) == "register") {
		$(".card").addClass("extend");
		$("#login").removeClass("selected");
		$("#register").addClass("selected");
	}
	else {
		$(".card").removeClass("extend");
		$("#login").addClass("selected");
		$("#register").removeClass("selected");
	}
});

$(window).trigger("hashchange");


			//Add To Cart Alert
$('.add-to-cart-btn').click(function(){
	Swal.fire({
		icon: 'success',
		title: 'Great!',
		text: 'Add To Cart Successfully',
		showConfirmButton: false,
		timer: 1500
	});
});


			//Landing Page Slider
var swiper = new Swiper('.landing-page', {
  pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});


			//Countdown
var countDate = new Date('August 1, 2020 00:00:00').getTime();

function countDown() {
	var now = new Date().getTime();
		gap = countDate - now;

		var second = 1000;
		var minute = second * 60;
		var hour = minute * 60;
		var day = hour * 24;

		var d = Math.floor(gap / (day));
		var h = Math.floor(gap % (day) / (hour));
		var m = Math.floor(gap % (hour) / (minute));
		var s = Math.floor(gap % (minute) / (second));

		document.getElementById('day').innerText = d;
		document.getElementById('hour').innerText = h;
		document.getElementById('minute').innerText = m;
		document.getElementById('second').innerText = s;
}

setInterval(function(){
	countDown();
},1000);



			//Featured Product Slider
$(document).ready(function(){
	$('.featured-wrapper').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 2000,
	  prevArrow: $('.prev'),
	  nextArrow: $('.next'),
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 960,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 640,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});
});


			//Testimonial Slider
var swiper = new Swiper('.testimonials-container', {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});