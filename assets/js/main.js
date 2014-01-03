$(document).ready(function () {
    var host = "http://" + window.location.hostname;
    var url = document.location.toString();
    var pos = 0;
    if ((pos = url.indexOf("?")) > 0) {
        url = url.substring(0, pos);
    }
    if (url.charAt(url.length - 1) == "/") {
        url = url.substring(0, url.length - 1);
    }
    $("#main-nav ul>li.active").removeClass("active");
    $("#main-nav ul>li a").each(function () {
        var cur = $(this).attr("href");
        if (url == cur || url == (host + cur)) {
            $(this).parent().addClass("active");
        }
    });
});