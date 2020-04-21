function addFilms(){
    $.ajax({
        method: "GET",
        url: "http://lukankin.ru/test",
        async: false,
        success: function(data){
            let $json = $.parseJSON( data );
            console.log($json);
            console.log($json.length);
            console.log($json[0]['movies_name']);
            //$('#see-more').css('display','block');
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
                    src: '../Images/' + $json[$i]['movies_url_poster'],
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
    });
};
$(window).on('load',function(){
    addFilms();
})
