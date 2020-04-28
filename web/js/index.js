

let $ajaxBuilder = new AjaxBuilder("http://lukankin.ru/getmovies", "GET");


$(window).on('load',function(){
    $ajaxBuilder.ajaxRequest();
});

$('#see-more').on( 'click', function(){
    $ajaxBuilder.setUrl( "http://lukankin.ru/pagination" );
    $ajaxBuilder.ajaxRequest();
});

$('#films').on( 'click', function(){
    //удалить весь контент с фильмами
    //сделать ajax-запрос по фильмам
    $('#colorposter').empty();
    $ajaxBuilder.setMoviesQualifier( 1 ).ajaxRequest();
});

$('#tvSeries').on( 'click', function(){
    //удалить весь контент с сериалами
    //сделать ajax-запрос по сериалам
    $('#colorposter').empty();
    $ajaxBuilder.setMoviesQualifier( 2 ).ajaxRequest();
});
