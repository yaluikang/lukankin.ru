class MoviesCookies
{
    constructor()
    {
    }

    static setBookmark( /*id, boolean = true*/ $id, $arr1, $arr2 )
    {
        //удалить из deleted, добавить в added
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

        $added = JSON.parse( $added );
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
    if(  MoviesCookies.getObjOfMovies().indexOf($('#bookmark').data('movie-id')) != ( -1 ) )
    {
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }
});

$('#bookmark').on('click', function(){
    //проверить есть ли уже закладка в added, проверить, есть ли она в deleted
    //если есть в deleted - удалить
    //MoviesCookies.setBookmark($(this).data('movie-id'), 'added');
    MoviesCookies.setBookmark($(this).data('movie-id'), 'added', 'deleted');
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});
//
$('#bookmarkused').on('click', function(){
    //проверить есть ли уже закладка в deleted, проверить есть ли в added
    //если есть в added - удалить
    /*if( !$(this).hasClass('display-none'))
    {
        MoviesCookies.setBookmark($(this).data('movie-id'), 'deleted');
    }*/
    MoviesCookies.setBookmark($(this).data('movie-id'), 'deleted', 'added');
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});