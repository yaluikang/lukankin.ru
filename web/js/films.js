$(window).on('load',function(){
    $pagination.setGetParameter('q', 1);
    $pagination.ajaxRequest();
});