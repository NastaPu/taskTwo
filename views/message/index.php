<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

?>
<div class="message-index">
    <div>
        <a href="<?= Url::to(['message/create'])?>">1.Создание сообщения</a>
    </div>
    <div>
        <a href="<?= Url::to(['message/list'])?>">2.Получить сообщения пользователя (+ поиск)</a>
    </div>
</div>
