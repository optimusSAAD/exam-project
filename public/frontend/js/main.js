$(document).ready(function(){
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items:8,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
      responsive:{
            0:{
				items:4,
			},
			600:{
				items:4,
			},
			800:{
				items:8,
			},
			1080:{
				items:8,
			},
			1280:{
				items:8,
			},
			1680:{
				items:8,
			},
    }
    });
});