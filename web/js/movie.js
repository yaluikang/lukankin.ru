$('#bookmark').on('click', function(){
    let $fimsId = $(this).attr('id');
    console.log( $fimsId );
    Cookies.set( $fimsId, true, { expires: 1, path: '/' });
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});