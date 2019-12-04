var gaProperty = null;
var disableStr = 'ga-disable-' + gaProperty;
var consentCookie = getCookie('cookieConsent');

function askConsent(){
    jQuery('#cookies').slideDown("slow");
}
function closeCookies(closeLink){
    jQuery('#cookies').slideUp("slow");
}
function getCookieExpireDate() {
    var cookieTimeout = 34214400000;
    var date = new Date();
    date.setTime(date.getTime()+cookieTimeout);
    var expires = "; expires="+date.toGMTString();
    return expires;
}
function getCookie(NomDuCookie) {
    if (document.cookie.length > 0) {
        begin = document.cookie.indexOf(NomDuCookie+"=");
        if (begin !=-1) {
            begin += NomDuCookie.length+1;
            end = document.cookie.indexOf(";", begin);
            if (end ==-1) end = document.cookie.length;
            return unescape(document.cookie.substring(begin, end));
        }
    }
    return null;
}
function delCookie(name) {
    path = ";path=" + "/";
    domain = ";domain=" + "."+document.location.hostname;
    var expiration = "Thu, 01-Jan-1970 00:00:01 GMT";
    document.cookie = name + "=" + path + domain + ";expires=" + expiration;
}
function deleteAnalyticsCookies() {
    var cookieNames = ["__utma","__utmb","__utmc","__utmz","_ga"]
    for (var i=0; i < cookieNames.length; i++){
        delCookie(cookieNames[i]);
    }
}
function gaOptout() {
    document.cookie = disableStr + '=true;'+ getCookieExpireDate() +' ; path=/';
    document.cookie = 'cookieConsent=false;'+ getCookieExpireDate() +' ; path=/';
    jQuery("#cookies").html("<p style='height:70px;'>Selon vos souhaits, les cookies sont maintenant déactivés et ceux déjà présents sont maintenant effacés.</p>").delay(4000).slideUp("slow");
    window[disableStr] = true;
    deleteAnalyticsCookies();
}

jQuery(document).ready(function(){
    if (document.cookie.indexOf('cookieConsent=false') > -1){
        window[disableStr] = true;
        deleteAnalyticsCookies();
    }

    if (!consentCookie) {
        var referrer_host = document.referrer.split('/')[2];
        if ( referrer_host != document.location.hostname ) {
            window[disableStr] = true;
            window.onload = askConsent;
        } else {
            document.cookie = 'cookieConsent=true; '+ getCookieExpireDate() +' ; path=/';
        }
    }
});