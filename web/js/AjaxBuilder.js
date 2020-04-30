class AjaxBuilder
{
    constructor( url, method )
    {
        this.url = url;
        this.method = method;
        this.json = 'Нет данных';
        this.getParameters = {};
    }

    getGetParameters()
    {
        return this.getParameters;
    }

    getUrl()
    {
        return this.url;
    }

    getMethod()
    {
        return this.method;
    }

    getMoviesQualifier()
    {
        return this.moviesQualifier;
    }

    setUrl( url )
    {
        this.url = url;
        return this;
    }

    setMethod( method )
    {
        this.method = method;
        return this;
    }

    hideButton()
    {
        $('#see-more').css('display','none');
    }

    unHideButton()
    {
        $('#see-more').css('display','block');
    }

    increaseGetParameter( key, name )
    {
        this.getParameters[key] = name;
    }

    increaseGetParametersToUrl()
    {
        let $str;
        let $getParameters = this.getGetParameters();
        console.log( $getParameters );
        let $counter = 0;
        for( let $key in $getParameters )
        {
            console.log( $getParameters[$key] );
            if( $counter == 0 )
            {
                $str = '?' + $key + '=' + $getParameters[$key];
                console.log( $str );
            }
            $str = $str + '&' + $key + '=' + $getParameters[$key];
            console.log( $str );
        }
        console.log( $str );
        this.url += $str;
    }

    ajaxRequest()
    {
        let $json;
        this.increaseGetParametersToUrl();
        console.log( this.url );
        $.ajax({
            method: this.getMethod(),
            url: this.getUrl(),
            async: false,
            success: function( data )
            {
                $json = data;
            }
        });
        this.json = $json;
        this.controllerOfActions();
    }

    controllerOfActions()
    {
        /*if( this.getUrl() == 'http://lukankin.ru/test' || this.getUrl() == 'http://lukankin.ru/pagination' )
        {*/
            this.addMovies( this.json );
        /*}*/
    }

    addMovies( data )
    {
        let $json = $.parseJSON( data );
        for( let $i = 0; $i < $json.length; $i++ )
        {
            let $posterDiv = $('<div>',{
                class: 'col-md-6 col-sm-12 col-lg-auto text-center new'
            });
            $posterDiv.appendTo('#colorposter');
            let $posterA = $('<a>',{
                href: "#"
            });
            $posterA.appendTo($posterDiv);
            let $posterFigure = $('<figure>',{
                class: 'figure'
            });
            $posterFigure.appendTo($posterA);
            let $posterImg = $('<img>',{
                src: '../images/' + $json[$i]['movies_url_poster'],
                class: 'figure-img img-fluid rounded'
            });
            $posterImg.appendTo($posterFigure);
            let $posterFigcaption = $('<figcaption>',{
                class: 'figure-caption figuremaxwidth'
            });
            $posterFigcaption.appendTo($posterFigure);
            let $posterNameP = $('<p>',{
                class: 'zagolovok',
                text: $json[$i]['movies_name']
            });
            $posterNameP.appendTo($posterFigcaption);
            let $posterYearGenreP = $('<p>',{
                class: 'fontzhanr',
                text: $json[$i]['genres_name'] + ', ' + $json[$i]['movies_date'] + ' год'
            });
            $posterYearGenreP.appendTo($posterFigcaption);
        }
    }
}