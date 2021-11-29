(function($) {

	"use strict";

	var SaaS = {
		init: function() {
			this.Basic.init();  
		},

		Basic: {
			init: function() {

				this.preloader();
				this.BackgroundImage();
				this.MobileMenu();
				this.scrollTop();
				this.Trendingblog();

			},
			preloader: function (){
				$(window).on('load', function() {
					$(".preloader").fadeOut();
				});
			},
			BackgroundImage: function (){
				$('[data-background]').each(function() {
					$(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
				});
			},
			MobileMenu: function (){
				jQuery(window).on('scroll', function() {
					if (jQuery(window).scrollTop() > 250) {
						jQuery('.default-saasdoctor-header').addClass('sticky-on')
					} else {
						jQuery('.default-saasdoctor-header').removeClass('sticky-on')
					}
				});
				$('.str-open_mobile_menu').on("click", function() {
					$('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
				});
				$('.str-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on');
				});
				if($('.str-mobile_menu li.dropdown ul').length){
					$('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
					$('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function() {
						$(this).prev('ul').slideToggle(500);
					});
				}
			},
			Trendingblog: function (){
				var swiper = new Swiper(".trending-slider", {
					slidesPerView: 2,
					slidesPerColumn: 3,
					slidesPerColumnFill: 'row',
					spaceBetween: 30,
					loop: true,
					navigation: {
						nextEl: ".swiper-button-next",
						prevEl: ".swiper-button-prev",
					},
					breakpoints: {
						375: {
							slidesPerView: 1,
							spaceBetween: 20,
							slidesPerColumn: 2,
						},
						768: {
							slidesPerView: 1,
							spaceBetween: 20,
							slidesPerColumn: 2,
						},
						1024: {
							slidesPerView: 2,
							spaceBetween: 30,
							slidesPerColumn: 3,
						},
					},
				});
			},
			scrollTop: function (){
				$(window).on("scroll", function(){
					var ScrollBarPosition = $(this).scrollTop();
					if(ScrollBarPosition > 200 ) {
						$(".scroll-top").fadeIn();
					} else {
						$(".scroll-top").fadeOut();
					}
				});
				$(".scroll-top").on("click", function(){
					$('body,html').animate({
						scrollTop: 0,
					});
				})
			},
		}
	};
	jQuery(document).ready(function (){
		SaaS.init();
	});
	console.log('unit js loaded');
})(jQuery);