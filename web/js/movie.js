$('#bookmark').on('click', function(){
    $(this).removeClass('display-inline');
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
    $('#bookmarkused').addClass('display-inline');
});

$('#bookmarkused').on('click', function(){
    $(this).removeClass('display-inline');
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
    $('#bookmark').addClass('display-inline');
});