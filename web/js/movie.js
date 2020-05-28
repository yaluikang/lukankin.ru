$('#bookmark').on('click', function(){
    let $fimsId = $(this).attr('data-movie-id');
    console.log( $(this).attr('data-movie-id') );
    Cookies.set( $fimsId, true, { expires: 1, path: '/' });
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});