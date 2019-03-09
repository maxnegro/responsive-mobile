/*!
 * Mobile Menu
 *
 * GPL V2 License (c) CyberChimps
 */
(function ($) {
    var obj = {

        onClick: function () {
            $("#site-navigation").toggleClass("menu-open");
        }

    };

    $("nav#main-navigation").on("click", obj.onClick);
})(jQuery);
