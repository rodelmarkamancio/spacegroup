$(document).ready(function() {
    "use strict";

    $(".c-hamburger").on('click', function(e) {
        var fullMenu = $(".space-full-menu"),
            spaceHeader = $(".space-header");

        $(this).toggleClass('menu-is-active');
        fullMenu.toggleClass('menu-is-active');
        spaceHeader.toggleClass('menu-is-active');

        $(".search-icon-btn").removeClass('search-is-active');
        $(".space-full-search-page").removeClass('search-is-active');
        $(".space-header").removeClass('search-is-active');
        e.preventDefault();
    });

    $(".search-icon-btn").on('click', function(e) {
        var fullSearch = $(".space-full-search-page"),
            spaceHeader = $(".space-header");

        $(this).toggleClass('search-is-active');
        fullSearch.toggleClass('search-is-active');
        spaceHeader.toggleClass('search-is-active');

        $(".c-hamburger").removeClass('menu-is-active');
        $(".space-full-menu").removeClass('menu-is-active');
        $(".space-header").removeClass('menu-is-active');
        e.preventDefault();
    });

});