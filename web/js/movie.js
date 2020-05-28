$('#bookmark').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
    //Cookies.set('name', 'value', { expires: 7, path: '/' });
    alert();
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});