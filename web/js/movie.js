class MoviesCookies
{
    constructor()
    {
    }

    static setMovie( id, boolean = true )
    {
        this.cookies = Cookies.get('movies');
        if( !this.cookies )
        {
            this.cookies = {};
        } else
        {
            this.cookies = JSON.parse(this.cookies);
        }
        this.cookies[id] = boolean;
        let $string = JSON.stringify(this.cookies);
        Cookies.set( 'movies', $string, { expires: 1, path: '/' });
    }

    static getObjOfMovies()
    {
        return JSON.parse( Cookies.get('movies') );
    }

}

function getCookiePHP(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    console.log(r);
    var result = '';
    if (r) {
        result = PHPUnserialize.unserialize(decodeURIComponent(r[2]).substr(64));
        console.log(result);
    }
    return result;
}

$(window).on('load',function(){
    /*if(  MoviesCookies.getObjOfMovies()[$('#bookmark').data('movie-id')] )
    {
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }*/
    console.log(document.cookie.match ( '(^|;) ?' + 'movies' + '=([^;]*)(;|$)' ));
});

$('#bookmark').on('click', function(){
    MoviesCookies.setMovie($(this).data('movie-id'));
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    if( MoviesCookies.getObjOfMovies()[$(this).data('movie-id')])
    {
        MoviesCookies.setMovie($(this).data('movie-id'), false);
    }
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});