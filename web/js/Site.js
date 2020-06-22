class Site
{
    constructor()
    {
    }

    hideButton()
    {
        $('#see-more').css('display','none');
    }

    unHideButton()
    {
        $('#see-more').css('display','block');
    }


    checkArray( arr )
    {
        if( arr.length < 9 )
        {
            this.hideButton()
            return true;
        } else {
            this.unHideButton();
            return false;
        }
    }


    addMovies( data, element )
    {
        let $json = $.parseJSON( data );
        this.checkArray( $json );
        for( let $i = 0; $i < $json.length; $i++ )
        {
            let $posterDiv = $('<div>',{
                class: 'col-md-6 col-sm-12 col-lg-auto text-center new'
            });
            $posterDiv.appendTo( element );
            let $posterA = $('<a>',{
                href: "movie?id=" + $json[$i]['movies_id']
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

    addBookmarks( data, element )
    {
        let $json = $.parseJSON( data );
        $(element).empty();
        for( let $i = 0; $i < $json.length; $i++ )
        {
            let $cardDiv = $('<div>',{
                class: 'col-sm-6'
            });
            $cardDiv.appendTo( element );
            let $card = $('<div>',{
                class: 'card'
            });
            $card.appendTo($cardDiv);
            let $cardBody = $('<div>',{
                class: 'card-body'
            });
            $cardBody.appendTo($card);
            let $h5 = $('<h5>',{
                class: 'card-title',
                text: $json[$i]['movies_name']
            });
            $h5.appendTo($cardBody);
            let $p = $('<p>',{
                class: 'card-text',
                text: $json[$i]['genres_name'] + ', ' + $json[$i]['movies_date'] + ' год'
            });
            $p.appendTo($cardBody);
            let $a = $('<a>',{
                class: 'btn btn-primary',
                text: 'Смотреть',
                href: "movie?id=" + $json[$i]['movies_id']
            });
            $a.appendTo($cardBody);
        }
    }

    nothing()
    {
        $('#h4--result').html('Найдено: Да вообще ничего :( Попробуйте еще раз.');
        let $posterDiv = $('<div>',{
            class: 'col-md-6 col-sm-12 col-lg-auto text-center new'
        });
        $posterDiv.appendTo('#colorposter');
        let $posterA = $('<a>',{
            href: '/'
        });
        $posterA.appendTo($posterDiv);
        let $posterFigure = $('<figure>',{
            class: 'figure'
        });
        $posterFigure.appendTo($posterA);
        let $posterImg = $('<img>',{
            src: '../images/image.jpg',
            class: 'figure-img img-fluid rounded'
        });
        $posterImg.appendTo($posterFigure);
        let $posterFigcaption = $('<figcaption>',{
            class: 'figure-caption figuremaxwidth'
        });
        $posterFigcaption.appendTo($posterFigure);
        let $posterNameP = $('<p>',{
            class: 'zagolovok',
            text: 'Здесь должно было быть название'
        });
        $posterNameP.appendTo($posterFigcaption);
        let $posterYearGenreP = $('<p>',{
            class: 'fontzhanr',
            text: 'здесь мог быть жанр и год'
        });
        $posterYearGenreP.appendTo($posterFigcaption);
        return;
    }
}