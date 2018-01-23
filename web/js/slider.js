$(document).ready(function(){
	// slider
	$('.slider_wrapper').slick({
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
  		autoplaySpeed: 2000,
  		arrows: false
	});

	// resize header on scroll
	$(window).scroll(function () {
        $(".navbar-default").toggleClass("navbar-shrink", $(this).scrollTop() > 50)
    });

});
