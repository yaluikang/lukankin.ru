$('#content > div').each(function(){
    $(this).on('click', function(){
        alert($(this).attr('id'));
    });
});