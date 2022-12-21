(function ($) {
  
    jQuery(document).ready(function () {
        // Sticky header
        jQuery(window).scroll(function () {
            if ($(this).scrollTop() > 98) {
                $('#top-bar').addClass("sticky");
            } else {
                $('#top-bar').removeClass("sticky");
            }
        });

        $('.booking-div .nav-tabs').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));
            $links.not($active).each(function () {
                $($(this).attr('href')).hide();
            });
            $(this).on('click', 'a', function (e) {
                var c = this;
                $active.removeClass('active');
                $content.fadeOut("fast", function () {
                    $active = $(c);
                    $content = $($(c).attr('href'));

                    $active.addClass('active');
                    $content.fadeIn("fast");
                });
                e.preventDefault();
            });
        });    
        
        $('#home-services .service-card .service-desc p').matchHeight();
        $('#reviews #reviews-slider .item .review-slide .review-text').matchHeight();

        $('#why-us .why-card').matchHeight();
        $('#latest-news .blog-card .blog-desc h3').matchHeight();
        $('#bottom-services #services-slider .service-card').matchHeight();
        $('#video-reviews .video-card').matchHeight();
        $('#blog-listing .blog-card').matchHeight();
        $('#services-main #why-us #services-slider .service-card .service-desc h3').matchHeight();
        $('.related-articles .blog-card .blog-desc h3').matchHeight();
        $('#blog-header #categories-slider .cat-card a').matchHeight();

            // Menu
    $('#mobile-menu--btn button').click(function(){
        $('.main-menu-sidebar').addClass("menu-active");
        $('.menu-overlay').addClass("active-overlay");
        $(this).toggleClass('open');
    });

    // Menu
    $('.close-menu-btn').click(function(){
        $('.main-menu-sidebar').removeClass("menu-active");
        $('.menu-overlay').removeClass("active-overlay");
    });

        $(function() {
    
        var menu_ul = $('.nav-links > li.has-menu  ul'),
            menu_a  = $('.nav-links > li.has-menu  small');
        
        menu_ul.hide();
        
        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
            }
        });
        
        });
        
    $(".nav-links > li.has-menu  small ").attr("href","javascript:;");

    var $menu = $('#menu');

    $(document).mouseup(function (e) {
        if (!$menu.is(e.target) // if the target of the click isn't the container...
        && $menu.has(e.target).length === 0) // ... nor a descendant of the container
        {
        $menu.removeClass('menu-active');
        $('.menu-overlay').removeClass("active-overlay");
        }
    });

    $(document).ready(function () {
        $(".blog-detailed--accordion .wrap > h4").on("click", function (e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                    .siblings(".blog-detailed--accordion .wrap > div")
                    .slideUp(200);
            } else {
                $(".blog-detailed--accordion .wrap > h4").removeClass("active");
                $(this).addClass("active");
                $(".blog-detailed--accordion .wrap > div").slideUp(200);
                $(this)
                    .siblings(".blog-detailed--accordion .wrap > div")
                    .slideDown(200);
            }
            e.preventDefault();
        });
    });        

    $('#close-notice, #accept-cookie').click(function(e) {
        e.preventDefault();
        $("#cookie-notice").removeClass("slide-up");
        $("#cookie-notice").addClass("slide-down");
    });

        // date picker
        $(".quote-form .calendar input[type=text]").datepicker({
            minDate: '0'
        });

        $(".date-input").datepicker({
            minDate: '0'
        });


        $(function () {

            var date1 = new Date('05/05/2022');
            var date2 = new Date('05/20/2022');

            var date3 = new Date('06/05/2022');
            var date4 = new Date('06/20/2022');

            var date5 = new Date('07/05/2022');
            var date6 = new Date('07/20/2022');

            $(".date-picker-input").datepicker({
                minDate: '0',
                showOtherMonths: true,
                selectOtherMonths: true,


                beforeShowDay: function (date) {
                    var highlight = date >= date1 && date <= date2
                    var highlight2 = date >= date3 && date <= date4
                    var highlight3 = date >= date5 && date <= date6
                    if (highlight || highlight2 || highlight3) {
                        return [true, "event", 'Tooltip text'];
                    } else {
                        return [true, '', ''];
                    }
                }

            });

        });

        $('.date-picker-input').on('click', function (e) {
            e.preventDefault();
            $(this).attr("autocomplete", "off");
        });

        $(".date-picker-input").attr("autocomplete", "off");  
        
        $(function() {
            $('#single-content .container .quote-cta--single a.btn-cta').click(function() {
              if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                  $('html, body').animate({
                    scrollTop: target.offset().top - 100
                  }, 1000);
                  return false;
                }
              }
            });
          });     

        // modal script
        setTimeout(function () {
            jQuery('.modal-overlay').addClass('show');
        }, 1000);


        $('.zebra_tooltips_below').click(function (e) {
            var myEm = $(this).attr('data-my-element');
            var modal = $('.modal-overlay[data-my-element = ' + myEm + '], .modal[data-my-element = ' + myEm + ']');
            e.preventDefault();
            modal.addClass('active');
            $('html').addClass('fixed');
        });
        
        $('.close-modal').click(function () {
            var modal = $('.modal-overlay, .modal');
            $('html').removeClass('fixed');
            modal.removeClass('active');
        });          

    });
})(jQuery);