<?php
use yii\helpers\Url;

$this->registerJsFile('js/index.js', ['depends' => [\app\assets\AppAsset::class]]);
$this->registerJsFile('js/search.js', ['depends' => [\app\assets\AppAsset::class]]);
?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="col-md-12 col-sm-12 col-lg-12 text-center new row">
        <div class="col-md-12 col-sm-12 col-lg-12 text-center new" style="padding-bottom: 50px;">
            <h2 style="color: white;">Результат поиска:</h2>
            <h4 style="color: white" id="h4--result"></h4>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-12 text-center row new justify-content-center">
            <form class="form-inline my-2 my-lg-0 col-md-auto col-sm-auto search" id="content-search-form" action="<?php echo Url::to(['site/search']); ?>">
                <input class="form-control mr-sm-2 search" id="content-search-input" value="" name="search" type="search" placeholder="Поиск">
                <button class="btn btn-outline-success my-2 my-sm-0 search" type="submit">Найти</button>
            </form>
        </div>
    </div>
</div>