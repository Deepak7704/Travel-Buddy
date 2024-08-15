
$(document).ready(function () {
	$(".slick-list").slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		infinite: false,
		autoplay: false
	});
	$(".prev-btn").click(function () {
		$(".slick-list").slick("slickPrev");
	});

	$(".next-btn").click(function () {
		$(".slick-list").slick("slickNext");
	});
	$(".prev-btn").addClass("slick-disabled");
	$(".slick-list").on("afterChange", function () {
		if ($(".slick-prev").hasClass("slick-disabled")) {
			$(".prev-btn").addClass("slick-disabled");
		} else {
			$(".prev-btn").removeClass("slick-disabled");
		}
		if ($(".slick-next").hasClass("slick-disabled")) {
			$(".next-btn").addClass("slick-disabled");
		} else {
			$(".next-btn").removeClass("slick-disabled");
		}
	});
});
document.querySelector('.js-isha-foundation').addEventListener('click',()=>{
	window.location.href='isha-foundation.html'
});
document.querySelector('.js-ayodhya').addEventListener('click',()=>{
	window.location.href="Ayodhya.html"
});
document.querySelector('.js-kedernath').addEventListener('click',()=>{
	window.location.href="Kedarnath.html"
});
document.querySelector('.js-konark').addEventListener('click',()=>{
	window.location.href="konark.html"
});
document.querySelector('.js-varanasi').addEventListener('click',()=>{
	window.location.href="Varanasi.html"
});
document.querySelector('.js-aksharadham').addEventListener('click',()=>{
	window.location.href="Akshardham.html"
});
document.querySelector('.js-zoo6').addEventListener('click',()=>{
	window.location.href="Bannerghatta.html"
});
document.querySelector('.js-zoo4').addEventListener('click',()=>{
	window.location.href="Gir.html"
});
document.querySelector('.js-zoo2').addEventListener('click',()=>{
	window.location.href="Nehru.html"
});
document.querySelector('.js-zoo3').addEventListener('click',()=>{
	window.location.href="Ranthambore.html"
});
document.querySelector('.js-zoo1').addEventListener('click',()=>{
	window.location.href="Sanjay.html"
});
document.querySelector('.js-zoo5').addEventListener('click',()=>{
	window.location.href="Jim.html"
});


document.querySelector('.js-yuksom').addEventListener('click',()=>{
	window.location.href="Yuksom.html"
});
document.querySelector('.js-gurez').addEventListener('click',()=>{
	window.location.href="Gurez.html"
});
document.querySelector('.js-dandeli').addEventListener('click',()=>{
	window.location.href="Dandeli.html"
});
document.querySelector('.js-chaptal').addEventListener('click',()=>{
	window.location.href="Chaptal.html"
});
document.querySelector('.js-manali').addEventListener('click',()=>{
	window.location.href="Manali.html"
});
document.querySelector('.js-araku').addEventListener('click',()=>{
	window.location.href="Araku.html"
});
