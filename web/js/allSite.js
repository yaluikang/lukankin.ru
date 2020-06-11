$('#logout').on('click', function(){
    alert(1);
    let $ajaxRequest = new AjaxBuilder("http://lukankin.ru/setnewcookies", "GET");
    $ajaxRequest.ajaxRequest();
});