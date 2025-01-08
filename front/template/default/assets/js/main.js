window.onload = function() {
    $(".preload").delay(400).fadeOut("200", function () {
        $('#preload').addClass('move');
        $('#preload').fadeOut(200);
    });
};
// AOS.init({
//     offset: 100,
//     duration: 1000,
//     easing: 'ease',
//     once: true,global-container
//   });
$(document).ready(function () {
    // new WOW().init();

    $('.select-control').select2({
        minimumResultsForSearch: Infinity,
        placeholder: "Select"
    });
    
    $('.select-control.has-search').select2({
        placeholder: "Select"
    });

    $("[data-fancybox]").fancybox({
        thumbs     : false,
        slideShow  : false,
        fullScreen : false
    });

    $(".mcscroll").mCustomScrollbar({
       axis : "y",
       scrollButtons: {
           enable: true
       }
    });
    $(".mcscrollX").mCustomScrollbar({
       axis : "x",
       scrollButtons: {
           enable: true
       }
    });

    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });

    $('.overflow-line-1').trunk8({
       lines: 1,
       tooltip : false
    });
    $('.overflow-line-2').trunk8({
       lines: 2,
       tooltip : false
    });
    $('.overflow-line-3').trunk8({
       lines: 3,
       tooltip : false
    });

    var topbar = $('.site-header').height();
    $(window).scroll(function() {
        if ($(window).scrollTop() > topbar) {
            $(".site-header").addClass("tiny");
        } else {
            $(".site-header").removeClass("tiny");
        }
    });

    // $('[data-toggle="menu-mobile"]').click(function(){
    //     $(this).toggleClass('close');
    //     $('.global-container').toggleClass('sidebar-open');
    //     $('nav.menu').toggleClass('open');
    // });
    // $('[data-toggle="menu-overlay"]').click(function(){
    //     $('[data-toggle="menu-mobile"]').removeClass('close');
    //     $('.global-container').removeClass('sidebar-open');
    //     $('nav.menu').removeClass('open');
    // });

    // topgraphic
    $('.topgraphic .slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1500,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        customPaging:function(slider, i) {
            var thumb = $(slider.$slides[i]).data();
            let IDbuttom = thumb['slickIndex'];
            if(IDbuttom < 9){
                return '<button>0'+[i+1]+'</button>';
            } else {
                return '<button>'+[i+1]+'</button>';
            }
        },
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    rows: 1,
                    slidesPerRow:1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    rows: 1,
                    slidesPerRow:1
                }
            },
            {
                breakpoint: 1366,
                settings: {
                    rows: 1,
                    slidesPerRow:1
                }
            }
        ]
    });
    // project
    $('.project-list .slider').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        speed: 1500,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    speed: 600,
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 991,
                settings: {
                    infinite: true,
                    speed: 600,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 575,
                settings: {
                    infinite: true,
                    speed: 600,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
    // product
    $('.product-list .slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 1500,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    speed: 600,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    infinite: true,
                    speed: 600,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
        ]
    });
    // menu-inner
    $('.menu-list .slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 1500,
        dots: false,
        arrows: true,
        responsive: [
          {
              breakpoint: 1200,
              settings: {
                  speed: 600,
              }
          },
          {
              breakpoint: 575,
              settings: {
                  infinite: true,
                  arrows: false,
                  dots: true,
                  speed: 600,
                  slidesToShow: 2,
                  slidesToScroll: 1
              }
          },
        ]
    });
    // gallery
    $('.gallery-list .slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
        infinite: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        speed: 1500,
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    speed: 600,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    speed: 600,
                    arrows: false,
                    dots: true,
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 575,
                settings: {
                    infinite: false,
                    speed: 600,
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
        ]
    });
    // download
    $('.download-list .slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        speed: 1500,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    speed: 600,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    infinite: true,
                    speed: 600,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
    // solution
    $('.solution-list .slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1500,
        dots: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    speed: 600,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    infinite: true,
                    arrows: false,
                    speed: 600,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
    // product and service
    $('.product-service-list .slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1500,
        dots: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    speed: 600,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    infinite: true,
                    arrows: false,
                    speed: 600,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
    // detail
    $('.gallery-detail-list .slider-single').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        speed: 1500,
        responsive: [{
            breakpoint: 1200,
            settings: {
                speed: 600,
            }
        }]
    });
    // partner
    $('.partner .slider').slick({
        infinite: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3
                }
            },
        ]
    });
   
    $('.gallery-detail-list .slider-nav')
        .on('init', function(event, slick) {
            $('.slider-nav .slick-slide.slick-current').addClass('is-active');
        })
        .slick({
            prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
            nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            focusOnSelect: false,
            infinite: false,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    speed: 600,
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
               }
            }, {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
           }
            }]
        });
   
    $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
        $('.slider-nav').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.slider-nav .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });
   
    $('.slider-nav').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');
   
        $('.slider-single').slick('slickGoTo', goToSingleSlide);
    });

    // $('#contact-form').validator().on('submit', function (e) {
    //     if (e.isDefaultPrevented()) {
    //         // $('#modal_contact').modal('show');
    //     } else {
    //         $('#modal_contact').modal('show');
    //         return false;
    //     }
    // });
    // $('#contact-form-modal').validator().on('submit', function (e) {
    //     if (e.isDefaultPrevented()) {
    //         // $('#modal_contact').modal('show');
    //     } else {
    //         $('#modal_contact').modal('show');
    //         $('#modal_contact_form').modal('hide');
    //         return false;
    //     }
    // });

    $('#btn_send').prop('disabled', true);
    $('#btn_send').addClass('disabled');
    $('input[type="text"]').on('input change', function() {
        if($(this).val() != '') {
            $('#btn_send').prop('disabled', false);
            $('#btn_send').removeClass('disabled');
        } else {
            $('#btn_send').prop('disabled', true);
            $('#btn_send').addClass('disabled');
        }
    });

    $('.btn-contact').click(function() {
        $('html, body').animate({
            scrollTop: $("#contact_us").offset().top - 120
        }, 500);
    });

});

function openST(evt, dataIcon) {
    var i, content, btnHover;
    content = document.getElementsByClassName("ckid");
    for (i = 0; i < content.length; i++) {
        content[i].style.display = "none";
    }
    btnHover = document.getElementsByClassName("btn-hover");
    for (i = 0; i < btnHover.length; i++) {
        btnHover[i].className = btnHover[i].className.replace(" activeST", "");
    }
    document.getElementById(dataIcon).style.display = "block";
    evt.currentTarget.className += " activeST";
}

/* Start modify by bon 04/08/2564 */ 
// ## set url api
var path = $("base").attr("href");
var fullpath = window.location.href;
var arr = fullpath.split('/')
var pathApi = path+arr[4];

function vlidateForm(){


    if($('#nameInput').val() == ''){
        return false;
    }
    if($('#companyInput').val() == ''){
        return false;
    }
    if($('#emailInput').val() == ''){
        return false;
    }
    if($('#telInput').val() == ''){
        return false;
    }
    submitContact();
}

function submitContact() {
    var TYPE = "POST";
    var URL = path + 'en/api/insertContact';
    const form = document.getElementById('contact-form');
    // สร้าง FormData
    const formData = new FormData(form);

  

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: formData,
        processData: false, 
        contentType: false, 
        success: function(response) {
            $('#modalComplete').modal('show');
            setTimeout(function() {
                $('#modalComplete').modal('hide');
                location.reload(); 
            }, 3000);
        },
        error: function(xhr, status, error) {
            console.log('Error occurred during submission:', status, error);
        }
    });
}

function vlidateForm2() {
    // ตรวจสอบว่าฟิลด์กรอกครบหรือไม่
    if ($('#nameInput').val() === '') {
        alert('Please enter your name.');
        return false;
    }

    if ($('#emailInput').val() === '') {
        alert('Please enter your email.');
        return false;
    }

    // ถ้าผ่านการตรวจสอบให้เรียก submitDownload()
    submitDownload();
}

function submitDownload() {
    var TYPE = "POST";
    var URL = path + 'en/api/insertDownload';
    const form = document.getElementById('downloadform');

    // สร้าง FormData
    const formData = new FormData(form);

    // ส่งข้อมูลผ่าน AJAX
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log('Download request successful:', response);

            // คลิกลิงก์ดาวน์โหลด
            document.getElementById('autoDownloadLink').click();

            // รีเซ็ตฟอร์ม
            form.reset();

            // ปิด Modal
            $('#modalContactForm').modal('hide');
        },
        error: function(xhr, status, error) {
            console.log('Error occurred during submission:', status, error);
        }
    });
}









grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
    grecaptcha.execute('6LeiOU8mAAAAALEEZVAtyyOevXrTmc93MPSf0KZ1', {action:'validate_captcha'})
                .then(function(token) {
        // add token value to form
        document.getElementById('g-recaptcha-response').value = token;
    });
});
/* End modify by bon 04/08/2564 */ 


// ใช้ Event Delegation กับ parent element
document.addEventListener('click', function (event) {
    // ตรวจสอบว่าคลิกที่ปุ่มที่มี class "btn-download"
    if (event.target.closest('.btn-download')) {
        var button = event.target.closest('.btn-download');
        
        // ดึงค่า data-file-name
        var fileName = button.getAttribute('data-file-name');
        console.log('File Name:', fileName);

        // ใส่ค่าลงใน input ที่ซ่อน
        var fileInput = document.getElementById('fileNameInput');
        if (fileInput) {
            fileInput.value = fileName;
            console.log('Input Value:', fileInput.value);
        }
    }
});



$(document).ready(function(){
  $(function(){
    ("use strict");
    AOS.init({
      duration: 1200,
      once: true,
      offset: 0,
    });

    $("[data-toggle='dropdown']").click(function(e) {   
      e.preventDefault();
      $(this).toggleClass("active");
      $(this).parents(".dropdown").toggleClass("open");
      $(this).parents(".dropdown").find(".dropdown-menu").toggleClass('show');
      e.stopPropagation();
    });
    $("html").click(function() {
      $(".dropdown").find("a, button").removeClass("active");
      $(".dropdown").removeClass("open");
      $(".dropdown-menu").removeClass("show");
    });
    $('[data-toggle="menu-mobile"]').click(function(){
      $(this).toggleClass('close');
      $('.global-container').toggleClass('sidebar-open');
      $('nav.menu').toggleClass('open');
    });
    $('[data-toggle="menu-overlay"]').click(function(){
        $('[data-toggle="menu-mobile"]').removeClass('close');
        $('.global-container').removeClass('sidebar-open');
        $('nav.menu').removeClass('open');
    });
  });

  // select2
  $('.select-control').select2({
    minimumResultsForSearch: -1,
    placeholder: function () {
        $(this).data('placeholder');
    }
  });

  $('.tab-horizontal').each(function() {
    let tab = $(this).find('.tab');
    let tabContent = $(this).find('.tab-content');
    let selector = tab.find(".selector");
    let item = tab.find('a');

    function tabSelector() {
        let activeItem = tab.find('.active');
        let activeWidth = activeItem.innerWidth();
        selector.css({
            "left": activeItem.position.left + "px",
            "width": activeWidth + "px"
        });
    }
    tabSelector();

    tab.on("click", "a", function(e) {
        e.preventDefault();
        item.removeClass('active');
        $(this).addClass('active');

        let activeWidth = $(this).innerWidth(),
            itemPos = $(this).position();

        selector.css({
            "left": itemPos.left + "px",
            "width": activeWidth + "px"
        });

        let tabAttr = $(this).attr("href");

        tabContent.removeClass('active');
        $(tabAttr).addClass('active');
    });

    $(window).resize(function() {
        tabSelector();
        setTimeout(function() {
            let activeWidth = tab.find('.active').innerWidth();
            let itemPos = tab.find('.active').position();
            selector.css({
                "left": itemPos.left + "px",
                "width": activeWidth + "px"
            });
        }, 100);
    });
  });
  

  var footerProduct = new Swiper(".footer-product .swiper", {
    slidesPerView: 6,
    spaceBetween: 20,
    speed: 1500,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 13,
      },
      766: {
        slidesPerView: 3,
        spaceBetween: 13,
      },
      990: {
        slidesPerView: 4,
        spaceBetween: 13,
      },
      1198: {
        slidesPerView: 5,
      },
      1439: {
        spaceBetween: 18,
        slidesPerView: 6,
      },
      1599: {
        spaceBetween: 20,
        
      }
    },
  });

  var heroBannerSwiper = new Swiper(".hero-banner .swiper", {
    slidesPerView: 1,
    // spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 1500,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    // breakpoints: {
    //   0: {
    //     slidesPerView: 1,
    //     spaceBetween: 13,
    //   },
    //   766: {
    //     slidesPerView: 3,
    //     spaceBetween: 13,
    //   },
    //   990: {
    //     slidesPerView: 4,
    //     spaceBetween: 13,
    //   },
    //   1198: {
    //     slidesPerView: 5,
    //   },
    //   1439: {
    //     spaceBetween: 18,
    //     slidesPerView: 6,
    //   },
    //   1599: {
    //     spaceBetween: 20,
        
    //   }
    // },
  });

  var scNewsSwiper = new Swiper(".sc-news .swiper", {
    slidesPerView: 'auto',
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 1500,
    // autoplay: {
    //     delay: 5000,
    //     disableOnInteraction: false,
    // },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 15,
        centeredSlides: false,
      },
      574: {
        slidesPerView: 2,
        spaceBetween: 15,
        centeredSlides: false,
      },
      990: {
        slidesPerView: 2,
        spaceBetween: 15,
        centeredSlides: false,
      },
      1198: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1439: {
        spaceBetween: 20,
        // slidesPerView: 6,
        slidesPerView: 'auto',
      },
      1599: {
        spaceBetween: 30,
        
      }
    },
  });

  var galleryThumb = new Swiper(".gallery-thumb", {
    slidesPerView: 4,
    spaceBetween: 10,
    speed: 1200,
    freeMode: true,
    loop: false,
    watchSlidesProgress: true,
    thumbs: {
      swiper: galleryMain,
    },
    navigation: {
      nextEl: ".gallery-thumb .swiper-button-next",
      prevEl: ".gallery-thumb .swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 3,
        spaceBetween: 8,
        // centeredSlides: true,
      },
      766: {
        slidesPerView: 4,
        spaceBetween: 10,
        // centeredSlides: true,
      },
      990: {
        slidesPerView:4,
        // centeredSlides: true,
      },
      // 1198: {
      //   slidesPerView: 4,
      // },
      // 1439: {
      //   slidesPerView: 'auto',
      // },
    },
  });

  var galleryMain = new Swiper(".gallery-main", {
    spaceBetween: 0,
    speed: 1200,
    loop: false,
    // navigation: {
    //   nextEl: ".gallery-slide .swiper-button-next",
    //   prevEl: ".gallery-slide .swiper-button-prev",
    // },
    thumbs: {
      swiper: galleryThumb,
    },
  });

  var scNewsHilightSwiper = new Swiper(".sc-news-hilight .swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 1500,
    // autoplay: {
    //     delay: 5000,
    //     disableOnInteraction: false,
    // },
    breakpoints: {
      0: {
        spaceBetween: 15,
      },
      1198: {
        spaceBetween: 20,
      },
  
      1599: {
        spaceBetween: 30,
        
      }
    },
  });

});

// banner
var path = $("base").attr("href");
var fullpath = window.location.href;
var arr = fullpath.split('/')
var pathApi = path+arr[4];
function updateViewHome(id = null){
    // console.log(id);
    var TYPE = "POST";
    var URL = pathApi+'/api/updateView';
    var Contantid = id;
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: {id:Contantid},
        success: function(res) {
            let data = JSON.parse(res);
            if(data.target == '2' && data.url != '' && data.url != '#'){
                window.open(data.url,"_blank");
                // window.location = data.link;
            }
            if(data.target == '1' && data.url != '' && data.url != '#'){
                window.location = data.url;
                // window.open(data.link);
            }
        }
    });
}



$('.ck-about').closest('.layout-body').addClass('layout-about');