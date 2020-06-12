
$('#menu > li').each(function(){
    $(this).on('click', function(){
        if($(this).attr('id').slice(5) == 'bookmarks')
        {
            /*let $ajaxRequest = new AjaxBuilder("http://lukankin.ru/getbookmarks", "GET");
            $ajaxRequest.ajaxRequest();*/
        }
        $('#content > div').each(function(){
            $(this).addClass('display-none');
        });
        $('#' + $(this).attr('id').slice(5)).removeClass('display-none');
    });
});
