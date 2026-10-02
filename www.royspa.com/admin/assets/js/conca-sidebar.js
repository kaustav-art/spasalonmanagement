( function ( $ ) {
    'use strict';

    window.addEventListener('DOMContentLoaded', function(){
        // Ensure server-rendered active states are properly displayed
        $('.app-sidebar-submenu').each(function() {
            var $submenu = $(this);
            if ($submenu.find('.menu-current').length > 0) {
                $submenu.show();
                $submenu.closest('.has-dropdown').addClass('active open');
                $submenu.prev('.menu-link').addClass('active');
            }
        });

        // Exact URL match fallback only if no item is marked menu-current by server
        if ($('.app-sidebar-menu .menu-current').length === 0) {
            var currentPath = window.location.pathname.replace(/\/+$/, '').toLowerCase();
            $('.app-sidebar-menu a').each(function() {
                var href = this.getAttribute('href');
                if (href && href !== '#' && href.indexOf('javascript:') !== 0) {
                    var linkPath = this.pathname.replace(/\/+$/, '').toLowerCase();
                    if (linkPath === currentPath) {
                        $(this).addClass('menu-current');
                        var $submenu = $(this).closest('.app-sidebar-submenu');
                        if ($submenu.length) {
                            $submenu.show();
                            $submenu.closest('.has-dropdown').addClass('active open');
                            $submenu.prev('.menu-link').addClass('active');
                        }
                        return false;
                    }
                }
            });
        }
    
        // update sidebar menu height
        function update_sidebar_menu_height() {
            let headerHeight = 60;
            let footerHeight = 60;
            let menuHeight = $(window).height() - (headerHeight + footerHeight);
            $('.app-sidebar-menu').css('height',  menuHeight + 'px');
        }
    
        $(window).on('resize', function(){
            update_sidebar_menu_height();
        });
    
        // initialize
        (function() {
            update_sidebar_menu_height();
        })();
    
        // add scrollbar to sidebar menu
        if(document.querySelector('.app-sidebar-menu')){
            new PerfectScrollbar(document.querySelector('.app-sidebar-menu'), {
                suppressScrollX: true
            });
        }

        // Submenu accordion toggle (only for dropdown triggers)
        $('.has-dropdown > .menu-link').on('click', function(e) {
            e.preventDefault();
            var $link = $(this);
            var $parent = $link.parent();
            var $submenu = $link.next('.app-sidebar-submenu');
            
            $link.toggleClass('active');
            $parent.toggleClass('open');
            $submenu.slideToggle(300);
        });
    })

    $('.app-sidebar-open-btn').on('click', function(e){
        e.preventDefault();
        $('.app-sidebar').removeClass('open');
        if($(this).hasClass('collapsed')) {
            $(this).removeClass('collapsed');
            $('.app-sidebar').removeClass('collapsed')
        }
        else {
            $(this).addClass('collapsed');
            $('.app-sidebar').addClass('collapsed')
        }
    })

    $('.app-sidebar-mobile-open').on('click', function(){
        $('.app-sidebar').removeClass('collapsed').addClass('open');
        $('.app-backdrop').addClass('show');
    });

    $('.app-sidebar-mobile-close').on('click', function(){
        $('.app-sidebar').removeClass('collapsed').removeClass('open');
        $('.app-backdrop').removeClass('show');
    });

    $('.app-backdrop').on('click', function(){
        $('#app-wrapper').removeClass('open');
        $('#app-sidebar').removeClass('open');
        $(this).removeClass('show');
    });
    
}(jQuery) ) 