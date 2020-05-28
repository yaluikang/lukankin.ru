$('#bookmark').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
    Cookies.set('name', 'value', { expires: 7, path: '/' });
    alert(Cookies.get('name'););
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});