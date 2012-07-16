
browser : {
        IE : !!(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1),
        Opera : navigator.userAgent.indexOf('Opera') > -1,
        WebKit : navigator.userAgent.indexOf('AppleWebKit/') > -1,
        Gecko : navigator.userAgent.indexOf('Gecko') > -1 
                        && navigator.userAgent.indexOf('KHTML') === -1,

        getViewHgt : function()
        {
                return browser.IE ? 
                                // IE Cases
                                // Test for IE 5-7 Quirks and IE 4
                                (!(document.documentElement.clientHeight) 
                                || (document.documentElement.clientHeight === 0)) ?
                                // IE 5-7 Quirks and IE 4 case
                                document.body.clientHeight : 
                                //IE 6+ Strict Case
                                document.documentElement.clientHeight:
                                // Gecko and Other DOM compliant case
                                window.innerHeight; 
        },

        getViewWdth : function()
        {
                return browser.IE ? 
                                // IE Cases
                                // Test for IE 5-7 Quirks and IE 4
                                (!(document.documentElement.clientWidth) 
                                || (document.documentElement.clientWidth === 0)) ?
                                // IE 5-7 Quirks and IE 4 case
                                document.body.clientWidth : 
                                //IE 6+ Strict Case
                                document.documentElement.clientWidth:
                                // Gecko and Other DOM compliant case
                                window.innerWidth;
        }


