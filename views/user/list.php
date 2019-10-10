<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список пользователей';

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'attribute' => 'username',
            'label' => 'Имя',
            'format' => 'raw',
            'value' => function($data) {
                return Html::a(
                    $data->username,
                    Url::to('/index.php?r=user/update&id=' .  $data->id)
                );
            }
        ],
        'state'
    ]
]);