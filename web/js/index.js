/*

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
    let $getFilms = new AjaxBuilder("http://lukankin.ru/getmovies", "GET");
    $getFilms.setMoviesQualifier( 1 );
    console.log( $getFilms.getMoviesQualifier());
    $getFilms.ajaxRequest();
});

$('#tvSeries').on( 'click', function(){
    //удалить весь контент с сериалами
    //сделать ajax-запрос по сериалам
    $('#colorposter').empty();
    let $tvSeries = new AjaxBuilder("http://lukankin.ru/getmovies", "GET");
    $tvSeries.setMoviesQualifier( 2 );
    console.log( $tvSeries.getMoviesQualifier());
    $tvSeries.ajaxRequest();
});*/

let $pagination = new Pagination("http://lukankin.ru/getmovies", "GET", 1);

$(window).on('load',function(){
    $pagination.ajaxRequest();
});

$('#see-more').on( 'click', function(){
    $pagination.setUrl( "http://lukankin.ru/pagination" );
    $pagination.pagination();
});

$('#films').on( 'click', function(){
    //удалить весь контент с фильмами
    //сделать ajax-запрос по фильмам
    $pagination.resetPageNumber();
    $pagination.setMoviesQualifier( 1 );
    $('#colorposter').empty();
    let $getFilms = new AjaxBuilder("http://lukankin.ru/getmovies", "GET",1);
    console.log( $getFilms.getMoviesQualifier());
    $getFilms.ajaxRequest();
});

$('#tvSeries').on( 'click', function(){
    //удалить весь контент с сериалами
    //сделать ajax-запрос по сериалам
    $pagination.resetPageNumber();
    $pagination.setMoviesQualifier( 2 );
    $('#colorposter').empty();
    let $tvSeries = new AjaxBuilder("http://lukankin.ru/getmovies", "GET", 2);
    console.log( $tvSeries.getMoviesQualifier());
    $tvSeries.ajaxRequest();
});