function getBrowser() {
    // Opera 8.0+
    if ((!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0) {
        return 'opera';
    }

    // Firefox 1.0+
    if (typeof InstallTrigger !== 'undefined') {
        return 'firefox';
    }

    // Safari 3.0+ "[object HTMLElementConstructor]"
    if (
        /constructor/i.test(window.HTMLElement) ||
        (function(p) {
            return p.toString() === '[object SafariRemoteNotification]';
        })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification))
    ) {
        return 'safari';
    }

    // Internet Explorer 6-11
    if ( /*@cc_on!@*/ false || !!document.documentMode) {
        return 'ie';
    }

    // Edge 20+
    if (!!window.StyleMedia) {
        return 'edge';
    }

    // Chrome 1+
    if (!!window.chrome && !!window.chrome.webstore) {
        return 'chrome';
    }

    // Blink engine detection
    if ((isChrome || isOpera) && !!window.CSS) {
        return 'blink';
    }
}

function getBrowserInfo() {
    var ua = navigator.userAgent,
        tem,
        M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE ' + (tem[1] || '');
    }
    if (M[1] === 'Chrome') {
        tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
        if (tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
    return M.join(' ');
}