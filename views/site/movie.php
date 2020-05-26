<?php

//echo json_encode( $contentForMovie[0],JSON_UNESCAPED_UNICODE );
/*echo $contentForMovie[0]['movies_name'];
echo 'images/' . $contentForMovie[0]['movies_url_poster'];*/
$this->registerCssFIle("@web/css/movie.css");
?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <h2></h2>
    <div class="col-md-6 col-sm-12 col-lg-6 text-center">
        <a href="#">
            <figure class="figure">
                <img src="<?php echo 'images/' . $contentForMovie[0]['movies_url_poster'] ?>" class="figure-img rounded" alt="...">
                <figcaption class="figure-caption figuremaxwidth"><p class="zagolovok"></p></figcaption>
            </figure>
        </a>
    </div>
    <div class="col-lg-6">
        <ul class="film-main-info">
            <li class="row">
                <span class="col-md-9 col-sm-9 col-9"><h2><?php echo $contentForMovie[0]["movies_name"]; ?></h2></span>
                <img src="../images/bookmark.png" class="col-md-3 col-sm-3 col-3" id="bookmark">
            <p class="col-md-12 col-sm-12 col-12">The Ticket</p>
            </li>
            <li>
                <span class="key">Качество:</span>
                <span class="value">HD</span>
            </li>
            <li>
                <span class="key">Год:</span>
                <span class="value"><?php echo $contentForMovie[0]['movies_date'] ?></span>
            </li>
            <li>
                <span class="key">Время:</span>
                <span class="value">время</span>
            </li>
            <li>
                <span class="key">Страна:</span>
                <span class="value">США,Великобритания</span>
            </li>
            <li>
                <span class="key">Слоган:</span>
                <span class="value">Фраза</span>
            </li>
            <li>
                <span class="key">Жанр:</span>
                <span class="value"><?php echo implode($contentForMovie[0]['genres_name']) ?></span>
            </li>
            <li>
                <span class="key">Перевод:</span>
                <span class="value">Перевод</span>
            </li>
            <li>
                <span class="key">Бюджет:</span>
                <span class="value">Бюджет</span>
            </li>
            <li>
                <span class="key">Актёры:</span>
                <span class="value">Актёры</span>
            </li>
            <li>
                <span class="key">Режиссёр:</span>
                <span class="value">Режиссёр</span>
            </li>
        </ul>
</div>
<div class="col-lg-12">
    <p class="films-text">Джеймс слеп с юных лет врачи констатировали, что у юноши опухоль мозга, невзирая на недуг, судьба была благосклонна, парень смог создать семью и обзавестись наследниками. Супруга ухаживала за избранником, но паренек тяготился неполноценностью, однажды друг рассказал притчу, она настолько впечатлила героя, что он решил действовать, картина «Билет» покажет, что в итоге получилось. Герой с мольбами обращается к Великому Господу, прося о помиловании и исцелении. Всевышний Творец услышал искренние молитвы и послал исцеление, приняв великий дар, мужчина несказанно рад бурным переменам, однако забыл произнести слова благодарности.</p>
    <p class="films-text">Все вокруг завертелось после исцеления, персонаж получил повышение по службе, решил сменить автомобиль на более престижный, поменял гардероб. Вскоре господин стал чувствовать некий дискомфорт и тяготиться опекой супруги, превращаясь в брюзгу. Чем большим был доход, тем ниже становились моральные принципы, теряя реальность, бедняга утратил веру, превращаясь в холодного эгоиста, видимо не достаточно было покаяния, если слепота физическая превратилась в духовную нищету. В паутине духовной слепоты бедняга перестал слышать близких людей, надежды разорваны в клочья, остались лишь обрывки эмоций и разрушительная тишина.</p>
</div>
<div class="col-lg-12 video">
    <span><h2 class="heading"><?php echo 'Смотреть фильм ' . $contentForMovie[0]['movies_name'].' онлайн.'; ?></h2></span>
    <video controls="controls"></video>
</div>
</div>