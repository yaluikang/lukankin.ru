$(window).on('load',function(){
    //addFilms();
    let ajaxBuilder = new AjaxBuilder( "http://lukankin.ru/test", "GET" );
    ajaxBuilder.ajaxRequest();
});
$('#see-more').on( 'click', function(){
    let ajaxBuilder = new AjaxBuilder( "http://lukankin.ru/pagination", "GET" );
    ajaxBuilder.ajaxRequest();
} );
