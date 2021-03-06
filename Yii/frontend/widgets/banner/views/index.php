<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/29
 * Time: 15:19
 */
use yii\helpers\Url;
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach ($data['items'] as $k=>$list):?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$k?>" class="<?=(isset($list['active']) && $list['active'])?$list['active']:''?>"></li>
        <?php endforeach;?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner home-banner" role="listbox">
        <?php foreach ($data['items'] as $k=>$list):?>
        <div class="item <?=(isset($list['active']) && $list['active'])?$list['active']:''?>">
            <img style="height: 250px;width: 900px;" src="<?=Url::to($list['image_url'])?>" alt="<?=$list['label']?>">
            <div class="carousel-caption">
                <?=$list['html']?>
            </div>
        </div>
        <?php endforeach;?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
