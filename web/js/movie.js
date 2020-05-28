$(window).on('load',function(){
    console.log( Cookies.get($(this).data('movie-id')) == 'true' );
    let $name = $(this).data('movie-id') + '';
    console.log( Cookies.get(1) );
    console.log( Cookies.get('1') );
    if( Cookies.get( $name ) == 'true' )
    {
        console.log('yes');
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }
});

$('#bookmark').on('click', function(){
    Cookies.set( $(this).data('movie-id'), true, { expires: 1, path: '/' });
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    if( Cookies.get($(this).data('movie-id')) )
    {
        Cookies.set( $(this).data('movie-id'), false, { expires: 1, path: '/' });
    }
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});