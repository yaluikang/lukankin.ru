class AjaxBuilder
{
    constructor( url, method )
    {
        this.url = url;
        this.method = method;
        this.json = 'Нет данных';
        this.pageNumber = 1;
        this.moviesQualifier = 1;
    }

    getUrl()
    {
        return this.url;
    }

    getMethod()
    {
        return this.method;
    }

    getPageNumber()
    {
        return this.pageNumber;
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

    setMoviesQualifier( q )
    {
        this.moviesQualifier = q;
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

    checkArray( arr )
    {
        if( arr.length < 9 )
        {
            this.hideButton()
        }
    }
    pagination()
    {
        //прибавить страничку
        //поменять url, добавляя get параметр
        this.increasePageNumber();
        this.setPageNumberToUrl();
    }

    setPageNumberToUrl()
    {
        this.url = this.url + '&p=' + this.getPageNumber();
    }

    setMoviesQualifierToUrl()
    {
        this.url = this.url + '?q=' + this.getMoviesQualifier();
    }
    increasePageNumber()
    {
        this.pageNumber++;
    }

    controllerOfGetParameters()
    {
        if( this.getUrl() == 'http://lukankin.ru/pagination' || this.getUrl() == 'http://lukankin.ru/getmovies')
        {
            this.setMoviesQualifierToUrl();
        }
        if( this.getUrl().match('http://lukankin.ru/pagination'))
        {
            this.pagination();
        }
    }

    ajaxRequest()
    {
        let $json;
        this.controllerOfGetParameters();
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
        this.checkArray( $json );
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