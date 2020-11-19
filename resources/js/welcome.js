$('document').ready(function(){
    $('.btn-get-started').click(function(){
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 300, 'linear');
    });
    window.onscroll = function() {
        var body = window.document.body; //IE 'quirks'
        var document = window.document.documentElement; //IE with doctype
        document = (document.clientHeight) ? document : body;

        if (document.scrollTop == 0) {
            $("#header").addClass('header-transparent');
        }else{
            $("#header").removeClass('header-transparent');
        }
    };
});