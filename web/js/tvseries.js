$(window).on('load',function(){
    $pagination.setGetParameter('q', 2);
    $pagination.ajaxRequest();
});