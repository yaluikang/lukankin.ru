class AjaxBuilder
{
    constructor( url, method )
    {
        this.url = url;
        this.method = method;
        this.json = "Нет данных";
        this.pageNumber = 1;
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

    pagination()
    {
        //прибавить страничку
        //поменять url, добавляя get параметр
        this.increasePageNumber();
        this.setPageNumberToUrl();
    }

    setPageNumberToUrl()
    {
        this.url =+ "?p=" + this.getPageNumber();
    }

    increasePageNumber()
    {
        this.pageNumber++;
    }

    controllerOfGetParameters()
    {
        if( this.getUrl() == "http://lukankin.ru/pagination" )
        {
            this.pagination();
        }
    }

    ajaxRequest()
    {
        let $json;
        this.controllerOfGetParameters();
        console.log( this.getUrl());
        $.ajax({
            method: this.getMethod(),
            url: this.getUrl(),
            async: false,
            success: function( data )
            {
                $json = data;
            }
        });
        console.log( $json );
        this.json = $json;
        console.log( this.json );
        this.controllerOfActions();
    }

    controllerOfActions()
    {
        if( this.getUrl() == "http://lukankin.ru/test" || this.getUrl() == "http://lukankin.ru/pagination" )
        {
            this.addMovies( this.json );
        }
    }

    addMovies( data )
    {
        console.log( data );
        let $json = $.parseJSON( data );
        console.log($json);
        console.log($json.length);
        console.log($json[0]['movies_name']);
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