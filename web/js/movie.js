$('#bookmark').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});