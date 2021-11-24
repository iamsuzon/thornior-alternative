(function($){
	'use strict';

    //menu side bar
    $('.mobile-bar').on('click', function(){
        $('body,header,.mobile-bar,.main-menu').toggleClass('active');
    });

    $('.crose-bar').on('click', function(){
        $('body,header,.mobile-bar,.main-menu').removeClass('active');
    });

    // menu icon-related
    $(".list-item>li>.sub-menu").parent("li").children("a").addClass("icon-down");

    //mobile drodown menu display
	$('ul.menu-list li a').on('click', function(e) {
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp(500,"swing");
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown(500,"swing");
            element.siblings('li').children('ul').slideUp(500,"swing");
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp(500,"swing");
        }
	});


    // drop down menu width overflow problem fix
    $('ul').parent().on('hover', function() {
        var menu = $(this).find("ul");
        var menupos = $(menu).offset();
        if (menupos.left + menu.width() > $(window).width()) {
            var newpos = -$(menu).width();
            menu.css({ left: newpos });
        }
    });
    // Theme switcher
    $(document).ready(function(){
        $(".theme-switcher").click(function(){
        $(this).text(function(i, v){
        return v === 'light' ? 'dark' : 'light'
        });
        });
    });

    (function() {
    $('.theme-switcher').click(function() {
        $('#theme').toggleClass('dark');
    });
    })();

     // Scroll To Top
    var scrollTop = $(".scrollToTop");
    $(window).on('scroll', function () {
        if ($(this).scrollTop() < 500) {
        scrollTop.removeClass("active");
        } else {
        scrollTop.addClass("active");
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').on('click', function () {
        $('html, body').animate({
        scrollTop: 0
        }, 500);
        return false;
    });

    // lightcase activation//
	$('a[data-rel^=lightcase]').lightcase();
	$(window).on('load', function(){
		$('.preloader').fadeOut(1000);
	})

    //creating a style object for the ripple effect
    function RippleStyle(width, height, posX, posY){
        this.width = ( width <= height ) ? height : width;
        this.height = ( width <= height ) ? height : width;
        this.top = posY - (this.height * 0.5);
        this.left = posX - (this.width * 0.5);
    }
    $('.btn').on('mousedown', function(e){
        //appending an element with a class name "btn-ripple"
        var rippleEl = $('<span class="btn-ripple"></span>').appendTo(this);

        //getting the button's offset position
        var pos = $(this).offset();

        //get the button's width and height
        var width = $(this).outerWidth();
        var height = $(this).outerHeight();

        //get the cursor's x and y position within the button
        var posX = e.pageX - pos.left;
        var posY = e.pageY - pos.top;

        //adding a css style to the ripple effect
        var rippleStyle = new RippleStyle(width, height, posX, posY);
        rippleEl.css(rippleStyle);
    });

    //this event listener will be triggered once the ripple animation is done
    $('.btn').on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', '.btn-ripple', function(){
        $(this).remove();
    });

    // banner-slider activation
    var swiper = new Swiper('.banner-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    //sponser slider activation
    var swiper = new Swiper('.categori-slider', {
        slidesPerView: 2,
        speed:1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        loop: true,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            425: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 6,
            }
        }
    });

    // category-slider1 activation
    var swiper = new Swiper('.category-slide1', {
        slidesPerView: 2,
        spaceBetween: 15,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
              slidesPerView: 3,
            },
            768: {
              slidesPerView: 3,
            }
        }
    });

    // category-slider1 activation
    var swiper = new Swiper('.category-slide1in2', {
        slidesPerView: 2,
        spaceBetween: 15,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
              slidesPerView: 3,
            },
            768: {
              slidesPerView: 3,
            }
        }
    });

    // category-slider1 activation
    var swiper = new Swiper('.category-slide1in3', {
        slidesPerView: 2,
        spaceBetween: 15,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
              slidesPerView: 3,
            },
            768: {
              slidesPerView: 3,
            }
        }
    });

    // category-slider2 activation
    var swiper = new Swiper('.category-slide2', {
        slidesPerView: 1,
        spaceBetween: 15,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
            }
        }
    });

    // category-slider3 activation
    var swiper = new Swiper('.category-slide3', {
        slidesPerView: 1,
        spaceBetween: 15,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
            }
        }
    });

    // latest blog activation
    var swiper = new Swiper('.latest-blog-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.latest-button-next',
            prevEl: '.latest-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 5.5,
            },
        }
    });

    // viewed blog activation
    var swiper = new Swiper('.viewed-blog-slider', {
        slidesPerView: 1,
        spaceBetween: 15,
        navigation: {
            nextEl: '.viewed-button-next',
            prevEl: '.viewed-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    // thornior blog activation
    var swiper = new Swiper('.thornior-blog-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.thornior-button-next',
            prevEl: '.thornior-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 5.5,
            },
        }
    });

     // videos blog activation
     var swiper = new Swiper('.videos-blog-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.videos-button-next',
            prevEl: '.videos-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 5.5,
            },
        }
    });


     // collabs blog activation
     var swiper = new Swiper('.collabs-blog-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.collabs-button-next',
            prevEl: '.collabs-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 5.5,
            },
        }
    });

    // blog video banner 2 colum activation
    var swiper = new Swiper('.blog-video-slider', {
        slidesPerView: 2,
        slidesPerColumn: 2,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints : {
            640: {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
            768: {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
            1024: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
        }
    });

    // blog profile activation
    var swiper = new Swiper('.blog-profile-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.latest-button-next',
            prevEl: '.latest-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2.5,
            },
            1024: {
                slidesPerView: 3.5,
            },
        }
    });

     // blog profile activation
     var swiper = new Swiper('.newcategory-slider', {
        slidesPerView: 2,
        spaceBetween: 30,
        centeredSlides : true,
        grabCursor: true,
        loop: true,
        navigation: {
            nextEl: '.new-button-next',
            prevEl: '.new-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
        }
    });

    // setup blog activation
    var swiper = new Swiper('.setup-slider', {
        slidesPerView: 1.5,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.latest-button-next',
            prevEl: '.latest-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 3,
            },
            1100: {
                slidesPerView: 3,
            },
        }
    });

    // blog profile activation
    var swiper = new Swiper('.blog-profile-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.latest-button-next',
            prevEl: '.latest-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2.5,
            },
            1024: {
                slidesPerView: 3.5,
            },
        }
    });

    // image blog post slider
    var swiper = new Swiper('.blog-post-slider', {
        slidesPerView: 1.5,
        spaceBetween: 10,
        navigation: {
            nextEl: '.latest-button-next',
            prevEl: '.latest-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2.5,
            },
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 4.5,
            },
        }
    });

    //ui tabs activation
    $( function() {
        $( "#tabs" ).tabs();
    } );

})(jQuery);
