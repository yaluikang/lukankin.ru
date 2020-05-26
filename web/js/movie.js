$('#bookmark').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmarkused').addClass('display-inline');
});

$('#bookmarkused').on('click', function(){
    $(this).addClass('display-none');
    $('#bookmark').addClass('display-inline');
});