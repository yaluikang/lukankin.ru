class MoviesCookies
{
    constructor()
    {
    }

    static setBookmark( $id, $arr1, $arr2 )
    {
        let $deleted  = Cookies.get( $arr2 );
        let $added = Cookies.get( $arr1 );

        if( $deleted )
        {
            $deleted = JSON.parse( $deleted );
            let $index = $deleted.indexOf( $id );
            if( $index != (-1))
            {
                $deleted.splice($index, 1);
            }
            let $string = JSON.stringify( $deleted );
            Cookies.set( $arr2, $string, { expires: 1, path: '/' });
        }

        if( $added )
        {
            $added = JSON.parse( $added );
        } else
        {
            $added = [];
        }
        $added.push( $id );
        let $string = JSON.stringify( $added );
        Cookies.set( $arr1, $string, { expires: 1, path: '/' });
    }

    static getObjOfAddedMovies()
    {
        if(Cookies.get( 'added' ))
        {
            console.log(Cookies.get( 'added' ));
            return JSON.parse( Cookies.get( 'added' ) );
        } else {
            return [];
        }
    }

}

$(window).on('load',function(){
    if(  MoviesCookies.getObjOfAddedMovies().indexOf($('#bookmark').data('movie-id')) != ( -1 ) )
    {
        console.log(MoviesCookies.getObjOfAddedMovies().indexOf($('#bookmark').data('movie-id')));
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }
});

$('#bookmark').on('click', function(){
    MoviesCookies.setBookmark($(this).data('movie-id'), 'added', 'deleted');
    console.log(Cookies.get( 'added' ));
    console.log(Cookies.get( 'deleted' ));
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
    let $ajaxRequest = new AjaxBuilder("http://lukankin.ru/setnewcookies", "GET");
    $ajaxRequest.ajaxRequest();
});
//
$('#bookmarkused').on('click', function(){
    MoviesCookies.setBookmark($(this).data('movie-id'), 'deleted', 'added');
    console.log(Cookies.get( 'added' ));
    console.log(Cookies.get( 'deleted' ));
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
    let $ajaxRequest = new AjaxBuilder("http://lukankin.ru/setnewcookies", "GET");
    $ajaxRequest.ajaxRequest();
});