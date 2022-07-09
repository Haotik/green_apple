$(document).ready(function() {

    // Субменю в навигации
    $('.nav_menu-list-submenu').parent().addClass('submenu').click(function() {
        if (screen.width <= 1000) {
            $(this).find('.nav_menu-list-submenu').slideToggle();
        }
    })

    // Бургер
    $('.nav_menu-burger').click(function() {
        $('.nav_menu').toggleClass('active');
        $('.nav_menu-list').slideToggle();
    })

    // Фикс меню
    let heightNavHead = $('.nav_head').outerHeight();
    let heightNavMenu = $('.nav_menu').outerHeight();
    $(window).scroll(function() {
        if ($(this).scrollTop() > heightNavHead) {
            $('.nav_menu').addClass('fixed');
            $('body').css('margin-top', heightNavMenu);
        } else if ($(this).scrollTop() < heightNavHead) {
            $('.nav_menu').removeClass('fixed');
            $('body').css('margin-top', '0');
        }
    });
});