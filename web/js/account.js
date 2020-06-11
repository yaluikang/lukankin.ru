/*
$('#content > div').each(function(){
    $(this).on('click', function(){
        alert($(this).attr('id'));
    });
});*/
$('#menu > li').each(function(){
    $(this).on('click', function(){
        alert($(this).attr('id').slice(5));
        $('.active-content').each(function(){
            $(this).removeClass('active-content');
        });
        $('#' + $(this).attr('id').slice(5)).addClass('active-content');
    });
});
