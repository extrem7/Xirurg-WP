jQuery(function ($) {
    window.onload = function () {
        function a(a, b) {
            var c = /^(?:file):/, d = new XMLHttpRequest, e = 0;
            d.onreadystatechange = function () {
                4 == d.readyState && (e = d.status), c.test(location.href) && d.responseText && (e = 200), 4 == d.readyState && 200 == e && (a.outerHTML = d.responseText)
            };
            try {
                d.open("GET", b, !0), d.send()
            } catch (f) {
            }
        }

        var b, c = document.getElementsByTagName("*");
        for (b in c) c[b].hasAttribute && c[b].hasAttribute("data-include") && a(c[b], c[b].getAttribute("data-include"))
    };
    'use strict';
    var MobileMenu = {
        showMenuMobile: function showMenuMobile() {
            $('.menu').addClass('open-menu');
            $('body').css('overflow', 'hidden');
            $('#overlay').addClass('open-menu');
        },
        closeMobileMenu: function closeMobileMenu() {
            $('.menu').removeClass('open-menu');
            $('body').css('overflow', 'auto');
            $('#overlay').removeClass('open-menu');
        },
        controller: function controller() {
            var _this = this;

            $("#mobile-menu").click(function () {
                _this.showMenuMobile();
            });
            $("#overlay, #close-menu").click(function () {
                _this.closeMobileMenu();
            });
        }
    };
    $(document).ready(function () {
        $(window).scroll(function () {
            if (screen.width > 992 && window.pageYOffset > 80) {
                //console.log(screen.availWidth);
                //console.log(window.pageYOffset);
                $('.header').addClass('header-scroll');
                $('body').addClass('menu-scroll');
            } else if ($('.header').hasClass('header-scroll')) {
                $('.header').removeClass('header-scroll');
                $('body').removeClass('menu-scroll');
            }
        });
        $(".category-menu > .active-category > a").click(function (e) {
            event.preventDefault();
            $(this).siblings('ul').slideToggle('slow', function () {
                $(this).parent().toggleClass('active');
                $(this).parent().removeClass('active-category');
            });
        });
        MobileMenu.controller();
        $(".carousel").swipe({
            swipe: function swipe(event, direction, distance, duration, fingerCount, fingerData) {
                if (direction == 'left') $(this).carousel('next');
                if (direction == 'right') $(this).carousel('prev');
            },
            allowPageScroll: "vertical"
        });
        if (screen.width < 768) {
            $("body").swipe({
                swipe: function swipe(event, direction, distance, duration, fingerCount, fingerData) {
                    if (direction == 'left') MobileMenu.showMenuMobile();
                    if (direction == 'right') MobileMenu.closeMobileMenu();
                },
                allowPageScroll: "vertical"
            });
        }
        $(".phone-mask").inputmask("+38 (999) 999-9999");
        if ($('body').hasClass('home')) {
            setTimeout(function () {
                $('.map-frame').append(map);
            }, 2000);
        }
        if ($('body').hasClass('category')) {
            $('.filter form').submit(function (e) {
                e.preventDefault();
                let link = $('.filter form select option:selected').attr('data-href');
                location.href = link;
            })
        }
        var wpcf7Elm = document.querySelector('.wpcf7');
        wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {
            $('#succesModal').modal('show');
        }, false);
        // $('.wpcf7-select option:first-child').attr('disabled','true');
    });
});