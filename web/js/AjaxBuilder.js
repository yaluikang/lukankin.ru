class AjaxBuilder extends Site
{
    constructor( url, method )
    {
        super();
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

    setGetParameter( key, name )
    {
        this.getParameters[key] = name;
    }

    deleteGetParameter( key )
    {
        delete this.getParameters[key];
    }

    checkGetParameterGenre()
    {
        if( this.getParameters['genre'] )
        {
            this.deleteGetParameter('genre');
        }
    }

    setGetParametersToUrl()
    {
        let $str;
        let $getParameters = this.getGetParameters();
        let $counter = 0;
        for( let $key in $getParameters )
        {
            if( $counter == 0 )
            {
                $str = '?' + $key + '=' + $getParameters[$key];
            } else {
                $str = $str + '&' + $key + '=' + $getParameters[$key];
            }
            $counter++;
        }
        this.url += $str;
    }

    ajaxRequest()
    {
        let $json;
        this.setGetParametersToUrl();
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
        console.log( this.json );
        this.controllerOfActions();
    }

    controllerOfActions()
    {
        /*if( this.getUrl() == 'http://lukankin.ru/test' || this.getUrl() == 'http://lukankin.ru/pagination' )
        {*/
            this.addMovies( this.json );
        /*}*/
    }

}