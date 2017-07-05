$(document).ready(function() {
    "use strict";

    $(".c-hamburger").on('click', function(e) {
        var fullMenu = $(".space-full-menu"),
            spaceHeader = $(".space-header");

        $(this).toggleClass('is-active');
        fullMenu.toggleClass('is-active');
        spaceHeader.toggleClass('menu-is-active');
        e.preventDefault();
    });

    $(".search-icon-btn").on('click', function(e) {
        var fullSearch = $(".space-full-search-page"),
            spaceHeader = $(".space-header");

        $(this).toggleClass('is-active');
        fullSearch.toggleClass('is-active');
        spaceHeader.toggleClass('search-is-active');
        e.preventDefault();
    });

});