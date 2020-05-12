
let $pagination = new Pagination("http://lukankin.ru/getmovies", "GET");

/*$(window).on('load',function(){
    $pagination.setGetParameter('q', 1);
    $pagination.ajaxRequest();
});*/

$('#see-more').on( 'click', function(){
    $pagination.setUrl( "http://lukankin.ru/pagination" );
    $pagination.pagination();
});

$('#films').on( 'click', function(){
    //удалить весь контент с фильмами
    //сделать ajax-запрос по фильмам
    $pagination.resetPageNumber();
    $('#colorposter').empty();
    $pagination.checkGetParameterGenre();
    $pagination.setGetParameter('q',1);
    $pagination.setUrl( "http://lukankin.ru/getmovies" );
    $pagination.ajaxRequest();
});

$('#tvSeries').on( 'click', function(){
    //удалить весь контент с сериалами
    //сделать ajax-запрос по сериалам
    $pagination.resetPageNumber();
    $('#colorposter').empty();
    $pagination.checkGetParameterGenre();
    $pagination.setGetParameter('q',2);
    $pagination.setUrl( "http://lukankin.ru/getmovies" );
    $pagination.ajaxRequest();
});

$('.search-genre').each(function(){
    $(this).on('click', function(){
        $pagination.resetPageNumber();
        $('#colorposter').empty();
        $pagination.setUrl( "http://lukankin.ru/moviesbygenre" );
        $pagination.checkGetParameterGenre();
        $pagination.setGetParameter('genre', $(this).text());
        $pagination.ajaxRequest();
    });
});