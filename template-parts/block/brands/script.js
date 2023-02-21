jQuery(document).ready(() => {
	jQuery('.brands-slider').slick({
		dots: false,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 1500,
		infinite: true,
		centerMode: false,
		cssEase: 'linear',
		easing: 'easy',
		// variableWidth: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [

			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 576,
				settings: {
					variableWidth: true,
					centerMode: true,
					slidesToShow: 3,
					slidesToScroll: 1,
					//centerPadding: '60px',
				},
			},
		],
	});
});
