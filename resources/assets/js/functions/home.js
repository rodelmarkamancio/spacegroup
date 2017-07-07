$(document).ready(function() {
    // 
    // Typing text in header
    setTimeout(function() {
        var el1Val = $('.element1').data('content');
        var typed = new Typed('.element1', {
            strings: [el1Val],
            typeSpeed: 50,
            backDelay: 750,
            loop: false,
            loopCount: false,
            onComplete: function() {
                $(".typed-cursor").remove();
            }
        });
    }, 0);

    setTimeout(function() {
        var el2Val = $('.element2').data('content');
        var typed = new Typed('.element2', {
            strings: [el2Val],
            typeSpeed: 50,
            backDelay: 750,
            loop: false,
            loopCount: false,
            onComplete: function() {
                $(".typed-cursor").remove();
            }
        });
    }, 1000);

    setTimeout(function() {
        var el3Val = $('.element3').data('content');
        var typed = new Typed('.element3', {
            strings: [el3Val],
            typeSpeed: 50,
            backDelay: 750, 
            loop: false,
            loopCount: false,
            onComplete: function() {
                $(".typed-cursor").remove();
            }
        });
    }, 2000);
});