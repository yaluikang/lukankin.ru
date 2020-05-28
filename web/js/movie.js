$(window).on('load',function(){
    let $name = $('#bookmark').data('movie-id') + '';
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