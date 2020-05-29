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
        if(Cookies.get('movies'))
        {
            console.log(Cookies.get('movies'));
            return JSON.parse( Cookies.get('movies') );
        } else {
            return {};
        }
    }

}

$(window).on('load',function(){
    if(  MoviesCookies.getObjOfMovies()[$('#bookmark').data('movie-id')] )
    {
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }
});

$('#bookmark').on('click', function(){
    MoviesCookies.setMovie($(this).data('movie-id'));
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    if( MoviesCookies.getObjOfMovies()[$(this).data('movie-id')] || !$(this).hasClass('display-none'))
    {
        MoviesCookies.setMovie($(this).data('movie-id'), false);
    }
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});