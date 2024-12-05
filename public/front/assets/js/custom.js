$(function() {
	options = {
		"cursorOuter ": "circle-basic",
		"hoverEffect ": "pointer-overlay",
		"hoverItemMove ": false,
		"defaultCursor ": false,
		"outerWidth ": 41,
		"outerHeight ": 41
	}
	var screenSize = $(window).width();
	if (screenSize > 991) {
		magicMouse(options);
	}
});

$(".mouse_view").hover(
	function () {
	$("#magicMouseCursor").addClass("view_cursor");
	$("#magicPointer").addClass("view_cursor");
	},
	function () {
	$("#magicMouseCursor").removeClass("view_cursor");
	$("#magicPointer").removeClass("view_cursor");
	}
);
$(".mouse_go").hover(
	function () {
	$("#magicMouseCursor").addClass("go_cursor");
	$("#magicPointer").addClass("go_cursor");
	},
	function () {
	$("#magicMouseCursor").removeClass("go_cursor");
	$("#magicPointer").removeClass("go_cursor");
	}
);
jQuery(function ($) {
	'use strict';

	// START MENU JS
	$(window).on('scroll', function() {
		if ($(this).scrollTop() > 50) {
			$('.main-nav').addClass('menu-shrink');
		} else {
			$('.main-nav').removeClass('menu-shrink');
		}
	});				
	// END MENU JS

    // Mean Menu
	jQuery('.mean-menu').meanmenu({
		meanScreenWidth: "991"
	});

	// Home Slider JS
	$('.home-slider').owlCarousel({
		items:1,
		loop:true,
		margin:0,
		nav: true,
		dots: true,
		smartSpeed: 1000,
		autoplay:false,
		autoplayTimeout:9000,
		autoplayHoverPause:true,
		navText: [
			"<i class='icofont-simple-left'></i>",
			"<i class='icofont-simple-right'></i>"
		],
	});

	// Testimonial Slider JS
	$('.testimonial-slider').owlCarousel({
		items:1,
		loop:true,
		margin:0,
		nav: true,
		dots: false,
		smartSpeed: 1000,
		animateOut: 'fadeOut',
		autoplay:false,
		autoplayTimeout:9000,
		autoplayHoverPause:true,
		navText: [
			"<i class='icofont-simple-left'></i>",
			"<i class='icofont-simple-right'></i>"
		],
	});
	
    // Search Box JS
    $('.search-toggle').addClass('closed');
    $('.search-toggle .search-icon').on('click', function(e) {
        if ($('.search-toggle').hasClass('closed')) {
        $('.search-toggle').removeClass('closed').addClass('opened');
        $('.search-toggle, .search-area').addClass('opened');
        $('#search-terms').focus();
        } else {
        $('.search-toggle').removeClass('opened').addClass('closed');
        $('.search-toggle, .search-area').removeClass('opened');
        }
	});

	// Slick Slider JS
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
		fade: true,
        asNavFor: '.slider-nav'
    });
	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		focusOnSelect: true,
		prevArrow: false,
		nextArrow: false,
		centerMode: true,
		focusOnSelect: true,
		variableWidth: true,
		responsive: [
		    {
		        breakpoint: 3000,
		        setting: {
		            slidesToShow: 3
		        }
		    },
		    {
		        breakpoint: 1400,
		        setting: {
		            slidesToShow: 2
		        }

		    },
		    {
		        breakpoint: 800,
		        setting: {
		            slidesToShow: 1
		        }

		    }
		]
	});
	
	// Odometer JS
	$('.odometer').appear(function(e) {
		var odo = $('.odometer');
		odo.each(function() {
			var countNumber = $(this).attr('data-count');
			$(this).html(countNumber);
		});
	});

	// Popup Video
	$('.popup-youtube').magnificPopup({
		disableOn: 300,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Accordion JS
	$('.accordion > li:eq(0) .faq-head').addClass('active').next().slideDown();
	$('.accordion .faq-head').on('click', function(j) {
		var dropDown = $(this).closest('li').find('.faq-content');
		$(this).closest('.accordion').find('.faq-content').not(dropDown).slideUp(300);
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
		} else {
			$(this).closest('.accordion').find('.faq-head.active').removeClass('active');
			$(this).addClass('active');
		}
		dropDown.stop(false, true).slideToggle(300);
		j.preventDefault();
	});

	// Timer JS
	let getDaysId = document.getElementById('days');
	if(getDaysId !== null){
		
		const second = 1000;
		const minute = second * 60;
		const hour = minute * 60;
		const day = hour * 24;

		let countDown = new Date('December 30, 2026 00:00:00').getTime();
		setInterval(function() {
			let now = new Date().getTime();
			let distance = countDown - now;

			document.getElementById('days').innerText = Math.floor(distance / (day)),
			document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
			document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
			document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
		}, second);
	};

	// PRELOADER
	jQuery(window).on('load',function(){
		jQuery(".loader").fadeOut(500);
	});

	// Wow JS
	new WOW().init();

	// Back to top 
	$('body').append('<div id="toTop" class="back-to-top-btn"><i class="icofont-hand-drawn-up"></i></div>');
	$(window).scroll(function () {
		if ($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();
		} else {
			$('#toTop').fadeOut();
		}
	}); 
	$('#toTop').on('click', function(){
		$("html, body").animate({ scrollTop: 0 }, 0);
		return false;
	});

	// Subscribe form
	$(".newsletter-form").validator().on("submit", function (event) {
		if (event.isDefaultPrevented()) {
		// handle the invalid form...
		formErrorSub();
		submitMSGSub(false, "Please enter your email correctly.");
		} else {
		// everything looks good!
		event.preventDefault();
		}
	});
	function callbackFunction (resp) {
		if (resp.result === "success") {
		formSuccessSub();
		}
		else {
		formErrorSub();
		}
	}
	function formSuccessSub(){
		$(".newsletter-form")[0].reset();
		submitMSGSub(true, "Thank you for subscribing!");
		setTimeout(function() {
		$("#validator-newsletter").addClass('hide');
		}, 4000)
	}
	function formErrorSub(){
		$(".newsletter-form").addClass("animated shake");
		setTimeout(function() {
		$(".newsletter-form").removeClass("animated shake");
		}, 1000)
	}
	function submitMSGSub(valid, msg){
		if(valid){
		var msgClasses = "validation-success";
		} else {
		var msgClasses = "validation-danger";
		}
		$("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
	}
	
	// AJAX MailChimp
	$(".newsletter-form").ajaxChimp({
		url: "https://hibootstrap.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", // Your url MailChimp
		callback: callbackFunction
	});	

	// Switch Btn
	$('body').append("<div class='switch-box'><label id='switch' class='switch'><input type='checkbox' onchange='toggleTheme()' id='slider'><span class='slider round'></span></label></div>");
}(jQuery));


// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('medsev_theme', themeName);
    document.documentElement.className = themeName;
}

// function to toggle between light and dark theme
function toggleTheme() {
    if (localStorage.getItem('medsev_theme') === 'theme-dark') {
        setTheme('theme-light');
    } else {
        setTheme('theme-dark');
    }
}

// Immediately invoked function to set the theme on initial load
(function () {
    if (localStorage.getItem('medsev_theme') === 'theme-dark') {
        setTheme('theme-dark');
        document.getElementById('slider').checked = false;
    } else {
        setTheme('theme-light');
      document.getElementById('slider').checked = true;
    }
})();

$('.partner_slider').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    nav: false,
    autoplay:true,
    autoplayTimeout:2000,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});
$('.working-histry-slider').owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    nav: true,
    // autoplay:true,
    // autoplayTimeout:4000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 3
        }
    }
});
$('.blogs-slider').owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    nav: true,
    autoplay:true,
    autoplayTimeout:5000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 3
        }
    }
});
$('.q-slider').owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    // nav: true,
    autoplay:true,
    autoplayTimeout:5000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});


$(document).ready(function() {
	lightGallery(document.getElementById('animated-thumbnails'), {
		plugins: [lgZoom, lgThumbnail],
		licenseKey: 'your_license_key',
		speed: 500,
	});
	//FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
	function autoPlayYouTubeModal() {
		var trigger = $("body").find('[data-toggle="modal"]');
		trigger.click(function() {
			var theModal = $(this).data("target"),
				videoSRC = $(this).attr("data-theVideo"),
				videoSRCauto = videoSRC + "?autoplay=1";
			$(theModal + ' iframe').attr('src', videoSRCauto);
			$(theModal + ' button.close').click(function() {
				$(theModal + ' iframe').attr('src', videoSRC);
			});
		});
	}
	autoPlayYouTubeModal();
  });

  jQuery(document).ready(function($) {
	"use strict";
	//  TESTIMONIALS CAROUSEL HOOK
	$('#customers-testimonials').owlCarousel({
		loop: true,
		center: true,
		items: 3,
		margin: 20,
		// autoplay: true,
		dots:true,
		// autoplayTimeout: 8500,
		// smartSpeed: 450,
		responsive: {
		  0: {
			items: 1
		  },
		  768: {
			items: 2
		  },
		  1170: {
			items: 3
		  }
		}
	});
});
AOS.init();
document.addEventListener('DOMContentLoaded', function() {
	if (!localStorage.getItem('aosInitialized')) {
		AOS.init();
		localStorage.setItem('aosInitialized', 'true');
	}
});
AOS.init({
	once: true // Animations will happen only once
});


$(document).ready(function(){
    $(".dropdown_toggle").click(function(){
        var dropdownMenu = $(this).next(".dropdown_menu");

        // Check if the dropdown is visible and toggle the slide effect
        if (dropdownMenu.is(":visible")) {
            dropdownMenu.slideUp(300); // Slide up to close
        } else {
            $(".dropdown_menu").slideUp(300); // Close all other dropdowns
            dropdownMenu.slideDown(300); // Slide down to open
        }
    });

    // Close the dropdown if the user clicks outside of it
    $(document).click(function(event) {
        if (!$(event.target).closest('.drop_down').length) {
            $(".dropdown_menu").slideUp(300);
        }
    });
});

$(document).ready(function() {
	$('#mobile-dropdown').on('change', function() {
	  var target = $(this).val();
	  $('html, body').animate({
		scrollTop: $(target).offset().top
	  }, 500);
	});
});

$(document).ready(function() {
    $(".scroll_to_bar_wrap div").on("click", "a", function(event) {
        event.preventDefault();
        $(".scroll_to_bar_wrap div a").removeClass("active");
        $(this).addClass("active");
        const targetElementID = $(this).attr("href");
        const offsetTop = 90;
        $("html, body").animate({
                scrollTop: $(targetElementID).offset().top - offsetTop
            },
            400
        );
    });


	const sections = $(".scrolling-active");
    const navLinks = $(".v-scrollspy a");

    // Scrollspy functionality
    $(window).on("scroll", function() {
        let currentScroll = $(this).scrollTop();

        sections.each(function() {
            const sectionTop = $(this).offset().top - 10; // Small offset to trigger early
            const sectionBottom = sectionTop + $(this).outerHeight();

            if (currentScroll >= sectionTop && currentScroll < sectionBottom) {
                const sectionID = $(this).attr("id");

                // Remove 'active' class from all links and add to the current link
                navLinks.removeClass("active");
                $(`.v-scrollspy a[href="#${sectionID}"]`).addClass("active");
            }
        });
    });

	$(".v-scrollspy").on("click", "a", function(event) {
        event.preventDefault();
        $(".v-scrollspy a").removeClass("active");
        $(this).addClass("active");
        const targetElementID = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(targetElementID).offset().top
        }, 400); // No offset here
    });

});
  
$(document).ready(function () {
	$(".js-select2").each(function () {
	var placeholder = $(this).data("placeholder");
	$(this).select2({
		placeholder: placeholder,
		allowClear: true, // Allows the user to clear the selection
	});
	});
});

var swiper = new Swiper(".property-detail-slider", {
    spaceBetween: 10,
    slidesPerView: 6,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
        // When window width is <= 768px
        768: {
            slidesPerView: 6, // Show 3 slides on tablets
        },
        // When window width is <= 480px
        280: {
            slidesPerView: 4, // Show 2 slides on mobile
        },
    },
});

var swiper2 = new Swiper(".property-detail-slider2", {
	spaceBetween: 10,
	navigation: {
	nextEl: ".swiper-button-next",
	prevEl: ".swiper-button-prev",
	},
	pagination: {
	el: ".swiper-pagination",
	clickable: true,
	},
	thumbs: {
	swiper: swiper,
	},
});