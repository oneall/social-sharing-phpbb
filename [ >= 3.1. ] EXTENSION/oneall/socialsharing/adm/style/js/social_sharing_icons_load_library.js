/*
 * Copyright (c) oneall.com - All rights reserved
 * This product is protected by copyright and distributed under
 * licenses restricting copying, distribution and decompilation.
 */

(function ($, settings) {
    "use strict";

    /* Load the library when subdomain is different ('1'),
     * and even with the same subdomain as Social Login ('0'),
     * if the login iframe is not be present on the page.
     */
    if (settings.loadlib == '1' || typeof oa === 'undefined') {
	    var oass = document.createElement('script');
	    oass.type = 'text/javascript'; 
	    oass.async = true;
	    oass.src = '//' + settings.api_subdomain + '.api.oneall.com/socialize/library.js';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(oass, s);
    }

})(jQuery, drupalSettings);

