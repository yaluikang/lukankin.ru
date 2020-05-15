$(window).on('load',function(){
    $pagination.setUrl("http://lukankin.ru/searchform");
    //$pagination.setGetParameter('search', $(this).text());
    const $queryString = window.location.search;
    console.log( $queryString );
    const urlParams = new URLSearchParams( $queryString );
    const $search = urlParams.get( 'search' );
    console.log( $search );
    //$pagination.ajaxRequest();
});