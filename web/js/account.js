/*
$('#content > div').each(function(){
    $(this).on('click', function(){
        alert($(this).attr('id'));
    });
});*/
$('#menu > li').each(function(){
    $($(this).attr('id').slice(0,5)).removeClass('active-content');
    $(this).on('click', function(){
        alert($(this).attr('id'));
        $($(this).attr('id').slice(0,5)).addClass('active-content');
    });
});
