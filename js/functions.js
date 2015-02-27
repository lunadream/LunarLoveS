var iat = 0;
function atclick() {
    if (iat === 2) {location.href = "/wp-login.php"; } else {iat = iat + 1; }
}
$(function(){
    var scrollTo = function(top, duration, callback) {
        var w = $(window);
        var FPS = 50;
        var currentTop = w.scrollTop();
        var offset = (currentTop - top) / (duration * FPS / 1000);
        var n = 0;
        var prevTop = currentTop;
        var t = setInterval(function() {
            if ((prevTop - top) * (currentTop - top) <= 0) {
                clearInterval(t);
                currentTop = prevTop = top;
                w.scrollTop(top);
                if (callback) callback();
            } else {
                prevTop = currentTop;
                w.scrollTop(currentTop -= offset);
            }
        }, 1000 / FPS);
    }
    $('body').dblclick(function(){
        scrollTo(0, 200, function(){
        });
        $(".textField,#commentForm textarea").focus();
    });
    $('#colophon,input,textarea').dblclick(function(e){e.stopPropagation();});
});