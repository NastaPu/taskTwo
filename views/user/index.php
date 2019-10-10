<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

?>
<div class="user-index">
    <div>
        <a href="<?= Url::to(['user/create'])?>">1.Создание пользователя</a>
    </div>
    <div>
        <a href="<?= Url::to(['user/find'])?>">2.Получить пользователя по id</a>
    </div>
    <div>
        <a href="<?= Url::to(['user/get'])?>">3.Получить пользователя по имени</a>
    </div>
    <div>
        <a href="<?= Url::to(['user/list'])?>">4.Обновление данных пользоватля</a>
    </div>
    <div>
        <a href="<?= Url::to(['user/change'])?>">5.Изменение состояние пользователя</a>
    </div>
</div>
