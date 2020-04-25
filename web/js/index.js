

let $ajaxBuilder = new AjaxBuilder("http://lukankin.ru/test", "GET");


$(window).on('load',function(){
    $ajaxBuilder.ajaxRequest();
});

$('#see-more').on( 'click', function(){
    $ajaxBuilder.setUrl( "http://lukankin.ru/pagination" );
    $ajaxBuilder.ajaxRequest();
} );
