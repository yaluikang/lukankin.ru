/*
var $limit = [0,15];
let $movie = "films=true&";
let $genre = '';
var $urlAllFilms = "ajax-requests/ajax-requests.php?" + $movie + "arr[]=" + $limit[0] + "&arr[]=" + $limit[1];
function addFilms(url,$moviep){
    console.log(url);
    $.ajax({
        method: "GET",
        url: url,
        async: false,
        success: function(data){
            let $json = $.parseJSON( data );
            console.log($json['error']);
            if($json['error'] == 'nothing'){
                $('#h4--result').html('Найдено: Да вообще ничего :( Попробуйте еще раз.');
                let $posterDiv = $('<div>',{
                    class: 'col-md-6 col-sm-12 col-lg-auto text-center new'
                });
                $posterDiv.appendTo('#colorposter');
                let $posterA = $('<a>',{
                    href: '../index.php'
                });
                $posterA.appendTo($posterDiv);
                let $posterFigure = $('<figure>',{
                    class: 'figure'
                });
                $posterFigure.appendTo($posterA);
                let $posterImg = $('<img>',{
                    src: '../Posters/image.jpg',
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
            if($json['movies_name']){
                let $direct = 'movie';
                if(params['search']){
                    console.log(12);
                    $('#h4--result').html('Найдено: '+$json['movies_name'].length+' элементов');
                    $direct = '../movie';
                }
                if($json['movies_name'].length == 0){
                    $('#see-more').css('display','none');
                } else if($json['movies_name'].length > 0){
                    console.log('okay');
                    $('#see-more').css('display','block');
                    for(let $i = 0; $i < $json['movies_name'].length; $i++){
                        let $posterDiv = $('<div>',{
                            class: 'col-md-6 col-sm-12 col-lg-auto text-center new'
                        });
                        $posterDiv.appendTo('#colorposter');
                        let $posterA = $('<a>',{
                            href: $direct + '/movie.php?id=' + $json['movies_id'][$i]
                        });
                        $posterA.appendTo($posterDiv);
                        let $posterFigure = $('<figure>',{
                            class: 'figure'
                        });
                        $posterFigure.appendTo($posterA);
                        let $posterImg = $('<img>',{
                            src: '../Posters/' + $json['movies_url_poster'][$i],
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
                        if($json['movies_name'].length < 15){
                            $('#see-more').css('display','none');
                        }
                    }
                }
            }

        }
    });
};
var params = window.location.search.replace('?','').split('&').reduce(
    function(p,e){
        var a = e.split('=');
        p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
        return p;
    },
    {}
);

$('#see-more').on('click',seeMore);
function seeMore(){
    $limit[0] = $limit[1];
    $limit[1] += 15;
    $urlAllFilms = "ajax-requests/ajax-requests.php?"+ $movie + $genre + "arr[]=" + $limit[0] + "&arr[]=" + $limit[1];
    console.log($urlAllFilms);
    addFilms($urlAllFilms,$movie);
};
$('.search-genre').each(function(){
    $(this).on('click',getFilms);
});
function getFilms(par){
    if($(this).hasClass('films')){
        $movie = "films=true&";
    } else if($(this).hasClass('tvSeries')){
        $movie = "tvSeries=true&";
    }
    if($(this).hasClass('search-genre')){
        $genre = "genre=" + $(this).text() + "&";
    } else {
        $genre = '';
    }
    $('#colorposter').empty();
    $limit = [0,15];
    $urlAllFilms = "ajax-requests/ajax-requests.php?"+ $movie + $genre + "arr[]=" + $limit[0] + "&arr[]=" + $limit[1];
    if(par.search){
        console.log(par.search);
        $urlAllFilms = 'ajax-requests/ajax-requests.php?search=' + par.search + "&arr[]=" + $limit[0] + "&arr[]=" + $limit[1];
    }
    addFilms($urlAllFilms,$movie);
    $('#see-more').off('click',seeMore);
    $('#see-more').on('click',seeMore);
}
$('.films').each(function(){
    $(this).on('click',getFilms);
});
$('.tvSeries').each(function(){
    $(this).on('click',getFilms);
});
$('form.search').each(function(ind){
    console.log(ind);
    $(this).on('submit',function(){
        console.log(ind);
        console.log($('input.search:eq('+ind+')').val().length);
        if($('input.search:eq('+ind+')').val().length < 3 || $('input.search:eq('+ind+')').val().length > 20){
            return false;
        }
    });
});
$(window).on('load',function(){
    if(params['films']){
        $movie = "films=true&";
        $('#home-tab').addClass('active');
        $('#profile-tab').removeClass('active');
    } else if(params['tvSeries']){
        $movie = "tvSeries=true&";
        $('#home-tab').removeClass('active');
        $('#profile-tab').addClass('active');
    }
    $urlAllFilms = "ajax-requests/ajax-requests.php?" + $movie + "arr[]=" + $limit[0] + "&arr[]=" + $limit[1];
    addFilms($urlAllFilms,$movie);
    $('#see-more').off('click',seeMore);
    $('#see-more').on('click',seeMore);
});*/
