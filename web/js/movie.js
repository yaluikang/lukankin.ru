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
$(window).on('load',function(){
    if(  MoviesCookies.getObjOfMovies()[$('#bookmark').data('movie-id')] )
    {
        console.log('yes');
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }
});

$('#bookmark').on('click', function(){
    MoviesCookies.setMovie($(this).data('movie-id'));
    console.log( Cookies.get('movies') );
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