
$('#menu > li').each(function(){
    $(this).on('click', function(){
        if($(this).attr('id').slice(5) == 'bookmarks')
        {
            /*let $ajaxRequest = new AjaxBuilder("http://lukankin.ru/getbookmarks", "GET");
            $ajaxRequest.ajaxRequest();*/
        }
        $('.active-content').each(function(){
            $(this).removeClass('active-content');
        });
        $('#' + $(this).attr('id').slice(5)).addClass('active-content');
    });
});
