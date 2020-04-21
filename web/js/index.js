function addFilms(){
    $.ajax({
        method: "GET",
        url: "http://lukankin.ru/test",
        async: false,
        success: function(data){
            let $json = $.parseJSON( data );
            console.log($json);
            //$('#see-more').css('display','block');
            /*for( let $i = 0; $i < $json.length; $i++ )
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
                    src: '../Images/' + $json['movies_url_poster'][$i],
                    class: 'figure-img img-fluid rounded'
                });
                $posterImg.appendTo($posterFigure);
                let $posterFigcaption = $('<figcaption>',{
                    class: 'figure-caption figuremaxwidth'
                });
                $posterFigcaption.appendTo($posterFigure);
                let $posterNameP = $('<p>',{
                    class: 'zagolovok',
                    text: $json['movies_name'][$i]
                });
                $posterNameP.appendTo($posterFigcaption);
                let $posterYearGenreP = $('<p>',{
                    class: 'fontzhanr',
                    text: $json['genres_name'][$i] + ', ' + $json['movies_date'][$i] + ' год'
                });
                $posterYearGenreP.appendTo($posterFigcaption);
            }*/
        }
    });
};
$(window).on('load',function(){
    addFilms();
})
