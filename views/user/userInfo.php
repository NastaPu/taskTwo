<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = 'Информация о пользователе';
?>
<div class="user-info">
    <h3><?= $this->title ?></h3>
    <p>ID: <?= $user->id ?></p>
    <p>Имя: <?= $user->username ?></p>
    <p>Состояние: <?= $user->state ?></p>
</div>
