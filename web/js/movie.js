class MoviesCookies
{
    constructor()
    {
        this.cookies = Cookies.get('movies');
    }

    static setMovie( id )
    {
        console.log( this.cookies );
        console.log(Cookies.get('movies'));
        if( !this.cookies )
        {
            this.cookies = [] + '';
            console.log(this.cookies);
        }
        console.log(this.cookies);
        let $array = this.cookies.parse;
        $array.push( id );
        let $string = $array + '';
        Cookies.set( 'movies', $string, { expires: 1, path: '/' });
    }



}
$(window).on('load',function(){
    let $name = $('#bookmark').data('movie-id') + '';
    if( Cookies.get( $name ) == 'true' )
    {
        console.log('yes');
        $('#bookmark').addClass('display-none');
        $('#bookmarkused').removeClass('display-none');
    }
});

$('#bookmark').on('click', function(){
    MoviesCookies.setMovie($(this).data('movie-id'));
    console.log( Cookies.get('movies') );
    Cookies.set( $(this).data('movie-id'), true, { expires: 1, path: '/' });
    $(this).addClass('display-none');
    $('#bookmarkused').removeClass('display-none');
});

$('#bookmarkused').on('click', function(){
    if( Cookies.get($(this).data('movie-id') + '') )
    {
        Cookies.set( $(this).data('movie-id'), false, { expires: 1, path: '/' });
    }
    $(this).addClass('display-none');
    $('#bookmark').removeClass('display-none');
});