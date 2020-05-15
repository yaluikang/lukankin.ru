$(window).on('load',function(){
    $pagination.setUrl("http://lukankin.ru/searchform");
    const $queryString = window.location.search;
    const urlParams = new URLSearchParams( $queryString );
    const $search = urlParams.get( 'search' );
    $pagination.setGetParameter('search', $search );
    $pagination.ajaxRequest();
});