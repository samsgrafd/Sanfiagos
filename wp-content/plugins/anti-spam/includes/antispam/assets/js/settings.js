/**
 * General scripts
 *
 * @author Alex Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @copyright (c) 03.12.2019, CreativeMotion
 * @version 1.0
 */


(function ($) {
    'use strict';

    $.wantispam = {};

    if ($.wbcr_factory_clearfy_227) {
        $.wantispam = $.wbcr_factory_clearfy_227;
    }

    $('.factory-checkbox--disabled.wantispam-checkbox-premium-label').click(function (e) {
        e.stopPropagation();
        window.location.href = 'https://titansitescanner.com/pricing/';
    });

})(jQuery);
