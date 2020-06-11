/*
$('#content > div').each(function(){
    $(this).on('click', function(){
        alert($(this).attr('id'));
    });
});*/
$('#menu > li').each(function(){
    $(this).on('click', function(){
        alert($(this).attr('id').slice(0,5));
        $($(this).attr('id').slice(0,5)).addClass('active-content');
    });
});
