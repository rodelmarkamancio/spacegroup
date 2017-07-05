$(document).ready(function() {
    // 
    // Typing text in header
    setTimeout(function() {
        var typed = new Typed('.element1', {
            strings: ["Designing"],
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
        var typed = new Typed('.element2', {
            strings: ["Connecting"],
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
        var typed = new Typed('.element3', {
            strings: ["Innovating"],
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