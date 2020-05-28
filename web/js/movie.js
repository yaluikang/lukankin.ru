$('#bookmark').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
    Cookies.set($(this).data('id'), true, { expires: 1, path: '/' });
    alert(Cookies.get());
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});