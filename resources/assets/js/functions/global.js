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

});