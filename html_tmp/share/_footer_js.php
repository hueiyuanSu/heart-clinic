<!-- js -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>

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




</script>



