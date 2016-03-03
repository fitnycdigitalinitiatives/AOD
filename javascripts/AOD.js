if (!AOD) {
    var AOD = {};
}

(function ($) {    
    AOD.dropDown = function(){
        //Hide the menu
        $('#mobile-nav').hide();

        //function the will toggle the menu
        $('.menu').click(function() {
            $("#mobile-nav").slideToggle();
        });
    };
})(jQuery)