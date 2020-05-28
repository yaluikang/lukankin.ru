$('#bookmark').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
    let $fimsId = $('#bookmark').data('id');
    console.log( $fimsId );
    Cookies.set( $fimsId, true, { expires: 1, path: '/' });
    alert(Cookies.get());
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});