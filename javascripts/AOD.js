if (!AOD) {
    var AOD = {};
}

(function ($) {    
    AOD.dropDown = function(){
        var dropdownMenu = $('#site-title');
        dropdownMenu.append('<a href="#" class="menu"><i class="fa fa-bars  fa-3x"></i></a>');
        //Hide the rest of the menu
        $('#mobile-nav .navigation').hide();

        //function the will toggle the menu
        $('.menu').click(function() {
            $("#mobile-nav").slideToggle();
        });
    };
})(jQuery)